<?php
    // require('DB.php');
    session_start();
    class User extends DB
    {
        public string $username;
        public string $password;


        public function __construct($username, $password)
        {
            // $this->user_id = $user_id;
            $this->username = $username;
            $this->password = $password;
         
            // $this->email = $email;
        }

        public function addUser(){
        
            DB::getInstance()->exec("INSERT INTO user (username,password) VALUES ('$this->username', '$this->password')");
            
        }
        public function login($username,$password){
            $sql = DB::getInstance()->prepare("SELECT * FROM user WHERE username='$username' and  password='$password'");
            $gd =$sql->execute();
            $fg  =$sql -> setFetchMode(PDO::FETCH_ASSOC);
         
            foreach(new RecursiveArrayIterator($sql->fetchAll()) as $k => $v){
                // echo $k;
                // echo $v['password'];
            }
            if($v){ 
                if($v['username']==$username && $v['password'] == $password){
                    array_push($_SESSION['login'],$v['username']);
                    // array_push($_SESSION['login'],$v['password']);
                    // array_push($_SESSION['login'],$v['authen']);
                    header('location:index.php');
                }
         

            }
            else{
                echo "authentication problem please check email and password!";
            }
            
        }
    }
?>