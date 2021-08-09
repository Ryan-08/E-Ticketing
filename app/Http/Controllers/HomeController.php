<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use PDF;

class HomeController extends Controller
{    
    public function home() {        
        $user = User::find(Auth::id());
        if ($user->hasRole('admin')) {
            return view('admin.home');
        }
        return view('user.home');
    }
    public function daftarTiket() {
        $user = User::find(Auth::id());
        if ($user->hasRole('admin')) {
            return view('admin.daftar-tiket');
        }
        return view('user.home');        
    }
    public function daftarPengguna() { 
        $user = User::paginate(2);                              
       return view('admin.daftar-pengguna', ['user' => $user]);
    }      
    
    public function laporanInstansi() {
        return view('admin.laporan-instansi');
    }
    
    public function cari(Request $request){
        $search = $request->search;        
        $user = User::paginate(2);                      
        if($search) {                
            $user = User::where([
                ['name', 'like', "%" .$search."%"],                
            ])->paginate(2);             
        }  
        return view('admin.daftar-pengguna', ['user' => $user]);
    }
    public function pdf() {
        $pdf = PDF::loadView('pdf');
        return $pdf->download('laporan.pdf');               
    }
}
