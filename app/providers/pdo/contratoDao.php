<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."contrato.php");
require_once(MODEL_PATH."proyecto.php");
require_once(MODEL_PATH."empresa_proyecto.php");
require_once(MODEL_PATH."cuota.php");
require_once(MODEL_PATH."acuerdo_pago.php");
class contratoDao
{
    public static function registraAcuerdoCuota($modelAcuerdo){
        $data_source = new DataSource();
        $sql ="INSERT INTO acuerdo_pago VALUES(NULL,".$modelAcuerdo->getId_contrato_acuerdo_pago().",'ACTIVO') ";
        echo $sql;
        $resultado = $data_source->ejecutarActualizacion($sql);
        return $resultado;

    }


    public static function registrarCuota($modelCuota){
        $data_source = new DataSource();

        $resultado2 = $data_source->ejecutarActualizacion("INSERT INTO cuota VALUE (NULL ,:id_acuerdo_pago_cuota ,:numero_cuota,:monto_cuota,:porcentaje_cuota,:estado_cuota,:observacion_cuota)", array(
            ':id_acuerdo_pago_cuota' =>$modelCuota->getId_acuerdo_pago_cuota(),
            ':numero_cuota' =>$modelCuota->getNumero_cuota(),
            ':monto_cuota' =>$modelCuota->getMonto_cuota(),
            ':porcentaje_cuota' =>$modelCuota->getPorcentaje_cuota(),
            ':estado_cuota' =>'NO PAGADO',
            ':observacion_cuota' =>""
        ));
        return $resultado2;

    }

