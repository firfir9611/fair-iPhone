<?php

use App\Models\unit_code;
use App\Models\User;
use App\Models\unit_id;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(unit_id::class);
            // $table->foreignIdFor(unit_code::class);
            $table->integer('rented_price')->nullable();
            $table->integer('dp')->nullable();
            $table->integer('shipping_cost')->nullable();
            $table->integer('total_paid')->nullable();
            $table->integer('penalty')->default(0);
            $table->string('rented_battery_health')->nullable();
            $table->integer('status')->nullable();
            $table->date('rent_at')->nullable();
            $table->date('return_plan')->nullable();
            $table->date('return_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
