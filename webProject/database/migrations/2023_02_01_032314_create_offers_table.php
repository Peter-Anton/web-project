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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('description');
            $table->foreignId('offer_category_id');
            $table->foreignId('offer_company_id');
            $table->integer('price');
            $table->string('photo');
            $table->foreignId('offer_brief_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('offers');
    }
};
