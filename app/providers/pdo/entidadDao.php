<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."entidad.php");
class entidadDao
{

    public static function obtenerEntidad($entidad)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `entidad` WHERE id_entidad= ".$entidad;
        $data_table = $data_source->ejecutarConsulta($sql);
        // $objentiddad = new entidad(
        //     $data_table[0]["id_entidad"],
        //     $data_table[0]["tipo_entidad"],
        //     $data_table[0]["estado_entidad"]            
        // );
        $arrayAuditores=null;
        if($data_table[0]["tipo_entidad"] == "GRUPO"){
            $data_table2 = $data_source->ejecutarConsulta("SELECT * FROM `grupo_empresarial` where id_entidad =".$entidad);
            $arrayEntidad = array(
                "entidad" => $data_table2[0]["nombre_grupo_empresarial"],
                "tipo" => $data_table[0]["tipo_entidad"]
            );
        }else{
            $data_table2 = $data_source->ejecutarConsulta("SELECT * FROM `empresa` where id_entidad =".$entidad);
            $arrayEntidad = array(
                "entidad" => $data_table2[0]["nombre_empresa"],
                "tipo" => $data_table[0]["tipo_entidad"]
            );
        }
        return $arrayEntidad;
    }


    public static function registrarEntidad($modelEntidad){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `entidad` VALUES (
                NULL,
                :tipo_entidad,
                :estado_entidad
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':tipo_entidad' =>$modelEntidad->getTipo_entidad(),
                ':estado_entidad' =>$modelEntidad->getEstado_entidad()
            ));
            return $resultado2;
    }
    public static function modificarEntidad($modelEntidad){
        $data_source = new DataSource();
            $sql2 = "UPDATE `Entidad` SET
            tipo_entidad=:tipo_entidad,
            estado_entidad=:estado_entidad
            WHERE id_entidad = :id_entidad";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_entidad'=>$modelEntidad->getId_entidad(),
                ':tipo_entidad' =>$modelEntidad->getTipo_entidad(),
                ':estado_entidad' =>$modelEntidad->getEstado_entidad()
            ));
            return $resultado2;
    }
    public static function EntidadId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `entidad` WHERE id_entidad= ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objentiddad = new entidad(
            $data_table[0]["id_entidad"],
            $data_table[0]["tipo_entidad"],
            $data_table[0]["estado_entidad"]            
        );
        return $objentiddad;
    }
    public static function listadoEntidad()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `entidad`   ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objentidad = new entidad(
                    $data_table[$key]["id_entidad"],
                    $data_table[$key]["tipo_entidad"],
                    $data_table[$key]["estado_entidad"]
                );
                array_push($arrayAuditores,$objentidad);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function ultimaEntidad()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `entidad` as 'numero' ORDER BY `entidad`.`id_entidad` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}