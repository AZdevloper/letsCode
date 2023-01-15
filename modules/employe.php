<?php 

class Employe {

     static public function find($data){
          extract($data);
          $stmt= DB::connect()->prepare('SELECT  * FROM employees WHERE name LIKE ? ');
          $stmt->execute(array('%'.$search.'%'));
         return $stmt->fetchAll(PDO::FETCH_ASSOC);

       }
     static public function getAll(){
        $stmt= DB::connect()->prepare('SELECT  * FROM employees');
        $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
    

     }

     static public function getSingelEmploye($id){
          try {
               // $id = $data['id'];
               $stmt= DB::connect()->prepare('SELECT  * FROM employees WHERE id = ?');
               $stmt->execute(array($id));
              return $stmt->fetch(PDO::FETCH_OBJ);
          } catch (PDOException $ex) {
               return 'error' . $ex->getMessage();
          }
         
      
  
       }
     static public function add($data){
          extract($data);
          $stmt= DB::connect()->prepare('INSERT INTO `employees`(`name`, `status`) VALUES (?,?)');
         $result = $stmt->execute(array($name,$status));
     //     $result->close();
     //     $result = null;
         return $result;
       }
     static public function update($data){
          try {
          extract($data);
          $stmt= DB::connect()->prepare("UPDATE `employees` SET `name`=?,`status`=? WHERE `id`= ? ");
          $stmt->execute(array($name,$status,$id));
          return true;
          } catch (PDOException $ex) {
               
               // return 'error' . $ex->getMessage();
               return false;
          }
     }
     static public function delete($data){
          try {
          extract($data);
          $stmt= DB::connect()->prepare("DELETE FROM `employees` WHERE `id`= ? ");
          $stmt->execute(array($id));
          return true;
          } catch (PDOException $ex) {
               
               // return 'error' . $ex->getMessage();
               return false;
          }
     }
}