
<?php

    function is_admin($email,$password)
    {
        global $db;

        $a = [
            'email'     =>  $email,
            'password'  =>  sha1($password)
        ];
        
        $sql = "SELECT * FROM admins WHERE email = :email, password = :password";

        $req = $db->prepare($sql);

        $req->execute($a);

        //Savoir si l'utilisateur existe bien
        $exist = $req->rowCount($sql);
        
        return $exist;
    }

?>