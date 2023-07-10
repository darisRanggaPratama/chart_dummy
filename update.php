<?php
$message = ""; // initial message 

// Include database connection
include "connect.php";

// Updating the table row with submited data according to rowid once form is submited 
if (isset($_POST['submit_data'])) {

	// Gets the data from post
	$id = $_POST['id'];
	$kode = $_POST['kode'];
	$bln = $_POST['bulan'];
	$gaji = $_POST['gaji'];
	$lembur = $_POST['lembur'];
	$tj_lain = $_POST['tj_lain'];
	$transfer = $_POST['transfer'];
	$hmn = $_POST['human'];

	// Makes query with post data
	$query = "UPDATE me_pst set
	kode='$kode', bln='$bln', gaji='$gaji', lembur='$lembur', tj_lain='$tj_lain',
	trf='$transfer', hmn='$hmn'
	WHERE id=$id";

	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $database comes from "connect.php"
	if (mysqli_query($connect, $query)) {
		$message = '<script>alert("Data is UPDATED successfully.")';
	} else {
		$message = '<script>alert("Sorry, Data is not updated.")';
	}

	echo $message;
	echo '<script> location.reload() </script>';
}

$id = $_GET['id']; // id from url
// Prepare the query to get the row data with rowid
$query = "SELECT * FROM me_pst WHERE id=$id";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);// set the row in $data
?>

<!DOCTYPE html>
<html>

<head>
	<title>Update Data</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

</head>

<body>
	<div style="width: 500px; margin: 20px auto;">
		<h1 style="text-align:center">UPDATE DATA</h1>		

		<table class="table table-bordered" width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="POST">
				<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
				<tr>
					<td>Kode</td>
					<td><input name="kode" type="text" class="form-control" value="<?php echo $data['kode']; ?>" required></td>
				</tr>
				<tr>
					<td>Bulan</td>
					<td><input name="bulan" type="text" class="form-control" value="<?php echo $data['bln']; ?>" required></td>
				</tr>
				<tr>
					<td>Gaji</td>
					<td><input name="gaji" type="text" class="form-control" value="<?php echo $data['gaji']; ?>" required></td>
				</tr>
				<tr>
					<td>Lembur</td>
					<td><input name="lembur" type="text" class="form-control" value="<?php echo $data['lembur']; ?>" required></td>
				</tr>
				<tr>
					<td>Tj Lain</td>
					<td><input name="tj_lain" type="text" class="form-control" value="<?php echo $data['tj_lain']; ?>" required></td>
				</tr>
				<tr>
					<td>Transfer</td>
					<td><input name="transfer" type="text" class="form-control" value="<?php echo $data['trf']; ?>" required></td>
				</tr>
				<tr>
					<td>Employee</td>
					<td><input name="human" type="text" class="form-control" value="<?php echo $data['hmn']; ?>" required></td>
				</tr>
				<tr>
					<td><a href="table.php" class="btn btn-sm btn-primary">View Data</a></td>
					<td style="text-align:right"><input name="submit_data" type="submit" class="btn btn-sm btn-primary" value="Update Data"></td>
				</tr>
			</form>
		</table>
	</div>

</body>

</html>