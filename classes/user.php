<?php
require_once '../config/database.php';
class User {
     private $conn;

     //Constructor
     public function __construct(){
         $database = new Database();
         $db = $database->dbConnection();
         $this->conn = $db;
     }

     //Execute queries SQL
     public function runQuery($sql){
         $stat = $this->conn->prepare($sql);
         return $stat;
     }

     // Insert
     public function insert($name, $email, $password){
         try{
             $stmt = $this->conn->prepare("INSERT INTO users (name, email, password) VALUES(:name, :email, :password)");
             $stmt->binparam(":name", $name);
             $stmt->binparam(":email", $email);
             $stmt->binparam(":password", $password);
             $stmt->execute();
         }catch(PDOException $e){
             echo $e->getMessage();
         }
     }

     // Update
     public function update($name, $email, $password, $id){
        try{
            $stmt = $this->conn->prepare("UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id");
            $stmt->binparam(":name", $name);
            $stmt->binparam(":email", $email);
            $stmt->binparam(":password", $password);
            $stmt->binparam(":id", $id);
            $stmt->execute();
            return $stmt;
         }catch(PDOException $e){
             echo $e->getMessage();
         }
     }

     // Delete
     public function delete($id){
         try{
             $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
             $stmt->binparam(":id", $id);
             return $stmt;
         }catch(PDOException $e){
            echo $e->getMessage();
        }
     }

     // Redirect URL method
     public function redirect($url){
         header("Location: $url");
     }
}