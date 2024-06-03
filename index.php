<?php 
    $title = "";
    require ('db.php');
    require('TodoDataManager.php');
    $data_manager = new TodoDataManager($conn);
    require(__DIR__ . '/inc/header.php');
    
    $error = false;

    if(isset($_POST['update'])) {
        
        if($data_manager->update_task((int)$_POST['idtask']))
        {
            header("Location: /sample-site");
            exit;
        } else {
            $error = true;
        }
        
    }

    if(isset($_POST['delete'])) {
        
        if($data_manager->delete_task((int)$_POST['idtask']))
        {
            header("Location: /sample-site");
            exit;
        } else {
            $error = true;
        }
        
    }

    $data = $data_manager->select_all();
?>

<main>
    <div class="container">
        <h1 class="mb-4">Список дел</h1>
        <?php 
            if($error) {
                echo "<div class='pl-5 py-2 mb-4 bg-danger'>
                        <p class='text-light' >Ошибка</p>
                      </div>";
            }
            if(empty($data)) {
                echo '<p>Данных нет</p>';
            } else {
                echo '<div class="row">';
                foreach ($data as $item) {
                    $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $item['date_created']);

                        echo "<div class='col-3 my-2 card'>";
                            echo "<div class='card-body'>";
                                echo "<h5 class='card-title'>" . $item['title'] . "</h5>";
                                echo "<h6 class='card-subtitle mb-2 text-muted'>" . $dateTime->format("d-m-Y"). "</h6>";
                                if ($item['isCompleted']) {
                                    
                                    echo '<form action="" method="post">';
                                        echo '<input hidden name="idtask" value="' . $item['id'] .  '" />';
                                        echo "<button type='submit' name='delete' class='btn btn-danger'>Удалить задачу</button>";
                                    echo '</form>'; 
                                  
                                } else {
                                    echo '<form action="" method="post">';
                                        echo '<input hidden name="idtask" value="' . $item['id'] .  '" />';
                                        echo "<button type='submit' name='update' value='update' class='btn btn-success'>Пометить как выполнена</button>";
                                    echo '</form>';
                                }
                                
                            echo "</div>";
                        echo "</div>";
                    
                }
                echo "</div>";
            }
        ?>
    </div>
</main>

<?php 
    require_once(__DIR__ . '/inc/footer.php');
?>