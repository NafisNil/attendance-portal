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
        Schema::create('attendance_records', function (Blueprint $table) {
            $table->id();
            $table->string('device_sn');
            $table->unsignedBigInteger('record_id'); // RecordID from terminal
            $table->string('user_id')->nullable();
            $table->integer('record_type'); // 1: Card, 2: Fingerprint, 3: Face
            $table->timestamp('record_date');
            $table->boolean('is_entry')->default(true);
            $table->float('body_temp')->nullable();
            $table->string('photo_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_records');
    }
};
