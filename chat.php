<?php
  include 'db.php';
  $query = "SELECT * FROM chat ORDER BY id DESC LIMIT 30";
  $run = $con->query($query);

  while($row = $run->fetch_array()) :
?>
<div id="chat_data">
  <span style="color:green;"><?php echo $row['name']; ?></span>:
  <span style="float:right;"><?php echo formatDate($row['date']); ?></span>
  <textarea style="color:brown; margin-left:5px; border: 0px; background: white; text-align: center" disabled="disabled"><?php echo $row['msgs']; ?></textarea>
</div>
<?php endwhile; ?>
