<?php

/**
 * Created by PhpStorm.
 * User: Miya
 * Date: 2017/4/3
 * Time: 上午12:40
 */
class memberController
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

    function run($action){

        $db = getDB();
        //取得post傳入帳號密碼
        $account = $this->request->getParsedBody()['account'];
        $password = $this->request->getParsedBody()['password'];

        $data = $db->query("INSERT INTO users (account, password)
        VALUES ($account, md5($password))")->fetchAll();


    }

}