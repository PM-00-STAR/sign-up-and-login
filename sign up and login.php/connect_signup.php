<?php
 $server="localhost";
 $user="root";
$password="";
$db = "signup";
$conn = mysqli_connect($server,$user,$password,$db);
  if ($conn){     ?>
    <script>
     echo("connected"); 
         </script> 
      <?php
        }
        else  {        ?>
    <script>
     alert("could not connect");  
       </script>
      <?php
              }


?>