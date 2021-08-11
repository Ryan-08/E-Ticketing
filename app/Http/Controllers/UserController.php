<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserProfile;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function adminTambahPengguna() {
        return view('admin.tambah-pengguna');
    }
    public function adminEditPengguna($id) {
        $user = User::find($id);        
        return view('admin.edit-pengguna', ['user' => $user]);
    }
    public function tambah(Request $request) {
        $defaultPass = $request->password;        
        $newUser = User::create([
            'name' => $request->instansi,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        DB::table('user_profiles')->insert(
            [
                'contact' => $request->no_telepon,  
                'user_id' => $newUser->id,
            ]
        );
        $newUser->assignRole($request->role);

        return redirect()->route('welcome', ['id' => $newUser->id, 'pass' => $defaultPass]);        
    }
    public function edit(Request $request, $id) {
        $user = User::find($id);
        $profil = UserProfile::where('user_id', $id)->get();                
        if($profil->isEmpty()) {
            $profil = new UserProfile;
            $profil::create([
                'contact' => $request->no_telepon,
                'user_id' => $id,                
            ]);            
        }          
        $user->name = $request->instansi;
        $user->email = $request->email;
        $user->user_profiles->contact = $request->no_telepon;

        $user->save();                    
        $user->user_profiles->save();                    
        return redirect('/daftar-pengguna')->with('message', 'Data pengguna telah diperbarui');
    }
    public function hapus($id) {
        $user = User::find($id);
        $user->delete();
        
        return redirect('/daftar-pengguna')->with('message', 'Data telah berhasil dihapus');
    }   

    public function lupa_password() {
        return view('lupa-password');
    }

    public function send_reset_link(Request $request) {
        $request->validate(['email' => 'required|email']);

        $email = $request->email;

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status), 'email' => $email])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function reset_password($token) {
        return view('reset-password', ['token' => $token]);
    }

    public function update_password(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
