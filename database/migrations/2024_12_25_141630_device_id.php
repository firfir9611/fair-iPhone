<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\iphone;
use App\Models\unit_color;
use App\Models\unit_storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unit_ids', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(iphone::class);
            $table->foreignIdFor(unit_color::class)->nullable();
            $table->foreignIdFor(unit_storage::class)->nullable();
            $table->string('battery_health')->nullable();
            $table->integer('rent_price')->nullable();
            $table->integer('stok')->default(0);
            $table->integer('stok_booked')->default(0);
            $table->integer('show')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_ids');
    }
};
