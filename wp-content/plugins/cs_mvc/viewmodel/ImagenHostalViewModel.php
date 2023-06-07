<?php
/**
 * Created by CS-Generator.
 * User: pr0x
 */
require_once CS_MVC_PATH_MODEL . '/ImagenHostalModel.php';
require_once CS_MVC_PATH_MODEL . '/HostalModel.php';
class ImagenHostalViewModel extends ViewModel {
    private $imagenHostales;
    private $imagenHostal;

    /**
     * @return array ImagenHostalModel
     */
    function getImagenHostales() {
		$q = $this->in('q');
        if(!$q && !$this->imagenHostales) $this->imagenHostales = ImagenHostalRepo::create()->all();
		elseif($q) {
			$this->imagenHostales = ImagenHostalRepo::create()->allBy(array(
                "id LIKE"=>"'%$q%'",
                "OR nombre LIKE"=>"'%$q%'",
                "OR foto LIKE"=>"'%$q%'",
                "OR textoCorto LIKE"=>"'%$q%'",
            ));
		}
        return $this->imagenHostales;
    }

    /**
     * @return ImagenHostalModel
     */
    function getImagenHostal() {
        if(!$this->imagenHostal){
            if($this->in('id'))
                $this->imagenHostal = ImagenHostalRepo::create()->oneBy($this->in_num('id'));
            else $this->imagenHostal = new ImagenHostalModel();
        }
        return $this->imagenHostal;

    }
	
	function getHostales() {
        return HostalRepo::create()->all();
    }


}  