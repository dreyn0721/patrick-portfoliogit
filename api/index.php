<?php
// Vars
$page = "home";
$pagetitle = "Patrick Portfolio";
$description = "Welcome to Patrick's digital portfolio. Browse my latest projects, professional experience, and creative work. Let’s build something amazing together.";




include("template-parts/header.php");
?>

<!-- HERO -->
<section class="home-header-hero hero">
  <div class="hero-card junk-removal-hero">

      <div class="card-inner-scrollable">
        <a href="#contactForm"><h2 style="" href="#contactForm" class=" text-center scroll-form">Top-Rated<br> Junk Removal Services</h2></a>

        <div class="card-inner-description">
          <p>
          Say goodbye to clutter without breaking a sweat! Our team of friendly pros does all the heavy lifting, hauling everything from old furniture to yard debris. With our extra-large trucks, we remove more junk in less time, saving you hassle and trips to the landfill.
          </p>
          <p>We don’t just clear your space- we make it sustainable. Whenever possible, we recycle or donate items, keeping your cleanup eco-friendly.</p>
        </div>
      </div>

  </div>

  <div class="hero-card move-hero">
    
    <div class="card-inner-scrollable">
      <a href="#contactForm"><h2 style="" href="#contactForm" class=" text-center scroll-form">Top-Rated<br> Moving Services</h2></a>

      <div class="card-inner-description">
        <p>
        Say goodbye to heavy lifting and complicated moves. Our professional moving team handles everything from carefully packing and loading furniture to transporting and setting up your belongings safely at your new location.
      </p>
      <p>With our extra-large trucks and organized crew, we move more in fewer trips, saving you time, stress, and unnecessary delays. We don’t just move your belongings, we protect them. From proper wrapping and secure loading to careful placement in your new space, we treat every move with precision and care.
Whether you're relocating your home or business, we make the transition smooth, efficient, and hassle-free.</p>
      </div>
    </div>

  </div>


</section>

