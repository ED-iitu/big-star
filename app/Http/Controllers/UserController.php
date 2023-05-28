<?php
namespace App\Http\Controllers;
use App\User;
use App\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function profile()
    {
        if (!Auth::user()) {
            return redirect()->route('home');
        }

        $registeredFrom = User::where('id', Auth::user()->registered_from)->first() ?? null;

        return view('profile.index', [
            'registeredFrom' => $registeredFrom
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
                $avatar->move(public_path('avatars'), $filename);

                // Обновляем путь к аватару в базе данных для текущего пользователя
                $user->avatar = 'avatars/' . $filename;
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

        $withdraw->save();

        return redirect()->back()->with('success', 'Заявка на вывод создана');
    }
}
