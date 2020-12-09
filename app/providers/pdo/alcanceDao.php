<?php

include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');

require_once(DATABASE_PATH."DataSource.php");

require_once(MODEL_PATH."alcance.php");

class alcanceDao

{
    public static function registrarAlcance($modelAlcance){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `alcance` VALUES (NULL,:nombre_alcance,:estado_alcance)";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':nombre_alcance'=>$modelAlcance->getNombre_alcance(),
            ':estado_alcance'=>$modelAlcance->getEstado_alcance()
        ));
        return $resultado2;
    }
    public static function modificarAlcance($modelAlcance){
        $data_source = new DataSource();
        $sql2 = "UPDATE `alcance` SET

        nombre_alcance=:nombre_alcance,
        estado_alcance=:estado_alcance

        
        WHERE id_alcance = :id_alcance";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':nombre_alcance' =>$modelAlcance->getNombre_alcance(),
            ':estado_alcance' =>$modelAlcance->getEstado_alcance()
        ));
        return $resultado2;
    }
    public static function alcanceId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `alcance` where id_alcance = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objModel = new alcance(
            $data_table[0]["id_alcance"],
            $data_table[0]["nombre_alcance"],
            $data_table[0]["estado_alcance"]
        );
        return $objModel;
    }

    public static function alcanceIdNombre($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `alcance` where nombre_alcance = '".$id."'";
        $data_table = $data_source->ejecutarConsulta($sql);
        $objModel = new alcance(
            $data_table[0]["id_alcance"],
            $data_table[0]["nombre_alcance"],
            $data_table[0]["estado_alcance"]
        );
        return $objModel;
    }

    public static function listadoAlcance()
    {
        $data_source = new DataSource();
        $sql ="SELECT * FROM `alcance` ORDER BY `alcance`.`nombre_alcance` ASC";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAlcance=array();
            foreach ($data_table as $key => $value) {
                $objModel = new alcance(
                    $data_table[$key]["id_alcance"],
                    $data_table[$key]["nombre_alcance"],
                    $data_table[$key]["estado_alcance"]
                );
                array_push($arrayAlcance,$objModel);
            }
            return $arrayAlcance;
        }else{
            return false;
        }
    }
    public static function ultimaAlcanceRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `alcance` AS 'numero' ORDER BY `alcance`.`id_alcance` DESC LIMIT 1");
        return $data_table[0]["numero"];
    }
}