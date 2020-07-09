<?php 
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $user_message = $_POST['user_message'];

  if(mail('nachokouchen@gmail.com', $user_name, $user_message)){

      echo "enviado";
  }else{
      echo "no se pudo";
  }

  ?>
