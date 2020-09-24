<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateServiceTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('service_teams')) {
            Schema::create('service_teams', function (Blueprint $table) {
                $table->id();
                $table->date('date');

                $table->integer('military_server_id')->comment('ID do Servidor');
                $table->foreign('military_server_id')->references('id')->on('pessoal.servidor');            

                $table->integer('hour_shift')->comment('Turno em Horas: 6 horas; 12 horas; 24 horas; 36 horas; 48 horas;');

                $table->dateTime('start_date_time')->comment('Data e Hora Inicial');
                $table->dateTime('end_date_time')->comment('Data e Hora Final');
                $table->string('note', 100)->comment('Observação')->nullable();
            
                $table->integer('military_organization_id')->comment('ID do Organização Operacional Militar');
                $table->foreign('military_organization_id')->references('id')->on('pessoal.opm');            

                $table->integer('locality_id')->comment('ID da Localidade');
                $table->foreign('locality_id')->references('id')->on('pessoal.localidade');            
                 
                $table->char('service_status', 1)->comment('Status do Serviço: S - Em Servico; F - Servico Finalizado;');
            
                $table->unsignedBigInteger('service_vehicles_id')->nullable();                        
                $table->foreign('service_vehicles_id')->references('id')->on('service_vehicles');            

                $table->char('st', 1)->default('A')->comment('Status do Registro: A - Ativo; C - Cancelado;');

                //$table->timestamps();                
            });
            DB::statement("ALTER TABLE service_teams COMMENT = 'Equipe de Serviço'");
        }; 
        
        Schema::table('service_teams', function($table){
            if (!Schema::hasColumn('service_teams', 'team_functions_id')) {
                    $table->unsignedBigInteger('team_functions_id')->nullable();                        
                    $table->foreign('team_functions_id')->references('id')->on('team_functions');                    
            }            
        });    


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('service_teams');
    }
}
