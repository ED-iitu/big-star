<?php
namespace App\Http\Controllers;
use App\Currency;
use App\Pocket;
use App\Transaction;
use App\User;
use App\UserPocket;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PocketController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getPackage($id)
    {
        $package = Pocket::where('id', $id)->first();
        $currencyData = Currency::converter();

        return view('pocket', compact('package', 'currencyData'));
    }

    public function buyPocket(Request $request)
    {
        $pocketId       = $request->input('pocketId');
        $registeredFrom = $request->input('registeredFrom');
        $presenter      = $request->input('presenter');
        $pocket         = Pocket::where('id', $pocketId)->first();
        $fee            = 10; // налог 10%

        Log::info("Register From% ." . $registeredFrom);

        // Сохраняем пакет пользователя
        $userPocket = new UserPocket();
        $userPocket->user_id = Auth::user()->id;
        $userPocket->pocket_id = $pocket->id;
        $userPocket->save();

        // записываем факт покупки
        $transaction              = new Transaction();
        $transaction->user_id     = Auth::user()->id;
        $transaction->pocket_id   = $pocket->id;
        $transaction->type        = Transaction::TYPE_PURCHASE;
        $transaction->status      = Transaction::STATUS_SUCCESS;
        $transaction->sum         = $pocket->price;
        $transaction->description = 'Покупка пакета: ' . $pocket->title;

        $transaction->save();

        // Пополняем кошелек пользователя, который пригласил
        $actualNeededPrice    = $pocket->price * ($fee / 100);
        $needPrice            = $actualNeededPrice - ($actualNeededPrice * ($fee / 100));
        $registeredFromWallet = Wallet::where('user_id', $registeredFrom)->first();

        $registeredFromWallet->amount += $needPrice;
        $registeredFromWallet->save();

        // Записываем транзакцию о начисление
        $transaction              = new Transaction();
        $transaction->user_id     = $registeredFrom;
        $transaction->type        = Transaction::TYPE_REGISTERED;
        $transaction->status      = Transaction::STATUS_SUCCESS;
        $transaction->sum         = $needPrice;
        $transaction->description = "Оплата за приглашения пользователя: " . Auth::user()->name;

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
        $transaction->description = 'Оплата за покупку пакета пользователем: ' . Auth::user()->name;

        $transaction->save();

        $response = [
            'status' => 'ok'
        ];


        Log::info("Завершили покупку пакета");

        return response()->json($response);
    }
}
