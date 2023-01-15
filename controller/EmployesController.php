<?php 
class EmployesController{

    public function findEmployes()
    {
        // $employes = Employe::find();
        if (!empty($_POST['search'])) {
            $data = array(
                'search' => $_POST['search']
            );

            $employes = Employe::find($data);
            if ($employes) {
                $_SESSION['crud_error'] = 'Process Success :)';
            }

            return $employes;   
        }
    }
    public function getAllEmployes(){
        $employes = Employe::getAll();

        return $employes;
    }
    public function getEmploye(){
        $employes = Employe::getSingelEmploye($_POST['id']);

        return $employes;
    }
    public function addEmployes(){
        if(!empty($_POST['name']) && !empty($_POST['status'])){
            $data = array(
                'name' => $_POST['name'] ,
                'status' => $_POST['status'] 
             );
           
             $result = Employe::add($data);
             if ($result) {
                Session::set('success', 'employe added');
                $_SESSION['add_error'] = 'row added successfully to databse';
                Redirect::to('home');

                
             }else {
               $_SESSION['add_error'] = 'unfortunlly row did not added  to databse :(';
               Redirect::to('home');                

             }
        }else {
            $_SESSION['add_error'] = 'plese fill all information ?';
            Redirect::to('home');                

        }

    }
    public function updateEmployes(){
        // die(print_r($_POST['status']));

        if(!empty($_POST['name']) ){
            // die(print_r($_POST['status']));
            $data = array(
                'id' => $_POST['id'] ,
                'name' => $_POST['name'] ,
                'status' => $_POST['status'] 
             );
           
             $result = Employe::update($data);
             if ($result) {
                Session::set('success', 'employe updated');
                 $_SESSION['crud_error'] = 'Process Success :)';
                 Redirect::to('home');                
                
             }else {
                 $_SESSION['crud_error'] = 'Process  failed :(';
                 Redirect::to('home');                

             }
        }else {
            $_SESSION['crud_error'] = 'please fill in the required information';
            Redirect::to('home');                

        }

    }
    public function deleteEmployes(){
        // die(print_r($_POST['status']));

        if(!empty($_POST['id']) ){
            // die(print_r($_POST['status']));
            $data = array(
                'id' => $_POST['id'] ,
              
             );
           
             $result = Employe::delete($data);
             if ($result) {
                Session::set('success', 'employe deleted');

                 $_SESSION['crud_error'] = 'Process Success :)';
                Redirect::to('home');                
             }else {
                 $_SESSION['crud_error'] = 'Process  failed :(';
                 Redirect::to('home');                

             }
        }else {
            $_SESSION['crud_error'] = 'please fill in the required information';
            Redirect::to('home');                

        }

    }



}