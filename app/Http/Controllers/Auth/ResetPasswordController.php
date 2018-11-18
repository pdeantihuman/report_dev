<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use function foo\func;
use function GuzzleHttp\Psr7\str;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function reset(Request $request)
    {
        $name = $request->input('name');
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');
        // 表单验证
        $request->validate([
            'name' => ['required'],
            'old_password' => ['required', function ($attribute, $value, $fail) use ($name, $old_password) {
                if (!\Auth::attempt(['name' => $name, 'password' => $old_password])) {
                    $fail("用户名或密码错误");
                }
            }],
        ]);
        // 修改用户密码
        if (\Auth::attempt(['name' => $name, 'password' => $old_password])) {
            $user = \Auth::user();
            $user->password = bcrypt($new_password);
            $user->save();
        }
        return redirect('/home');
    }
}
