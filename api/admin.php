<?php
// Vars
$page = "login";
$pagetitle = "Login | Junk Removal";
$description = "Full-service junk removal company offering residential and commercial hauling. We remove furniture, appliances, yard waste, and construction debris with same-day and eco-friendly disposal.";


include("template-parts/header-admin.php");


?>

    <div class="login-container">

      <h2>Sign In</h2>

      <form class="login-form">

        <div class="response-container"></div>


        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" id="username" class="username">
        </div>

        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" class="password">
        </div>

        <button type="submit" class="login-btn">Login</button>
      </form>
    </div>


























    <style>

      body {
        background: linear-gradient(235deg, #1e3c72, #002469);
      }


      .login-container {
        background: #ffffff;
        width: 100%;
        max-width: 380px;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        text-align: center;
        margin: 150px auto 0 auto;
      }


      .login-container h2 {
        margin-bottom: 25px;
        font-weight: 600;
        color: #333;
      }

      .input-group {
        margin-bottom: 20px;
        text-align: left;
      }

      .input-group label {
        display: block;
        margin-bottom: 6px;
        font-size: 14px;
        color: #555;
      }

      .input-group input {
        width: 100%;
        padding: 12px 14px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 15px;
        transition: border-color 0.3s, box-shadow 0.3s;
      }

      .input-group input:focus {
        outline: none;
        border-color: #2a5298;
        box-shadow: 0 0 0 2px rgba(42, 82, 152, 0.15);
      }

      .login-btn {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: none;
        background: #2a5298;
        color: #ffffff;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s, transform 0.1s;
      }

      .login-btn:hover {
        background: #1e3c72;
      }

      .login-btn:active {
        transform: scale(0.98);
      }
    </style>







<script type="text/javascript">
  jQuery( document ).ready(function(){








    //Redirect to Dashboard if already logged in
    if (localStorage.getItem("auth_token") !== null && localStorage.getItem("userdata") !== null) {
      window.location.href = "/api/dashboard.php";
    } else {
    }









    jQuery(".login-form").on("submit", function(e){
      e.preventDefault();

      jQuery(".login-form .login-btn").prop('disabled', true);
      jQuery(".response-container").html("");

      var username = jQuery(".login-form .username").val();
      var password = jQuery(".login-form .password").val();

      $.ajax({
        method: "POST",
        url: "",
        headers: {
          action: "login"
        },
        data: { 
          username: username, 
          password: password
        }
      }).done(function( response ) {

          response_arr = JSON.parse(response);

          if( ("success" in response_arr) && response_arr.success === true ){


            jQuery(".response-container").html("<p>Login successful.</p>");
            jQuery(".response-container").show();

            //set auth token
            localStorage.setItem('auth_token', response_arr.auth_token);
            localStorage.setItem('userdata', response_arr.userdata);


            setTimeout(function() {
              window.location.href = "/dashboard.php";
            }, 2000);

          } else {

            const $ul = $('<ul>');
            $.each(response_arr.errors, function(index, value) {

              const $li = jQuery('<li>').text(value);
        
              // Append the <li> to the <ul>
              $ul.append($li);

            });
            jQuery('.response-container').append($ul);
            jQuery(".response-container").show();
          }


          jQuery(".login-form .login-btn").prop('disabled', false);

      });
    });







    
  });
</script>



<?php include("template-parts/footer-admin.php"); ?>
