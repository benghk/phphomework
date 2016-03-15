<?php
    $return = $_POST;

    try {
      $dbconn = new PDO('mysql:host=localhost;dbname=phphomework','admin','admin');
      $stmt = $dbconn->prepare("INSERT INTO `CONTACTFORM` VALUES (:name, :email, :phone, :message)");
      $stmt->bindValue(':name', $return["sender_name"]);
      $stmt->bindValue(':email', $return["sender_email"]);
      $stmt->bindValue(':phone', $return["sender_phone"]);
      $stmt->bindValue(':message', $return["sender_message"]);
      $stmt->execute();
      $response = 'Contact form saved';
    } catch (PDOException $e) {
      $response = array('fail'=>'Unable to save contact form');
    }
    echo json_encode($response);
?>
