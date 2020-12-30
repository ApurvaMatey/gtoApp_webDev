<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEmergencyNo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_emergency_no', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("number")->comment('3 digits only');
            $table->string("colorCode");
            $table->text("description");
            $table->integer("callCount");
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
        // Schema::dropIfExists('tbl_emergency_no');
    }
}
