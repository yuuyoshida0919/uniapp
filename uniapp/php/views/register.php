<?php 
namespace view\register;

function index() {
?>
    <div class="mt-5">
        <div class="text-center mb-4">
            <img width="65" src="images/logo.svg" alt="Logo">
        </div>
        <div class="login-form bg-white p-5 shadow-sm mx-auto rounded">
            <form action="<?php echo CURRENT_URI; ?>" method="POST">
                <div class="form-group mb-4">
                    <label for="id" class="h5">Username</label>
                    <input id="id" name="username" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="pwd" class="h5">Password</label>
                    <input id="pwd" name="pwd" class="form-control" required>
                </div>
                <div class="d-flex align-items-center">
                    <a href="<?php the_url('login');?>" class="text-body mr-4">Already have an account? Log in</a>
                    <button type="submit" class="btn btn-primary shadow-sm">Register</button>
                </div>
            </form>
        </div>
    </div>
<?php 
} 
?>
