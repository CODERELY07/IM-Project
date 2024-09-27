<?php
require_once './../../database/connect.php';

if (isset($_POST['departmentId'])) {
  
    $departmentId = htmlspecialchars($_POST['departmentId']);
    $sql = "SELECT * FROM program WHERE Department_Id = ?";
    $pdo_program = $pdo->prepare($sql);
    $pdo_program->execute([$departmentId]);
    
    // Fetch all programs
    $programs = $pdo_program->fetchAll();

    // Loop through the results and create options
    foreach ($programs as $program) {
        echo '<option value="' . $program['Program_Id'] . '">' . $program['Program_Name'] . '</option>';
    }
}
?>
