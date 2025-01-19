<?php 
namespace db;

use db\DataSource;
use model\UserModel;

class UserQuery {
    public static function fetchById($username) {

        $db = new DataSource;
        $sql = 'select * from users where username = :username;';

        $result = $db->selectOne($sql, [
            ':username' => $username
        ], DataSource::CLS, UserModel::class);

        return $result;

    }

    public static function insert($user) {
        $db = new DataSource;
        $sql = 'insert into users(username, password) values(:username, :password)';

        $user->password = password_hash($user->password, PASSWORD_BCRYPT);
        $result = $db->execute($sql, [
            ':username' => $user->username,
            ':password' => $user->password
        ]);

        return $result;
    }

    public static function fetchByCourseId($course) {

        $db = new DataSource;
        $sql = 'select * from users where course_id = :course_id;';

        $result = $db->selectOne($sql, [
            ':course_id' => $course->id
        ], DataSource::CLS, UserModel::class);

        return $result;

    }
}
?>