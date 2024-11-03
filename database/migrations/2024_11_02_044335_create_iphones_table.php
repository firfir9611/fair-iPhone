<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('iphones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color');
            $table->string('storage');
            $table->integer('rent_price');
            $table->integer('stok');
            $table->string('display');
            $table->string('os');
            $table->string('rearcam');
            $table->string('selfie');
            $table->string('chipset');
            $table->string('battey');
            $table->string('dimention');
            $table->date('launch_at');
            $table->text('img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iphones');
    }
};
