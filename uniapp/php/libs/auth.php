<?php

namespace lib;

use db\UserQuery;
use model\UserModel;
use Throwable;

class Auth
{
    public static function login($username, $pwd)
    {
        try {
            if (!(UserModel::validateUsername($username)
                * UserModel::validatePwd($pwd))) {
                return false;
            }

            $is_success = false;

            $user = UserQuery::fetchById($username);

            if (!empty($user) && $user->del_flg !== 1) {

                if (password_verify($pwd, $user->password)) {
                    $is_success = true;
                    UserModel::setSession($user);
                } else {
                    Msg::push(Msg::ERROR, 'Password does not match');
                }
            } else {
                Msg::push(Msg::ERROR, 'User not found');
            }
        } catch (Throwable $e) {

            $is_success = false;
            Msg::push(Msg::DEBUG, $e->getMessage());
            Msg::push(Msg::ERROR, 'There was an error with the login process. Please wait a moment and try again');
        }

        return $is_success;
    }

    public static function regist($user)
    {
        try {
            if (!($user->isValidUsername()
                * $user->isValidPwd())) {
                return false;
            }

            $is_success = false;

            $exist_user = UserQuery::fetchById($user->username);

            if (!empty($exist_user)) {

                Msg::push(Msg::ERROR, 'User already exists');
                return false;

            }

            $is_success = UserQuery::insert($user);

            if ($is_success) {

                UserModel::setSession($user);

            }

        } catch (Throwable $e) {

            $is_success = false;
            Msg::push(Msg::DEBUG, $e->getMessage());
            Msg::push(Msg::ERROR, 'There was an error with user registration. Please wait a moment and try again');
        }

        return $is_success;
    }

    public static function isLogin()
    {
        try{
            $user = UserModel::getSession();
        } catch (Throwable $e){
            $user = UserModel::clearSession();
            Msg::push(Msg::DEBUG, $e->getMessage());
            Msg::push(Msg::ERROR, 'An error has occurred. Please log in again.');
            return false;
        }
       
        if (isset($user)) {
            return true;
        } else {
            return false;
        }
    }

    public static function logout() {
        try {
            
            UserModel::clearSession();

        } catch (Throwable $e) {

            Msg::push(Msg::DEBUG, $e->getMessage());
            return false;

        }

        return true;
    }

    public static function requireLogin() {
        if(!static::isLogin()) {
            Msg::push(Msg::ERROR, 'Please log in');
            redirect('login');
        }
    }
}
