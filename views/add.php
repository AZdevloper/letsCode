<?php
if (isset($_POST['submit'])) {


    // die(print_r( count($_POST["author"])));
    $data = new articlesController();
    $data->addArticle();
}


?>
<?php include("views/includes/sidebar.php") ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                content, $category_id, $author, $title, $created_date
                <div class="card-body bg-light">
                    <div class=" d-flex justify-content-between">
                        <a href="<?= BASE_URL;  ?>home" class="btn btn-secondary">
                            <i class="fas fa-home "> </i> </a>
                        <button type="button float-right " class="btn btn-primary " id="add_new_article"> <i class="fa fa-plus"></i> add new article</button>
                    </div>
                    <div class=" m-4 border border-black">
                        <small id="helpId" class="form-text text-muted">inter your article information</small>
                        <form method="post">

                            <div id="formParent">

                                <div class="m-2 p-3 bg-primary  bg-opacity-10 border border-info  rounded">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" class="form-control form-control-sm" name="title[]" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Author</label>
                                        <input type="text" class="form-control form-control-sm" name="author[]" id="" aria-describedby="helpId" placeholder="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Category</label>
                                        <select class="form-select form-select-lg" name="category_id[]" id="">
                                            <option value="1">Blockchain</option>
                                            <option value="2">Cyber Security</option>
                                            <option value="3">Quantum Computing</option>
                                            <option value="4">Internet of Things (IoT)</option>
                                        </select>
                                    </div>
                                    <div class="mb-0">
                                        <label class="form-label">Content</label>
                                        <textarea class="form-control" name='content[]' rows="2" id="task-description" required></textarea>
                                    </div>

                                </div>

                            </div>
                            <div class="m-2">
                                <button type="submit" class=" btn btn-primary" name="submit"> Add</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>