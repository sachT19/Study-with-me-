<!--study w mee page-->
<!DOCTYPE html>
<html>
<head>
  <title>Rooftop Study</title>
  <link rel = "stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Verdana", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: lightpink;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: black;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="rooftop.php">Rooftop Room</a><!--find a way to insert video links-->
  <a href="coffeeshop.php">Coffee Shop</a>
  <a href="spaceship.php">Spaceship</a>
  <a href="backyard.php">Backyard</a>
  </div>
  <div id = "main">
  <iframe style = "width:98%; height: 900px;" src="https://www.youtube.com/embed/6LAM8AXo4Ag">
</iframe>
  <!--
  <h1>Study with these spaces!</h1>
  <p>With this page, you can study and stay focused with these calming study spaces. Click on the 'Study Spaces' text below to choose one of the many calming scenes that we have!</p>
  <span style="font-size:15px;cursor:pointer" onclick="openNav()">&#9776; Study Spaces</span>
  </div>
  -->
  <span style="font-size:15px;cursor:pointer" onclick="openNav()">&#9776; Study Spaces</span>
  </div>
  
  <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
</body>
</html>