<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."implementacion_colaborador.php");
class Implementacion_colaboradorDao
{
    public static function registrarImplementacion_colaborador($modelImplementacion_colaborador){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `implementacion_colaborador` VALUES (
                NULL,
                :id_colaborador_implementacion
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_colaborador_implementacion' =>$modelImplementacion_colaborador->getId_colaborador_implementacion()
            ));
            return $resultado2;
    }
    public static function modificarImplementacion_colaborador(implementacion_colaborador $Implementacion_colaborador){
        $data_source = new DataSource();
             $sql2 = "UPDATE `implementacion_colaborador` SET
                id_colaborador_implementacion=:id_colaborador_implementacion,
                WHERE id_implementacion_item__proyecto= :id_implementacion_item_proyecto
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_implementacion_item__proyecto'=>$Implementacion_colaborador->getId_implentacion_item_proyecto(),
                ':id_colaborador_implementacion' =>$Implementacion_colaborador->getId_colaborador_implementacion()
            ));
            return $resultado2;
    }

    public static function Implementacion__colaboradorId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM implementacion_colaborador WHERE Id_implentacion_item_proyecto = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objimplementacion_colaborador = new implementacion_colaborador(
            $data_table[0]['id_implementacion_item__proyecto'],
            $data_table[0]["id_colaborador_implementacion"] 
        );
        return $objimplementacion_colaborador;
    }
    public static function listadoImplementacion_colaborador()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `implementacion_colaborador`   ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objimplementacion_colaborador = new implentacion_colaborador(
                    $data_table[$key]["	id_implementacion_item_proyecto"],
                    $data_table[$key]["	id_colaborador_implementacion"]
                );
                array_push($arrayAuditores,$objimplementacion_colaborador);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function ultimaImplementacion_colaboradorRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `implementacion_colaborador` as 'numero' ORDER BY `implementacion_colaborador`.`	id_implementacion_item_proyecto` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}