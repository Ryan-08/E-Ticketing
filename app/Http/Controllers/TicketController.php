<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    // 1, waiting
    // 2, open
    // 3, close
    // 4, pending
    // id used here is no ticket
    // check status from no ticket then redirect to certain page
    public function detail($id) {
        if($id == 2){
            // open
            return redirect()->route('response', $id);
        } else if($id == 3) {
            // close
        } else if($id == 4) {
            // pending
        }
        return view('admin.detail-tiket', ['id'=>$id]);
    }
    public function tanggapan() {
        return view('admin.tanggapan');
    }    
}
