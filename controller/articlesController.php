<?php 
class articlesController{

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
    public function getAllArticles(){
        $articales = Article::getAll();

        return $articales;
    }
    public function getArticle(){
        $article = Article::getSingleArticle($_POST['id']);

        return $article;
    }
    public function addArticle(){
        // die(print_r($_POST["author"][0]));
        // 'title' => $_POST['title'][$i],
        //             'created_date' => $_POST['created_date'][$i],

            for ($i=0; $i <sizeof($_POST["author"]) ; $i++) {
                $data = array(
                    'content' => $_POST['content'][$i],
                    'category_id' => $_POST['category_id'][$i],
                    'author' => $_POST['author'][$i],
                    'title' => $_POST['title'][$i],

                    

                );
                $result = Article::add($data);
            }
           
           
             if ($result) {
                Session::set('success', 'employe added');
                $_SESSION['add_error'] = 'row added successfully to databse';
                Redirect::to('home');

                
             }else {
               $_SESSION['add_error'] = 'unfortunlly row did not added  to databse :(';
               Redirect::to('home');                

             }
   
            }
    
    public function updateArticle(){
            // die(print_r($_POST['id']));

        
            // die(print_r($_POST['status']));
            $data = array(
                'content' => $_POST['content'],
                'id' => $_POST['id'],
                'category_id' => $_POST['category_id'],
                'author' => $_POST['author'],
                'title' => $_POST['title'],
            );
            // die(print_r($_POST['id']));
           
             $result = Article::update($data);
             if ($result) {
                Session::set('success', 'employe updated');
                //  $_SESSION['crud_error'] = 'Process Success :)';
                 Redirect::to('home');                
                
             }else {
            Session::set('success', 'employe updated');
                 Redirect::to('home');                

             }
       

    }
    public function deleteArticle(){
        // die(print_r($_POST['id']));

        if(!empty($_POST['id']) ){
            // die(print_r($_POST['status']));
            $data = array(
                'id' => $_POST['id'] ,
              
             );
            
             $result = Article::delete($data);
             if ($result) {
                Session::set('success', 'article deleted');

                $_SESSION['crud_error'] = 'Process Success :)';
                Redirect::to('home');                
             }else {
                 $_SESSION['crud_error'] = 'Process  failed :(';
                 Redirect::to('home');                

             }
        } else {
            $_SESSION['crud_error'] = 'Process  failed :(';
            Redirect::to('home');
        }

    }



}