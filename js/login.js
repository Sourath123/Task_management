$(document).ready(function() {
  // Switch to Registration Form
  $('#signup').on('click', function() {
      $('#signin').hide();
      $('#register').show();
      $('#login').hide();
      $('#signup').hide();
      $('#register_btn').show();
      $('.fname, .lname, .confirm').show();  // Show name fields and confirm password
      $('#fpassword').hide();  // Hide forgot password link
      $('#prev_login').show(); 
  });

  // Switch to Login Form
  $('#prev_login').on('click', function() {
      $('#signin').show();
      $('#register').hide();
      $('#login').show();
      $('#signup').show();
      $('#register_btn').hide();
      $('.fname, .lname, .confirm').hide(); // Hide name fields and confirm password
      $('#fpassword').show(); // Show forgot password link
      $('#prev_login').hide(); 
  });

  // Form submission for Login via AJAX
  $('#login').on('click', function() {
      var email = $('#email').val();
      var password = $('#inputPassword').val();
      
      if (email === '' || password === '') {
          Swal.fire('Please enter both email and password!');
          return;
      }
      
      $.ajax({
          type: "POST",
          url: "action/login_action.php", 
          data: {email: email, password: password},
          success: function(response) {
              // if (response.success) {
              //     window.location.href = "dashboard.php";
              // } else {
              //     Swal.fire(response.message);
              // }
              location.reload();
          }
      });
  });

  // Form submission for Registration via AJAX
  $('#register_btn').on('click', function(e) {
      e.preventDefault();
      
      var f_name = $("#f_username").val();

      var l_name = $("#l_username").val();
    
      var gender = document.querySelector('input[name="gender"]:checked');
    
      var email = $("#email").val();
    
      var password = $("#inputPassword").val();
    
      var c_password = $("#inputCPassword").val();
      
      // if (email === '' || password === '' || confirmPassword === '' || firstName === '' || lastName === '') {
      //   Swal.fire({
      //     title: "Error!",
      //     text: "Please Fill in all Feilds",
      //     icon: "error",
      //     confirmButtonText: "OK"
      //   });
      //     return;
      // }

      if (f_name == '') {

        err = 1;
    
        e.preventDefault();
    
        Swal.fire({
          title: "Error!",
          text: "Please Enter First Name",
          icon: "error",
          confirmButtonText: "OK"
        });
    
        $("#f_username").css("border", "solid 1px red");
    
        $("#f_username").focus();
    
        return false;
    
      } else {
    
        err = 0;
    
        $("#f_username").css("border", "1px solid #ccc");
    
      }
    
      if (l_name == '') {
    
        err = 1;
    
        //  e.preventDefault();
    
        Swal.fire({
          title: "Error!",
          text: "Please Enter Last Name",
          icon: "error",
          confirmButtonText: "OK"
        });
    
        $("#l_username").css("border", "solid 1px red");
    
        $("#l_username").focus();
    
        return false;
    
      } else {
    
        err = 0;
    
        $("#l_username").css("border", "1px solid #ccc");
    
      }
    
      if (gender == '') {
    
        err = 1;
    
        e.preventDefault();
    
        Swal.fire({
          title: "Error!",
          text: "Please Select Gender",
          icon: "error",
          confirmButtonText: "OK"
        });
    
        return false;
    
      } else {
    
        err = 0;
    
      }
    
      if (email == '') {
    
        err = 1;
    
        e.preventDefault();
    
        Swal.fire({
          title: "Error!",
          text: "Please Enter Email",
          icon: "error",
          confirmButtonText: "OK"
        });
    
        $("#email").css("border", "solid 1px red");
    
        $("#email").focus();
        return false;
    
      } else {
    
        err = 0;
        $("#email").css("border", "1px solid #ccc");
    
      }
      if (password == '') {
    
        err = 1;
    
        e.preventDefault();
    
        Swal.fire({
          title: "Error!",
          text: "Please Enter Password",
          icon: "error",
          confirmButtonText: "OK"
        });
    
      
        $("#inputPassword").css("border", "solid 1px red");
    
        $("#inputPassword").focus();
        return false;
    
      } else {
    
        err = 0;
        $("#inputPassword").css("border", "1px solid #ccc");
      }
    
      if (c_password == '') {
    
        err = 1;
    
        e.preventDefault();
    
        Swal.fire({
          title: "Error!",
          text: "Please Confirm Password",
          icon: "error",
          confirmButtonText: "OK"
        });
    
        $("#inputCPassword").css("border", "solid 1px red");
    
        $("#inputCPassword").focus();
        return false;
    
    
      } else {
    
        err = 0;
        $("#inputCPassword").css("border", "1px solid #ccc");
    
      }

      if (password !== c_password) {
          $('#password-error').text('Passwords do not match!');
          return;
      }

      $.ajax({
          type: "POST",
          url: "ajax/register.php", 
          data: {email: email, password: password, first_name: f_name, last_name: l_name,c_password:c_password},
          success: function(response) {
            const parsedResponse = JSON.parse(response);


var error = parsedResponse.err;
           
              if (error == '1') {
                alert(response);
                e.preventDefault();
                Swal.fire({
                  title: "Error!",
                  text: "This Email already Exist",
                  icon: "error",
                  confirmButtonText: "OK"
                });
                $("#email").css("border", "solid 1px red");
    
                $("#email").focus();
                  
                //  window.location.href = "login.php";
              } else {
               // alert(response);
                e.preventDefault();
                Swal.fire({
                  title: "Error!",
                  text: "Registered Successfully",
                  icon: "error",
                  confirmButtonText: "OK"
                });
                window.location.href = "login.php";
              }
          }
      });
  });


  $('#inputCPassword').on('keyup', function() {
      var password = $('#inputPassword').val();
      var confirmPassword = $('#inputCPassword').val();
      
      if (password !== confirmPassword) {
          $('#password-error').text('Passwords do not match!');
      } else {
          $('#password-error').text('');
      }
  });
});

$('#login').on('click', function() {

  var email = $("#email").val();
    
  var password = $("#inputPassword").val();

$.ajax({
  type: "POST",
  url: "action/login_action.php", 
  data: {email: email, password: password},
  success: function(response){



  }

})

})
