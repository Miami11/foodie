<?php

//load controller
function controller($name, $data)
{
    require_once "../controllers/" . $name . 'Controller' . '.php';
    $classname = $name . "Controller";
    return new $classname($data);
}

function getLoginHelper(){
    return new Login();
}

function redirect($path,$msg = ""){
    if($msg != "") {
        header("Location: http://".$_SERVER['HTTP_HOST'].$path."?msg=".$msg);
    }else{
        header("Location: http://".$_SERVER['HTTP_HOST'].$path);
    }
    die();
}

class Login{

    function getIsLogged()
    {
        if(!isset($_SESSION['account'])) {
            return "";
        }

        if ($_SESSION['account'] != ""){
            return $_SESSION['account'];
        }
    }

    function setLogin($user)
    {
        if ($user != "") {
            $_SESSION['account'] = $user;
            return true;
        } else {

            return false;
        }
    }

    function logout()
    {
        if(!isset($_SESSION['account'])) {
            return false;
        }

        if($_SESSION['account'] != "") {
            $_SESSION['account'] = "";
            return true;
        }
    }
}
