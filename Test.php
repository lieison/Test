<?php

/**
 * CLASE TEST 
 * 
 * ESTA CLASE SE COMPONENE DE ALUNAS FUNCTIONES QUE SON 
 * 
 *  GetData() = DEVUELVE TODOS LOS VALORES DEL ARREGLO 
 *  Destroy() = DESTRUYE EL CONJUNTO DE ARREGLOS 
 *  Edit() = EDITA EL ARREGLO  SE NECESITA EL id y params que puede ser
 *           id = 0 to 3 
 *           params = array( "nombre" => "nuevo nombre" , "apellido" => "nuevo apellido" , "edad"=> "24" , "estado" => "activo")
 *  Delete() = ELIMINA DEL ARREGLO MEDIANTE SU id
 *  Save() = MUY IMPORTANTE , SI NO SE EJECUTA EL GUARDAR EN EL SCRIPT ENTONCES TODOS LOS ELEMENTOS 
 *           VUELVEN A COMO ESTABA, FAVOR EJECUTAR LA FUNCION SAVE()
 */



session_start();

class Test {
    

    protected  $data = array(
        0 => array( "nombre" => "rolando" , "apellido" => "arriaza" , "edad"=> "24" , "estado" => "activo"),
        1 => array( "nombre" => "gerson" , "apellido" => "aguirre" , "edad"=> "24" , "estado" => "activo"),
        2 => array( "nombre" => "emerson" , "apellido" => "sanchez" , "edad"=> "25" , "estado" => "no activo"),
        3 => array( "nombre" => "maya" , "apellido" => "" , "edad"=> "24" , "estado" => "no activo")
    );
    
    protected  $array_ = array();
    

    public function __construct() {
        if(!isset($_SESSION['data'])){
            $_SESSION['data'] = $this->data;
        }else{
            $this->array_ = $_SESSION['data'];
        }
    }

    
    public function GetData(){
        return $this->array_;
    }
    
    
    public function Destroy(){
        session_destroy();
    }
    
    
    public function  Edit($id , $params){
         $this->array_[$id] = $params;
    }
    
    public function Delete($id){
        unset($this->array_[$id]);
        
    }
    
    
    public function Save(){
        $_SESSION['data'] = $this->array_;
    }
    
    
    
    
}
