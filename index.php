<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chat App</title>
    <link rel="stylesheet" href="style.css" media="all" charset="utf-8"/>

    <script>
      function ajax() {

        //this is an object for sending ajax request
        var reg = new XMLHttpRequest();

        reg.onreadystatechange = function(){

        if(reg.readyState == 4 && reg.status == 200){
          document.getElementById('chat').innerHTML = reg.responseText;
        }
        }
        reg.open('GET','chat.php',true);
        reg.send();
      }
      //setting a time interval for our ajax function to run. 1seconds. which is written by 1000 miliseconds
      setInterval(function(){ajax()},1000)
      //this will automatically refresh the page, we'll not see anything and feel anything.
    </script>

  </head>
  <body onload="ajax();">
    <div id="container">
      <div id="chat_box">
        <div id="chat"></div>
      </div>
      <form class="" action="" method="post">
        <input type="text" name="name" placeholder="Enter name" required="required">
        <textarea name="msg" placeholder="Enter message" required="required"></textarea>
        <input type="submit" name="submit" value="Send it">
      </form>

      <?php
        if (isset($_POST['submit'])) {
          $name = $_POST['name'];
          $msg = $_POST['msg'];

          $query = "INSERT INTO chat (name,msgs) values ('$name','$msg')";
          $run = $con->query($query);

          if ($run) {
            echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
          }
        }
      ?>
    </div>
  </body>
</html>
