<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."grupo_empresarial.php");

class grupoDao
{
    


    public static function select_grupo()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `grupo_empresarial` ";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            
            $arrayGrupo=array();
            foreach ($data_table as $key => $value) {
                //echo $data_table[$key]["nombre_grupo_empresarial"];
                $objArea = new grupo_empresarial(
                    $data_table[$key]["id_entidad"],
                    $data_table[$key]["nombre_grupo_empresarial"],
                    $data_table[$key]["idusuario"]);
                //print_r($objArea);
                array_push($arrayGrupo,$objArea);
            }
            return $arrayGrupo;
        }else{
            return false;
        }
    }


    public static function grupoId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `grupo_empresarial` where id_entidad =".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
                //echo $data_table[$key]["nombre_grupo_empresarial"];
                $objArea = new grupo_empresarial(
                    $data_table[0]["id_entidad"],
                    $data_table[0]["nombre_grupo_empresarial"],
                    $data_table[0]["idusuario"]
                );
                //print_r($objArea);
        return $objArea;
        }
    

   

}