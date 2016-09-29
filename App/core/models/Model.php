<?php

namespace Core\Models;

/**
 * Class Model
 * @package Core\Models
 */
class Model
{

    /**
     * Model constructor
     * @param array $params
     */
    public function __construct($params = [])
    {
        if (!empty($params)) {
            $this->hydrate($params);
        }
    }

    /**
     * @param array $params
     */
    public function hydrate($params = [])
    {
        foreach ($params as $method => $value) {
            $setter = "set" . ucfirst($method);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
}