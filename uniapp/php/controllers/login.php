<?php 
namespace controller\login;

use lib\Auth;
use lib\Msg;
use model\UserModel;

function get() {

    \view\login\index();
}

function post(){
    $username = get_param('username', '');
    $pwd = get_param('pwd', '');

    

    if(Auth::login($username, $pwd)) {

        $user = UserModel::getSession();
        Msg::push(Msg::INFO, "Welcome back, {$user->username}!");
        redirect(GO_HOME);

    } else {

        redirect(GO_REFERER);

    }
    
}

?>