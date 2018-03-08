<!-- DBテスト用 -->
<?php
require_once "db.php";

try {

    $pdo = new DBMS();
  $pdo->selectDB('spring2018');

    //$pdo->selectAll('test');

    $pdo->showDB();
    //$pdo->showTable('spring2018');

    // $columnArray = array('1','2');
    // $pdo->select('test',$columnArray);
    // $columnArray = array('id','int');
    //$pdo->update('test', 'name = "tomato"', 'id = 2');
    // $columnArray = array('id','int');
    // $pdo->createTable('spring2018.test2',$columnArray);
    //$pdo->delete('test',"id = 1");
    //$pdo->update('test', 'name = "tomato"', 'id = 2');
    $pdo->disconnect();
}catch (PDOException $e){
    echo $e->getMessage();
}

?>
