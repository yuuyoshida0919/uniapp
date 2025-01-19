<?php

namespace view\login;

function index()
{

?>
    <div class="mt-5">
        <div class="text-center mb-4">
            <img width="65" src="images/logo.svg" alt="">
        </div>
        <div class="login-form bg-white p-5 shadow-sm mx-auto rounded">
            <form action="<?php echo CURRENT_URI; ?>" method="POST">
                <div class="form-group mb-4">
                    <label for="id" class="h5">Username</label>
                    <input id="id" name="username" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="pwd" class="h5">Password</label>
                    <input type="password" name="pwd" id="pwd" class="form-control">
                </div>
                <div class="d-flex align-items-center ">

                    <a class="text-body mr-4" href="<?php the_url('register'); ?>">Don't you have an account? Sign in</a>
                    <input type="submit" class="btn btn-primary shadow-sm" value="Login">
                </div>
        </div>
        </form>
    </div>
    </div>

<?php } ?>