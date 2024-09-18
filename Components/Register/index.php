<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
        #regiration_form fieldset:not(:first-of-type) {
            display: none;
        }
        input[type="button"]{
            padding: 4px 8px;
            margin-right: 10px;
            border:none;
            background-color: #ddd;
        }
        input[type="button"].active{
            background-color: #4CAF50;
            color:#fff;
        }
        input[type="checkbox"].hide{
            display:none;
        }
        
        #regiration_form{
            margin-top:100px;
        }
    </style>
</head>
<body class="container">
    <div class="alert alert-danger alert-dismissible fade hide" role="alert" id="myAlert">
       
    </div>
    <form id="regiration_form" novalidate action="action.php"  method="post">
    <fieldset>
        <h2>Select Your Role in Our School Community</h2>
        <p>Welcome to our school! Here, we believe in the power of education and collaboration.</p>

        <p>If you’re a <strong>Student</strong>, you’re about to embark on an exciting journey filled with learning, friendship, and discovery. Explore our resources, connect with your peers, and make the most of your educational experience.</p>

        <p>If you’re an <strong>Instructor</strong>, you are an essential part of our students’ growth and development. Your passion for teaching and dedication to nurturing young minds help create a vibrant learning environment.</p>
        <input type="button" value="Student" onclick="toggleButton('student')" id="student_btn">
        <input type="button" value="Instructor"  id="instructor_btn" onclick="toggleButton('instructor')">  
        <input type="checkbox" name="user_role" id="student" class="hide"> 
        <input type="checkbox" name="user_role" id="instructor" class="hide"> 
        <br><br>
        <input type="button" id="next" name="next" class="next btn btn-success" value="Next" />
    </fieldset>
    <fieldset>
        <h2>User Registration</h2>
        <p>Please fill out the form below to create your account. Make sure to provide accurate information as it will be used for account verification and communication.</p>
        <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value=""></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number:</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
        </div>
        <div class="form-group">
            <label for="profile_picture">Profile Picture:</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*" required>
        </div>
        <input type="button" name="previous" class="previous btn btn-default" value="Previous" />    
        <input type="" name="next" class="next btn btn-success" value="Next" />
    </fieldset>
    <fieldset>
        <h2>User Registration</h2>
        <p>Please fill out the form below to create your account. Make sure to provide accurate information.</p>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
        <input type="submit" name="submit" class="btn btn-info" value="Submit" />
    </fieldset>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function toggleButton(selected) {
            const studentBtn = document.getElementById("student_btn");
            const instructorBtn = document.getElementById("instructor_btn");
            
            if (selected === "student") {
                studentBtn.classList.add("active");
                instructorBtn.classList.remove("active");
                $('input[id="student"]').prop('checked', true);
                $('input[id="instructor"]').prop('checked', false);
            } else {
                instructorBtn.classList.add("active");
                studentBtn.classList.remove("active");
                $('input[id="instructor"]').prop('checked', true);
                $('input[id="student"]').prop('checked', false);
            }
            
        }

        function showAlert(message) {
            $('#myAlert').removeClass('hide').addClass('show');
            $('#myAlert').html(message);
            setTimeout(hideAlert, 3000);
        }

        function hideAlert() {
            $('#myAlert').removeClass('show').addClass('hide');
        }
    
        $(document).ready(function(){
            var current = 1,current_step,next_step,steps;
            
            $(".next").click(function(){
                // Get the current fieldset
                current_step = $(this).parent();
                

                var allFilled = true;
                current_step.find("input[required], select[required]").each(function() {
                    if ($(this).val() === "") {
                        allFilled = false;
                        $(this).addClass('is-invalid'); 
                    } else {
                        $(this).removeClass('is-invalid'); 
                    }
                });

            
                if ($('input[name="user_role"]:checked').length === 0) {
                    showAlert("Please Select Role");
                } else if (!allFilled) {
                    showAlert("Please fill out all required fields.");
                } else {
                    // Proceed to the next fieldset
                    next_step = current_step.next();
                    next_step.show();
                    current_step.hide();
                    hideAlert();
                }
            });

            $(".previous").click(function(){
                current_step = $(this).parent();
                next_step = $(this).parent().prev();
                next_step.show();
                current_step.hide();
            });

            $("input[type='submit']").click(function(event) {
                var isValid = true; 
                var email = $("#email").val();
                var password = $("#password").val();
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                // Reset validation classes
                $("#email").removeClass('is-invalid');
                $("#password").removeClass('is-invalid');

                if (email === "") {
                    showAlert("Please input your email.");
                    $("#email").addClass('is-invalid');
                    isValid = false;
                } else if (!emailPattern.test(email)) {
                    showAlert("Please enter a valid email address.");
                    $("#email").addClass('is-invalid');
                    isValid = false;
                }

                if (password === "") {
                    showAlert("Please input your password.");
                    $("#password").addClass('is-invalid');
                    isValid = false;
                }

               
                if (!isValid) {
                    event.preventDefault(); 
                } else {
                    $("#regiration_form").submit(); 
                }
            });
        });
    </script>
    
</body>
</html>