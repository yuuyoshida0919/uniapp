<?php

namespace controller\register;

use lib\Auth;
use model\UserModel;
use lib\Msg;

function get()
{
    \view\register\index();
}

function post()
{
    $user = new UserModel;
    $user->username = get_param('username', '');
    $user->password = get_param('pwd', '');

    if (Auth::regist($user)) {

        Msg::push(Msg::INFO, "Welcome, {$user->username}!");
        redirect(GO_HOME);
       
    } else {

        redirect(GO_REFERER);
        
    }
}
