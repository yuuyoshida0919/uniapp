<?php

namespace model;

use lib\Msg;

class UserModel extends AbstractModel
{
    public int $id;
    public string $username;
    public string $password;
    public int $del_flg;

    protected static $SESSION_NAME = '_user';


    public static function validateUsername($val)
    {

        $res = true;

        if (empty($val)) {

            Msg::push(Msg::ERROR, 'Please enter your username');
            $res = false;
        } else {

            if (mb_strlen($val) > 30) {

                Msg::push(Msg::ERROR, 'Please enter your name with 30 characters or fewer');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidUsername()
    {
        return static::validateUsername($this->username);
    }

    public function isValidId()
    {

        return static::validateId($this->id);
    }

    public static function validateId($val)
    {
        $res = true;

        if (empty($val) || !is_numeric($val)) {

            Msg::push(Msg::ERROR, 'Invalid parameter');
            $res = false;
        }

        return $res;
    }

    public static function validatePwd($val)
    {
        $res = true;

        if (empty($val)) {

            Msg::push(Msg::ERROR, 'Please enter your password');
            $res = false;
        } else {

            if (strlen($val) < 4) {

                Msg::push(Msg::ERROR, 'Please enter a password with at least 4 digits');
                $res = false;
            }

            if (!is_alnum($val)) {

                Msg::push(Msg::ERROR, 'Please enter a password using alphanumeric characters');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidPwd()
    {
        return static::validatePwd($this->password);
    }
}
//     public static function validatePwd($val)
//     {
//         $res = true;

//         if (empty($val)) {

//             Msg::push(Msg::ERROR, 'Please enter password');
//             $res = false;
//         } else {

//             if (strlen($val) < 4) {

//                 Msg::push(Msg::ERROR, 'Password must be more than 4 digits');
//                 $res = false;
//             }

//             if (!is_alnum($val)) {

//                 Msg::push(Msg::ERROR, 'Password must be alphabet or number');
//                 $res = false;
//             }
//         }

//         return $res;
//     }

//     public function isValidPwd()
//     {
//         return static::validatePwd($this->password);
//     }
// }
