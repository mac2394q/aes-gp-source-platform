<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."preauditoria_proyecto.php");
class preauditoria_proyectoDao
{
    public static function registrarPreuaditoria_proyecto($modelPreauditoria_proyecto){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `preauditoria_proyecto` VALUES (
                NULL,
                :id_item_grupo_plantilla_certificacion,
                :id_proyecto,
                :comentario_preauditoria,
                :estado_preauditoria
                )";

            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_item_grupo_plantilla_certificacion'=>$modelPreauditoria_proyecto->getId_item_grupo_plantilla_certificacion(),
                ':id_proyecto' =>$modelPreauditoria_proyecto->getId_proyecto(),
                ':comentario_preauditoria' =>$modelPreauditoria_proyecto->getComentario_preauditoria(),
                ':estado_preauditoria' =>$modelPreauditoria_proyecto->getEstado_preauditoria()
            ));
            return $resultado2;
    }


    public static function modificarPreauditoria_proyecto($modelPreauditoria_proyecto){
        $data_source = new DataSource();
             $sql2 = "UPDATE `preauditoria_proyecto` SET
                id_item_grupo_plantilla_certificacion=:id_item_grupo_plantilla_certificacion,
                comentario_preauditoria=:comentario_preauditoria,
                estado_preauditoria=:estado_preauditoria,
                WHERE id_preauditoria_item_proyecto = :id_preauditoria_item_proyecto
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_trabajo_proyecto' =>$modelPreauditoria_proyecto->getId_trabajo_proyecto(),
                ':id_plantilla_alcance_proyecto' =>$modelPreauditoria_proyecto->getId_plantilla_alcance_proyecto(),
                ':estado_proyecto' =>$modelPreauditoria_proyecto->getEstado_proyecto()
            ));
            return $resultado2;
    }





    public static function preauditoria_proyectoId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `preauditoria_proyecto` where id_preauditoria_item_proyecto = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objpreauditoria_proyecto = new preauditoria_proyecto(
            $data_table[0]["id_preauditoria_item_proyecto"],
            $data_table[0]["id_item_grupo_plantilla_certificacion"],
            $data_table[0]["id_proyecto"],
            $data_table[0]["comentario_preauditoria"],
            $data_table[0]["estado_preauditoria"]            
        );
        return $objpreauditoria_proyecto;
    }

    public static function listadoPreuaditoria_proyecto()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `preaudiotoria_proyecto`   ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objpreauditoria_proyecto = new preauditoria_proyecto(
                    $data_table[$key]["id_preauditoria_item_proyecto"],
                    $data_table[$key]["id_item_grupo_plantilla_certificacion"],
                    $data_table[$key]["id_proyecto"],
                    $data_table[$key]["comentario_preauditoria"],
                    $data_table[$key]["	estado_preauditoria"]
                );
                array_push($arrayAuditores,$objpreauditoria_proyecto);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }




    public static function ultimaPreauditoria_proyectoRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `preauditoria_proyecto` as 'numero' ORDER BY `preauditoria_proyecto`.`id_preauditoria_item_proyecto` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}