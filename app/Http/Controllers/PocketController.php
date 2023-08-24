<?php
namespace App\Http\Controllers;
use App\CheckPayment;
use App\Currency;
use App\Pocket;
use App\Transaction;
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
        $currencyData = Currency::converter();

        return view('pocket', compact('package', 'currencyData'));
    }

    public function buyPocket(Request $request)
    {
        $pocketId       = $request->input('pocketId');
        $registeredFrom = $request->input('registeredFrom');
        $presenter      = $request->input('presenter');
        $package        = Pocket::where('id', $pocketId)->first();
        $currencyData   = Currency::converter();

        // записываем факт покупки
        $transaction              = new Transaction();
        $transaction->user_id     = Auth::user()->id;
        $transaction->pocket_id   = $package->id;
        $transaction->type        = Transaction::TYPE_PURCHASE;
        $transaction->status      = Transaction::STATUS_CREATED;
        $transaction->sum         = $package->price;
        $transaction->description = 'Покупка пакета: ' . $package->title;

        $transaction->save();

        return view('transaction', compact('pocketId', 'registeredFrom', 'presenter', 'package', 'currencyData'));
    }

    public function createCheckPayment(Request $request)
    {
        $pocketId       = $request->input('pocketId');
        $registeredFrom = $request->input('registeredFrom');
        $presenter      = $request->input('presenter');
        $price          = $request->input('price');
        $currency       = $request->input('currency');

        $file = $request->file('check');
        $name = time().'.'.$file->extension();
        $file->move(base_path() . '/storage/app/public', $name);

        $link = $name;

        $checkPayment = new CheckPayment();

        $checkPayment->user_id = Auth::user()->id;
        $checkPayment->pocket_id = $pocketId;
        $checkPayment->registered_from = $registeredFrom;
        $checkPayment->presenter = $presenter;
        $checkPayment->price = $price;
        $checkPayment->currency = $currency;
        $checkPayment->check = $link;
        $checkPayment->status = CheckPayment::STATUS_PENDING;

        $checkPayment->save();

        return view('success');
    }
}
