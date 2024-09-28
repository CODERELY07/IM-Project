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

// if(isset($_POST['programId'])){
//     $programId = htmlspecialchars($_POST['programId']);
//     echo $programId;
//     $sql = "SELECT * FROM sections WHERE Program_Id = ?";
//     $pdo_section = $pdo->prepare($sql);

//     $pdo_section->execute([$programId]);
//     $sections = $pdo_section->fetchAll();
//     foreach( $sections as $section){
//         echo '<option value="'. $section['Section_Id']. '">' . $section['Section_Name'] . '</option>';
//     }
// }
// if(isset($_POST['yearLevelId'])){
//     $yearLevelId = htmlspecialchars($_POST['yearLevelId']);
//     $programId = htmlspecialchars($_POST['programId']);
//     $sql = "SELECT * FROM sections WHERE Year_Level_Id = ? Program_Id = ? ";
//     $pdo_yearLevel = $pdo->prepare($sql);
//     $pdo_yearLevel->execute([$yearLevelId,$programId]);
//     $yearLevels = $pdo_yearLevel->fetchAll();
//     echo $yearLevelId;
//     foreach( $yearLevels as $yearLevel){
//         echo '<option value="'. $yearLevel['Section_Id']. '">' . $yearLevel['Section_Name'] . '</option>';
//     }
// }

// if(isset($_POST['yearLevel'])){
//     $sql = "SELECT * FROM year_level";
//     $pdo_level = $pdo->prepare($sql);
//     $pdo_level->execute();

//     $levels = $pdo_level->fetchAll();
//     foreach($levels as $level){
//         echo '<option value= " '. $level["Year_Level_Id"] .' ">' . $level['Year_Level'] . '</option>';
//     }

// }
?>
