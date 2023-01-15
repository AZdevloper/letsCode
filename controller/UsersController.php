<?php
class UsersController
{
    static public function logout(){
        session_destroy();
    }
    public function register()
    {
        if (true) {

            $options = [
                'cost' => 12
            ];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

                $data = array(
                    'email' => $_POST['email'] ,
                    'password' => $password 
                );
                $result = User::createUser($data);
                if ($result) {
                    Session::set('success', 'user added');
                    Redirect::to('home');

                    
                }else {
                Redirect::to('home');                

                }

        }

    }
    public function auth(){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $data = array(
                'email' => $_POST['email'] ,
                'password' => $_POST['password'] 
             );
           
             $result = User::login($data);
             if ($result->userName === $_POST['email'] && password_verify($_POST['password'],$result->passWord) ) {
                $_SESSION['logged'] = true;
                $_SESSION['username'] = $result->userName;
                Session::set('success', 'welcome back :'.$result->userName);
                // $_SESSION['add_error'] = 'row added successfully to databse';
                Redirect::to('home');

                
             }else {
            //    $_SESSION['add_error'] = 'unfortunlly row did not added  to databse :(';
            Session::set('error', 'wrong information ');
            Redirect::to('login');                

             }
        }else {
            // $_SESSION['add_error'] = 'plese fill all information ?';
            Session::set('info', 'plese fill all information ?');

            Redirect::to('login');                

        }
    }
}


?>