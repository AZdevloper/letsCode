<?php 

class Article {
     static public function statistics()
     { 
          $stmt = DB::connect()->prepare('SELECT  COUNT(*) as numberOfArticles FROM articles where user_id = ? ');
          $stmt->execute(array($_SESSION['userId']));
          $array = $stmt->fetch(PDO::FETCH_ASSOC);
          $stmt = DB::connect()->prepare('SELECT  COUNT(*) as numberOfUsers FROM user   ');
          $stmt->execute();
          $array += $stmt->fetch(PDO::FETCH_ASSOC);

          $stmt = DB::connect()->prepare('SELECT  COUNT(author) as numberOfAuthors FROM articles ');
          $stmt->execute();
          $array += $stmt->fetch(PDO::FETCH_ASSOC);
          return $array;
     }
     static public function find($data)
     {
          extract($data);
          $stmt= DB::connect()->prepare('SELECT  articles.*, categories.category as category_name  FROM articles INNER JOIN categories ON articles.category_id = categories.id WHERE title LIKE ? ');
          $stmt->execute(array('%'.$search.'%'));
         return $stmt->fetchAll(PDO::FETCH_ASSOC);

       }
     static public function getAll()
     {
          if (isset($_POST['sort'])) {
               $stmt = DB::connect()->prepare('SELECT * from articles where user_id = ? ORDER BY created_date');
               $stmt->execute(array($_SESSION['userId']));
               $article = $stmt->fetchAll(PDO::FETCH_ASSOC);

               $stmt = DB::connect()->prepare('SELECT * from categories');
               $stmt->execute();
               $categories =  $stmt->fetchAll(PDO::FETCH_ASSOC);

               for ($i = 0; $i < sizeof($categories); $i++) {
                    for ($j = 0; $j < sizeof($article); $j++) {
                         if ($categories[$i]['id'] == $article[$j]['category_id']) {
                              $article[$j]['category_name'] = $categories[$i]['category'];
                         }
                    }
               }
               return $article;

          }
        $stmt= DB::connect()->prepare('SELECT * from articles where user_id = ?;');
        $stmt->execute(array($_SESSION['userId']));
       $article = $stmt->fetchAll(PDO::FETCH_ASSOC);
          // die(print_r($article));

          $stmt = DB::connect()->prepare('SELECT * from categories');
          $stmt->execute();
          $categories =  $stmt->fetchAll(PDO::FETCH_ASSOC);

          for ($i = 0; $i < sizeof($categories); $i++) {
               for ($j = 0; $j < sizeof($article); $j++) {
                    if ($categories[$i]['id'] == $article[$j]['category_id']) {
                         $article[$j]['category_name'] = $categories[$i]['category'];
                         // $article[$j]['id'] = $article[$j]['id'];
                    }
               }
          }
          // die(print_r($article));
          return $article;
     }

     static public function getSingleArticle($id)
     {
          try {
               // $id = $data['id'];
               $stmt= DB::connect()->prepare('SELECT  * FROM articles WHERE id = ?');
               $stmt->execute(array($id));
              return $stmt->fetch(PDO::FETCH_OBJ);
          } catch (PDOException $ex) {
               return 'error' . $ex->getMessage();
          }
         
      
  
       }
     static public function add($data)
     {
          extract($data);

          $stmt= DB::connect()->prepare('INSERT INTO `articles`( `content`, `category_id`, `author`, `title`,`user_id`) VALUES (?,?,?,?,?)');
         $result = $stmt->execute(array($content, $category_id, $author, $title, $_SESSION['userId']));

         return $result;
       }
     static public function update($data)
     {
          try {
          extract($data);
          $stmt= DB::connect()->prepare("UPDATE `articles` SET `content`=?, `category_id`=?, `author`=?, `title`=? WHERE `id` =? ");
          return $stmt->execute(array($content, $category_id, $author, $title,$id)); 
          } catch (PDOException $ex) {
               return false;
          }
     }
     static public function delete($data){
          try {
          extract($data);
          $stmt= DB::connect()->prepare('DELETE FROM `articles` WHERE `id`= ? ');
          $stmt->execute(array($id));
          return true;
          } catch (PDOException $ex) {
               return false;
          }
     }
}