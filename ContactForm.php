<?php
  $return = $_POST;

  try {
    $dbconn = new PDO('mysql:host=localhost;dbname=phphomework','admin','admin');
    $stmt = $dbconn->prepare("INSERT INTO
                              CONTACTFORM (NAME, EMAIL, PHONE, MESSAGE, RECEIVED)
                              VALUES (:name, :email, :phone, :message, :received)");
    $stmt->bindParam(':name', $return["sender_name"]);
    $stmt->bindParam(':email', $return["sender_email"]);
    $stmt->bindParam(':phone', $return["sender_phone"]);
    $stmt->bindParam(':message', $return["sender_message"]);
    $stmt->bindParam(':received', $return["sender_time"]);
    $stmt->execute();
    error_log('Executed statement: '
                .'INSERT INTO CONTACTFORM(name, email, phone, message, received) VALUES ('
                .'\''.$return["sender_name"].'\','
                .'\''.$return["sender_email"].'\','
                .'\''.$return["sender_phone"].'\','
                .'\''.$return["sender_message"].'\','
                .'\''.$return["sender_time"].'\''
              .')');

    $response = 'Contact form saved';
  } catch (PDOException $e) {
    error_log($e);
    $response = $e.getMessage();
  }

  echo json_encode($response);
?>
