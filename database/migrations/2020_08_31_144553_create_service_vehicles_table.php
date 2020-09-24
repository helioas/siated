<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateServicevehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('service_vehicles')) {
            Schema::create('service_vehicles', function (Blueprint $table) {
                $table->id();

                $table->integer('vehicle_id')->comment('ID da Viatura');
                $table->foreign('vehicle_id')->references('idviatura')->on('veiculo._14_03_viatura');
            
                $table->unsignedBigInteger('vehicletype_id')->nullable();                        ;                        
                $table->foreign('vehicletype_id')->references('id')->on('vehicle_types');            
            
                $table->char('st', 1)->default('A')->comment('Status do Registro: A - Ativo; C - Cancelado;');
                //$table->timestamps();
            });

            DB::statement("ALTER TABLE service_vehicles COMMENT = 'Viatura de Serviço'");
        };        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('service_vehicles');
    }
}
