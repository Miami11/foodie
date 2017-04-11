<?php

use Medoo\Medoo;

// Initialize
function getDB()
{
    $locallist = array(
        '127.0.0.1',
        '::1'
    );

    if (!in_array($_SERVER['REMOTE_ADDR'], $locallist)) {
        //setting production db connect
        return new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'foodie',
            'server' => 'localhost',
            'username' => 'root',
            'password' => 'fzwV9d4G',
            'charset' => 'utf8'
        ]);
    } else {
        return new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'foodie',
            'server' => 'localhost',
            'username' => 'root',
            'password' => 'fzwV9d4G',
            'charset' => 'utf8'
        ]);
    }

}