<!-- WHAT WE DO -->
<section class="section-props what-we-do">


  <h2 class="text-center mb-5" style="color:var(--eco-green)">What we do</h2>
  <div class="container">
    <div class="row g-4">

      <a href="/junkremoval.php" class="col-md-4">
        <div class="service-card">
          <img src="/assets/img/eco-friendly disposal.png">
          <h5 class="mt-3">Full-Service Junk Removal</h5>
          <ul>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> Free, no-obligation estimates</li>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> Same-day appointments available</li>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> Pay only for the space you use</li>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> Eco-friendly disposal & recycling</li>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> Large 18-cubic-yard truck capacity</li>


          </ul>
          <button class="btn-eco wwd-modal-btn "  data-bs-toggle="modal" data-bs-target="#offer1">Book Your Junk Removal Today</button>





        </div>
      </a>

      <div class="modal fade" id="offer1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header justify-content-between">
              <p></p>
              <h2 class="modal-title fs-5 " id="exampleModalLabel">Full-Service Junk Removal</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="row g-3 main-form" id="" style="scroll-margin-top: 210px;">
                <div class="response-container">
                </div>

                <div class="col-md-6"><label>Firstname:</label><input class="form-control firstname" placeholder="First name"></div>
                <div class="col-md-6"><label>Lastname:</label><input class="form-control lastname" placeholder="Last name"></div>
                <div class="col-md-6"><label>Email:</label><input class="form-control email" placeholder="Email"></div>
                <div class="col-md-6"><label>Phone number</label><input class="form-control phone" placeholder="Phone number"></div>
                <div class="col-md-12"><label>Zipcode</label><input class="form-control zipcode" placeholder="Zip code"></div>

                <div class="col-md-12"><label>Location:</label><input class="form-control location-from" placeholder="Location"></div>
                <div class="col-md-12"><label>Location to: <small>(optional)</small></label><input class="form-control location-to" placeholder="Location To"></div>


                <div class="col-md-12"><label>Message</label><textarea name="messagedata" class="form-control messagedata" rows="5" placeholder="Message"></textarea></div>

                <div class="col-md-12 radio-input-container mt-5">
                  <h3>Select Service</h3>
                  <div class="radio-group">

                    <input type="hidden" name="servicesSelected" class="services-selected" value="Junk Removal">

                    <label class="radio-card">
                      <input type="checkbox" name="serviceType[]" class="radio-input-service" value="Junk Removal" checked>
                      <span class="radio-content">
                        <strong>Junk Removal</strong>
                      </span>
                    </label>

                    <label class="radio-card">
                      <input type="checkbox" name="serviceType[]" class="radio-input-service" value="Move-Out" >
                      <span class="radio-content">
                        <strong>Move-Out</strong>
                      </span>
                    </label>

                    <label class="radio-card">
                      <input type="checkbox" name="serviceType[]" class="radio-input-service" value="Junk and Moveout" >
                      <span class="radio-content">
                        <strong>Junk and Moveout</strong>
                      </span>
                    </label>



                  </div>
                </div>

                <div class="col-12 text-center">
                  <button class="btn-eco submit-btn">Submit and we will call you</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>




      <a href="/moveout.php" class="col-md-4">
        <div class="service-card">
          <img src="/assets/img/d6bb469a-1577-4a43-b2b8-6d3e4a3b2405.jpg">
          <h5 class="mt-3">Move Out</h5>
          <ul>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> We help move, load, and transport your belongings</li>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> Convenient pickup and drop-off</li>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> Driveway-friendly, no heavy lifting for you</li>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> Flexible scheduling to fit your timeline</li>
          </ul>
          <button class="btn-eco wwd-modal-btn " data-bs-toggle="modal" data-bs-target="#offer2">Schedule Your Move-Out Assistance</button>
        </div>
      </a>

      <div class="modal fade" id="offer2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header justify-content-between">
              <p></p>
              <h2 class="modal-title fs-5 " id="exampleModalLabel">Schedule Your Move-Out Assistance</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="row g-3 main-form" id="" style="scroll-margin-top: 210px;">
                <div class="response-container">
                </div>

                <div class="col-md-6"><label>Firstname:</label><input class="form-control firstname" placeholder="First name"></div>
                <div class="col-md-6"><label>Lastname:</label><input class="form-control lastname" placeholder="Last name"></div>
                <div class="col-md-6"><label>Email:</label><input class="form-control email" placeholder="Email"></div>
                <div class="col-md-6"><label>Phone number</label><input class="form-control phone" placeholder="Phone number"></div>
                <div class="col-md-12"><label>Zipcode</label><input class="form-control zipcode" placeholder="Zip code"></div>

                <div class="col-md-12"><label>Location:</label><input class="form-control location-from" placeholder="Location"></div>
                <div class="col-md-12"><label>Location to: <small>(optional)</small></label><input class="form-control location-to" placeholder="Location To"></div>


                <div class="col-md-12"><label>Message</label><textarea name="messagedata" class="form-control messagedata" rows="5" placeholder="Message"></textarea></div>

                <div class="col-md-12 radio-input-container mt-5">
                  <h3>Select Service</h3>
                  <div class="radio-group">

                    <input type="hidden" name="servicesSelected" class="services-selected" value="Move-Out">

                    <label class="radio-card">
                      <input type="checkbox" name="serviceType[]" class="radio-input-service" value="Junk Removal" >
                      <span class="radio-content">
                        <strong>Junk Removal</strong>
                      </span>
                    </label>

                    <label class="radio-card">
                      <input type="checkbox" name="serviceType[]" class="radio-input-service" value="Move-Out" checked>
                      <span class="radio-content">
                        <strong>Move-Out</strong>
                      </span>
                    </label>

                    <label class="radio-card">
                      <input type="checkbox" name="serviceType[]" class="radio-input-service" value="Junk and Moveout" >
                      <span class="radio-content">
                        <strong>Junk and Moveout</strong>
                      </span>
                    </label>



                  </div>
                </div>

                <div class="col-12 text-center">
                  <button class="btn-eco submit-btn">Submit and we will call you</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>






      <a href="/junkremovalandmoveout.php" class="col-md-4">
        <div class="service-card">
          <img src="/assets/img/junk removal.png">
          <h5 class="mt-3">Junk Removal & Move Out</h5>
          <ul>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> We move, load, and remove your items</li>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> Convenient pickup and drop-off</li>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> Eco-friendly disposal & recycling</li>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> Flexible scheduling to fit your timeline</li>
            <li><i class="fa fa-check-square" aria-hidden="true"></i> Large capacity for any size project</li>
          </ul>
          <button class="btn-eco wwd-modal-btn " data-bs-toggle="modal" data-bs-target="#offer3">Get Full-Service Help Now</button>
        </div>
      </a>

      <div class="modal fade" id="offer3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header justify-content-between">
              <p></p>
              <h2 class="modal-title fs-5 " id="exampleModalLabel">Get Full-Service Help Now</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="row g-3 main-form" id="" style="scroll-margin-top: 210px;">
                <div class="response-container">
                </div>

                <div class="col-md-6"><label>Firstname:</label><input class="form-control firstname" placeholder="First name"></div>
                <div class="col-md-6"><label>Lastname:</label><input class="form-control lastname" placeholder="Last name"></div>
                <div class="col-md-6"><label>Email:</label><input class="form-control email" placeholder="Email"></div>
                <div class="col-md-6"><label>Phone number</label><input class="form-control phone" placeholder="Phone number"></div>
                <div class="col-md-12"><label>Zipcode</label><input class="form-control zipcode" placeholder="Zip code"></div>

                <div class="col-md-12"><label>Location:</label><input class="form-control location-from" placeholder="Location"></div>
                <div class="col-md-12"><label>Location to: <small>(optional)</small></label><input class="form-control location-to" placeholder="Location To"></div>


                <div class="col-md-12"><label>Message</label><textarea name="messagedata" class="form-control messagedata" rows="5" placeholder="Message"></textarea></div>

                <div class="col-md-12 radio-input-container mt-5">
                  <h3>Select Service</h3>
                  <div class="radio-group">

                    <input type="hidden" name="servicesSelected" class="services-selected" value="Junk and Moveout">

                    <label class="radio-card">
                      <input type="checkbox" name="serviceType[]" class="radio-input-service" value="Junk Removal" >
                      <span class="radio-content">
                        <strong>Junk Removal</strong>
                      </span>
                    </label>

                    <label class="radio-card">
                      <input type="checkbox" name="serviceType[]" class="radio-input-service" value="Move-Out" >
                      <span class="radio-content">
                        <strong>Move-Out</strong>
                      </span>
                    </label>

                    <label class="radio-card">
                      <input type="checkbox" name="serviceType[]" class="radio-input-service" value="Junk and Moveout" checked>
                      <span class="radio-content">
                        <strong>Junk and Moveout</strong>
                      </span>
                    </label>



                  </div>
                </div>

                <div class="col-12 text-center">
                  <button class="btn-eco submit-btn">Submit and we will call you</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- REVIEWS -->
