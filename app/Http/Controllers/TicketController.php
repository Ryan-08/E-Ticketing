<?php

namespace App\Http\Controllers;

use App\Models\pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\Tiket;
use App\Models\User;
use App\Models\Todo;
use Hamcrest\Arrays\IsArray;

class TicketController extends Controller
{
    // 1, waiting
    // 2, open
    // 3, close
    // 4, pending
    // id used here is no ticket
    // check status from no ticket then redirect to certain page
    public function detail($no_ticket) {
        $user = Auth::user();
        $notif = getNotification();
        $tiket = Tiket::where('no_ticket', $no_ticket)->first();
        $data = User::where('id', $tiket->user_id)->first();        
        $id = $tiket->ticket_status_id; 
        $input = ['title' => $no_ticket, 'description' => $tiket->description, 'user_id' => $user->id];        
        // log activity          
        $todoStatus = Todo::create($input);
        // Add activity logs
        activity('todo')
            ->performedOn($todoStatus)
            ->causedBy($user)            
            ->log('Todo created by ' . $user->name);
        // $request->session()->flash('success', 'Todo successfully added');        
        if($id == 2){
            // open            
            return redirect()->route('response', $no_ticket);
        }
        return view('admin.detail-tiket', ['id'=>$id, 'user' => $user, 'tiket' => $tiket, 'data' => $data, 'notif' => $notif]);
    }
    public function tanggapan($no_ticket) {
        $user = Auth::user();
        $notif = getNotification();
        $tiket = Tiket::where('no_ticket', $no_ticket)->first();
        $data = User::where('id', $tiket->user_id)->first();
        $tiket->ticket_status_id = '2';
        $tiket->save();
        $question = pertanyaan::where('no_ticket', $no_ticket)->get();
        return view('admin.tanggapan', ['user' => $user, 'tiket' => $tiket, 'data' => $data, 'notif' => $notif, 'question' => $question]);
    }    

    public function updateQuest(Request $request, $no_ticket)
    {
        $listofQuest = $request->listofQuest;
        $oldQuest = pertanyaan::where('no_ticket', $no_ticket)->get();                
        if($listofQuest != null){
            foreach ($listofQuest as $key => $value) {
                $sama = false;
                if($oldQuest != null) {
                    foreach ($oldQuest as $item) {
                        if ($value == $item->pertanyaan) {
                            $sama = true;
                        }                    
                    }
                }                
                if(!$sama){                    
                    pertanyaan::create([
                        'pertanyaan' => $value,
                        'no_ticket' => $no_ticket,
                    ]);
                }                
            }
         }
        //   else {
        //     // if(is_array($listofQuest)) {
        //         // dd($listofQuest);
        //         foreach ($listofQuest as $key => $value) {
        //             pertanyaan::create([
        //                 'pertanyaan' => $value,
        //                 'no_ticket' => $no_ticket,
        //             ]);
        //         }   
        //     // } else {
        //     //     pertanyaan::create([
        //     //             'pertanyaan' => $listofQuest[0],
        //     //             'no_ticket' => $no_ticket,
        //     //         ]);
        //     // }

        // }
        return redirect()->route('response', $no_ticket);
    }

    public function deleteQuest($id, $quest) {        
        // dd($quest);
        pertanyaan::destroy($quest);
        
        return redirect()->route('response', $id);
    } 

    public function postLaporan(Request $request) {
        $id = Auth::id(); 
        $user = Auth::user();
        $problem = $request->judul;
        $desc = $request->deskripsi;
        $no_ticket = generateBarcodeNumber();       
        $laporan = Tiket::create([            
            'problem' => $problem,
            'description' => $desc,       
        ]);

        if($request->hasFile('lampiran')){
            $ext = $request->file('lampiran')->extension();
            $filename = 'lampiran-'.$no_ticket.'.'.$ext;
            $this->validate($request, ['lampiran' => 'required|file|max:10000']);
            
            $path = Storage::putFileAs(
                'public/lampiran', $request->file('lampiran'), $filename
            ); 
            
            $laporan->image_path = $filename;
        }
        $laporan->no_ticket = $no_ticket;
        $laporan->user_id = $id;

        $laporan->save();      
        
        $time = \Carbon\Carbon::now();
        $insert = DB::table('table_notification')->insert([
                'judul' => 'Tiket baru dengan nomor '.$no_ticket,
                'pesan' => 'Masalah dengan nomor tiket '.$no_ticket.' baru saja dilaporkan klik pemberitahuan ini untuk melihat detail tiket',
                'from' => $user->name,
                'no_ticket' => $no_ticket,
                'ticket_id' => $laporan->id,
                'created_at' => $time->toDateTimeString(),
                'updated_at' => $time->toDateTimeString()
            ]);
        return redirect()->route('daftar-tiket');
    }

    public function closeTicket($no_ticket)
    {
        $ticket = Tiket::where('no_ticket', $no_ticket)->first();
        $ticket->problem_status_id = '1'; //status selesai
        $ticket->ticket_status_id = '3'; //close ticket
        $ticket->save();

        return redirect()->route('daftar-tiket');
    }
}
