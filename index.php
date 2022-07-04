<?php

define("DB_HOST", "phpprojects.dev");
define("DB_USER", "jelle");
define("DB_PASS", "shrimp123");
define("DB_NAME", "becode");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM groups";
$result = mysqli_query($conn, $sql);
$groups = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php foreach($groups as $group): ?>

    <p><?= $group["name"] ?> is active in <?= $group["location"] ?></p>

<?php endforeach; ?>


<?php 

$sql = "SELECT name, email FROM learners WHERE ID=1";
$result = mysqli_query($conn, $sql);
$firstLearnerData = mysqli_fetch_all($result, MYSQLI_ASSOC);

$learnerName = $firstLearnerData[0]["name"];

echo "$learnerName is the first learner at BeCode.";
?>

<?php 

$sql = "SELECT start_date FROM groups WHERE ID=1";
$result = mysqli_query($conn, $sql);
$firstGroupOriginalStartDate = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo "<p>The Becode course originally started at " . $firstGroupOriginalStartDate[0]["start_date"] . "</p>";

$updatedStartDate = date('Y-m-d', strtotime("+2 months", strtotime($firstGroupOriginalStartDate[0]["start_date"])));

echo "<p>But because of unforseen circumstances, it now starts at $updatedStartDate.</p>";