<section id="reviews" class="section-glow">
  <h2 class="text-center mb-4">Reviews</h2>
  <div class="container review-slider">
    <button class="slider-btn prev">&#10094;</button>
    <button class="slider-btn next">&#10095;</button>

    <div class="review-track">
      <!-- 6 review cards -->

      	<div class="review-card">
		  <div class="card text-center">
		    <img src="/assets/img/default-profile.jpg" class="review-img rounded-circle mx-auto mb-2">
		    <h6 class="mb-1">Michael R. Dawson</h6>
		    <p class="review-text mb-2">
		      “Fast, professional, and affordable. They cleared out my garage in less than an hour and even swept afterward. Scheduling was easy and the crew was super friendly.”
		    </p>
		    ⭐⭐⭐⭐⭐
		  </div>
		</div>

		<div class="review-card">
		  <div class="card text-center">
		    <img src="/assets/img/default-profile.jpg" class="review-img rounded-circle mx-auto mb-2">
		    <h6 class="mb-1">Amanda L. Brooks</h6>
		    <p class="review-text mb-2">
		      “I called in the morning and they were able to come the same day. Great communication and fair pricing. I highly recommend them for any junk removal needs.”
		    </p>
		    ⭐⭐⭐⭐⭐
		  </div>
		</div>

		<div class="review-card">
		  <div class="card text-center">
		    <img src="/assets/img/default-profile.jpg" class="review-img rounded-circle mx-auto mb-2">
		    <h6 class="mb-1">Jason P. Miller
