
<aside class="sidebar">
  <div id="leftside-navigation" class="nano">
    <ul class="nano-content">
      <li>
        <a href=""><span>Databases</span></a>
      </li>
      <?php
// DB一覧の表示
  foreach ($dbList->fetchAll()as $key => $row){
       echo '<li class="sub-menu">
         <a href="javascript:void(0);"><span>'.$row['Database'].'</span><i class="arrow fa fa-angle-right pull-right"></i></a>';
      //DBのテーブル一覧の表示
      // if($pdo->showTable($row['Database'])->fetchAll() != null){
      //    foreach ($pdo->showTable($row['Database'])->fetchAll() as $key2 => $value) {
      //      echo "<ul>";
      //      // echo '<li><a href="">'.$value['Tables_in_'.$row['Database']].'</a></li>';
      //     // echo "ok";
      //       echo '<li><a href="">'.$value['Tables_in_'.$row['Database']].'</a></li>';
      //       echo "</ul>";
      //    //    var_dump($value['Tables_in_'.$row['Database']]);
      //   }
      // }
         echo "</li>";
  }
       ?>
      
  </div>
</aside>
