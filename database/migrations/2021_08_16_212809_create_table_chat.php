<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_chat', function (Blueprint $table) {
            $table->id();            
            $table->string('user');            
            $table->string('no_ticket');                        
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->timestamps();

            $table->foreign('ticket_id')
                ->references('id')
                ->on('tickets')
                ->onDelete('cascade');
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('message')->nullable();                  
            $table->string('no_ticket')->nullable();                  
            $table->unsignedBigInteger('chat_id')->nullable();
            $table->timestamps();

            $table->foreign('chat_id')
                ->references('id')
                ->on('table_chat')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_chat');
        Schema::dropIfExists('messages');
    }
}