</h6>
		    <p class="review-text mb-2">
		      “Outstanding service from start to finish. They removed old furniture and appliances without any hassle. The team was respectful and worked quickly.”
		    </p>
		    ⭐⭐⭐⭐⭐
		  </div>
		</div>

		<div class="review-card">
		  <div class="card text-center">
		    <img src="/assets/img/default-profile.jpg" class="review-img rounded-circle mx-auto mb-2">
		    <h6 class="mb-1">Stephanie K. Turner</h6>
		    <p class="review-text mb-2">
		      “I’ve used other junk removal companies before, but this one was by far the best. On time, transparent pricing, and no mess left behind.”
		    </p>
		    ⭐⭐⭐⭐⭐
		  </div>
		</div>

		<div class="review-card">
		  <div class="card text-center">
		    <img src="/assets/img/default-profile.jpg" class="review-img rounded-circle mx-auto mb-2">
		    <h6 class="mb-1">Robert J. Coleman</h6>
		    <p class="review-text mb-2">
		      “Excellent experience. They helped clean out a rental property and handled everything efficiently. Saved me a lot of time and stress.”
		    </p>
		    ⭐⭐⭐⭐⭐
		  </div>
		</div>

		<div class="review-card">
		  <div class="card text-center">
		    <img src="/assets/img/default-profile.jpg" class="review-img rounded-circle mx-auto mb-2">
		    <h6 class="mb-1">Lisa M. Hernandez</h6>
		    <p class="review-text mb-2">
		      “Very impressed with their professionalism. Booking was simple, and the crew arrived exactly when promised. I will definitely use them again.”
		    </p>
		    ⭐⭐⭐⭐⭐
		  </div>
		</div>


    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section id="how" class="section-fade">
  <h2 class="text-center mb-3">How it works</h2>
  <p class="text-center container">
    Getting rid of unwanted junk has never been easier. Simply schedule your junk removal appointment online or by phone, and our friendly team will confirm a time that works best for you, often with same-day or next-day availability. When we arrive, just point to the items you want removed and we’ll take care of all the heavy lifting, loading, and cleanup, so you don’t have to lift a finger. Before we begin, you’ll receive a clear, upfront price based on the volume and type of junk, with no hidden fees or surprises. Once approved, our fully licensed and insured crew efficiently removes everything from furniture and appliances to yard waste and construction debris. After loading, we sweep the area clean and ensure your space is left neat and clutter-free. Whenever possible, we responsibly recycle or donate usable items, minimizing landfill waste and helping local communities. From start to finish, our process is fast, transparent, and stress-free, designed to give you peace of mind and a clean space in just one visit.
  </p>
</section>

