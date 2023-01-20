<?php
// isset($_POST['id']) &&   $id = $_POST['id'];
if (isset($_POST['submit'])) {

    $data = new articlesController();
    $data->updateArticle();
}
if (isset($_POST['id'])) {

    $data = new articlesController();
    $article = $data->getArticle();
    print_r($article);
} else {
    Redirect::to('home');
}



?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">

                <div class="card-body bg-light">
                    <a href="<?= BASE_URL;  ?>home" class="btn btn-secondary">
                        <i class="fas fa-home "> </i> </a>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $article->id ?>">

                        <div class="m-2 p-3 bg-primary  bg-opacity-10 border border-info  rounded">
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control form-control-sm" name="title" value="<?php echo $article->title ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Author</label>
                                <input type="text" class="form-control form-control-sm" name="author" rows="5" value="<?php echo $article->author ?>">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Category</label>
                                <select class="form-select form-select-lg" name="category_id" id="">
                                    <option value="1" <?php echo $article->category_id == 1 ? 'selected' : ''; ?>>Blockchain</option>
                                    <option value="2" <?php echo $article->category_id == 2 ? 'selected' : ''; ?>>Cyber Security</option>
                                    <option value="3" <?php echo $article->category_id == 3 ? 'selected' : ''; ?>>Quantum Computing</option>
                                    <option value="4" <?php echo $article->category_id == 4 ? 'selected' : ''; ?>>Internet of Things (IoT)</option>
                                </select>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">Content</label>
                                <textarea class="form-control" name='content' rows="2" required><?php echo $article->content ?></textarea>
                            </div>

                        </div>

                        <div>
                            <button type="submit" class=" btn btn-warning" name="submit"> Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>