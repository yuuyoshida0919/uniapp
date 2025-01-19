<?php

namespace partials;

function review_list_item($review, $username)
{
    $raiting = $review->rating;
    $course_review = $review->review;
    
?>
    <li class="bg-white shadow-sm mb-3 rounded p-5">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <span class="mr-3">Commented by <?php echo $username ?></span>
            <span class="text-end"><?php echo htmlspecialchars(str_repeat('⭐', (int)$raiting));?> : <?php echo $raiting ?></span>
        </div>

        <h2 class="h5 mb-2">
            <p><?php echo $course_review;?></p>
        </h2>
    </li>
<?php
}
?>