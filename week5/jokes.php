<?php
try{
    include 'includes/DatabaseConnection.php';

    $sql = 'SELECT joketext, id, image FROM joke';
    $result = $pdo->query($sql);
    $jokes = $result->fetchAll(PDO::FETCH_ASSOC);
    $title = 'Joke List';

    ob_start();
    include'templates/jokes.html.php';
    $output = ob_get_clean();
}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Database error: ' .$e->getMessage();
}
include 'templates/layout.html.php';