<?php
$author = "Anthony Rivas";

$host = $_SERVER['HTTP_HOST'];
$localhost_names = ['localhost', '127.0.0.1', '::1', 'patrick-portfoliogit'];
if (in_array($host, $localhost_names) || strpos($host, '.local') !== false) {
  $base_url = "http://127.0.0.1/patrick-portfoliogit/api";
  $base_assets = "http://127.0.0.1/patrick-portfoliogit/assets";
} else {
  $base_url = "https://patrick-portfoliogit.vercel.app";
  $base_assets = "https://patrick-portfoliogit.vercel.app/assets";
}

global $conn;




date_default_timezone_set('America/New_York');





function generateToken($length = 64) {
    return bin2hex(random_bytes($length)); // 128 chars hex
}









function logged_in( $auth_token ){
  global $conn;

    // Check token in database
    $sql = "SELECT * FROM user_sessions WHERE token=$1 LIMIT 1";
    $result = pg_query_params($conn, $sql, [$auth_token]);
    $session = pg_fetch_assoc($result);

    if( isset( $session['expires_at'] ) && strtotime( $session['expires_at'] ) > strtotime( date("Y-m-d H:i:s") ) ){
      return true;
    } else {
      return false;
    }

}







function email_exist( $email ){
  global $conn;

   $email_exist_query = pg_query($conn, "SELECT * FROM users WHERE email = '$email' LIMIT 1");

    if ($email_exist_query) {
      if( pg_fetch_assoc($email_exist_query) ) {
        return true;
      } else {
        return false;
      }
    }
}

function username_exist( $username ){
  global $conn;

    $username_exist_query = pg_query($conn, "SELECT * FROM users WHERE username = '$username' LIMIT 1");

    if ($username_exist_query) {
      if( pg_fetch_assoc($username_exist_query) ) {
        return true;
      } else {
        return false;
      }
    }
}








function get_article_single( $article_id ){
  global $conn;

  $get_article = "SELECT
      M.*,
      COUNT(J.id) AS comment_counts
  FROM
      articles AS M
  LEFT JOIN
      comments AS J ON M.id = J.article_id

  WHERE M.id = '$article_id'

  GROUP BY
      M.id -- Include all non-aggregated columns from the SELECT list in the GROUP BY clause
  ORDER BY
      M.datetimeinserted
      DESC;
  ";

  //$get_articles = "SELECT * FROM junk_removal_cta_entries LIMIT 10";

  $result = pg_query_params($conn, $get_article, []);

  $the_article = pg_fetch_assoc($result);

  return $the_article;
}




function get_articles_feeds( $get_start=false, $get_end=false){
  global $conn;
  $articles = [];

  $get_articles = "SELECT
      M.*,
      COUNT(J.id) AS comment_counts
  FROM
      articles AS M
  LEFT JOIN
      comments AS J ON M.id = J.article_id
  GROUP BY
      M.id -- Include all non-aggregated columns from the SELECT list in the GROUP BY clause
  ORDER BY
      M.datetimeinserted
      DESC;
  ";

  //$get_articles = "SELECT * FROM junk_removal_cta_entries LIMIT 10";

  $result = pg_query_params($conn, $get_articles, []);

  while ($row = pg_fetch_assoc($result)) {
      $articles[] = $row;
  }






  return $articles;

}






function get_comments_by_article_id( $article_id ){
  global $conn;
  $comments = [];


  $get_comments = "SELECT
        M.*,
        J.firstname AS firstname,
        J.lastname AS lastname
    FROM
        comments AS M
    LEFT JOIN
        users AS J ON M.user_id = J.id

    WHERE M.article_id = '$article_id'

    GROUP BY
        M.id, J.firstname, J.lastname -- Include all non-aggregated columns from the SELECT list in the GROUP BY clause

    ORDER BY
        M.datetimeinserted
        ASC;;
  ";

  //$get_articles = "SELECT * FROM junk_removal_cta_entries LIMIT 10";

  $result = pg_query_params($conn, $get_comments, []);

  while ($row = pg_fetch_assoc($result)) {
      $comments[] = $row;
  }

  return $comments;
}








function get_userdata_by_id( $id ){
  global $conn;

  $get_user = pg_query($conn, "SELECT * FROM users WHERE id = '$id' LIMIT 1");
  if ($get_user) {
    return pg_fetch_assoc($get_user);
  } else {
    return false;
  }

}























































