<!-- FAQ -->
<section>
  <h2 class="text-center mb-4">FAQ</h2>
  <div class="container accordion" id="faq">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#q1">
          What items do you remove?
        </button>
      </h2>
      <div id="q1" class="accordion-collapse collapse show">
        <div class="accordion-body">
          We remove most non-hazardous items, including furniture, appliances, mattresses, electronics, yard waste, construction debris, and general household junk. If you’re unsure about a specific item, just give us a call.
        </div>
      </div>
    </div>

    <div class="accordion-item">
       <h2 class="accordion-header">
          <button class="accordion-button collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#q2">
            Do you offer same-day or next-day service?
          </button>
       </h2>

      <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faq">
        <div class="accordion-body">
          Yes! We offer same-day and next-day junk removal in most areas, depending on availability. Call us early for the best chance at same-day pickup.
        </div>
      </div>
    </div>




    

    <div class="accordion-item">
       <h2 class="accordion-header">
          <button class="accordion-button collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#q3">
            How much does junk removal cost?
          </button>
       </h2>

      <div id="q3" class="accordion-collapse collapse" data-bs-parent="#faq">
        <div class="accordion-body">
          Pricing is based on the volume of junk, item type, and labor required. We provide upfront, no-obligation quotes before starting any work, no hidden fees.
        </div>
      </div>
    </div>


    

    <div class="accordion-item">
       <h2 class="accordion-header">
          <button class="accordion-button collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#q4">
            Do I need to be present during the pickup?
          </button>
       </h2>

      <div id="q4" class="accordion-collapse collapse" data-bs-parent="#faq">
        <div class="accordion-body">
          Not always. As long as we have clear access to the items and prior approval, we can remove your junk even if you’re not on-site.
        </div>
      </div>
    </div>


    

    <div class="accordion-item">
       <h2 class="accordion-header">
          <button class="accordion-button collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#q5">
            Are you licensed and insured?
          </button>
       </h2>

      <div id="q5" class="accordion-collapse collapse" data-bs-parent="#faq">
        <div class="accordion-body">
          Yes. We are fully licensed and insured, so your property is protected while we work.
        </div>
      </div>
    </div>


    

    <div class="accordion-item">
       <h2 class="accordion-header">
          <button class="accordion-button collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#q6">
            Do you recycle or donate items?
          </button>
       </h2>

      <div id="q6" class="accordion-collapse collapse" data-bs-parent="#faq">
        <div class="accordion-body">
          Absolutely. We make every effort to recycle, donate, or responsibly dispose of items whenever possible to minimize landfill waste.
        </div>
      </div>
    </div>


    

    <div class="accordion-item">
       <h2 class="accordion-header">
          <button class="accordion-button collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#q7">
            What items can’t you take?
          </button>
       </h2>

      <div id="q7" class="accordion-collapse collapse" data-bs-parent="#faq">
        <div class="accordion-body">
          We cannot remove hazardous materials such as chemicals, paint, asbestos, medical waste, or flammable liquids. Contact us if you’re unsure, we’ll guide you.
        </div>
      </div>
    </div>


    

    <div class="accordion-item">
       <h2 class="accordion-header">
          <button class="accordion-button collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#q8">
            How do I schedule a pickup?
          </button>
       </h2>

      <div id="q8" class="accordion-collapse collapse" data-bs-parent="#faq">
        <div class="accordion-body">
          You can schedule online through our booking form or call us directly. Our team will confirm the time and provide a clear quote before removal.
        </div>
      </div>
    </div>


    

    <div class="accordion-item">
       <h2 class="accordion-header">
          <button class="accordion-button collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#q9">
            Do you handle commercial junk removal?
          </button>
       </h2>

      <div id="q9" class="accordion-collapse collapse" data-bs-parent="#faq">
        <div class="accordion-body">
          Yes. We offer junk removal for businesses, offices, retail spaces, property managers, and construction sites.
        </div>
      </div>
    </div>


    

    <div class="accordion-item">
       <h2 class="accordion-header">
          <button class="accordion-button collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#q10">
            Will you clean up after removing the junk?
          </button>
       </h2>

      <div id="q10" class="accordion-collapse collapse" data-bs-parent="#faq">
        <div class="accordion-body">
          Yes. After removal, we sweep and clean the area, leaving your space neat and clutter-free.
        </div>
      </div>
    </div>


  </div>
</section>

