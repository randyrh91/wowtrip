<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/AccionModel.php';
require_once CS_MVC_PATH_MODEL . '/RatingModel.php';
require_once CS_MVC_PATH_MODEL . '/TipoExcursionModel.php';
require_once CS_MVC_PATH_MODEL . '/ImagenExcursionModel.php';
require_once CS_MVC_PATH_MODEL . '/ReservaExcursionModel.php';
require_once CS_MVC_PATH_MODEL . '/ViajeModel.php';
require_once CS_MVC_PATH_MODEL . '/ServicioExcursionModel.php';
require_once CS_MVC_PATH_MODEL . '/ImagenPortadaModel.php';


class ExcursionRepo extends ORMRepo {
    /**
     * @return self
     */
    public static function create() { return self::_create(__CLASS__);}

    public function getPosts() {
        $args = array (
            'post_type' => 'page',
            'post_status' => 'publish',
            'order' => 'DESC',
            'posts_per_page' => 50,
        );
        $query = new WP_Query( $args );
        if($query->have_posts()) {
            return $query->posts;
        }
        return array();
    }

}

class ExcursionModel extends ORMModel {
    const TABLE = "cu_neg_excursion";

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
	 public $descripcion;
	/**
     * @var string
     */    
	 public $textoCorto;
	/**
     * @var int
     */    
	 public $TipoExcursion_id;
	/**
     * @var int
     */    
	 public $precio;
	/**
     * @var int
     */    
	 public $categoria;
	/**
     * @var int
     */    
	 public $likes;
	/**
     * @var float
     */    
	 public $distanciaKM;
	/**
     * @var float
     */    
	 public $tiempo;
	/**
     * @var int
     */    
	 public $dias;
	/**
     * @var int
     */    
	 public $Post_ID;
    /**
     * @var int
     */
    public $Rating_id;
    /**
     * @var int
     */
    public $Excursion_id;

    /**
     * @var boolean
     */
    public $isDelux;
    /**
	/**
     * @return TipoExcursionModel
     */
    public function getTipoExcursion()
    {
        return $this->hasOne('TipoExcursionModel','TipoExcursion_id', 'id');
    }
    /**
     * @return RatingModel
     */
    public function getRating()
    {
        return $this->hasOne('RatingModel','Rating_id', 'id');
    }
    /**
     * @return ExcursionModel
     */
    public function getExcursion()
    {
        return $this->hasOne('ExcursionModel','Excursion_id', 'id');
    }
    /**
     * @return ImagenExcursionModel[]
     */
    public function getImagenExcursiones()
    {
        return $this->hasMany('ImagenExcursionModel','Excursion_id');
    }
    /**
     * @return ImagenPortadaModel[]
     */
    public function getImagenPortadaExcursiones()
    {
        return $this->hasMany('ImagenPortadaModel','Excursion_id');
    }
    /**
     * @return ReservaExcursionModel[]
     */
    public function getReservaExcursiones()
    {
        return $this->hasMany('ReservaExcursionModel','Excursion_id');
    }
    /**
     * @return AccionModel[]
     */
    public function getAcciones()
    {
        return $this->hasMany('AccionModel','Excursion_id');
    }
    /**
     * @var ImagenExcursionModel[] $image
     * @return ImagenExcursionModel
     * 	 */
    public function getOneImagenExcursiones()
    {
        $image=$this->hasMany('ImagenExcursionModel','Excursion_id');
        return $image[0];
    }
    /**
     * @return ServicioExcursionModel[]
     */
    public function getServicioExcursiones()
    {

//        return ServicioExcursionRepo::create()->all(null,null,'orden',array('Excursion_id'=>$this->id));
        return $this->hasMany('ServicioExcursionModel','Excursion_id');
    }
	/**
     * @return ServicioModel[]
     */
    public function getServicio()
    {
        $arr = array();
        foreach($this->getServicioExcursiones() as $se) {
            $arr[] = $se->getServicio();
        }
        return $arr;
    }
	/**
     * @return ServicioModel[]
     */
    public function getServicios()
    {
        $arr = array();
        foreach($this->getServicioExcursiones() as $se) {
            $arr[] = $se->getServicio();
        }
        return $arr;
    }
	/**
     * @return ServicioModel[]
     */
    public function getServicioNoAsignados()
    {
        $servicios = ServicioRepo::create()->all();
        $arr = array();
        foreach($this->getServicioExcursiones() as $se) {
            $arr[$se->Servicio_id] = true;
        }
        $response = array();
        foreach($servicios as $servicio) {
            if(!isset($arr[$servicio->id]))
                $response[] = $servicio;
        }
//        var_dump($response); die;
        return $response;

    }
	/**
     * @return ViajeModel[]
     */
    public function getViajes()
    {
        return ViajeRepo::create()->all(null,null,'orden',array('Excursion_id'=>$this->id));
//        return $this->hasMany('ViajeModel','Excursion_id');
    }
    /**
     * @return AccionModel[]
     */
    public function getPrograma()
    {
        return AccionRepo::create()->all(null,null,'orden',array('Excursion_id'=>$this->id));
    }
	public function toArray() {
		$arr = parent::toArray();
		$arr['tipoexcursion_display'] = $this->getTipoExcursion()->__toString();
        return $arr;
		
    }
    public function __toString() {
        return $this->nombre;
    }

}
