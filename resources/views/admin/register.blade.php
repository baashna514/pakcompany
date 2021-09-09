<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 200px;
}

label{
    position: relative;
    right:190px;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img{
  width: 100px;
  height: 120px;
  border-radius: 50%;
}

.container {
  padding: 16px;
}
form{
   width: 500px;

   
}
span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
@include('admin.layout.favicon')
</head>
<body>

<center>
<h2>Register Form</h2>

<form action="{{ route('admin.register.create') }}" method="post">
    @csrf
  <div class="imgcontainer">
    <img src="{{asset('public/front/img/img_avatar2.png')}}" alt="Avatar" >
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="name" required>
    <label for="uname"><b>Email</b></label>
    <input type="email" placeholder="Enter Username" name="email" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit">Register</button>
    <span class="psw">Already have Account? <a href="{{route('admin.login')}}">Login</a></span>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
</center>
</body>
</html>
