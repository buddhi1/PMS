<!DOCTYPE html>
<html>
<head>  
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style> 

.flex-container {
    display: -webkit-flex;
    display: flex;  
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    text-align: center;
}

.flex-container > * {
    padding: 15px;
    -webkit-flex: 1 100%;
    flex: 1 100%;
}

.article {
    text-align: left;
}

header {background: black;color:white;}
footer {background: #aaa;color:white;}
.nav {background:#eee;}

.nav ul {
    list-style-type: none;
    padding: 0;
}
.nav ul a {
    text-decoration: none;
}

@media all and (min-width: 768px) {
    .nav {text-align:left;-webkit-flex: 1 auto;flex:1 auto;-webkit-order:1;order:1;}
    .article {-webkit-flex:5 0px;flex:5 0px;-webkit-order:2;order:2;}
    footer {-webkit-order:3;order:3;}
}
.backgraund-image {

 background-image: url('{{ url('/') }}/img/home.jpg');
 background-size: 100% 100%; /* or cover like Ben Dyer states*/
 background-repeat: no-repeat;
 width:500px;
 height:400px;
}
</style>
</head>
<body>

<div class="flex-container">
<header>
  <h1>Look Up Pharmacy</h1>
</header>
<div class="backgraund-image">
<!-- <nav class="nav">
<ul>
  <li><a href="#">Doctor Information</a></li>
  <li><a href="#"></a>Patient Information</li>
  <li><a href="#">Drug Information</a></li>
</ul>
</nav>  -->

<!-- <article class="article"> 
 <form action="demo_form.asp">
  <fieldset>
      <legend><h1>Doctor Information:</h1></legend>
      <label for="name">Name:</label><br>
      <input type="text" name="name" value="Mr. or Mrs."><br>
      <label for="Licence Number">License Number:</label><br>
      <input type="text" name="lastname" value="#"><br>
      <label for="gender">Gender : </label>
      <label for="male">Male</label>
      <input type="radio" name="gender" id="male" value="male">
      <label for="female">Female</label>
      <input type="radio" name="gender" id="female" value="female"><br>
      <label for="Telephone Number">Telephone Number: </label>
      <input type="text" name="Telephone Number">
      <label for="Email">Email : </label>
      <input type="text" name="Email">

      <legend><h1>Ptient Information:</h1></legend>
      <label for="name">Name:</label><br>
      <input type="text" name="name" value="Mr. or Mrs."><br>
      <label for="Patient Number">Patient Number:</label><br>
      <input type="text" name="lastname" value="#"><br>
      <label for="Age">Age: </label><br>
      <input type="text" name="age" value="#"><br>
      <label for="gender">Gender : </label>
      <label for="male">Male</label>
      <input type="radio" name="gender" id="male" value="male">
      <label for="female">Female</label>
      <input type="radio" name="gender" id="female" value="female"><br>
      <label for="address">Address : </label>
      <textarea rows="3" cols="25">
      </textarea><br>
      <legend><h1>Drug Information:</h1></legend>
      <label for="rescript">Rescript : </label>
      <textarea rows="8" cols="100">
      </textarea></br>

    </fieldset>
 </form>
</article>-->
</div>
<footer>Copyright &copy; Look Up Pharmacy.com</footer>
</div>

</body>
</html>
