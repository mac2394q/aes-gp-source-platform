<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
require_once(DATABASE_PATH."DataSource.php");
require_once(MODEL_PATH."plantilla.php");
require_once(MODEL_PATH."grupoPlantilla.php");
require_once(MODEL_PATH."item_grupo_plantilla.php");


class plantillaDao_
{
    public static function registrarPlantilla($modelPlantilla)
    {
        $data_source = new DataSource();
        $sql2 = "INSERT INTO plantilla_alcance VALUES (
            null,
            :idarea_tecnica_plantilla,
            :etiqueta_plantila,
            :pais_plantilla,
            'ACTIVO'
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idarea_tecnica_plantilla' => $modelPlantilla->getIdarea_tecnica_plantilla(),
            ':etiqueta_plantila' => $modelPlantilla->getEtiqueta_plantilla(),
            ':pais_plantilla' => $modelPlantilla->getPais_plantilla()
        ));
        return $resultado2;
    }
    public static function registrarPlantillaGrupo($modelPlantillaGrupo)
    {
        //print_r($modelPlantillaGrupo);
        $data_source = new DataSource();
        $sql2 = "INSERT INTO grupo_plantilla_alcance VALUES (
            null,
            :id_plantilla_alcance,
            :etiqueta_grupo_plantilla,
            :titulo_grupo_plantilla
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':id_plantilla_alcance' => $modelPlantillaGrupo->getIdplantilla_maestra_grupo(),
            ':etiqueta_grupo_plantilla' => $modelPlantillaGrupo->getEtiqueta_grupo_plantilla(),
            ':titulo_grupo_plantilla' => $modelPlantillaGrupo->getTitulo_conjunto()
        ));
        return $resultado2;
    }


    public static function registrarPlantillaGrupo2($modelPlantillaGrupo)
    {
        //print_r($modelPlantillaGrupo);
        $data_source = new DataSource();
        $sql2 = "INSERT INTO grupo_plantilla VALUES (
            null,
            :idplantilla_maestra_grupo,
            :etiqueta_grupo_plantilla,
            :titulo_conjunto
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
           
            ':idplantilla_maestra_grupo' => $modelPlantillaGrupo->getIdplantilla_maestra_grupo(),
            ':etiqueta_grupo_plantilla' => $modelPlantillaGrupo->getEtiqueta_grupo_plantilla(),
            ':titulo_conjunto' => $modelPlantillaGrupo->getTitulo_conjunto()
        ));
        return $resultado2;
    }

    public static function  editarPlantillaPrincipal($idplantilla,$nombre,$area)
    {
        
        $data_source = new DataSource();
        $sql = "UPDATE plantilla_alcance SET
            etiqueta_plantilla=:etiqueta_plantila,
            idarea_tecnica_plantilla =".$area."
        WHERE 	idplantilla_maestra = :idplantilla_maestra";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':etiqueta_plantila' =>$nombre,
            ':idplantilla_maestra' =>$idplantilla
        ));
        return $resultado2;
    }

    public static function editarPlantillaItem($item)
    {
        
        $data_source = new DataSource();
        $sql = "UPDATE item_grupo_plantilla SET
            etiqueta_item_grupo_plantilla=:etiqueta_item_grupo_plantilla,
            descripcion_item_grupo_plantilla=:descripcion_item_grupo_plantilla
        WHERE iditem_grupo_plantilla = :iditem_grupo_plantilla";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':etiqueta_item_grupo_plantilla' =>$item->getEtiqueta_item_grupo_plantilla(),
            ':descripcion_item_grupo_plantilla' =>$item->getDescripcion_item_grupo_plantilla() ,
            ':iditem_grupo_plantilla' =>$item->getIditem_grupo_plantilla() 
        ));
        return $resultado2;
    }


    public static function  editarPlantillaGrupo($item)
    {
        
        $data_source = new DataSource();
        $sql = "UPDATE grupo_plantilla SET
            etiqueta_grupo_plantilla=:etiqueta_grupo_plantilla,
            titulo_conjunto=:titulo_conjunto
        WHERE 	idgrupo_plantilla = :idgrupo_plantilla";
        $resultado2 = $data_source->ejecutarActualizacion($sql, array(
            ':etiqueta_grupo_plantilla' =>$item->getEtiqueta_grupo_plantilla(),
            ':titulo_conjunto' =>$item->getTitulo_conjunto() ,
            ':idgrupo_plantilla' =>$item->getIdgrupo_plantilla()
        ));
        return $resultado2;
    }


    public static function registrarPlantillaItem($modelPlantilla)
    {
        $data_source = new DataSource();
        $sql2 = "INSERT INTO item_grupo_plantilla VALUES (
            null,
            :idgrupo_plantilla_item,
            :etiqueta_item_grupo_plantilla,
            :descripcion_item_grupo_plantilla	
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idgrupo_plantilla_item' => $modelPlantilla->getIdgrupo_plantilla_item(),
            ':etiqueta_item_grupo_plantilla' => $modelPlantilla->getEtiqueta_item_grupo_plantilla(),
            ':descripcion_item_grupo_plantilla' => $modelPlantilla->getDescripcion_item_grupo_plantilla()
        ));
        return $resultado2;
    }



    public static function registrarPlantillaItem2($modelPlantilla)
    {
        $data_source = new DataSource();
        $sql2 = "INSERT INTO item_grupo_plantilla VALUES (
            null,
            :idgrupo_plantilla_item,
            :etiqueta_item_grupo_plantilla,
            :descripcion_item_grupo_plantilla	
            )";
        $resultado2 = $data_source->ejecutarActualizacion($sql2, array(
            ':idgrupo_plantilla_item' => $modelPlantilla->getIdgrupo_plantilla_item(),
            ':etiqueta_item_grupo_plantilla' => $modelPlantilla->getEtiqueta_item_grupo_plantilla(),
            ':descripcion_item_grupo_plantilla' => $modelPlantilla->getDescripcion_item_grupo_plantilla()
        ));
        return $resultado2;
    }
   
    public static function plantillaId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `plantilla_alcance` join pais on(plantilla_alcance.id_pais_plantilla=pais.id_pais) 
        join alcance on(plantilla_alcance.id_alcance_plantilla=alcance.id_alcance) 
        WHERE id_plantilla_alcance = ".$id;
        // echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objplantilla = new plantilla(
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
        $sql =" SELECT * FROM `plantilla_maestra` where idarea_tecnica_plantilla=".$id." ORDER by idplantilla_maestra desc ";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objplantilla = new plantilla(
            $data_table[0]["idplantilla_maestra"],
            $data_table[0]["idarea_tecnica_plantilla"],
            $data_table[0]["etiqueta_plantila"],
            $data_table[0]["pais_plantilla"],
            $data_table[0]["estado_plantilla"]
        );
        return $objplantilla;
    }


    public static function plantillaId2($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `plantilla_maestra`  where idplantilla_maestra = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objplantilla = new plantilla(
            $data_table[0]["idplantilla_maestra"],
            $data_table[0]["idarea_tecnica_plantilla"],
            $data_table[0]["etiqueta_plantila"],
            $data_table[0]["pais_plantilla"],
            $data_table[0]["estado_plantilla"]
        );
        return $objplantilla;
    }


    public static function itemId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `item_grupo_plantilla`  where iditem_grupo_plantilla = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objplantilla = new item_grupo_plantilla(
            $data_table[0]["iditem_grupo_plantilla"],
            $data_table[0]["idgrupo_plantilla_item"],
            $data_table[0]["etiqueta_item_grupo_plantilla"],
            $data_table[0]["descripcion_item_grupo_plantilla"]
        );
        //print_r( $objplantilla );
        return $objplantilla;
    }

    public static function grupoId($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `grupo_plantilla`  where idgrupo_plantilla = ".$id;
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
      
        $objplantilla = new grupoPlantilla(
            $data_table[0]["idgrupo_plantilla"],
            $data_table[0]["idplantilla_maestra_grupo"],
            $data_table[0]["etiqueta_grupo_plantilla"],
            $data_table[0]["titulo_conjunto"]
        );
        return $objplantilla;
    }

    public static function ultimoItemRegistrado()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT iditem_grupo_plantilla as 'numero'  FROM `item_grupo_plantilla` ORDER BY `item_grupo_plantilla`.`iditem_grupo_plantilla` DESC limit 1");
 
        return $data_table[0]["numero"];
    }


    public static function listadoPlantilla()
    {
        
        $data_source = new DataSource();
        $sql =" SELECT a.* FROM plantilla_alcance a ORDER BY `a`.`etiqueta_plantilla` ASC";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new plantilla(
                    $data_table[$key]["id_plantilla_alcance"],
                    $data_table[$key]["id_alcance_plantilla"],
                    $data_table[$key]['id_pais_plantilla'],
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

    public static function listadoGrupoPlantilla($id)
    {
        
        $data_source = new DataSource();
        $sql =" SELECT * FROM `grupo_plantilla` where 	idplantilla_maestra_grupo =".$id." ORDER BY `grupo_plantilla`.`idgrupo_plantilla` ASC";
        //echo $sql;
        $data_table = $data_source->ejecutarConsulta($sql);
        
        if(count($data_table)>0){
            $arrayAuditores=array();
            foreach ($data_table as $key => $value) {
                $objplantilla = new grupoPlantilla(
                    $data_table[$key]["idgrupo_plantilla"],
                    $data_table[$key]["idplantilla_maestra_grupo"],
                    $data_table[$key]["etiqueta_grupo_plantilla"],
                    $data_table[$key]["titulo_conjunto"]
                );
                array_push($arrayAuditores,$objplantilla);
            }
            //print_r($arrayAuditores);
            return $arrayAuditores;
        }else{
            return false;
        }
    }

    public static function listadoGrupoPlantillaItem($id)
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


    public static function listadoGrupoPlantillaItem2($id)
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
        $sql =" SELECT count(*) as 'numero' FROM `item_grupo_plantilla` JOIN grupo_plantilla ON(item_grupo_plantilla.idgrupo_plantilla_item=grupo_plantilla.idgrupo_plantilla) where idgrupo_plantilla_item =".$id." ORDER BY `item_grupo_plantilla`.`idgrupo_plantilla_item` ASC";
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
            "SELECT idgrupo_plantilla FROM `grupo_plantilla` ORDER BY idgrupo_plantilla DESC");
 
        return $data_table[0]["idgrupo_plantilla"];
    }

    public static function ultimaPlantillaItem()
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta(
            "SELECT 	iditem_grupo_plantilla FROM ` item_grupo_plantilla` ORDER BY iditem_grupo_plantilla DESC");
 
        return $data_table[0]["iditem_grupo_plantilla"];
    }

    public static function borrarGrupo($idgrupo)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("DELETE FROM grupo_plantilla
      WHERE idgrupo_plantilla=:id ", array(':id' => $idgrupo));
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }

    public static function borrarItem($idgrupo)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("DELETE FROM item_grupo_plantilla
      WHERE idgrupo_plantilla_item=:id ", array(':id' => $idgrupo));
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }


    public static function borrarItem2($id)
    {
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("DELETE FROM item_grupo_plantilla
      WHERE iditem_grupo_plantilla=:id ", array(':id' => $id));
        if (count($data_table) > 0) {
            return 1;
        } else {
            return false;
        }
    }
    
    
    
    
}