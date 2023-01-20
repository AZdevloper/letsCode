<?php 

class Article {

     static public function find($data){
          extract($data);
          $stmt= DB::connect()->prepare('SELECT  * FROM employees WHERE name LIKE ? ');
          $stmt->execute(array('%'.$search.'%'));
         return $stmt->fetchAll(PDO::FETCH_ASSOC);

       }
     static public function getAll(){
        $stmt= DB::connect()->prepare('SELECT articles.* , categories.category as category_name FROM articles INNER JOIN categories where articles.category_id=categories.id ORDER BY `category_name` ASC');
        $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    

     }

     static public function getSingleArticle($id){
          try {
               // $id = $data['id'];
               $stmt= DB::connect()->prepare('SELECT  * FROM articles WHERE id = ?');
               $stmt->execute(array($id));
              return $stmt->fetch(PDO::FETCH_OBJ);
          } catch (PDOException $ex) {
               return 'error' . $ex->getMessage();
          }
         
      
  
       }
     static public function add($data){

          //  die(print_r(extract($data)));
          // die(print_r($_POST["author"][0]));
          extract($data);


          $stmt= DB::connect()->prepare('INSERT INTO `articles`( `content`, `category_id`, `author`, `title`) VALUES (?,?,?,?)');
         $result = $stmt->execute(array($content, $category_id, $author, $title));
     //     $result->close();
     //     $result = null;
         return $result;
       }
     static public function update($data){
          try {
          extract($data);
          //   die(print_r($id));

          $stmt= DB::connect()->prepare("UPDATE `articles` SET `content`=?, `category_id`=?, `author`=?, `title`=? WHERE `id` =? ");
          return $stmt->execute(array($content, $category_id, $author, $title,$id));
          
          } catch (PDOException $ex) {
               
               // return 'error' . $ex->getMessage();
               return false;
          }
     }
     static public function delete($data){
          try {
          extract($data);
               // die(print_r($data));
          $stmt= DB::connect()->prepare('DELETE FROM `articles` WHERE `id`= ? ');
          $stmt->execute(array($id));
          return true;
          } catch (PDOException $ex) {
               
               // return 'error' . $ex->getMessage();
               return false;
          }
     }
}