<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="mainBlock">



        <div class="menu">
            <center>
                <h3>IT Депортамент</h3></center>
            <?php
include 'functions/bd.php';
include 'menu.php';

?>

        </div>

        <div class="content">

            <?php

if (empty($_SESSION['user_id'])) {
 
    echo '<div class = "login"><center><h3>permission denied </h3></center></div> ';
    
}

elseif (empty($_SESSION['group'])){ 
    $user = $_SESSION['user_id'];
            $sql = "SELECT * FROM `users` WHERE `create_user` =  '".$_SESSION['user_name']."'";
           $result =  mysqli_query($conn,$sql);

    echo '<table class = "table table-striped"';
    while ($row = mysqli_fetch_array($result)) {
     
        echo '
        <tr>
        <td>'.$row[1].' '.$row[2].' '.$row[3].'</td>
        <td>'.$row[6].'</td>
        <td>'.$row[12].'</td>
        <td>'.$row[11].'</td>
        <td>'.$row[14].'</td>
        <td><form method="get" action="obr.php">
        
        <input type = "hidden" value = '.$row[0].' name="id">
        <input type= "submit" value = "просмотреть" class = "btn btn-mini btn-primary">
        </form>
        </td>
        </tr>
        ';
        
    }
    
    
}
elseif (($_SESSION['group'] == 'groupSysAdmins') or ($_SESSION['group'] == 'saarc')) {

    $user = $_SESSION['user_id'];
            $sql = "SELECT * FROM `users` WHERE 1";
           $result =  mysqli_query($conn,$sql);

    echo '<table class = "table table-striped"';
    while ($row = mysqli_fetch_array($result)) {
     
        echo '
        <tr>
        <td>'.$row[1].' '.$row[2].' '.$row[3].'</td>
        <td>'.$row[6].'</td>
        <td>'.$row[12].'</td>
        <td>'.$row[11].'</td>
        <td>'.$row[14].'</td>
        <td><form method="get" action="obr.php">
        
        <input type = "hidden" value = '.$row[0].' name="id">
        <input type= "submit" value = "просмотреть" class = "btn btn-mini btn-primary">
        </form>
        </td>
        </tr>
        ';
        
    }

}

?>


        </div>

    </div>


</body>

</html>