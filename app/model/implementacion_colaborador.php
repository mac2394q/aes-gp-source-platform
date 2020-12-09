<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of implementacion_colaborador
 *
 * @author Only Dev & OP
 */
class implementacion_colaborador {
    private $id_implentacion_item_proyecto;
    private $id_colaboracion_implementacio;
    
    function __construct($id_implentacion_item_proyecto, $id_colaboracion_implementacio) {
        $this->id_implentacion_item_proyecto = $id_implentacion_item_proyecto;
        $this->id_colaboracion_implementacio = $id_colaboracion_implementacio;
    }

    function setId_implentacion_item_proyecto($id_implentacion_item_proyecto) {
        $this->id_implentacion_item_proyecto = $id_implentacion_item_proyecto;
    }

    function setId_colaboracion_implementacio($id_colaboracion_implementacio) {
        $this->id_colaboracion_implementacio = $id_colaboracion_implementacio;
    }



    /**
     * Get the value of id_colaboracion_implementacio
     */ 
    public function getId_colaboracion_implementacio()
    {
        return $this->id_colaboracion_implementacio;
    }

    /**
     * Get the value of id_implentacion_item_proyecto
     */ 
    public function getId_implentacion_item_proyecto()
    {
        return $this->id_implentacion_item_proyecto;
    }
}
