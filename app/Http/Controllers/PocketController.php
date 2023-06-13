<?php
namespace App\Http\Controllers;
use App\Pocket;
use App\Transaction;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PocketController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getPackage($id)
    {
        $package = Pocket::where('id', $id)->first();

        return view('pocket', compact('package'));
    }

    public function buyPocket(Request $request)
    {
        $pocketId       = $request->input('pocketId');
        $registeredFrom = $request->input('registeredFrom');
        $presenter      = $request->input('presenter');
        $pocket         = Pocket::where('id', $pocketId)->first();
        $fee            = 10; // налог 10%

        // записываем факт покупки
        $transaction            = new Transaction();
        $transaction->user_id   = Auth::user()->id;
        $transaction->pocket_id = $pocket->id;
        $transaction->type      = Transaction::TYPE_PURCHASE;
        $transaction->status    = Transaction::STATUS_CREATED;
        $transaction->sum       = $pocket->price;

        $transaction->save();

        // Пополняем кошелек пользователя, который пригласил
        $registeredFromUser   = User::where('id', $registeredFrom)->first();
        $actualNeededPrice    = $pocket->price * ($fee / 100);
        $needPrice            = $actualNeededPrice - ($actualNeededPrice * ($fee / 100));
        $registeredFromWallet = Wallet::where('user_id', $registeredFrom)->first();

        $registeredFromWallet->amount += $needPrice;
        $registeredFromWallet->save();

        // Записываем транзакцию о начисление
        $transaction          = new Transaction();
        $transaction->user_id = $registeredFrom;
        $transaction->type    = Transaction::TYPE_REGISTERED;
        $transaction->status  = Transaction::STATUS_SUCCESS;
        $transaction->sum     = $needPrice;

        $transaction->save();

        // Пополняем кошелек презентера, который пригласил
        $actualNeededPrice   = $pocket->price * (5 / 100);
        $needPrice           = $actualNeededPrice - ($actualNeededPrice * ($fee / 100));
        $presenterUserWallet = Wallet::where('user_id', $presenter)->first();

        $presenterUserWallet->amount += $needPrice;
        $presenterUserWallet->save();

        // Записываем транзакцию о начисление
        $transaction          = new Transaction();
        $transaction->user_id = $presenter;
        $transaction->type    = Transaction::TYPE_REGISTERED;
        $transaction->status  = Transaction::STATUS_SUCCESS;
        $transaction->sum     = $needPrice;

        $transaction->save();

        $response = [
            'status' => 'ok'
        ];

        return response()->json($response);
    }
}
