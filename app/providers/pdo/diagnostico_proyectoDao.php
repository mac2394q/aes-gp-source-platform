<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."diagnostico_proyecto.php");
require_once(MODEL_PATH."implementacion_proyecto.php");
require_once(MODEL_PATH."preauditoria_proyecto.php");
class diagnostico_proyectoDao
{
    public static function registrarPre_proyecto($modelDiagnostico_proyecto){
        
        $data_source = new DataSource(); 
        $sql2 = "INSERT INTO  preauditoria_proyecto VALUES 
        (NULL,:id_item_grupo_plantilla_certificacion,:id_proyecto,:comentario_preauditoria,:estado_preauditoria)";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':id_proyecto' =>$modelDiagnostico_proyecto->getId_proyecto(),
            ':id_item_grupo_plantilla_certificacion' =>$modelDiagnostico_proyecto->getId_item_grupo_plantilla_certificaion() ,
            ':comentario_preauditoria' =>$modelDiagnostico_proyecto->getComentario_preauditoria(),
            ':estado_preauditoria' =>$modelDiagnostico_proyecto->getEstado_preauditoria()
        )); 
        
        return $resultado2;

   
    }
    //*********************************************************************************/
    public static function actualizarPre_proyecto($modelDiagnostico_proyecto){
        
        $data_source = new DataSource(); 
        
        $sql2="update preauditoria_proyecto set  comentario_preauditoria ='" .$modelDiagnostico_proyecto->getComentario_preauditoria()
        ."' , estado_preauditoria ='" .$modelDiagnostico_proyecto->getEstado_preauditoria() ."'"
        ." where id_item_grupo_plantilla_certificacion=".$modelDiagnostico_proyecto->getId_item_grupo_plantilla_certificaion() 
        ." and id_proyecto=" .$modelDiagnostico_proyecto->getId_proyecto();

        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;


    }
    //********************************************************************************/
    public static function  registrarObservacionDiagnostico($modelDiagnostico_proyecto){
        
        $data_source = new DataSource();
        $sql2 = "INSERT INTO  diagnostico_proyecto VALUES 
        (NULL,:id_proyecto,:id_item_grupo_plantilla_alcance,:comentario_dliagnostico,:estado_diagnostico)";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':id_proyecto' =>$modelDiagnostico_proyecto->getId_proyecto() ,
            ':id_item_grupo_plantilla_alcance' =>$modelDiagnostico_proyecto->getId_item_grupo_plantilla_alcance() ,
            ':comentario_dliagnostico' =>$modelDiagnostico_proyecto->getComentario_diagnostico() ,
          
            ':estado_diagnostico' =>$modelDiagnostico_proyecto->getEstado_diagnostico() 
        ));
        return $resultado2;
    }
    public static function registrarImplementacion_proyecto($modelDiagnostico_proyecto,$idImple){
        
        $data_source = new DataSource();
        $sql2 = "INSERT INTO  implementacion_proyecto VALUES 
        (NULL,:id_item_grupo_plantilla_certificacion,:id_proyecto,:comentario_implementacion,:porcentaje_avance,now(),'ACTIVO')";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':id_item_grupo_plantilla_certificacion' =>$modelDiagnostico_proyecto->getId_item_grupo_plantilla_certificacion() ,
            ':id_proyecto' =>$modelDiagnostico_proyecto->getId_proyecto(),
            ':comentario_implementacion' =>$modelDiagnostico_proyecto->getComentario_implementacion(),
            ':porcentaje_avance' =>$modelDiagnostico_proyecto->getPorcentaje_avance()
        ));
        $data_table_item = $data_source->ejecutarConsulta("SELECT id_implementacion_item_proyecto as 'id' FROM `implementacion_proyecto` ORDER BY `implementacion_proyecto`.`id_implementacion_item_proyecto` DESC limit 1");
        $data_table_colaboradores_item = $data_source->ejecutarConsulta("SELECT * FROM `implementacion_colaborador` join colaborador on(implementacion_colaborador.id_colaborador_implementacion=colaborador.id_colaborador) where id_implementacion_item_proyecto = ".$idImple);
            foreach ( $data_table_colaboradores_item as $key => $value) {
                
                trabajoDao::asignarUsuarioColaborador($data_table_colaboradores_item[$key]["id_colaborador"],$data_table_item[0]['id']);
              
            }
    }
    public static function registrarImplementacion_proyectoValidacionFecha($modelDiagnostico_proyecto){
       $resultado=false; 
        $data_source = new DataSource();
        date_default_timezone_set('America/Bogota');
        setlocale(LC_ALL,"es_CO");
        //$sql = "SELECT * FROM implementacion_proyecto where id_implementacion_item_proyecto =".$idImple;
        $sql = "SELECT * FROM implementacion_proyecto WHERE id_proyecto=" .$modelDiagnostico_proyecto->getId_proyecto()
         ."  and id_item_grupo_plantilla_certificacion =" .$modelDiagnostico_proyecto->getId_item_grupo_plantilla_certificacion()
        ." order by fecha_comentario_implementacion desc";
        
        $data_table_itemVerificado = $data_source->ejecutarConsulta($sql);
        $idImple=$data_table_itemVerificado[0]['id_implementacion_item_proyecto'];
        //echo "**sql checkeo:" .$sql ."--:$idImple";

        if( $data_table_itemVerificado[0]['fecha_comentario_implementacion'] == "".date('Y-m-d')  ){
            if($data_table_itemVerificado[0]['estado_implementacion'] != 'init'){
                echo "<p class='parrafo'> Comentario actualizado </p>";
                $sql2 = "
                UPDATE `implementacion_proyecto` SET
                                comentario_implementacion='".$modelDiagnostico_proyecto->getComentario_implementacion()."',
                                porcentaje_avance=".$modelDiagnostico_proyecto->getPorcentaje_avance().",
                                estado_implementacion =    'ACTIVO',
                                colaboradores = '".$modelDiagnostico_proyecto->getColaboradores()."'
                WHERE id_implementacion_item_proyecto=".$idImple;
                $resultado2 = $data_source->ejecutarActualizacion($sql2);
                $resultado=true;
            }
        }else{
            echo "<p class='parrafo'>Nuevo Comentario agregado </p>";
            $sql2 = "INSERT INTO  implementacion_proyecto VALUES (NULL,:id_item_grupo_plantilla_certificacion,:id_proyecto,:comentario_implementacion,:porcentaje_avance,now(),'ACTIVO',:colaboradores)";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':id_item_grupo_plantilla_certificacion' =>$modelDiagnostico_proyecto->getId_item_grupo_plantilla_certificacion() ,
            ':id_proyecto' =>$modelDiagnostico_proyecto->getId_proyecto(),
            ':comentario_implementacion' =>$modelDiagnostico_proyecto->getComentario_implementacion(),
            ':porcentaje_avance' =>$modelDiagnostico_proyecto->getPorcentaje_avance(),
            ':colaboradores' =>$modelDiagnostico_proyecto->getColaboradores()
            ));
            // $data_table_item = $data_source->ejecutarConsulta("SELECT id_implementacion_item_proyecto as 'id' FROM `implementacion_proyecto` ORDER BY `implementacion_proyecto`.`id_implementacion_item_proyecto` DESC limit 1");
            // $data_table_colaboradores_item = $data_source->ejecutarConsulta("SELECT * FROM `implementacion_colaborador` join colaborador on(implementacion_colaborador.id_colaborador_implementacion=colaborador.id_colaborador) where id_implementacion_item_proyecto = ".$idImple);
           $resultado=true;
        }
        
        return $resultado;
    }
    public static function registrarImplementacion_proyecto2($modelDiagnostico_proyecto){
        
        $data_source = new DataSource();
        $sql2 = "INSERT INTO  implementacion_proyecto VALUES 
        (NULL,
        ".$modelDiagnostico_proyecto->getId_item_grupo_plantilla_certificacion().",
        ".$modelDiagnostico_proyecto->getId_proyecto().",
        '".$modelDiagnostico_proyecto->getComentario_implementacion()."',
        ".$modelDiagnostico_proyecto->getPorcentaje_avance().",
        NOW(),
        'init',
        '')";
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        // echo $sql2;
        // echo "<br>==========================================================================";
        return $resultado2;
    }
    public static function modificarDiagnostico_proyecto($modelDiagnostico_proyecto){
        $data_source = new DataSource();
        $sql2 = "UPDATE `dianostico_proyecto` SET
        id_proyecto=:id_proyecto,
        id_item_grupo_plantilla_alcance=:id_item_grupo_plantilla_alcance,
        comentario_diagnostico=:comentario_diagnostico,
        estado_diagnostico=:estado_diagnostico
        WHERE id_diagnostico_item_proyecto = :id_diagnostico_item_proyecto";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':id_diagnostico_item_proyecto'=>$modelDiagnostico_proyecto->getId_diagnostico_item_proyecto(),
            ':id_proyecto' =>$modelDiagnostico_proyecto->getId_proyecto(),
            ':id_item_grupo_plantilla_alcance' =>$modelDiagnostico_proyecto->getId_item_grupo_plantilla_alcance(),
            ':comentario_diagnostico' =>$modelDiagnostico_proyecto->getComentario_diagnostico() ,
            ':estado_diagnostico' =>$modelDiagnostico_proyecto-> getEstado_diagnostico()
        ));
        return $resultado2;
    }
    public static function diagnostico_proyectoId($idproyecto,$id)
    {
        $data_source = new DataSource();
        $sql ="SELECT * FROM diagnostico_proyecto WHERE id_proyecto = ".$idproyecto." and  id_item_grupo_plantilla_alcance =".$id." ORDER BY `diagnostico_proyecto`.`id_diagnostico_item_proyecto` DESC";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
        $objdiagnostico_proyecto = new diagnostico_proyecto(
            $data_table[0]["id_diagnostico_item_proyecto"],
            $data_table[0]["id_proyecto"],
            $data_table[0]["id_item_grupo_plantilla_alcance"],
            $data_table[0]["comentario_dliagnostico"],
            $data_table[0]["estado_diagnostico"]
        );
        return $objdiagnostico_proyecto;
        }else{
            return false;
        }
    }
    public static function preauditoria_proyectoId($idproyecto,$id)
    {
        $data_source = new DataSource();
        $sql ="SELECT * FROM preauditoria_proyecto WHERE id_proyecto = ".$idproyecto." and  id_item_grupo_plantilla_certificacion =".$id." ORDER BY `preauditoria_proyecto`.`id_preauditoria_item_proyecto` DESC";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
        $objdiagnostico_proyecto = new preauditoria_proyecto(
            $data_table[0]["id_preauditoria_item_proyecto"],
            $data_table[0]["id_item_grupo_plantilla_certificacion"],
            $data_table[0]["id_proyecto"],
            $data_table[0]["comentario_preauditoria"],
            $data_table[0]["estado_preauditoria"]
        );
        return $objdiagnostico_proyecto;
        }else{
            return false;
        }
    }
    public static function implementacion_proyectoId($idproyecto,$id)
    {
        $data_source = new DataSource();
        $sql ="SELECT * FROM implementacion_proyecto WHERE    id_proyecto = ".$idproyecto." and id_item_grupo_plantilla_certificacion =".$id." ORDER BY `implementacion_proyecto`.`id_implementacion_item_proyecto` DESC";
        //echo $sql."<br>";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
        $objdiagnostico_proyecto = new implementacion_proyecto(
            $data_table[0]["id_implementacion_item_proyecto"],
            $data_table[0]["id_item_grupo_plantilla_certificacion"],
            $data_table[0]["id_proyecto"],
            $data_table[0]["comentario_implementacion"],
            $data_table[0]["porcentaje_avance"],
            $data_table[0]["fecha_comentario_implementacion"],
            $data_table[0]["estado_implementacion"],
            $data_table[0]["colaboradores"]
        );
        return $objdiagnostico_proyecto;
        }else{
            return false;
        }
    }
    public static function implementacion_proyectoId3($id)
    {
        $data_source = new DataSource();
        $sql ="SELECT * FROM `implementacion_proyecto` where id_implementacion_item_proyecto = ".$id;
        //echo $sql."<br>";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
        $objdiagnostico_proyecto = new implementacion_proyecto(
            $data_table[0]["id_implementacion_item_proyecto"],
            $data_table[0]["id_item_grupo_plantilla_certificacion"],
            $data_table[0]["id_proyecto"],
            $data_table[0]["comentario_implementacion"],
            $data_table[0]["porcentaje_avance"],
            $data_table[0]["fecha_comentario_implementacion"],
            $data_table[0]["estado_implementacion"],
            $data_table[0]["colaboradores"]
        );
        return $objdiagnostico_proyecto;
        }else{
            return false;
        }
    }
    public static function implementacion_proyectoId2($idproyecto,$id)
    {
        $data_source = new DataSource();
        $sql ="SELECT * FROM implementacion_proyecto WHERE    id_proyecto = ".$idproyecto." and id_item_grupo_plantilla_certificacion =".$id."  ORDER BY `implementacion_proyecto`.`fecha_comentario_implementacion` ASC";
        //echo $sql."<br>";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayModel=array();
            foreach ($data_table as $key => $value) {
                $objdiagnostico_proyecto = new implementacion_proyecto(
                $data_table[$key]["id_implementacion_item_proyecto"],
                $data_table[$key]["id_item_grupo_plantilla_certificacion"],
                $data_table[$key]["id_proyecto"],
                $data_table[$key]["comentario_implementacion"],
                $data_table[$key]["porcentaje_avance"],
                $data_table[$key]["fecha_comentario_implementacion"],
                $data_table[$key]["estado_implementacion"],
                $data_table[$key]["colaboradores"]);
                array_push($arrayModel,$objdiagnostico_proyecto);
            }
        return $arrayModel;
        }else{
            return false;
        }
    }
    public static function Numimplementacion_proyectoId($idproyecto,$id)
    {
        $data_source = new DataSource();
        $sql ="SELECT count(*) as 'numero' FROM implementacion_proyecto WHERE  id_proyecto = ".$idproyecto." and id_item_grupo_plantilla_certificacion =".$id." ";
        $data_table = $data_source->ejecutarConsulta($sql);
        return  $data_table[0]["numero"];
    }
    public static function listadoDiagnostico_proyecto()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `diagnostico_proyecto`   ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayModel=array();
            foreach ($data_table as $key => $value) {
                $objModel= new diagnostico_proyecto(
                    $data_table[$key]["id_diagnostico_item_proyecto"],
                    $data_table[$key]["id_proyecto"],
                    $data_table[$key]["	id_item_grupo_plantilla_alcance"],
                    $data_table[$key]["comentario_dliagnostico"],
                    $data_table[$key]["estado_diagnostico"]
                );
                array_push($arrayModel,$objModel);
            }
            return $arrayModel;
        }else{
            return false;
        }
    }
    public static function ultimaDiagnostico_proyectoRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `diagnostico_proyecto` as 'numero' ORDER BY `diagnostico_proyecto`.`	id_diagnostico_item_proyecto` DESC  limit 1");
        return $data_table[0]["numero"];
    }
}