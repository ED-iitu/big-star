<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Wallet;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showRegistrationForm(Request $request)
    {
        $inviteCode = $request->input('invite_code');

        return view('auth.register', ['inviteCode' => $inviteCode]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     */
    protected function register(Request $request)
    {
        try {
            $registeredFrom = $request->invite_code ?? null;
            $user           = User::create([
                'name'            => $request->name,
                'phone'           => $request->phone,
                'email'           => $request->email,
                'registered_from' => $registeredFrom,
                'password'        => Hash::make($request->password),
                'invite_code'     => $this->generateInviteCode()
            ]);

            $user->save();

            $wallet          = new Wallet();
            $wallet->user_id = $user->id;
            $wallet->save();

            event(new Registered($user));

            return redirect()->route('verify.sms');
        } catch (\Throwable $exception) {
            if ($exception instanceof QueryException) {
                $errorMessage = 'Вы уже зарегистрированы.';
                Session::flash('error', $errorMessage);
                return redirect()->back();
            } else {
                Session::flash('error', $exception->getMessage());
                return redirect()->back();
            }
        }

    }

    protected function generateInviteCode(): string
    {
        return Str::random(10);
    }

    protected function registered(Request $request, $user)
    {
        // Перенаправление на страницу ввода SMS-кода
        return redirect()->route('verify.sms');
    }
}
