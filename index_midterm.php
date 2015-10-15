<?php
//MIDTERM ADDITIONS - DATABASE CONNECTION
// Create Database connection
$con=mysqli_connect("db536766613.db.1and1.com","dbo536766613","IMCsql!s05","db536766613");

// Check Database connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 
	if(isset($_POST['name'])) {
	
//MIDTERM ADDITIONS - EXPERT TIP - AVOID POSTING LOOP
	 if(isset($_POST['cookie'])) {
	  $COOKIELOAD=1; }
	  
		 $CARTCOUNT = 0;
	     $UNAME = ($_POST['name']);
		 $GREETING = 'Welcome back '. $UNAME.'.';
		 
	//MIDTERM ADDITIONS - SQL SELECT TO GET USER DETAILS	
		 $search1 = mysqli_query($con,"SELECT * FROM `Customer` WHERE UID = '". $UNAME ."'");
		 if(mysqli_num_rows($search1) > 0){
		 while($row = mysqli_fetch_array($search1)) {
		  $CARTCOUNT = $row[CartItems];
		  $PREF = $row[Pref];
		  $LATEST = $row[LastCart];
		  }
	//MIDTERM ADDITIONS - LOGIC TO SET BOOKS
	      $search2 = mysqli_query($con,"SELECT * FROM `Bookdetails` WHERE CatID = '". $PREF ."'");
		  if($LATEST != 0) {
		   $n=2;
		   $search3 = mysqli_query($con,"SELECT * FROM `Bookdetails` WHERE bid = '". $LATEST ."'");
	       $BOOKID1=$LATEST;
		   while($row = mysqli_fetch_array($search3)) {
		   ${"BOOKPIC1"} = $row[Image];
		   ${"BOOKTITLE1"} = $row[Title];
		   ${"BOOKAUTH1"} = $row[Author];
		   ${"BOOKDESC1"} = $row[Description];
		   ${"BOOKPRICE1"} = $row[Price];
		   }
		  } else 
		  { $n=1; 
		  }
		  while($row = mysqli_fetch_array($search2)) {
		  if($row[bid] != $LATEST){
	       ${"BOOKID$n"} = $row[bid];
		   ${"BOOKPIC$n"} = $row[Image];
		   ${"BOOKTITLE$n"} = $row[Title];
		   ${"BOOKAUTH$n"} = $row[Author];
		   ${"BOOKDESC$n"} = $row[Description];
		   ${"BOOKPRICE$n"} = $row[Price];
		   $n++;
		   }
		    }
		   } else {
		    $n=1;
		    $search4 = mysqli_query($con,"SELECT * FROM `Bookdetails` WHERE bid in (100,200,300,400)");
           while($row = mysqli_fetch_array($search4)) {
		   ${"BOOKID$n"} = $row[bid];
		   ${"BOOKPIC$n"} = $row[Image];
		   ${"BOOKTITLE$n"} = $row[Title];
		   ${"BOOKAUTH$n"} = $row[Author];
		   ${"BOOKDESC$n"} = $row[Description];
		   ${"BOOKPRICE$n"} = $row[Price];	
           $n++;
		   }		   
      }
     }	  else { 
		 $GREETING = 'Welcome Guest. <a href="#" class="my_popup_open">Log on</a> for recommendations.';
	//MIDTERM ADDITIONS - SET BOOKS FOR LOGGED OUT VISITORS
		 $n=1;
		 $search4 = mysqli_query($con,"SELECT * FROM `Bookdetails` WHERE bid in (100,200,300,400)");
           while($row = mysqli_fetch_array($search4)) {
		   ${"BOOKID$n"} = $row[bid];
		   ${"BOOKPIC$n"} = $row[Image];
		   ${"BOOKTITLE$n"} = $row[Title];
		   ${"BOOKAUTH$n"} = $row[Author];
		   ${"BOOKDESC$n"} = $row[Description];
		   ${"BOOKPRICE$n"} = $row[Price];	
           $n++;
		   }		   

		 }
		 
		 
?>

<html>

 <head>

 
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <script src="http://www.imcanalytics.com/js/jquery.popupoverlay.js"></script>
 <style>
 section {
    width: 90%;
    height: 200px;
    margin: auto;
    padding: 10px;
}

#one {
  float:left; 
  margin-right:20px;
  width:40%;
  border:1px solid;
  min-height:220px;
}

#two { 
  overflow:hidden;
  width:40%;
  border:1px solid;
  min-height:220px;
}

