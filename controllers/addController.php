<?php


class addController
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

            case "post":
                $this->addInfo();
                break;
        }
    }

    private function addInfo(){
        $db = getDB();
        //取得post傳入帳號密碼
        $account = $this->request->getParsedBody()['id'];
        $shop_id = $this->request->getParsedBody()['shop_id'];
        $name_ch = $this->request->getParsedBody()['name_ch'];
        $name_en = $this->request->getParsedBody()['name_en'];
        $tags = $this->request->getParsedBody()['tags'];
        $phone = $this->request->getParsedBody()['phone'];
        $image = $this->request->getParsedBody()['image'];


        $data = $db->query("INSERT INTO shops (id,shop_id,name_ch,name_en,tags,phone,address,image)
        VALUES ($account,$shop_id,$name_ch,$name_en,$tags,$phone,$image))")->fetchAll();
    }

}