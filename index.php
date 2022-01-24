<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
         body  {
       background:grey;
       text-align: center;

     }
     .form
     {
        background-color:wheat;
        border: none;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        border-radius: 50px;

     }
     .td
     {
        background-color:black;
        border: none;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        border-radius: 50px;

     }
     .td:hover{
    background: #fff;
    color: #000;

}

.btntwo:hover{
    background: #fff;
    color: #000;

}
.btntwo{
    border-radius: 100px;
}

            

        </style>
    </head>
    <body>
        
        <form name="form" method="post" action="index.php" class="form">
             
                
                             Type any word
                        
                            <input class="td" type="text" name="Vname" required="true"><br>
                        
                         
                            Ikinyarwanda
                    
                            <input class="td" type="text" name="kin" required="true"><br>
                       
                        
                            English
                       
                            <input class="td" type="text" name="eng"  required="true"><br>
                         
                         
                            French
                        
                            <input class="td" type="text" name="fren" required="true"><br>
                         
                         
                            Kiswahili
                        
                            <input class="td" type="text" name="kisw" required="true"><br>
   
                            <input class="btntwo" type="submit" name="save" value="Submit">
            </form>
        
        <?php
        $noun = filter_input(INPUT_POST, 'Vname');
        $kin = filter_input(INPUT_POST, 'kin');
        $eng = filter_input(INPUT_POST, 'eng');
        $fren = filter_input(INPUT_POST, 'fren');
        $kisw = filter_input(INPUT_POST, 'kisw');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "PHP";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO noun_translation (V_Name ,Kinyarwanda ,English ,French ,Kiswahili)values ('$noun' ,'$kin' ,'$eng' ,'$fren' ,'$kisw')";
if (($sql)){
echo "";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}


?>
        
    </body>
</html>
