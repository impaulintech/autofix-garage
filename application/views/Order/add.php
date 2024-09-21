<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>

    <form action="<?= site_url('Order/add')?>" method="post">

        <h1>Add new</h1>

        <?php if(validation_errors())
    {
        echo validation_errors();
    }
    ?>


        <label for="Or_id">Role</label>
        <select name="Or_id" id="Or_id">
            <option>Select</option>
            <option value="1">IT Admin</option>
            <option value="2">Admin</option>
            <option value="3">User</option>
            <option value="4">Schedule</option>

        </select>
        <br>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" value="">
        <br>
        <label for="mname">Middle Name:</label>
        <input type="text" id="mname" name="mname" value="">
        <br>
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" value="">
        <br>
        <label for="contact">contact:</label>
        <input type="text" id="contact" name="contact" value="">
        <br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="">
        <br>
        <label for="address">address:</label>
        <input type="text" id="address" name="address" value="">

        <input type="submit" value="Register">

</body>
</form>

</html>