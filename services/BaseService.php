<?php

namespace app\services;
use yii\base\Model;

abstract class BaseService extends Model
{
    protected $result;

    abstract function perform();

    public function call()
    {
        if ($this->validate()) {
            $this->perform();
        }

        return $this;
    }

    public function isSuccess()
    {
        return empty($this->getErrors());
    }

    public function getResult()
    {
        return $this->result;
    }
}