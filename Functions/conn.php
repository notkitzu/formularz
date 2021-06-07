<?php

class DataBase{

    public $con;
    public $error;
    
    
    public function __construct()
    {

            try{
                $this->con = new PDO("mysql:host=localhost;dbname=users", "root", "");
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo 'Coś poszło nie tak' .$e->getMessage();
            }

    }

    public function required_validation($field){
        $count = 0;

        foreach($field as $k => $v)
        {
            if(empty($v))
            {
                $count++;
                $this->error.="<p>".$k." jest wymagany</p>";
            }
        }

        if($count == 0)
        {
            return true;
        }
    }


    public function can_login($table_name, $field)
    {

        $login = $field['login'];
        $password = $field['password'];
        $decryptedpwd = md5($password);

        
  
                $stmt = $this->con->prepare("SELECT * FROM $table_name WHERE login = :login AND password = :password");
                $stmt ->bindParam(':login', $login, PDO::PARAM_STR);
                $stmt ->bindParam(':password', $decryptedpwd, PDO::PARAM_STR);
                $stmt ->execute();
                if($stmt->rowCount() <= 0)
                {
                    $this->error = "POPRAW";
                }
                
                else

                {
                    return true;
                }
        
    }

    public function checkRole($login) {
        $stmt = $this->con->prepare("SELECT roles.role FROM roles JOIN user ON user.role = roles.id WHERE user.login = :login");
        $stmt -> bindParam(":login", $login, PDO::PARAM_STR);
        $stmt -> execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            switch($row['role']) {
                case 'admin':
                    return $_SESSION['login'] = 'admin';
                    break;
                case 'editor':
                    return $_SESSION['login'] = 'editor';
                    break;
                case 'user':
                    return $_SESSION['login'] = 'user';
                    break;
            }
        }
    }

}

?>