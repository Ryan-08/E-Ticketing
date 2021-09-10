<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('tickets_status', function (Blueprint $table) {
            $table->id();
            $table->string('t_status');                        
            $table->timestamps();
        });

        Schema::create('problems_status', function (Blueprint $table) {
            $table->id();
            $table->string('p_status');            
            $table->timestamps();
        });
        
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('no_ticket')->default('-');
            $table->string('problem');
            $table->string('description');
            $table->string('image_path')->nullable();
            $table->string('alasan_pending')->nullable();
            
            $table->unsignedBigInteger('ticket_status_id')->default('1');
            $table->unsignedBigInteger('problem_status_id')->default('2');
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            
            $table->foreign('ticket_status_id')
                ->references('id')
                ->on('tickets_status')
                ->onDelete('cascade');;
            
            $table->foreign('problem_status_id')
                ->references('id')
                ->on('problems_status')
                ->onDelete('cascade');;

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {             
        Schema::dropIfExists('t_status');     
        Schema::dropIfExists('p_status');     
        Schema::dropIfExists('tickets');
    }
}
