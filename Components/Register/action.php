
<?php
    require_once './../../database/connect.php';
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
        $user_role = htmlspecialchars($_POST['user_role']);
        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $gender = htmlspecialchars($_POST['gender']);
        $age = htmlspecialchars($_POST['age']);
        $contact_number = htmlspecialchars($_POST['contact_number']);
        $address = htmlspecialchars($_POST['address']);
        $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
        $profile_picture = htmlspecialchars($_POST['profile_picture']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        if($user_role && $first_name && $last_name && $gender && $age && $contact_number && $address && $date_of_birth && $profile_picture && $email && $password){
            // echo '<div class="row well alert alert-success">';
            // echo "<pre>";
            //     print_R($_POST);
            // echo "<pre>";
            // echo '</div>';

            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(First_Name, Last_Name, Gender, Age, Contact_Number,Address,Email,Date_Of_Birth,Profile_Picture,Password)
            VALUES(:firstname, :lastname, :gender, :age, :contact_number, :address, :email, :date_of_birth, :profile_picture, :password)";

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
                ':profile_picture' => $profile_picture,
                ':password' => $password
            ]);
            if($stmt){
                echo "User Created Successfully!";
            }
            // header('Location:../login.php');
        }else{
            $_SESSION['error_message'] = "All fields are required";
        }
    } 

?>