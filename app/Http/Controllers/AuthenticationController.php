<?php

namespace App\Http\Controllers;

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '0');

use App\Models\{Credentials, User};
use Illuminate\Support\Facades\{Hash, Cookie, DB, Mail};
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{
    public function registeration(Request $request)
    {
        $input = $request->all();
        $input['temp_password'] = $request->password;
        $input['is_active'] = 1;
        $input['is_admin'] = 0;
        $input['email_verified_at'] = now();
        $input['is_email_verified'] = 1;
        $input['role'] = 'User';
        $input['password'] = Hash::make($request->password);
        $user = User::create($input);
        if ($user) {
            return response()->json([
                "message" => 200,
            ]);
        }
    }
    public function verifyEmail()
    {
        return view('authentication.email-verify');
    }
    public function verificationEmail($email)
    {
        $user = DB::table('users')->where("email", $email)->first();
        if ($user->email_verified_at == null && $user->is_email_verified == null) {
            date_default_timezone_set("Asia/Karachi");
            $date = date('Y-m-d h:i:s A');
            DB::table('users')->where("email", $email)->update([
                "email_verified_at" => $date,
                "is_email_verified" => 1,
            ]);
            session()->put('user_added', $user->id);
            if ($user->role_assign == "Student") {
                return redirect('/student_dashboard')->with('success', 200);
            }
            if ($user->role_assign == "Teacher") {
                return redirect('/teacher_dashboard')->with('success', 200);
            } else {
                return redirect('/dashboard')->with('success', 200);
            }
        } else {
            session()->put('user_added', $user->id);
            if ($user->role_assign == "Student") {
                return redirect('/student_dashboard')->with('success', 200);
            }
        }
    }
    public function blanktoken($email)
    {
        $user = DB::table('users')->where("email", $email)->first();
        if ($user->is_email_verified == NULL && $user->email_verified_at == NULL) {
            DB::table('users')->where("email", $email)->update([
                "emailToken" => "",
            ]);
            return redirect('verify-email')->with('success', 200);
        } else {
            DB::table('users')->where("email", $email)->update([
                "emailToken" => $user->emailToken,
            ]);
            return redirect('verify-email')->with('success', 200);
        }
    }
    public function resendemail($email)
    {
        $user = DB::table('users')->where("email", $email)->first();
        if ($user->emailToken == "") {
            if ($this->isOnline()) {
                $mail_data = [
                    'recipient' => $user->email,
                    'formEmail' => 'official.thenestacademy@gmail.com',
                    'name' => $user->name,
                    'subject' => "Hospital Management System",
                    'body' => $user->email,
                ];
                Mail::send('authentication.email-template', $mail_data, function ($message) use ($mail_data) {
                    $message->to($mail_data['recipient'])
                        ->from($mail_data['formEmail'], $mail_data['name'])
                        ->subject($mail_data['subject']);
                });
                DB::table('users')->where("email", $email)->update([
                    "emailToken" => rand(10000, 90000),
                ]);
                return response()->json([
                    "message" => 200,
                ]);
            }
        } else {
            return response()->json([
                "message" => 300,
            ]);
        }
    }
    public function signin(Request $request)
    {
        $data = DB::table('users')->where("email", $request->email)->where("is_email_verified", 1)->first();
        if ($data) {
            if (Hash::check($request->input("password"), $data->password)) {
                if ($data->is_active == 1) {
                    if ($request->has("rememberme")) {
                        Cookie::queue('useremail', $request->email, 60 * 60 * 24 * 365);
                        Cookie::queue('userpassword', $request->password, 60 * 60 * 24 * 365);
                        Cookie::queue('remember', $request->rememberme, 60 * 60 * 24 * 365);
                    } else {
                        Cookie::queue('useremail', '');
                        Cookie::queue('userpassword', '');
                        Cookie::queue('remember', '');
                    }
                    session()->put('user_added', $data->id);
                    return response()->json([
                        "message" => 200,
                    ]);
                }
            } else {
                return response()->json([
                    "message" => 300,
                ]);
            }
        } else {
            return response()->json([
                "message" => 300,
            ]);
        }
    }
    public function resetLink(Request $request)
    {
        $data = DB::table('users')->where("email", "=", $request->email)->first();
        if ($data) {
            session()->put('reset-token', $request->email);
            if ($this->isOnline()) {
                $mail_data = [
                    'recipient' => $request->email,
                    'formEmail' => 'itsme.shaharyar@gmail.com',
                    'name' => $data->name,
                    'subject' => "Chaandi Kaar Ecommerce",
                    'body' => $request->email,
                ];
                Mail::send('authentication.reset-template', $mail_data, function ($message) use ($mail_data) {
                    $message->to($mail_data['recipient'])
                        ->from($mail_data['formEmail'], $mail_data['name'])
                        ->subject($mail_data['subject']);
                });
                return response()->json([
                    "message" => 200,
                ]);
            } else {
                return response()->json([
                    "message" => 400,
                ]);
            }
        } else {
            return response()->json([
                "message" => 300,
            ]);
        }
        // if ($data) {
        //     session()->put('reset-token', $request->email);
        //     if ($this->isOnline()) {
        //         $resetLink = url('/reset-password/' . $request->email);
        //         $mailBody = "
        //     <p><strong>Reset Password Here</strong></p>
        //     <p>If You want to Reset Your Password then <a href='{$resetLink}'><strong>Click Here</strong></a></p>";
        //         $headers = "MIME-Version: 1.0" . "\r\n";
        //         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        //         mail($request->email, "Reset Password", $mailBody, $headers);
        //         return redirect('/forget')->with('success', 'Please Check Your G-Mail Accout So,that to reset the Password...!');
        //     } else {
        //         return redirect('/offline');
        //     }
        // } else {
        //     return redirect('/forget')->with('error', 'Sorry...! Your Email is wrong...!');
        // }
    }
    public function resetPassword($email)
    {
        return view('authentication.reset', compact("email"));
    }
    public function updatePassword(Request $request)
    {
        if (DB::table('users')->where('email', $request->email)->update([
            "temp_password" => $request->password,
            "password" => Hash::make($request->password),
        ])) {
            $user = DB::table('users')->where('email', $request->email)->first();
            session()->put('user_added', $user->id);
            return response()->json([
                "message" => 200,
            ]);
        };
    }
    public function isOnline($site = "https://mail.google.com/mail/u/0/#inbox")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}
