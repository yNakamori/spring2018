<?php

define("DNS","mysql:localhost;charset=utf8");
define("USER","root");
define("PASS","");

class DBMS
{

//    private const DNS = 'mysql:charset=utf8';
//    private const USER = 'root';
//    private const PASS = '';
//    private const OPTIONS = array(
//        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//    );

//    private $pdo;

    function __construct()
    {
        $this->pdo = new PDO(DNS, USER, PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,));

    }

    public function disConnect()
    {
        $this->pdo = null;
    }

    public function selectDB($dbname)
    {
      //  $stmt =$this->pdo->exec("use ".$dbname);
        $stmt = $this->pdo->prepare("USE $dbname");
        return $stmt->execute();

    }

    public function createDB($database)
    {
        $stmt = $this->pdo->query("CREATE DATABASE $database");
        $stmt = null;
    }

    public function dropDB($database)
    {
        $stmt = $this->pdo->query("DROP DATABASE $database");
        $stmt = null;
    }

    public function select($table, $columnArray){
      // $id_list = array('1','2');
      // var_dump($column);
      $sql = 'SELECT * FROM '.$table.' where';
      $sql .= ' id IN("'.implode('","',$columnArray).'")';
      $stmt = $this->pdo->query($sql);
    }

    public function selectAll($table)
    {
        $stmt = $this->pdo->query("SELECT * FROM $table");
//        $stmt = $this->pdo->prepare('select * from test WHERE id=?');
//        $stmt->execute(array($table));
//        while ($row = $stmt->fetch()) {
//            echo $row['id'] . ":" . $row['name'] . "<br>";
//        }
        // foreach ($stmt->fetchAll() as $key => $row){
        //     echo $row['id'].":".$row['name']."<br>";
        //
        // }
//        header("Content-type: application/json;charset=utf8");
//        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

        $stmt = null;
    }

    public function createTable($table, $columnArray)
    {
      $columnArray = array('id', 'int');
        $sql = 'CREATE TABLE '.$table;
        $in = implode(' ',$columnArray);
        $sql .='(' .$in. ')';
        $stmt = $this->pdo->query($sql);

        $stmt = null;
    }

    public function delete($table, $columnArray)
    {
      $split = explode(' ', $columnArray);
      $in = implode(' ',$split);
      $sql = 'DELETE FROM '.$table.' WHERE ';
      $sql .='' .$in. '';

      $stmt = $this->pdo->query($sql);
    //  var_dump($stmt);

      $stmt = null;
    }

    public function update($table, $setData, $columnArray){

      $split = explode(' ', $columnArray);
      $in = implode(' ',$split);
      $sql = 'UPDATE '.$table.' SET '.$setData.' WHERE '.$columnArray;
      echo $sql;
      $stmt = $stmt = $this->pdo->query($sql);
      $stmt = null;

    }

    public function showDB(){
        $stmt = $this->pdo->query("SHOW DATABASES");
        // foreach ($stmt->fetchAll() as $key => $row){
        //     echo $row['Database']."<br>";
        // }
        return $stmt;

          $stmt = null;
    }

    public function showTable($database){
        $stmt = $this->pdo->query("SHOW TABLES FROM $database");
        // foreach ($stmt->fetchAll() as $key => $row){
        //     echo $row['Tables_in_'.$database]."<br>";
        // }
        return $stmt;
        $stmt = null;

    }

    public function inputQuery($inputSql){
      $stmt = $this->pdo->query("$inputSql");
      $stmt->fetchAll();
      $stmt->closeCursor();
      return $stmt;
      $stmt = null;
    }

}
