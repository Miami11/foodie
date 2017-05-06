<?php

class testController
{
    private $request, $response, $view, $data;

    function __construct($data)
    {
        //initializing value
        $this->data = $data;
        $this->request = $data->request;
        $this->response = $data->response;
        $this->view = $data->view;
    }

    function run(){
        $db = getDB();
        $this->response = $this->view->render($this->response, 'test.twig');
        return $this->response;

//            $db = getDB();
//            $result = $db->select("users","*", [
//                "name" => "mia"]);
//            $this->response = $this->view->render($this->response, 'memIndex.twig',['data'=>$result]);

    }

}