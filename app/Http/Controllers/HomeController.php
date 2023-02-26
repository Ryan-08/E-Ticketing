<?php

namespace App\Http\Controllers;

use App\Models\pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Tiket;
use App\Models\Todo;
use PDF;

class HomeController extends Controller
{        
    public function home() {        
        $user = Auth::user();
        $notif = getNotification();        
        if ($user->hasRole('admin')) {
            $totalLaporan = DB::table('tickets')
                        ->select('user_id', DB::raw('count(*) as total_laporan'))
                        ->groupBy('user_id');
            $data = DB::table('users')
            ->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
            ->joinSub($totalLaporan, 'total_laporan', function ($join) {
                $join->on('users.id', '=', 'total_laporan.user_id');
            });
            $data = $data->orderBy('total_laporan', 'desc')->paginate(4);
            // show log activity
            $activities = Todo::select('title')->distinct()->where('user_id', Auth::id())->whereDate('created_at', \Carbon\Carbon::today())->orderBy('created_at', 'desc')->get();                        

            $tiket = Tiket::all();
            $status_ticket = DB::table('tickets_status')->get();          
            $jml_tiket = DB::table('tickets')                                               
                        ->select('ticket_status_id', DB::raw('count(*) as jumlah_tiket'))
                        ->groupBy('ticket_status_id');

            $joined = DB::table('tickets_status')
                        // ->where('t_status', '!=', 'waiting')                                  
                        ->leftJoinSub($jml_tiket, 'jumlah_tiket', function ($join) {
                            $join->on('tickets_status.id', '=', 'jumlah_tiket.ticket_status_id');
                        })->get(); 
                    // dd($joined);
            // $roles = $user->getRoleNames();
            // $graph = getGraph('hari', $roles, 1);
            return view('admin.home', ['user' => $user, 'notif' => $notif, 'data' => $data, 'status_ticket' => $status_ticket, 'jumlah' => $joined, 'tiket' => $tiket, 'activities' => $activities]);
        }
        // show log activity
        $activities = Todo::where('user_id', Auth::id())->select('title')->where('user_id', Auth::id())->distinct()->whereDate('created_at', \Carbon\Carbon::today())->orderBy('created_at', 'desc')->get();                        

         
        // $userTiket = Tiket::where('user_id', Auth::id());
        $tiket = Tiket::where('user_id', Auth::id())->get();    
        $status_ticket = DB::table('tickets_status')->get();            
        $jml_tiket = DB::table('tickets')  
                        ->where('user_id', Auth::id())                      
                        ->select('ticket_status_id', DB::raw('count(*) as jumlah_tiket'))
                        ->groupBy('ticket_status_id');

        $joined = DB::table('tickets_status')
                        // ->where('t_status', '!=', 'waiting')                                  
                        ->leftJoinSub($jml_tiket, 'jumlah_tiket', function ($join) {
                            $join->on('tickets_status.id', '=', 'jumlah_tiket.ticket_status_id');
                        })->get();     
        // $graph = getGraph('hari', 'admin');
        // dd($graph);              
        return view('user.home', ['user' => $user, 'notif' => $notif, 'status_ticket' => $status_ticket, 'jumlah' => $joined, 'tiket' => $tiket, 'activities' => $activities]);
    }
    public function daftarTiket() {
        $user = User::find(Auth::id());
        $data = User::whereHas(
                    'roles', function($q){
                        $q->where('name', 'user');
                    }
                )->get();
        $tiket = Tiket::orderBy('updated_at', 'desc')->paginate(5);
        $status_ticket = DB::table('tickets_status')->get();
        $notif = getNotification();      
        if ($user->hasRole('admin')) {            
            return view('admin.daftar-tiket', ['user' => $user, 'tiket' => $tiket, 'data' => $data, 'status_ticket' => $status_ticket, 'notif' => $notif]);
        }        
        $tiket = Tiket::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->paginate(5);
        return view('user.daftar-masalah', ['user' => $user, 'tiket' => $tiket, 'status_ticket' => $status_ticket, 'notif' => $notif]);
    }

    // admin
    public function daftarPengguna() { 
        $data = User::paginate(5);     
        $user = Auth::user();
        $notif = getNotification();
       return view('admin.daftar-pengguna', ['data' => $data, 'user' => $user, 'notif' => $notif]);
    }      
    
