<?php

// Disclaimer: some actions, like creating the databases and tables and populating them with data were done via PHPMyAdmin.

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

    <p>The headquarters of <?= $group["name"] ?> are in <?= $group["location"] ?></p>

<?php endforeach; ?>


<?php 

$sql = "SELECT name, email FROM learners WHERE ID=2";
$result = mysqli_query($conn, $sql);
$firstLearnerData = mysqli_fetch_all($result, MYSQLI_ASSOC);

$learnerName = $firstLearnerData[0]["name"];

echo "$learnerName is the first learner at BeCode.";
?>

<?php 

$sql = "UPDATE groups SET status='Delayed because a massive outubreak of shrimp food poisoning.' WHERE ID=2";
$conn->query($sql);

$sql = "SELECT * FROM groups WHERE status='Delayed because a massive outubreak of shrimp food poisoning.'";
$result = mysqli_query($conn, $sql);
$delayedGroupOriginalStartDate = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo "<p>The " . $delayedGroupOriginalStartDate[0]["name"] . " group originally started at " . $delayedGroupOriginalStartDate[0]["start_date"] . "</p>";

$updatedStartDate = date('Y-m-d', strtotime("+2 months", strtotime($delayedGroupOriginalStartDate[0]["start_date"])));

echo "<p>But because of unforseen circumstances, it now starts at $updatedStartDate.</p>";

$sql = "UPDATE groups SET start_date='$updatedStartDate' WHERE ID=1";

// $sql = "ALTER TABLE groups ADD status VARCHAR(1000) NOT NULL;";
// $conn->query($sql);

$sql = "DELETE FROM learners WHERE ID=1";
$conn->query($sql);

// $sql = "ALTER TABLE learners ADD COLUMN coach_id INT NOT NULL, ADD COLUMN group_id INT NOT NULL;";
// $conn->query($sql);

$sql = "UPDATE learners SET coach_id=2 WHERE ID=2";
$conn->query($sql);
$sql = "UPDATE learners SET coach_id=2 WHERE ID=3";
$conn->query($sql);
$sql = "UPDATE learners SET coach_id=1 WHERE ID=4";
$conn->query($sql);
$sql = "UPDATE learners SET group_id=1 WHERE ID=2";
$conn->query($sql);
$sql = "UPDATE learners SET group_id=1 WHERE ID=3";
$conn->query($sql);
$sql = "UPDATE learners SET group_id=1 WHERE ID=4";
$conn->query($sql);


$sql = "SELECT * FROM learners WHERE coach_id=1";
$result = mysqli_query($conn, $sql);
$allSiccoStudents = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM learners WHERE coach_id=2";
$result = mysqli_query($conn, $sql);
$allTimStudents = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT name FROM coaches WHERE ID=1";
$result = mysqli_query($conn, $sql);
$nameFirstCoach = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT name FROM coaches WHERE ID=2";
$result = mysqli_query($conn, $sql);
$nameSecondCoach = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT name FROM groups WHERE ID=1";
$result = mysqli_query($conn, $sql);
$nameFirstGroup = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT name FROM groups WHERE ID=2";
$result = mysqli_query($conn, $sql);
$nameSecondGroup = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>


<?php foreach($allSiccoStudents as $studentSicco): ?>

    <?php 
        $assignedCoach = $studentSicco["coach_id"] == 1 ? $nameFirstCoach[0]["name"] : $nameSecondCoach[0]["name"];
        $assignedGroup = $studentSicco["group_id"] == 1 ? $nameFirstGroup[0]["name"] : $nameSecondGroup[0]["name"];
    ?>

    <p><?= $studentSicco["name"] ?> has <?=$assignedCoach ?> as coach in group <?=$assignedGroup ?>.</p>

<?php endforeach; ?>


<?php foreach($allTimStudents as $studentTim): ?>

    <?php 
        $assignedCoach = $studentTim["coach_id"] == 1 ? $nameFirstCoach[0]["name"] : $nameSecondCoach[0]["name"];
        $assignedGroup = $studentTim["group_id"] == 1 ? $nameFirstGroup[0]["name"] : $nameSecondGroup[0]["name"];
    ?>

<p><?= $studentTim["name"] ?> has <?=$assignedCoach ?> as coach in group <?=$assignedGroup ?>.</p>

<?php endforeach; ?>


<?php 
    
    $sql = "SELECT id FROM groups WHERE status='Active'";
    $result = mysqli_query($conn, $sql);
    $activeGroups = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $activeGroupsId = $activeGroups[0]["id"];   

    $sql = "SELECT * FROM learners WHERE active=1 AND group_id=$activeGroupsId";
    $result = mysqli_query($conn, $sql);
    $activeLearners = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
?>

<?php foreach($activeLearners as $activeLearner): ?>

    <p><?= $activeLearner["name"] ?> is still learning at BeCode.</p>

<?php endforeach; ?>




