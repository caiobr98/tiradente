<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoleculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moleculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('laboratorio', 100);
            $table->string('molecula', 100);
            $table->string('apresentacao', 255);
            $table->text('particularidades');
            $table->string('via_administracao', 50);
            $table->string('forma_farmaceutica', 100);
            $table->string('tempo_administracao', 100);
            $table->string('reconstituinte', 50);
            $table->string('reconstituicao_concentracao', 50);
            $table->string('estabilidade_apos_constituicao', 100);
            $table->string('diluente', 50);
            $table->string('volume', 50);
            $table->string('diluicao_concentracao', 50);
            $table->string('estabilidade_apos_diluicao', 50);
            $table->string('proteger_luz', 50);
            $table->string('referencias', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moleculas');
    }
}
