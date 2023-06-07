<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/DestinoTuristicoModel.php';
require_once CS_MVC_PATH_MODEL . '/ImagenHostalModel.php';

class HostalRepo extends ORMRepo {
    /**
     * @return self
     */
    public static function create() { return self::_create(__CLASS__);}

}

class HostalModel extends ORMModel {
    const TABLE = "cu_hostal";

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
	 public $textoCorto;
	/**
     * @var string
     */    
	 public $descripcion;
	/**
     * @var string
     */    
	 public $direccion;
	/**
     * @var string
     */    
	 public $geopos;
	/**
     * @var int
     */    
	 public $cantidadHabitacion;
	/**
     * @var int
     */    
	 public $cantidadPersona;
	/**
     * @var float
     */    
	 public $precio;
	/**
     * @var float
     */    
	 public $oferta;
	/**
     * @var int
     */    
	 public $Destino_Turistico_id;
	/**
     * @return DestinoTuristicoModel
     */
    public function getDestinoTuristico()
    {
        return $this->hasOne('DestinoTuristicoModel','Destino_Turistico_id', 'id');
    }    
	/**
     * @return ImagenHostalModel[]
     */
    public function getImagenHostales()
    {
        return $this->hasMany('ImagenHostalModel','Hostal_id');
    }    
	public function toArray() {
		$arr = parent::toArray();
		$arr['destinoturistico_display'] = $this->getDestinoTuristico()->__toString();
        return $arr;
		
    }

	public function __toString() {
        return $this->nombre;
    }

}
