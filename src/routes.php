<?php
// Routes
require_once '../lib/mysql.php';
require_once '../lib/helper.php';

//develop Tools only for localhost domain allow

$app->get('/test', function ($request, $response, $args) {
    return controller('test',$this)->run('post');
});



$app->get('/test/{action}', function ($request, $response, $args) {
    $login = new Login();

//    if($_SERVER['REMOTE_ADDR'] != "127.0.0.1" && $_SERVER['REMOTE_ADDR'] != "::1"){
//        return;
//    }

    switch ($args['action']) {
        case "killer":
            session_destroy();
            echo "session_destroy";
            break;

        case "post":
            $url = 'http://localhost/member';
            $data = array('account' => '123', 'password' => '23123');

            // use key 'http' even if you send the request to https://...
            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            if ($result === FALSE) { /* Handle error */ }
            var_dump($result);
            break;

        case "faker":
            $db = getDB();
            for ($i=0;$i<100;$i++){

                $shop_id = time().uniqid("s");
                $name_ch = unicode_shuffle("豬排魯麵飯大小雞菜湯魚牛羊排蝦羹",10);
                $name_en = str_shuffle("shit");
                $db->insert("shops", [
                    "shop_id" => $shop_id,
                    "name_ch" => $name_ch,
                    "name_en" => $name_en,
                    "image" => $shop_id.".png",
                    "address" => "苗栗縣三灣鄉三灣村298號2弄15號",
                    "phone" => "1978948741",
                    "tags" => "{'炸物','滷味'}",
                    "coupon" => "0",
                    "shift" => "0",
                    "rate" => "1"
                ]);
            }
            break;
    }
});

//API
$app->get('/api', function ($request, $response, $args){
    return json_encode(array('flag'=>0));
});

//首頁
$app->get('/', function ($request, $response, $args){
    return controller('home',$this)->run();
});

$app->get('/memIndex', function ($request, $response, $args) {
    return controller('member',$this)->run();
});



$app->get('/admin', function ($request, $response, $args) {
    return controller('admin',$this)->run();
});

//登入後台
$app->get('/admin/login', function ($request, $response, $args) {
    return controller('login',$this)->run('get');
});

$app->post('/admin/login', function ($request, $response, $args) {
    return controller('login',$this)->run('post');
//    return controller('admin',$this)->run("login");
});

$app->get('/admin/logout', function ($request, $response, $args) {
    getLoginHelper()->logout();
    redirect("/");
});

$app->post('/member', function ($request, $response, $args) {
    return controller('member',$this)->run('post');

});



//FOR API USE ONLY
$app->get('/api/{kind}/{action}/{value}', function ($request, $response, $args) {

    return controller('interface',$this)->run($args);
});

//for add shop
$app->post('/api/{kind}/{action}', function ($request, $response, $args) {
    return controller('add',$this)->run($args);
});

