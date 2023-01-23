<?php
if (isset($_POST['find'])) {
    # code...
    $data = new articlesController();
    $articles = $data->findarticles();
} else {

    $data = new articlesController();
    $articles = $data->getAllArticles();
    // echo "<pre>";
    // print_r($articles);
    // echo"</pre>";
    // die;

}

?>



<div class="container bg-black p-3  bg-opacity-10 border border-info border-start-0 rounded-end">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card">
                <div class="card-body bg-light">
                    <a href="<?= BASE_URL;  ?>add" class=" mx-3"> <i class="fas fa-plus btn btn-secondary "> </i> </a>
                    <a href="<?= BASE_URL;  ?>logout"> <i class="fas fa-user btn btn-secondary"></i><?= $_SESSION['username'] ?> </a>
                    <form action="" method="post" class=" form-control  d-flex justify-content-end">
                        <input type="text" name="search" id="" placeholder="recherche" class="float-right    w-15px rounded-1">
                        <button type="submit" name="find" class="btn btn-sm btn-info"> <i class="fa fa-search"></i> </button>
                    </form>
                    <?php if (isset($_SESSION['crud_error'])) : ?>
                        <div class="alert alert-<?php if ($_SESSION['crud_error'] === 'Process Success :)') :
                                                    echo 'success';
                                                else : echo 'danger';
                                                endif ?>
                        alert-dismissible fade show">
                            <strong>wrong!</strong>
                            <?php
                            echo $_SESSION['crud_error'];
                            unset($_SESSION['crud_error']);
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert">
                            </button>
                        </div>
                    <?php endif ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">title</th>
                                    <th scope="col">category</th>
                                    <th scope="col">created_date</th>
                                    <th scope="col">Author</th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($articles as $article) : ?>
                                    <tr>
                                        <td scope="row "><?= $article["title"]; ?></td>
                                        <td><?= $article["category_name"]; ?></td>
                                        <td><?= $article["created_date"] ?></td>
                                        <td><?= $article["author"]; ?></td>
                                        <td>
                                            <form action="<?= BASE_URL;  ?>update" method="post" class=" d-inline-block m-1">
                                                <input type="hidden" name="id" value="<?= $article["id"]; ?>">
                                                <button class="btn btn-sm btn-warning " type="submit"> Edit <i class="bi bi-pencil"></i>
                                                </button>
                                            </form>
                                            <form action="<?= BASE_URL;  ?>delete" method="post" class="d-inline-block  m-1">
                                                <input type="text" name="id" value="<?= $article["id"]; ?>">
                                                <button class="btn btn-sm btn-danger" type="submit"> Delete<i class="  fa fa-trashe"></i>
                                                </button>
                                            </form>
                                        </td>


                                    <?php endforeach; ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- <div class="container-fluid mt-3">
    <h3>Offcanvas Sidebar</h3>
    <p>Offcanvas is similar to modals, except that it is often used as a sidebar.</p>
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
        Open Offcanvas Sidebar
    </button>
</div> -->


<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card">
                <div class="card-body bg-light">
                    <a href="<?= BASE_URL;  ?>add"> <i class="fas fa-plus"> add</i> </a>
                    <a href="<?= BASE_URL;  ?>logout"> <i class="fas fa-user"></i><?= $_SESSION['username'] ?> </a>
                    <form action="" method="post" class=" float-right d-flex flex-row">
                        <input type="text" name="search" id="" placeholder="recherche" class=" form-control w-100 rounded-1">
                        <button type="submit" name="find" class="btn btn-sm btn-info"> <i class="fa fa-search"></i> </button>
                    </form>
                    <?php if (isset($_SESSION['crud_error'])) : ?>
                        <div class="alert alert-<?php if ($_SESSION['crud_error'] === 'Process Success :)') :
                                                    echo 'success';
                                                else : echo 'danger';
                                                endif ?>
                    alert-dismissible fade show">
                            <strong>wrong!</strong>
                            <?php
                            echo $_SESSION['crud_error'];
                            unset($_SESSION['crud_error']);
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert">
                            </button>
                        </div>
                    <?php endif ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <caption>List of $articlees</caption>
                            <thead>
                                <tr>
                                    <th scope="col  ">id</th>
                                    <th scope="col ">name</th>
                                    <th scope="col">status</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($articles as $article) : ?>
                                    <tr>
                                        <th scope="row h"><?= $article["id"]; ?></th>
                                        <td><?= $article["name"]; ?></td>
                                        <td><?= $article["status"] ? '<span class=" badge bg-success ">active</span>' :
                                                '<span class=" badge bg-danger ">rellié</span>'; ?></td>
                                        <td>
                                            <form action="update" method="post" class=" d-inline-block m-1">
                                                <input type="hidden" name="id" value="<?= $article["id"]; ?>">
                                                <button class="btn btn-sm btn-warning " type="submit"> Edit <i class="bi bi-pencil"></i>
                                                </button>


                                            </form>
                                            <form action="delete" method="post" class="d-inline-block  m-1">
                                                <input type="hidden" name="id" value="<?= $article["id"]; ?>">
                                                <button class="btn btn-sm btn-danger" type="submit"> Delete<i class="  fa fa-trashe"></i>
                                                </button>
                                            </form>
                                        </td>


                                    <?php endforeach; ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->