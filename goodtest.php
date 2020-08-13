<!DOCTYPE html>
<html>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "goodtest";
	

	$conn = mysqli_connect($servername, $username, $password, $db);
    

    $sql = "SELECT users.id, users.first_name, users.last_name, teams_users.team_id, teams.name, GROUP_CONCAT( teams.name ) as 'names' FROM users left join teams_users on users.id = teams_users.user_id left join teams on teams_users.team_id = teams.id group by users.id";
 	$result = $conn->query($sql);
 	while($row = $result->fetch_assoc()) {
		$users[] = array('id'=>$row["id"], 'Name'=>$row["first_name"]." ".$row["last_name"], 'Teams'=>$row["names"]);
	}



 	

?>

<head>
	<title>
		The Good Test
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<style>
		.centered {
    		margin-top: 5%;
		}
		.text {
  			margin-top: 10%;
		}
	</style>
</head>
<body>
	<div class="container text" style="text-align: center;">
		<h1>
			!!! Thank you for providing the test !!!
		</h1>
	</div>
	<div class="container centered">
		<table class="table table-bordered">
			<?php if(empty($users)) echo "There is No DATA. Please enter your data"; else { ?>
			<tr>
				<?php foreach($users[0] as $property=>$value){ ?>
			            <th class="col-sm" style="font-size: 30px"><?php echo $property; ?></th>
				<?php } ?>
			</tr>
			<?php foreach( $users as $id=>$row){ ?>
				<tr>
					<?php foreach($row as $property=>$value){ ?>
						<td class="col-sm" style="font-size: 20px">
							<?php echo $value; ?>
						</td>
					<?php }?>
				</tr>
		    <?php } ?>
			<?php } ?>
		</table>
	</div>
		
</body>
</html>





 	 		
