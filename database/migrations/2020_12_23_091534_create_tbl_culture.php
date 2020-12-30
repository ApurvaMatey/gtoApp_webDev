<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCulture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_culture', function (Blueprint $table) {
            $table->increments("id");
            $table->string("title");
            $table->text("description")->comment('html text editor');
            $table->string("imagePath");
            $table->string("url");
            $table->integer("addedBy");
            $table->timestamp("createdAt")->useCurrent();
            $table->timestamp("updatedAt")->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('tbl_culture');
    }
}
