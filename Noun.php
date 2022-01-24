

<DOCKTYPE HTML>
    <!DOCTYPE html>
    <head>
        <title>
            searches  word
        </title>
        <style type="text/css">
.td
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
     body{
        text-align: center;
     }
       
        </style>
         </head>
    <body>
        <form name="getnoun" method="post" action="Noun.php">
    <table>
        <tr>
            <td class="td">
                Search Button
            </td>
            <td >
                <input class="" type="text" name="var"  placeholder="Search">
            </td>
             
            <td class="td">
                <a href="index.php">Insert Word</a>
            </td>

        </tr>
    </table>
    <p><h1>Translation Button<h1></p>
     <INPUT type="submit" name="ran" value="Retrieve" class="td">
     <input type="submit" name="kin" value="Kinyarwanda" class="td">
    <input type="submit" name="eng" value="English" class="td">
    <input type="submit" name="fren" value="French" class="td">
    <input type="submit" name="kisw" value="Kiswahili" class="td">
       </form>
    </body>
  </html>

<?php
$con= new mysqli("localhost","root","","PHP");
$query ="SELECT Kinyarwanda FROM noun_translation ORDER BY RAND() LIMIT 1";
    $word = filter_input(INPUT_POST, 'var');
    
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      ?>
<?php
    if (isset($_POST['ran'])) {
          $result = mysqli_query($con,$query );
          ?>
<TABLE class="td" >
    <tr class="td">
        <th bgcolor="red"> Random Word typed</th>
    </tr>
    <?php
          while ($row=  mysqli_fetch_array($result)) {
        print"<tr><td>";
echo $row['Kinyarwanda'];
echo "<br>";
print"</td></tr>";
    }
}
?>
    <?php
      if (isset($_POST['kin'])&& $word !=null){
          $result = mysqli_query($con, "SELECT Kinyarwanda FROM noun_translation
                WHERE Kinyarwanda LIKE '%{$word}%' OR English LIKE '%{$word}%' OR French LIKE '%{$word}' OR Kiswahili LIKE '%{$word}'");    
?>
<TABLE border ="2">
    <tr>
        <th bgcolor="blue"> IKinyarwanda</th>
    </tr>
<?php
    while ($row=  mysqli_fetch_array($result)) {
        print"<tr><td>";
echo $row['Kinyarwanda'];
echo "<br>";
print"</td></tr>";
        
    }
}

?>
    <?php
      if (isset ($_POST['eng']) && $word !=null) {
          $result = mysqli_query($con, "SELECT English FROM noun_translation
    WHERE Kinyarwanda LIKE '%{$word}%' OR English LIKE '%{$word}%' OR French LIKE '%{$word}' OR Kiswahili LIKE '%{$word}'");
    ?>
    <TABLE class="td">
    <tr class="td">
        <th bgcolor="blue"> Icyongereza </th>
    </tr>
    <?php
while ($row = mysqli_fetch_array($result))
{
    print"<tr><td>";
        echo $row['English'];
        echo "<br>";
        print"</td></tr>";
}
}
 
?>
    <?php
if (isset ($_POST['fren'])&& $word != NULL) {
    $result = mysqli_query($con, "SELECT French FROM noun_translation
    WHERE Kinyarwanda LIKE '%{$word}%' OR English LIKE '%{$word}%' OR French LIKE '%{$word}' OR Kiswahili LIKE '%{$word}'");
    ?>
    <TABLE  class="td">
    <tr class="td">
        <th bgcolor="blue"> Ikifaransa </th>
    </tr>
    <?php
while ($row = mysqli_fetch_array($result))
{
    print"<tr><td>";
echo $row['French'];
echo "<br>";
print"</td></tr>";
}
}
 
?>
    <?php
if (isset ($_POST['kisw']) && $word !=NULL) {
    $result = mysqli_query($con, "SELECT Kiswahili FROM noun_translation
    WHERE Kinyarwanda LIKE '%{$word}%' OR English LIKE '%{$word}%' OR French LIKE '%{$word}' OR Kiswahili LIKE '%{$word}'");
?>
    <TABLE class="td">
    <tr class="td">
        <th bgcolor="blue"> Ikiswahili </th>
    </tr>
    <?php
while ($row = mysqli_fetch_array($result))
{
    print"<tr><td>";
echo $row['Kiswahili'];
echo "<br>";
print"</td></tr>";
}
}
 
mysqli_close($con);
?>
 