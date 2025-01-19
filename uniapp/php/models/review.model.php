<?php

namespace model;

use lib\Msg;

class ReviewModel extends AbstractModel
{
    public int $id;
    public int $user_id;
    public int $course_id;
    public int $rating;
    public string $review;
    public int $del_flg;
    public string $username;


    protected static $SESSION_NAME = '_review';

    public function isValidId()
    {
        return static::validateId($this->id);
    }

    public function isValidCourseId() {
        return ReviewModel::validateId($this->course_id);
    }

    public function isValidRating() {
        return ReviewModel::validateId($this->rating);
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

    public function isValidReview() {
        return static::validateReview($this->review); 
    }

    public static function validateReview($val)
    {
        $res = true;

        if (mb_strlen($val) > 500) {

            Msg::push(Msg::ERROR, 'Please enter your comment within 500 characters');
            $res = false;

        }

        return $res;
    }
}