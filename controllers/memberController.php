<?php
require_once '../lib/helper.php';

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

    function run($action)
    {
        switch ($action){
            case "login":
                break;
            case "add":
                $this->add();
                break;
            case "update":
                $this->update();
                break;
            case "delete":
                $this->delete();
                break;
        }

    }
    function login(){
        $login = new Login();
    }

    function add(){
        $db = getDB();

        $memname = $this->request->getParsedBody()['memname'];
        $nickname = $this->request->getParsedBody()['nickname'];
        $account = $this->request->getParsedBody()['account'];
        $password = $this->request->getParsedBody()['password'];
        $cellphone = $this->request->getParsedBody()['cellphone'];
        $area = $this->request->getParsedBody()['area'];
//        $auth = $this->request->getParsedBody()['auth'];
        $birthday = $this->request->getParsedBody()['birthday'];
        $email = $this->request->getParsedBody()['email'];
        $sex = $this->request->getParsedBody()['sex'];
//        $token = $this->request->getParsedBody()['token'];

        $auth="user";
        $token = uniqid().time();

        //sql for add data
        $sql = "INSERT INTO users ( memname,nickname,account,password,cellphone,area,auth,birthday,email,sex,token),
        VALUE ('$memname','$nickname','$account','$password','$cellphone','$area','$auth','$birthday','$email','$sex','$token')";



        //return json flag {flag:1,"msg":}
        if($db->query($sql)){
            echo '{"flag":"1","msg":"新增成功"}';
        }else{
            echo '{"flag":"0","msg":"新增失敗"}';
        }
    }

    function update(){
        $db = getDB();
        $name = $this->request->getParsedBody()['name'];
        $nickname = $this->request->getParsedBody()['nickname'];
        $account = $this->request->getParsedBody()['account'];
        $password = $this->request->getParsedBody()['password'];
        $cellphone = $this->request->getParsedBody()['cellphone'];


       $sql = $db->update("users", [
            "name" => "$name",
           "nickname" => "$nickname",
           "account" => " $account",
            "password" => "$password",
           "cellphone" => "$cellphone"
       ]);

        if($db->query($sql)){
            echo '{"flag":"1","msg":"修改成功"}';
        }else{
            echo '{"flag":"0","msg":"修改失敗"}';
        }
    }
//
//    function delete(){
//
//    }
}