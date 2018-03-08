
<?php
require_once "db.php";
$str = "";

try {

    $pdo = new DBMS();

    $dbList = $pdo->showDB();
    $pdo->selectDB('spring2018');
    if(isset($_POST['sql'])){
    $inputSql = htmlspecialchars($_POST['sql']);
    $pdo->inputQuery($inputSql);
    $str .= var_dump($pdo->inputQuery($inputSql));
    }

    $pdo->selectDB('spring2018');
  //  $pdo->inputQuery(htmlspecialchars($_POST['sql']));

    $pdo->disconnect();
}catch (PDOException $e){
    echo $e->getMessage();
}

require "header.php";

require "menu.php";

?>


<form action="top.php" method="post">
  <h2>SQL</h2>
    <input type="text" name="sql" class="input_sql" style="width:400px; height:300px; font-size:140%;"/>
    <input type="submit" />
</form>

<?php
//require "contents.php";


require "footer.php";
