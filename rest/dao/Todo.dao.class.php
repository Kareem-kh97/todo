<?php

class TodoDao{
// in the constructre create connection to the database
  private $conn;

  /*
  *constructor of dao class
  */
  public function_construct(){
    $servername = "localhost"; // our server is our localhost
    $username = "todo";
    $password = "root";
    $schema = "todo";

    $this->$conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    $this->$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }

  /*
  * update todo record
  */
  public function update($id, $description, $created){
    $stmt = $this->conn->("UPDATE todos SET description=:'$description', created=:'$created', WHERE id = $id");
    $stmt->execute();
  }

  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM todos WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
  public function add($description, $created){
    $stmt = $this->conn->("INSERT INTO todos (description, created) VALUES ('$description, '2022-10-10 10:00:00')");
    $stmt->execute();
  }
}

?>
