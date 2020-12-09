<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."item_grupo_plantilla_alcance.php");
class item_grupo_plantilla_alcanceDao
{
    public static function registrarItem_grupo_plantilla_alcance($modelItem_grupo_plantilla_alcance){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `item_grupo_plantilla_alcance` VALUES (
                NULL,
                :id_grupo_plantilla_cerrtificacion,
                :etiqueta_item_plantilla,
                :descripcion_item_plantilla
                )";

            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_item_grupo_plantilla_cerrtificacion' =>$modelItem_grupo_plantilla_alcance->getId_grupo_plantilla_certificacion(),
                ':etiqueta_item_plantilla' =>$modelItem_grupo_plantilla_alcance->getEtiqueta_item_plantilla(),
                ':descripcion_item_plantilla' =>$modelItem_grupo_plantilla_alcance->getDescripcion_iteam_plantilla()
            ));
            return $resultado2;
    }


    public static function modificarItem_grupo_plantilla_alcance($modelItem_grupo_plantilla_alcance){
        $data_source = new DataSource();
             $sql2 = "UPDATE `preauditoria_proyecto` SET
                id_grupo_plantilla_cerrtificacion=:id_grupo_plantilla_cerrtificacion,
                etiqueta_item_plantilla=:etiqueta_item_plantilla,
                descripcion_item_plantilla=:descripcion_item_plantilla,
                WHERE id_item_grupo_plantilla_certificacion = :id_item_grupo_plantilla_certificacion
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_item_grupo_plantilla_certificacion'=>$modelItem_grupo_plantilla_alcance->getId_item_grupo_plantlla_certificacion(),
                ':id_grupo_plantilla_cerrtificacion' =>$modelItem_grupo_plantilla_alcance->getId_grupo_plantilla_certificacion(),
                ':etiqueta_item_plantilla' =>$modelItem_grupo_plantilla_alcance->getEtiqueta_item_plantilla(),
                ':descripcion_item_plantilla' =>$modelItem_grupo_plantilla_alcance->getDescripcion_iteam_plantilla()
            ));
            return $resultado2;
    }





    public static function Item_grupo_plantilla_alcanceId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `item_grupo_plantilla_alcance` where id_item_grupo_plantilla_certificacion = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objpreauditoria_proyecto = new preauditoria_proyecto(
            $data_table[0]["id_item_grupo_plantilla_certificacion"],
            $data_table[0]["id_grupo_plantilla_cerrtificacion"],
            $data_table[0]["etiqueta_item_plantilla"],
            $data_table[0]["descripcion_item_plantilla"]     
        );
        return $objpreauditoria_proyecto;
    }

    public static function listadoItem_grupo_plantilla_alcance()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `item_grupo_plantilla_alcance`   ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objpreauditoria_proyecto = new preauditoria_proyecto(
                    $data_table[$key]["id_item_grupo_plantilla_certificacion"],
                    $data_table[$key]["id_grupo_plantilla_cerrtificacion"],
                    $data_table[$key]["etiqueta_item_plantilla"],
                    $data_table[$key]["descripcion_item_plantilla"]
                );
                array_push($arrayAuditores,$objpreauditoria_proyecto);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }




    public static function ultimaItem_grupo_plantilla_alcanceRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `item_grupo_plantilla_alcance` as 'numero' ORDER BY `item_grupo_plantilla_alcance`.`id_item_grupo_plantilla_certificacion` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}