#three {
  float:left; 
  margin-top:10px;
  margin-right:20px;
  width:40%;
  border:1px solid;
  min-height:220px;
}

#four { 
  overflow:hidden;
  margin-top:10px;
  width:40%;
  border:1px solid;
  min-height:220px;
}

@media screen and (max-width: 400px) {
   #one { 
    float: none;
	margin-right:0;
    margin-bottom:10px;
    width:auto;
  }
  
  #two { 
  background-color: white;
  overflow:hidden;
  width:auto;
  margin-bottom:10px;
  min-height:170px;
}

   #three { 
    float: none;
	margin-right:0;
    margin-bottom:10px;
    width:auto;
  }
  
  #four { 
  background-color: white;
  overflow:hidden;
  width:auto;
  min-height:170px;
}

}
</style>

<script>
    
    $(document).ready(function() {

      // Initialize the plugin
	 
      $('#my_popup').popup({  
	   transition: 'all 0.3s',
       scrolllock: true // optional
   });

      $('#bookdeets').popup({  
	   transition: 'all 0.3s',
       scrolllock: true // optional
   });
   
});

   $.fn.DeetsBox = function(bid) {
        if(bid == '1'){	
	//MIDTERM ADDITIONS - NEW VARIABLES AND CONDITIONS
		var bookname = $( "#book1" ).val();
		var bookprice = $( "#book1price" ).val();
		$("#showbookdeets").html(bookname + "<p>" + bookprice); 
		$("#bookshelf").val('1'); 
		 var fromcart = $( "#iscart" ).val();
		 if(fromcart != 0){
		 
		 $("#deetcta").text('Purchase'); }
		}
		else if(bid == '2'){
		$("#showbookdeets").html("Vacuum<p>$9.99"); 
		$("#bookshelf").val('2'); 
		}
			else if(bid == '3'){
		$("#showbookdeets").html("Teeth<p>$14.99"); 
		$("#bookshelf").val('3'); 
		}
			else if(bid == '4'){
		$("#showbookdeets").html("August<p>$12.99"); 
		$("#bookshelf").val('4'); 
		}
		$('#bookdeets').popup('show');
    };
	


</script>

<script language="JavaScript">

//TWO FUNCTIONS TO SET THE COOKIE

function mixCookie() {

 	    var name = document.forms["form1"]["name"].value;

        bakeCookie("readuser", name, 365);
			
   }
   
function bakeCookie(cname, cvalue1, cvalue2, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toGMTString();
    document.cookie = cname + "=" + cvalue1 + "%-" + cvalue2 + ";" + expires;
}

//TWO FUNCTIONS TO GET THE COOKIE

function checkCookie() {
    var userdeets = getCookie("readuser");
//MIDTERM ADDITIONS - 'CHECKFIRST' VARIABLE - FOR 'IF' BELOW
	var checkfirst = document.getElementById('firstload').value;

    if (userdeets != "") {
	    var deets = userdeets.split("%-");
		var user = deets[0];
		
//MIDTERM ADDITIONS - NEW NESTED 'IF' LOGIC TO POST USERNAME TO PHP TO CHECK FOR DETAILS THROUGH SQL		
		 if(checkfirst != 1){
		  
		  post('index.php',{name:user,cookie:yes});
		  
		 } else { greeting.innerHTML = 'Welcome ' + user; }
	     
  } else { return "";}
}

function getCookie(cname) {

    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

<!--MIDTERM ADDITIONS - FUNCTION TO DELETE COOKIE -->

function drop_cookie(name) {
  document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  window.location.href = window.location.pathname;
}

<!--MIDTERM ADDITIONS - FUNCTION TO POST FROM JS -->
function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}


</script>

<!--GOOGLE ANALYTICS CODE WILL GO HERE -->



 </head>
 
 
 <body  onload="checkCookie()">

 
 <div style="width:100%; height:25%; background-color:#57585A;">
 <img src="img/ic1.jpg" style="max-height: 100%;">
 
