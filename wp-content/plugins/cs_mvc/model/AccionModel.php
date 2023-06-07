<?php
class AccionRepo extends ORMRepo {
    /**
     * @return self
     */
    public static function create() { return self::_create(__CLASS__);}

}

class AccionModel extends ORMModel {
    const TABLE = "cu_neg_accion";

    /**
     * @var int
     */
    public $orden;


    /**
     * @var string
     */
    public $nombre;

    /**
     * @var string
     */
    public $descripcion;

    /**
     * @var int
     */
    public $Excursion_id;


    /**
     * @var int
     */
    public $Viaje_id;

    public function __toString() {
        return $this->nombre;
    }

    /**
     * @return ViajeModel
     */
    public function getViaje()
    {
        return $this->hasOne('ViajeModel','Viaje_id', 'id');
    }


} // Accion
