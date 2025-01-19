<?php 
namespace partials;

use lib\Auth;
use lib\Msg;

function header() {
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>subjects rating</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <link
      href="//fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&display=swap"
      rel="stylesheet"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="<?php echo BASE_CSS_PATH ?>style.css">
</head>
<body>
    <div id="container">
        <header class="header container-fluid my-2 sticky-top">
            <nav class="row align-items-center py-4 px-3">
                <a href="<?php the_url('/'); ?>" class="col-md d-fex align-items-center mb-3 mb-md-0 ">
                    <img width="50" src="<?php echo BASE_IMAGE_PATH ?>logo.svg" alt="">
                    <span class="h2 font-weight-bold mb-0">University of Debrecen</span>
                </a>
                <div class="col-md-auto text-end"> 
                    <?php if(Auth::isLogin()): ?>
                        <a href="<?php the_url('post_review') ?>" class="btn btn-secondary mr-3">Posting</a>
                        <a href="<?php the_url('logout') ?>">Log out</a>
                    <?php else: ?>
                        <a href="<?php the_url('register') ?>" class="btn btn-secondary mr-3">Sign in</a>
                        <a href="<?php the_url('login') ?>">Login</a>
                    <?php endif;?>
                </div>
            </nav>
        </header>
        <main class="container py-3">

<?php 
Msg::flush();

// if(Auth::isLogin()) {
//     echo 'Now logging';
// } else {
//     echo 'Not logging';
// }

}
?>