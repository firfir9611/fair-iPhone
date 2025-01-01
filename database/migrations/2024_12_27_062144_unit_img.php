<?php

use App\Models\unit_id;
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
        Schema::create('unit_imgs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(unit_id::class);
            $table->string('front')->nullable();
            $table->string('back')->nullable();
            $table->string('top')->nullable();
            $table->string('bottom')->nullable();
            $table->string('left')->nullable();
            $table->string('right')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_imgs');
    }
};
