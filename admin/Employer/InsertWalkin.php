<?php
if (!isset($_SESSION)) {
    session_start();
}

$txtTitle = $_POST['txtTitle'];
$txtTotal = $_POST['txtTotal'];
$cmbQual = $_POST['cmbQual'];
$txtDesc = $_POST['txtDesc'];
$txtDate = $_POST['txtDate'];
$txtTime = date("H:i:s", strtotime($_POST['txtTime'])); // Convert time to HH:MM:SS format
$Name = $_SESSION['Name'];

if ($cmbQual == "Other") {
    $cmbQual = $_POST['txtOther'];
}

// Establish Connection with MYSQL
$con = mysqli_connect("localhost", "root", "Atsql@801", "job");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Specify the query to Insert Record
$sql = "INSERT INTO walkin_master (CompanyName, JobTitle, Vacancy, MinQualification, Description, InterviewDate, InterviewTime) VALUES ('$Name', '$txtTitle', '$txtTotal', '$cmbQual', '$txtDesc', '$txtDate', '$txtTime')";

// Execute query
if (mysqli_query($con, $sql)) {
    echo '<script type="text/javascript">alert("Walkin Inserted Successfully");window.location=\'ManageWalkin.php\';</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close The Connection
mysqli_close($con);
?>
