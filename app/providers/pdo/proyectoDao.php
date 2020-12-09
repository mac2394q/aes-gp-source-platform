<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."proyecto.php");
require_once(MODEL_PATH."empresa_proyecto.php");
class proyectoDao
{
    public static function registrarProyecto($modelProyecto){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `proyecto` VALUES (
                NULL,
                :id_trabajo_proyecto,
                :id_plantilla_alcance_proyecto,
                'Fase Diag Iniciado',
                NUll,NULL,NULL
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_trabajo_proyecto' =>$modelProyecto->getId_trabajo_proyecto(),
                ':id_plantilla_alcance_proyecto' =>$modelProyecto->getId_plantilla_alcance_proyecto()
            ));
            return $resultado2;
    }
    public static function registrarEmpresa_proyecto($modelEmpresa_proyecto){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `empresa_proyecto` VALUES (
                NULL,
                :id_entidad_empresa_proyecto,
                :id_proyecto_empresa,
                NULL,
                'ACTIVO')";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_entidad_empresa_proyecto' =>$modelEmpresa_proyecto->getId_entidad_empresa_proyecto(),
                ':id_proyecto_empresa' =>$modelEmpresa_proyecto->getId_proyecto_empresa()
            ));
            return $resultado2;
    }
    public static function modificarProyecto($modelProyecto){
        $data_source = new DataSource();
             $sql2 = "UPDATE `proyecto` SET
                id_trabajo_proyecto=:id_trabajo_proyecto,
                id_plantilla_alcance_proyecto=:id_plantilla_alcance_proyecto,
                estado_proyecto=:estado_proyecto
                WHERE 	id_proyecto = :id_proyecto
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_proyecto'=>$modelProyecto->getId_proyecto(),
                ':id_trabajo_proyecto' =>$modelProyecto->getId_trabajo_proyecto(),
                ':id_plantilla_alcance_proyecto' =>$modelProyecto->getId_plantilla_alcance_proyecto(),
                ':estado_proyecto' =>$modelProyecto->getEstado_proyecto()
            ));
            return $resultado2;
    }
    
    public static function asignarContractoProyecto($id,$idproyecto){
        //echo $id." ".$idproyecto; 
        $data_source = new DataSource();
             $sql2 = "UPDATE `empresa_proyecto`
              SET id_contrato_empresa_proyecto=".$id."
              WHERE id_empresa_proyecto = ".$idproyecto;
              
            $resultado2 = $data_source->ejecutarActualizacion($sql2);
            return $resultado2;
    }
    public static function proyectoId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `proyecto` where id_proyecto = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objproyecto = new proyecto(
            $data_table[0]["id_proyecto"],
            $data_table[0]["id_trabajo_proyecto"],
            $data_table[0]["id_plantilla_alcance_proyecto"],
            $data_table[0]["estado_proyecto"]
            
        );
       return $objproyecto;
    }

    public static function proyectoIdTrabajo($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `proyecto` join trabajo on(trabajo.id_trabajo=proyecto.id_trabajo_proyecto) where proyecto.id_trabajo_proyecto =  ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objproyecto = new proyecto(
                    $data_table[$key]["id_proyecto"],
                    $data_table[$key]["id_trabajo_proyecto"],
                    $data_table[$key]["id_plantilla_alcance_proyecto"],
                    $data_table[$key]["estado_proyecto"]
                );
                array_push($arrayAuditores,$objproyecto);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    
    
    //hernan **********************************************************************
    
    public static function listaProyectoPendientes($idTrabajo)
    {
    
        $data_source = new DataSource();
        $sql =" SELECT count(*) as cantidad from proyecto WHERE proyecto.id_trabajo_proyecto=" .$idTrabajo
        ." and proyecto.estado_proyecto not in ('Fin Proceso', 'Cancelado Fase Diag', 'Cancelado Fase Impl', 'Cancelado Fase Pre')";
        
        $data_table = $data_source->ejecutarConsulta($sql);
        return  $data_table[0]['cantidad'];
    }
//********************************************************************************* */


    public static function proyectoIdFechas($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `proyecto` where id_proyecto = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        return $data_table;
    }

    public static function empresasPreauditoria($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT empresa.nombre_empresa, empresa.identificacion_empresa FROM empresa_proyecto
        join empresa  on empresa_proyecto.id_entidad_empresa_proyecto= empresa.id_entidad
        WHERE empresa_proyecto.id_proyecto_empresa=".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        return $data_table;
    }


    public static function listadoProyecto()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `proyecto`   ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objproyecto = new proyecto(
                    $data_table[$key]["id_proyecto"],
                    $data_table[$key]["id_trabajo_proyecto"],
                    $data_table[$key]["id_plantilla_alcance_proyecto"],
                    $data_table[$key]["estado_proyecto"]
                );
                array_push($arrayAuditores,$objproyecto);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function listadoProyectoTrabajoResumen($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM proyecto join plantilla_alcance on(proyecto.id_plantilla_alcance_proyecto=plantilla_alcance.id_plantilla_alcance) join alcance on(plantilla_alcance.id_alcance_plantilla=alcance.id_alcance) where id_trabajo_proyecto = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objproyecto = new proyecto(
                    $data_table[$key]["id_proyecto"],
                    $data_table[$key]["id_trabajo_proyecto"],
                    $data_table[$key]["etiqueta_plantilla"]." - ".$data_table[$key]["nombre_alcance"],
                    $data_table[$key]["estado_proyecto"]
                );
                array_push($arrayAuditores,$objproyecto);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function listadoProyectosTrabajoEmpresa($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM proyecto 
         join empresa_proyecto on(proyecto.id_proyecto=empresa_proyecto.id_proyecto_empresa)
         join plantilla_alcance on(proyecto.id_plantilla_alcance_proyecto=plantilla_alcance.id_plantilla_alcance)
         join alcance on(plantilla_alcance.id_alcance_plantilla=alcance.id_alcance)
         join empresa on(empresa_proyecto.id_entidad_empresa_proyecto=empresa.id_entidad)
         where proyecto.id_trabajo_proyecto=".$id." ORDER BY `empresa_proyecto`.`id_entidad_empresa_proyecto` ASC
        ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objproyecto = new empresa_proyecto(
                    $data_table[$key]["id_empresa_proyecto"],
                    $data_table[$key]["nombre_empresa"],
                    $data_table[$key]["etiqueta_plantilla"]." - ".$data_table[$key]["nombre_alcance"],
                    $data_table[$key]["id_contrato_empresa_proyecto"],
                    $data_table[$key]["estado_empresa_proyecto"]
                );
                array_push($arrayAuditores,$objproyecto);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function verificarProyectoPlantilla($idtrabajo,$idplantilla)
    {
        $data_source = new DataSource();
        //echo "SELECT count(*)  as 'numero' FROM `proyecto` WHERE id_trabajo_proyecto =".$idtrabajo."  AND id_plantilla_alcance_proyecto = ".$idplantilla;
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*)  as 'numero' FROM `proyecto` WHERE id_trabajo_proyecto =".$idtrabajo."  AND id_plantilla_alcance_proyecto = ".$idplantilla);
        return $data_table[0]["numero"];
    }
    public static function  verificarProyectoEmpresa($tipoEntidad,$idProyecto)
    {
        $data_source = new DataSource();
        //echo "SELECT count(*)  as 'numero' FROM `proyecto` WHERE id_trabajo_proyecto =".$idtrabajo."  AND id_plantilla_alcance_proyecto = ".$idplantilla;
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*)  as 'numero' FROM `empresa_proyecto` WHERE   id_entidad_empresa_proyecto =".$tipoEntidad."  AND id_proyecto_empresa = ".$idProyecto);
        return $data_table[0]["numero"];
    }
    public static function ultimaProyectoRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `proyecto` as 'numero' ORDER BY `proyecto`.`id_proyecto` DESC  limit 1");
        return $data_table[0]["numero"];
    }
    public static function eliminarProyecto($idProyecto)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("DELETE FROM proyecto
      WHERE id_proyecto=:id ", array(':id' => $idProyecto));
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }
    public static function eliminarProyectoEmpresa($idProyecto)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("DELETE FROM empresa_proyecto
      WHERE id_empresa_proyecto=:id ", array(':id' => $idProyecto));
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }
}