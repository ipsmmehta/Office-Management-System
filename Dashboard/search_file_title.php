 
 <?php
 
 include('../apps/config.php'); 

$searchTerm = $_GET['term'];

//get matched data from skills table
$data_vall1="";
$data_vall2="";
$query2 = "SELECT distinct doc_title FROM dms_data WHERE doc_title LIKE '%".$searchTerm."%'  ORDER BY id DESC LIMIT 7";
foreach($dbo->query($query2) as $rw)
{
	 $data_vall1 = $rw['doc_title'];
	 if($data_vall1="")
	 {
		 // Do Nothing 
	 }else 
	 {
		 $data[] = $rw['doc_title'];
	 }
	 
	//echo"<br>";
}
 
 

echo json_encode($data);

 
?>