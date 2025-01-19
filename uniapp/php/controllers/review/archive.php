<?php

namespace controller\review\archive;

use db\CourseQuery;
use db\ReviewQuery;
use lib\Auth;
use model\CourseModel;

function get()
{
    Auth::requireLogin();

    $course = new CourseModel;
    $course->id = get_param('course_id', null, false);

    $reviews = ReviewQuery::reviewsWithUsername($course->id);
    $course_info = CourseQuery::fetchById($course);


    if (count($reviews) > 0) {
        \view\review\archive\index($reviews, $course_info);
    } else {
        echo '<div class="alert alert-primary">There are no reviews yet</div>';
    }
}
