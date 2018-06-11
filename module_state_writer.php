<?php  
  
    include_once('includes/pdo.inc.php');

    $module_status = 'SELECT * FROM moduliai ORDER BY id DESC LIMIT 1';
    $s = $pdo->prepare($module_status);
    $s->execute();
    $module = $s->fetch(PDO::FETCH_ASSOC);

    echo "something happened" . $module['status'];

        if( $module['status'] == 0 ){
            $file = fopen("json/module.json", "w") or die("can't open file");
            fwrite($file, '{"module": "on"}');
            fclose($file);

            $statement = $pdo->prepare("UPDATE moduliai   
            SET name = 'Module1',
                    status = 1,
                    statusname = 'Įjungtas'
            WHERE id = 1 ");
            $statement->execute();
            echo "done";

        } else if ($module['status'] == 1 ){  
            $file = fopen("json/module.json", "w") or die("can't open file");
            fwrite($file, '{"module": "off"}');
            fclose($file);


            $statement = $pdo->prepare("UPDATE moduliai   
            SET name = 'Module1',
                    status = 0,
                    statusname = 'Išjungtas'
            WHERE id = 1 ");
            $statement->execute();
            echo "done2";
        }

?>