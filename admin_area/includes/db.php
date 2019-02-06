<?php
  $con = mysqli_connect("us-cdbr-iron-east-03.cleardb.net","b28e95b30411f5","","heroku_49a2ff63108d5d8");

  if (mysqli_connect_errno()) {
    echo "Fail to connect to mysql: ".mysqli_connect_error();
  }
?>
