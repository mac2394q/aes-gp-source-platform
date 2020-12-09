<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."grupo_plantilla_alance.php");
class grupo_plantilla_alanceDao
{
    public static function registrarGrupo_plantilla_alcance($modelGrupo_plantilla_alance){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `grupo_plantilla_alcance` VALUES (
                NULL,
                :id_plantilla_alcance,
                :etiqueta_grupo_plantilla,
                :titulo_grupo_plantilla
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_plantilla_alcance' =>$modelGrupo_plantilla_alance->getId_plantilla_alcance(),
                ':etiqueta_grupo_plantilla' =>$modelGrupo_plantilla_alance->getEtiqueta_grupo_plantilla(),
                ':titulo_grupo_plantilla' =>$modelGrupo_plantilla_alance->getTitulo_grupo_plantilla()
            ));
            return $resultado2;
    }
    public static function modificarGrupo_plantilla_alance($modelGrupo_plantilla_alance){
        $data_source = new DataSource();
             $sql2 = "UPDATE `grupo_plantilla_alance` SET
                id_plantilla_alcance=:id_plantilla_alcance,
                etiqueta_grupo_plantilla=:etiqueta_grupo_plantilla,
                titulo_grupo_plantilla=:titulo_grupo_plantilla,
                
                WHERE id_grupo_plantilla_alcance=:id_grupo_plantilla_alcance
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_grupo_plantilla_alcance'=>$modelGrupo_plantilla_alance->getId_grupo_plantilla_alcance(),
                ':id_plantilla_alcance' =>$modelGrupo_plantilla_alance-> getId_plantilla_alcance(),
                ':etiqueta_grupo_plantilla' =>$modelGrupo_plantilla_alance->getEtiqueta_grupo_plantill(),
                ':titulo_grupo_plantilla' =>$modelGrupo_plantilla_alance->getTitulo_grupo_plantilla()
            ));
            return $resultado2;
    }

    public static function Grupo_plantilla_alanceId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `grupo_plantilla_alcance` where id_grupo_plantilla_alcance= ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objgrupo_plantilla_alcance = new grupo_plantilla_alcance(
            $data_table[0]["id_grupo_plantilla_alcance"],
            $data_table[0]["id_plantilla_alcance"],
            $data_table[0]["etiqueta_grupo_plantilla"],
            
            $data_table[0]["titulo_grupo_plantilla"]
        );
        return $objgrupo_plantilla_alcance;
    }

    public static function listadoGrupo_plantilla_alance()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `grupo_plantilla_alance`   ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objgrupo_plantilla_alcance = new grupo_plantilla_alcance(
                    $data_table[$key]["id_grupo_plantilla_alcance"],
                    $data_table[$key]["id_plantilla_alcance"],
                    $data_table[$key]["etiqueta_grupo_plantilla"],
                    $data_table[$key]["	titulo_grupo_plantilla"]
                );
                array_push($arrayAuditores,$objgrupo_plantilla_alcance);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }

    public static function ultimaGrupo_plantilla_alance()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `grupo_plantilla_alance` as 'numero' ORDER BY `grupo_plantilla_alance`.`	id_grupo_plantilla_alcance` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}