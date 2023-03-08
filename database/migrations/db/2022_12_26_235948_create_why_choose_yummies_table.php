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
        Schema::create('why_choose_yummies', function (Blueprint $table) {
            $table->id();
            $table->string('title1');
            $table->string('desc1');
            $table->string('title2');
            $table->string('desc2');
            $table->string('title3');
            $table->string('desc3');
            $table->string('title4');
            $table->string('desc4');
            $table->foreignId('user_id')->constrained()->default('1');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('why_choose_yummies');
    }
};
