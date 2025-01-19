<?php 
namespace db;

use db\DataSource;
use model\ReviewModel;

class ReviewQuery {
    public static function fetchByUserID($user) {

        if(!$user->isValidId()) {
            return false;
        }
        $db = new DataSource;
        $sql = 'select * from reviews where course_id = :course_id and del_flg != 1;';

        $result = $db->select($sql, [
            ':course_id' => $user->course_id
        ], DataSource::CLS, ReviewModel::class);

        return $result;
    }

    public static function fetchByCourseId($course) {

        $db = new DataSource;
        $sql = 'select r.*, u.username  from reviews r 
                    inner join users u 
                    on r.user_id = u.id 
                where r.course_id = :course_id
                order by r.id desc;';

        $result = $db->select($sql, [
            ':course_id' => $course->id
        ], DataSource::CLS, ReviewModel::class);

        return $result;

    }

    public static function reviewsWithUsername($course) {

        $db = new DataSource;
        $sql = 'select r.*, u.username from reviews r 
                    inner join users u 
                    on r.user_id = u.id
                where r.course_id = :course_id
                order by r.created_at desc;';

        $result = $db->select($sql, [
            ':course_id' => $course
        ], DataSource::CLS, ReviewModel::class);

       

        return $result;
    }
    

    public static function insert($review, $user) {

        if (!($user->isValidId()
        * $review->isValidCourseId()
        * $review->isValidReview()
        * $review->isValidRating())) {
        return false;
    }
        $db = new DataSource;
        $sql = 'insert into reviews(user_id, course_id, rating, review) 
                values(:user_id, :course_id, :rating, :review)';

        $result = $db->execute($sql, [
            ':user_id' => $user->id,
            ':course_id' => $review->course_id,
            ':rating' => $review->rating,
            ':review' => $review->review
        ]);

        return $result;
    }
}
?>