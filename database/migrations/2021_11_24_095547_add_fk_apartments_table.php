<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apartments', function (Blueprint $table) {
            // CREO LA COLONNA USER_ID
            $table->unsignedBigInteger('user_id')->nullable()->after('slug');
            // SETTO LA COLONNA COME CHIAVE ESTERNA
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartments', function (Blueprint $table) {
            // RIMOZIONE CHIAVE ESTERNA
            $table->dropForeign('apartments_user_id_foreign');
            // DROP DELLA COLONNA
            $table->dropColumn('user_id');
        });
    }
}
