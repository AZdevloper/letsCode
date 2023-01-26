<?php
if (isset($_POST['submit'])) {
    $data = new UsersController();
    $user = $data->register();
}

?>

<div class="container-fluid vh-100" style="background-image: url(asset/img/cover.jpg);background-size:cover; ">
    <div class="row vh-100 d-flex align-items-center bg-opacity-10 ">
        <div class="col-md-4 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card">
                <div class=" card-header">
                    <h1 class="text-center text-monospace">sign up</h1>
                </div>
                <div class="card-body bg-light">
                    <form method="post">
                        <div class=" mb-3 form-control position-relative" id="divUserName">
                            <label for="" class="form-label">user name</label>
                            <input type="text" class=" w-100  bg-light d-block   border-primary border-top-0 border-end-0 border-start-0 p-2 text-center " name="userName" id="userName" placeholder="" style="outline: none;box-shadow: none;">
                        </div>
                        <div class="form-control mb-3 position-relative" id="divEmail">
                            <label for="" class="form-label">email</label>
                            <input type="email" class="w-100 bg-light d-block   border-primary border-top-0 border-end-0 border-start-0 p-2 text-center" id="userEmail" name="email" placeholder="" style="outline: none;box-shadow: none;">
                        </div>
                        <div class="form-control mb-3 position-relative" id="divPassword">
                            <label for="" class="form-label">PassWord</label>
                            <input type="password" class=" w-100 bg-light d-block   border-primary border-top-0 border-end-0 border-start-0 p-2 text-center" name="password" id="passWord" placeholder="" style="outline: none;box-shadow: none;">
                        </div>
                        <div class="form-control mb-3 position-relative" id="divConfirmPassword">
                            <label for="" class="form-label">Confirm your passWord</label>
                            <input type="password" class=" w-100 bg-light d-block   border-primary border-top-0 border-end-0 border-start-0 p-2 text-center" placeholder="" id="ConfirmPassword" style="outline: none;box-shadow: none;">
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
<script src="views/jsFiles/register.js"></script>