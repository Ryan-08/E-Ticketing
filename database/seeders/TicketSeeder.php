<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tiket;
use DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets_status')->insert([
            ['t_status' => 'waiting'],            
            ['t_status' => 'open'],            
            ['t_status' => 'close'],            
            ['t_status' => 'pending'],            
        ]);

        DB::table('problems_status')->insert([
            ['p_status' => 'selesai'],            
            ['p_status' => 'belum'],            
        ]);

        // Tiket::create([
        //     'no_ticket' => '1',
        //     'problem' => 'admin',
        //     'description' => 'admin@admin.com',            
        // ]);
    }
}
