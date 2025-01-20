<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('wallet_type_id'); 
            $table->decimal('balance', 15, 2)->default(0); 
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('wallet_type_id')->references('id')->on('wallet_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wallets');
    }
}
