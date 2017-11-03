<?php
 include_once './db.php';
/* vars for export */
// database record to be exported
 /* $sql="SELECT  * FROM poslovni_prostori WHERE lokacija LIKE '%" . $name .  "%' ";
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
}*/
 
$db_record = 'poslovni_prostori';
// optional where query
//$where = 'WHERE 1 ORDER BY 1';
// filename for export
$csv_filename = 'db_export_'.$db_record.'_'.date('Y-m-d').'.csv';
// database variables
		
// create empty variable to be filled with export data
$csv_export = '';
// query to get data from database
$query="SELECT  * FROM ".$db_record." ";
//$query = mysqli_query("SELECT * FROM ".$db_record." ".$where);
$field = mysqli_num_fields($query);
// create line with field names
for($i = 0; $i < $field; $i++) {
  $csv_export.= mysqli_field_name($query,$i).';';
}
// newline (seems to work both on Linux & Windows servers)
$csv_export.= '
';
// loop through database query and fill export variable
while($row = mysqli_fetch_array($query)) {
  // create line with field values
  for($i = 0; $i < $field; $i++) {
    $csv_export.= '"'.$row[mysqli_field_name($query,$i)].'";';
  }	
  $csv_export.= '
';	
}
// Export the data and prompt a csv file for download
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo($csv_export);

location:('index.php');
?>