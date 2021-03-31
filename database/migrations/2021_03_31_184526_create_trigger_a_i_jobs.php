<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerAIJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*public function up()
    {
        DB::unprepared("CREATE TRIGGER TRG_AITRABAJO AFTER INSERT ON trabajos FOR EACH ROW
BEGIN
	DECLARE SERV varchar(50);
    DECLARE DATE_AUX DATE;
    SET SERV = '';
    SET SERV = (SELECT S.NOMBRE FROM servicios S WHERE ((S.ID_SERVICIO = NEW.ID_SERVICIO) AND (S.NOMBRE LIKE '%SERVICE%')));
    IF (SERV <> '') THEN
    	/*Me fijo si ya hay una tupla en estimación para este auto*//*
        IF (NOT EXISTS (SELECT * FROM estimacions E WHERE E.ID_VEHICULO = NEW.ID_VEHICULO)) THEN
        	BEGIN
            	SET DATE_AUX = DATE_ADD(NEW.FECHA, INTERVAL 1 YEAR);
                INSERT INTO estimacions(FECHA_ESTIMADA_AVISO, PROMEDIO, MAIL_ENVIADO, FECHA_ULTIMO_TRABAJO, ACTIVADA, ID_VEHICULO)
                VALUES (DATE_AUX, 0, 0, NEW.FECHA, 1, NEW.ID_VEHICULO);	
            END;
        ELSEIF ((SELECT E.PROMEDIO FROM estimacions E WHERE NEW.ID_VEHICULO = E.ID_VEHICULO) = 0) THEN
        	/*Esto significa que es la segunda tupla en insertarse*//*
            BEGIN
            	UPDATE estimacions SET PROMEDIO = DATEDIFF(NEW.FECHA, FECHA_ULTIMO_TRABAJO) WHERE ID_VEHICULO = NEW.ID_VEHICULO;
                UPDATE estimacions SET FECHA_ESTIMADA_AVISO = DATE_ADD(NEW.FECHA, INTERVAL PROMEDIO DAY) WHERE ID_VEHICULO = NEW.ID_VEHICULO;
                UPDATE estimacions SET FECHA_ULTIMO_TRABAJO = NEW.FECHA WHERE ID_VEHICULO = NEW.ID_VEHICULO;
                UPDATE estimacions SET MAIL_ENVIADO= 0 WHERE ID_VEHICULO = NEW.ID_VEHICULO;
            END;
        ELSE
         /*Esto significa que es la tupla N en insertarse*//*
         	BEGIN
            	UPDATE estimacions SET PROMEDIO = ((PROMEDIO + DATEDIFF(NEW.FECHA, FECHA_ULTIMO_TRABAJO)) / 2) WHERE ID_VEHICULO = NEW.ID_VEHICULO;
                UPDATE estimacions SET FECHA_ESTIMADA_AVISO = DATE_ADD(NEW.FECHA, INTERVAL PROMEDIO DAY) WHERE ID_VEHICULO = NEW.ID_VEHICULO;
                UPDATE estimacions SET FECHA_ULTIMO_TRABAJO = NEW.FECHA WHERE ID_VEHICULO = NEW.ID_VEHICULO;
                UPDATE estimacions SET MAIL_ENVIADO= 0 WHERE ID_VEHICULO = NEW.ID_VEHICULO;
            END;
        END IF;
	END IF;
END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*DB::unprepared('DROP TRIGGER IF EXISTS TRG_AITRABAJO');*/
    }
}
