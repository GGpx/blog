<?php

class ResponseFail extends Response{

    function __construct($sucess, $message){
        
        $this ->sucess = $sucess;
        $this ->message = $message;
    }

}