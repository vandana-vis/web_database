<?php 
	session_start(); 
	$session_username = (isset($_SESSION["username"]))? $_SESSION["username"] : '';
	$session_isAuthor = (isset($_SESSION["isAuthor"]))? $_SESSION["isAuthor"] : 2;
	$session_isAdmin = (isset($_SESSION["isAdmin"]))? $_SESSION["isAdmin"] : 2;
	$session_isUser = (isset($_SESSION["isUser"]))? $_SESSION["isUser"] : 2;
?>

<!DOCTYPE html>
<html lang="en" >
  <meta charset="utf-8" />
  <style>
    html, body{       
        height: 100%;
        margin: 0;        
      }   
    
    .heading {        
        text-align: center;       
        
    }
    .instructions {
      text-align: center;
    }
    
    .search {
      text-align: center;
    }
    
    .button {
    border: none;
    color: white;
    padding: 4px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    font-weight: bold;
    margin: 2px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    }    
    .search1 {
    background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
    
    }
    .search1:hover {
    background-color: #008CBA;
    color: white;
    }
    .subscribe{
      background-color: darkred;
      color: white;
      width: 10%;
      font-size: 14px;
      
    }
    .subscribe:hover{
      background-color: #008CBA;
      color: brown;
      opacity: 2;
      animation: reverse;
      
    }

    /* Add a black background color to the top navigation */
    .topnav {
      background-color: #333;
      overflow: hidden;
    }

    /* Style the links inside the navigation bar */
    .topnav a {
      float: left;
      color: #f2f2f2;
      text-align: center;
      padding: 10px 16px;
      text-decoration: none;
      font-size: 15px;
    }

    /* Change the color of links on hover */
    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    /* Add a color to the active/current link */
    .topnav a.home {
      background-color: #008CBA;
      color: white;
    }
    table {
      width:100%;
      
    }
    table, th, td {
      border: 2px solid #008CBA;
      border-collapse: collapse;
      background-color: #ffc34d;
    }
    
    * {box-sizing: border-box}
    

  /* Style tab links */
  .tablink {
    background-color: #ff6666;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    font-weight: bold;
    width: 50%;
  }

  .tablink:hover {
    background-color: #777;
  }

  /* Style the tab content (and add height:100% for full page content) */
  .tabcontent {
    color: black;
    display: none;
    padding: 100px 20px;
    height: 100%;
  }

  .hidden {
      display: none;
  }

  .status {
      background-color: transparent;
      color: white; 
      float: right;
      text-align: center;
      padding: 10px 16px;
      font-weight: bold;
  }
    
  </style>
  
  <head>
    <title>Stories For Kids</title>
    <!-- Latest compiled CSS v3.4.1 -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
    <!-- jQuery library v3.5.1-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript v3.4.1 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--added for Validation -->
    <script src="home_page_validation.js"></script> 
    <!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      img {
        border: 5px solid #555;
      }
    </style>

  </head>
  <body >
    <main>        
        <div class="topnav">
          <a class="home" href="index.php "><i class="fa fa-home" aria-hidden="true"></i> Home</a>
          <a class = "admin" style= "float: right;" href="admin_view.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Admin Page</a>
          <a class = "author" style= "float: right;" href="author_view.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Author Page</a>
          
          <a class = "login" style= "float: right;" href="login.html"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
          <a class = "signup" style="float: right;" href="register.html"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a>          
	  <a class = "logout hidden" style= "float: right;" href="logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> | Logout</a>
	  <span class = "status hidden"></span>

        </div>
    </main>
    <div class="search">
      
      <form name = "searchForm" action="search_story.php" onsubmit="return validateForm()" method="post">
        <table>
          <tr>
            <th style="text-align:center">
              Story Name:<br/><input style="border: 1px solid #333;" type="text" name="STORY_NAME"/><br/>
            </th>
            <th style="text-align:center">
              Author Name:<br/><input style="border: 1px solid #333;" type="text" name="AUTHOR_NAME"/><br/>
            </th>
            <th style="text-align: center;">
              <br/><label for="AGE_GROUP">Age Group:</label>
                <select id="AGE_GROUP" name="AGE_GROUP">
                  <option value="" selected="selected">Select</option>
                  <option value="3-5">Age 3-5</option>
                  <option value="6-8">Age 6-8</option>
                  <option value="9-12">Age 9-12</option>
                </select>
              <br/>
            </th>
            
            <th style="text-align:center">
              Published Year:<br/><input style="border: 1px solid #333;" type="number" id="PUB_YEAR" name="PUB_YEAR"><br/>
            </th>
            <th style="text-align:center">
              Genre:<br/><input style="border: 1px solid #333;" type="text" id="STORY_GENRE" name="STORY_GENRE"><br/>
            </th>
            <th style="text-align:center">
              <br/>    
              <button class= "button search1" ><i style="color: brown;"class="fa fa-search" aria-hidden="true"></i>Search</button>
            </th>
          </tr>
        </table>
      </form>
    </div>
    <br/><br/>

    <div class="hbar">
      <center><h1> Welcome to Stories For Kids! </center>
      <div style="float: center;"></div>
    </h1>
  </div>

  <button class="tablink" onclick="openPage('Featured Stories')" id="defaultOpen">Featured Stories</button>
  <button class="tablink" onclick="openPage('About')">About</button>
  <!--<button class="tablink" onclick="openPage('Order Books')">Order Books</button>-->
  
  <div id="Featured Stories" class="tabcontent">
    <div>
      <a href="story1.php" id="hippo" onclick="document.location=this.id+'.html';return true;" >
        <img src="hippo_cover.jpeg" width="380" height="280" alt="hippo"/></img>
      </a>

       <a href="story2.php" id="crickets" onclick="document.location=this.id+'.html';return true;" >
        <img src="crickets_cover.jpeg" width="380" height="280" alt="crickets"/></img>
      </a>

      <a href="story3.php" id="Boat" onclick="document.location=this.id+'.html';return true;" >
        <img src="Cover3.jpg" width="380" height="280" alt="Boat"/></img>
      </a>
      <br>
      <br>
      <a href="story4.php" id="Penguin" onclick="document.location=this.id+'.html';return true;" >
        <img src="story4.jpeg" width="380" height="280" alt="Penguin"/></img>
      </a>

      <a href="story5.php" id="Santa" onclick="document.location=this.id+'.html';return true;" >
        <img src="cover5.jpeg" width="380" height="280" alt="Santa"/></img>
      </a>

      <a href="story8.php" id="story" onclick="document.location=this.id+'.html';return true;" >
        <img src="Cover+FCS.jpeg" width="380" height="280" alt="book"/></img>
      </a>
    </div>
  </div>

  <div id="About" class="tabcontent">
    <h3>StoriesForKids.com</h3>
      <p>Once upon a time, we all grew up listening to stories from our parents, grandparents, aunts, and
        uncles. Sometimes powerful, sometimes meaningless, sometimes moral-based and sometimes just hilarious! Remember how much you enjoyed this storytime? How magical it was, and how much it made you wonder? Storytelling helps improve key areas like memory and language skills, it sparks curiosity which increases the child’s imaginative skills, and it gives the child new perceptions of the world around them every single time.Unfortunately today, storytelling is slowly becoming obsolete because parents are themselves busy and they hardly come up with any creative stories when their kids like to listen.<br><br>

        Here, we are developing a web-based application to address the same issue that includes stories with illustrations and pictures from various genres for kids that range between the age groups 3-12.
        Our website would make the parent’s lives easier to read stories to their kids with just one search. This digital application will come in handy whenever they want to listen to stories such as during bedtime, bath time, on the train, in the bus, in the car, in the park, in the pram, in the cot, any time is a good time for a story!</p> 
  </div>

  <!--<div id="Order Books" class="tabcontent">
    <h3>Order Books</h3>
      <p>Place your order</p>
    </div>-->

  <script>
    function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";

  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
  </script>

  <button onclick="window.location.href = 'subscription.html'" class="button subscribe" style="position: absolute; right:10px; bottom:-250px;">
      <i class="fa fa-bell-o" aria-hidden="true"></i> Subscribe</button>

	<script>
		const sessionUserName = '<?php echo $session_username;?>';
		const sessionIsAuthor = Number('<?php echo $session_isAuthor;?>');
		const sessionIsAdmin = Number('<?php echo $session_isAdmin;?>');
		const sessionIsUser = Number('<?php echo $session_isUser;?>');
	</script>
	<script src="sess.js"></script>

  </body>
</html>
