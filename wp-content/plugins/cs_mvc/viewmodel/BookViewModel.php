<?php
/**
 * Created by PhpStorm.
 * User: pr0x
 * Date: 10/05/2015
 * Time: 1:37
 */
require_once CS_MVC_PATH_MODEL . '/ExcursionModel.php';
require_once CS_MVC_PATH_MODEL . '/ViajeModel.php';
require_once CS_MVC_PATH_MODEL . '/TransporteModel.php';

class BookViewModel extends ViewModel {

    /**
     * @return ExcursionModel
     */
    function getExcursionById($id) {
        $item = ExcursionRepo::create()->oneBy(array(
            'id'=>$id
        ));
        return $item;
    }

    function getExcursion() {
        $p = get_post();
        if($p) {
            $id = get_post_field('id',$p);
            return $this->getExcursionById($id);
        }
        return null;
    }

    /**
     * @return TransporteModel[]
     */
    function getAllTransporte(){
        return TransporteRepo::create()->all();
    }

    /**
     * @param $id
     * @return ViajeModel[]
     */
    function getViajesDormir($id){
        return ViajeRepo::create()->allBy(array('Excursion_id'=>$id, 'dormir'=>true));
    }

}