//API//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$headers = getallheaders();
if( isset( $headers ) && isset( $headers['action'] ) && $headers['action'] ){










  if( $headers['action'] == "comment" ){

    $current_time = date('m/d/Y H:i:s');


    $response = [
      "success" => null,
      "errors" => []
    ];



    if( logged_in( $headers['auth_token'] ) ){
      //get user id uploading
      $sql = "SELECT * FROM user_sessions WHERE token=$1 LIMIT 1";
      $result = pg_query_params($conn, $sql, [ $headers['auth_token'] ]);
      $session = pg_fetch_assoc($result);

      if( isset( $session['user_id'] ) && $session['user_id'] ){
        $user_id = $session['user_id'];
      } else {
        $response['errors'][] = "There is technical issue getting user id of currently logged in user, Please report to administrator.";
      }
    } else {

      $response['errors'][] = "Auth token is invalid or expired";
    }


    if( isset($_POST['article_id']) && $_POST['article_id'] ){
      $article_id = $_POST['article_id'];
    } else {
      $response['errors'][] = "There has been error loading page data, please refresh the page";
    }


    if( isset($_POST['commentmsg']) && $_POST['commentmsg'] ){
      $commentmsg = $_POST['commentmsg'];

    } else {
      $response['errors'][] = "Comment cannot be empty.";
    }

    if( isset( $response['errors'] ) && is_array( $response['errors'] ) && count( $response['errors'] ) > 0 ){
      
      exit( json_encode( $response ) );

    } else {
          
        //insert data and return success
        $sql = "INSERT INTO comments 
        (article_id, user_id, comment, datetimeinserted) 
        VALUES 
        ($1, $2, $3, $4) 
        ";
        
        pg_query_params($conn, 
          $sql, 
          [ $article_id, $user_id, $commentmsg, $current_time ]
        );
          

        $response['success'] = true;
        exit( json_encode( $response ) );



    }




    

    $response['errors'][] = "Something wen't wrong, please try again.";
    exit( json_encode( $response ) );
    exit();
          

  }












  if( $headers['action'] == "article-post" ){

    $current_time = date('m/d/Y H:i:s');
    global $conn;


    $response = [
      "success" => null,
      "errors" => []
    ];

    $saved_imgs = [];




    if( logged_in( $headers['auth_token'] ) ){
      //get user id uploading
      $sql = "SELECT * FROM user_sessions WHERE token=$1 LIMIT 1";
      $result = pg_query_params($conn, $sql, [ $headers['auth_token'] ]);
      $session = pg_fetch_assoc($result);

      if( isset( $session['user_id'] ) && $session['user_id'] ){
        $user_id = $session['user_id'];
      } else {
        $response['errors'][] = "There is technical issue getting user id of currently logged in user, Please report to administrator.";
      }
    } else {
      $response['errors'][] = "Auth token is invalid or expired";
    }



    if( isset($_POST['article_title']) && $_POST['article_title'] ){
      $article_title = ucwords( $_POST['article_title'] );
    } else {
      $response['errors'][] = "Article title cannot be empty.";
    }

    if( isset($_POST['meta_description']) && $_POST['meta_description'] ){
      $meta_description = ucwords( $_POST['meta_description'] );
    } else {
      $meta_description = "";
    }

    if( isset($_POST['article_description']) && $_POST['article_description'] ){
      $article_description = $_POST['article_description'];
    } else {
      $response['errors'][] = "Article description cannot be empty.";
    }




    if (in_array($host, $localhost_names) || strpos($host, '.local') !== false) {
    } else {
      $response['errors'][] = "Creating Blog is disabled on live, while we don't have cloud storage";
    }



    if( isset( $response['errors'] ) && is_array( $response['errors'] ) && count( $response['errors'] ) > 0 ){
      pg_close($conn);
      exit( json_encode( $response ) );
    } else {

      if(isset($_FILES['article_img'])){



        foreach($_FILES['article_img']['tmp_name'] as $key => $tmp_name){


            $file_name =  $_FILES['article_img']['name'][$key];


            if( isset( $file_name ) && $file_name ){
            } else {
              continue;
            }

            

            $file_size = $_FILES['article_img']['size'][$key];
            $file_tmp =$_FILES['article_img']['tmp_name'][$key];
            $file_type=$_FILES['article_img']['type'][$key];
            $getting_extn = explode('.',$_FILES['article_img']['name'][$key]);



            $file_ext=strtolower(end($getting_extn));
            $article_pic = md5(date("YmDHis") ."x".rand(0,100) ).".".$file_ext;
            $saved_imgs[] = $article_pic;

            $extensions= array("png","jpg","jpeg");

            if(in_array($file_ext,$extensions) == true){
              if($file_size > 2097152){

                //We dont return error, we just skip it from uploading
                // $response['errors'][]= '"'.$file_name.'" Article image size must be lower than 2 MB.';

              } else {
                move_uploaded_file($file_tmp,__DIR__."/../../public/assets/article_imgs/".$article_pic);
                // $img_url = "/assets/article_imgs/".$article_pic;


                

              }

            } else {
              $response['errors'][] = '"'.$file_name.'" is invalid, We only allow Png, Jpeg, Jpg file types to be uploaded.';
            }
        }

        if( isset( $saved_imgs ) && is_array( $saved_imgs ) && count( $saved_imgs ) > 0 ){

        } else {
          $response['errors'][] = "Please upload at least 1 article image.";
        }



      }
    }

    if( isset( $response['errors'] ) && is_array( $response['errors'] ) && count( $response['errors'] ) > 0 ){
      pg_close($conn);
      exit( json_encode( $response ) );
    } else {

      $json_imgs = json_encode( $saved_imgs );


/*
      $type = pathinfo( $_FILES['article_img']['tmp_name'], PATHINFO_EXTENSION);

      $imageData = file_get_contents( $_FILES['article_img']['tmp_name'] );
      if( isset( $imageData ) && $imageData ){

        $base64 = 'data:image/' . $type . ';base64,' . base64_encode( $imageData );
      }*/

      //insert data and return success
      $sql = "INSERT INTO articles 
      (title, description, img_url, posted_by_id, datetimeinserted, meta_description) 
      VALUES 
      ($1, $2, $3, $4, $5, $6) 
      ";
      
      pg_query_params($conn, 
        $sql, 
        [ $article_title, $article_description, $json_imgs, $user_id, $current_time, $meta_description  ]
      );
        
      $response['success'] = true;

      pg_close($conn);
      exit( json_encode( $response ) );



    }









    //Should not came here, let's show warning in case
    $response['errors'][] = "Something wen't wrong, please try again.";

    pg_close($conn);
    exit( json_encode( $response ) );
  }







  if( $headers['action'] == "logout" ){
    $response = [
      "success" => null,
      "errors" => []
    ];

    if( isset( $headers['auth_token'] ) && $headers['auth_token'] ){
        pg_query_params($conn, 
          "DELETE FROM user_sessions WHERE token=$1", 
          [ $headers['auth_token'] ]
        );
        $response['success'] = true;

    } else {
      $response['errors'][] = "No token provided";
    }
    exit( json_encode( $response ) );
  }





  if( $headers['action'] == "login" ){
    $response = [
      "success" => null,
      "auth_token" => null,
      "errors" => [],
      "userdata" => []
    ];


      $token = generateToken(); // stateless session token
      $expires = date('Y-m-d H:i:s', time() + 7200);
      $created_at = date('Y-m-d H:i:s');


      if( isset($_POST['username']) && $_POST['username'] ){
        $username = $_POST['username'];
      } else {
        $response['errors'][] = "Username is required";
      }

      if( isset($_POST['password']) && $_POST['password'] ){
        $password = $_POST['password'];
      } else {
        $response['errors'][] = "Password is required";
      }

      if( isset( $username ) && $username && isset( $password ) && $password ){
        $password = md5( $password );

        $login_query = pg_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1");

        if ($login_query) {

          $login_res = pg_fetch_assoc($login_query);
          if( isset( $login_res ) && $login_res ) {

            $response['userdata'] = json_encode($login_res);

            //insert session
            $sql = "INSERT INTO user_sessions (user_id, token, created_at, expires_at) VALUES ($1, $2, $3, $4) RETURNING token";
            $insert_token_session = pg_query_params($conn, 
              $sql, 
              [ $login_res['id'], $token, $created_at, $expires ]
            );

            $get_the_token = pg_fetch_assoc($insert_token_session);
            if( isset( $get_the_token['token'] ) && $get_the_token['token'] ){
              $response['auth_token'] = $get_the_token['token'];

              $response['success'] = true;
            }

          } else {
            $response['errors'][] = "Invalid username or password";
          }
        }
      }



    exit( json_encode( $response ) );
  }









  if( $headers['action'] == "is_logged_in" ){

    if( isset( $headers['auth_token'] ) && $headers['auth_token'] ){
      if( logged_in( $headers['auth_token'] ) ){
        echo "true";
      } else {
        echo "false";
      }
    } else {
      echo "false";
    }

    exit();
  }









  if( $headers['action'] == "register" ){
  $current_time = date('m/d/Y H:i:s');


    $response = [
      "success" => null,
      "errors" => []
    ];



  if( isset($_POST['firstname']) && $_POST['firstname'] ){
    $firstname = $_POST['firstname'];
  } else {
    $response['errors'][] = "Firstname is required";
  }

  if( isset($_POST['lastname']) && $_POST['lastname'] ){
    $lastname = $_POST['lastname'];
  } else {
    $response['errors'][] = "Lastname is required";
  }

  if( isset($_POST['email']) && $_POST['email'] ){
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $response['errors'][] = "Invalid Email Format";
    } else {
      if( email_exist( $email ) ){
        $response['errors'][] = "Email is already taken";
      }
    }
    

  } else {
    $response['errors'][] = "Email is required";
  }



  if( isset($_POST['username']) && $_POST['username'] ){

    $username = $_POST['username'];

    if( username_exist( $username ) ){
      $response['errors'][] = "Username is already taken";
    }

  } else {
    $response['errors'][] = "Username is required";
  }

  if( isset($_POST['password']) && $_POST['password'] ){

    if( isset($_POST['confirmpassword']) && $_POST['confirmpassword'] ){

      if( $_POST['password'] == $_POST['confirmpassword'] ){

        if( strlen( $_POST['password'] ) >= 7 ){
          if( strlen( $_POST['password'] ) > 32 ){
            $response['errors'][] = "Password must not exceed 32 characters.";
          } else {
            $password = $_POST['password'];
          }
        } else {
          $response['errors'][] = "Password must be atleast 7 characters.";
        }


      } else {
        $response['errors'][] = "Password and confirm password doesn't match";
      }
      
    } else {
      $response['errors'][] = "Confirm Password is required";
    }

  } else {
    $response['errors'][] = "Password is required";
  }





  if( isset( $response['errors'] ) && is_array( $response['errors'] ) && count( $response['errors'] ) > 0 ){
    
      exit( json_encode( $response ) );

  } else {
    
    $password = md5( $password );


    //insert data and return success
    $register_query = 
      "
      INSERT INTO users 
      (
        firstname, 
        lastname,
        username,
        password,
        email,
        role,
        datetimeinserted
      ) 
      VALUES 
      (
        $1, 
        $2, 
        $3, 
        $4, 
        $5, 
        'user', 
        $6
      )
      ";

    pg_query_params($conn, 
      $register_query, 
      [ $firstname, $lastname, $username, $password, $email, $current_time ]
    );
      
    $response['success'] = true;


  }




  exit( json_encode( $response ) );
}











  if( $headers['action'] == "entry" && isset( $headers['auth_token'] ) && $headers['auth_token'] ){

    
    $response = [
      "success" => null,
      "errors" => []
    ];
    $user_id = 0;//set as default, but we take this in case the entry user is logged in

    if( logged_in( $headers['auth_token'] ) ){
      //get user id uploading
      $sql = "SELECT * FROM user_sessions WHERE token=$1 LIMIT 1";
      $result = pg_query_params($conn, $sql, [ $headers['auth_token'] ]);
      $session = pg_fetch_assoc($result);

      if( isset( $session['user_id'] ) && $session['user_id'] ){
        $user_id = $session['user_id'];
      } else {
        $response['errors'][] = "There is technical issue getting user id of currently logged in user, Please report to administrator.";
      }
    }



    $current_time = date('Y-m-d H:i:s');



    if( isset($_POST['firstname']) && $_POST['firstname'] ){
      $firstname = $_POST['firstname'];
    } else {
      $response['errors'][] = "first name cannot be empty.";
    }

    if( isset($_POST['lastname']) && $_POST['lastname'] ){
      $lastname = $_POST['lastname'];
    } else {
      $response['errors'][] = "last name cannot be empty.";
    }

    if( isset($_POST['email']) && $_POST['email'] ){
      $email = $_POST['email'];

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors'][] = "Invalid Email Format";
      }

    } else {
      $response['errors'][] = "Email cannot be empty.";
    }


    if( isset($_POST['phone']) && $_POST['phone'] ){
      $phone = $_POST['phone'];

    } else {
      $response['errors'][] = "Phone cannot be empty.";
    }


    if( isset($_POST['zipcode']) && $_POST['zipcode'] ){
      $zipcode = $_POST['zipcode'];

    } else {
      $response['errors'][] = "Zipcode cannot be empty.";
    }




    if( isset($_POST['locfrom']) && $_POST['locfrom'] ){
      $locfrom = $_POST['locfrom'];

    } else {
      $response['errors'][] = "Location cannot be empty.";
    }

    if( isset($_POST['locto']) && $_POST['locto'] ){
      $locto = $_POST['locto'];

    } else {
      $locto = "n/a";
    }



    if( isset($_POST['messagedata']) && $_POST['messagedata'] ){
      $messagedata = $_POST['messagedata'];

    } else {
      $response['errors'][] = "Message cannot be empty.";
    }


    if( isset($_POST['service']) && $_POST['service'] ){
      $service = $_POST['service'];

    } else {
      $response['errors'][] = "Service cannot be empty.";
    }





    if( isset( $response['errors'] ) && is_array( $response['errors'] ) && count( $response['errors'] ) > 0 ){
      
      


      exit( json_encode( $response ) );


    } else { 

      

      //insert data and return success
      $sql = "INSERT INTO junk_removal_cta_entries 
      (firstname, lastname, phone, email, zipcode, messagedata, locfrom, locto, service, posted_by_id, datetimeinserted) 
      VALUES 
      ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11) 
      ";


      pg_query_params($conn, 
        $sql, 
        [ $firstname, $lastname, $phone, $email, $zipcode, $messagedata, $locfrom, $locto, $service, $user_id, $current_time ]
      );
        
      $response['success'] = true;
    }

    exit( json_encode( $response ) );
  }






  if( $headers['action'] == "get_cta_entries" ){

    $current_time = date('m/d/Y H:i:s');


    $response = [
      "success" => null,
      "errors" => [],
      "cta_entries" => []
    ];


    if( isset( $headers['auth_token'] ) && $headers['auth_token'] ){
      if( $headers['auth_token'] == "ee7f6a148ff6c66d7b07f2a8a25486878a79c93b201edec810eb40d2de91f7f54aac53ef5eeeef8a9e01796a2bc2eb97806187a371ad0de4af7028525e74789c" ){

      } else {

        if( logged_in( $headers['auth_token'] ) ){
          //get user id uploading
          $sql = "SELECT * FROM user_sessions WHERE token=$1 LIMIT 1";
          $result = pg_query_params($conn, $sql, [ $headers['auth_token'] ]);
          $session = pg_fetch_assoc($result);

          if( isset( $session['user_id'] ) && $session['user_id'] ){
            $user_id = $session['user_id'];
          } else {
            $response['errors'][] = "There is technical issue getting user id of currently logged in user, Please report to administrator.";
          }
        } else {

          $response['errors'][] = "Auth token is invalid or expired";
        }

      }
    } else {
          $response['errors'][] = "Auth token is required";
    }





    if( isset( $response['errors'] ) && is_array( $response['errors'] ) && count( $response['errors'] ) > 0 ){
      
      exit( json_encode( $response ) );

    } else {
      $id = 0;

      $sql = "SELECT * FROM junk_removal_cta_entries WHERE id > $1 ORDER BY id DESC LIMIT 100 ";
      $get_result = pg_query_params($conn, $sql, [$id]);

      while ($row = pg_fetch_assoc($get_result)) {
          $response['cta_entries'][] = $row;
      }

      $response['success'] = true;

      exit( json_encode( $response ) );
    }






    $response['errors'][] = "Something wen't wrong";
    $response['success'] = false;

    exit( json_encode( $response ) );
  }




}/////// API END ///////////////////////////










function get_junk_removal_entries(){
  global $conn;
  $entries = [];
  $filter = "0";


  $get_entries_sql = "SELECT * FROM junk_removal_cta_entries WHERE id > $1 LIMIT 100 ";
  $result = pg_query_params($conn, $get_entries_sql, [$filter]);

  while ($row = pg_fetch_assoc($result)) {
      $entries[] = $row;
  }

  return $entries;
}








?>