<?php 
class User{
    static public function login($data){
        try {
            extract($data);
            $stmt= DB::connect()->prepare('SELECT  * FROM users WHERE userName = ?');
            $stmt->execute(array($email));
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
             return 'error' . $ex->getMessage();
        }
       
    

     }
    static public function createUser($data){
        extract($data);
        $stmt= DB::connect()->prepare('INSERT INTO `users`(`userName`, `passWord`) VALUES (?,?)');
       $result = $stmt->execute(array($email,$password));
   //     $result->close();
   //     $result = null;
       return $result;
    }
}
?>