<html>
    <head>
    <title>Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">-->
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
        
        
body{
	background-color: white;
 /*   background-image: url(../img/jayaratne_pic.JPG);
    background-size: cover;*/
	margin: 0;
}

.navi_menu{
	background-color: #424a5d;
	list-style-type: none;
	position: fixed;
	height: 100%;
	min-width: 19%;
}

.container{
	background-color: ;
	width: 100%;
    
}

.navi{
    font-family: 'Ruda', sans-serif;
    color: #797979;
	display:block;
	background-color: #424a5d;
	text-decoration: none;
	height: 30px;
	padding: 5px 10px;
	margin-top: 2px;
	border-radius: 20px;
    border-bottom: 2px solid #424a5d;
    border-right: 2px solid #424a5d;
	font-size: 13px;
    color: #dbe0e6;
}
.navi:hover{
	display:block;
	background-color: #fb7a4d;
	text-decoration: none;
	height: 30px;
	padding: 5px 10px;
	margin-top: 2px;
	border-radius: 20px;
    border-bottom: 2px solid white;
    border-right: 4px solid white;
	color: whitesmoke;
}
.navi:active{
	display:block;
	background-color: #ff865c;
	text-decoration: none;
	height: 30px;
	padding: 5px 10px;
	margin-top: 2px;
	border-radius: 20px;
    border-bottom: 2px solid white;
    border-right: 4px solid white;
	color: whitesmoke;
}
        
        

.navi_menu2{
	background-color: ;
	height: 40px;
	margin-top: 50px;

}

.navi0{
	display: inline;
	background-color: #dbdbdc;
	text-decoration: none;
	color: #1a1b1c;
	width: 50px;
	height: 50px;
	padding: 18px;
	margin: 5px;
	border-radius: 50%;
    border: 1px solid #c7c9cc;
}

.propic{
	border-radius: 50%;
	width: 80px;
	height: 80px;
	border: 2px solid white;
    margin-top: 10px;
}

.navi_pro{
	padding: 10px 10px 0px 10px;
}

.container1{
	background-color:;
	width: 100%;
	height: 100%;
	margin-left: 22%;
}

.container2{
	background-color: green;
	width: 1050px;
	height: 100%;
	margin-left: 0%;
}

.menu2{
	background-color: #666f86;
	width: 100%;
	height: 60px;
	margin-left: 22%;
	float: right;

}
.menu2in{
	background-color: #666f86;
	width: 1050px;
	margin-right: 10px	;
	height: 50px;
	float: right;
	padding-top: 10px;
}

.image{
	width: 20px;
	height: 20px;
}
.noti{
	background-color: red;
	width: 20px;
	height: 20px;
	border-radius: 20%;
	padding: 3px 6px;
	color: white;
}

.myButton {
	-moz-box-shadow: 1px 1px 5px 1px #276873;
	-webkit-box-shadow: 1px 1px 5px 1px #276873;
	box-shadow: 1px 1px 5px 1px #276873;
	background-color:#4c537d;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:4px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family: 'Ruda', sans-serif;
	font-size:13px;
	padding:7px 7px;
	text-decoration:none;
	text-shadow:1px 2px 5px #457585;
}
.myButton:hover {
	background-color:#197785;
}
.myButton:active {
	position:relative;
	top:1px;
}

        .name{
            color: white;
        }
        .other{
            color: white;
        }
        .headline{
            color: aliceblue;
            font-family: 'Ruda', sans-serif;
            font-size: 18px;
            font-weight: bold;
        }
        
        .headdiv{
            width: 100%;
            height: auto;
            background-color: #ff865c;
            padding: 30px 0px; 
        }
        .menutitle{
            color: whitesmoke;
            font-family: 'Ruda', sans-serif;
            font-weight: bold;
            margin-left: 10px;
        }
        .menutitlediv{
            
            
        }
    </style>
    </head>
    <body>

<nav class="navi_menu" id="mySidenav">
  <div class="container">
    <div class="headdiv" align="center">
        <span class="headline">JAYARATNE FUNERALS</span>
    </div>
    <div class="navi_pro" align="center">
    <img class="propic" src="../img_avatar_g2.jpg"><br>
    <p style="color:#aeb2b7;">Welcome,</p>
    <h4 class="name"><b>Kasun Lakmal</b></h4>
<!--    <p class="other">Jayarathna Funrels</p>-->
        <hr>
    </div>
      <div class="menutitlediv">
          <p class="menutitle">Menu</p>
      </div>
  </div>
  <a href="stockmanagment.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp; STOCK MANAGMENT</a>
  <a href="adminReservation.php" class="navi"><img src="../img/package.png" class="image">&nbsp;&nbsp; PACKAGE AND SERVICES</a>
  <a href="feedbackmanager.php" class="navi"><img src="../img/feedback.png" class="image">&nbsp;&nbsp; FEED-BACK <span class="noti">12</span></a>
    <a href="../edit.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp; UPDATE PROFILE</a>
    <br>
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">LOG OUT</a>
    </div>
  </div>
  </body>
  </html>