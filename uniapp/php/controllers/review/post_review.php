<?php 
namespace controller\review\post_review;

use db\ReviewQuery;
use lib\Auth;
use lib\Msg;
use model\ReviewModel;
use model\UserModel;
use Throwable;



function post() {

    Auth::requireLogin();

    $review = new ReviewModel;
    $review->course_id = get_param('course_id', 0);
    $review->review = get_param('review', '');
    $review->rating = get_param('rating', 0);


    try {
        
        $user = UserModel::getSession();
        $is_success = ReviewQuery::insert($review, $user);
        var_dump($is_success);
        
    } catch(Throwable $e) {
        
        Msg::push(Msg::DEBUG, $e->getMessage());
        $is_success = false;

    }

    if($is_success) {

        Msg::push(Msg::INFO, 'Your review has been successfully submitted');
        redirect('review/archive?course_id=' . $review->course_id);

    } else {

        Msg::push(Msg::ERROR, 'Your review could not be submitted');
        redirect(GO_REFERER);
    }
}
?>