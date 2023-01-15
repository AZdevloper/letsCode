<?php
    // session_start();
    require_once './autoload.php';
    require_once './views/includes/header.php';
    // require_once './controller/homeControler.php';

    $home = new HommeController();
    $pages = ['home','add','update','delete','register','login','logout'];
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    
    if(isset($_GET['page'])){
    
        if(in_array($_GET['page'], $pages)){
            $page = $_GET['page'];
            $home->index($page);
    
        }else{
            include('views/includes/404.php');
        }
    
    }else{
        $home->index('home');
    }
    require_once './views/includes/footer.php';
}elseif (isset($_GET['page']) && $_GET['page'] === 'register') {
    $home->index('register');
}else {
    $home->index('login');

}



    ?>