<?php

namespace Modules\Media\Models;
use Core\Models\Model;
use Modules\Media\DAO\MediaDAO;

/**
 * Class MediaModel
 * @package Modules\Media\Models
 */

class MediaModel extends Model
{
    private $_id;
    private $_type;
    private $_title;
    private $_creation_date;
    private $_last_update;

    /**
     * MediaModel constructor.
     * @param array $params
     */
    public function __construct($params = [])
    {
        parent::__construct($params);
    }

    /**
     * @param $datas
     * @return array
     */
    public function checkUpload($datas){

        $file_type_ok = false;
        $file_size_ok = false;
        $success = false;
        $error_m = [];
        $medias_uploaded = [];
        $count = 0;
        $DB = new MediaDAO();

        foreach ($datas['name'] as $files => $name) {

            //error : no file
            if ($_FILES['uploads']['error'][$files] == 4) { //nofile
                $error_m[] = 'Aucun fichier sélectionné';
//                return $error_m;
            }

            //no error
            if ($_FILES['uploads']['error'][$files] == 0) {

                $name = htmlspecialchars(trim($name));
                $file_ext = strtolower(substr(strrchr($name,'.'),1));

                //check file type
                if(in_array($file_ext, explode('|', UPLOAD_IMG_EXT))) {
                    $file_type = 'image';
                    $file_maxsize = UPLOAD_IMG_MAXSIZE * 1024; //result in octets
                    $file_destination = UPLOAD_PATH . UPLOAD_IMG_DIR;
                    $file_type_ok = true;
                } elseif(in_array($file_ext, explode('|', UPLOAD_DOC_EXT))){
                    $file_type = 'document';
                    $file_maxsize = UPLOAD_DOC_MAXSIZE * 1024;
                    $file_destination = UPLOAD_PATH . UPLOAD_DOC_DIR;
                    $file_type_ok = true;
                } else {
                    array_push($error_m, $name." n'a pas un format autorisé. Formats autorisés : ".UPLOAD_IMG_EXT."|".UPLOAD_DOC_EXT);
                    continue;// Skip invalid file formats
                }//endif

                if ($_FILES['uploads']['size'][$files] > $file_maxsize) {
                    array_push($error_m, $name." est trop lourd. Poids maxi : " . $file_maxsize/1024 . " Ko. Poids du fichier : " . round($_FILES['uploads']['size'][$files]/1024) . " Ko");
                    continue; // Skip large uploads
                } else {
                    $file_size_ok = true;
                }//endif

                // No error found! Return datas
                if($file_type_ok && $file_size_ok){
                    $datas = ['type' => $file_ext, 'title' => substr($name, 0, strrpos($name, "."))];
                    $id = $DB->insertMedia($datas);

                    $path = $file_destination . '/' . $name;
                    if(move_uploaded_file($_FILES["uploads"]["tmp_name"][$files], $path)) {
                        $count++; // Number of successfully uploaded file
                        rename($path, $file_destination . '/' . $id . '.' . $file_ext);
                        $success = true;
                        $media = [];
                        $media['media_id'] = $id;
                        $media['media_url'] = UPLOAD_URL.$file_type. 's/' . $id . '.' . $file_ext;
                        $media['media_ext'] = $file_ext;
                        $media['media_title'] = substr($name, 0, strrpos($name, "."));
                        array_push($medias_uploaded, $media);
                    }//endif
                }
            } //endif
        } //endfor

        if($success && ($count > 0)){
            $success_m = $count.' média ajouté';
            if($count > 1) $success_m .= 's';
        } else {
            $success_m = false;
        }
        $messages = [];
        $messages['error'] = $error_m;
        $messages['success'] = $success_m;
        $messages['uploads'] = $medias_uploaded;
        return $messages;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        if(is_numeric($id) || $id == null) {
            $this->_id = $id;
        } else {
            throw new \InvalidArgumentException("L'id doit etre un nombre");
        }
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        if(is_string($title) && strlen($title) > 0) {
            $this->_title = $title;
        } else {
            throw new \InvalidArgumentException("Le titre doit etre du texte");
        }
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param $subtitle
     */
    public function setType($type)
    {
        if(is_string($type)) {
            $this->_type = $type;
        } else {
            throw new \InvalidArgumentException("Le type doit être du texte");
        }
    }


    /**
     * @return mixed
     */
    public function getCreation_Date()
    {
        return $this->_creation_date;
    }

    /**
     * @param $creation_date
     */
    public function setCreation_Date($creation_date)
    {
        if(validateDate($creation_date) && strlen($creation_date) > 0) {
            $this->_creation_date = dateToFrench($creation_date);
        } else {
            throw new \InvalidArgumentException("La date de création doit être une date");
        }
    }

    /**
     * @return mixed
     */
    public function getLast_Update()
    {
        return $this->_last_update;
    }

    /**
     * @param $last_update
     */
    public function setLast_Update($last_update)
    {
        if(validateDate($last_update) && strlen($last_update) > 0) {
            $this->_last_update = dateToFrench($last_update);
        } elseif ($last_update == null){
            $this->_last_update = null;
        } else {
            throw new \InvalidArgumentException("La date de modification doit être une date");
        }
    }

}