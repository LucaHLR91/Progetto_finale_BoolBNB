<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            // CREO LA COLONNA APARTMENT_ID
            $table->unsignedBigInteger('apartment_id')->nullable()->after('date');
            // SETTO LA COLONNA COME CHIAVE ESTERNA
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            // RIMOZIONE CHIAVE ESTERNA
            $table->dropForeign('messages_apartment_id_foreign');
            // DROP DELLA COLONNA
            $table->dropColumn('apartment_id');
        });
    }
}
