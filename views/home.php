<?php

if (isset($_POST['sort'])) {
    $data = new articlesController();
    $articles = $data->sortArticle();
}


if (isset($_POST['find'])) {
    $data = new articlesController();
    $articles = $data->findArticle();
} else {

    $data = new articlesController();
    $articles = $data->getAllArticles();
}
$data = new articlesController();
$statistic = $data->getAllArticleStatistics();
?>

<style>
    .article {
        height: 7rem;
        width: 10rem;
        background: rgba(193, 121, 121, 0.45);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border-radius: 10px;
        border: 1px solid rgba(71, 131, 227, 0.18);

    }

    .article p {
        font-size: large;
        font-weight: bold;
    }

    .article span {
        color: blueviolet;
        font-size: large;
        font-weight: bold;

    }

</style>

<?php include("views/includes/sidebar.php") ?>

<div class="container bg-black vh-100 p-3  bg-opacity-10 border border-info border-start-0 rounded-end">
    <a href="<?= BASE_URL;  ?>logout" class=" d-sm-none bg-primary rounded rounded-1 p-2"> <i class="fa-solid fa-right-from-bracket text-white"></i></a>

    <div class="row g-2 justify-content-center">
        <div class="col-12 row text-center d-flex align-content-between  ">
            <div class="col d-flex justify-content-center ">
                <div class="article ">
                    <p>number of articles</p>
                    <span><?= $statistic["numberOfArticles"] ?></span>
                </div>
            </div>
            <div class=" col m-1 d-flex justify-content-center ">
                <div class="article">
                    <p>number of users</p>
                    <span><?= $statistic["numberOfUsers"] ?></span>
                </div>

            </div>
            <div class=" col d-flex justify-content-center ">
                <div class="article">
                    <p>number of authors</p>
                    <span><?= $statistic["numberOfAuthors"] ?></span>
                </div>

            </div>

        </div>
        <div class="col-md-12    mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card">
                <div class="card-body bg-light">
                    <form action="" method="post" class=" form-control d-flex justify-content-end   ">

                        <div class="d-block d-sm-flex justify-content-between" style="width: 17rem;">
                            <input type="text" name="search" id="" placeholder="recherche" class="float-right  rounded-1  " style="width: 12rem;">
                            <div class="d-flex justify-content-between  " style="width: 4.5rem;">
                                <button type="submit" name="find" class="btn btn-sm btn-info"> <i class="fa fa-search"></i> </button>
                                <button type="submit" name="sort" class="btn btn-sm btn-info"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                                        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
                                    </svg> </button>
                            </div>
                        </div>

                    </form>
                    <?php if (isset($_SESSION['crud'])) : ?>
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
</div>
</div>