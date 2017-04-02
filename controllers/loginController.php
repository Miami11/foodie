<?php

class loginController
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

    function run($action = "")
    {
        switch ($action)
        {
            case "get":
                $this->showLogin();
                break;
            case "post":
                $this->doLogin();
                break;
        }
    }

    private function showLogin(){
        $msg = htmlspecialchars($_GET['msg']);
        $this->response = $this->view->render($this->response, 'admin/login.twig',array('msg'=>$msg));
        return $this->response;
    }

    private function doLogin(){
        //取得post傳入帳號密碼
        $account = $this->request->getParsedBody()['account'];
        $password = $this->request->getParsedBody()['password'];

        //撈出該使用者的資料
        $db = getDB();
        $data = $db->select(
            "users",
            ["account","password"],[
            "account" => $account
        ]);

        //比對密碼

        if(count($data) <= 0)
        {
            redirect("/admin/login","無此帳號");
        }

        if($password == $data[0]['password']){
            getLoginHelper()->setLogin($account);
            redirect("/admin");
        }else{
            redirect("/admin/login","密碼錯誤");
        }
    }

}