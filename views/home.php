<?php
if (isset($_POST['find'])) {
    # code...
    $data = new EmployesController();
    $employes = $data->findEmployes();
    
} else {
    # code...
    $data = new EmployesController();
    $employes = $data->getAllEmployes();
    
    // print_r($employes);
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <?php include('./views/includes/alerts.php');?>
            <div class="card">
                <div class="card-body bg-light" >
                    <a href="<?= BASE_URL;  ?>add"> <i class="fas fa-plus"> add</i> </a>
                    <a href="<?= BASE_URL;  ?>logout"> <i class="fas fa-user"></i><?= $_SESSION['username'] ?> </a>
                    <form action="" method="post" class=" float-right d-flex flex-row">
                        <input type="text" name="search" id="" placeholder="recherche" class=" form-control w-100 rounded-1">
                        <button type="submit" name="find" class="btn btn-sm btn-info"> <i class="fa fa-search"></i> </button>
                    </form>
                    <?php if(isset($_SESSION['crud_error'])): ?>
                    <div class="alert alert-<?php if($_SESSION['crud_error']=== 'Process Success :)'):
                    echo 'success'; else: echo 'danger'; endif ?>
                    alert-dismissible fade show">
                    <strong>wrong!</strong>
                    <?php 
                    echo $_SESSION['crud_error'] ; 
                    unset($_SESSION['crud_error'] );
                    ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert">
                        </button>
                    </div>
                    <?php endif ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <caption>List of employees</caption>
                            <thead>
                                <tr>
                                    <th scope="col  ">id</th>
                                    <th scope="col ">name</th>
                                    <th scope="col">status</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($employes as $employe): ?>
                                <tr>
                                    <th scope="row h"><?= $employe["id"]; ?></th>
                                    <td><?= $employe["name"]; ?></td>
                                    <td><?= $employe["status"] ? '<span class=" badge bg-success ">active</span>' :
                                        '<span class=" badge bg-danger ">rellié</span>'; ?></td>
                                    <td>
                                        <form action="update" method="post" class=" d-inline-block m-1">
                                            <input type="hidden" name="id"
                                            value="<?= $employe["id"]; ?>">
                                            <button class="btn btn-sm btn-warning " type="submit"> Edit <i class="bi bi-pencil"></i>
                                            </button>
                                        

                                        </form>
                                        <form action="delete" method="post" class="d-inline-block  m-1">
                                            <input type="hidden" name="id"
                                            value="<?= $employe["id"]; ?>">
                                            <button class="btn btn-sm btn-danger" type="submit"> Delete<i class="  fa fa-trashe"></i>
                                            </button>
                                        </form>
                                    </td>
                                    
                                    
                                        <?php endforeach ;?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>