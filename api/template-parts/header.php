<?php


include(__DIR__."/../init/database.php");
include(__DIR__."/../init/main-functions.php"); 

/*
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="/assets/js/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="/assets/font-awesome-4.7.0/css/font-awesome.min.css">


	<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
	<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">



  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300..700&family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">



  <link href="/assets/main.css" rel="stylesheet" crossorigin="anonymous">


	<meta name="description" content="<?=$description;?>">
  <?php if( isset( $meta_img ) && $meta_img ): ?>

  <meta property="og:image" content="<?=$meta_img;?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <?php endif; ?>

  
	<meta name="author" content="<?=$author;?>" />
	<title><?=$pagetitle;?></title>



	<style>
    :root{
      --eco-green:#125793;
      --secondary:#081C49;
      --light:#f2f4f5;
    }

    body{scroll-behavior:smooth;}

    header{
      position:sticky;
      top:0;
      z-index:999;
      background: transparent;
    }

    .logo{text-align:center;padding:10px;}

    .nav-link{
    	color:#fff;
    }

    .nav-link:hover{
    	color:#081C49;
    }

    .btn-eco{
      background:#002243;
      color:white;
      border-radius:30px;
      padding:10px 20px;
      border:none;
      text-decoration: none;
    }
    .btn-eco:hover{opacity:.9;}

    .promo{
      background:red;
      color:white;
      text-align:center;
      padding:10px;
      font-weight:bold;
    }

    .hero{

      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0;
      padding-left: 0;
      padding-right: 0;


        padding-top:0px;
        padding-bottom: 30px;

    }


    .card-inner-scrollable{
      overflow-y: scroll;     
      max-height: 235px; 
    }

    .card-inner-scrollable::-webkit-scrollbar{
        display: none;
    }
    .card-inner-scrollable::-webkit-scrollbar-button {
        display: none;

    }

    .card-inner-scrollable .card-inner-description{
      max-width: 70%;
      margin: 0 auto;
    }


    .hero-card.junk-removal-hero{
      background: linear-gradient(to bottom, #6495AF, transparent), url("/assets/img/4f323b87-6e48-4ccd-8df6-4cf53fbdd74f.jpg");
      background-position: center center; 
    }
    
    .hero-card.move-hero{
      background: linear-gradient(to bottom, #6495AF, transparent), url("/assets/img/7551e8b6-ba7d-44a1-b778-abe419498fca.jpg");
      background-position: center center; 
    }

    .hero-card{


      background-position: center center; 
      background-repeat: no-repeat;
      min-height: 400px;
      width: 100%;


      padding:30px;
      margin: 0 auto;
    }
    .hero-card h2,
    .hero-card p{
      text-shadow: 
      2px 2px 3px #fff, 
      -2px -2px 3px #fff, 
      2px -2px 3px #fff, 
      -2px 2px 3px #fff,
      4px 4px 3px #fff, 
      -4px -4px 3px #fff, 
      4px -4px 3px #fff, 
      -6px 6px 8px #fff,
      6px 6px 8px #fff, 
      -6px -6px 8px #fff, 
      6px -6px 8px #fff, 
      -6px 6px 8px #fff;
    }

    .hero-card h2{
      font-size: 56px;
      margin-bottom: 30px;
      cursor: pointer;
      color:var(--eco-green);
      margin-top: 40px;

    }
    .hero-card a{
      text-decoration:none;
    }
    .hero-card h2:hover{
      text-shadow: 
      2px 2px 3px #125793, 
      -2px -2px 3px #125793, 
      2px -2px 3px #125793, 
      -2px 2px 3px #125793,
      4px 4px 3px #125793, 
      -4px -4px 3px #125793, 
      4px -4px 3px #125793, 
      -6px 6px 8px #125793,
      6px 6px 8px #125793, 
      -6px -6px 8px #125793, 
      6px -6px 8px #125793, 
      -6px 6px 8px #125793;
      color: #fff;
    }
    .hero-card p{
      font-size: 18px;
    }

    .popping-description{
      opacity: 0;
      transform: translateY(40px);
      transition: all 0.5s ease;
    }


    .popping-description.show {
      opacity: 1;
      transform: translateY(0);
    }

    @media(max-width: 1200px){

    }

    @media(max-width: 991px){

      .hero-card{
        max-width:100%;
      }
    }

    @media(max-width:768px){
      .hero-card{max-width:100%;}


      .hero-card h2{
        font-size: 42px;
      }
      .hero-card p{
        font-size: 16px;
      }

    }

    @media(max-width:580px){
      .hero{
        grid-template-columns: 1fr;
      }

    }

    section{padding:70px 20px;}
    .bg-light{background:var(--light);}
    .bg-green{background:var(--eco-green);color:white;}

    .service-card img{width:100%;border-radius:10px;}
    .service-card{
      background:white;
      border-radius:15px;
      padding:20px;
      height:100%;
    }

    .review-slider{overflow:hidden;position:relative;}
    .review-track{
      display:flex;
      transition:.4s;
    }
    .review-card{
	  min-width:33.33%;
	  padding:10px;
	}

	.review-card .card{
	  padding:15px;
	  font-size:0.95rem;
	}

    @media(max-width:768px){
      .review-card{min-width:100%;}
    }

    .slider-btn{
      position:absolute;
      top:50%;
      transform:translateY(-50%);
      background:var(--eco-green);
      color:white;
      border:none;
      width:40px;height:40px;
      border-radius:50%;
      z-index: 100;
    }
    .prev{left:0;}
    .next{right:0;}

    footer{background:var(--eco-green);color:white;padding:40px 20px;}
    footer a{color:white;text-decoration:none;}
    footer a:hover{text-decoration:underline;}

    .copyright{
      background:#cfd0d1;
      text-align:center;
      padding:10px;
    }

    .promo{
  	  transition: all 0.3s ease;
  	}









    


  </style>



</head>
<body>

	<header>

	  <nav class="navbar navbar-expand-lg">
	    <div class="container">

 
		  <div class="logo">
		    <a href="<?php echo $base_url; ?>"><img src="/assets/img/logoipsum-410.png" alt="Website Logo"></a>
		  </div>


	      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <div class="collapse navbar-collapse justify-content-center" id="navMenu">
	        <ul class="navbar-nav gap-3 align-items-center">
	          <li class="nav-item"><a class="nav-link" href="<?php echo $base_url; ?>/blog.php">Blogs</a></li>

						<li class="nav-item logout-nav-container"><a class="nav-link logout-btn" href="<?php echo $base_url; ?>/logout.php">Logout</a></li>

  					<li class="nav-item login-nav-container">
  						<a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#authModal">
  							Login
  						</a>
  					</li>
				
	          <li class="nav-item">
	            <a href="<?php echo $base_url; ?>#contactForm" class="btn-eco scroll-form">Schedule an appointment</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="tel:+18454020555"><i class="fa fa-phone"></i> (845) 402-0555</a>
	          </li>


	        </ul>
	      </div>
	    </div>

      <div class="container social-container">
        <ul>
          <li><a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          <li><a href="#" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
          <li><a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        </ul>
      </div>
	  </nav>

		<div class="promo" id="promoBar">
			Special promo today, book a service now and save 20%!
		</div>
	</header>






	<?php include(__DIR__."/../template-parts/auth-modal.php"); */ ?>