<?php

require_once 'ApiView.php';

abstract class ApiController{

    //Atributos
    protected $model;
    protected $view;
    private $data;

    function __construct(){
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");
    }

    function getData(){
        return json_decode($this->data);
        //Decode: de String a JSON
        //Encode: de JSON a String
    }
}