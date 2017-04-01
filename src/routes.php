<?php
// Routes
require_once '../lib/mysql.php';
require_once '../lib/helper.php';

//develop Tools only for localhost domain allow
$app->get('/test/{action}', function ($request, $response, $args) {
    $login = new Login();

    if($_SERVER['REMOTE_ADDR'] != "127.0.0.1" && $_SERVER['REMOTE_ADDR'] != "::1"){
        return;
    }

    switch ($args['action']) {
        case "killer":
            session_destroy();
            echo "session_destroy";
            break;

        case "log":
//            var_dump($login->setLogin("mia"));
//            var_dump($login->logout());
//            var_dump($login->getIsLogged());
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


