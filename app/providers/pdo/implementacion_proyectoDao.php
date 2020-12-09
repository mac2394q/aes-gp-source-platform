<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."implementacion_proyecto.php");
class implementacion_proyectoDao
{
    public static function registrarImplementacion_proyecto($modelImplementacion_proyecto){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `implementacion_proyecto` VALUES (
                NULL,
                :id_item_grupo_plantilla_certificacion,
                :id_proyecto,
                :comentario_implementacion,
                :porcentaje_avance,
                :fecha_comentario_implementacion,
                :estado_implementacion
                )";

            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_item_grupo_plantilla_certificacion' =>$modelImplementacion_proyecto->getId_item_grupo_plantilla_certificacion(),
                ':id_proyecto' =>$modelImplementacion_proyecto->getId_proyecto(),
                ':comentario_implementacion' =>$modelImplementacion_proyecto->getComentario_implementacion(),
                ':porcentaje_avance' =>$modelImplementacion_proyecto->getPorcentaje_avance(),
                ':fecha_comentario_implementacion' =>$modelImplementacion_proyecto->getFecha_comentario_implentacion(),
                ':estado_implementacion' =>$modelImplementacion_proyecto->getEstado_implementacion()
            ));
            return $resultado2;
    }


    public static function modificarImplementacion_proyecto($modelImplementacion_proyecto){
        $data_source = new DataSource();
             $sql2 = "UPDATE `implementacion_proyecto` SET
                id_item_grupo_plantilla_certificacion=:id_item_grupo_plantilla_certificacion,
                id_proyecto=:id_proyecto,
                comentario_implementacion=:comentario_implementacion,
                porcentaje_avance=:porcentaje_avance,
                fecha_comentario_implementacion=:fecha_comentario_implementacion,
                estado_implementacion=:estado_implementacion,
                WHERE id_implementacion_item_proyecto = :id_implementacion_item_proyecto
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_implementacion_item_proyecto'=>$modelImplementacion_proyecto->getId_implentacion_item_proyecto(),
                ':id_item_grupo_plantilla_certificacion' =>$modelImplementacion_proyecto->getId_item_grupo_plantilla_certificacion(),
                ':id_proyecto' =>$modelImplementacion_proyecto->getId_proyecto(),
                ':comentario_implementacion' =>$modelImplementacion_proyecto->getComentario_implementacion(),
                ':porcentaje_avance' =>$modelImplementacion_proyecto->getPorcentaje_avance(),
                ':fecha_comentario_implementacion' =>$modelImplementacion_proyecto->getFecha_comentario_implentacion(),
                ':estado_implementacion' =>$modelImplementacion_proyecto->getEstado_implementacion()
            ));
            return $resultado2;
    }





    public static function implementacion_proyectoId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM implementacion_proyecto where Id_implentacion_item_proyecto = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objimplementacion_proyecto = new implementacion_proyecto(
            $data_table[0]['id_implementacion_item_proyecto'],
            $data_table[0]["id_item_grupo_plantilla_certificacion"],
            $data_table[0]["id_proyecto"],
            $data_table[0]["comentario_implementacion"],
            $data_table[0]["porcentaje_avance"],
            $data_table[0]["fecha_comentario_implementacion"],
            $data_table[0]["estado_implementacion"]            
        );
        return $objimplementacion_proyecto;
    }

    public static function listadoImplementacion_proyecto()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `implementacion_proyecto`   ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objimplementacion_proyecto = new implentacion_proyecto(
                    $data_table[$key]["id_implementacion_item_proyecto"],
                    $data_table[$key]["id_item_grupo_plantilla_certificacion"],
                    $data_table[$key]["id_proyecto"],
                    $data_table[$key]["comentario_implementacion"],
                    $data_table[$key]["porcentaje_avance"],
                    $data_table[$key]["fecha_comentario_implementacion"],
                    $data_table[$key]["fecha_comentario_implementacion"]
                );
                array_push($arrayAuditores,$objimplementacion_proyecto);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }




    public static function ultimaImplementacion_proyectoRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `implementacion_proyecto` as 'numero' ORDER BY `implementacion_proyecto`.`id_implementacion_item_proyecto` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}