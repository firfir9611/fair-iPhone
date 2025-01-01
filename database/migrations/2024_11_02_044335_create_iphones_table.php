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
            $table->string('model')->nullable();
            $table->string('name')->nullable();
            $table->integer('stok_spare')->nullable();
            $table->integer('stok_ready')->nullable();
            $table->string('display')->nullable();
            $table->string('os')->nullable();
            $table->string('rearcam')->nullable();
            $table->string('selfie')->nullable();
            $table->string('chipset')->nullable();
            $table->string('battery')->nullable();
            $table->string('dimention')->nullable();
            $table->date('launch_at')->nullable();
            $table->integer('show')->default(1);
            $table->softDeletes();
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
