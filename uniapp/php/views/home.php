<?php

namespace view\home;

function index($courses)
{
    
?>
    <div class="container">
        <div class="row justify-content-center" style="min-height: 75vh;">
            <div class="col-md-6 mt-5">
                <h1 class="h2 text-center mb-4">You can see class reviews</h1>
                <div class="card p-4 shadow">
                    <form action="<?php the_url('review/archive') ?>" method="GET">
                        <div class="form-group mb-3">
                            <label for="subject" class="form-label">Select a subject name</label>
                            <select name="course_id" id="subject" class="form-control">
                                <option value="" disabled selected style="display: none;">Please select</option>
                                <?php foreach ($courses as $course): ?>
                                    <option value="<?= $course->id ?>"><?= $course->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-secondary w-100" value="Select">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>