<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .error {
        font-size: 15px;
        color: red;
    }

    body {
        background-color: #F9EDED;
    }
</style>

<body><?php

        $fNameError = $mNameError = $lNameError = $genderError = $fatherNameError = $fatherLastNameError = $motherfirstNameError = $motherLastNameError = $streetError =  $cityError  = $stateError =  $countryError = $errorZipcode   = $emailError = $phoneError =  $ageError = $commentError = "";

        $fName = $_POST["firstname"] ?? "";
        $mName = $_POST["middlename"] ?? "";
        $lName = $_POST["lastname"] ?? "";
        $dob = $_POST["age"] ?? "";
        $gender = $_POST["gender"] ?? "";
        $fatherName = $_POST["fatherfirstname"] ?? "";
        $fatherLastName = $_POST["fatherlastname"] ?? "";
        $motherfirstName = $_POST["motherfirstname"] ?? "";
        $motherLastName = $_POST["motherlastname"] ?? "";
        $street = $_POST["streetaddress"] ?? "";
        $city = $_POST["city"] ?? "";
        $state = $_POST["state"] ?? "";
        $country = $_POST["country"] ?? "";
        $zipcode = $_POST["zipcode"] ?? "";
        $email = $_POST["email"] ?? "";
        $phonenumber = $_POST["phonenumber"] ?? "";
        $courses = $_POST["courses"] ?? "";
        $comment = $_POST["comment"] ?? "";

        // $error = "";

        $isValid = true;

        if (!empty($email)) {

            if (!empty($dob)) {

                $birthDate = new DateTime($dob);
                $today = new DateTime();

                $age = $today->diff($birthDate)->y;

                if ($age < 18 || $age > 40) {
                    $ageError = "Your age between 18-40.";
                }
            } else {
                $ageError = "* Please enter your birth date.";
            }


            //  your name 
            switch (true) {
                case empty($fName):
                    $fNameError =  "First name is required!";
                    $isValid = false;
                    break;
                case !preg_match("/^[a-zA-Z]+$/", $fName):
                    $fNameError = "* First name should only contain letters and must not include spaces or numbers";
                    $isValid = false;
                    break;
            }

            switch (true) {
                case empty($lName):
                    $lNameError = "Last name is required!";
                    $isValid = false;
                    break;
                case !preg_match("/^[a-zA-Z]+$/", $lName):
                    $lNameError = "* Last name should only contain letters and must not include spaces or numbers";
                    $isValid = false;
                    break;
            }

            switch (true) {
                case empty($gender):
                    $genderError = "* Please select your gender!";
                    $isValid = false;
                    break;
            }

            //  father's name
            switch (true) {
                case empty($fatherName):
                    $fatherNameError = "Please enter your father's name!";
                    $isValid = false;
                    break;
                case !preg_match("/^[a-zA-Z]+$/", $fatherName):
                    $fatherNameError = "* Father's first name should only contain letters and must not include spaces or numbers";
                    $isValid = false;
                    break;
            }

            switch (true) {
                case empty($fatherLastName):
                    $fatherLastNameError = "Please enter last name!";
                    $isValid = false;
                    break;
                case !preg_match("/^[a-zA-Z]+$/", $fatherLastName):
                    $fatherLastNameError = "* Father's last name should only contain letters and must not include spaces or numbers";
                    $isValid = false;
                    break;
            }

            //  mother's name

            switch (true) {
                case empty($motherfirstName):
                    $motherfirstNameError = "Please enter your mother's name!";
                    $isValid = false;
                    break;
                case !preg_match("/^[a-zA-Z]+$/", $motherfirstName):
                    $motherfirstNameError = "* Mother's first name should only contain letters and must not include spaces or numbers";
                    $isValid = false;
                    break;
            }

            switch (true) {
                case empty($motherLastName):
                    $motherLastNameError = "Please enter last name!";
                    $isValid = false;
                    break;
                case !preg_match("/^[a-zA-Z]+$/", $motherLastName):
                    $motherLastNameError = "* Mother's last name should only contain letters and must not include spaces or numbers";
                    $isValid = false;
                    break;
            }

            //  address

            switch (true) {
                case empty($street):
                    $streetError = "* Please enter your street.";
                    $isValid = false;
                    break;
            }

            switch (true) {
                case empty($city):
                    $cityError = "* Please enter your city.";
                    $isValid = false;
                    break;
            }

            switch (true) {
                case empty($state):
                    $stateError = "* Please enter your state.";
                    $isValid = false;
                    break;
            }

            switch (true) {
                case empty($country):
                    $countryError = "* Please enter your country.";
                    $isValid = false;
                    break;
            }

            switch (true) {
                case empty($zipcode):
                    $errorZipcode = "* Zip code is required!";
                    $isValid = false;
                    break;
                case !preg_match("/^\d{6}$/", $zipcode):
                    $errorZipcode = "* Zip code must be exactly 6 numeric digits.";
                    $isValid = false;
                    break;
            }

            //  email

            switch (true) {
                case empty($email):
                    $emailError = "Email is required.";
                    $isValid = false;
                    break;
                case !filter_var($email, FILTER_VALIDATE_EMAIL):
                    $emailError = "* Invalid email format.";
                    $isValid = false;
                    break;
            }

            //  phone number

            switch (true) {
                case empty($phonenumber):
                    $phoneError = "Phone number is required!";
                    $isValid = false;
                    break;
                case !preg_match("/^\d{10}$/", $phonenumber):
                    $phoneError = "* Phone number must be numeric and up to 10 digits.";
                    $isValid = false;
                    break;
            }

            switch (true) {
                case empty(trim($comment)):
                    $commentError = "Comment cannot be empty!";
                    $isValid = false;
            }


            echo  "<h1>Hello " . htmlspecialchars($fName)  . " " . htmlspecialchars($mName) . "</h1>";
            echo  "<h3> Your gender is " . $gender . "</h3>";
            echo  "<h3>Your Father's name is Mr. " . htmlspecialchars($fatherName) . " " . htmlspecialchars($fatherLastName) . " and " . "Mother's name is Mrs. " .
                htmlspecialchars($motherfirstName)  . " " . htmlspecialchars($motherLastName) . "</h3>";
            echo  "<h3> Your home address is " . htmlspecialchars($street) . " city " . htmlspecialchars($city) . " state " . htmlspecialchars($state) . " and your country is " . htmlspecialchars($country) . "</h3>";
            echo  "<h3>Your Email address is " . $email . " And your contact number is " . htmlspecialchars($phonenumber) . "</h3>";
            echo  "<h3>You are doing " . $courses . " Course</h3>";

            echo  htmlspecialchars($comment);
        }


        // function debug_pre($input, $exit = false)
        // {
        //     echo "<pre>";
        //     print_r($input);
        //     echo "</pre>";
        //     if ($exit === false) {
        //         $exit;
        //     }
        // }

        ?>

    <div class="container">


        <h1>Student Registration Form</h1>
        <p>Fill out the form to apply for the courses. You can consider your application accepted after you receive a confirmation email.</p>


        <form method="POST" action="/">
            <h3>Student Information</h3>
            <!-- NAME  -->
            <div class="row">
                <div class="col-6">
                    <h5>Your's Name</h5>
                    <label for="firstname">First Name</label>
                    <input tabindex="1" type="text" class="form-control w-50 " placeholder="First name" name="firstname" id="firstname" aria-label="First Name" value="<?php echo $fName; ?>">
                    <span class="error"><?php echo $fNameError . "<br>"; ?></span>
                    <label for="lastname">Last Name</label>
                    <input tabindex="3" type="text" class="form-control w-50" placeholder="Last name" name="lastname" aria-label="Last Name" value="<?php echo $lName; ?>">
                    <span class="error"><?php echo $lNameError ?></span>
                </div>

                <div class="col-3">
                    <h5>Date of Birth</h5>
                    <label for="age">Date of birth</label>
                    <!-- <h5>Date of Birth</h5> -->
                    <input tabindex="4" class="form-control" type="date" name="age" id="age" value="<?php echo $dob ?>">
                    <!-- <input class="date" type="date" name="age" id="age"> -->
                    <span class="error"><?php echo $ageError  ?></span>
                </div>

                <!-- GENDER  -->
                <div class="col-3">
                    <h5>Gender</h5>
                    <div class="form-check">
                        <input tabindex="5" class="form-check-input" type="radio" name="gender" id="male" value="male" <?php echo ($gender === "male") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="male"> Male </label>
                    </div>
                    <div class="form-check">
                        <input tabindex="6" class="form-check-input" type="radio" name="gender" id="female" value="female" <?php echo ($gender === "female") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="female"> Female </label>
                    </div>
                    <span class="error"><?php echo $genderError; ?></span>
                </div>
            </div>


            <div class="row mt-4">
                <!-- FATHERS NAME  -->
                <div class="col-6">
                    <h5>Father's name</h5>
                    <label for="fatherfirstname">First Name</label>
                    <input tabindex="7" type="text" class="form-control w-50 " placeholder="First name" name="fatherfirstname" aria-label="First Name" value="<?php echo $fatherName; ?>">
                    <span class="error"><?php echo $fatherNameError . "<br>"; ?></span>
                    <label for="fatherlastname">Last Name</label>
                    <input tabindex="8" type="text" class="form-control w-50" placeholder="last name" name="fatherlastname" aria-label="Last Name" value="<?php echo $fatherLastName; ?>">
                    <span class="error"><?php echo $fatherLastNameError; ?></span>
                </div>

                <!-- MOTHERS NAME  -->
                <div class="col-6">
                    <h5>Mother's name</h5>
                    <label for="motherfirstname">First Name</label>
                    <input tabindex="9" type="text" class="form-control w-50 " placeholder="First name" name="motherfirstname" aria-label="First Name" value="<?php echo $motherfirstName; ?>">
                    <span class="error"><?php echo $motherfirstNameError . "<br>"; ?></span>
                    <label for="motherlastname">Last Name</label>
                    <input tabindex="10" type="text" class="form-control w-50" placeholder="last name" name="motherlastname" aria-label="Last Name" value="<?php echo $motherLastName; ?>">
                    <span class="error"><?php echo $motherLastNameError; ?></span>
                </div>
            </div>


            <!-- ADDRESS  -->
            <div class="row mt-4">
                <!-- STREET ADDRESS  -->
                <h5>Address</h5>
                <div class="col">
                    <label for="streetaddress">Street</label>
                    <input tabindex="11" type="text" class="form-control" placeholder="Street Address" name="streetaddress" aria-label="Street Address" value="<?php echo $street; ?>">
                    <span class="error"><?php echo $streetError; ?></span>
                </div>
                <!-- CITY -->
                <div class="col">
                    <label for="city">City</label>
                    <input tabindex="12" type="text" class="form-control" placeholder="City" name="city" aria-label="City" value="<?php echo $city; ?>">
                    <span class="error"><?php echo $cityError; ?></span>
                </div>
                <!-- STATE  -->
                <div class="col">
                    <label for="state">State</label>
                    <input tabindex="13" type="text" class="form-control" name="state" placeholder="state / Province" value="<?php echo $state; ?>">
                    <span class="error"><?php echo $stateError; ?></span>
                </div>
                <!-- COUNTRY  -->
                <div class="col">
                    <label for="country">Country</label>
                    <input tabindex="14" type="text" class="form-control" placeholder="Country" name="country" aria-label="Country" value="<?php echo $country; ?>">
                    <span class="error"><?php echo $countryError; ?></span>
                </div>
                <!-- ZIPCODE  -->
                <div class="col">
                    <label for="zipcode">Zip code</label>
                    <input tabindex="15" type="text" class="form-control" placeholder="ZIP Code" name="zipcode" maxlength="6" aria-label="ZIP Code" value="<?php echo $zipcode; ?>">
                    <span class="error"><?php echo $errorZipcode; ?></span>
                </div>
            </div>


            <!-- CONTACT INFORMATION  -->

            <div class="row mt-2">
                <div class="col-6">
                    <h5>Contact Information</h5>
                    <label for="email">Email</label>
                    <input tabindex="16" type="email" class="form-control w-50" id="floatingInput" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
                    <span class="error"><?php echo $emailError; ?></span>
                    <label for="phonenumber">Phone number</label>
                    <input tabindex="17" type="phone" class="form-control w-50" id="floatingInput" maxlength="10" name="phonenumber" placeholder="Phone number" value="<?php echo $phonenumber; ?>">
                    <span class="error"><?php echo $phoneError; ?></span>
                </div>
                <div class="col-6">
                    <h5>Comment</h5>
                    <label for="floatingTextarea2" class="">Comment</label>
                    <textarea tabindex="19" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="comment" style="height: 100px"><?php echo $comment; ?></textarea>
                </div>
            </div>

            <!-- COURSES  -->
            <div class="row">
                <div class="col-6">
                    <h5>Courses</h5>
                    <select tabindex="18" class="form-select w-50 " name="courses" aria-label="Default select example">
                        <option selected>Select Course</option>
                        <option value="b-tech" <?php echo ($courses === "b-tech") ? "selected" : ""; ?>>Bachelor of Technology (B Tech)</option>
                        <option value="b-com" <?php echo ($courses === "b-com") ? "selected" : ""; ?>>Bachelor of Commerce (B Com)</option>
                        <option value="bca" <?php echo ($courses === "bca") ? "selected" : ""; ?>>Bachelor of Computer Applications (BCA)</option>
                        <option value="ba" <?php echo ($courses === "ba") ? "selected" : ""; ?>>Bachelor of Arts (BA)</option>
                        <option value="mbbs" <?php echo ($courses === "mbbs") ? "selected" : ""; ?>>Bachelor of Medicine and Bachelor of Surgery (MBBS)</option>
                    </select>
                </div>
                <!-- SUBMIT  -->
                <div class="d-flex justify-content-end col-6 mt-4 ">
                    <button class="btn btn-primary w-25" type="submit" name="submit" value="signup">Submit</button>
                </div>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>