<?php
/**
 * we will experiment __get, __set magic method that are being called if
 * caller properties is missing for access and setting corresponding
 * */ 

 class MagicGetSet
 {
    //  we will keep all the attributes in the following arrays like laravel
     protected $attributes = [ 'name' => 'welcome to magic world'];

     public function __get(string $key)
     {
         echo "calling __get for " . $key . "\n";
         return $this->attributes[$key];
     }
     
 }
 
 $obj = new MagicGetSet;
 echo $obj->name;
