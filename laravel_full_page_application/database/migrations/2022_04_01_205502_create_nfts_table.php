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
        Schema::create('nfts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('author_id')->constrained('users');
            $table->foreignId('owner_id')->constrained('users');
            $table->foreignId('collection_id')->constrained('collections');
            $table->string('img_path');
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('royalty');

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
        Schema::dropIfExists('nfts');
    }
};
