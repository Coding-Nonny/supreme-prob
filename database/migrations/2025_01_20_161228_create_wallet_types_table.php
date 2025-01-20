<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletTypesTable extends Migration
{
    public function up()
    {
        Schema::create('wallet_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('minimum_balance', 15, 2)->default(0);
            $table->decimal('monthly_interest_rate', 5, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wallet_types');
    }
}
