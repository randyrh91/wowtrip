<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ServicioModel.php';
require_once CS_MVC_PATH_MODEL . '/DestinoTuristicoModel.php';

class ServicioDestinoRepo extends ORMRepo {
    /**
     * @return self
     */
    public static function create() { return self::_create(__CLASS__);}

}

class ServicioDestinoModel extends ORMModel {
    const TABLE = "cu_neg_servicio_destino";

	/**
     * @var int
     */    
	 public $id;
	/**
     * @var int
     */    
	 public $Servicio_id;
	/**
     * @var int
     */    
	 public $Destino_Turistico_id;
	/**
     * @var float
     */    
	 public $precio;
	/**
     * @var float
     */    
	 public $cantidad;
	/**
     * @return ServicioModel
     */
    public function getServicio()
    {
        return $this->hasOne('ServicioModel','Servicio_id', 'id');
    }    
	/**
     * @return DestinoTuristicoModel
     */
    public function getDestinoTuristico()
    {
        return $this->hasOne('DestinoTuristicoModel','Destino_Turistico_id', 'id');
    }    
	public function toArray() {
		$arr = parent::toArray();
		$arr['servicio_display'] = $this->getServicio()->__toString();
		$arr['destinoturistico_display'] = $this->getDestinoTuristico()->__toString();
        return $arr;
		
    }

	public function __toString() {
        return $this->id."";
    }

}
