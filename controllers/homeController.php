<?php

class homeController
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

    function run()
    {
        $db = getDB();
        $this->response = $this->view->render($this->response, 'index.twig');
        return $this->response;
    }
}