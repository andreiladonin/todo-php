<?php 
    $title = "Добавить задачу - ";
    require ('../db.php');
    require('../TodoDataManager.php');
    $data_manager = new TodoDataManager($conn);
    require('../inc/header.php');
    
    if(isset($_POST['submit'])){
        $data_manager->insert_table(htmlspecialchars($_POST['title']));
        header("Location: /sample-site");
        exit;
    }
?>

<main>
    <div class="container">
        <h1 class="mb-4">Добавить задачу</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Задача</span>
            <input type="text" class="form-control" name="title" aria-label="Название задачи" aria-describedby="inputGroup-sizing-default">
            </div>
            <button class="btn btn-primary" name="submit" type="submit">Добавить</button>
        </form>
    </div>
</main>

<?php 
    require_once('../inc/footer.php');
?>