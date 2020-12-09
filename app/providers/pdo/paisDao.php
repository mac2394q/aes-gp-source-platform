<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."pais.php");
class paisDao
{
    public static function registrarPais($modelPais){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `pais` VALUES (
                NULL,
                :acronimo_pais,
                :nombre_pais
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':acronimo_pais' =>$modelPais->getAcronimo_pais(),
                ':nombre_pais' =>$modelPais->getNombre_pais()
            ));
            return $resultado2;
    }
    public static function modificarPais($modelPais){
        $data_source = new DataSource();
             $sql2 = "UPDATE `pais` SET
                acronimo_pais=:acronimo_pais,
                nombre_pais=:nombre_pais
                WHERE id_pais=:id_pais
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_pais'=>$modelPais->getId_pais(),
                ':acronimo_pais' =>$modelPais-> getAcronimo_pais(),
                ':nombre_pais' =>$modelPais->getNombre_pais()
            ));
            return $resultado2;
    }
    public static function paisId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `pais` where 	id_pais= ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objpais = new pais(
            $data_table[0]["id_pais"],
            $data_table[0]["acronimo_pais"],
            $data_table[0]["nombre_pais"]            
        );
        return $objpais;
    }
    public static function listadoPais()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `pais` ORDER BY `pais`.`nombre_pais` ASC   ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objpais = new pais(
                    $data_table[$key]["id_pais"],
                    $data_table[$key]["acronimo_pais"],
                    $data_table[$key]["nombre_pais"]
                );
                array_push($arrayAuditores,$objpais);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function ultimaPais()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `pais` as 'numero' ORDER BY `pais`.`id_pais` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}