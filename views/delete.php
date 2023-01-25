<?php
if (isset($_POST['id'])) {
    $data = new articlesController(); 
    $data->deleteArticle();
}else {
    Redirect::to('home');                

}
?>