<?php

use App\Models\iphone;
use App\Models\unit_storage;
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
        Schema::create('iphone_storages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(iphone::class)->nullable();
            $table->foreignIdFor(unit_storage::class)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iphone_storages');
    }
};
