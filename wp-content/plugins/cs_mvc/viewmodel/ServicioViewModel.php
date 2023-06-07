<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ServicioModel.php';
class ServicioViewModel extends ViewModel {
    private $servicios;
    private $servicio;

    /**
     * @return array ServicioModel
     */
    function getServicios() {
		$q = $this->in('q');
        if(!$q && !$this->servicios) $this->servicios = ServicioRepo::create()->all();
		elseif($q) {
			$this->servicios = ServicioRepo::create()->allBy(array(
                "id LIKE"=>"'%$q%'",
                "OR nombre LIKE"=>"'%$q%'",
                "OR foto LIKE"=>"'%$q%'",
                "OR textoCorto LIKE"=>"'%$q%'",
                "OR descripcion LIKE"=>"'%$q%'",
                "OR icon LIKE"=>"'%$q%'",
            ));
		}
        return $this->servicios;
    }

    /**
     * @return ServicioModel
     */
    function getServicio() {
        if(!$this->servicio){
            if($this->in('id'))
                $this->servicio = ServicioRepo::create()->oneBy($this->in_num('id'));
            else $this->servicio = new ServicioModel();
        }
        return $this->servicio;

    }
	


}  