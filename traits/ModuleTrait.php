<?php

namespace vova07\blogs\traits;

use Yii;

/**
 * Class ModuleTrait
 * @package vova07\blogs\traits
 * Implements `getModule` method, to receive current module instance.
 */
trait ModuleTrait
{
    /**
     * @var \vova07\blogs\Module|null Module instance
     */
    private $_module;

    /**
     * @return \vova07\blogs\Module|null Module instance
     */
    public function getModule()
    {
        if ($this->_module === null) {
            $this->_module = Yii::$app->getModule('blogs');
        }
        return $this->_module;
    }
}
