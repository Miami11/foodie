<?php

class adminController
{
    private $request, $response, $args, $view, $data;

    function __construct($data)
    {
        //initializing value
        $this->data = $data;
        $this->request = $data->request;
        $this->response = $data->response;
        $this->view = $data->view;
        $this->args = $this->args;
    }

    function run($kind = "")
    {
        $db = getDB();
        $login = getLoginHelper();
        if($login->getIsLogged() == "")
        {
            return $this->response->withStatus(302)->withHeader('Location', '/admin/login');
        }

        $this->response = $this->view->render($this->response, 'admin/index.twig');
        return $this->response;
    }
}