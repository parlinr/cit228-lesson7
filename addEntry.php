<?php
include 'connect.php';

if (!$_POST) {
    //show the form since the user hasn't seen it yet
$display_block = <<<END
<form method="POST" action="$_SERVER[PHP_SELF]">

<fieldset>
<legend>First & Last Names:</legend><br>
<input type="text" name="firstName" size="30" maxlength="75" required="required">
<input type="text" name="lastName" size="30" maxlength="75" required="required">
</fieldset>

<p><label for="address">Street Address:</label><br>
<input type="text" id="address" name="address" size="30"></p>

<fieldset>
<legend>City, State, & Zip:</legend><br>
<input type="text" name="city" size="30" maxlength="50" />
<input type="text" name="state" size="5" maxlength="2" />
<input type="text" name="zipcode" size="10" maxlength="10" />
</fieldset>

<fieldset>
<legend>Address Type:</legend><br/>
<input type="radio" id="add_type_h" name="add_type" value="home" checked />
<label for="add_type_h">home</label>
<input type="radio" id="add_type_w" name="add_type" value="work" />
<label for="add_type_w">work</label>
<input type="radio" id="add_type_o" name="add_type" value="other" />
<label for="add_type_o">other</label>
</fieldset>

<fieldset>
<legend>Phone Number:</legend><br/>
<input type="text" name="tel_number" size="30" maxlength="25" />
<input type="radio" id="tel_type_h" name="tel_type" value="home" checked />
<label for="tel_type_h">home</label>
<input type="radio" id="tel_type_w" name="tel_type" value="work" />
<label for="tel_type_w">work</label>
<input type="radio" id="tel_type_c" name="tel_type" value="cell">
<label for="tel_type_c">cell</label>
<input type="radio" id="tel_type_o" name="tel_type" value="other" />
<label for="tel_type_o">other</label>
<input type="radio" id="can_text_y" name="can_text" value="1">
<label for="can_text_y">can text</label>
<input type="radio" id="can_text_n" name="can_text" value="0" checked>
<label for="can_text_n">cannot text</label>
</fieldset>

<fieldset>
<legend>Email Address:</legend><br/>
<input type="email" name="email" size="30" maxlength="150" />
<input type="radio" id="email_type_p" name="email_type" value="personal" checked />
<label for="email_type_p">personal</label>
<input type="radio" id="email_type_w" name="email_type" value="work" />
<label for="email_type_w">work</label>
<input type="radio" id="email_type_o" name="email_type" value="other" />
<label for="email_type_o">other</label>
</fieldset>

</form>


END;
} else if ($_POST) {
    //adding to tables -- check for required values
    if (($_POST['firstName'] == "") || ($_POST['lastName'] == "")) {
        header("Location: addEntry.php");
        exit();
    }

    //connect to DB
    doDB();

    //sanitize inputs
    $cleanFirstName = mysqli_real_escape_string($mysqli, $_POST['firstName']);
    $cleanLastName = mysqli_real_escape_string($mysqli, $_POST['lastName']);
    $cleanAddress = mysqli_real_escape_string($mysqli, $_POST['address']);
    $cleanCity = mysqli_real_escape_string($mysqli, $_POST['city']);
    $cleanState = mysqli_real_escape_string($mysqli, $_POST['state']);
    $cleanZipcode = mysqli_real_escape_string($mysqli, $_POST['zipcode']);
    $cleanTelNumber = mysqli_real_escape_string($mysqli, $_POST['tel_number']);
    $cleanEmail = mysqli_real_escape_string($mysqli, $_POST['email']);

    //add to master table
    $addMasterSql = "INSERT INTO master_name (date_added, date_modified, firstName, lastName)
                    VALUES (now(), now(), $cleanFirstName, $cleanLastName)";
    $addMasterRes = mysqli_query($mysqli, $addMasterSql) or die(mysqli_error($mysqli));

    //get master id
    $masterId = mysqli_insert_id($mysqli);

    if (($_POST['address']) || ($_POST['city']) || ($_POST['state']) || ($_POST['zipcode'])) {
        //this is important, so it gets inserted
        $addAddressSql = "INSERT INTO address ";
    }
}




?>