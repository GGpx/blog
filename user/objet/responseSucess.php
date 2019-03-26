<?php 

class ResponseSucess extends Response{

    public $objet;

    function __construct($sucess, $message){
        $this->sucess = $sucess;
        $this ->message = $message;
    }
}
