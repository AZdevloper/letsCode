<?php
if (isset($_POST['id'])) {
    $data = new EmployesController();
    $data->deleteEmployes();
}else {
    Redirect::to('home');                

}
?>