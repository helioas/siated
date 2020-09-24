<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVehicletypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {      
        if (!Schema::hasTable('vehicle_types')) { 
            Schema::create('vehicle_types', function (Blueprint $table) {
                $table->id();
                $table->string('type_description', 30)->comment('Descrição do Tipo');
                $table->char('st', 1)->default('A')->comment('Status do Registro: A - Ativo; C - Cancelado;');
                //$table->timestamps();            
            });
            
            DB::statement("ALTER TABLE vehicle_types COMMENT = 'Tipo de Viatura'");
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('vehicle_types');
    }
}
