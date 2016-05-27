<?php

namespace App\Controller;
use App\DB\universDAO;
use App\Model\universModel;
use App\View\generateView;

/**
 * Class universController
 * @package App\Controller
 */

class universController
{

    public function getAllUnivers(){
        $getAll = new universDAO();
        $dataUnivers = $getAll->getUnivers();
        $model = $this->callUniversModel($dataUnivers);
        $view = new generateView('univers');
        $view->render($model);
    }

    public function callUniversModel($datas){
        $dataArray = [];
        foreach ($datas as $data){
            $dataArray[] = new universModel($data);
        }
        return $dataArray;
    }
    
}