<?php

namespace view\review\archive;

function index($reviews, $course)
{
?>
    <main class="container py-5">
        <div class="py-4">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-8">
                    <h1 class="display-4"><?php echo $course->name ?></h1>
                </div>
                <div class="col-md-4 text-md-right">
                    <a href="<?php the_url('post_review') ?>" class="btn btn-primary">Post a Review</a>
                </div>
            </div>
            <div class="mt-4">
                <ul class="list-unstyled">
                    <?php
                    foreach ($reviews as $review) {
                        \partials\review_list_item($review, $review->username);
                    }
                    ?>
                </ul>
            </div>
        </div>
    </main>
<?php
}
?>
