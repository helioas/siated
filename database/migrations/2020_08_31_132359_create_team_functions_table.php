<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTeamfunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('team_functions')) {
            Schema::create('team_functions', function (Blueprint $table) {
                $table->id();
                $table->string('description_function', 30)->comment('Descrição da Função');;
                $table->char('st', 1)->default('A')->comment('Status do Registro: A - Ativo; C - Cancelado;');
                //$table->timestamps();
            });
            DB::statement("ALTER TABLE team_functions COMMENT = 'Função da Equipe'");
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('team_functions');
    }
}
