function toggleButton(selected) {
  const studentBtn = document.getElementById("student_btn");
  const instructorBtn = document.getElementById("instructor_btn");

  // Reset fields when toggling
  if (selected === "student") {
    studentBtn.classList.add("active");
    instructorBtn.classList.remove("active");
    $('input[id="student"]').prop("checked", true);
    $('input[id="instructor"]').prop("checked", false);
    $("#instructor_specific_fields").hide();
    $("#student_specific_fields").show();
  } else {
    instructorBtn.classList.add("active");
    studentBtn.classList.remove("active");
    $('input[id="instructor"]').prop("checked", true);
    $('input[id="student"]').prop("checked", false);
    $("#student_specific_fields").hide();
    $("#instructor_specific_fields").show();
  }
}

function showAlert(message, nameAttr = "") {
  if ($(`#${nameAttr}`).val() != "") {
    $(`#${nameAttr}`).siblings(".error-message").html("");
  } else {
    const formattedName = formatString(nameAttr);
    const fullMessage = formattedName ? `${message} ${formattedName}` : message;
    console.log(`#${nameAttr}`);
    $(`#${nameAttr}`).siblings(".error-message").html(fullMessage);
  }
}

function formatString(str) {
  return str
    .replace(/_/g, " ")
    .split(" ")
    .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
    .join(" ");
}

$(document).ready(function () {
  var current_step, next_step;

  $(".next").click(function () {
    current_step = $(this).parent();
    var allFilled = true;

    current_step.find("input[required], select[required]").each(function () {
      if ($(this).val() === "") {
        allFilled = false;
        $(this).addClass("is-invalid");
      } else {
        $(this).removeClass("is-invalid");
      }

      showAlert("Please enter a ", "section");
      showAlert("Please enter a ", "year_level");
      showAlert("Please select a valid ", "enrollment_date");
      showAlert("Please select a valid ", "program");
      showAlert("Please enter a valid ", "status");
      showAlert("Please enter a valid ", "first_name");
      showAlert("Please enter a valid ", "last_name");
      showAlert("Please enter a valid ", "age");
      showAlert("Please select a valid ", "gender");
      showAlert("Please enter a valid ", "contact_number");
      showAlert("Please enter a valid ", "address");
      showAlert("Please select a valid ", "date_of_birth");
    });

    if ($('input[name="user_role"]:checked').length === 0) {
      showAlert("Please Select a ", "role");
    } else if (!allFilled) {
      return false;
    } else {
      next_step = current_step.next();
      next_step.show();
      current_step.hide();
    }
  });

  $(".previous").click(function () {
    current_step = $(this).parent();
    next_step = current_step.prev();
    next_step.show();
    current_step.hide();
  });
  //validate email and password
  $("input[type='submit']").click(function (event) {
    var isValid = true;
    var email = $("#email").val();
    var password = $("#password").val();
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    $("#email").removeClass("is-invalid");
    $("#password").removeClass("is-invalid");

    if (email === "") {
      showAlert("Please input your ", "email");
      $("#email").addClass("is-invalid");
      isValid = false;
    } else if (!emailPattern.test(email)) {
      showAlert("Please select a valid ", "email");
      $("#email").addClass("is-invalid");
      isValid = false;
    }

    if (password === "") {
      showAlert("Please select a valid ", "password");
      $("#password").addClass("is-invalid");
      isValid = false;
    }

    if (!isValid) {
      event.preventDefault();
    } else {
      $("#regiration_form").submit();
    }
  });
});
