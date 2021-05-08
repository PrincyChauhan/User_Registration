<!DOCTYPE html>
<html>
<head>
<title>
</title>
</head>
<body>
<h1 style="color: Black">Registration Form</h1><br>
<form style="margin-right: 100px;" method="post">
<div style="margin-left: 205px; margin-bottom: 10px; font-weight: bold;">
<input type="radio" name="prefix" value="Mr"/> Mr
<input type="radio" name="prefix" value="Mrs"/> Mrs
<input type="radio" name="prefix" value="Miss"/> Miss <br>
</div>

<label style="margin-right: 130px;font-weight: bold;" >First Name</label><input
style="margin-bottom: 10px;" type="text" placeholder="FirstName" name="firstname"> <br>
<label style="margin-right: 133px;font-weight: bold;">Last Name</label><input
style="margin-bottom: 10px;" type="text" placeholder="LastName" name="lastname"> <br>
<label style="margin-right: 103px;font-weight: bold;" >Email Address </label><input
style="margin-bottom: 10px;" type="email" placeholder="Email" name="email"> <br>
<label style="margin-right: 173px;font-weight: bold;" >City</label> <input
style="margin-bottom: 10px;" type="text" placeholder="City" name="city"> <br>

<label style="margin-right: 167px;font-weight: bold;" >State</label> <select
style="margin-bottom: 10px;" name = "state">
<option value = "Gujarat" selected>Gujarat</option>
<option value = "MP">MP</option>
<option value = "UP">UP</option>
<option value = "Rajsthan">Rajsthan</option>
<option value = "Maharastra">Maharastra</option>
<option value = "panjab">Panjab</option>
<option value = "other">other</option>
</select></br>
<label style="margin-right: 177px;font-weight: bold; margin-bottom: 10px;"
>Zip</label> <input style="margin-bottom: 10px;" type="text" placeholder="Zip code" name="zip"> <br>
<label style="margin-right: 110px;font-weight: bold;" > Upload photo </label> <input
style="margin-bottom: 10px;" type = "file" name = "image" accept = "image/*" /><br>
<label style="margin-right: 155px;font-weight: bold;" >Moblie</label> <input
style="margin-bottom: 10px;" type="text" placeholder="Mobile" name="mobile" > <br>
<label style="margin-right: 113px;font-weight: bold;" >Date of Birth</label> <input
style="margin-bottom: 10px;" type="date" name="date"> <br>
<label style="margin-right: 80px;font-weight: bold;" > Language Known</label>
<input type="checkbox" value="English" name="language[]"><label style="margin-right: 80px;"
>English</label><br>
<div style="margin-left:205px;">
<input type="checkbox" value="Hindi" name="language[]"><label style="margin-right: 80px;"
>Hindi</label><br>
<input type="checkbox" value="Other" name="language[]"><label style="margin-right: 80px;"
>Other</label><br>
</div><br> 
<label style="margin-right:45px;font-weight: bold;" > Additional information</label>
<textarea name="addinfo" placeholder="optional"></textarea><br>
<br>
<div style="margin-left: 205px; margin-bottom: 10px;">
<input type = "submit" name = "submit" value = "Submit" >
</div>
</form>
</body>
</html>


<?php
$conn = mysqli_connect("localhost", "root", "", "user_register") or die("connection failed");
if (!$conn) {
die("Connection is failed...." . mysqli_connect_error());

exit;
} 
// else {
// echo "Connection is done ...";
// }

if (isset($_POST['submit'])) {

    $prefix=$_POST["prefix"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $state=$_POST["state"];
    $zip = $_POST["zip"];
    $image=$_POST["image"];
    $mobile = $_POST["mobile"];
    $dob = $_POST["date"];
    $language = $_POST["language"];
    $addinfo = $_POST["addinfo"];

     $l="";
     foreach($language as $ln){
        $l .= $ln . ",";
     }

    $query = " INSERT INTO user(Prefix,Firstname,Lastname,Email,City,State,Zip,Image,Mobile,DateOfBirth,Language,Addinfo) VALUES('$prefix','$firstname','$lastname','$email','$city','$state','$zip','$image','$mobile','$dob','$l','$addinfo'); ";
    $register_user_query = mysqli_query($conn, $query);

}
?>