<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."acuerdo_pago.php");
class acuerdo_pagoDao
{
    public static function registrarAcuerdo_pago($acuerdo_pago){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `acuerdo_pago` VALUES (NULL,:id_contrato_acuerdo_pago,:estado_acuerdo_pago)";

        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':id_contrato_acuerdo_pago' =>$acuerdo_pago->getId_contrato_acuerdo_pago(),
            ':estado_acuerdo_pago' =>$acuerdo_pago->getEstado_acuerdo_pago()
        ));
        return $resultado2;
    }


    public static function modificarAcuerdo_pago($acuerdo_pago){
        $data_source = new DataSource();
            $sql2 = "UPDATE `acuerdo_pago` SET
            id_contrato_acuerdo_pago=:id_contrato_acuerdo_pago,
            estado_acuerdo_pago=:estado_acuerdo_pago

            WHERE 	id_acuerdo_pago = :id_acuerdo_pago";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_acuerdo_pago'=>$acuerdo_pago->getId_acuerdo_pago(),
                ':id_contrato_acuerdo_pago' =>$acuerdo_pago->getId_contrato_acuerdo_pago(),
                ':estado_acuerdo_pago' =>$acuerdo_pago->getEstado_acuerdo_pago()
            ));
            return $resultado2;
    }

    public static function acuerdo_pagoId($id)
    {
        $data_source = new DataSource();
        $sql = "SELECT * FROM `acuerdo_pago` where id_acuerdo_pago = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objModel = new acuerdo_pago(
            $data_table[0]["id_acuerdo_pago"],
            $data_table[0]["id_contrato_acuerdo_pago"],
            $data_table[0]["estado_acuerdo_pago"]
        );
        return $objModel;
    }

    public static function listadoAcuerdo_pago()
    {
        $data_source = new DataSource();
        $sql = "SELECT * FROM `acuerdo_pago` ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $array_model=array();
            foreach ($data_table as $key => $value) {
                $objModel = new acuerdo_pago(
                    $data_table[$key]["id_acuerdo_pago"],
                    $data_table[$key]["id_contrato_acuerdo_pago"],
                    $data_table[$key]["estado_acuerdo_pago"]
                );
                array_push($array_model,$objModel);
            }
            return $array_model;
        }else{
            return false;
        }
    }




    public static function ultimaAcuerdo_pagoRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `acuerdo_pago` as 'numero' ORDER BY `acuerdo_pago`.`id_acuerdo_pago` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}