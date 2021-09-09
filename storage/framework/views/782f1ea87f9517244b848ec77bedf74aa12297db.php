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
@media  screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.txt-white{
    color: #fff;
  }
</style>
<?php echo $__env->make('admin.layout.favicon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>

<center>
<form action="<?php echo e(route('admin.login.authenticate')); ?>" method="post" style="background: #0e336d;">
    <?php echo csrf_field(); ?>
  <div class="imgcontainer">
    <img src="<?php echo e(asset('public/admin/images/logo.png')); ?>" alt="Avatar" style="width: 100%;border-radius:0px;">
  </div>

  <div class="container">
    <label for="uname" class="txt-white"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="email" required>

    <label for="psw" class="txt-white"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <button type="submit">Login</button><br>
    <a href="<?php echo e(route('password.update')); ?>" class="txt-white">Forget Password?</a>    
    
    
  </div>

  
</form>
</center>
</body>
</html>
<?php /**PATH C:\wamp64\www\pakcompany\resources\views/admin/login.blade.php ENDPATH**/ ?>