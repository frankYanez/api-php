<?php

abstract class ApiController
{
    private $model;
    private $view;
    protected $data;


    public function __construct()
    {
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");
    }

    function getData()
    {
        return json_decode($this->data);
    }
}
