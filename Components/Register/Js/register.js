function toggleButton(selected) {
    const studentBtn = document.getElementById("student_btn");
    const instructorBtn = document.getElementById("instructor_btn");

    // Reset fields when toggling
    if (selected === "student") {
        studentBtn.classList.add("active");
        instructorBtn.classList.remove("active");
        $('input[id="student"]').prop('checked', true);
        $('input[id="instructor"]').prop('checked', false);
        $("#instructor_specific_fields").hide();
        $("#student_specific_fields").show(); // Show student fields
    } else {
        instructorBtn.classList.add("active");
        studentBtn.classList.remove("active");
        $('input[id="instructor"]').prop('checked', true);
        $('input[id="student"]').prop('checked', false);
        $("#student_specific_fields").hide();
        $("#instructor_specific_fields").show(); // Show instructor fields
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
    var current_step, next_step;

    $(".next").click(function(){
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
            next_step = current_step.next();
            next_step.show();
            current_step.hide();
            hideAlert();
        }
    });

    $(".previous").click(function(){
        current_step = $(this).parent();
        next_step = current_step.prev();
        next_step.show();
        current_step.hide();
    });

    $("input[type='submit']").click(function(event) {
        var isValid = true; 
        var email = $("#email").val();
        var password = $("#password").val();
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

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