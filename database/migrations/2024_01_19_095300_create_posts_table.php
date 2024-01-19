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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            /*$table->unsignedBigInteger('user_id')->nullable();

            $table->index('user_id','posts_category_idx');

            $table->foreign('user_id','post_user_fk')->on('users')->references('id');*/
            $table->string('title');
            $table->string('slug');
            $table->text('text');
            $table->date('publish_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
