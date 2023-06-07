<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ServicioModel.php';
require_once CS_MVC_PATH_MODEL . '/ExcursionModel.php';

class ServicioExcursionRepo extends ORMRepo {
    /**
     * @return self
     */
    public static function create() { return self::_create(__CLASS__);}

}

class ServicioExcursionModel extends ORMModel {
    const TABLE = "cu_neg_servicio_excursion";

	/**
     * @var int
     */    
	 public $id;
	/**
     * @var int
     */    
	 public $Excursion_id;
	/**
     * @var int
     */    
	 public $Servicio_id;
	/**
     * @var int
     */    
	 public $cantidad;
	/**
     * @var float
     */    
	 public $precio;
	/**
     * @return ExcursionModel
     */
    public function getExcursion()
    {
        return $this->hasOne('ExcursionModel','Excursion_id', 'id');
    }    
	/**
     * @return ServicioModel
     */
    public function getServicio()
    {
        return $this->hasOne('ServicioModel','Servicio_id', 'id');
    }    
	public function toArray() {
		$arr = parent::toArray();
		$arr['excursion_display'] = $this->getExcursion()->__toString();
		$arr['servicio_display'] = $this->getServicio()->__toString();
        return $arr;
		
    }

	public function __toString() {
        return $this->id."";
    }

}
