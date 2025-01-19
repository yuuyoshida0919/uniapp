<?php 
namespace controller\home;

use db\CourseQuery;

function get(){

    $courses = CourseQuery::fetchExistsCourse();
    \view\home\index($courses);
    
}

?>