    public function laporanInstansi(Request $request) {
        $user = Auth::user();
        $notif = getNotification();            
        $totalLaporan = DB::table('tickets')
                        ->select('user_id', DB::raw('count(*) as total_laporan'))
                        ->groupBy('user_id');
        $data = DB::table('users')
        ->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
        ->joinSub($totalLaporan, 'total_laporan', function ($join) {
            $join->on('users.id', '=', 'total_laporan.user_id');
        });
        // $data = $data->orderBy('total_laporan', 'desc')->get();
        $counter = 1;
        if ($request->search) {
            $data = $data->where('name', 'like', '%'.$request->search.'%')->orderBy('total_laporan', 'desc')->get();
        } else {
            $data = $data->orderBy('total_laporan', 'desc')->get();
        }
        // dd($data);
        return view('admin.laporan-instansi', ['user' => $user, 'notif' => $notif, 'data' => $data, 'total' => $totalLaporan, 'counter' => $counter]);
    }        
    
    // user
    public function dataDiri() {
        $user = Auth::user();
        $notif = getNotification();
        return view('user.data-diri', ['user' => $user, 'notif' => $notif]);
    }
    public function ubahPass() {
        $user = Auth::user();
        $notif = getNotification();
        return view('user.ubah-password', ['user' => $user, 'notif' => $notif]);
    }
    public function laporMasalah() {
        $user = Auth::user();
        $notif = getNotification();
        return view('user.lapor-masalah', ['user' => $user, 'notif' => $notif]);
    }
    public function detailTiket($no_ticket) {
        $user = Auth::user();
        $tiket = Tiket::where('no_ticket', $no_ticket)->first();
        $id = $tiket->ticket_status_id;
        $data = User::where('id', $tiket->user_id)->first();
        $admin = User::find(1);
        $notif = getNotification();
        $input = ['title' => $no_ticket, 'description' => $tiket->description, 'user_id' => $user->id];        
        // log activity          
        $todoStatus = Todo::create($input);
        // Add activity logs
        activity('todo')
            ->performedOn($todoStatus)
            ->causedBy($user)            
            ->log('Todo created by ' . $user->name);
        if($id == 2){
            // open                        
            return view('user.open-tiket', ['user' => $user, 'tiket' => $tiket, 'data' => $data, 'notif' => $notif, 'admin' => $admin]);
        } else if($id == 3){
            // close
            return view('user.close-tiket', ['user' => $user, 'tiket' => $tiket, 'data' => $data, 'notif' => $notif]);
        }
        else if($id == 4) {
            // pending                                             
            return view('user.pending', ['user' => $user, 'tiket' => $tiket, 'data' => $data, 'notif' => $notif]);
        }
    }   
    public function selesai() {
        $notif = getNotification();
        return view('user.close');
    }   

    // cetak satuan
    public function pdf($no_ticket) {
        $tiket = Tiket::where('no_ticket', $no_ticket)->first();        
        $data = User::where('id', $tiket->user_id)->first();   
        $status = DB::table('tickets_status')->get();
        // $question = [];
        // if tiket open
        // if($tiket->t_status == 2) {
        //     $question = pertanyaan::where('no_ticket', $no_ticket);
        //     $pdf = PDF::loadView('pdf', ['tiket' => $tiket, 'data' => $data, 'status' => $status, 'question' => $question]);        
        //     return $pdf->download($no_ticket.'.pdf');
        // }
        $pdf = PDF::loadView('pdf', ['tiket' => $tiket, 'data' => $data, 'status' => $status]);        
        return $pdf->download($no_ticket.'.pdf');               
    }   

    // cetak semua
    public function allPdf() {            
        $data = User::all();   
        $status = DB::table('tickets_status')->get();
        $pdf = PDF::loadView('allpdf', ['data' => $data, 'status' => $status]);        
        return $pdf->download('daftar-tiket.pdf');               
    }   

    public function cari(Request $request){
        $search = $request->search;   
        $user = User::find(Auth::id());
        $data = User::whereHas(
                    'roles', function($q){
                        $q->where('name', 'user');
                    }
                )->get();
        $tiket = Tiket::paginate(2);        
        $status_ticket = DB::table('tickets_status')->get();
        $notif = getNotification();
        if($search) {                
            if ($user->hasRole('admin')) {                           
                $tiket = Tiket::where(function ($query) use ($search){
                        $query->where('problem', 'like', "%".$search."%")
                                ->orWhere('no_ticket', '=', $search);
                })->paginate(3);         
                // dd($tiket);
                return view('admin.daftar-tiket', ['user' => $user, 'tiket' => $tiket, 'data' => $data, 'status_ticket' => $status_ticket, 'notif' => $notif]);
            }              
            // dd($search);
            $tiket = Tiket::where('user_id', '=', Auth::id())
                            ->where(function ($query) use ($search) {
                                $query->where('problem', 'like', "%".$search."%")
                                        ->orWhere('no_ticket', '=', $search);
                            }
                        )->paginate(3); 
            return view('user.daftar-masalah', ['user' => $user, 'tiket' => $tiket, 'status_ticket' => $status_ticket, 'notif' => $notif]);
        }   
        return redirect()->route("daftar-tiket");
    }
}
