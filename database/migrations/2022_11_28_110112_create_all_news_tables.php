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
        if(!Schema::hasTable('news')){
            Schema::create('news', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug_name');
                $table->longText('text');
                $table->string('document_name')->nullable();
                $table->string('document_path')->nullable();
                $table->unsignedBigInteger('author_id');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('comments')){
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('news_id');
                $table->string('text');
                $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('tags')){
            Schema::create('tags', function (Blueprint $table) {
                $table->id();
                $table->string('tag_name');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('tag_news')){
            Schema::create('tag_news', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('tag_id');
                $table->unsignedBigInteger('news_id');
                $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
                $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('tag_news');
    }
};
