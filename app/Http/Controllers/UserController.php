<?php
namespace App\Http\Controllers;
use App\User;
use App\WithdrawRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Http\Controllers\VoyagerUserController;

class UserController extends VoyagerBaseController
{
    public function profile()
    {
        if (!Auth::user()) {
            return redirect()->route('home');
        }

        $usersList = $this->getUsersRegisteredList(Auth::user()->registered_from);
        $withdrawRequest = WithdrawRequest::where('user_id', Auth::user()->id)->get();

        return view('profile.index', [
            'usersList' => $usersList,
            'withdraw' => $withdrawRequest
        ]);
    }

    public function updatePassword(Request $request)
    {
        $currentPassword      = $request->currentPassword;
        $password             = $request->password;
        $passwordConfirmation = $request->password_confirmation;

        if (!password_verify($currentPassword, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Произошла ошибка при сбросе пароля! Текущий пароль введен не верно');
        }

        if ($password !== $passwordConfirmation) {
            return redirect()->back()->with('error', 'Произошла ошибка при сбросе пароля! Пароли не совпадают');
        }

        Auth::user()->password = bcrypt($password);
        Auth::user()->save();

        return redirect()->back()->with('success', 'Пароль сброшен');
    }

    public function updateProfileData(Request $request)
    {
        try {
            $request->validate([
                'avatar' => 'required|image|max:2048', // Максимальный размер файла 2МБ и тип файла - изображение
            ]);

            $user = Auth::user();

            $avatar = $request->file('avatar');

            // Проверяем, что файл был загружен успешно
            if ($avatar) {
                // Генерируем уникальное имя файла
                $filename = uniqid() . '.' . $avatar->getClientOriginalExtension();

                // Сохраняем файл аватара в публичной директории (например, public/avatars)
                $avatar->move(public_path('storage/users'), $filename);

                // Обновляем путь к аватару в базе данных для текущего пользователя
                $user->avatar = 'users/' . $filename;
                $user->save();
            }

            $user->update($request->all());

            return redirect()->back()->with('success', 'Данные обновлены');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Произошла ошибка при обновлении профиля');
        }
    }

    /**
     * Создаем заявку на вывод
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createWithdrawRequest(Request $request): \Illuminate\Http\RedirectResponse
    {
        $withdraw = new WithdrawRequest();

        $withdraw->user_id    = Auth::user()->id;
        $withdraw->card_no    = $request->card_no;
        $withdraw->phone      = $request->phone;
        $withdraw->bank_title = $request->bank_title;
        $withdraw->amount     = $request->amount;
        $withdraw->status     = WithdrawRequest::STATUS_CREATED;

        $withdraw->save();

        return redirect()->back()->with('success', 'Заявка на вывод создана');
    }

//    protected function getUsersRegisteredList(?int $id): array
//    {
//        $list = [];
//
//        $registeredFrom = User::where('id', $id)->first() ?? null;
//
//        if ($registeredFrom) {
//            $list[] = $registeredFrom;
//
//            $list = array_merge($list, $this->getUsersRegisteredList($registeredFrom->registered_from));
//        }
//
//        return $list;
//    }

    protected function getUsersRegisteredList(?int $id, array &$visited = []): array
    {
        $list = [];

        if ($id !== null && !in_array($id, $visited)) {
            $visited[] = $id;

            $registeredFrom = User::where('id', $id)->first();

            if ($registeredFrom && $registeredFrom->registered_from !== null) {
                $list[] = $registeredFrom;

                $list = array_merge($list, $this->getUsersRegisteredList($registeredFrom->registered_from, $visited));
            }
        }

        return $list;
    }

    public function show(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $isSoftDeleted = false;

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $query = $model->query();

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $query = $query->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $query = $query->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$query, 'findOrFail'], $id);
            if ($dataTypeContent->deleted_at) {
                $isSoftDeleted = true;
            }
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        // Replace relationships' keys for labels and create READ links if a slug is provided.
        $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType, true);

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'read');

        // Check permission
        $this->authorize('read', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'read', $isModelTranslatable);

        $view = 'vendor.voyager.bread.read';

        $user = User::getUserById($id);

        $usersList = $this->getUsersRegisteredList($user->registered_from);

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'isSoftDeleted', 'usersList'));
    }
}
