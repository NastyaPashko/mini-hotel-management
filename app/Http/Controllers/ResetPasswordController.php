<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetNotification()
    {


        return view('auth.sent-notification');
    }
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|string|min:6|confirmed',
                'token' => 'required'

            ]
        );
        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token);
        if (!$resetRecord) {
            return redirect()->route('password.request')->withErrors(['email' => 'Invalid or expired token.']);
        }

        User::where('email', $request->email)->update(
            ['password' => Hash::make($request->password)]
        );

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        return redirect()->route('login.form')->with('success', 'Password reset successfully!');
    }
}
