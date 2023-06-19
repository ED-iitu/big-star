<?php
namespace App\Http\Controllers;
use App\MonthlyPurchase;
use App\Pocket;
use App\Transaction;
use App\User;
use App\UserPocket;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class MonthlyPurchaseController extends VoyagerBaseController
{
    public function update(Request $request, $id)
    {
        if ($request->status == MonthlyPurchase::STATUS_FILL) {
            $userPockets = UserPocket::all();

            foreach ($userPockets as $userPocket) {
                $user       = User::where('id', $userPocket->user_id)->first();
                $pocket     = Pocket::where('id', $userPocket->pocket_id)->first();
                $userWallet = Wallet::where('id', $userPocket->user_id)->first();

                if (null == $userWallet) {
                    Log::info('Пропускаем начисление пакета, так как кошелек не найден');
                    Log::info($userPocket->user_id);
                    continue;
                }

                $userWallet->amount += $request->amount * $pocket->percent;
                $userWallet->save();

                $transaction = new Transaction();
                $transaction->user_id = $user->id;
                $transaction->sum = $request->amount * $pocket->percent;
                $transaction->type = Transaction::TYPE_MONTHLY_PURCHASE;
                $transaction->description = $request->title;

                $transaction->save();
            }

            $monthlyPurchase = MonthlyPurchase::findOrFail($id); // Найти запись MonthlyPurchase по id
            $monthlyPurchase->status = MonthlyPurchase::STATUS_FINISHED; // Изменить статус
            $monthlyPurchase->save();
        }

        return parent::update($request, $id);
    }
}
