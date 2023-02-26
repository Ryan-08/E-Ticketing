<?php

use App\Models\Tiket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
use \Carbon\CarbonPeriod;

if ( ! function_exists('generateBarcodeNumber'))
{
    function generateBarcodeNumber() {
        $number = mt_rand(00001, 99999); // better than rand()

        // call the same function if the barcode exists already
        if (barcodeNumberExists($number)) {
            return generateBarcodeNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }
}
if ( ! function_exists('barcodeNumberExists'))
{
    function barcodeNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Tiket::whereNoTicket($number)->exists();
    }
}
    function getNotification() {
        $notif = DB::table('table_notification')
                ->orderByDesc('created_at')
                ->get();
        // auto close after 10 minutes with no response from user
        foreach($notif as $notifikasi) {
            if($notifikasi->from == "admin") {
                $ticket = Tiket::where('no_ticket', $notifikasi->no_ticket)->first();
                $createdAt = Carbon::parse($notifikasi->created_at);
                $timerNoResponse = $createdAt->diffInMinutes(Carbon::now()) > 10;
                if($timerNoResponse && $ticket->ticket_status_id == 2 && $notifikasi->response == null) {
                    $notifikasi->response = 'selesai';                    
                    $ticket->problem_status_id = '1'; //status selesai
                    $ticket->ticket_status_id = '3'; //close ticket
                    $ticket->save();            
                }
            }   
        }                      
        return $notif;
    }

    function getGraph($data, $role = null, $id = null)
    {                         
        // $now = Carbon::now();                       
		// dd($data, $id);
        // $startTahun = $now->startOfDecade()->format('Y-m-d');
        // $endTahun = $now->endOfDecade()->format('Y-m-d');
        // dd($startTahun, $endTahun);
        // dd($role);
        if ($data == 'hari') {
			if ($role == 'user') {	                
				return graphToday($role, $id);
			} else {
				return graphToday();
			}			            
        } else if ($data == 'minggu') {                                    
			if ($role == 'user') {				
				return graphThisWeek($role, $id);
			} else {
				return graphThisWeek();
			}			         
        } else if ($data == 'bulan') {        
			if ($role == 'user') {				
				return graphThisMonth($role, $id);
			} else {
				return graphThisMonth();
			}
        } else if ($data == 'tahun') {
            if ($role == 'user') {				
				return graphThisYear($role, $id);
			} else {
				return graphThisYear();
			}
        }
    }

    function graphToday($role = null, $id = null)
    {
		$now = Carbon::now();  
        $startHour = $now->startOfDay()->format('Y-m-d H:i');
        $endHour = $now->endOfDay()->format('Y-m-d H:i');
        // dd($role);
        if($role == 'user'){                
            $result = DB::table('tickets')                        
                    ->where('user_id', $id)
                    ->whereBetween('updated_at', [\Carbon\Carbon::now()->startOfDay(), \Carbon\Carbon::now()->endOfDay()])                     
                    ->select('ticket_status_id', DB::raw('updated_at as date'), DB::raw('count(*) as jumlah_tiket'))                        
                    ->groupBy('ticket_status_id', 'date');
        } else {
            $result = DB::table('tickets')    
                    ->whereBetween('updated_at', [\Carbon\Carbon::now()->startOfDay(), \Carbon\Carbon::now()->endOfDay()])                                         
                    ->select('ticket_status_id', DB::raw('updated_at as date'), DB::raw('count(*) as jumlah_tiket'))
                    ->groupBy('ticket_status_id', 'date');
        }   
        $joined = DB::table('tickets_status')
                    ->where('t_status', '!=', 'waiting')                                  
                    ->leftJoinSub($result, 'jumlah_tiket', function ($join) {
                        $join->on('tickets_status.id', '=', 'jumlah_tiket.ticket_status_id');
                    })->get();          
        // jam dari 00:00-23:00      
        // dd($role, $id);
        $periodTime = CarbonPeriod::since($startHour)->hours(1)->until($endHour)->toArray();
        
        foreach ($periodTime as $key => $hour) {
			$open[$key] = 0;
			$pending[$key] = 0;
			$close[$key] = 0;				          
			// Insert dates into labels Array
			$labels[] = $hour->format('H:i');
            $jopen = 0;
            $jclose = 0;
            $jpending = 0;
			foreach($joined as $value) { 
				// insert data to array
				$check = $hour->format('H:m');
				$dateFormatted = date('H:m', strtotime($value->date));
				$status = $value->t_status;
				$value = $value->jumlah_tiket;
				// dd($dateFormatted, $check);
				if ($dateFormatted == $check && $status == 'open') {
                    $jopen++;
					$open[$key] = $jopen;								
				} else if ($dateFormatted == $check && $status == 'pending') {
                    $jpending++;
					$pending[$key] = $jpending;					
				} else if ($dateFormatted == $check && $status == 'close') {
                    $jclose++;
					$close[$key] = $jclose;								
				}					
			}                              
        }  
        return [$labels, $open, $close, $pending];
    }

    function graphThisWeek($role=null, $id = null)
    {
		$now = Carbon::now();  
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');
        if($role == 'user'){                
            $result = DB::table('tickets')                        
                    ->where('user_id', $id)
                    ->whereBetween('updated_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])                     
                    ->select('ticket_status_id', DB::raw('updated_at as date'), DB::raw('count(*) as jumlah_tiket'))                        
                    ->groupBy( 'ticket_status_id','date');                
        } else {
            $result = DB::table('tickets')    
                    ->whereBetween('updated_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])                                         
                    ->select('ticket_status_id', DB::raw('updated_at as date'), DB::raw('count(*) as jumlah_tiket'))
                    ->groupBy('ticket_status_id', 'date');
        }   		
        $joined = DB::table('tickets_status')
                    ->where('t_status', '!=', 'waiting')                                  
                    ->leftJoinSub($result, 'jumlah_tiket', function ($join) {
                        $join->on('tickets_status.id', '=', 'jumlah_tiket.ticket_status_id');
                    })->get();    
        // dd($joined);
        // tanggal dalam minggu ini
        $periodTime = CarbonPeriod::create($weekStartDate, $weekEndDate);	
        	
        foreach ($periodTime as $key => $date) {			 
			$open[$key] = 0;
			$pending[$key] = 0;
			$close[$key] = 0;				          
			// Insert dates into labels Array
			$labels[] = $date->format('d/m');
            $jopen = 0;
            $jclose = 0;
            $jpending = 0;
			foreach($joined as $value) { 
				// insert data to array
				$check = $date->format('Y-m-d');
				$dateFormatted = date('Y-m-d', strtotime($value->date));
				$status = $value->t_status;
				$value = $value->jumlah_tiket;
				// dd($dateFormatted, $check);
				if ($dateFormatted == $check && $status == 'open') {
                    $jopen++;
					$open[$key] = $jopen;								
				} else if ($dateFormatted == $check && $status == 'pending') {
                    $jpending++;
					$pending[$key] = $jpending;					
				} else if ($dateFormatted == $check && $status == 'close') {
                    $jclose++;
					$close[$key] = $jclose;								
				}						
			}            		
        }  				
        return [$labels, $open, $close, $pending];
    }
    function graphThisMonth($role=null, $id = null)
    {
		$now = Carbon::now();  
        $startDate = $now->startOfMonth()->format('Y-m-d H:i');
        $endDate = $now->endOfMonth()->format('Y-m-d H:i');
        if($role == 'user'){                
            $result = DB::table('tickets')                        
                    ->where('user_id', $id)
                    ->whereBetween('updated_at', [\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfMonth()])                     
                    ->select('ticket_status_id', DB::raw('updated_at as date'), DB::raw('count(*) as jumlah_tiket'))                        
                    ->groupBy('ticket_status_id', 'date');                
        } else {
            $result = DB::table('tickets')    
                    ->whereBetween('updated_at', [\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfMonth()])                                         
                    ->select('ticket_status_id', DB::raw('updated_at as date'), DB::raw('count(*) as jumlah_tiket'))
                    ->groupBy('ticket_status_id', 'date');
        }   		
        $joined = DB::table('tickets_status')
                    ->where('t_status', '!=', 'waiting')                                  
                    ->leftJoinSub($result, 'jumlah_tiket', function ($join) {
                        $join->on('tickets_status.id', '=', 'jumlah_tiket.ticket_status_id');
                    })->get();                 
        // tanggal dalam minggu ini
        $periodTime = CarbonPeriod::create($startDate, $endDate);
        		
        foreach ($periodTime as $key => $date) {			 
			$open[$key] = 0;
			$pending[$key] = 0;
			$close[$key] = 0;				          
			// Insert dates into labels Array
			$labels[] = $date->format('d');
            $jopen = 0;
            $jclose = 0;
            $jpending = 0;
			foreach($joined as $value) { 
				// insert data to array
				$check = $date->format('Y-m-d');
				$dateFormatted = date('Y-m-d', strtotime($value->date));
				$status = $value->t_status;
				$value = $value->jumlah_tiket;
				// dd($dateFormatted, $check);
				if ($dateFormatted == $check && $status == 'open') {
                    $jopen++;
					$open[$key] = $jopen;								
				} else if ($dateFormatted == $check && $status == 'pending') {
                    $jpending++;
					$pending[$key] = $jpending;					
				} else if ($dateFormatted == $check && $status == 'close') {
                    $jclose++;
					$close[$key] = $jclose;								
				}						
			}            		
        }  				
        return [$labels, $open, $close, $pending];
    }
    function graphThisYear($role=null, $id = null)
    {
		$now = Carbon::now();  
        $startYear = $now->startOfYear()->format('Y-m-d');
        $endYear = $now->endOfYear()->format('Y-m-d');
        if($role == 'user'){
            $result = DB::table('tickets')                        
                    ->where('user_id', $id)
                    ->whereBetween('updated_at', [\Carbon\Carbon::now()->startOfYear(), \Carbon\Carbon::now()->endOfYear()])                     
                    ->select('ticket_status_id', DB::raw('updated_at as date'), DB::raw('count(*) as jumlah_tiket'))                        
                    ->groupBy('ticket_status_id', 'date');                
        } else {
            $result = DB::table('tickets')    
                    ->whereBetween('updated_at', [\Carbon\Carbon::now()->startOfYear(), \Carbon\Carbon::now()->endOfYear()])                                         
                    ->select('ticket_status_id', DB::raw('updated_at as date'), DB::raw('count(*) as jumlah_tiket'))
                    ->groupBy('ticket_status_id', 'date');
        }   		
        $joined = DB::table('tickets_status')
                    ->where('t_status', '!=', 'waiting')                                  
                    ->leftJoinSub($result, 'jumlah_tiket', function ($join) {
                        $join->on('tickets_status.id', '=', 'jumlah_tiket.ticket_status_id');
                    })->get();   
        // dd($joined);
        // tanggal dalam minggu ini
        $periodTime = CarbonPeriod::create($startYear, $endYear);
        
        foreach ($periodTime as $key => $date) {			 
			$open[$key] = 0;
			$pending[$key] = 0;
			$close[$key] = 0;				          
			// Insert dates into labels Array
			$labels[] = $date->format('M');
            $jopen = 0;
            $jclose = 0;
            $jpending = 0;
			foreach($joined as $value) { 
				// insert data to array
				$check = $date->format('Y-m-d');
				$dateFormatted = date('Y-m-d', strtotime($value->date));
				$status = $value->t_status;
				$value = $value->jumlah_tiket;
				// dd($dateFormatted, $check);
				if ($dateFormatted == $check && $status == 'open') {
                    $jopen++;
					$open[$key] = $jopen;								
				} else if ($dateFormatted == $check && $status == 'pending') {
                    $jpending++;
					$pending[$key] = $jpending;					
				} else if ($dateFormatted == $check && $status == 'close') {
                    $jclose++;
					$close[$key] = $jclose;								
				}					
			}            		
        }  				
        return [$labels, $open, $close, $pending];
    }
?>