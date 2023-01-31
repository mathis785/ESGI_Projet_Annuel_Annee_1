<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;


        // constuction de la classe
    public function __construct(
        $dbname = "EWHOLE",
        $tablename = "producttb",
        $servername = "164.132.55.186",
        $username = "Admin",
        $password = "MDP.De.Qualite"
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // établir une connexion
        $this->con = mysqli_connect($servername, $username, $password);

        // vérifier la connexion
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // requete
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execution de la requete
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql pour creer une nouvelle table si elle n'existe pas
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             product_name VARCHAR (25) NOT NULL,
                             product_price INT,
                             product_image VARCHAR (100)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }

    // chercher les produits depuis la base de données
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}






