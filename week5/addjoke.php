<?php
if(isset($_POST['joketext'])){
    try{
        include 'includes/DatabaseConnection.php';
        
        // Xử lý upload ảnh
        $imageName = null;
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            $allowedTypes = ['image/png', 'image/jpg'];
            $fileType = $_FILES['image']['type'];
            
            if(in_array($fileType, $allowedTypes)){
                $imageName = $_FILES['image']['name'];
                $uploadPath = 'images/' . $imageName;
                
                // Di chuyển file vào thư mục images
                if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)){
                    // Upload thành công
                } else {
                    throw new Exception('Failed to upload image');
                }
            } else {
                throw new Exception('Invalid image type');
            }
        }
        
        // Insert vào database với thông tin ảnh
        $sql = 'INSERT INTO joke SET
        joketext= :joketext,
        jokedate= CURDATE(),
        image= :image';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext'], PDO::PARAM_STR);
        $stmt->bindValue(':image', $imageName, PDO::PARAM_STR);
        $stmt->execute();
        header('Location: jokes.php');

    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Error adding joke: ' . $e->getMessage();
        
    }
}else{
    $title = 'Add a new joke';
    ob_start();
    include 'templates/addjoke.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>