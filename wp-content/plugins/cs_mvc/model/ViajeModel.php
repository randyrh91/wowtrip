<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/TransporteModel.php';
require_once CS_MVC_PATH_MODEL . '/DestinoTuristicoModel.php';
require_once CS_MVC_PATH_MODEL . '/ExcursionModel.php';

class ViajeRepo extends ORMRepo {
    /**
     * @return self
     */
    public static function create() { return self::_create(__CLASS__);}

}

class ViajeModel extends ORMModel {
    const TABLE = "cu_neg_viaje";

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
	 public $DestinoTuristico_id;
	/**
     * @var int
     */    
	 public $orden;
	/**
     * @var boolean
     */
	 public $dormir;
	/**
     * @var string
     */    
	 public $tiempo;
	/**
     * @var string
     */    
	 public $distanciaKM;
	/**
     * @var string
     */
	 public $descripcion;
	/**
     * @var int
     */    
	 public $Transporte_id;
	/**
     * @return ExcursionModel
     */
    public function getExcursion()
    {
        return $this->hasOne('ExcursionModel','Excursion_id', 'id');
    }    
	/**
     * @return DestinoTuristicoModel
     */
    public function getDestinoTuristico()
    {
        return $this->hasOne('DestinoTuristicoModel','DestinoTuristico_id', 'id');
    }    
	/**
     * @return TransporteModel
     */
    public function getTransporte()
    {
        return $this->hasOne('TransporteModel','Transporte_id', 'id');
    }
    /**
     * @return AccionModel[]
     */
    public function getPrograma()
    {
        return AccionRepo::create()->all(null,null,'orden',array('Viaje_id'=>$this->id));
    }
	public function toArray() {
		$arr = parent::toArray();
		$arr['excursion_display'] = $this->getExcursion()->__toString();
		$arr['destinoturistico_display'] = $this->getDestinoTuristico()->__toString();
		$arr['transporte_display'] = $this->getTransporte()->__toString();
        return $arr;
		
    }

	public function __toString() {
        return $this->getDestinoTuristico()->nombre;
    }

}
