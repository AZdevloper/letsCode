<?php 
class User{
    static public function login($data){
        try {
            extract($data);
            $stmt= DB::connect()->prepare('SELECT  * FROM user WHERE email = ?');
            $stmt->execute(array($email));
            // die(print_r($stmt->fetch(PDO::FETCH_OBJ)));
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
             return 'error' . $ex->getMessage();
        }
       
    

     }
    static public function createUser($data){
        extract($data);
        $stmt= DB::connect()->prepare('INSERT INTO `user`(`email`,`userName`, `passWord`) VALUES (?,?,?)');
       $result = $stmt->execute(array($email,$userName,$password));
   //     $result->close();
   //     $result = null;
       return $result;
    }
}
?>