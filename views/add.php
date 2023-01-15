<?php
if (isset($_POST['submit'])) {

    $data = new EmployesController();
    $employes = $data->addEmployes();
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
                    <div class="mb-3">
                      <label for="" class="form-label">name</label>
                      <input type="text"
                          class="form-control form-control-sm" name="name" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">status</label>
                        <select class="form-select form-select-lg" name="status" id="">
                            <option value="1" >active</option>
                            <option value="0">relié</option>
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