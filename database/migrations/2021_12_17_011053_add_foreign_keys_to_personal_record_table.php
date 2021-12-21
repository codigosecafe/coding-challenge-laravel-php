<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonalRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personal_record', function (Blueprint $table) {
            $table->foreign(['user_id'], 'personal_record_ 0')->references(['id'])->on('user')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['movement_id'], 'personal_record_ 1')->references(['id'])->on('movement')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_record', function (Blueprint $table) {
            $table->dropForeign('personal_record_ 0');
            $table->dropForeign('personal_record_ 1');
        });
    }
}
