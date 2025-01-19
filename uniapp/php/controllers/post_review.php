<?php 
namespace controller\post_review;

use db\CourseQuery;

function get() {

    $courses = CourseQuery::fetchExistsCourse();
    \view\post_review\index($courses);

}

?>