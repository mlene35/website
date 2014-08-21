<?php

class BaseObject{
    protected $_data = array();


    public function addData($key, $value = null){
        if(is_array($key) && is_null($value)){
            foreach($key AS $_key => $_value){
                $this->addData($_key, $_value);
            }
        } else {
            $this->_data[$key] = $value;
        }
    }

    public function setData($key, $value){
        $this->_data[$key] = $value;
    }

    public function getData($key, $default = null){
        if(isset($this->_data[$key])){
            return $this->_data[$key];
        }
        return $default;
    }

}