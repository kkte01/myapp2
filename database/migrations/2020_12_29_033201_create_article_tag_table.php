<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('article_id')->unsigned()->comment('article 아이디 참조 컬럼');
            $table->bigInteger('tag_id')->unsigned()->comment('tag 아이디 참조 컬럼');
            //외래 키 설정
            $table->foreign('article_id')->references('id')->on('articles')
                ->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')
                ->onDelete('cascade');
        });
    }
    /**Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tag');
    }
}
