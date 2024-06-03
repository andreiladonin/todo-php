<?php
    $config = parse_ini_file(__DIR__ . '\\config.ini', true);

    $conn = new mysqli(
        $config['database']['hostname'],
        $config['database']['username'],
        $config['database']['password'],
        $config['database']['db_name']
    );

    /* echo var_dump($conn); */
    if($conn->connect_error){
        exit("Ошибка: " . $conn->connect_error);
    }
    /*     
        $sql_create = 'CREATE DATABASE IF NOT EXISTS todo_db';

        if ($conn->query($sql_create)) {
            echo 'database created';
        } else {
            echo 'database was not created';
        }
     */
?>