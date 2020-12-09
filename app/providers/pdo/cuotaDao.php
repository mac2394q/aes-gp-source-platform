<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."cuota.php");
class cuotaDao
{
    public static function registrarCuota($modelCuota){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `cuota` VALUES 
        (NULL,:id_acuerdo_pago_cuota,:numero_cuota,:monto_cuota,:porcentaje_cuota,:estado_cuota)";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_acuerdo_pago_cuota' =>$modelCuota->getId_acuerdo_pago_cuota(),
                ':numero_cuota' =>$modelCuota->getNumero_cuota(),
                ':monto_cuota' =>$modelCuota->getMonto_cuota() ,
                ':porcentaje_cuota' =>$modelCuota->getPorcentaje_cuota(),
                ':estado_cuota' =>$modelCuota->getEstado_cuota()
            ));
            return $resultado2;
    }
    public static function modificarCuota($modelCuota){
        $data_source = new DataSource();
            $sql2 = "UPDATE `cuota` SET
                id_acuerdo_pago_cuota=:id_acuerdo_pago_cuota,
                numero_cuota=:numero_cuota,
                monto_cuota=:monto_cuota,
                porcentaje_cuota=:porcentaje_cuota,
                estado_cuota=:estado_cuota
                WHERE id_cuota = :id_cuota";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_cuota'=>$modelCuota->getId_cuota(),
                ':id_acuerdo_pago_cuota' =>$modelCuota->getId_acuerdo_pago_cuota(),
                ':numero_cuota' =>$modelCuota->getNumero_cuota(),
                ':monto_cuota' =>$modelCuota->getMonto_cuota() ,
                ':porcentaje_cuota' =>$modelCuota->getPorcentaje_cuota(),
                ':estado_cuota' =>$modelCuota->getEstado_cuota()
            ));
            return $resultado2;
    }
    public static function cuotaId($id)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `cuota` where id_cuota = $id");
        $objcuota = new cuota(
            $data_table[0]["id_cuota"],
            $data_table[0]["id_acuerdo_pago_cuota"],
            $data_table[0]["numero_cuota"],
            $data_table[0]["monto_cuota"],
            $data_table[0]["porcentaje_cuota"],
            $data_table[0]["estado_cuota"]            
        );
        return $objcuota;
    }
    public static function listadoCuota()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `cuota`");
        if(count($data_table)>0){
            $arrayCuota=array();
            foreach ($data_table as $key => $value) {
                $objcuota = new cuota(
                    $data_table[$key]["id_cuota"],
                    $data_table[$key]["id_acuerdo_pago_cuota"],
                    $data_table[$key]["numero_cuota"],
                    $data_table[$key]["monto_cuota"],
                    $data_table[$key]["porcentaje_cuota"],
                    $data_table[$key]["estado_cuota"]
                );
                array_push($arrayCuota,$objcuota);
            }
            return $arrayCuota;
        }else{
            return false;
        }
    }
    public static function ultimaCuotaRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `cuota` as 'numero' ORDER BY `cuota`.`id_cuota` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}