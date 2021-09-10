<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserProfile;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function adminTambahPengguna() {
        $user = Auth::user();
        $notif = getNotification();
        return view('admin.tambah-pengguna', ['user' => $user, 'notif' => $notif]);
    }
    public function adminEditPengguna($id) {
        $user = User::find($id);    
        $notif = getNotification();    
        return view('admin.edit-pengguna', ['user' => $user, 'notif' => $notif]);
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
        $notif = getNotification();

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
        // $user = User::find($id);
        User::destroy($id);
        // $user->delete();
        
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

    public function newPass(Request $request) {
        $request->validate([
            'passwordLama' => ['required', new MatchOldPassword],
            'passwordBaru' => ['required'],
            'passwordConfirm' => ['same:passwordBaru'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->passwordBaru)]);
        return redirect()->route('ubah-pass')->with('message', 'Password telah berhasil diubah');
    }

    public function cari(Request $request){
        $search = $request->search;   
        $auth = Auth::user();      
        $user = User::paginate(5);
        $notif = getNotification();        
        if($search) {                
            $user = User::where([
                ['name', 'like', "%" .$search."%"],                
            ])->paginate(3);         
            // dd($user->isNotEmpty());            
        } 
        if(!$user->isNotEmpty()){
            return view('admin.daftar-pengguna', ['data' => $user, 'user' => $auth, 'notif' => $notif])->with('fail', "Data tidak ditemukan" );
        }        
        return view('admin.daftar-pengguna', ['data' => $user, 'user' => $auth, 'notif' => $notif]);
    }

    public function gantiProfil(Request $request) {
        $user = Auth::user();
        $ext = $request->file('avatar')->extension();
        $filename = 'avatar-'.$user->name.'.'.$ext;
        $this->validate($request, ['avatar' => 'required|file|max:10000']);
        $path = Storage::putFileAs(
            'public/images', $request->file('avatar'), $filename
        );         
        $user->user_profiles->image_path = $filename;
        $user->save();
        $user->user_profiles->save();                    

        return redirect()->route('data-diri')->with('message', 'Profil berhasil diubah');
    }  
}
