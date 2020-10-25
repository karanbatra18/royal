@extends('layouts.dashboard', [ 'titlePage' => __('Swyamber')])

@section('content')

    <style>
    	#main-secc{
                   width: 100%;
                   display: flex;
                   justify-content: center;
                   align-items: center;
                   background-color: #e7e6e6;
                   padding:10px 10px;
    	}

    	.grid0{
    		width: 75%;
    		background:white;}

    	.grid-parent{
    		display: grid;
    		grid-template-columns: 1fr 2fr 1fr;
    		grid-template-rows: 1fr;   
        height: 215px;
        overflow: hidden; 		
    	}
    	.grid-image img{width: 100%;}
        #share-mater{background:#34495e;}
        #share-mater ul{
        	padding:0;}

        #share-mater ul li{
        	list-style: none;
        	width: 100%;
        }

        #share-mater ul li a{
        	color: white;
        	text-decoration: none;
        	text-transform: capitalize;
        	font-size: 20px;
        	display: block;
        	padding: 12px 25px;
        }

        #bg-ger{background:#f0f2f7;padding: 20px 20px 0px 20px;}

        #padd-20{padding-left:20px;}
         
        #share-mater ul li a:hover{background:#d9475c;} 
        #bg-ger-child{
        	border-bottom: 1px solid;
            font-size: 24px;
            margin-bottom: 10px;}
        .fa-question-circle-o{font-size: 20px;padding: 0px 10px}
        .fa-shield{font-size: 20px;}
        .fa-shield sup{
            background: #d9475c;
		    color: white;
		    padding: 0px 4px;
		    border-radius: 50px;
		    margin: -3px;}
		#bg-ger-right{
			float: right;
			font-size: 12px;
			padding-top:10px;
			color: grey;}
        
        #bg-ger-ul{
        	list-style: none;
        	display: grid;
        	grid-template-columns: 1fr 1fr;
        	padding: 0;
        }

        #bg-ger-ul li{
        	font-size: 13px; 
            padding: 3px 0px;}

        #bg-ger-suce-ul ul{
        	padding: 0;
        	margin:0;
        }
        #bg-ger-suce-ul ul li{
        	list-style: none;
        	display: inline-block;
            padding: 0px 10px 0px 0px;
            margin-top: 6px;}   
        
        #bg-ger-suce-ul ul li a{
        	font-size: 20px;
        	color: #34495e;
        }

        .grid-second{
        	display: grid;
        	grid-template-columns: 3fr 1fr;
        	grid-gap: 0px 20px;
        	width: 75%;

        }
        
    .grid-second-child{background: white; height: fit-content;}
 
  .spadd{padding: 30px 22px 10px 50px;}
  .spadd p{font-size: 15px;}
  .lh18{line-height: 18px;color: #34495e}
  .pt20{padding-top: 15px;color: silver;}
  #section1 {height:auto;border-bottom: 1px solid #34495e}
 
  #section2 {height:auto;border-bottom: 1px solid #34495e}
  #section3 {height:auto;border-bottom: 1px solid #34495e}
  #section4 {height:auto;border-bottom: 1px solid #34495e}
  #section5 {height:auto;border-bottom: 1px solid #34495e}
  .navbar-sticky-top{position: sticky;top: 0;padding: 0}
  .navbar-sticky-top ul{width: 100%;border-bottom: 1px solid}
  .navbar-sticky-top ul li{width: 25%!important;text-align: center;}
  .navbar-sticky-top ul li a{
  	        width: 100%!important;
  	        display: grid;
  	        color: #34495e;
  	        font-size: 16px;
  	        z-index: 99999;
  	        background: white;
  	     }


  	.navbar-sticky-top ul li a:hover{background: white} 
  	.left-same-col{
  		font-size: 17px;
	    color: #d9475c;
	    font-weight: inherit;
	    position: relative;}   

	.left-same-col i{
			padding-right: 10px;
		    margin-left: -33px;
		    position: absolute;
            margin-top: -3px;
            z-index: 1;}  
    .spadd-ul{
    	padding: 0;
    	margin:0;
    	list-style: none;
    	display: grid;
    	grid-template-columns: 1fr 1fr;}  

    .spadd-ul li{
    	padding-top: 15px;
    	display: grid;
    	color:#999;
    	font-size: 15px;
        letter-spacing: .50px;
    }

    .spadd-ul-s{color: #34495e}
    .spadd-ul-lp{
    	text-align:  right;
        letter-spacing: .50px;
        padding-top: 20px;}
    .spadd-ul-lp i{
    	transform: rotate(45deg);
    	font-size: 20px;
    	margin-right: 10px;}

    .pt1-5{padding-top:20px;letter-spacing: .50px}
    .pt1-5 i{padding-right:  88px;}
    .spaddl-p{text-align: right;letter-spacing: .50px;margin-top: 30px;}
    .rd-col{color: #d9475c;}
    .lhauto{padding: 15px;}
    .same-gre{color:#999}
    tr{    
    	padding: 15px 0;
        border-bottom: 1px solid #f1f1f1!important;}
    .pt-49{    
    	       padding-top: 44px;
               border-bottom: 1px solid;
                   margin-bottom: 15px;
    }
    .pt-49 p{
            font-size: 17px;
            padding-left: 16px;}

    .pr-17{padding: 15px 16px 0px 16px;}

    .pr-17a{background: #34495e;
		    font-size: 14px;
		    color: white;
		    width: 100%;
		    display: inline-block;
		    padding: 10px 10px;
		    text-align: center;}
      .pr-17a:hover{color: white;text-decoration: none;}
    </style>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            
            <section id="main-secc">
		<div class="grid0">
			<div class="grid-parent">
				<div class="grid-child-3">
					<!-- <img  src="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg"> -->
            <div id="lightgallery" class="grid-image">
               <a href="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg">
                  <img src="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg" />
                </a>
              
               <a style="display: none;" href="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg">
                  <img src="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg" />
                </a>

                <a style="display: none;" href="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg">
                  <img src="https://imagecdn.jeevansathi.com/18702/16/374056319-1593341057.jpeg" />
                </a>
              </div>
				</div>
				<div class="grid-child-3" id="bg-ger">
					<div id="bg-ger-child">
						<span>XYRX9881</span><span><i class="fa fa-question-circle-o"></i></span><span><i class="fa fa-shield"><sup>1</sup></i></span><span id="bg-ger-right">Last seen on 02-Oct-20</span>
					</div>
					<ul id="bg-ger-ul">
						<li>26, 5' 5"</li>
						<li>BCA</li>
						<li>New Delhi</li>
						<li>Not working</li>
						<li>Hindu: Others</li>
						<li>No Income</li>
						<li>Hindi-Delhi</li>
						<li>Never Married</li>
					</ul>
					<div id="bg-ger-suce-ul">
						<ul>
							<li><a href="#"><i class="material-icons">history</i></a></li>
							<li><a href="#"><i class="material-icons">share</i></a></li>
							<li><a href="#"><i class="material-icons">block</i></a></li>
							<li><a href="#"><i class="material-icons">flag</i></a></li>
						</ul>
					</div>
				</div>

				<div class="grid-child-3"id="share-mater">
					<ul>
						<li><a href="#"><i class="fa fa-share-alt"></i><span id="padd-20">Share</span></a></li>
						<li><a href="#"><i class="fa fa-phone"></i><span id="padd-20">Share</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- div second sctoll-spy -->
	<section  id="main-secc">
		<div class="grid-second">
			<div class="grid-second-child">
		          <div class="collapse navbar-collapse navbar-sticky-top" id="myNavbar">
			        <ul class="nav navbar-nav">
				          <li><a href="#section1"><span><i class="material-icons"> person</i></span><span>About Her</span></a></li>
				          <li><a href="#section2"><span><i class="material-icons"> 	school</i></span><span>Education & Career</span></a></li>
				          <li><a href="#section3"><span><i class="material-icons"> 	supervisor_account</i></span><span>Family Details</span></a></li>
				          <li><a href="#section4"><span><i class="material-icons"> remove_red_eye</i></span><span>Desired Partner</span></a></li>
			          </ul>

			           
			      </div>

				<div id="section1" class="container-fluid spadd">
				  <p>Profile managed by Parent</p>
				  <p class="lh18">I made this profile on behalf of my Grand Daughter [Name Hidden] ,Brought up by Grandparents Sh.Mp.Singh & Smt. Laxmi Raghav(Ranga). Her Mother Ms.Urmila Rani is a single mother. [Name Hidden] is Born n brought up in Delhi only. She is currently pursuing her BCA Correspondence. she is very good at painting, also love hearing to music.</p>
				  <p class="pt20">About her Family<br>
				   Not filled in</p>
				  <p class="pt20">Education<br>Not filled in</p>
				  <p class="pt20">Occupation<br>Not filled in</p>
				</div>
				  
				<div id="section2" class="container-fluid spadd">
					<span class="left-same-col"><i class="material-icons"> 	school</i>Education & Career</span>

					<ul class="spadd-ul">
						<li><span>Highest Education</span><span class="spadd-ul-s">BCA</span></li>
						<li><span>School Name</span><span>Not filled in</span></li>
						<li><span>UG Degree</span><span class="spadd-ul-s">BCA</span></li>
						<li><span>UG College </span><span>Not filled in</span></li>
						<li><span>Other UG Degree</span><span>Not filled in</span></li>
						<li><span>Employed In</span><span class="spadd-ul-s">Not working</span></li>
						<li><span>Occupation</span><span class="spadd-ul-s">Not working</span></li>
						<li><span>Organization Name</span><span>Not filled in</span></li>
						<li><span>Annual Income</span><span class="spadd-ul-s">No Income</span></li>
					</ul>
					<p class="spadd-ul-lp spadd-ul-s"><i class="fa fa-thumb-tack"></i>Not interested in settling abroad</p>
				</div>
				<div id="section3" class="container-fluid spadd">
					<span class="left-same-col"><i class="material-icons"> 	supervisor_account</i>Family Details</span>

					<ul class="spadd-ul">
						<li><span>Mother's Occupation</span><span class="spadd-ul-s">Housewife</span></li>
						<li><span>Father's Occupation</span><span>Not filled in</span></li>
						<li><span>Sister(s)</span><span class="spadd-ul-s">0 sister</span></li>
						<li><span>Brother(s)</span><span>0 brother</span></li>
						<li><span>Gothra</span><span>Sandilya</span></li>
						<li><span>Gothra (maternal)</span><span class="spadd-ul-s">Ranga</span></li>
						<li><span>Family Status</span><span class="spadd-ul-s">Middle Class</span></li>
						<li><span>Family Income</span><span>Not filled in</span></li>
						<li><span>Family Type</span><span class="spadd-ul-s">Joint Family</span></li>
						<li><span>Family Values</span><span class="spadd-ul-s">Liberal</span></li>
						<li><span>Family based out of</span><span class="spadd-ul-s">New Delhi</span></li>
					</ul>
					<p class="spadd-ul-lp spadd-ul-s"><i class="fa fa-thumb-tack"></i>Not interested in settling abroad</p>
				</div>
				
				<div id="section3" class="container-fluid spadd">
					<span class="left-same-col"><i class="material-icons"> 	supervisor_account</i>Lifestyle	</span>

					<ul class="spadd-ul">
						<li><span>Habits</span><span class="spadd-ul-s">Not filled in</span></li>
						<li><span>Assets</span><span>Not filled in</span></li>
						<li><span>Languages Known</span><span class="spadd-ul-s">Not filled in</span></li>
						<li><span>Blood Group</span><span>Not filled in</span></li>
						<li><span>Residential Status</span><span>Not filled in</span></li>
						<li><span>Special Cases</span><span class="spadd-ul-s">HIV+ - No</span></li>
					</ul>
				</div>
				<div id="section4" class="container-fluid spadd">
					<span class="left-same-col"><i class="material-icons"> 	supervisor_account</i>She Likes	</span>


					 		<p class="pt1-5"><i class="fa fa-paint-brush"></i>
					 		Painting, Cooking</p>

					 		<p class="pt1-5"><i class="fa fa-headphones"></i>
					 		Listening to music, Watching television</p>

				</div>


				<div id="section3" class="container-fluid spadd">
					<span class="left-same-col"><i class="material-icons"> remove_red_eye</i>Desired Partner</span>
					<p class="spaddl-p"><span class="rd-col">Her Preference</span ><span class="lhauto">---------</span><span>7 of 12 matching</span><span class="lhauto">------</span><span class="rd-col">Matches You</span></p>
                    <table class="table">
                    	<tr>
                    		<td class="same-gre">Age</td>
                    		<td>26 to 32 Years</td>
                    		<td>----</td>
                    	</tr>
                    	<tr>
                    		<td class="same-gre">Height</td>
                    		<td> 5' 6" to 6' 0"</td>
                    		<td class="rd-col"><i class="fa fa-check"></i></td>
                    	</tr>
                    	<tr>
                    		<td class="same-gre">Marital Status</td>
                    		<td>Never Married</td>
                    		<td class="rd-col"><i class="fa fa-check"></i></td>
                    	</tr>
                    	<tr>
                    		<td class="same-gre">Country</td>
                    		<td>India</td>
                    		<td class="rd-col"><i class="fa fa-check"></i></td>
                    	</tr>
                    	<tr>
                    		<td class="same-gre">State/City</td>
                    		<td> Delhi, Noida, Gurgaon, Faridabad, Ghaziabad, Greater Noida, Sahibabad</td>
                    		<td class="rd-col"><i class="fa fa-check"></i></td>
                    	</tr>
                    	<tr>
                    		<td class="same-gre">Religion</td>
                    		<td>Hindu, Other</td>
                    		<td class="rd-col"><i class="fa fa-check"></i></td>
                    	</tr>
                    	<tr>
                    		<td class="same-gre">Mother tongue</td>
                    		<td>Hindi-Delhi, Hindi-MP/CG, Hindi-UP/UK, Hindi-Bihar/Jharkhand, Haryanvi</td>
                    		<td class="rd-col"><i class="fa fa-check"></i></td>
                    	</tr>
                    </table>


				</div>
			</div>
			<div class="grid-second-child">
				<div class="pt-49">
				   <p>Horoscope</p>
				</div>
				  <p class="pt20 pr-17" >Place of Birth<br>Not filled in</p>
				  <p class="pt20 pr-17">Date of Birth<br>Jun 27, 1994</p>
				  <p class="pt20 pr-17">Time of Birth<br>Not filled in</p>
				  <p class="pt20 pr-17">Horoscope match is not necessary</p>
				  <p class="pt20 pr-17">Sun sign<br>Not filled in</p>
				  <p class="pt20 pr-17">Rashi/Moon Sign<br>Jun 27, 1994</p>
				  <p class="pt20 pr-17">Nakshatra<br>Not filled in</p>
				  <p class="pt20 pr-17">Manglik<br>Non Manglik</p>
				 <p class="pt20 pr-17"> <a href="#" class="pr-17a">Request horoscope</a></p>

			</div>
		</div>
	</section>


            
           </div>
      </div>
   </div>
  </div>
@endsection

@section('script')
    <script>

        $(document).ready(function() {
           $('#lightgallery').lightGallery(); 
  // Add scrollspy to <body>
  $('body').scrollspy({target: "#myNavbar", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  $("#myNavbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash-100;
      });
    }  // End if
  });
});
    </script>

@endsection



