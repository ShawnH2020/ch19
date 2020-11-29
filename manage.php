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