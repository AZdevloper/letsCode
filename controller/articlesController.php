<?php 
class articlesController{

    public function sortArticle()
    {
            $data = Article::getAll();
            if ($data) {
                $_SESSION['crud_error'] = 'Process Success :)';
            }
                 return $data;
    }
    public function findArticle()
    {
        if (!empty($_POST['search'])) {
            $data = array(
                'search' => $_POST['search']
            );
            $data = Article::find($data);
            return $data;   
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
    public function addArticle()
    {
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
                Session::set('success', 'article added');
                $_SESSION['add_error'] = 'row added successfully to databse';
                Redirect::to('home');
             }else {
               $_SESSION['add_error'] = 'unfortunlly row did not added  to databse :(';
               Redirect::to('home');                
             }
   
            }
    
    public function updateArticle()
    {
            $data = array(
                'content' => $_POST['content'],
                'id' => $_POST['id'],
                'category_id' => $_POST['category_id'],
                'author' => $_POST['author'],
                'title' => $_POST['title'],
            );
             $result = Article::update($data);
             if ($result) {
                Session::set('success', 'article updated');
                 Redirect::to('home');                
                
             }else {
            Session::set('success', 'article updated');
                 Redirect::to('home');                

             }
       

    }
    public function deleteArticle()
    {
        if(!empty($_POST['id']) ){
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
    public function getAllArticleStatistics()
    {
        $data = Article::statistics();
        return $data;
    }



}