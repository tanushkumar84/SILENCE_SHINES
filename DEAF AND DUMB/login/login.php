<?php
$uName=$_POST['userName'];
$passwd=$_POST['passwd'];

$conn=mysqli_connect("localhost","root","","users");

$check="select 1 from userInfo where userName='$uName' and passwd=$passwd;";
$q1=mysqli_query($conn,$check);
if(mysqli_num_rows($q1)==0)
{
    header('Location: sign_in.php?error2=wrong User Name or Password try Again!!');
}
else{

    header('Location: ./dashboard/dash.html');
}
mysqli_close($conn);
?>