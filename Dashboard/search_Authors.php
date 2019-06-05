 
 <?php
 
 include('../apps/config.php'); 

$searchTerm = $_GET['term'];

//get matched data from skills table
$data_vall1="";
$data_vall2="";
$query2 = "SELECT name FROM users WHERE name LIKE '%".$searchTerm."%'  ORDER BY id DESC LIMIT 7";
foreach($dbo->query($query2) as $rw)
{
	 $data_vall1 = $rw['name'];
	 if($data_vall1="")
	 {
		 // Do Nothing 
	 }else 
	 {
		 $data[] = $rw['name'];
	 }
	 
	//echo"<br>";
}
 
 

echo json_encode($data);

 
?>