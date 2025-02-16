<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use function Laravel\Prompts\alert;

class AuthController extends Controller
{
    public function login()
    {
        // dd( Hash::make( 112233 ) );
        if (Auth::check()) {
            // return redirect( 'admin/dashboard' );
            if (Auth::user()->role == 'admin') {
                return redirect('admin/dashboard');
            } else if (Auth::user()->role == 'student') {
                return redirect('student/dashboard');
            } else  if (Auth::user()->role == 'instructor') {
                return redirect('instructor/dashboard');
            } else   if (Auth::user()->role == 'parent') {
                return redirect('parent/dashboard');
            };
        };

        return view('auth.login');
    }

    public function Authlogin(Request $request)
    {
        $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ($auth) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin/dashboard')->with('success', 'تم تسجيل الدخول بنجاح');
            } else if (Auth::user()->role == 'student') {
                return redirect('student/dashboard')->with('success', 'تم تسجيل الدخول بنجاح');
            } else  if (Auth::user()->role == 'instructor') {
                return redirect('instructor/dashboard')->with('success', 'تم تسجيل الدخول بنجاح');
            } else   if (Auth::user()->role == 'parent') {
                return redirect('parent/dashboard')->with('success', 'تم تسجيل الدخول بنجاح');
            };
        } else {
            return redirect()->back()->with('error', 'البريد الإلكتروني أو كلمة المرور غير صحيحة');
        }
    }

    public function ForgotPassword()
    {
        return view('auth.forgotpass');
    }
    public function PostForgotPassword(Request $request)
    {
        // dd( $request->all() );
        $user = User::GetMailSingle($request->email);
        if ($user) {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgetPasswordMail($user));

            return redirect()->back()->with('success', 'Please Check your Email and Reset Password');
        } else {
            return redirect('/')->with('error', 'Email not Found');
        }
    }

    public function ResetPassword($token)
    {
        $user = User::GetToken($token);
        // dd($user);
        if (!empty($user)) {
            $data['user'] = $user;
            return view('auth.resetpass', $data);
        } else {
            abort(404);
        }
    }
    public function PostResetPassword( Request $request,$token)
    {
        if ($request->password == $request->cpassword) {
            $user = User::GetToken($token);
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('/')->with('success', 'Password Changed Successfully!');
        } else {
            return back()->with('error', 'Password and Confirm Password not match');
        }
    }

    public function Authlogout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'تم تسجيل الخروج بنجاح');
    }
}
