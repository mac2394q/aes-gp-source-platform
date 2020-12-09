<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."grupo_empresaarial.php");
class grupo_empresarialDao
{
    public static function registrarGrupo_empresarial($modelGrupo_empresarial){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `grupo_empresarial` VALUES (
                NULL,
                :nombre_grupo_empresarial
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':nombre_grupo_empresarial' =>$modelGrupo_empresarial->getNombre_grupo_empresarial()
            ));
            return $resultado2;
    }
    public static function modificarGrupo_empresarial($modelGrupo_empresarial){
        $data_source = new DataSource();
            $sql2 = "UPDATE `grupo_empresarial` SET
                nombre_grupo_empresarial=:nombre_grupo_empresarial
                WHERE id_entidad=:id_entidad";

            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_entidad'=>$modelGrupo_empresarial->getId_entidad(),
                ':nombre_grupo_empresarial'=>$modelGrupo_empresarial->getNombre_grupoEmpresarial()
            ));
            return $resultado2;
    }

    public static function Grupo_empresarialId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `grupo_empresaria` WHERE id_entidad= ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objgrupo_empresarial = new grupo_empresarial(
            $data_table[0]["id_entidad"],
            $data_table[0]["nombre_grupo_empresarial"]
        );
        return $objgrupo_empresarial;
    }

    public static function listadoGrupo_empresarial()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `grupo_empresarial`   ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objgrupo_empresarial= new grupo_empresarial(
                    $data_table[$key]["id_entidad"],
                    $data_table[$key]["nombre_grupo_empresarial"]
                );
                array_push($arrayAuditores,$objgrupo_empresarial);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }

    public static function ultimaGrupo_empresarial()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `grupo_empresarial` as 'numero' ORDER BY `grupo_empresarial`.`	id_entidad` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}