<!--MIDTERM ADDITIONS - LOG-OUT LINK & LOGIC FOR VISITOR LOGGED STATE. CART NOW A LINK.--> 
<?php if(isset($_POST['name'])) { ?>
    <div style="float:right; margin-right:50px;margin-top:10px; color:white;"> <a href="#" style="color:white;" onclick="drop_cookie('readuser');">Log Out</a> </div>
	
	<div style="float:right; margin-right:75px;margin-top:10px; color:white;"> 
	 <a href="#" style="color:white;" >Cart: <?php echo $CARTCOUNT ?></a>
	 </div>
 <?php } ?>
 </div>
 <div style="margin-top:10px; margin-bottom:10px; font-size: 130%; color:#57585A;">
 <strong>Icculus Media: For All Your Fictional Needs</strong>
 </div>
 

 <div id="greeting"> <?php echo $GREETING ?> </div>
 
 <!--MIDTERM ADDITIONS - NEW HIDDEN FIELD - USED IN NEW CHECKCOOKIE LOGIC -->
 <input type="hidden" id="firstload" value="<?php echo $COOKIELOAD ?>">
 
  <!--MIDTERM ADDITIONS - NEW HIDDEN FIELD - USED FOR BOOK1 CTA -->
 <input type="hidden" id="iscart" value="<?php echo $LATEST ?>">
 
 

 
 <div id="cta1"> Please browse our options:</div>
 <section>
 <div id="one" style="padding:10px;">
	<?php echo $BOOK1; ?>
	<img src="img/<?php echo $BOOKPIC1 ?>" style="float:left; margin-right:6px; height: 100px;">
	
<!-- MIDTERM ADDITIONS - ADDED BOOKPRICE. MADE BOOK DYNAMIC -->
    <input type="hidden" id="book1" value="<?php echo $BOOKTITLE1 ?>">
	<input type="hidden" id="book1price" value="<?php echo $BOOKPRICE1 ?>">
	
	<strong><?php echo $BOOKTITLE1 ?></strong><p>
	by <?php echo $BOOKAUTH1 ?> <p>
	<?php echo $BOOKDESC1 ?>
	<p>
	<?php if($LATEST != 0){ ?>
	<input type="button" value="Purchase" id="book1button" $(this).DeetsBox(1);">
	<?php } else { ?>
	<input type="button" value="Learn More" id="book1button" onClick="ga('send', 'event', 'browse', 'learn_more_home', document.getElementById('book1').value); $(this).DeetsBox(1);">
	<?php } ?>
	</div>
	

 <div id="two" style="padding:10px;">
	<?php echo $BOOKID2; ?>
	<img src="img/" style="float:left; margin-right:6px; height: 100px;">
    <input type="hidden" id="book2" value="">
	<strong></strong><p>
	by <p>
	<p>
	<input type="button" value="Learn More" id="book2button" onClick="$(this).DeetsBox(2)";>
	</div>
	
 <div id="three" style="padding:10px;">
	<?php echo $BOOKID3; ?>
	<img src="img/" style="float:left; margin-right:6px; height: 100px;">
    <input type="hidden" id="book3" value="">
	<strong></strong><p>
	by <p>
	<p>
	<input type="button" value="Learn More" id="book3button" onClick="$(this).DeetsBox(3)";>
	</div>
    
<!-- MIDTERM ADDITIONS - PHP SO THAT DISPLAY DEPENDS ON CART OR NOT -->	
<?php 
if($n > 4){ ?>
 <div id="four" style="padding:10px;">
	<?php echo $BOOKID4; ?>
	<img src="img/" style="float:left; margin-right:6px; height: 100px;">
<!-- ASSIGNMENT 2 ADDITIONS - CREATED hidden input WITH UNIQUE ID -->
    <input type="hidden" id="book4" value="">
	<strong></strong><p>
	by <p>
	<p>
	<input type="button" value="Learn More" id="book4button" onClick="$(this).DeetsBox(4)";>
	</div>
	<?php } else { ?>
	<div id="four" style="padding:10px;"></div>
	<?php } ?>
	
</section>

	<div id="my_popup" style = "background-color: white; display: none; padding: 20px;">
    <form name="form1" action="#" method="post">
	     <div>Please enter your name:</div>
	
    <input name="name" id="uname" type="text" /><p>
	<input type="submit" onclick="mixCookie();" value="Log In"/> <p>
	</form>
	</div>
	

	<div id="bookdeets" style = "background-color: white; display: none; padding: 20px;">
	<div id="showbookdeets"></div>
    <input type="hidden" id="bookshelf"  value="0">
	
<!--MIDTERM ADDITIONS - CHANGED TO BUTTON TO CLOSE-->

	<button id="deetcta" class="bookdeets_close"  onClick="ga('send', 'event', 'convert', 'cart_add', document.getElementById('bookshelf').value)";/>Add to Cart</button> <p>
	</div>

 </body>
 </html>
