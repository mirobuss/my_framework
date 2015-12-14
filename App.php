<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of App
 *
 * @author Miro Hristov
 */

namespace MF;
include_once 'Loader.php';
class App {
    
    private static $instance=null;
    
    private function __construct(){
        \MF\Loader::registerNamespace('MF',dirname(__FILE__).DIRECTORY_SEPARATOR);
        \MF\Loader::registerAutoLoad();
    }
    
    /**
     * 
     * @return type \MF\App
     */
    public static function getInstance(){
        
        if(self::$instance==null) {
            self::$instance= new \MF\App();
        }
        
        return self::$instance;
    }
    
    public function run(){
       
 
    }
}
