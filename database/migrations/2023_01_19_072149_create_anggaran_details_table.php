<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anggaran_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->integer('biaya')->default(0);
            $table->timestamp('tanggal');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggaran_details');
    }
};
