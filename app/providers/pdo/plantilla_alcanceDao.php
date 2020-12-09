<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."plantilla_alcance.php");
require_once(MODEL_PATH."grupo_plantilla_alcance.php");
require_once(MODEL_PATH."item_grupo_plantilla_alcance.php");
class plantilla_alcanceDao
{

    public static function listadoGrupoPlantillaItem($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `item_grupo_plantilla_alcance` JOIN grupo_plantilla_alcance ON(item_grupo_plantilla_alcance.id_grupo_plantilla_certificacion=grupo_plantilla_alcance.id_grupo_plantilla_alcance) where id_grupo_plantilla_certificacion =".$id." ORDER BY `item_grupo_plantilla_alcance`.`id_grupo_plantilla_certificacion` ASC";
        $data_table = $data_source->ejecutarConsulta($sql);
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new item_grupo_plantilla_alcance(
                    $data_table[$key]["id_item_grupo_plantilla_certificacion"],
                    $data_table[$key]["id_grupo_plantilla_certificacion"],
                    $data_table[$key]["etiqueta_item_plantilla"],
                    $data_table[$key]["descripcion_item_plantilla"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }


    public static function registrarPlantilla($modelPlantilla)
    {
        //print_r($modelPlantilla);
        $data_source = new DataSource();
        $sql2 = "INSERT INTO plantilla_alcance VALUES (
            NULL,
            ".$modelPlantilla->getId_alcance_plantilla().",
            ".$modelPlantilla-> getId_pais_plantilla().",
            '".$modelPlantilla->getEtiqueta_plantilla()."',
            'ACTIVO'
            )";
        //echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }
    public static function registrarPlantillaGrupo($modelPlantillaGrupo)
    {
       
        $data_source = new DataSource();
        $sql2 = "INSERT INTO grupo_plantilla_alcance VALUES (
            null,
            :id_plantilla_alcance,
            :etiqueta_grupo_plantilla,
            :titulo_grupo_plantilla
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':id_plantilla_alcance' => $modelPlantillaGrupo->getId_plantilla_alcance(),
            ':etiqueta_grupo_plantilla' => $modelPlantillaGrupo->getEtiqueta_grupo_plantilla(),
            ':titulo_grupo_plantilla' => $modelPlantillaGrupo->getTitulo_grupo_plantilla()
        ));
        return $resultado2;
    }


