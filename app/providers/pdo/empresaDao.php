<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."empresa.php");
require_once(MODEL_PATH."area.php");
require_once(MODEL_PATH."sede.php");
require_once(MODEL_PATH."grupo.php");
require_once(MODEL_PATH."contacto.php");
require_once(MODEL_PATH."certificado.php");
require_once(MODEL_PATH."grupoEmpresarial.php");
require_once(MODEL_PATH."validacion_empresa.php");
require_once(MODEL_PATH."grupo_empresarial.php");
class empresaDao
{
    public static function listadoGrupoEmpresarial($grupo)
    {
        $data_source = new DataSource();
        $sql = "";
        if($grupo == null){
            $sql ="SELECT * FROM grupo_empresarial ";
        }else{
            $sql ="SELECT * FROM grupo_empresarial where nombre_grupo_empresarial like '%".$grupo."%' ";
        }
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
                $objEmpresa = new grupo_empresarial (
                    $data_table[$key]["id_entidad"],
                    $data_table[$key]["nombre_grupo_empresarial"],
                    $data_table[0]["idusuario"]
                );
                
                array_push($arrayEmpresa,$objEmpresa);
            }
            return $arrayEmpresa;
        }else{
            return false;
        }
    }
    public static function listadoEmpresas()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresa` ORDER BY `empresa`.`nombre_empresa` ASC";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
        $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
      
        $objEmpresa = new empresa(
            $data_table[$key]["id_entidad"],
            $data_table[$key]["id_pais_empresa"],
            $data_table[$key]["gru_id_entidad"],
            $data_table[$key]["nombre_empresa"],
            $data_table[$key]["identificacion_empresa"],
            $data_table[$key]["departamento_empresa"],
            $data_table[$key]["ciudad_principal_empresa"],
            $data_table[$key]["direccion_empresa"],
            $data_table[$key]["naturaleza_empresa"],
            $data_table[$key]["telefono_empresa"],
            $data_table[$key]["email_empresa"],
            $data_table[$key]["nombre_representante_empresa"],
            $data_table[$key]["identificacion_representante_empresa"],
            $data_table[$key]["email_representante_empresa"],
            $data_table[$key]["telefono_contacto_empresa2"],
            $data_table[$key]["email_contacto_empresa"],
            $data_table[$key]["nombre_contacto_empresa2"],
            $data_table[$key]["cargo_contacto_empresa2"],
            $data_table[$key]["telefono_contacto_empresa2"],
            $data_table[$key]["email_contacto_empresa2"],
            $data_table[$key]["link_plataforma_facturacion_empresa"],
            $data_table[$key]["usuario_plataforma_facturacion_empresa"],
            $data_table[$key]["fecha_registro_empresa"],
            $data_table[$key]["idusuario"]
        );
        array_push($arrayEmpresa,$objEmpresa);
            }
            return $arrayEmpresa;
        }else{
            return false;
        }
    }
    
    public static function nEmpresaGrupo($idempresa)
    { 
        //print_r($certificado);
        //echo "<br>xxxxx";
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("UPDATE `empresas_asociadas` SET `estado_empresas_asociadas` = '0' WHERE `empresas_asociadas`.`idempresa_ancla` = ".$ancla." AND `empresas_asociadas`.`idempresa_asociada` = ".$negocio);
        
        return $data_table;
    }
    
    public static function listadoSimpleEmpresas($consulta,$orden)
    { 
        $data_source = new DataSource();
        if(is_null($consulta)){
            $sql =" SELECT * FROM `empresa`  ORDER BY `empresa`.`nombre_empresa` ASC";
        }else{
            $sql =" SELECT * FROM `empresa` where empresa.nombre_empresa like '%".$consulta."%' || empresa.identificacion_empresa like '%".$consulta."%' || empresa.ciudad_empresa like '%".$consulta."%' || empresa.nombre_representante_empresa like '%".$consulta."%' ORDER BY `empresa`.`nombre_empresa` ".$orden;
        }
       
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
                $objEmpresa = new empresa(
                    $data_table[$key]["id_entidad"],
                    $data_table[$key]["id_pais_empresa"],
                    $data_table[$key]["gru_id_entidad"],
                    $data_table[$key]["nombre_empresa"],
                    $data_table[$key]["identificacion_empresa"],
                    $data_table[$key]["departamento_empresa"],
                    $data_table[$key]["ciudad_empresa"],
                    $data_table[$key]["direccion_empresa"],
                    $data_table[$key]["naturaleza_empresa"],
                    $data_table[$key]["telefono_empresa"],
                    $data_table[$key]["email_empresa"],
                    $data_table[$key]["nombre_representante_empresa"],
                    $data_table[$key]["identificacion_representante_empresa"],
                    $data_table[$key]["telefono_representante_empresa"],
                    $data_table[$key]["email_representante_empresa"],
                    $data_table[$key]["nombre_contacto_empresa2"],
                    $data_table[$key]["cargo_contacto_empresa2"],
                    $data_table[$key]["telefono_contacto_empresa2"],
                    $data_table[$key]["email_contacto_empresa2"],
                    $data_table[$key]["link_plataforma_facturacion_empresa"],                    
                    $data_table[$key]["usuario_plataforma_facturacion_empresa"],
                    $data_table[$key]["fecha_registro_empresa"],
                    $data_table[$key]["idusuario"]
                );
               
                array_push($arrayEmpresa,$objEmpresa);
            }
            return $arrayEmpresa;
        }else{
            return false;
        }
    }
  
    
   
    public static function listadoEmpresasGrupoEmpresarial($identidad)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresa`  where gru_id_entidad =".$identidad;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
        $arrayEmpresa=array();
            foreach ($data_table as $key => $value) {
      
                $objEmpresa = new empresa(
                    $data_table[$key]["id_entidad"],
                    $data_table[$key]["id_pais_empresa"],
                    $data_table[$key]["gru_id_entidad"],
                    $data_table[$key]["nombre_empresa"],
                    $data_table[$key]["identificacion_empresa"],
        
                    $data_table[$key]["departamento_empresa"],
                    $data_table[$key]["ciudad_empresa"],
                    $data_table[$key]["direccion_empresa"],
                    $data_table[$key]["naturaleza_empresa"],
                    $data_table[$key]["telefono_empresa"],
        
                    $data_table[$key]["email_empresa"],
                    $data_table[$key]["nombre_representante_empresa"],
                    $data_table[$key]["identificacion_representante_empresa"],
                    $data_table[$key]["email_representante_empresa"],
                    $data_table[$key]["telefono_contacto_empresa2"],
                    $data_table[$key]["email_contacto_empresa"],
                    $data_table[$key]["nombre_contacto_empresa2"],
                    $data_table[$key]["cargo_contacto_empresa2"],
                    $data_table[$key]["telefono_contacto_empresa2"],
                    $data_table[$key]["email_contacto_empresa2"],
                    
                    $data_table[$key]["link_plataforma_facturacion_empresa"],
                    $data_table[$key]["usuario_plataforma_facturacion_empresa"],
                    $data_table[$key]["fecha_registro_empresa"],
                    $data_table[$key]["idusuario"]
                );
        array_push($arrayEmpresa,$objEmpresa);
            }
            return $arrayEmpresa;
        }else{
            return false;
        }
    }
    public static function nEmpresasGrupoEmpresarial($idgrupo)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT count(*) as 'numero' FROM `empresa`  where gru_id_entidad =".$idgrupo;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);        
        return  $data_table[0]["numero"];
    }
    public static function grupoEmpresarial($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT *  FROM `grupo_empresarial`  where id_entidad=".$id;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objEmpresa = new grupo_empresarial(
            $data_table[0]["id_entidad"],
            $data_table[0]["nombre_grupo_empresarial"],
            $data_table[0]["idusuario"]
        );
        return $objEmpresa ;
    }
    public static function grupoEmpresarialIdUsuario($id)
    {
        $data_source = new DataSource();
        $sql =" SELECT *  FROM `grupo_empresarial`  where idusuario=".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        $objEmpresa = new grupo_empresarial(
            $data_table[0]["id_entidad"],
            $data_table[0]["nombre_grupo_empresarial"],
            $data_table[0]["idusuario"]
        );
        return $objEmpresa ;
    }
    public static function empresaId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresa` join pais on(empresa.id_pais_empresa=pais.id_pais)  where id_entidad = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objEmpresa = new empresa(
            $data_table[0]["id_entidad"],
            $data_table[0]["id_pais_empresa"],
            $data_table[0]["gru_id_entidad"],
            $data_table[0]["nombre_empresa"],
            $data_table[0]["identificacion_empresa"],
            $data_table[0]["departamento_empresa"],
            $data_table[0]["ciudad_empresa"],
            $data_table[0]["direccion_empresa"],
            $data_table[0]["naturaleza_empresa"],
            $data_table[0]["telefono_empresa"],
            $data_table[0]["email_empresa"],
            $data_table[0]["nombre_representante_empresa"],
            $data_table[0]["identificacion_representante_empresa"],
            $data_table[0]["telefono_representante_empresa"],
            $data_table[0]["email_representante_empresa"],
            $data_table[0]["nombre_contacto_empresa2"],
            $data_table[0]["cargo_contacto_empresa2"],
            $data_table[0]["telefono_contacto_empresa2"],
            $data_table[0]["email_contacto_empresa2"],
            $data_table[0]["link_plataforma_facturacion_empresa"],                    
            $data_table[0]["usuario_plataforma_facturacion_empresa"],
            $data_table[0]["fecha_registro_empresa"],
            $data_table[0]["idusuario"]
        );
        //print_r($objEmpresa);
        return $objEmpresa ;
    }
    public static function objEmpresaIdUsuario($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `empresa` join pais on(empresa.id_pais_empresa=pais.id_pais)  where idusuario = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objEmpresa = new empresa(
            $data_table[0]["id_entidad"],
            $data_table[0]["id_pais_empresa"],
            $data_table[0]["gru_id_entidad"],
            $data_table[0]["nombre_empresa"],
            $data_table[0]["identificacion_empresa"],
            $data_table[0]["departamento_empresa"],
            $data_table[0]["ciudad_empresa"],
            $data_table[0]["direccion_empresa"],
            $data_table[0]["naturaleza_empresa"],
            $data_table[0]["telefono_empresa"],
            $data_table[0]["email_empresa"],
            $data_table[0]["nombre_representante_empresa"],
            $data_table[0]["identificacion_representante_empresa"],
            $data_table[0]["telefono_representante_empresa"],
            $data_table[0]["email_representante_empresa"],
            $data_table[0]["nombre_contacto_empresa2"],
            $data_table[0]["cargo_contacto_empresa2"],
            $data_table[0]["telefono_contacto_empresa2"],
            $data_table[0]["email_contacto_empresa2"],
            $data_table[0]["link_plataforma_facturacion_empresa"],                    
            $data_table[0]["usuario_plataforma_facturacion_empresa"],
            $data_table[0]["fecha_registro_empresa"],
            $data_table[0]["idusuario"]
        );
        //print_r($objEmpresa);
        return $objEmpresa ;
    }
    
    
    public static function crearEmpresa( $empresa)
    {
        //print_r($empresa);
        $data_source = new DataSource();
        $resultado = $data_source->ejecutarActualizacion("INSERT INTO `entidad` VALUES (NULL,'EMPRESA','ACTIVO')");
        $data_table = $data_source->ejecutarConsulta("SELECT id_entidad as 'numero' FROM `entidad`  ORDER BY `entidad`.`id_entidad`  DESC limit 1");
        
        $resultado2 = $data_source->ejecutarActualizacion("INSERT INTO `usuario` VALUES (
            null,
            ".$empresa->getId_pais_empresa().",
            '".$empresa->getIdentificacion_empresa()."',
            '".$empresa->getNombre_empresa()."',
            'EMPRESA',
            '".$empresa->getIdentificacion_empresa()."',
            '".$empresa->getIdentificacion_empresa()."',
            '".$empresa->getTelefono_empresa()."',
            '".$empresa->getDireccion_empresa()."',
            '".$empresa->getEmail_empresa()."',
            '".$empresa->getCiudad_empresa()."',
            now(),
            'ACTIVO'
            )");
        $data_table_ = $data_source->ejecutarConsulta("SELECT id_usuario as 'numero' FROM `usuario` ORDER BY `usuario`.`id_usuario` DESC limit 1");
        $sql2  = "INSERT INTO empresa VALUES (
                    ".$data_table[0]["numero"].",
                    :id_pais_empresa,
                    ".$empresa->getGru_id_entidad().",
                    :nombre_empresa,
                    :identificacion_empresa,
                    :departamento_empresa,
                    :ciudad_empresa,
                    :direccion_empresa,
                    :naturaleza_empresa,
                    :telefono_empresa,
                    :email_empresa,
                    :nombre_representante_empresa,
                    :identificacion_representante_empresa,
                    :telefono_contacto_empresa,
                    :email_contacto_empresa,
                    :nombre_contacto_empresa2,
                    :cargo_contacto_empresa2,
                    :telefono_contacto_empresa2,
                    :email_contacto_empresa2,
                    :link_plataforma_facturacion_empresa,
                    :usuario_plataforma_facturacion_empresa,
                    NOW(),
                    ".$data_table_[0]["numero"]."
            )";
            //echo $sql2;   
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            
            ':id_pais_empresa'=>$empresa->getId_pais_empresa(),
            
            ':nombre_empresa' =>$empresa->getNombre_empresa(),
            ':identificacion_empresa' =>$empresa->getIdentificacion_empresa(),
            ':departamento_empresa' =>$empresa->getDepartamento_empresa(),
            ':ciudad_empresa' =>$empresa->getCiudad_empresa(),
            ':direccion_empresa' =>$empresa->getDireccion_empresa(),
            ':naturaleza_empresa' =>$empresa->getNaturaleza_empresa(),
            ':telefono_empresa' =>$empresa->getTelefono_empresa(),
            ':email_empresa' =>$empresa->getEmail_empresa(),
            ':nombre_representante_empresa'=>$empresa->getNombre_representate_empresa(),
            ':identificacion_representante_empresa'=>$empresa->getIdentificacion_representante_empresa(),
            ':telefono_contacto_empresa'=>$empresa->getTelefono_representante_empresa(),
            ':email_contacto_empresa'=>$empresa->getEmail_representante_empresa(),
            ':nombre_contacto_empresa2'=>$empresa->getNombre_contacto_empresa2(),
            ':cargo_contacto_empresa2'=>$empresa->getCargo_contacto_empresa2(),
            ':telefono_contacto_empresa2'=>$empresa->getTelefono_contato_empresa2(),
            ':email_contacto_empresa2'=>$empresa->getEmail_contacto_empresa2(),
            
            ':link_plataforma_facturacion_empresa'=>$empresa->getLink_plataforma_factura_empresa(),
            ':usuario_plataforma_facturacion_empresa' =>$empresa->getUsuario_plataforma_facturacion_empresa()
        )
    );
        return $resultado2;
    }
    
 
    public static function registrarGrupo( $sede)
    { 
        $cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $cadena_base .= '0123456789' ;
        $cadena_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';
 
        $password = '';
        $limite = strlen($cadena_base) - 1;
        for ($i=0; $i < 10; $i++)
            $password .= $cadena_base[rand(0, $limite)];
        
        $data_source = new DataSource();
        $resultado = $data_source->ejecutarActualizacion("INSERT INTO `entidad` VALUES (NULL,'GRUPO','ACTIVO')");
        $data_table = $data_source->ejecutarConsulta("SELECT id_entidad as 'numero' FROM `entidad`  ORDER BY `entidad`.`id_entidad`  DESC limit 1");
        
        $resultado2 = $data_source->ejecutarActualizacion("INSERT INTO `usuario` VALUES (
            null,
            52,
            '',
            '".$sede."',
            'GRUPO',
            '".str_replace(' ', '', $sede)."',
            '".$password."',
            '',
            '',
            '',
            '',
            now(),'ACTIVO'
            )");
            $data_table_ = $data_source->ejecutarConsulta("SELECT id_usuario as 'numero' FROM `usuario` ORDER BY `usuario`.`id_usuario` DESC limit 1");
            $sql2 = "INSERT INTO grupo_empresarial VALUES (".$data_table[0]["numero"].",'".$sede."',".$data_table_[0]["numero"].")";   
            $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
   
    public static function modificarEmpresa($empresa)
    {
        
        $data_source = new DataSource();
        $sql = "UPDATE empresa SET
            id_pais_empresa = ".$empresa->getId_pais_empresa().",
            gru_id_entidad = ".$empresa->getGru_id_entidad().",
            nombre_empresa = :nombre_empresa,
            identificacion_empresa = :identificacion_empresa,
            departamento_empresa = :departamento_empresa,
            ciudad_empresa = :ciudad_empresa,
            direccion_empresa = :direccion_empresa,
            telefono_empresa = :telefono_empresa,
            email_empresa = :email_empresa,
            nombre_representante_empresa = :nombre_representante_empresa,
            identificacion_representante_empresa = :identificacion_representante_empresa,
            telefono_representante_empresa = :telefono_representante_empresa,
            email_representante_empresa = :email_representante_empresa,
            nombre_contacto_empresa2 = :nombre_contacto_empresa2,
            cargo_contacto_empresa2 = :cargo_contacto_empresa2,
            telefono_contacto_empresa2 = :telefono_contacto_empresa2,
            email_contacto_empresa2 = :email_contacto_empresa2,
            link_plataforma_facturacion_empresa = :link_plataforma_facturacion_empresa,
            usuario_plataforma_facturacion_empresa = :usuario_plataforma_facturacion_empresa
        WHERE id_entidad = :id_entidad";
        //echo $sql;
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':id_entidad' =>$empresa->getId_entidad(),
            
            ':nombre_empresa' =>$empresa->getNombre_empresa(),
            ':identificacion_empresa' =>$empresa->getIdentificacion_empresa(),
            ':departamento_empresa' =>$empresa->getDepartamento_empresa(),
            ':ciudad_empresa' =>$empresa->getCiudad_empresa(),
            ':direccion_empresa' =>$empresa->getDireccion_empresa(),
            ':telefono_empresa' =>$empresa->getTelefono_empresa(),
            ':email_empresa' =>$empresa->getEmail_empresa(),
            ':nombre_representante_empresa'=>$empresa->getNombre_representate_empresa(),
            ':identificacion_representante_empresa'=>$empresa->getIdentificacion_representante_empresa(),
            ':telefono_representante_empresa'=>$empresa->getTelefono_representante_empresa(),
            ':email_representante_empresa'=>$empresa->getEmail_representante_empresa(),
            ':nombre_contacto_empresa2'=>$empresa->getNombre_contacto_empresa2(),
            ':cargo_contacto_empresa2'=>$empresa->getCargo_contacto_empresa2(),
            ':telefono_contacto_empresa2'=>$empresa->getTelefono_contato_empresa2(),
            ':email_contacto_empresa2'=>$empresa->getEmail_contacto_empresa2(),
            ':link_plataforma_facturacion_empresa'=>$empresa->getLink_plataforma_factura_empresa(),
            ':usuario_plataforma_facturacion_empresa' =>$empresa->getUsuario_plataforma_facturacion_empresa()
        ));
        return $resultado2;
    }
    public static function autenticacionEmpresa($usuario,$clave,$idusuario)
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
    public static function eliminarEmpresa($idempresa)
    {
        
        $data_source = new DataSource();
        $sql = "DELETE from empresa 
        WHERE id_entidad = ".$idempresa;
        
        $resultado2 = $data_source->ejecutarActualizacion($sql);
        return $resultado2;
    }
    public static function eliminarGrupo($idempresa)
    {
        
        $data_source = new DataSource();
        $sql = "DELETE from grupo_empresarial 
        WHERE id_entidad = ".$idempresa;
        
        $resultado2 = $data_source->ejecutarActualizacion($sql);
        return $resultado2;
    }
    public static function ultimaEmpresaRegistrada()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT id_entidad as 'numero' FROM `empresa`  
            ORDER BY `empresa`.`id_entidad`  DESC limit 1");
 
        return $data_table[0]["numero"];
    }
    public static function ultimaGrupoRegistrada()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT id_entidad as 'numero' FROM `grupo_empresarial`  
            ORDER BY `grupo_empresarial`.`id_entidad`  DESC limit 1");
 
        return $data_table[0]["numero"];
    }
    public static function ultimaSedeRegistrada()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT id_entidad as 'numero' FROM `sede`  
            ORDER BY `sede`.`id_entidad`  DESC limit 1");
 
        return $data_table[0]["numero"];
    }
    public static function numEmpresasTotal()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero'  FROM empresa ");
 
        return $data_table[0]["numero"];
    }
    public static function numGruposTotal()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero'  FROM grupo_empresarial ");
 
        return $data_table[0]["numero"];
    }
    
    public static function nEmpresas()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero'  FROM empresa ORDER BY `empresa`.`idempresarial` DESC limit 1");
 
        return $data_table[0]["numero"];
    }
    public static function nEmpresasEstados($estado)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero'  FROM empresa  where estado_empresa = ".$estado." ORDER BY `empresa`.`idempresarial` DESC limit 1");
 
        return $data_table[0]["numero"];
    }
   
    public static function verificarNit($nit)
    {
        
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT count(*) as 'numero' FROM empresa where identificacion_empresa='".$nit."'");
 
        return $data_table[0]["numero"];
    }
   
    
   
  
   
}
