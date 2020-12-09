<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."colaborador.php");
class colaboradorDao
{
    public static function registrarColaborador($modelColaborador){
        $data_source = new DataSource();

        $sql2 = "INSERT INTO `colaborador` VALUES 
        (NULL,:nombre_colaborador,:cargo_colaborador)";

        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':nombre_colaborador' =>$modelColaborador->getNombre_colaborador(),
            ':cargo_colaborador' =>$modelColaborador->getCargo_colaborador()
        ));

        return $resultado2;
    }

    public static function modificarColaborador($modelColaborador){
        $data_source = new DataSource();

        $sql2 = "UPDATE `colaborador` SET
        nombre_colaborador=:nombre_colaborador,
        cargo_colaborador=:cargo_colaborador,
        WHERE id_colaborador = :id_colaborador";

        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':id_colaborador' => $modelColaborador->getId_colaborador(),
            ':nombre_colaborador' =>$modelColaborador->getNombre_colaborador(),
            ':cargo_colaborador' =>$modelColaborador->getCargo_colaborador()
        ));

        return $resultado2;
    }

    public static function colaboradorId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `colaborador` where id_colaborador = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);

        $objModel = new colaborador(
            $data_table[0]["id_colaborador"],
            $data_table[0]["nombre_colaborador"],
            $data_table[0]["cargo_colaborador"]
            
        );
        return $objModel;
    }

    public static function listadoColaborador(){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM colaborador");

        if(count($data_table)>0){
            $arrayColaboradores=array();
            foreach ($data_table as $key => $value) {
                $objcolaborador = new colaborador(
                    $data_table[$key]["id_colaborador"],
                    $data_table[$key]["nombre_colaborador"],
                    $data_table[$key]["cargo_colaborador"]
                );
                array_push($arrayColaboradores,$objcolaborador);
            }
            return $arrayColaboradores;
        }else{
            return false;
        }
    }

    public static function ultimaColaboradorRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `colaborador` as 'numero' ORDER BY `colaborador`.`id_colaborador` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}