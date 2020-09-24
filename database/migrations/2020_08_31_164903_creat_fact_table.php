<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatFactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        if (!Schema::hasTable('facts')) {
            Schema::create('facts', function (Blueprint $table) {
                $table->id();
                $table->string('fact_description', 50)->comment('Descrição do Fato');
                $table->char('st', 1)->default('A')->comment('Status do Registro: A - Ativo; C - Cancelado;');
                //$table->timestamps();            
            });
            DB::statement("ALTER TABLE facts COMMENT = 'Fato'");
        };        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('facts');
    }
}
