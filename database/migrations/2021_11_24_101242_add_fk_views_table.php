<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('views', function (Blueprint $table) {
            // CREO LA COLONNA APARTMENT_ID
            $table->unsignedBigInteger('apartment_id')->nullable()->after('date');
            // SETTO LA COLONNA COME CHIAVE ESTERNA
            $table->foreign('apartment_id')->references('id')->on('apartments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('views', function (Blueprint $table) {
            // RIMOZIONE CHIAVE ESTERNA
            $table->dropForeign('views_apartment_id_foreign');
            // DROP DELLA COLONNA
            $table->dropColumn('apartment_id');
        });
    }
}
