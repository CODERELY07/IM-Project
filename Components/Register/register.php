<?php
    session_start();
    require_once './../../database/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css?=v<?php echo time()?>">
</head>
<body class="container">
    
    <form id="regiration_form" novalidate action="action.php"  method="post">
    <fieldset>
        <h2>Select Your Role in Our School Community</h2>
        <p>Welcome to our school! Here, we believe in the power of education and collaboration.</p>

        <p>If you’re a <strong>Student</strong>, you’re about to embark on an exciting journey filled with learning, friendship, and discovery. Explore our resources, connect with your peers, and make the most of your educational experience.</p>

        <p>If you’re an <strong>Instructor</strong>, you are an essential part of our students’ growth and development. Your passion for teaching and dedication to nurturing young minds help create a vibrant learning environment.</p>
        
        <input type="button" value="Student" onclick="toggleButton('student')" id="student_btn">
        <input type="button" value="Instructor"  id="instructor_btn" onclick="toggleButton('instructor')">  
        <p id="role"></p>
        <p class="error-message"></p>
        <input type="checkbox" value="student" name="user_role" id="student" class="hide"> 
        <input type="checkbox" value="instructor" name="user_role" id="instructor" class="hide"> 
        <br><br>
        <input type="button" id="next" name="next" class="next btn btn-success" value="Next" />   
    </fieldset>
    <fieldset id="second_step">
        <h2>User Registration</h2>
        <p>Please fill out the form below to create your account. Make sure to provide accurate information as it will be used for account verification and communication.</p>
        <!-- <div id="instructor_specific_fields" style="display:none;"> -->
         <!-- <h3>Instructor Information</h3> -->
         <label for="department">Department</label>
            <select name="department" id="department" class="form-control" required>
                <option value=""></option>
                <?php 
                    $sql_department = "SELECT * FROM department";
                    $pdo_department = $pdo->prepare($sql_department);
                    $pdo_department->execute(); 
                    while($row_department = $pdo_department->fetch()):
                ?>
                <option value="<?= $row_department['Department_Id']?>"><?= $row_department['Department_Name'] ?></option>
                <?php endwhile; ?>
            </select>
            <p class="error-message"></p>
        <!-- </div> -->
        <div id="student_specific_fields" style="display:none ;">
            <h3>Student Information</h3>
            <label for="">Program</label>
            <div class="form-group">
                <select name="program" id="program" class="form-control" required>
                    <option value="">Select Department First</option>
                </select>
                <p class="error-message"></p>
            </div>
            <div class="form-group">
                <label for="section">Section:</label>
                <input type="text" class="form-control" id="section" name="section" required>
                <p class="error-message"></p>
            </div>
            <p class="error-message"></p>
            <div class="form-group">
                <label for="year_level">Year Level:</label>
                <input type="text" class="form-control" id="year_level" name="year_level" required>
                <p class="error-message"></p>
            </div>
           
            <div class="form-group">
                <label for="enrollment_date">Enrollment Date:</label>
                <input type="date" class="form-control" id="enrollment_date" name="enrollment_date" required>
                <p class="error-message"></p>
            </div>
          
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" required>
                <p class="error-message"></p>
            </div>
        </div>
       

        <div id="all">
            <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                    <p class="error-message"></p>
            </div> 
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
                <p class="error-message"></p>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value=""></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <p class="error-message"></p>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" required>
                <p class="error-message"></p>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" required>
                <p class="error-message"></p>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" required>
                <p class="error-message"></p>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                <p class="error-message"></p>
            </div>  
        </div>
        <input type="button" name="next" class="previous btn btn-default" value="Previous" />    
        <input type="" name="next" class="next btn btn-success" value="Next" />
    </fieldset>
    <fieldset>
        <h2>User Registration</h2>
        <p>Please fill out the form below to create your account. Make sure to provide accurate information.</p>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <p class="error-message"></p>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <p class="error-message"></p>
        </div>
        <input type="button" name="next" class="previous btn btn-default" value="Previous" />
        <input type="submit" name="submit" class="btn btn-info" value="Submit" />
    </fieldset>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/register.js?=v<?php echo time()?>"></script>
</body>
</html>