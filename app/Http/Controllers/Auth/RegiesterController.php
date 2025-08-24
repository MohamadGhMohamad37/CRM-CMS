<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegiesterController extends Controller
{
    //show page regiester
    public function index(){
        return view('auth.regiester');
    }
    //regiester
    public function regiester(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Verify that the email is only Gmail or Outlook
        if (!preg_match('/@(gmail|outlook)\.com$/', $request->email)) {
            return back()->withErrors(['email' => 'Only Gmail or Outlook emails are allowed.']);
        }
        // Generate 6-digit verification code
        $verificationCode = rand(100000, 999999);

        // Create User
        $user = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'verification_code' => $verificationCode,
            'is_verified'       => false,
        ]);

        // Send the code via Mailtrap
        Mail::raw("Your verification code is: $verificationCode", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Verify your email');
        });

        return redirect()->route('verify.form')->with('email', $user->email);
    }
    //show verify page
    public function showVerifyForm(Request $request)
    {
        return view('auth.verify'); 
    }
    //verify account
    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code'  => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)
                    ->where('verification_code', $request->code)
                    ->first();

        if (!$user) {
            return back()->withErrors(['code' => 'Invalid verification code.']);
        }

        $user->update([
            'is_verified'       => true,
            'verification_code' => null,
        ]);

        return redirect()->route('login.page')->with('success', 'Your email has been verified. You can now login.');
    }


}
