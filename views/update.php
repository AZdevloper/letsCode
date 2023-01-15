<?php
if (isset($_POST['id'])) {

    $data = new EmployesController();
    $singelEmploye = $data->getEmploye();
    print_r($singelEmploye);
}else {
    Redirect::to('home');                
}
if (isset($_POST['submit'])) {
    // die(print_r($_POST['status']));


    $data = new EmployesController();
    $data->updateEmployes();
}


?>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                    
                <div class="card-body bg-light" >
                    <a href="<?= BASE_URL;  ?>home" class="btn btn-secondary">
                    <i class="fas fa-home "> </i> </a>
                    <form  method="post">
                    <small id="helpId" class="form-text text-muted">inter your information</small>
                    
                      <input type="hidden"
                          class="form-control form-control-sm" name="id" value="<?= $singelEmploye->id ?>">
                    
                    <div class="mb-3">
                      <label for="" class="form-label">name</label>
                      <input type="text"
                          class="form-control form-control-sm" name="name" value="<?= $singelEmploye->name ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">status</label>
                        <select class="form-select form-select-lg" name="status" id="">
                            <option  value="0" <?php echo !$singelEmploye->status ? 'selected' : '' ; ?>>relié</option>
                            <option  value="1" <?php echo $singelEmploye->status ? 'selected' : '' ; ?>>active</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class=" btn btn-primary" name="submit"> Valider</butto>
                    </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>