<?php

namespace model;

use lib\Msg;

class CourseModel extends AbstractModel
{
    public int $id;
    public string $name;

    protected static $SESSION_NAME = '_course';


    // public function isValidId() {

    //     return static::validateId($this->id);
        
    // }

    // public static function validateId($val) {
    //     $res = true;

    //     if(empty($val)) {

    //         Msg::push(Msg::ERROR, 'ユーザーIDを入力してください。');
    //         $res = false;

    //     } else {

    //         if(strlen($val) > 10) {
    //             Msg::push(Msg::ERROR, 'ユーザーIDは１０桁以下で入力してください。');
    //             $res = false;
    //         }

    //         if(!is_alnum($val)) {
    //             Msg::push(Msg::ERROR, 'ユーザーIDは半角英数字で入力してください。');
    //             $res = false;
    //         }

    //     }

    //     return $res;
    // }
}