<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
Use Illuminate\Support\Str;
class ForgotPasswordController extends Controller
{
    public function index(){
    return view('user.forgot-password.index');
    }
    public function store(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ]);
    
        // Cek apakah email sudah ada dalam password_reset_tokens
        $existingToken = DB::table('password_reset_tokens')
                            ->where('email', $request->email)
                            ->first();
    
        if ($existingToken) {
            // Jika token sudah ada, perbarui token yang ada
            $token = $existingToken->token;
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->update(['token' => $token]);
        } else {
            // Jika tidak ada, buat token baru
            $token = Str::random(64);
            DB::table('password_reset_tokens')->insert([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now()
            ]);
        }
    
        Mail::send('user.emails.index',['token'=>$token], function ($message) use($request){
            $message->to($request->email);
            $message->subject("Reset Password | SDN Percobaan");
        });
        alert('verifikasi email telah dikirim','success');
        return redirect('/login');
    }

    public function resetpassword($token){
        $email = DB::table('password_reset_tokens')
        ->where('token', $token)
        ->value('email');
        return view('user.new-password.index',compact('token','email'));
    }

    public function resetpasswordpost(Request $request){
        $request->validate([
            "email"=>'required|email|exists:users',
            "password"=>'required|string|min:6|confirmed',
            "password_confirmation"=>'required'
        ]);

        $updatepassword = DB::table('password_reset_tokens')
        ->where([
            'email'=>$request->email,
            'token'=>$request->token,
            
        ])->first();

        if(!$updatepassword){
            alert('Ganti password gagal','error');
            return redirect()->to(route('reset.password'));
        }

        User::where('email',$request->email)->update([
            'password'=>Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where(['email'=>$request->empty])->delete();

        alert('berhasil edit password','success');
        return redirect('/login');
    }
}