<?php
try {
    $pdo = new PDO('mysql:host=localhost;port=8889;dbname=course_management', 'shymachine', 'universityofhope');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected Successfully";
} catch(PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}
?>
