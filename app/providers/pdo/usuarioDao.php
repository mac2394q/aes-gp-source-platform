<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."usuario.php");
require_once(MODEL_PATH."colaborador.php");
class usuarioDao
{
    public static function autenticacion($usuario,$clave,$idusuario)
    {
        
        $data_source = new DataSource();
        $sql = "UPDATE usuario SET
            login_usuario = '".$usuario."',
            clave_usuario = '".$clave."'
        WHERE id_usuario = ".$idusuario;
        //echo $sql;
        $resultado2 = $data_source->ejecutarActualizacion($sql);
        return $resultado2;
    }
    
    public static function registrarUsuario($modelUsuario){
        $data_source = new DataSource();
        $sql2 = "INSERT INTO `usuario` VALUES (
                NULL,
                :id_pais_usuario,
                :documento_identificacion_usuario,
                :nombre_usuario,
                :rol_usuario,
                :login_usuario,
                :clave_usuario,
                :telefono_usuario,
                :direccion_usuario,
                :correo_usuario,
                :ciudad_usuario,
                now(),
                'ACTIVO'
                )";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
                ':id_pais_usuario' =>$modelUsuario->getId_pais_usuario(),
                ':documento_identificacion_usuario' =>$modelUsuario->getDocumento_identificacion_usuario(),
                ':nombre_usuario' =>$modelUsuario->getNombre_usuario() ,
                ':rol_usuario' =>$modelUsuario->getRol_usuario(),
                ':login_usuario' =>$modelUsuario->getLogin_usuario(),
                ':clave_usuario' =>$modelUsuario->getClave_usuario(),
                ':telefono_usuario' =>$modelUsuario->getTelefono_usuario(),
                ':direccion_usuario' =>$modelUsuario->getDireccion_usuario(),
                ':correo_usuario' =>$modelUsuario->getCorreo_usuario(),
                ':ciudad_usuario' =>$modelUsuario->getCiudad_usuario()
            ));
            return $resultado2;
    }
    public static function desactivar($id){
        $data_source = new DataSource();
            $sql2 = "UPDATE `usuario` SET
                
                estado='INACTIVO'
                WHERE id_usuario = :id_usuario
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
          
                ':id_usuario' =>$id
            ));
            return $resultado2;
    }
    public static function activar($id){
        $data_source = new DataSource();
            $sql2 = "UPDATE `usuario` SET
                
                estado='ACTIVO'
                WHERE id_usuario = :id_usuario
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
          
                ':id_usuario' =>$id
            ));
            return $resultado2;
    }
    public static function modificarUsuario($modelUsuario){
        $data_source = new DataSource();
            $sql2 = "UPDATE `usuario` SET
                
                documento_identificacion_usuario=:documento_identificacion_usuario,
                nombre_usuario=:nombre_usuario,
                telefono_usuario=:telefono_usuario,
                direccion_usuario=:direccion_usuario,
                correo_usuario=:correo_usuario,
                ciudad_usuario=:ciudad_usuario,
                rol_usuario=:rol_usuario
                WHERE id_usuario = :id_usuario
                ";
            $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
          
                ':documento_identificacion_usuario' =>$modelUsuario->getDocumento_identificacion_usuario(),
                ':nombre_usuario' =>$modelUsuario->getNombre_usuario() ,
                ':telefono_usuario' =>$modelUsuario->getTelefono_usuario() ,
                ':direccion_usuario' =>$modelUsuario->getDireccion_usuario(),
                ':correo_usuario' =>$modelUsuario->getCorreo_usuario(),
                ':ciudad_usuario' =>$modelUsuario->getCiudad_usuario(),
                ':rol_usuario' =>$modelUsuario-> getRol_usuario(),
                ':id_usuario' =>$modelUsuario->getId_usuario()
            ));
            return $resultado2;
    }
        public static function UsuarioId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM usuario join pais on(usuario.id_pais_usuario=pais.id_pais) WHERE  id_usuario = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
        $objusuario = new usuario(
            $data_table[0]["id_usuario"],
            $data_table[0]["nombre_pais"],
            $data_table[0]["documento_identificacion_usuario"],
            $data_table[0]["nombre_usuario"],
            $data_table[0]["rol_usuario"],
            $data_table[0]["login_usuario"],
            $data_table[0]["clave_usuario"],
            $data_table[0]["telefono_usuario"],
            $data_table[0]["direccion_usuario"],
            $data_table[0]["correo_usuario"],
            $data_table[0]["ciudad_usuario"],
            $data_table[0]["fecha_creacion_usuario"],
            $data_table[0]["estado"]
        );
        return $objusuario;
        }else{
            return false;
        }
    }
    public static function listadoUsuarios($consulta,$tipo)
    {
        $sql ="";
        if(is_null($consulta) && $tipo == "TODOS" ){
            $sql =" SELECT * FROM `usuario` where rol_usuario = 'ESPECIALISTA' or rol_usuario = 'ASISTENTE' or rol_usuario = 'LIDER OEA'   ";
        }elseif(strlen($consulta) < 1 && $tipo == "TODOS" ){
           
            $sql =" SELECT * FROM `usuario` where  rol_usuario = 'ESPECIALISTA' or rol_usuario = 'ASISTENTE' or rol_usuario = 'LIDER OEA'   ";
        }elseif(strlen($consulta) < 1 && $tipo != "TODOS" ){
           
            $sql =" SELECT * FROM `usuario` where  rol_usuario = '".$tipo."'   ";
        }elseif(strlen($consulta) > 0 && $tipo == "TODOS" ){
           
            $sql =" SELECT * FROM `usuario` where (nombre_usuario like '%".$consulta."%' || documento_identificacion_usuario like '%".$consulta."%' ) && (rol_usuario = 'ESPECIALISTA' or rol_usuario = 'ASISTENTE' or rol_usuario = 'LIDER OEA'  )  ";
        }else{
            $sql =" SELECT * FROM `usuario` where (nombre_usuario like '%".$consulta."%' || documento_identificacion_usuario like '%".$consulta."%' ) && rol_usuario = '".$tipo."'    ";
        }
        $data_source = new DataSource();
        //echo $sql;
        
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new usuario(
                    $data_table[$key]["id_usuario"],
                    $data_table[$key]["id_pais_usuario"],
                    $data_table[$key]["documento_identificacion_usuario"],
                    $data_table[$key]["nombre_usuario"],
                    $data_table[$key]["rol_usuario"],
                    $data_table[$key]["login_usuario"],
                    $data_table[$key]["clave_usuario"],
                    $data_table[$key]["telefono_usuario"],
                    $data_table[$key]["direccion_usuario"],
                    $data_table[$key]["correo_usuario"],
                    $data_table[$key]["ciudad_usuario"],
                    $data_table[$key]["fecha_creacion_usuario"],
                    $data_table[$key]["estado"]
                );
                array_push($arrayAuditores,$objusuario);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function listadoUsuariosEspecialistas()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `usuario`  where rol_usuario ='Especialista' and estado = 'ACTIVO' ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new usuario(
                    $data_table[$key]["id_usuario"],
                    $data_table[$key]["id_pais_usuario"],
                    $data_table[$key]["documento_identificacion_usuario"],
                    $data_table[$key]["nombre_usuario"],
                    $data_table[$key]["rol_usuario"],
                    $data_table[$key]["login_usuario"],
                    $data_table[$key]["clave_usuario"],
                    $data_table[$key]["telefono_usuario"],
                    $data_table[$key]["direccion_usuario"],
                    $data_table[$key]["correo_usuario"],
                    $data_table[$key]["ciudad_usuario"],
                    $data_table[$key]["fecha_creacion_usuario"],
                    $data_table[$key]["estado"]
                );
                array_push($arrayAuditores,$objusuario);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function listadoUsuariosColaboradores()
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `colaborador` ORDER BY `colaborador`.`id_colaborador` DESC ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new colaborador(
                    $data_table[$key]["id_colaborador"],
                    $data_table[$key]["nombre_colaborador"],
                    $data_table[$key]["cargo_colaborador"],
                    $data_table[$key]["idproyecto"]
                );
                array_push($arrayAuditores,$objusuario);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function listadoUsuariosColaboradoresProyecto($idproyecto)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `colaborador` where idproyecto = ".$idproyecto." ORDER BY `colaborador`.`id_colaborador` DESC ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new colaborador(
                    $data_table[$key]["id_colaborador"],
                    $data_table[$key]["nombre_colaborador"],
                    $data_table[$key]["cargo_colaborador"],
                    $data_table[$key]["idproyecto"]
                );
                array_push($arrayAuditores,$objusuario);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function listadoUsuariosColaboradoresId($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT * FROM `implementacion_colaborador` join colaborador on(colaborador.id_colaborador=implementacion_colaborador.id_colaborador_implementacion) where id_implementacion_item_proyecto = ".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objusuario = new colaborador(
                    $data_table[$key]["id_colaborador"],
                    $data_table[$key]["nombre_colaborador"],
                    $data_table[$key]["cargo_colaborador"],
                    $data_table[$key]["idproyecto"]
                );
                array_push($arrayAuditores,$objusuario);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }
    public static function ncolaboradoresItem($idtem,$idImpl)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `usuario` as 'numero' ORDER BY `usuario`.`id_usuario` DESC  limit 1");
        return $data_table[0]["numero"];
    }
    public static function ultimaUsuarioRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `usuario` as 'numero' ORDER BY `usuario`.`id_usuario` DESC  limit 1");
        return $data_table[0]["numero"];
    }
    public static function numUsuariosTotal()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero' FROM `usuario` where rol_usuario = 'ESPECIALISTA' ");
           //print_r($data_table);
        return $data_table[0]["numero"];
    }
}