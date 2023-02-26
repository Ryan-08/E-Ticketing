<?php

namespace App\Http\Controllers;

use App\Models\pertanyaan;
use Illuminate\Http\Request;
use App\Models\Tiket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class NotificationController extends Controller
{
    public function notifikasi(Request $request, $no_ticket) {
        $status = $request->input('status_masalah');
        $ticket = Tiket::where('no_ticket', $no_ticket)->first();
        $user = Auth::user();   
        $time = \Carbon\Carbon::now(); 
        
        
        if($status == 'selesai'){
            $insert = DB::table('table_notification')->insert([
                'judul' => 'Tiket '.$no_ticket.' Telah Selesai',
                'pesan' => 'Masalah dengan nomor tiket '.$no_ticket.' telah berhasil diselesaikan silahkan konfirmasi dengan menekan tombol selesai. Terima Kasih',
                'from' => $user->name,
                'no_ticket' => $no_ticket,
                'ticket_id' => $ticket->id,
                'created_at' => $time->toDateTimeString(),
                'updated_at' => $time->toDateTimeString()
            ]);  
        } else if('belum') {
            $insert = DB::table('table_notification')->insert([
                'judul' => 'Tiket '.$no_ticket.' Sedang Di Pending',
                'pesan' => 'Masalah dengan nomor tiket '.$no_ticket.' belum terselesaikan. Terima Kasih',
                'from' => $user->name,
                'no_ticket' => $no_ticket,
                'ticket_id' => $ticket->id,
                'created_at' => $time->toDateTimeString(),
                'updated_at' => $time->toDateTimeString()
            ]);              
            $ticket->problem_status_id = '2'; //status belum
            $ticket->ticket_status_id = '4'; //pending ticket 
            $ticket->alasan_pending = $request->alasan_pending;           
            $ticket->save();
        }
                 
        return redirect()->route('daftar-tiket');
    }

    public function response($status, $id)
    {
        $notif = DB::table('table_notification')->where('id', $id)->first();
        $user = Auth::user();   
        if($status == 'selesai') {
            $notif->response = $status;            
            $time = \Carbon\Carbon::now();            
            $insert = DB::table('table_notification')->insert([
                'judul' => 'Tiket '.$notif->no_ticket.' Sudah Selesai',
                'pesan' => $user->name.' Menyatakan masalah dengan nomor tiket '.$notif->no_ticket.' Sudah terselesaikan, tiket akan di close oleh sistem lihat detail tiket dan informasi lainnya dengan menekan pemberitahuan ini. Terima Kasih',
                'from' => $user->name,
                'no_ticket' => $notif->no_ticket,
                'response' => $status,
                'ticket_id' => $notif->ticket_id,
                'created_at' => $time->toDateTimeString(),
                'updated_at' => $time->toDateTimeString()
            ]);            
            DB::table('table_notification')->where('id', $id)->delete();
            $ticket = Tiket::where('no_ticket', $notif->no_ticket)->first();
            $ticket->problem_status_id = '1'; //status selesai
            $ticket->ticket_status_id = '3'; //close ticket
            $ticket->save();
        } else if('belum') {
            $time = \Carbon\Carbon::now();            
            $insert = DB::table('table_notification')->insert([
                'judul' => 'Tiket '.$notif->no_ticket.' Belum Selesai',
                'pesan' => $user->name.' Menyatakan masalah dengan nomor tiket '.$notif->no_ticket.' Belum terselesaikan, lihat detail tiket dan informasi lainnya dengan menekan pemberitahuan ini. Terima Kasih',
                'from' => $user->name,
                'no_ticket' => $notif->no_ticket,
                'ticket_id' => $notif->ticket_id,
                'created_at' => $time->toDateTimeString(),
                'updated_at' => $time->toDateTimeString()
            ]);
            DB::table('table_notification')->where('id', $id)->delete();
            $ticket = Tiket::where('no_ticket', $notif->no_ticket)->first();
            $ticket->problem_status_id = '2'; //status belum
            $ticket->ticket_status_id = '2'; //open ticket            
            $ticket->save();
        }
        return redirect()->route('daftar-tiket');
    }
}