    public static function registrarPlantillaGrupo2($modelPlantillaGrupo)
    {
        //print_r($modelPlantillaGrupo);
        $data_source = new DataSource();
        $sql2 = "INSERT INTO grupo_plantilla_alcance VALUES (
            NULL,
            ".$modelPlantillaGrupo->getId_plantilla_alcance().",
            '".$modelPlantillaGrupo->getEtiqueta_grupo_plantilla()."',
            '".$modelPlantillaGrupo->getTitulo_grupo_plantilla() ."'
            )";
        //echo $sql2;
        $resultado2 = $data_source->ejecutarActualizacion($sql2);
        return $resultado2;
    }

    public static function  editarPlantillaPrincipal($idplantilla,$nombre,$area)
    {
        
        $data_source = new DataSource();
        $sql = "UPDATE plantilla_alcance SET
            etiqueta_plantilla=:etiqueta_plantilla,id_alcance_plantilla =".$area."
        WHERE 		id_plantilla_alcance = :id_plantilla_alcance";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':etiqueta_plantilla' =>$nombre,
            ':id_plantilla_alcance' =>$idplantilla
        ));
        return $resultado2;
    }

    public static function editarPlantillaItem($item)
    {
        //print_r($item->getEtiqueta_item_plantilla());
        $data_source = new DataSource();
        $sql = "UPDATE item_grupo_plantilla_alcance SET
            etiqueta_item_plantilla=:etiqueta_item_plantilla,
            descripcion_item_plantilla=:descripcion_item_plantilla
        WHERE id_item_grupo_plantilla_certificacion = :id_item_grupo_plantilla_certificacion";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':etiqueta_item_plantilla' =>$item->getEtiqueta_item_plantilla(),
            ':descripcion_item_plantilla' =>$item->getDescripcion_item_plantilla() ,
            ':id_item_grupo_plantilla_certificacion' =>$item->getId_item_grupo_plantilla_certificacion() 
        ));
        return $resultado2;
    }


    public static function  editarPlantillaGrupo($item)
    {
        
        $data_source = new DataSource();
        $sql = "UPDATE  grupo_plantilla_alcance SET
            etiqueta_grupo_plantilla=:etiqueta_grupo_plantilla,
            titulo_grupo_plantilla=:titulo_grupo_plantilla
        WHERE 	id_grupo_plantilla_alcance = :id_grupo_plantilla_alcance";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':etiqueta_grupo_plantilla' =>$item->getEtiqueta_grupo_plantilla(),
            ':titulo_grupo_plantilla' =>$item->getTitulo_grupo_plantilla(),
            ':id_grupo_plantilla_alcance' =>$item->getId_grupo_plantilla_alcance()
        ));
        return $resultado2;
    }


    public static function registrarPlantillaItem($modelPlantilla)
    {
        $data_source = new DataSource();
        $sql2 = "INSERT INTO item_grupo_plantilla_alcance VALUES (
            null,
            :idgrupo_plantilla_item,
            :etiqueta_item_grupo_plantilla,
            :descripcion_item_grupo_plantilla	
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idgrupo_plantilla_item' => $modelPlantilla->getId_grupo_plantilla_certificacion(),
            ':etiqueta_item_grupo_plantilla' => $modelPlantilla->getEtiqueta_item_plantilla(),
            ':descripcion_item_grupo_plantilla' => $modelPlantilla->getDescripcion_item_plantilla()
        ));
        return $resultado2;
    }



    public static function registrarPlantillaItem2($modelPlantilla)
    {
        $data_source = new DataSource();
        $sql2 = "INSERT INTO item_grupo_plantilla_alcance VALUES (
            null,
            :idgrupo_plantilla_item,
            :etiqueta_item_grupo_plantilla,
            :descripcion_item_grupo_plantilla	
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idgrupo_plantilla_item' => $modelPlantilla->getId_grupo_plantilla_certificacion(),
            ':etiqueta_item_grupo_plantilla' => $modelPlantilla->getEtiqueta_item_plantilla() ,
            ':descripcion_item_grupo_plantilla' => $modelPlantilla->getDescripcion_item_plantilla()
        ));
        return $resultado2;
    }

    public static function listadoGrupoPlantilla($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `grupo_plantilla_alcance` where 	id_plantilla_alcance =".$id." ORDER BY `grupo_plantilla_alcance`.`id_grupo_plantilla_alcance` ASC";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new grupo_plantilla_alcance(
                    $data_table[$key]["id_grupo_plantilla_alcance"],
                    $data_table[$key]["id_plantilla_alcance"],
                    $data_table[$key]["etiqueta_grupo_plantilla"],
                    $data_table[$key]["titulo_grupo_plantilla"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            //print_r($arrayAuditores);
            return $arrayAuditores;
        }else{
            return false;
        }
    }


   
    public static function plantillaId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `plantilla_alcance` join pais on(plantilla_alcance.id_pais_plantilla=pais.id_pais) 
        join alcance on(plantilla_alcance.id_alcance_plantilla=alcance.id_alcance) 
        WHERE id_plantilla_alcance = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objplantilla = new plantilla_alcance(
            $data_table[0]["id_plantilla_alcance"],
            $data_table[0]["nombre_alcance"],
            $data_table[0]["nombre_pais"],
            $data_table[0]["etiqueta_plantilla"],
            $data_table[0]["estado_alcance"]
        );
        return $objplantilla;
    }

    public static function plantillaIdCom($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `plantilla_alcance` where id_alcance_plantilla=".$id." ORDER by id_plantilla_alcance desc ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objplantilla = new plantilla_alcance(
            $data_table[0]["id_plantilla_alcance"],
            $data_table[0]["id_alcance_plantilla"],
            $data_table[0]["id_pais_plantilla"],
            $data_table[0]["etiqueta_plantilla"],
            $data_table[0]["estado_plantilla"]
        );
        return $objplantilla;
    }


    public static function plantillaId2($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `plantilla_alcance`  where id_plantilla_alcance = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objplantilla = new plantilla_alcance(
            $data_table[0]["id_plantilla_alcance"],
            $data_table[0]["id_alcance_plantilla"],
            $data_table[0]["id_pais_plantilla"],
            $data_table[0]["etiqueta_plantilla"],
            $data_table[0]["estado_plantilla"]
        );
        return $objplantilla;
    }


    public static function itemId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `item_grupo_plantilla_alcance`  where 	id_item_grupo_plantilla_certificacion = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objplantilla = new item_grupo_plantilla_alcance(
            $data_table[0]["id_item_grupo_plantilla_certificacion"],
            $data_table[0]["id_grupo_plantilla_certificacion"],
            $data_table[0]["etiqueta_item_plantilla"],
            $data_table[0]["descripcion_item_plantilla"]
        );
        //print_r( $objplantilla );
        return $objplantilla;
    }

    public static function listadoGrupoPlantillaItem2($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM grupo_plantilla_alcance join item_grupo_plantilla_alcance on(grupo_plantilla_alcance.id_grupo_plantilla_alcance=item_grupo_plantilla_alcance.id_grupo_plantilla_certificacion) where id_grupo_plantilla_alcance =".$id." ORDER BY `grupo_plantilla_alcance`.`id_grupo_plantilla_alcance` ASC";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new item_grupo_plantilla_alcance(
                    $data_table[$key]["id_item_grupo_plantilla_certificacion"],
                    $data_table[$key]["id_grupo_plantilla_certificacion"],
                    $data_table[$key]["etiqueta_item_plantilla"],
                    $data_table[$key]["descripcion_item_plantilla"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            //print_r($arrayAuditores);
            return $arrayAuditores;
        }else{
            return false;
        }
    }



    public static function grupoId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `grupo_plantilla_alcance`  where id_grupo_plantilla_alcance = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objplantilla = new grupo_plantilla_alcance(
            $data_table[0]["id_grupo_plantilla_alcance"],
            $data_table[0]["id_plantilla_alcance"],
            $data_table[0]["etiqueta_grupo_plantilla"],
            $data_table[0]["titulo_grupo_plantilla"]
        );
        return $objplantilla;
    }

    public static function ultimoItemRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT 	id_item_grupo_plantilla_certificacion as 'numero'  FROM `item_grupo_plantilla_alcance` ORDER BY `item_grupo_plantilla_alcance`.`id_item_grupo_plantilla_certificacion` DESC limit 1");
 
        return $data_table[0]["numero"];
    }


    public static function listadoPlantilla()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `plantilla_alcance` join alcance on(plantilla_alcance.id_alcance_plantilla=alcance.id_alcance) ORDER BY `plantilla_alcance`.`etiqueta_plantilla` ASC ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new plantilla_alcance(
                    $data_table[$key]["id_plantilla_alcance"],
                    $data_table[$key]["nombre_alcance"],
                    $data_table[$key]["id_pais_plantilla"],
                    $data_table[$key]["etiqueta_plantilla"],
                    $data_table[$key]["estado_plantilla"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            return $arrayAuditores;
        }else{
            return false;
        }
    }

    public static function listadogrupo_plantilla_alcance($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `grupo_plantilla_alcance` where id_plantilla_alcance =".$id." ORDER BY `grupo_plantilla_alcance`.`id_grupo_plantilla_alcance` ASC";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new grupo_plantilla_alcance(
                    $data_table[$key]["id_grupo_plantilla_alcance"],
                    $data_table[$key]["id_plantilla_alcance"],
                    $data_table[$key]["etiqueta_grupo_plantilla"],
                    $data_table[$key]["titulo_grupo_plantilla"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            //print_r($arrayAuditores);
            return $arrayAuditores;
        }else{
            return false;
        }
    }

    public static function listadogrupo_plantilla_alcanceItem($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `item_grupo_plantilla` JOIN grupo_plantilla ON(item_grupo_plantilla.idgrupo_plantilla_item=grupo_plantilla.idgrupo_plantilla) where idgrupo_plantilla_item =".$id." ORDER BY `item_grupo_plantilla`.`idgrupo_plantilla_item` ASC";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new item_grupo_plantilla(
                    $data_table[$key]["iditem_grupo_plantilla"],
                    $data_table[$key]["titulo_conjunto"],
                    $data_table[$key]["etiqueta_item_grupo_plantilla"],
                    $data_table[$key]["descripcion_item_grupo_plantilla"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            //print_r($arrayAuditores);
            return $arrayAuditores;
        }else{
            return false;
        }
    }


    public static function listadogrupo_plantilla_alcanceItem2($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `item_grupo_plantilla` JOIN grupo_plantilla ON(item_grupo_plantilla.idgrupo_plantilla_item=grupo_plantilla.idgrupo_plantilla) where idgrupo_plantilla_item =".$id." ORDER BY `item_grupo_plantilla`.`idgrupo_plantilla_item` ASC";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new item_grupo_plantilla(
                    $data_table[$key]["iditem_grupo_plantilla"],
                    $data_table[$key]["idgrupo_plantilla_item"],
                    $data_table[$key]["etiqueta_item_grupo_plantilla"],
                    $data_table[$key]["descripcion_item_grupo_plantilla"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            //print_r($arrayAuditores);
            return $arrayAuditores;
        }else{
            return false;
        }
    }

    public static function nItem($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT count(*) as 'numero' FROM `item_grupo_plantilla_alcance` JOIN grupo_plantilla_alcance on(item_grupo_plantilla_alcance.id_grupo_plantilla_certificacion=grupo_plantilla_alcance.id_grupo_plantilla_alcance) where item_grupo_plantilla_alcance.id_grupo_plantilla_certificacion =".$id." order by item_grupo_plantilla_alcance.id_item_grupo_plantilla_certificacion asc";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
                    
               
        return $data_table[0]["numero"];
        
    }
    
    public static function ultimaPlantilla()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT id_plantilla_alcance FROM `plantilla_alcance` ORDER BY id_plantilla_alcance DESC");
 
        return $data_table[0]["id_plantilla_alcance"];
    }


    public static function ultimaPlantillaGrupo()
    {
        $data_source = new DataSource();
     
        $data_table = $data_source->ejecutarConsulta(
            "SELECT * FROM `grupo_plantilla_alcance` ORDER BY `id_grupo_plantilla_alcance` DESC limit 1");
 
        return $data_table[0]["id_grupo_plantilla_alcance"];
    }

    public static function ultimaPlantillaItem()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT 	id_item_grupo_plantilla_certificacion FROM ` item_grupo_plantilla_alcance` ORDER BY id_item_grupo_plantilla_certificacion DESC");
 
        return $data_table[0]["id_item_grupo_plantilla_certificacion"];
    }

    public static function borrarGrupo($idgrupo)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("DELETE FROM grupo_plantilla_alcance
      WHERE id_grupo_plantilla_alcance=:id ", array(':id' => $idgrupo));
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }

    public static function borrarItem($idgrupo)
    {
        $data_source = new DataSource();
        $sql ="DELETE FROM `item_grupo_plantilla_alcance` WHERE `item_grupo_plantilla_alcance`.`id_grupo_plantilla_certificacion` =".$idgrupo;
        echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }


    public static function borrarItem2($id)
    {
        $sql ="DELETE FROM `item_grupo_plantilla_alcance`
        WHERE `item_grupo_plantilla_alcance`.`id_item_grupo_plantilla_certificacion`=".$id;
        //echo $sql;
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta($sql);
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }
    
    
    
    
}