    public static function registrarContrato($modelContrato){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `contrato` VALUES 
        (NULL,:id_entidad_pago_contrato,:valor_contrato,:fecha_firma_contrato,'ACTIVO',:idtrabajo)";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':id_entidad_pago_contrato' =>$modelContrato->getId_entidad_pago_contrato(),
            ':valor_contrato' =>$modelContrato->getValor_contrato(),
            ':fecha_firma_contrato' =>$modelContrato->getFecha_firma_contrato(),
            ':idtrabajo' =>$modelContrato->getIdtrabajo() 
        ));
        return $resultado2;
    }


    public static function modificarContrato($modelContrato){
        $data_source = new DataSource();
        $sql2 = "UPDATE `contrato` SET
            id_entidad_pago_contrato=:id_entidad_pago_contrato,
            valor_contrato=:valor_contrato,
            fecha_firma_contrato=:fecha_firma_contrato,
            estado_contrato=:estado_contrato
            WHERE id_contrato = :id_contrato";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_contrato'=>$modelContrato->getId_contrato(),
                ':id_entidad_pago_contrato' =>$modelContrato->getId_entidad_pago_contrato(),
                ':valor_contrato' =>$modelContrato->getValor_contrato(),
                ':fecha_firma_contrato' =>$modelContrato->getFecha_firma_contrato() ,
                ':estado_contrato' =>$modelContrato->getEstado_contrato()
            ));
            return $resultado2;
    }

    public static function modificarCuota($modelCuota){
        $data_source = new DataSource();
            $sql2 = "UPDATE `cuota` SET
                observacion_cuota=:observacion_cuota,
                estado_cuota=:estado_cuota
                WHERE id_cuota = :id_cuota";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_cuota'=>$modelCuota->getId_cuota(),
                ':estado_cuota' =>$modelCuota->getEstado_cuota(),
                ':observacion_cuota' =>$modelCuota->getObservacion()
            ));
            return $resultado2;
    }


    public static function contratoId($id)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `contrato` where id_contrato = $id");
        $objcontrato = new contrato(
            $data_table[0]["id_contrato"],
            $data_table[0]["id_entidad_pago_contrato"],
            $data_table[0]["valor_contrato"],
            $data_table[0]["fecha_firma_contrato"],
            $data_table[0]["estado_contrato"],
            $data_table[0]["idcontrato"]
            
        );
        return $objcontrato;
    }

    public static function acuerdoId($id)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `acuerdo_pago` where id_contrato_acuerdo_pago = $id");
        $objcontrato = new acuerdo_pago(
            $data_table[0]["id_acuerdo_pago"],
            $data_table[0]["id_contrato_acuerdo_pago"],
            $data_table[0]["estado_acuerdo_pago"]
        );
        return $objcontrato;
    }

    public static function cuotaId($id)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `cuota` where id_cuota =".$id);
        
                $objcuota = new cuota(
                    $data_table[0]["id_cuota"],
                    $data_table[0]["id_acuerdo_pago_cuota"],
                    $data_table[0]["numero_cuota"],
                    $data_table[0]["monto_cuota"],
                    $data_table[0]["porcentaje_cuota"],
                    $data_table[0]["estado_cuota"],
                    $data_table[0]["observacion_cuota"]
                );
                
            return $objcuota;
        
    }

    

    public static function listadoCuotas($idAcuerdo)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `cuota` where id_acuerdo_pago_cuota = ".$idAcuerdo);
        if(count($data_table)>0){
            $arrayContrato=array();
            foreach ($data_table as $key => $value) {
                $objcontrato = new cuota(
                    $data_table[$key]["id_cuota"],
                    $data_table[$key]["id_acuerdo_pago_cuota"],
                    $data_table[$key]["numero_cuota"],
                    $data_table[$key]["monto_cuota"],
                    $data_table[$key]["porcentaje_cuota"],
                    $data_table[$key]["estado_cuota"],
                    $data_table[$key]["observacion_cuota"]
                );
                array_push($arrayContrato,$objcontrato);
            }
            return $arrayContrato;
        }else{
            return false;
        }
    }



    public static function listadoContrato()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `contrato`");
        if(count($data_table)>0){
            $arrayContrato=array();
            foreach ($data_table as $key => $value) {
                $objcontrato = new contrato(
                    $data_table[$key]["id_contrato"],
                    $data_table[$key]["id_entidad_pago_contrato"],
                    $data_table[$key]["valor_contrato"],
                    $data_table[$key]["fecha_firma_contrato"],
                    $data_table[$key]["estado_contrato"],
                    $data_table[$key]["idtrabajo"]
                );
                array_push($arrayContrato,$objcontrato);
            }
            return $arrayContrato;
        }else{
            return false;
        }
    }


    public static function comprobarAcuerdo($idcontrato)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `acuerdo_pago` where id_contrato_acuerdo_pago = ".$idcontrato);
        if(count($data_table)>0){
            return true;
        }else{
            return false;
        }
    }


    public static function acuerdoContrato($idcontrato)
    {
        $data_source = new DataSource();
        $sql = "SELECT * FROM `acuerdo_pago` where id_contrato_acuerdo_pago = ".$idcontrato;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $objcontrato = new acuerdo_pago(
                $data_table[0]["id_acuerdo_pago"],
                $data_table[0]["id_contrato_acuerdo_pago"],
                $data_table[0]["estado_acuerdo_pago"]
            );
            return $objcontrato;
        }else{
            return false;
        }
    }



    public static function listadoContratoTrabajo($idtrabajo)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `contrato` join entidad on(contrato.id_entidad_pago_contrato=entidad.id_entidad) join empresa on(empresa.id_entidad=entidad.id_entidad) where contrato.idtrabajo_temporal=".$idtrabajo);
        if(count($data_table)>0){
            $arrayContrato=array();
            foreach ($data_table as $key => $value) {
                $objcontrato = new contrato(
                    $data_table[$key]["id_contrato"],
                    $data_table[$key]["nombre_empresa"],
                    $data_table[$key]["valor_contrato"],
                    $data_table[$key]["fecha_firma_contrato"],
                    $data_table[$key]["estado_contrato"],
                    $data_table[$key]["idtrabajo"]
                );
                array_push($arrayContrato,$objcontrato);
            }
            return $arrayContrato;
        }else{
            return false;
        }
    }

    public static function listadoContratoEmpresaTrabajo($idtrabajo)
    {
        $data_source = new DataSource();
        // $data_table = $data_source->ejecutarConsulta("SELECT 
        // id_empresa_proyecto ,emp.nombre_empresa as 'nom' , etiqueta_plantilla,nombre_alcance,empresa.nombre_empresa ,valor_contrato ,estado_empresa_proyecto,fecha_firma_contrato,id_contrato_empresa_proyecto 
        // FROM proyecto join empresa_proyecto on(proyecto.id_proyecto=empresa_proyecto.id_proyecto_empresa) 
        // join plantilla_alcance on(plantilla_alcance.id_plantilla_alcance=proyecto.id_plantilla_alcance_proyecto) 
        // join alcance on(plantilla_alcance.id_alcance_plantilla=alcance.id_alcance) 
        // join contrato on(contrato.id_contrato=empresa_proyecto.id_contrato_empresa_proyecto)
        // join empresa on(empresa.id_entidad=contrato.id_entidad_pago_contrato)
        // join empresa as emp on(emp.id_entidad=empresa_proyecto.id_entidad_empresa_proyecto)
        // where id_trabajo_proyecto =".$idtrabajo." ");
        $sql = "SELECT * from  empresa_proyecto 
        where empresa_proyecto.id_contrato_empresa_proyecto =".$idtrabajo." ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
     
        
        if(count($data_table)>0){
            $arrayContrato=array();
            foreach ($data_table as $key => $value) {
                $objproyecto = new empresa_proyecto(
                    $data_table[$key]["id_empresa_proyecto"],
                    $data_table[$key]["id_entidad_empresa_proyecto"],
                    $data_table[$key]["id_proyecto_empresa"],
                    $data_table[$key]["id_contrato_empresa_proyecto"],
                    $data_table[$key]["estado_empresa_proyecto"]
                );
                array_push($arrayContrato,$objproyecto);
            }
            return $arrayContrato;
        }else{
            return false;
        }
    }

    public static function listadoContratoEmpresaTrabajoSeleccion($idtrabajo)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM trabajo join proyecto on(trabajo.id_trabajo=proyecto.id_trabajo_proyecto)
         join plantilla_alcance on(proyecto.id_plantilla_alcance_proyecto=plantilla_alcance.id_plantilla_alcance) 
         join alcance on(plantilla_alcance.id_alcance_plantilla=alcance.id_alcance)
         join empresa_proyecto on(proyecto.id_proyecto=empresa_proyecto.id_proyecto_empresa)
         join empresa on(empresa_proyecto.id_entidad_empresa_proyecto=empresa.id_entidad)
        where trabajo.id_trabajo =".$idtrabajo." and empresa_proyecto.id_contrato_empresa_proyecto IS NULL");
      
        if(count($data_table)>0){
            $arrayContrato=array();
            foreach ($data_table as $key => $value) {
                $objproyecto = new empresa_proyecto(
                    $data_table[$key]["id_empresa_proyecto"],
                    $data_table[$key]["id_trabajo_proyecto"],
                    "Empresa: ".$data_table[$key]["nombre_empresa"]."  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     Plantilla: ".$data_table[$key]["etiqueta_plantilla"]."  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  -     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alcance: ".$data_table[$key]["nombre_alcance"],
                    $data_table[$key]["id_contrato_empresa_proyecto"],
                    $data_table[$key]["estado_proyecto"]

                );
                array_push($arrayContrato,$objproyecto);
            }
            return $arrayContrato;
        }else{
            return false;
        }
    }


    public static function ultimaContratoRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT id_contrato as 'numero' FROM `contrato` ORDER BY `contrato`.`id_contrato` DESC LIMIT 1");
        return $data_table[0]["numero"];
    }

    public static function ultimoAcuerdoContratoRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT 	id_acuerdo_pago as 'numero' FROM `acuerdo_pago` ORDER BY `acuerdo_pago`.`id_acuerdo_pago` DESC LIMIT 1");
        return $data_table[0]["numero"];
    }

    public static function listadoCuota($idcontrato)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `cuota` join acuerdo_pago on(cuota.id_acuerdo_pago_cuota=acuerdo_pago.id_acuerdo_pago) join contrato on(acuerdo_pago.id_contrato_acuerdo_pago=contrato.id_contrato) where id_contrato_acuerdo_pago =".$idcontrato);
        if(count($data_table)>0){
            $arrayCuota=array();
            foreach ($data_table as $key => $value) {
                $objcuota = new cuota(
                    $data_table[$key]["id_cuota"],
                    $data_table[$key]["id_acuerdo_pago_cuota"],
                    $data_table[$key]["numero_cuota"],
                    $data_table[$key]["monto_cuota"],
                    $data_table[$key]["porcentaje_cuota"],
                    $data_table[$key]["estado_cuota"],
                    $data_table[$key]["observacion_cuota"]
                );
                array_push($arrayCuota,$objcuota);
            }
            return $arrayCuota;
        }else{
            return false;
        }
    }

}