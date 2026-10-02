<?php 
// Vars
$page = "dashboard";
$pagetitle = "Login | Patrick Portfolio";
$description = "Into the deep.";

include("template-parts/header-admin.php");

?>

<div class="container">



  <?php /* $entries = get_junk_removal_entries(); ?>



  <table id="entriesContainer" class="table table-striped table-bordered">
       <thead>
         <tr>
           <th>ID</th>
           <th>First name</th>
           <th>Last Name</th>
           <th>Phone</th>
           <th>Email</th>
           <th>Zipcode</th>
           <th>Location from</th>
           <th>Location to</th>
           <th>Service</th>
           <th>Datetime</th>
         </tr>
       </thead>

       <tbody>

        <?php foreach( $entries as $entry ): ?>

         <tr>
           <td><?=$entry['id'];?></td>
           <td><?=$entry['firstname'];?></td>
           <td><?=$entry['lastname'];?></td>
           <td><?=$entry['phone'];?></td>
           <td><?=$entry['email'];?></td>
           <td><?=$entry['zipcode'];?></td>
           <td><?=$entry['locfrom'];?></td>
           <td><?=$entry['locto'];?></td>
           <td><?=$entry['service'];?></td>
           <td><?=$entry['datetimeinserted'];?></td>
         </tr>

        <?php endforeach; ?>


       </tbody>
     </table>
     <?php */ ?>
</div>

<script type="text/javascript">
  jQuery(document).ready(function(){


    //Redirect to Admin if not logged in
    if (localStorage.getItem("auth_token") !== null && localStorage.getItem("userdata") !== null) {
    } else {
      window.location.href = "/admin.php";
    }



/*
    $('#entriesContainer').DataTable({
          paging: true,       // Enable pagination
          searching: true,    // Enable search box
          ordering: true,     // Enable sorting
          info: true,         // Show table info
          responsive: true,    // Make table responsive
          order: [[1, 'desc']]
      });*/


  });
</script>
<?php include("template-parts/footer-admin.php"); ?>





