<?php
if (isset($_POST['submit'])) {
    $data = new UsersController();
    $user = $data->auth();
}

?>

<div class="container-fluid vh-100" style="background-image: url(asset/img/cover.jpg);background-size:cover; ">
    <div class="row vh-100 d-flex align-items-center">
        <div class="col-md-4 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card">
                <div class=" ">
                    <h1 class="text-center">log in</h1>
                </div>
                <div class="card-body bg-light">
                    <form method="post">
                        <div class=" mb-3">
                            <label for="" class="">Email :</label>
                            <input type="text" class="bg-light d-block   border-primary border-top-0 border-end-0 border-start-0 p-2 text-center" name="email" id="" placeholder=" type your email" style="outline: none; box-shadow: none;">
                        </div>
                        <div class=" mb-3">
                            <label for="" class="">PassWord :</label>
                            <input type="password" class="bg-light d-block   border-primary border-top-0 border-end-0 border-start-0 p-2 text-center" name="password" id="" placeholder="type your password" style="outline: none;box-shadow: none;">
                        </div>
                        <div class="d-flex row justify-content-center">
                            <button type="submit" class="btn col-6 btn-sm btn-primary" name="submit">log in
                            </button>
                        </div>
                    </form>
                </div>
                <div class="">
                    <a href="<?= BASE_URL ?>register" class="btn btn-link btn-sm ">sign up</a>
                </div>
            </div>
        </div>
    </div>
</div>