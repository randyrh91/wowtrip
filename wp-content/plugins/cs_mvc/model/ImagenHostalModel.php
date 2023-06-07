<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/HostalModel.php';
require_once CS_MVC_PATH_MODEL . '/ReservaHostalModel.php';

class ImagenHostalRepo extends ORMRepo {
    /**
     * @return self
     */
    public static function create() { return self::_create(__CLASS__);}

}

class ImagenHostalModel extends ORMModel {
    const TABLE = "cu_neg_imagen_hostal";

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
     * @var int
     */    
	 public $Hostal_id;
	/**
     * @return HostalModel
     */
    public function getHostal()
    {
        return $this->hasOne('HostalModel','Hostal_id', 'id');
    }    
	/**
     * @return ReservaHostalModel[]
     */
    public function getReservaHostales()
    {
        return $this->hasMany('ReservaHostalModel','Imagen_Hostal_id');
    }    
	public function toArray() {
		$arr = parent::toArray();
		$arr['hostal_display'] = $this->getHostal()->__toString();
        return $arr;
		
    }

	public function __toString() {
        return $this->nombre;
    }

}
