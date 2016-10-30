<?php
use Yaf\Bootstrap_Abstract;
use Yaf\Dispatcher;

class Bootstrap extends Bootstrap_Abstract {
    public function _initConfig() {

    }

    public function _initDefaultName(Dispatcher $dispatcher) {
        $dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }

    public function _initView(Dispatcher $dispatcher) {
        $dispatcher->disableView();
    }
}