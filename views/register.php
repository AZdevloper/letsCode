<?php
if (isset($_POST['submit'])) {
    // die(print_r($_POST['email']));
    $data = new UsersController();
    $user = $data->register();
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card">
                <div class=" card-header">
                    <h1 class="text-center">sign up</h1>
                </div>
                <div class="card-body bg-light">
                    <form method="post">
                        <div class="form-control mb-3 position-relative" id="divUserName">
                            <label for="" class="form-label">user name</label>
                            <input type="text" class="form-control text-center" name="userName" id="userName" placeholder="" style="outline: none;">
                        </div>
                        <div class="form-control mb-3 position-relative" id="divEmail">
                            <label for="" class="form-label">email</label>
                            <input type="email" class="form-control text-center" id="userEmail" name="email" placeholder="">
                        </div>
                        <div class="form-control mb-3 position-relative" id="divPassword">
                            <label for="" class="form-label">PassWord</label>
                            <input type="password" class="form-control text-center" name="password" id="passWord" placeholder="">
                        </div>
                        <div class="form-control mb-3 position-relative" id="divConfirmPassword">
                            <label for="" class="form-label">Confirm your passWord</label>
                            <input type="password" class="form-control text-center" placeholder="" id="ConfirmPassword">
                        </div>
                        <div id="divBtnSubmit">
                            <button type="submit" class="btn btn-sm btn-primary" onclick="cheekAll()" name="submit" id="btnSubmit">sign up
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?= BASE_URL ?>login" class="btn btn-link">log in</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="views/jsFiles/register.js">