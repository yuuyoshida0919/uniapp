<?php

namespace view\post_review;

function index($courses)
{

?>
  <h1 class="display-4 mb-4">Post a review</h1>
  <div class="card p-5 shadow-sm">
    <form action="<?php echo the_url('review/post_review') ?>" method="POST">
      <div class="form-group mb-4">
        <label for="subject" class="h5">Choose subject</label>
        <select name="course_id" id="subject" class="form-control" size="8">
        <?php foreach ($courses as $course): ?>
            <option value="<?= $course->id ?>"><?= $course->name ?></option>
        <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group ,b-4">
        <label for="review" class="h5">Please write review</label>
        <textarea name="review" id="review" class="form-control" rows="5"></textarea>
      </div>
      <div>
        <label for="rating" class="h5">Please rate the class</label>
        <div class="mb-3">
          <i class="fa fa-star active"></i>
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star-o"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <input type="hidden" name="rating" id="rating-value" value="1">
      </div>

      <div class="d-flex align-items-center">
        <div>
          <input
            type="submit" value="Post" class="btn btn-primary shadow-sm mr-3" />
        </div>
        <div>
          <a class="text-body" href="<?php the_url('/'); ?>">Go back</a>
        </div>
      </div>
    </form>
  </div>
  </main>
  </div>
  <script>
    $(document).ready(function() {
      $(".fa").on("mouseover", function() {
        var $this = $(this);
        $this.nextAll().removeClass("fa-star").addClass("fa-star-o");
        $this.prevAll().removeClass("fa-star-o").addClass("fa-star");
        $this.removeClass("fa-star-o").addClass("fa-star");
      });

      $(".fa").on("click", function() {
        var $this = $(this);
        var rating = $this.index() + 1; // クリックされた星の位置を評価数とする
        $("#rating-value").val(rating); // 隠しフィールドに評価数をセット
        $this.addClass("active").siblings().removeClass("active");
      });

      $(".fa").on("mouseleave", function() {
        var select = $(".active");
        select.nextAll().removeClass("fa-star").addClass("fa-star-o");
        select.prevAll().removeClass("fa-star-o").addClass("fa-star");
        select.removeClass("fa-star-o").addClass("fa-star");
      });
    });
  </script>

<?php
}
?>