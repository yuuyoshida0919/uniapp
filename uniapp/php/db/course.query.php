<?php 
namespace db;

use db\DataSource;
use model\CourseModel;

class CourseQuery {
    public static function fetchById($course) {

        $db = new DataSource;
        $sql = 'select * from courses where id = :course_id;';

        $result = $db->selectOne($sql, [
            ':course_id' => $course->id
        ], DataSource::CLS, CourseModel::class);

        return $result;

    }

    public static function fetchByCourseID($user) {

        if(!$user->isValidId()) {
            return false;
        }
        $db = new DataSource;
        $sql = 'select * from courses where id= :course_id;';

        $result = $db->selectOne($sql, [
            ':course_id' => $user->course_id
        ], DataSource::CLS, CourseModel::class);

        return $result;
    }

    public static function fetchExistsCourse()
    {

        $db = new DataSource;
        $sql = 'select * from courses;';

        $result = $db->select($sql, [], DataSource::CLS, CourseModel::class);

        return $result;
    }

}
?>