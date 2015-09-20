<?php
	if(isset($_POST['name'])) {
	     
	     $UNAME = ($_POST['name']);
		 $GREETING = 'Thank you '. $UNAME.'.';

		 } else { 
		 $GREETING = 'Welcome Guest. <a href="#" class="my_popup_open">Log on</a> for recommendations.'; 
		 }
		 $CARTCOUNT = 0;
		 
?>

<html>
<!--THIS IS HTML COMMENT SYNTAX -->

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
  min-height:170px;
}

#two { 
  overflow:hidden;
  width:40%;
  border:1px solid;
  min-height:170px;
}

#three {
  float:left; 
  margin-top:10px;
  margin-right:20px;
  width:40%;
  border:1px solid;
  min-height:170px;
}

#four { 
  overflow:hidden;
  margin-top:10px;
  width:40%;
  border:1px solid;
  min-height:170px;
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
});

</script>

<script language="JavaScript">

//This is JS comment syntax.
//cookie will go here.

</script>

 </head>
 <body>
 <div style="width:100%; height:25%; background-color:#57585A;">
 <img src="img/ic1.jpg" style="max-height: 100%;">
    <div style="float:right; margin-right:75px;margin-top:10px; color:white;"> Cart: <?php echo $CARTCOUNT ?> </div>
 </div>
 <div style="margin-top:10px; margin-bottom:10px; font-size: 130%; color:#57585A;">
 <strong>Icculus Media: For All Your Fictional Needs</strong>
 </div>

 <div id="greeting"> <?php echo $GREETING ?> </div>
 <div id="cta1"> Please browse our options:</div>
 <section>
    <div id="one" style="padding:10px;">
	<img src="img/Borges.jpg" style="float:left; margin-right:6px; height: 100px;">
	<strong>Labyrinths</strong><p>
	by Jorge Luis Borges<p>
	If Jorge Luis Borges had been a computer scientist, he probably would have invented hypertext and the World Wide Web. 
	Instead, being a librarian and one of the world's most widely read people, he became the leading practitioner of a densely 
	layered imaginistic writing style that has been imitated throughout this century, but has no peer. </div>
    
	<div id="two" style="padding:10px;">
	<img src="img/Lem.jpg" style="float:left; margin-right:6px; height: 100px;">
	<strong>A Perfect Vacuum</strong><p>
	by Stanislaw Lem<p>
	In A Perfect Vacuum, Stanislaw Lem presents a collection of book reviews of nonexistent works of literature. Embracing 
	postmodernism's "games for games' sake" ethos, Lem joins the contest with hilarious and grotesque results, lampooning 
	the movement's self-indulgence and exploiting its mannerisms.
	</div>
	
	<div id="three" style="padding:10px;">
	<img src="img/Zsmith.jpg" style="float:left; margin-right:6px; height: 100px;">
	<strong>White Teeth</strong><p>
	by Zadie Smith<p>
	Epic and intimate, hilarious and poignant, White Teeth is the story of two North London families - one headed by Archie, 
	the other by Archie's best friend, a Muslim Bengali named Samad Iqbal. Pals since they served together in World War II, 
	Archie and Samad are a decidedly unlikely pair. </div>
    
	<div id="four" style="padding:10px;">
	<img src="img/North.jpg" style="float:left; margin-right:6px; height: 100px;">
	<strong>The First 15 Lives of Harry August</strong><p>
	by Claire North<p>
	Harry August is on his deathbed--again. No matter what he does or the decisions he makes, when death comes, Harry always 
	returns to where he began, a child with all the knowledge of a life he has already lived a dozen times before. Nothing ever
	changes--until now. 
	</div>
</section>

	<div id="my_popup" style = "background-color: white; display: none; padding: 20px;">
    <form name="form1" action="#" method="post">
	     <div>Please enter your name:</div>
	
    <input name="name" id="uname" type="text" /><p>
	<input type="submit" onclick="mixCookie();" value="Log In"/> <p>
	</form>
	</div>

 </body>
 </html>
