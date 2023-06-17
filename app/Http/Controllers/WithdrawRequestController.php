<?php
namespace App\Http\Controllers;
use App\Transaction;
use App\Wallet;
use App\WithdrawRequest;
use Illuminate\Http\Request;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class WithdrawRequestController extends VoyagerBaseController
{
    public function update(Request $request, $id)
    {
        if ($request->status == WithdrawRequest::STATUS_ACCEPTED) {
            $userWallet = Wallet::where('user_id', $request->user_id)->first();
            $data       =  [
                'message'    => "Ошибка при списании баланса, недостаточно средств",
                'alert-type' => 'error',
            ];

            if ($request->amount > $userWallet->amount) {
                return redirect()->back()->with($data);
            }

            $userWallet->amount -= $request->amount;
            $userWallet->save();

            $transactions          = new Transaction();
            $transactions->user_id = $request->user_id;
            $transactions->sum     = $request->amount;
            $transactions->type    = Transaction::TYPE_WITHDRAW;

            $transactions->save();
        }

        return parent::update($request, $id); // TODO: Change the autogenerated stub
    }
}
