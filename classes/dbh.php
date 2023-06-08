<?php

class Dbh{

    protected function connect()
    {
        try{
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=ooplogin', $username, $password);
            echo '<h1>success</h1>';
            return $dbh;

        }catch(PDOException $e){
            print "Error!" . $e->getMessage();
            die();
        }
    }


}


