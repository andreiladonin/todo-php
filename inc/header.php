
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo '/sample-site/node_modules/bootstrap/dist/css/bootstrap.min.css' ?>">
    <title><?php echo $title; ?> Список дел</title>
</head>
<body>
    <header class="mb-4">
      <nav class="navbar  navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a class="text-light navbar-brand" href="/sample-site/index.php">Список дел</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="text-light nav-link active" aria-current="page" href="<?php echo '/sample-site/pages/add-task.php' ?>">Создать задачу</a>
            </div>
          </div>
        </div>
      </nav>
    </header>
