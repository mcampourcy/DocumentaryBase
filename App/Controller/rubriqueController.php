<?php

namespace App\Controller;
use App\DB\rubriqueDAO;
use App\Model\rubriqueModel;
use App\View\generateView;

/**
 * Class rubriqueController
 * @package App\Controller
 */

class rubriqueController
{

    public function getAllRubriques(){
        $getAll = new rubriqueDAO();
        $dataRubriques = $getAll->getRubriques();
        $model = $this->callRubriqueModel($dataRubriques);
        $view = new generateView('rubriques');
        $view->render($model);
    }

    public function callRubriqueModel($datas){
        $dataArray = [];
        foreach ($datas as $data){
            $dataArray[] = new rubriqueModel($data);
        }
        return $dataArray;
    }
    
}