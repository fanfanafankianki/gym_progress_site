<?php
require('db.php');
logowanie => user
function getTrainingHistoryByUserId($profile_id) {
  $conn = connectToDb();
  $query = "SELECT TrainingHistory.*, UserProfiles.profile_id,  FROM TrainingHistory INNER JOIN TrainingWithExercises ON TrainingHistory.training_with_exercises_id = TrainingWithExercises.training_with_exercises_id INNER JOIN Trainings ON TrainingWithExercises.training_id = Trainings.training_id INNER JOIN UserProfiles ON Trainings.profile_id = UserProfiles.profile_id WHERE UserProfiles.profile_id = $profile_id and user= ten cos sie zalogował";
  $result = mysqli_query($conn, $query);
  $trainingHistoryData = "";
  while ($record = mysqli_fetch_assoc($result)) {
    $training_history_id = $record["training_history_id"];
    $training_with_exercises_id = $record["training_with_exercises_id"];
    $training_date = $record["training_date"];
    $profile_id = $record["profile_id"];
	echo "<a onclick='showTrainingHistoryDetails(" . $training_history_id . ")' href='#' class='css-bar-item css-button'>Trening: " . $training_date . "</a><br>";
  }
  mysqli_close($conn);
}

$profile_id = $_POST["profile_id"];
getTrainingHistoryByUserId($profile_id);
?>

