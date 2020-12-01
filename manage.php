<?php
include 'ch19_include.php';
//deter if they need to see the form or not
if(!$_POST){
    //they need to see the form, so create form block
    $display_block = <<<END_OF_BLOCK
    <form method = "POST" action="$_SERVER[PHP_SELF]">
    <p>
        <label for = "email">Your E-mail Address:</label><br/>
        <input type="email" id="email" name="email" size=40 maxlength="150" />
    </p>
    <fieldset>
    <legend>Action:</legend><br/>
    <input type="radio" id="action_sub" name="action"
        value="sub" checked />
    <label for="action_sub">subscribe</label><br/>
    <input type="radio" id="action_unsub" name="action"
        value="unsub" />
    <label for="action_unsub">unsubscribe</label>
    </fieldset>
    <button type="submit" name="submit" value="submit">Submit</button>
    </form>
    END_OF_BLOCK;
} 
else if (($_POST)&&($_POST['action']=="sub"))
{
    //trying to subscribe; validate email address
    if ($POST['email']=="")
    {
        header("Location: manage.php");
        exit;
    }
    else
    {
        //connect to database
        doDB();
        //check that email is in list
        emailChecker($_POST['email']);
        //get number of results and do action
        if (mysqli_num_rows($check_res)<1)
        {
            //free result
            mysqli_free_result($check_res);

            //add record
            $add_sql="INSERT INTO subsribers (email) VALUES('".$safe_email."')";
            $add_res=mysqli_query($mysqli, $add_sql) or die(mysqli_error($mysqli));
            $display_block="<p>Thanks for signing up!</p>";
            //close connection to mysql
            mysqli_close($mysqli);
        }
        else
        {
            //print failure message
            $display_block="<p>You're already subscribed!</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Subscribe/Unsubscribe to a Mailing List</title>
</head>
<body>
<h1>Subscribe/Unsubscribe to a Mailing List</h1>
<?php echo "$display_block";?>
</body>
</html>