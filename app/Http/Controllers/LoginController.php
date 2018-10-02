<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;


class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'username'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'conpassword' => 'required|min:8|same:password',
        ];

        $messages = [

            'first_name.required' => __('First Name field can\'t be empty'),
            'last_name.required' => __('Last Name field can\'t be empty'),
            'username.required'=>__('User Name field can\'t be empty'),
            'password.required' => __('Password field can\'t be empty'),
            'password.min' => __('Password length must be above 8 characters.'),
            //'password.regex' => __('Password must be consist of one Uppercase, one Lowercase, one Special Character and one Number!'),
            'email.required' => __('Email field can\'t be empty'),
            'email.unique' => __('Email Address already exists'),
            'email.email' => __('Invalid Email.'),
        ];
        $this->validate($request, $rules, $messages);

        $user = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'username'=>$request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'reset_code' => md5($request->get('email') . uniqid() . randomString(5)),
            'role' => $request->get('role', 2),
        ];

        $response = User::create($user);
        if ($response) {
            return redirect()->route('login')->with('success', 'Registration Successful. Please login to your account');
        } else {
            return redirect()->back()->with('dismiss', 'Something went wrong . please try again');
        }

    }

    public function postlogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $messages = [
            'email.email' => __('Invalid Email.'),
            'email.required' => __('Your Email is required!'),
            'password.required' => __('The password is required!'),
        ];

        $this->validate($request, $rules, $messages);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role == 2) {
                return redirect()->route('adminDashboard')->with(['success' => __('Login Successfull')]);
            } else {
                Auth::logout();
                return redirect()->back()->with(['dismiss' => __('You are not authorised')]);
            }

        } else {
            return redirect()->back()->with(['dismiss' => __('Email or Password Not matched')]);
        }
    }

    public function forgetPassword()
    {
        return view('auth.forgetpass');
    }

    public function forgetPasswordProcess(Request $request)
    {
        $rules = [
            'email' => 'required',
        ];

        $messages = [
            'email.required' => __('Email field can not be empty'),
        ];
        $email = $request->email;
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = User::where(['email' => $request->email])->first();

            if ($user) {
                $userName = $user->first_name . ' ' . $user->last_name;
                $userEmail = $request->email;

                $subject = __('Forget Password | POS');
                $defaultmail = 'info@squaredbyte.com';
                $defaultname = 'POS';
                $sentmail = Mail::send('auth.email.email_verify', ['data' => $user],
                    function ($message) use ($userName, $userEmail, $subject, $defaultmail, $defaultname) {
                        $message->to($userEmail, $userName)->subject($subject)->replyTo(
                            $defaultmail, $defaultname
                        );
                    }
                );
                if (count(Mail::failures()) > 0) {
                    return redirect()->back();
                } else {
                    return redirect()->route('forgetPasswordReset')->with(['success' => __('Successfully send email')]);
                }
            } else {
                return redirect()->back()->with(['dismiss' => __('Your email is not correct !!!')]);
            }

        }
    }

    public function forgetPasswordReset()
    {
        $data['pagetitle'] = __('Reset Password');
        return view('auth.forgetpassreset', $data);
    }


    public function forgetPassChange($reset_code)
    {
        $data['reset_code'] = $reset_code;
        $user = User::where(['reset_code' => $reset_code])->first();
        if ($user) {
            return view('auth.passchange', $data);
        } else {
            return redirect()->route('login')->with(['dismiss' => __('Invalid request!')]);
        }
    }


    public function forgetPasswordResetProcess(Request $request, $reset_code)
    {
        $rules = [
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ];

        $messages = [
            'password.required' => __('Password Field can not be Empty'),
            'password.min' => __('Password length must be above 6 characters.'),
            'password.regex' => __('Password must be consist of one Uppercase, one Lowercase, one Special Character and one Number!'),
            'password_confirmation.required' => __('Confirm Password Field can not be Empty!')
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = User::where(['reset_code' => $reset_code])->first();
            if ($user) {
                $update_password['reset_code'] = md5($user->email . uniqid() . randomString(5));
                $update_password['password'] = Hash::make($request->password);

                $updated = User::where(['id' => $user->id, 'reset_code' => $user->reset_code])->update($update_password);

                if ($updated) {
                    return redirect()->route('login')->with(['success' => __('Password successfully Changed')]);
                } else {
                    return redirect()->back()->with(['dismiss' => __('Password not Changed try again')]);
                }
            } else {
                return redirect()->route('login')->with(['dismiss' => __('Password not Changed try again')]);
            }
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
