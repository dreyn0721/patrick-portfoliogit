



<!-- Check Auth Session -->
<script type="text/javascript">

  jQuery( document ).ready(function(){

    $.ajax({
      method: "POST",
      url: "",
      headers: {
        action: "is_logged_in",
        auth_token: localStorage.getItem('auth_token')
      }
    }).done(function( response ) {
      if( response === "true" ){
        
      } else {

        localStorage.removeItem('auth_token');
        localStorage.removeItem('userdata');
        localStorage.removeItem('expires_at');
        
      }
    });

    var expires_at = localStorage.getItem('expires_at');

    var targetDate = new Date(expires_at);
    var expires_at_string = targetDate.getTime();

    var targetdatenow = new Date('<?php echo date("Y-m-d H:i:s");?>');
    var datenoow_string = targetdatenow.getTime();


    if( expires_at_string && datenoow_string > expires_at_string ){

      localStorage.removeItem('auth_token');
      localStorage.removeItem('userdata');
      localStorage.removeItem('expires_at');

      location.reload();

    }
  });
</script>









<script>

  jQuery('.radio-input-service').on('change', function () {
      var values = jQuery(this).parent().parent().find('input:checked').map(function () {
          return jQuery(this).next().text();
      }).get();

      let theVal = values.join(',');
      jQuery(this).parent().parent().find('.services-selected').val( theVal );
    });


    jQuery(".submit-btn").on("click", function(e){
      e.preventDefault();



      jQuery(this).prop('disabled', true);
      jQuery(this).parent().parent().find(".response-container").html("");



      var theForm = jQuery(this).parent().parent();

      var firstname = jQuery(this).parent().parent().find(".firstname").val();
      var lastname = jQuery(this).parent().parent().find(".lastname").val();

      var phone = jQuery(this).parent().parent().find(".phone").val();
      var email = jQuery(this).parent().parent().find(".email").val();
      var zipcode = jQuery(this).parent().parent().find(".zipcode").val();

      var messagedata = jQuery(this).parent().parent().find(".messagedata").val();


      var locfrom = jQuery(this).parent().parent().find(".location-from").val();
      var locto = jQuery(this).parent().parent().find(".location-to").val();


      var service = jQuery(this).parent().parent().find('.services-selected').val();






      $.ajax({
        method: "POST",
        url: "",
        headers: {
          action: "entry",
          auth_token: localStorage.getItem('auth_token')
        },
        data: { 
          action:"entry", 
          firstname: firstname, 
          lastname: lastname , 
          email: email, 
          phone: phone,
          zipcode: zipcode,
          messagedata: messagedata,
          locfrom: locfrom,
          locto: locto,
          service: service
        }
      }).done(function( response ) {



          response_arr = JSON.parse(response);

          if( ("success" in response_arr) && response_arr.success === true ){
            
            jQuery(theForm).find(".firstname").val("");
            jQuery(theForm).find(".lastname").val("");
            jQuery(theForm).find(".email").val("");
            jQuery(theForm).find(".phone").val("");
            jQuery(theForm).find(".zipcode").val("");

            jQuery(theForm).find(".messagedata").val("");

            jQuery(theForm).find(".location-from").val("");
            jQuery(theForm).find(".location-to").val("");

            jQuery(theForm).find(".response-container").show();
            jQuery(theForm).find(".response-container").html("<p>Your form submitted successfully, we will send you an email shortly. <br>Thank you</p>");

          } else {

            if( ("errors" in response_arr) ){
              const $ul = $('<ul>');
              $.each(response_arr.errors, function(index, value) {

                const $li = jQuery('<li>').text(value);
          
                // Append the <li> to the <ul>
                $ul.append($li);

              });
              jQuery(theForm).find('.response-container').append($ul);
              jQuery(theForm).find(".response-container").show();
            } else {
              jQuery(theForm).find('.response-container').html("<ul><li>Something wen't wrong, Please try again later.</li></ul>")
            }
          }

          


        jQuery(theForm).find(".submit-btn").prop('disabled', false);
      });





    });














  const promoBar = document.getElementById('promoBar');
  let prev = 0;


  // //hero hidden description
  // let lastScroll = 0;
  // const description = document.querySelector('.popping-description');

  window.addEventListener('scroll', () => {
    let current = window.scrollY;

    if (current > prev) {
      promoBar.style.opacity = '0';
    } else {
      promoBar.style.opacity = '1';
    }

    prev = current;




    // //hero hidden description
    // let currentScroll = window.pageYOffset;

    // if (currentScroll > lastScroll) {
    //   // Scrolling down → show
    //   description.classList.add('show');
    // } else {
    //   // Scrolling up → hide
    //   description.classList.remove('show');
    // }

    // lastScroll = currentScroll;
  });

















  // Modal btn inside hyperlink
  jQuery(".wwd-modal-btn").click(function(e){
    e.preventDefault();
  });
</script>






<!-- begin Widget Tracker Code -->
<script>
/*(function(w,i,d,g,e,t){w["WidgetTrackerObject"]=g;(w[g]=w[g]||function() {(w[g].q=w[g].q||[]).push(arguments);}),(w[g].ds=1*new Date());(e="script"), (t=d.createElement(e)),(e=d.getElementsByTagName(e)[0]);t.async=1;t.src=i; e.parentNode.insertBefore(t,e);}) (window,"https://widgetbe.com/agent",document,"widgetTracker"); window.widgetTracker("create", "WT-PONMIRJK"); window.widgetTracker("send", "pageview");*/
</script> <!-- end Widget Tracker Code -->

</body>
</html>
