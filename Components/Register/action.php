
<?php
    require_once './../../database/connect.php';
    session_start();
    $user_role = $first_name = $last_name = $gender = $age = $contact_number = $address = $date_of_birth = $email = $password = $department = $program = $section = $year_level = $enrollment_date = $status = '';

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
        $user_role = htmlspecialchars($_POST['user_role']);
        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $gender = htmlspecialchars($_POST['gender']);
        $age = htmlspecialchars($_POST['age']);
        $contact_number = htmlspecialchars($_POST['contact_number']);
        $address = htmlspecialchars($_POST['address']);
        $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        
        if($user_role && $first_name && $last_name && $gender && $age && $contact_number && $address && $date_of_birth && $email && $password){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(First_Name, Last_Name, Gender, Age, Contact_Number,Address,Email,Date_Of_Birth,Password)
            VALUES(:firstname, :lastname, :gender, :age, :contact_number, :address, :email, :date_of_birth, :password)";

            if($user_role == "instructor"){
               $department = htmlspecialchars($_POST['department']); 
               $sql_instructor = "INSERT INTO instructor (Department) VALUES (:department)";
               $stmt_instructor = $pdo->prepare($sql_instructor);
               $stmt_instructor->bindParam(':department',$department);
               $stmt_instructor->execute();
            }else if($user_role == "student"){
                $program = htmlspecialchars($_POST['program']);
                $section = htmlspecialchars($_POST['section']);
                $year_level = htmlspecialchars($_POST['year_level']);
                $enrollment_date = htmlspecialchars($_POST['enrollment_date']);
                $status = htmlspecialchars($_POST['status']);

                $sql_student = "INSERT INTO student(Program, Section, Year_Level, Enrollment_Date, Status) VALUES(:program, :section, :year_level, :enrollment_date, :status)";
                $stmt_student = $pdo->prepare($sql_student);

                $stmt_student->execute([
                    ":program" => $program,
                    ":section" => $section,
                    ":year_level" => $year_level,
                    ":enrollment_date" => $enrollment_date,
                    ":status" => $status,
                ]);
            }else{
                echo "Invalid";
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':firstname' => $first_name,
                ':lastname' => $last_name,
                ':gender' => $gender,
                ':age' => $age,
                ':contact_number' => $contact_number,
                ':address' => $address,
                ':email' => $email,
                ':date_of_birth' => $date_of_birth,
                ':password' => $password
            ]);
            if(isset($stmt_student) || isset($stmt_instructor) && $stmt){
                echo "User Created Successfully!";
            }
            // header('Location:../login.php');
        }else{
            $_SESSION['error_message'] = "All fields are required";
        }
    } 

?>