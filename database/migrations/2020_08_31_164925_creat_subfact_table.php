<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatSubfactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if (!Schema::hasTable('subfacts')) {    
            Schema::create('subfacts', function (Blueprint $table) {
                $table->id();
                $table->string('subfact_description', 50)->comment('Descrição do SubFato');
            
                $table->unsignedBigInteger('fact_id')->nullable();                        
                $table->foreign('fact_id')->references('id')->on('facts');  

                $table->char('st', 1)->default('A')->comment('Status do Registro: A - Ativo; C - Cancelado;');
                //$table->timestamps();                            
            });
            DB::statement("ALTER TABLE subfacts COMMENT = 'SubFato'");
        };        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('subfacts');
    }
}
