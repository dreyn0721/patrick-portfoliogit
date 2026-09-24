
  </main>

  <footer>
    <div class="container text-center">
      <p class="footer-text">  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus condimentum. 
        &copy;<?=date("Y");?> All rights reserved.</p>
    </div>
  </footer>




  <script type="text/javascript">
    jQuery(document).ready(function(){

      if (localStorage.getItem("auth_token") !== null && localStorage.getItem("userdata") !== null) {
        jQuery(".header-logged-in").show();
      } else {
        jQuery(".header-logged-out").show();
      }







      jQuery(".logout-btn").on("click", function(e){
      e.preventDefault();

      $.ajax({
        method: "POST",
        url: "",
        headers: {
          action: "logout",
          auth_token: localStorage.getItem('auth_token')
        }
      }).done(function( response ) {

          response_arr = JSON.parse(response);


          localStorage.removeItem('auth_token');
          localStorage.removeItem('userdata');

          window.location.href = "/api/admin.php";
      });



    });



    });
  </script>
</body>
</html>