<?php
class Login_Model extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function run(){
        $sth = $this->db->prepare("SELECT id FROM users WHERE
                                    login = :login AND password = MD5(:password)");
        $sth->execute(Array(
            ':login'    => $_POST['login'],
            ':password' => $_POST['password']
        ));

//            print_r($sth->rowCount());
        $count = $sth->rowCount();
        if($count > 0){
//            login
            Session::init();
            Session::set('loggedIn', true);
            header('location: ../dashboard');
        }else{
//            error
            header('location: ../login');
        }
    }

}