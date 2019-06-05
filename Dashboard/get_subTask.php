<?php
include('../apps/config.php');
if($_POST['id'])
{
	  $id=$_POST['id'];
	
	//$stmt = $dbo->prepare("SELECT * FROM project_inst_data WHERE project_id=:id AND instituterole='LIN'");
	$stmt = $dbo->prepare("SELECT task_name FROM task_list WHERE task_type='sub' AND associated='$id' ");
	$stmt->execute(array(':id' => $id));
	?><option selected="selected" value="">Select Sub-task :</option><?php
	$DD_89="";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		$DD_89 = $row['task_name'];
		if($DD_89=="")
		{
		}
		else
		{
			?>
		<option value="<?php echo $row['task_name']; ?>"><?php echo $row['task_name']; ?></option>
		<?php
		}
		
	}
}
?>