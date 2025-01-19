<?php 
namespace controller\logout;

use lib\Auth;
use lib\Msg;

function get() {

    if(Auth::logout()) {

        Msg::push(Msg::INFO, 'Log out successful');

    } else {

        Msg::push(Msg::ERROR, 'Failed to log out');

    }

    redirect(GO_HOME);
}