<!-- FORM -->
<section id="form" class="bg-light" style="padding-top: 170px;">
  <h2 class="text-center mb-4">Schedule an appointment now</h2>
  <div class="container">
    <form class="row g-3 main-form" id="contactForm" style="scroll-margin-top: 210px;">
      <div class="response-container">
      </div>

      <div class="col-md-6"><label>Firstname:</label><input class="form-control firstname" placeholder="First name"></div>
      <div class="col-md-6"><label>Lastname:</label><input class="form-control lastname" placeholder="Last name"></div>
      <div class="col-md-6"><label>Email:</label><input class="form-control email" placeholder="Email"></div>
      <div class="col-md-6"><label>Phone number</label><input class="form-control phone" placeholder="Phone number"></div>
      <div class="col-md-12"><label>Zipcode</label><input class="form-control zipcode" placeholder="Zip code"></div>

      <div class="col-md-12"><label>Location:</label><input class="form-control location-from" placeholder="Location"></div>
      <div class="col-md-12"><label>Location to: <small>(optional)</small></label><input class="form-control location-to" placeholder="Location To"></div>


      <div class="col-md-12"><label>Message</label><textarea name="messagedata" class="form-control messagedata" rows="5" placeholder="Message"></textarea></div>

      <div class="col-md-12 radio-input-container mt-5">
        <h3>Select Service</h3>
        <div class="radio-group">


          <input type="hidden" name="servicesSelected" class="services-selected">

          <label class="radio-card">
            <input type="checkbox" name="serviceType[]" class="radio-input-service" value="Junk Removal" required>
            <span class="radio-content">
              <strong>Junk Removal</strong>
            </span>
          </label>

          <label class="radio-card">
            <input type="checkbox" name="serviceType[]" class="radio-input-service" value="Move-Out" required>
            <span class="radio-content">
              <strong>Move-Out</strong>
            </span>
          </label>

          <label class="radio-card">
            <input type="checkbox" name="serviceType[]" class="radio-input-service" value="Junk and Moveout" required>
            <span class="radio-content">
              <strong>Junk and Moveout</strong>
            </span>
          </label>



        </div>
      </div>

      <div class="col-12 text-center">
        <button class="btn-eco submit-btn">Submit and we will call you</button>
      </div>
    </form>
  </div>
</section>





















<script type="text/javascript">
  jQuery( document ).ready(function(){



    // slider
    let index=0;
    const track=document.querySelector('.review-track');
    const cards=document.querySelectorAll('.review-card').length;
    document.querySelector('.next').onclick=()=>{index=Math.min(index+1,cards-3);track.style.transform=`translateX(-${index*33.33}%)`;}
    document.querySelector('.prev').onclick=()=>{index=Math.max(index-1,0);track.style.transform=`translateX(-${index*33.33}%)`;}

  













// hero slider BG
  var backgroundsjunkremoval = [
      '',
      '/assets/img/10b1bc00-5e90-4812-bb9e-454da694479c.jpg',
      '/assets/img/1386a671-a17f-4d90-84cd-3dd084c5b95c.jpg',
      '/assets/img/56258208-fd80-4e35-8bf8-5f01cf9e5e84.jpg'
  ];


  var backgroundsmovepros = [
      '',
      '/assets/img/0071e529-ba9c-453a-a079-7d8724629abb.jpg',
      '/assets/img/a8ec3554-ac8a-46ce-a41e-296a074c2aad.jpg',
      '/assets/img/60abad55-52b8-45ec-ae2f-fcaa402e6b05.jpg'
  ];

  var currentBackground = 0;
  var sliderJunk = jQuery('.hero-card.junk-removal-hero ');
  var sliderMove = jQuery('.hero-card.move-hero ');

  // Function to change the background and trigger the slide
  function changeBackground() {

      currentBackground = (currentBackground + 1) ;

      if( currentBackground > 3 ){
        currentBackground = 1
      }

      sliderJunk.css({
        'background': 'linear-gradient(to bottom, #6495AF, transparent), url("' + backgroundsjunkremoval[currentBackground] + '")',
        'background-size': 'cover', // Or '100% 100%', 'contain' [7, 8]
        'background-repeat': 'no-repeat', // Or '100% 100%', 'contain' [7, 8]
        'background-position': 'center center'
      });

      sliderMove.css({
        'background': 'linear-gradient(to bottom, #6495AF, transparent), url("' + backgroundsmovepros[currentBackground] + '")',
        'background-size': 'cover', // Or '100% 100%', 'contain' [7, 8]
        'background-repeat': 'no-repeat', // Or '100% 100%', 'contain' [7, 8]
        'background-position': 'center center'
      });



  }

  // Set an interval to call the changeBackground function every 3 seconds (3000 milliseconds)
  setInterval(changeBackground, 5000);




  // jQuery("a").click(function(e){
  //   e.preventDefault();
  //   changeBackground();
  // });

});



</script>

<?php include("template-parts/footer.php"); ?>