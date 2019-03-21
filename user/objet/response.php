<?php 

class Response{

    public $message;
    public $sucess;


    function __construct($sucess, $message){
        $this ->sucess = $sucess;
        $this ->message = $message;
    }
};

?>