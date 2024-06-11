<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newUser</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat:wght@400;600&family=Sacramento&display=swap');
   
   * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
  }

  body {
    min-height: 100vh;
    display:flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(#2196f3, #090909);
    overflow: hidden;
    text-align: center;
  }
  .box{
    height: 28rem;
    width: 25rem;
    /* background: #fff; */
    background: #7c6969;
    border-radius: 0.6rem;
    padding: 0 2rem;
}
img{
    height: 10rem;
    margin-top: 1rem;
}
.btn {
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    height: 40px;
    background: linear-gradient(to right, #2196f3, #121212);
    box-shadow: 0 2px 10px rgba(0, 0, 0, .4);
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    cursor: pointer;
    border-radius: 5px;
    border: none;
    outline: none;
    width: 6rem;
    margin-top: 2rem;
  }

</style>    
</head>
<body>
    <div class="box">
    <div class="upper">
    <img src="tick.png" alt="tickImg">
    </div>
    <h1>Congratulations <?php echo $_POST['userName'] ?>!!</h1><br>
    <h2>You have successfully sign up for our student portal</h2>
    <a href="sign_in.php"> <input type="button" class="btn"  value="Login"></a>
    </div>
</body>
</html>

<?php
$uName=$_POST['userName'];
$email=$_POST['Email'];
$passwd=$_POST['passwd'];

$conn=mysqli_connect("localhost","root","","users");

$check="select 1 from userInfo where userName='$uName';";
$q1=mysqli_query($conn,$check);
if(mysqli_num_rows($q1)==0)
{
    $newUser="insert into userInfo values('$uName','$email',$passwd);";
    mysqli_query($conn,$newUser);
}
else{
    
    header('Location: sign_in.php?error1=User already exist try Again !!');
}
?>