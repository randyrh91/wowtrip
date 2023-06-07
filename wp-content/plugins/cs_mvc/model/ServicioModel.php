<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ServicioDestinoModel.php';
require_once CS_MVC_PATH_MODEL . '/ServicioExcursionModel.php';

class ServicioRepo extends ORMRepo {
    /**
     * @return self
     */
    public static function create() { return self::_create(__CLASS__);}

}

class ServicioModel extends ORMModel {
    const TABLE = "cu_neg_servicio";

	/**
     * @var int
     */    
	 public $id;
	/**
     * @var string
     */    
	 public $nombre;
	/**
     * @var string
     */    
	 public $foto;
	/**
     * @var string
     */    
	 public $textoCorto;
	/**
     * @var string
     */    
	 public $descripcion;
	/**
     * @var string
     */    
	 public $icon;
	/**
     * @return ServicioDestinoModel[]
     */
    public function getServicioDestinos()
    {
        return $this->hasMany('ServicioDestinoModel','Servicio_id');
    }    
	/**
     * @return ServicioExcursionModel[]
     */
    public function getServicioExcursiones()
    {
        return $this->hasMany('ServicioExcursionModel','Servicio_id');
    }    
	public function toArray() {
		$arr = parent::toArray();
        return $arr;
		
    }

	public function __toString() {
        return $this->nombre;
    }

}
