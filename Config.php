<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author Miro Hristov
 */

namespace MF;
class Config {
    
    private static $instance=null;
    private $_configFolder=null;
    private $_configArray=array();
    private function construct(){}
    
    public function setConfigFolder($configFolder){
        
        if(!$configFolder) {
            throw new \Exception('Invalid config folder');
        }
        
        $_configFolder = realpath($configFolder);
        if($_configFolder !=FALSE && is_dir($_configFolder) && is_readable($_configFolder)){
         //clears old data
            $this->_configArray=array();
            $this->_configFolder=$_configFolder.DIRECTORY_SEPARATOR;
        }
        else {
            throw new \Exception('Config directory error'.$configFolder);
        }
        
        //echo $this->_configFolder;
        
        }
    
        public function includeConfigFile($path){
            
            if(!$path) {
                throw new \Exception('Invalid path'.$path);
            }
            
            $_file=realpath($path);
            if($_file !=FALSE && is_file($_file) && is_readable($_file)) {
                $_basename=explode('.php', basename($_file))[0];
                include $_file;
                $this->_configArray[$_basename]=$cnf;
            }
            else {
                throw new \Exception('Config file read error'.$path);
            }
            
        }
        
        public function __get($name){
            
            if(!$this->_configArray[$name]){
                $this->includeConfigFile($this->_configFolder.$name.".php");
            }
            if(array_key_exists($name, $this->_configArray)){
                return $this->_configArray['name'];
            }
            return null;
        }


    public static function getInstance(){
        
        if(self::$instance==null) {
            self::$instance= new \MF\Config();
        }
        
        return self::$instance;
    }
    
}
