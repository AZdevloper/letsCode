<?php
if (isset($_POST['submit'])) {
    // die(print_r($_POST['email']));
    $data = new UsersController();
    $employes = $data->register();
    
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <?php include('./views/includes/alerts.php');?>
            <div class="card">
                <div class=" card-header">
                    <h1 class="text-center">sign up</h1>
                </div>
                <div class="card-body bg-light" >
                    <form  method="post" >
                        <div class="form-control mb-3">
                            <label for="" class="form-label">email</label>
                            <input type="email"
                                class="form-control" name="email" id="" placeholder="">
                        </div>
                        <div class="form-control mb-3">
                            <label for="" class="form-label">PassWord</label>
                            <input type="password"
                                class="form-control" name="password" id="" placeholder="">
                        </div>
                       <div>
                            <button type="submit" class="btn btn-sm btn-primary" name="submit">sign up
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?=BASE_URL ?>login" class="btn btn-link">log in</a>
                </div>
            </div>
        </div>
    </div>
</div>