<?php

$error = '';
$username = '';
$email = '';
$password = '';
$gender = '';
$preference='';

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if(isset($_POST["submit"]))
{
    if(empty($_POST["username"]))
    {
        $error .= '<p><label class="text-error">Please Enter your Name</label></p>';
    }
    else
    {
        $username = clean_text($_POST["username"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$username))
        {
            $error .= '<p><label class="text-error">Only letters and white space allowed</label></p>';
        }
    }
    if(empty($_POST["email"]))
    {
        $error .= '<p><label class="text-error">Please Enter your Email</label></p>';
    }
    else
    {
        $email = clean_text($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error .= '<p><label class="text-error">Invalid email format</label></p>';
        }
    }
    if(empty($_POST["password"]))
    {
        $error .= '<p><label class="text-error">Password is required</label></p>';
    }
    else
    {
        $password = clean_text($_POST["password"]);
    }
    
if(empty($_POST["gender"]))
{
    $error .= '<p><label class="text-error">gender is required to show products suits to you</label></p>';
}
else
{
    $gender = clean_text($_POST["gender"]);
}

if(empty($_POST["pref"]))
{
    $error .= '<p><label class="text-error">preference is required to show products suits to you by default</label></p>';
}
else
{
    $preference = clean_text($_POST["pref"]);
}

    if($error == '')
    {
        $file_open = fopen("data.csv", "a"); 
        $no_rows = count(file("data.csv"));
        if($no_rows > 1)
        {
            $no_rows = ($no_rows - 1) + 1;
        }
        $form_data = array(
            'sr_no'  => $no_rows,
            'username'  => $username,
            'email'  => $email,
            'password' => $password,
            'gender' => $gender,
            'pref' => $preference 
        );
        fputcsv($file_open, $form_data);
        $error = '<label class="text-success">welcome to your online shop TrendyClothes</label>';
        $username = '';
        $email = '';
        $password= '';
        $gender = '';
        $preference='';
    }
}

?>
