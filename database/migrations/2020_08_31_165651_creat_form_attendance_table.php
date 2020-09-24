<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatFormAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        if (!Schema::hasTable('form_attendances')) {
            Schema::create('form_attendances', function (Blueprint $table) {
                $table->id();
                $table->string('description_form_attendance', 50)->comment('Descrição Forma de Atendimento');            
                $table->char('st', 1)->default('A')->comment('Status do Registro: A - Ativo; C - Cancelado;');
                //$table->timestamps();                            
            });            
            DB::statement("ALTER TABLE form_attendances COMMENT = 'Forma de Atendimento'");
        }

        //Para inserir/modificar novos campos, usar essa estrutura
        Schema::table('form_attendances', function($table){
            /*if (!Schema::hasColumn('form_attendances', 'active')) {
                $table->char('active', 1)->nullable();
            }*/            
        });        

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('form_attendances');
    }
}
