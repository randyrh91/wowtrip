<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ReservaExcursionModel.php';
require_once CS_MVC_PATH_MODEL . '/HostalModel.php';

class ReservaHostalRepo extends ORMRepo {
    /**
     * @return self
     */
    public static function create() { return self::_create(__CLASS__);}

}

class ReservaHostalModel extends ORMModel {
    const TABLE = "cu_neg_reserva_hostal";

	/**
     * @var int
     */    
	 public $id;
	/**
     * @var int
     */    
	 public $orden;
	/**
     * @var int
     */    
	 public $Hostal_id;
	/**
     * @var int
     */    
	 public $Reserva_Excursion_id;
	/**
     * @return HostalModel
     */
    public function getHostal()
    {
        return $this->hasOne('HostalModel','Hostal_id', 'id');
    }    
	/**
     * @return ReservaExcursionModel
     */
    public function getReservaExcursion()
    {
        return $this->hasOne('ReservaExcursionModel','Reserva_Excursion_id', 'id');
    }    
	public function toArray() {
		$arr = parent::toArray();
		$arr['imagenhostal_display'] = $this->getHostal()->__toString();
		$arr['reservaexcursion_display'] = $this->getReservaExcursion()->__toString();
        return $arr;
		
    }

	public function __toString() {
        return $this->getHostal()->__toString();
    }

}
