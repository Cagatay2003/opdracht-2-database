<?php 

class Database {


      public $pdo;

      public function __construct($db="test" , $user="root" , $pass="" , $host="localhost:3307")   {

        try { 

              $this->pdo = new PDO ("mysql:host=$host;dbname=$db", $user, $pass);
              $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              echo "connected to database $db";
        }    catch(PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
        }
      }
        public function insertUser($email, $password)
        {
            $sql = "INSERT INTO users VALUES (null, :email, :password)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'email' => $email,
                'password' => $password
            ]);
        }

      
     }

   $database = new Database();
?>