
  <?php
    session_start();
    if (!isset($_SESSION['u_id'])){
      header("Location: index.php");
    }
  
    include_once('includes/pdo.inc.php');
  ?>
  <div class="container-fluid temp-block">
    <h2>Kambario temperatura</h2>

    <table class="table table-dark">
    <thead>
      <tr>
        <th>Data</th>
        <th>Laikas</th>
        <th>Temperatura</th>
      </tr>
    </thead>
      <tbody>
        <tr>
        <?php
            $limit = 10;
            $query = "SELECT * FROM kambarys1_temp";
            $s = $pdo->prepare($query);
            $s->execute();
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);
            if (!isset($_GET['page'])) {
                $page = 1;
            } else{
                $page = $_GET['page'];
            }
            $starting_limit = ($page-1) * $limit;
            $show  = "SELECT * FROM kambarys1_temp ORDER BY id DESC LIMIT $starting_limit, 
                                $limit";
            $stmt = $pdo->query($show);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
                    echo '<tr class="table-row-width">' .
                   /* '<td>' . $row['id'] . '</td>' . */
                    '<td>' . $row['logdate'] . '</td>' .
                    '<td>' . $row['logtime'] . '</td>' .
                    '<td>' . $row['temp'] . '</td>';
            
            ?>
            <?php 
            endwhile;
            ?>
        </tr>
      </tbody>    
    </table>
    
    <ul class="pagination pagination-sm pagination-color-dark justify-content-end pag-mine">
    <?php
        for ($i=1; $i <= $total_pages ; $i++):
    ?>
    <?php
    echo '<li class="page-item"><a class="page-link " href="?main=temp&page='.$i.'"';
        if ($i==$page)  echo ' class="abold"';
    echo '>'.$i.'</a></li>'; 
    ?>
    <?php 
        endfor; 
    ?>
    </ul>
  </div>