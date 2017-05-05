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
        switch ($action){
            case "add":
                $this->addInfo();
                break;
        }
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

//        transaction 控制兩邊要同時做完
        $db->pdo->beginTransaction();

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

        $sql = "INSERT INTO shops (shop_id,name_ch,name_en,image,address,phone,tags,coupon,shift,rate,create_at,update_at ,hours)
        VALUES ('$shop_id','$name_ch','$name_en','temp_image.jpg','$address','$phone','$tags','$coupon','$shift','$rate','$createTime','$updateTime','$hours')";

        $db->query($sql);


//        再新增到會員資料欄位
//        if(){
//            echo '{"flag":"1","msg":"新增成功"}';
//        }else{
//            echo '{"flag":"0","msg":"新增失敗"}';
//        }
    }


}