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
        $this->addInfo();
    }

    private function addInfo(){
        $db = getDB();

        //test
//        var_dump($this->request->getParsedBody());

//        die();
        //取得post傳入資料
        //        var_dump($this->request->getParsedBody());
//
//        print_r($this->request->getParsedBody());
//
//        die();

        $shop_id = $this->request->getParsedBody()['shop_id'];
        $name_ch = $this->request->getParsedBody()['name_ch'];
        $name_en = $this->request->getParsedBody()['name_en'];
        $tags = $this->request->getParsedBody()['tags'];
        $coupon = $this->request->getParsedBody()['coupon'];
        $shift = $this->request->getParsedBody()['shift'];

        $phone = $this->request->getParsedBody()['phone'];

//        $image = $this->request->getParsedBody()['image'];
        $address = $this->request->getParsedBody()['address'];
        $rate = $this->request->getParsedBody()['rate'];
        $hours = $this->request->getParsedBody()['hours'];

        $createTime = time();
        $updateTime = time();


        $data = $db->query("INSERT INTO shops (shop_id,name_ch,name_en,image,address,phone,tags,coupon,shift,rate,create_at,update_at ,hours)
        VALUES ('$shop_id','$name_ch','$name_en','temp_image.jpg','$address','$phone','$tags','$coupon','$shift','$rate','$createTime','$updateTime','$hours')")->fetchAll();
    }

}