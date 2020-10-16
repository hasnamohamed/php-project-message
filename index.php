<?php include 'database.php' ; ?>
<?php
$query="SELECT * FROM shouts ORDER BY id DESC";//order to make the recent in the top
$shouts=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>SHOUT IT!</title>
    <link rel="stylesheet" href="stle.css" type="text/css">
</head>
<body>
    <div id="container">
    <header>
        <h1>SHOUT IT! SHOUTBOX</h1>
    </header>
    <div id="shouts">
     <ul>
     <?php
     while($row=mysqli_fetch_assoc($shouts)):?>
        <li class="shout"> <span><?php echo $row['time'] ?>-</span><strong><?php echo $row['user'] ?></strong>: <?php echo $row['message'] ?> </li>
     <?php endwhile; ?> 
     </ul>
    </div>
    <div id="input">
        <?php if(isset($_GET['error'])): ?>
            <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
     <form method="post" action="process.php">
         <input type="text" name="user" placeholder="Enter Your Name">
         <input type="text" name="message" placeholder="Enter A Message"><br>
         <input type="submit" class="shout-btn" name="submit" value="Shout It Out">

     </form>
    </div>
    </div>
</body>
</html>