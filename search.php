<?php
 include_once './db.php';
if(isset($_POST['submit'])){

  $name=$_POST['iskanje'];
  //connect  to the database
 // $db=mysql_connect  ("localhost", "root",  "") or die ('I cannot connect to the database  because: ' . mysql_error());
  //-select  the database to use
 // $mydb=mysql_select_db("mestna_obcina");
  //-query  the database table
  $sql="SELECT  * FROM poslovni_prostori WHERE lokacija LIKE '%" . $name .  "%' ";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   
    while($row = $result->fetch_assoc()) {
        $stanje  =$row['stanje'];
            $velikost=$row['velikost'];
            $lokacija=$row['lokacija'];
            $najemnina=$row['najemnina'];
            $opis=$row['opis'];
           $id=$row['id']; 
    }
}
else{
        echo 'no data';
}
        //$row = $result->fetch_assoc();
  /*$sql="SELECT  * FROM poslovni_prostori WHERE * LIKE '%" . $name .  "%' ";
  //-run  the query against the mysql query function
  $result=mysqli_query($sql);
  //-create  while loop and loop through result set
  while($row=mysql_fetch_array($result)){
         $stanje  =$row['stanje'];
            $velikost=$row['velikost'];
            $lokacija=$row['lokacija'];
            $najemnina=$row['najemnina'];
            $opis=$row['opis'];*/
  //-display the result of the array
  echo "<ul>\n";
  echo  "<li>" . "<a  href=\"search.php?id=$id\">"   .$stanje . " " . $velikost . " " . $lokacija. " " . $najemnina. " " . $opis.  "</a></li>\n";
  echo "</ul>";
  }
  
  else{
  echo  "<p>Please enter a search query</p>";
  }
  
  


/*if(isset($_GET['by'])){
$letter=$_GET['by'];
//connect  to the database
$db=mysql_connect  ("localhost", "",  "") or die ('I cannot connect to the database  because: ' . mysql_error());
//-select  the database to use
$mydb=mysql_select_db("mestna_obcina");
//-query  the database table
$sql="SELECT  id, * FROM poslovni_prostori WHERE * LIKE '%" . $letter . "%' OR LastName LIKE '%" . $letter ."%'";
//-run  the query against the mysql query function
$result=mysql_query($sql);
//-count  results
$numrows=mysql_num_rows($result);
echo  "<p>" .$numrows . " results found for " . $letter . "</p>";
//-create  while loop and loop through result set
while($row=mysql_fetch_array($result)){
$stanje  =$row['stanje'];
            $velikost=$row['velikost'];
            $lokacija=$row['lokacija'];
            $najemnina=$row['najemnina'];
            $opis=$row['opis'];
//-display  the result of the array
echo  "<ul>\n";
echo  "<li>" . "<a  href=\"search.php?id=$ID\">"   .$stanje . " " . $velikost . " " . $lokacija. " " . $najemnina. " " . $opis.  "</a></li>\n";
echo  "</ul>";
}
}*/