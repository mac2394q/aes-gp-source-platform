<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."empresa_proyecto.php");
class empresa_proyectoDao
{
    public static function registrarEmpresa_proyecto($modelEmpresa_proyecto){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `empresa_proyecto` VALUES (
                NULL,
                :id_entidad_empresa_proyecto,
                :id_proyecto_empresa,
                :id_contrato_empresa_proyecto,
                :estado_empresa_proyecto)";

            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_entidad_empresa_proyecto' =>$modelEmpresa_proyecto->getId_entidad_empresa_proyecto(),
                ':id_proyecto_empresa' =>$modelEmpresa_proyecto->getId_proyecto_empresa(),
                ':id_contrato_empresa_proyecto' =>$modelEmpresa_proyecto->getId_contrato_empresa_proyecto() ,
                ':estado_empresa_proyecto' =>$modelEmpresa_proyecto>getEstado_empresa_proyecto()
            ));
            return $resultado2;
    }

    public static function modificarEmpresa_proyecto($modelEmpresa_proyecto){
        $data_source = new DataSource();
            $sql2 = "UPDATE `empresa_proyecto` SET
            id_entidad_empresa_proyecto=:id_entidad_empresa_proyecto,
            id_proyecto_empresa=:id_proyecto_empresa,
            id_contrato_empresa_proyecto=:id_contrato_empresa_proyecto,
            estado_empresa_proyecto=:estado_empresa_proyecto
            WHERE id_empresa_proyecto = :id_empresa_proyecto";

            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_empresa_proyecto'=>$modelEmpresa_proyecto->getId_empresa_proyecto(),
                ':id_entidad_empresa_proyecto' =>$modelEmpresa_proyecto->getId_entidad_empresa_proyecto(),
                ':id_proyecto_empresa' =>$modelEmpresa_proyecto->getId_proyecto_empresa(),
                ':id_contrato_empresa_proyecto' =>$modelEmpresa_proyecto->getId_contrato_empresa_proyecto() ,
                ':estado_empresa_proyecto' =>$modelEmpresa_proyecto-> getEstado_empresa_proyecto()
            ));
            return $resultado2;
    }


    public static function trabajoId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresa_proyecto` where 	id_empresa_proyecto = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objempresa_proyecto = new empresa_proyecto(
            $data_table[0]["id_empresa_proyecto"],
            $data_table[0]["id_entidad_empresa_proyecto"],
            $data_table[0]["id_proyecto_empresa"],
            $data_table[0]["id_contrato_empresa_proyecto"],
            $data_table[0]["estado_empresa_proyecto"]
            
        );
        return $objempresa_proyecto;
    }
    
    public static function listadoEmpresa_proyecto()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresa_proyecto`   ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objempresa_proyecto= new empresa_proyeto(
                    $data_table[$key]["id_empresa_proyecto"],
                    $data_table[$key]["id_entidad_empresa_proyecto"],
                    $data_table[$key]["id_proyecto_empresa"],
                    $data_table[$key]["id_contrato_empresa_proyecto"],
                    $data_table[$key]["estado_empresa_proyecto"]
                );
                array_push($arrayAuditores,$objempresa_proyecto);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }


    public static function ultimaEmpresa_proyectoRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `empresa_proyecto` as 'numero' ORDER BY `empresa_proyecto`.`	id_empresa_proyecto` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}