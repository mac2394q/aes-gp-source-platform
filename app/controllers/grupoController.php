<?php
  include_once ($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(MODEL_PATH."grupo.php");
  require_once(PDO_PATH."grupoDao.php");
  
class grupoController
{
    public static function select_grupo(){
        $objGrupo = grupoDao::select_grupo();
        //print_r($objGrupo);
        if($objGrupo != false){
            echo "  <label for=''><h5 class='card-title'><span class='text-danger'>*</span> Grupo empresarial:</h5></label>
                    <select id='grupo' name='grupo' class='form-control'>
                    <option value='null'>SIN GRUPOS EMPRESARIAL</option>";
            foreach ($objGrupo as $key => $value) {
                echo    "<option value='".$objGrupo[$key]->getId_entidad() ."'>
                ".$objGrupo[$key]->getNombre_grupo_empresarial()." </option>";
            }
            echo     "
                    </select>";
        }else{
            echo "  <label for=''><span class='text-danger'>*</span> Grupo empresarial:</label>
                    <select id='grupo' name='grupo' class='form-control'>
                        <option value='NULL'>SIN GRUPOS EMPRESARIAL</option>
                    </select>";
        }
    }
    public static function listadoEmpresasGrupoEmpresarial($identidad){
        $objGrupo = empresaDao::listadoEmpresasGrupoEmpresarial($identidad);
        $objEntidad = empresaController::grupoEmpresarial($identidad);
        //print_r($objEntidad);
        if($objGrupo != false){
            echo "  <label for=''><h5 class='card-title'><span class='text-danger'>*</span> Empresas - Grupo empresarial: <strong>".$objEntidad->getNombre_grupo_empresarial()."</strong> </h5></label>
                    <select id='grupo' name='grupo' class='form-control'>";
            foreach ($objGrupo as $key => $value) {
                echo    "<option value='".$objGrupo[$key]->getId_entidad()."'>
                ".$objGrupo[$key]->getNombre_empresa()." </option>";
            }
            echo     "
                    </select>";
        }else{
            echo "  <label for=''><span class='text-danger'>*</span> Grupo empresarial:</label>
                    <select id='grupo' name='grupo' class='form-control'>
                        <option value='NULL'>SIN GRUPOS EMPRESARIALES</option>
                    </select>";
        }
    }
    public static function select_grupEmpresa($id){
        $objGrupo = grupoDao::select_grupo();
        
        if($objGrupo != null){
            echo "  <label for=''><h5 class='card-title'><span class='text-danger'>*</span> Grupo Empresarial:</h5></label>
                    <select id='grupo' name='grupo' class='form-control'>";
            if(!is_null($id)){
            $grupoEmpresa = grupoDao::grupoId($id);        
            echo    "<option value='".$grupoEmpresa-> getId_entidad()."'>".$grupoEmpresa->getNombre_grupo_empresarial()."</option>";
            }else{
                echo "<option value='NULL'>SIN GRUPOS EMPRESARIAL</option>";
            }
            foreach ($objGrupo as $key => $value) {
                echo    "<option value='".$objGrupo[$key]-> getId_entidad()."'>
                ".$objGrupo[$key]->getNombre_grupo_empresarial()." </option>";
            }
            echo     "
                    </select>";
        }else{
            echo "  <label for=''><span class='text-danger'>*</span> Grupo empresarial:</label>
                    <select id='grupo' name='grupo' class='form-control'>
                        <option value='NULL'>SIN GRUPOS EMPRESARIAL</option>
                    </select>";
        }
    }
    
}
?>
