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
        Schema::create('expenses_apps_out', function (Blueprint $table) {
            $table->id();
           $table->integer('user_id');
            $table->date('date');
            $table->string('details');
            $table->float('amount');
            $table->string('remark')->nullable();
            $table->timestamps();
        });

        Schema::create('expenses_apps_in', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('date');
            $table->string('details');
            $table->float('amount');
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses_apps');
    }
};
