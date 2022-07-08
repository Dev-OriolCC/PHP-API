<?php
    // Stable connection to the database using PDO
    class Conectar {
        protected $dbhost; //

        // Function to connect to the database
        protected function connection() {
            try {
                $connect = $this->dbhost = new PDO("mysql:host=us-cdbr-east-06.cleardb.net; dbname=heroku_a117c8f96bd6c73", "b30590749404a6", "7702ea71");
                return $connect;
            }
            catch (Exception $e) {
                print"Error connecting to database: ".$e->getMessage()." <br>";
                die();
            }
        }

        //Function for convertion of special characters UTF8
        public function set_names() {
            return $this->dbhost->query("SET NAMES 'utf8'");
        }

    }

?>