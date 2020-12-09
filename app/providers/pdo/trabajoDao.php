<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."trabajo.php");
require_once(MODEL_PATH."colaborador.php");
require_once(MODEL_PATH."reporteDiagnostico.php");
class trabajoDao
{
    public static function registraInforme($model){
        $data_source = new DataSource();
        $sql ="SELECT * FROM `reporteDiagnostico` where idDiagnostico = ".$model->getIdDiagnostico()." limit 1";
        $data_table = $data_source->ejecutarConsulta($sql);
        if( intval($data_table ) > 0){
            $sql3 = "UPDATE `reporteDiagnostico` SET  actividades='".$model->getActividades()."' , aspectos='".$model->getAspectos()."' , hallazgos='".$model->getHallazgos()."' , conclusiones	='".$model->getConclusion()."'  WHERE idDiagnostico = ".$model->getIdDiagnostico();
            //echo "<br>".$sql3;
            $resultado2 = $data_source->ejecutarActualizacion($sql3);
            return $resultado2;
        }else{
            $sql2 = "INSERT INTO `reporteDiagnostico` VALUES (
                ".$model->getIdDiagnostico().",
                '".$model->getActividades()."',
                '".$model->getAspectos()."',
                '".$model->getHallazgos()."',
                '".$model->getConclusion()."'
                )";
                //echo "<br>".$sql2;
                $resultado2 = $data_source->ejecutarActualizacion($sql2);
        }
    }
    public static function registraInforme2($idproyecto,$actividades,$aspectos,$informacion){
        $data_source = new DataSource();
        $sql ="SELECT * FROM `reportepreauditoria` where 	id_reportepreauditoria = ".$idproyecto;
        $data_table = $data_source->ejecutarConsulta($sql);
        if( intval($data_table ) > 0){
            $sql3 = "UPDATE `reportepreauditoria`
             SET  
              aspectos='".$aspectos."' ,
              actividad='".$actividades."' ,
              informacion	='".$informacion."' 
            WHERE id_reportepreauditoria = ".$idproyecto;
            //echo "<br>".$sql3;
            $resultado2 = $data_source->ejecutarActualizacion($sql3);
            return $resultado2;
        }else{
            $sql2 = "INSERT INTO `reportepreauditoria` VALUES (
                ".$idproyecto.",
                '".$informacion."',
                '".$actividades."',
                '".$aspectos."'
                )";
                //echo "<br>".$sql2;
                $resultado2 = $data_source->ejecutarActualizacion($sql2);
        }
    }
    public static function registrarTrabajo($modelTrabajo){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `trabajo` VALUES (
                NULL,
                :id_entidad_trabajo,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NOW(),
                NULL,
                NULL,
                NULL,
                NULL,
                'INICIADO'
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_entidad_trabajo' =>$modelTrabajo->getId_entrada_trabajo()
            ));
            return $resultado2;
    }
    
    public static function registraColaborador($modelColaborador){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `colaborador` VALUES (
                NULL,
                :colaborador,
                :cargo,
                :proyecto
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':colaborador' =>$modelColaborador->getNombre_colaborador(),
                ':cargo' =>$modelColaborador->getCargo_colaborador(),
                ':proyecto' =>$modelColaborador->getidproyecto() 
            ));
            return $resultado2;
    }
    public static function asignarUsuarioPreauditoria($usuario,$idtrabajo){
        $data_source = new DataSource();
             $sql2 = "UPDATE `trabajo` SET
                	id_usuario_preauditoria=:id_usuario_preauditoria
                WHERE id_trabajo = :id_trabajo
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_usuario_preauditoria' =>$usuario,
                ':id_trabajo' =>$idtrabajo
            ));
            return $resultado2;
    }
    public static function asignarUsuarioDiagnostico($usuario,$idtrabajo){
        $data_source = new DataSource();
             $sql2 = "UPDATE `trabajo` SET
                		id_usuario_diagnostico=:id_usuario_diagnostico
                WHERE id_trabajo = :id_trabajo
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_usuario_diagnostico' =>$usuario,
                ':id_trabajo' =>$idtrabajo
            ));
            return $resultado2;
    }
    public static function asignarUsuarioImplementacion($usuario,$idtrabajo){
        $data_source = new DataSource();
             $sql2 = "UPDATE `trabajo` SET
                id_usuario_implementacion=:id_usuario_implementacion
                WHERE id_trabajo = :id_trabajo
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_usuario_implementacion' =>$usuario,
                ':id_trabajo' =>$idtrabajo
            ));
            return $resultado2;
    }
    public static function asignarUsuarioColaborador($idusuario,$implementacion){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `implementacion_colaborador` VALUES (
                
                ".$implementacion.",
                ".$idusuario."
                )";
            //echo $sql2;
            $resultado2 = $data_source->ejecutarActualizacion($sql2);
            return $resultado2;
    }
    public static function modificarTrabajo($modelTrabajo){
        $data_source = new DataSource();
             $sql2 = "UPDATE `trabajo` SET
                id_entidad_trabajo=:id_entidad_trabajo,
                id_usuario_diagnostico=:id_usuario_diagnostico,
                fecha_fin_diagnostico_trabajo=:fecha_fin_diagnostico_trabajo,
                id_usuario_implementacion=:id_usuario_implementacion,
                fehca_fin_implementacion_trabajo=:fehca_fin_implementacion_trabajo,
                id_usuario_preauditoria=:id_usuario_preauditoria,
                fecha_fin_preauditoria_trabajo=:fecha_fin_preauditoria_trabajo,
                fecha_creacion_trabajo=:fecha_creacion_trabajo,
                fecha_cierre_trabajo=:fecha_cierre_trabajo,
                solicitud_acompanamiento_dian_trabajo=:solicitud_acompanamiento_dian_trabajo,
                fecha_inscripcion_dian_trabajo=:fecha_inscripcion_dian_trabajo,
                fecha_visita_dian_trabajo=:	fecha_visita_dian_trabajo,
                estado_trabajo=:estado_trabajo,
                WHERE id_trabajo = :id_trabajo
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_entidad_trabajo' =>$modelTrabajo->getId_entrada_trabajo(),
                ':id_usuario_diagnostico' =>$modelTrabajo->getId_usuario_diagnostico(),
                ':fecha_fin_diagnostico_trabajo' =>$modelTrabajo->getFecha_fin_diagnostico_trabajo() ,
                ':id_usuario_implementacion' =>$modelTrabajo->getId_usuario_implementacion(),
                ':fecha_fin_implementacion_trabajo' =>$modelTrabajo->getFecha_fin_implementacion_trabajo(),
                ':id_usuario_preauditoria' =>$modelTrabajo->getId_usuario_preauditoria(),
                ':fecha_fin_perauditoria_trabajo,' =>$modelTrabajo->getFecha_fin_preauditoria_trabajo(),
                ':fecha_creacion_trabajo' =>$modelTrabajo->getFecha_creacio_trabajo(),
                ':fecha_cierre__trabajo' =>$modelTrabajo->getFecha_cierre_trabajo(),
                ':solicitud_acompanamiento_dian_trabajo' =>$modelTrabajo->getSolitud_acompanamiento_dian_trabajo(),
                ':fecha_inscripcion_dian_trabajo' =>$modelTrabajo->getFecha_inscripcion_dian_trabajo(),
                ':fecha_visita_dian_trabajo' =>$modelTrabajo->getFecha_visita_dian_trabajo(),
                ':estado_trabajo' =>$modelTrabajo->getEstado_trabajo()
            ));
            return $resultado2;
    }
    public static function trabajoCancelar($idTrabajo){
        $data_source = new DataSource();
        $sql ="select count(*) as cantidad from proyecto
        where
        proyecto.estado_proyecto not in ('Fin Proceso', 'CANCELADO') and proyecto.id_trabajo_proyecto=2 ".$idTrabajo;
        $data_table_  = $data_source->ejecutarConsulta($sql);
        if(intval( $data_table_[0]['cantidad']) >0 ){
            return 1;
        }else{
            $sql2 = "UPDATE `trabajo` SET  estado_trabajo='CANCELADO' WHERE id_trabajo = :id_trabajo";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(':id_trabajo' =>$idTrabajo));
            return 0;
        }
    }
    public static function trabajoFinalizado($idTrabajo){
        $data_source = new DataSource();
        $sql2 = "UPDATE `trabajo` SET  estado_trabajo='TERMINADO', 	fecha_cierre_trabajo = NOW() WHERE id_trabajo = :id_trabajo";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(':id_trabajo' =>$idTrabajo));
        return $resultado2;
        
    }
    public static function dian($fechadian,$fechaVisita,$idtrabajo){
        $data_source = new DataSource();
        $sql2 = "UPDATE `trabajo` SET  solicitud_acompanamiento_dian_trabajo='SOLICITADO', 
            fecha_inscripcion_dian_trabajo = '".$fechadian."' ,
            fecha_visita_dian_trabajo = '".$fechaVisita."' WHERE id_trabajo = ".$idtrabajo;
        //echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
        
    }
    public static function asociarProyectoContrato($idcontrato,$idproyecto){
        $data_source = new DataSource();
        $sql2 = "UPDATE `empresa_proyecto` SET  id_contrato_empresa_proyecto = ".$idcontrato." WHERE id_empresa_proyecto = ".$idproyecto;
        echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
    
    
    public static function proyectoObj($idproyecto)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `proyecto` where id_proyecto = ".$idproyecto." limit 1";
        //print $sql; 
        $data_table = $data_source->ejecutarConsulta($sql);
        return array(
            "id_proyecto"                   =>$data_table[0]["id_proyecto"],
            "id_trabajo_proyecto"           =>        $data_table[0]["id_trabajo_proyecto"],
            "id_plantilla_alcance_proyecto" =>        $data_table[0]["id_plantilla_alcance_proyecto"],
            "estado_proyecto"               =>        $data_table[0]["estado_proyecto"],
            "fechaFinDiagnostico"           =>        $data_table[0]["fechaFinDiagnostico"],
            "fechaFinImplementacion"        =>        $data_table[0]["fechaFinImplementacion"],
            "fechaFinPre"                   =>        $data_table[0]["fechaFinPre"]
        );
    }
    public static function trabajoId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `trabajo` where id_trabajo = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objtrabajo = new trabajo(
            $data_table[0]["id_trabajo"],
                    $data_table[0]["id_entidad_trabajo"],
                    $data_table[0]["id_usuario_diagnostico"],
                    $data_table[0]["fecha_fin_diagnostico_trabajo"],
                    $data_table[0]["id_usuario_implementacion"],
                    $data_table[0]["fehca_fin_implementacion_trabajo"],
                    $data_table[0]["id_usuario_preauditoria"],
                    $data_table[0]["fecha_fin_preauditoria_trabajo"],
                    $data_table[0]["fecha_creacion_trabajo"],
                    $data_table[0]["fecha_cierre_trabajo"],
                    $data_table[0]["solicitud_acompanamiento_dian_trabajo"],
                    $data_table[0]["fecha_inscripcion_dian_trabajo"],
                    $data_table[0]["fecha_visita_dian_trabajo"],
                    $data_table[0]["estado_trabajo"]
            
        );
        return $objtrabajo;
    }
    public static function trabajoIdFechas($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `trabajo` where id_trabajo = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        return $data_table;
    }
    public static function verAcuerdos($id)
    {
        //echo $id;
        $data_source = new DataSource();
        $sql =" SELECT count(*) as 'numero' FROM `acuerdo_pago` join contrato on(acuerdo_pago.id_contrato_acuerdo_pago=contrato.id_contrato) where id_contrato_acuerdo_pago = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        return  $data_table[0]['numero'];
    }
    public static function reporteDiagId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `reporteDiagnostico` where idDiagnostico = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objtrabajo = new reporteDiagnostico(
            $data_table[0]["idDiagnostico"],
                    $data_table[0]["actividades"],
                    $data_table[0]["aspectos"],
                    $data_table[0]["hallazgos"],
                    $data_table[0]["conclusiones"]
            
        );
        return $objtrabajo;
    }
    public static function reportepreauditoria($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `reportepreauditoria` where id_reportepreauditoria = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            return $data_table;
        }else{
            return false;
        }
        
    }
    
    // public static function listadoColaboradoresItem($item)
    // {
    //     $data_source = new DataSource();
    //     $sql =" SELECT * FROM `implementacion_colaborador` join colaborador on(implementacion_colaborador.id_colaborador_implementacion=colaborador.id_colaborador)  where id_implementacion_item_proyecto = $item ";
    //     //echo $sql;
    //     $data_table = $data_source->ejecutarConsulta($sql);
    //     if(count($data_table)>0){
    //         $arrayAuditores=array();
    //         foreach ($data_table as $key => $value) {
    //             $objtrabajo = new colaborador(
    //                 "?idimple=".$data_table[$key]["id_implementacion_item_proyecto"]."&idcola=".$data_table[$key]["id_colaborador_implementacion"],
    //                 $data_table[$key]["nombre_colaborador"],
    //                 $data_table[$key]["cargo_colaborador"]
    //             );
    //             array_push($arrayAuditores,$objtrabajo);
    //         }
    //         return $arrayAuditores;
    //     }else{
    //         return false;
    //     }
    // }
    public static function listadoTrabajo($entidad,$busqueda)
    {
        $data_source = new DataSource();

        //Part SQl maker 
        $part1="";
        $part2="";
        $part3="";
        $sql_aux="";
        //$sql =" SELECT * FROM `trabajo` ORDER BY fecha_creacion_trabajo DESC  ";
        if($entidad == "empresa"){
            $part1 = " SELECT * FROM trabajo join entidad on(trabajo.id_entidad_trabajo=entidad.id_entidad) JOIN empresa  on(entidad.id_entidad=empresa.id_entidad) where tipo_entidad = 'EMPRESA'  ";
            
        }elseif($entidad == "grupo"){
            $part1 = "SELECT * FROM trabajo join entidad on(trabajo.id_entidad_trabajo=entidad.id_entidad)  JOIN grupo_empresarial  on(entidad.id_entidad=grupo_empresarial.id_entidad) where tipo_entidad = 'GRUPO' " ;
            $sql_aux = "";
        }else{
            $part1 = " SELECT * FROM `trabajo` join entidad on(trabajo.id_entidad_trabajo=entidad.id_entidad) ";
            $sql_aux = "";
        }
        if(
            Strlen($busqueda)!=0 ){ $part2= "  and like '%".$busqueda."%' ORDER BY fecha_creacion_trabajo DESC "; }
        else{  $part2=" ORDER BY fecha_creacion_trabajo DESC";}
 

        $data_table = $data_source->ejecutarConsulta($part1." ".$part2);
      
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {

                $objtrabajo = new trabajo(
                    $data_table[$key]["id_trabajo"],
                    $data_table[$key]["id_entidad_trabajo"],
                    $data_table[$key]["id_usuario_diagnostico"],
                    $data_table[$key]["fecha_fin_diagnostico_trabajo"],
                    $data_table[$key]["id_usuario_implementacion"],
                    $data_table[$key]["fehca_fin_implementacion_trabajo"],
                    $data_table[$key]["id_usuario_preauditoria"],
                    $data_table[$key]["fecha_fin_preauditoria_trabajo"],
                    $data_table[$key]["fecha_creacion_trabajo"],
                    $data_table[$key]["fecha_cierre_trabajo"],
                    $data_table[$key]["solicitud_acompanamiento_dian_trabajo"],
                    $data_table[$key]["fecha_inscripcion_dian_trabajo"],
                    $data_table[$key]["fecha_visita_dian_trabajo"],
                    $data_table[$key]["estado_trabajo"]
                );
                array_push($arrayAuditores,$objtrabajo);
            }
           
            return $arrayAuditores;
        }else{
            return false;
        }
    }


    // public static function listadoTrabajo()
    // {
    //     $data_source = new DataSource();
    //     $sql =" SELECT * FROM `trabajo` ORDER BY fecha_creacion_trabajo DESC  ";
    //     $data_table = $data_source->ejecutarConsulta($sql);
    //     if(count($data_table)>0){
    //         $arrayAuditores=array();
    //         foreach ($data_table as $key => $value) {
    //             $objtrabajo = new trabajo(
    //                 $data_table[$key]["id_trabajo"],
    //                 $data_table[$key]["id_entidad_trabajo"],
    //                 $data_table[$key]["id_usuario_diagnostico"],
    //                 $data_table[$key]["fecha_fin_diagnostico_trabajo"],
    //                 $data_table[$key]["id_usuario_implementacion"],
    //                 $data_table[$key]["fehca_fin_implementacion_trabajo"],
    //                 $data_table[$key]["id_usuario_preauditoria"],
    //                 $data_table[$key]["fecha_fin_preauditoria_trabajo"],
    //                 $data_table[$key]["fecha_creacion_trabajo"],
    //                 $data_table[$key]["fecha_cierre_trabajo"],
    //                 $data_table[$key]["solicitud_acompanamiento_dian_trabajo"],
    //                 $data_table[$key]["fecha_inscripcion_dian_trabajo"],
    //                 $data_table[$key]["fecha_visita_dian_trabajo"],
    //                 $data_table[$key]["estado_trabajo"]
    //             );
    //             array_push($arrayAuditores,$objtrabajo);
    //         }
    //         return $arrayAuditores;
    //     }else{
    //         return false;
    //     }
    // }
    public static function listadoTrabajoEsp($idusuario)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `trabajo` where id_usuario_diagnostico = ".$idusuario." or 
        id_usuario_implementacion  = ".$idusuario." or 
        id_usuario_preauditoria = ".$idusuario;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objtrabajo = new trabajo(
                    $data_table[$key]["id_trabajo"],
                    $data_table[$key]["id_entidad_trabajo"],
                    $data_table[$key]["id_usuario_diagnostico"],
                    $data_table[$key]["fecha_fin_diagnostico_trabajo"],
                    $data_table[$key]["id_usuario_implementacion"],
                    $data_table[$key]["fehca_fin_implementacion_trabajo"],
                    $data_table[$key]["id_usuario_preauditoria"],
                    $data_table[$key]["fecha_fin_preauditoria_trabajo"],
                    $data_table[$key]["fecha_creacion_trabajo"],
                    $data_table[$key]["fecha_cierre_trabajo"],
                    $data_table[$key]["solicitud_acompanamiento_dian_trabajo"],
                    $data_table[$key]["fecha_inscripcion_dian_trabajo"],
                    $data_table[$key]["fecha_visita_dian_trabajo"],
                    $data_table[$key]["estado_trabajo"]
                );
                array_push($arrayAuditores,$objtrabajo);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function listadoTrabajoEmpresa($idempresa)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `trabajo`   where  id_entidad_trabajo = ".$idempresa;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objtrabajo = new trabajo(
                    $data_table[$key]["id_trabajo"],
                    $data_table[$key]["id_entidad_trabajo"],
                    $data_table[$key]["id_usuario_diagnostico"],
                    $data_table[$key]["fecha_fin_diagnostico_trabajo"],
                    $data_table[$key]["id_usuario_implementacion"],
                    $data_table[$key]["fehca_fin_implementacion_trabajo"],
                    $data_table[$key]["id_usuario_preauditoria"],
                    $data_table[$key]["fecha_fin_preauditoria_trabajo"],
                    $data_table[$key]["fecha_creacion_trabajo"],
                    $data_table[$key]["fecha_cierre_trabajo"],
                    $data_table[$key]["solicitud_acompanamiento_dian_trabajo"],
                    $data_table[$key]["fecha_inscripcion_dian_trabajo"],
                    $data_table[$key]["fecha_visita_dian_trabajo"],
                    $data_table[$key]["estado_trabajo"]
                );
                array_push($arrayAuditores,$objtrabajo);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function listadoTrabajoGrupo($idempresa)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `trabajo`   where  id_entidad_trabajo = ".$idempresa;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objtrabajo = new trabajo(
                    $data_table[$key]["id_trabajo"],
                    $data_table[$key]["id_entidad_trabajo"],
                    $data_table[$key]["id_usuario_diagnostico"],
                    $data_table[$key]["fecha_fin_diagnostico_trabajo"],
                    $data_table[$key]["id_usuario_implementacion"],
                    $data_table[$key]["fehca_fin_implementacion_trabajo"],
                    $data_table[$key]["id_usuario_preauditoria"],
                    $data_table[$key]["fecha_fin_preauditoria_trabajo"],
                    $data_table[$key]["fecha_creacion_trabajo"],
                    $data_table[$key]["fecha_cierre_trabajo"],
                    $data_table[$key]["solicitud_acompanamiento_dian_trabajo"],
                    $data_table[$key]["fecha_inscripcion_dian_trabajo"],
                    $data_table[$key]["fecha_visita_dian_trabajo"],
                    $data_table[$key]["estado_trabajo"]
                );
                array_push($arrayAuditores,$objtrabajo);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function listadoObservacionesImpl($idItem,$idPro)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `implementacion_proyecto` where id_proyecto = ".$idPro." and id_item_grupo_plantilla_certificacion = ".$idItem." and estado_implementacion <> 'init' ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objtrabajo = new  implementacion_proyecto(
                    $data_table[$key]["id_implementacion_item_proyecto"],
                    $data_table[$key]["id_item_grupo_plantilla_certificacion"],
                    $data_table[$key]["id_proyecto"],
                    $data_table[$key]["comentario_implementacion"],
                    $data_table[$key]["porcentaje_avance"],
                    $data_table[$key]["fecha_comentario_implementacion"],
                    $data_table[$key]["estado_implementacion"],
                    $data_table[$key]["colaboradores"]
                );
                array_push($arrayAuditores,$objtrabajo);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function verificarFecha($id,$fecha, $idproyecto)
    {
        $data_source = new DataSource();
        $sql = "SELECT * FROM `implementacion_proyecto` WHERE id_item_grupo_plantilla_certificacion =".$id
        ." and fecha_comentario_implementacion='".$fecha."'" 
        ." and id_proyecto=".$idproyecto ;
        //echo $sql."<br>";
        $data_table = $data_source->ejecutarConsulta( $sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objtrabajo = new  implementacion_proyecto(
                    $data_table[$key]["id_implementacion_item_proyecto"],
                    $data_table[$key]["id_item_grupo_plantilla_certificacion"],
                    $data_table[$key]["id_proyecto"],
                    $data_table[$key]["comentario_implementacion"],
                    $data_table[$key]["porcentaje_avance"],
                    $data_table[$key]["fecha_comentario_implementacion"],
                    $data_table[$key]["estado_implementacion"],
                    $data_table[$key]["colaboradores"]
                    
                );
                array_push($arrayAuditores,$objtrabajo);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function ultimoTrabajoRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `trabajo` ORDER BY `trabajo`.`id_trabajo` DESC limit 1");
        return $data_table[0]["id_trabajo"];
    }
    public static function ncapGrupo($idGrupo)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero' FROM `item_grupo_plantilla_alcance` 
            join grupo_plantilla_alcance on(grupo_plantilla_alcance.id_grupo_plantilla_alcance=item_grupo_plantilla_alcance.id_grupo_plantilla_certificacion)
             where id_grupo_plantilla_certificacion =".$idGrupo);
        return $data_table[0]["numero"];
    }
    public static function ncolaboradoresItem($idimpl)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero' FROM `implementacion_colaborador` WHERE id_implementacion_item_proyecto =".$idimpl);
        return $data_table[0]["numero"];
    }
    public static function estado_proyecto($idimpl)
    {
        $data_source = new DataSource();
        $sql = "select avg(implementacion.porcentaje_avance) as porcentaje_total
        from
        (SELECT max(imp.id_implementacion_item_proyecto) as item_implementacion ,imp. id_item_grupo_plantilla_certificacion as item, max(imp.fecha_comentario_implementacion)  as fecha_actual FROM implementacion_proyecto as imp WHERE imp.id_proyecto=".$idimpl." GROUP by item order by item)
         as resultado join  implementacion_proyecto as implementacion
        on (implementacion. id_implementacion_item_proyecto= resultado.item_implementacion)";
        $data_table = $data_source->ejecutarConsulta($sql
            );
        return $data_table[0]["porcentaje_total"];
    }
    public static function fechasReporte($id)
    {
        $data_source = new DataSource();
        $sql ="select DISTINCT(implementacion_proyecto.fecha_comentario_implementacion) as 'fecha' from implementacion_proyecto
         WHERE implementacion_proyecto.id_proyecto=".$id." 
         order by implementacion_proyecto.fecha_comentario_implementacion asc";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql );
        $arrayFechas = array();
        foreach ($data_table as $key => $value) {
 
            array_push($arrayFechas ,$data_table[$key]["fecha"]);
            //echo $data_table[$key]["fecha"]." <br>";
        }
        //print_r($arrayFechas);
        return $arrayFechas;
    }
    public static function finalizarDiagnosticoVerificacion($idtrabajo)
    {
        $data_source = new DataSource();
        $sql ="SELECT * FROM `proyecto` where 	id_trabajo_proyecto =".$idtrabajo;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql );
        $noPro=count($data_table);
        $sinTer =0;
        $ter=0;
        foreach ($data_table as $key => $value) {
            if( $data_table[$key]["estado_proyecto"] == "Fase Diag Terminado"){
                    $ter++;
            }else{
                    $sinTer++;
            }
        }
        return $array = [
                "Numero Proyectos" => $noPro,
                "Sin Terminar" => $sinTer,
                "Terminados" => $ter
        ];
    }
    public static function finalizarDiagnosticoActual($idProyecto)
    {
        $data_source = new DataSource();
       // $sql ="SELECT count(*) as 'numero' FROM `diagnostico_proyecto` where id_proyecto = ".$idtrabajo." and estado_diagnostico = '0' and  comentario_dliagnostico= '' OR comentario_dliagnostico IS NULL";
        //echo $sql;
        $sql= "SELECT item.id_item_grupo_plantilla_certificacion as id_item, 
        item.etiqueta_item_plantilla as etiqueta FROM `diagnostico_proyecto` 
        join item_grupo_plantilla_alcance as item on (item.id_item_grupo_plantilla_certificacion=diagnostico_proyecto.id_item_grupo_plantilla_alcance)
        where id_proyecto =" .$idProyecto 
        ." and (estado_diagnostico = '0' or  comentario_dliagnostico= '' OR comentario_dliagnostico IS NULL) 
        ORDER by item.id_item_grupo_plantilla_certificacion asc ";
        $data_table = $data_source->ejecutarConsulta($sql );
        //return $data_table[0]['numero'];
        return $data_table;
    }


    public static function finalizarPreActual($idProyecto)
    {
        $data_source = new DataSource();
       /* $sql ="SELECT count(*) as 'numero' FROM `preauditoria_proyecto` where id_proyecto = ".$idtrabajo."
         and 
        length(comentario_preauditoria) = 0  and 
        estado_preauditoria = 'init' ";
        //echo $sql;
        */
        $sql="SELECT preauditoria_proyecto.id_item_grupo_plantilla_certificacion as id_item, item.etiqueta_item_plantilla as etiqueta 
        FROM preauditoria_proyecto
        join item_grupo_plantilla_alcance as item 
        on (preauditoria_proyecto.id_item_grupo_plantilla_certificacion=item.id_item_grupo_plantilla_certificacion)
        where id_proyecto = " .$idProyecto
        ." and ( (length(comentario_preauditoria) = 0)  or 
                estado_preauditoria = 'init' or
                preauditoria_proyecto.comentario_preauditoria is null)";
        $data_table = $data_source->ejecutarConsulta($sql );
        return $data_table;
    }
    public static function validarObservacionPreUserbservacion($idproyecto,$iditem,$estado, $modelTrabajo)
    {
        $data_source = new DataSource();
        //$sql ="SELECT * FROM `diagnostico_proyecto` where id_proyecto = ".$idproyecto." and id_item_grupo_plantilla_alcance = ".$iditem ." and 	estado_diagnostico='0'";
        //echo $sql;
        //$resultado = $data_source->ejecutarActualizacion($sql);
        //print_r($resultado);
        //if(intval($resultado)>0){
            $sql2 = "UPDATE `diagnostico_proyecto` SET  estado_diagnostico= '".$estado."' ,comentario_dliagnostico = '". $modelTrabajo."'  WHERE id_proyecto = ".$idproyecto." and id_item_grupo_plantilla_alcance = ".$iditem ;
           // echo ($sql2);
            $resultado2 = $data_source->ejecutarActualizacion($sql2);
        //}
        
    }
    /* public static function finalizarDiagnosticoImplementacion($id)
    {
        $v = 0;
        $c=0;
        $sum = 0;
        $objProyecto=trabajoController::proyectoId($id);
        $objPlantilla=plantillaController::plantillaId($objProyecto->getId_plantilla_alcance_proyecto());
        $objtGruposPlantilla = plantillaController::GrupoPlantillaListado($objPlantilla->getId_plantilla_alcance());
        foreach ($objtGruposPlantilla as $key => $value) {
        $objRequisito = plantillaController::grupoPlantillaItemListado($objtGruposPlantilla[$key]->getId_grupo_plantilla_alcance());
        
            foreach ($objRequisito as $key => $value) {
                $c++;
                $ob=trabajoController::NumobservacionRequisitoImplementacion($id,$objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
                $objObservacion = trabajoController::observacionRequisitoImplementacion($objProyecto->getId_proyecto(),$objRequisito[$key]->getId_item_grupo_plantilla_certificacion());
                $sum = intval($sum) + intval($objObservacion->getPorcentaje_avance());
                if(intval($ob) < 2){$v++;}
            }
        }
        $sum = intval($sum) / intval($c);
        if(intval($v) == 0   ){
            if( intval($sum) >= 80  ){ return 1; 
            }else{ return 2; }
        }else{ return 0; }
    } */

    public static function finalizarDiagnosticoImplementacion($idProyecto)
    {
        $data_source = new DataSource();
         $sql= "select imp.id_item_grupo_plantilla_certificacion as id_item,
          item.etiqueta_item_plantilla as etiqueta , count(*) as cantidad 
          from implementacion_proyecto as imp 
          join item_grupo_plantilla_alcance as item 
          on (item.id_item_grupo_plantilla_certificacion=imp.id_item_grupo_plantilla_certificacion) 
          WHERE imp.id_proyecto=" .$idProyecto
          ." group by imp.id_item_grupo_plantilla_certificacion 
          HAVING cantidad < 2 order by imp.id_item_grupo_plantilla_certificacion asc ";
         
          $data_table = $data_source->ejecutarConsulta($sql );
         
         return $data_table;
        
    }
    public static function cancelarDiagnostico($idtrabajo){
        $data_source = new DataSource();
        $sql2 = "UPDATE `proyecto` SET  estado_proyecto= 'Cancelado Fase Diag' WHERE 	id_proyecto = ".$idtrabajo;
        //echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
    public static function iniciarDiagnostico($idtrabajo){
        $data_source = new DataSource();
        $sql2 = "UPDATE `proyecto` SET  estado_proyecto= 'Fase Diag' WHERE 	id_proyecto = ".$idtrabajo;
        //echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
    public static function cancelarImplementacion($idtrabajo){
        $data_source = new DataSource();
        $sql2 = "UPDATE `proyecto` SET  estado_proyecto= 'Cancelado Fase Impl' WHERE 	id_proyecto = ".$idtrabajo;
        //echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
    public static function finalizarDiagnostico($idtrabajo){
        $data_source = new DataSource();
        $sql2 = "UPDATE `proyecto` SET  estado_proyecto= 'Fase Impl' , fechaFinDiagnostico= NOW() WHERE 	id_proyecto = ".$idtrabajo;
        //echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
    public static function modificarContrato($id,$valor){
        $data_source = new DataSource();
        $sql2 = "UPDATE `contrato` SET  valor_contrato= ".$valor."  WHERE id_contrato = ".$id;
        //echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
    public static function finalizarPre($idtrabajo){
        $data_source = new DataSource();
        $sql2 = "UPDATE `proyecto` SET  estado_proyecto= 'Fin Proceso' , 	fechaFinPre= NOW() WHERE 	id_proyecto = ".$idtrabajo;
        //echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
    public static function finalizarImplementacion($idtrabajo){
        $data_source = new DataSource();
        $sql2 = "UPDATE `proyecto` SET  estado_proyecto= 'Fase PreA' , 	fechaFinImplementacion= NOW() WHERE 	id_proyecto = ".$idtrabajo;
        //echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
    public static function eliminarUsuarioColaborador($idusuario,$implementacion){
        $data_source = new DataSource();
        $sql2 = "DELETE FROM `implementacion_colaborador` WHERE `implementacion_colaborador`.`id_implementacion_item_proyecto` = ".$implementacion." AND `implementacion_colaborador`.`id_colaborador_implementacion` = ".$idusuario;
        //echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
    public static function eliminarAcuerdo($idcontrato){
        $data_source = new DataSource();
        $sql = "DELETE FROM `cuota` WHERE id_acuerdo_pago_cuota = ".$idcontrato;
       // echo $sql;
        $resultado2 = $data_source->ejecutarActualizacion($sql);
        $sql2 = "DELETE FROM `acuerdo_pago` WHERE id_acuerdo_pago = ".$idcontrato;
        //echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
    public static function renderActa($idproyecto,$f1)
    {
        $data_source = new DataSource();
        $sql = "
        SELECT implementacion_proyecto.colaboradores, requisito.etiqueta_item_plantilla, requisito.descripcion_item_plantilla, implementacion_proyecto.comentario_implementacion, implementacion_proyecto.fecha_comentario_implementacion from item_grupo_plantilla_alcance as requisito join (SELECT max(imp.id_implementacion_item_proyecto) as item_implementacion ,imp. id_item_grupo_plantilla_certificacion as item, imp.fecha_comentario_implementacion as fecha_actual 
        FROM implementacion_proyecto as imp 
        WHERE imp.id_proyecto=".$idproyecto." and imp.fecha_comentario_implementacion = '".$f1."' 
        GROUP by item, fecha_actual order by item) as resultado on requisito.id_item_grupo_plantilla_certificacion=resultado.item join implementacion_proyecto on resultado.item_implementacion=implementacion_proyecto.id_implementacion_item_proyecto";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                array_push($arrayAuditores, $data_table[$key]);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
       
    }
    public static function renderActa2($idproyecto,$f1,$f2)
    {
        $data_source = new DataSource();
        $sql = "
        SELECT 
        implementacion_proyecto.colaboradores,
        requisito.etiqueta_item_plantilla,
        requisito.descripcion_item_plantilla,
        implementacion_proyecto.comentario_implementacion,
        implementacion_proyecto.fecha_comentario_implementacion 
        from item_grupo_plantilla_alcance as requisito join (SELECT max(imp.id_implementacion_item_proyecto) as item_implementacion ,
        imp. id_item_grupo_plantilla_certificacion as item, imp.fecha_comentario_implementacion as fecha_actual 
        FROM implementacion_proyecto as imp 
        WHERE imp.id_proyecto=".$idproyecto." and
        imp.fecha_comentario_implementacion BETWEEN '".$f1."' and '".$f2."' and  imp.estado_implementacion <> 'init'
        GROUP by item, fecha_actual order by item) as resultado on requisito.id_item_grupo_plantilla_certificacion=resultado.item
         join implementacion_proyecto on resultado.item_implementacion=implementacion_proyecto.id_implementacion_item_proyecto";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                array_push($arrayAuditores, $data_table[$key]);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
}