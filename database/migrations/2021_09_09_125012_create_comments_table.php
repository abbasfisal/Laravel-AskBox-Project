<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ask_id')->constrained('asks')
                ->cascadeOnDelete();


            $table->foreignId('user_id')->constrained('users')
                ->cascadeOnDelete();


            $table->foreignId('comment_id')
                ->nullable()
                ->constrained('comments')
                ->cascadeOnDelete()
                ; //parent_id



            $table->string('text');

            $table->boolean('is_admin')->default(false); //determine comment belong to admin


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
        Schema::dropIfExists('comments');
    }
}
