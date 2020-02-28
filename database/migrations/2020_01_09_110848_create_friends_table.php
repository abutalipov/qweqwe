<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('friends', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('owner_user_id')->index();            
            $table->foreign('owner_user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('user_id')->index();            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('status')->unsigned()->index()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('friends');
    }

}
