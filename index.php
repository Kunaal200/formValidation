<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body><?php

        $fNameError = $mNameError = $lNameError = $genderError = $fatherNameError = $fatherLastNameError = $motherfirstNameError = $motherLastNameError = $streetError =  $cityError  = $stateError =  $countryError = $errorZipcode   = $emailError = $phoneError =  $ageError = "";

        $fName = $_POST["firstname"] ?? "";
        $mName = $_POST["middlename"] ?? "";
        $lName = $_POST["lastname"] ?? "";
        $age = $_POST["age"] ?? "";
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



        if (isset($_POST["submit"]) ? "signup" : "") {

            if (empty($age)) {
                $bdate = $_POST['age'];

                $birthDate = new DateTime($bdate);
                $today = new DateTime();

                $age = $today->diff($birthDate)->y;

                if ($age < 18) {
                    $ageError = "Must be 18 or older.";
                }
            } else {
                $ageError = "Please enter your birth date.";
            }

            // name validation  
            $fNameError = empty($fName) ? "" : (!preg_match("/^[a-zA-Z]+$/", $fName) ? "First name should only contain letters and must not include spaces or numbers" : "");
            $mNameError = empty($mName) ? "* Please enter your Middle name!" : (!preg_match("/^[a-zA-Z]+$/", $mName) ? "Middle name should only contain letters and must not include spaces or numbers" : "");
            $lNameError = empty($lName) ? "* Please enter your Last name!" : (!preg_match("/^[a-zA-Z]+$/", $lName) ? "Last name should only contain letters and must not include spaces or numbers" : "");

            //  gender 
            $genderError = empty($gender) ? "Please select your gender!" : "";

            // fathers name 

            $fatherNameError = empty($fatherName) ? "Please enter your father's name!" : (!preg_match("/^[a-zA-Z]+$/", $fatherName) ? "First name should only contain letters and must not include spaces or numbers" : "");
            $fatherLastNameError = empty($fatherLastName) ?  "Please enter your father's last name!" : (!preg_match("/^[a-zA-Z]+$/", $fatherLastName) ? "First name should only contain letters and must not include spaces or numbers" : "");


            // mothers name 

            $motherfirstNameError = empty($motherfirstName) ? "Please enter your mother's name!" : (!preg_match("/^[a-zA-Z]+$/", $motherfirstName) ? "First name should only contain letters and must not include spaces or numbers" : "");
            $motherLastNameError = empty($motherLastName) ?  "Please enter your mother  's last name!" : (!preg_match("/^[a-zA-Z]+$/", $motherLastName) ? "First name should only contain letters and must not include spaces or numbers" : "");

            // adrress 

            $streetError = empty($street) ? "Please enter your street." : "";
            $cityError = empty($city) ? "* please enter your city" : "";
            $stateError = empty($state) ? "* Please enter your state." : "";
            $countryError = empty($country) ? "* please enter your country" : "";
            $errorZipcode = empty($zipcode) ? "Zip code is required!" : (!preg_match("/^\d{6}$/", $zipcode) ? "Zip code must be exactly 6 numeric digits." : "");

            // email and phone number 


            $emailError = empty($email) ? "Email is required." : (!filter_var($email, FILTER_VALIDATE_EMAIL) ? "Invalid email format." : "");
            $phoneError = empty($phonenumber) ? "Phone number is required!" : (!preg_match("/^\d{1,10}$/", $phonenumber) ? "Phone number must be numeric and up to 10 digits." : "");


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
        //     if ($exit === true) {
        //         $exit;
        //     }
        // }
        ?>



    <div class="container">


        <h1>Student Registration Form</h1>
        <p>Fill out the form to apply for the courses. You can consider your application accepted after you receive a confirmation email.</p>


        <form method="POST" action="">
            <h3>Student Information</h3>
            <!-- NAME  -->
            <div class="row">
                <h5>Your Name</h5>
                <div class="col">
                    <span class="error"><?php echo $fNameError; ?></span>
                    <input type="text" class="form-control w-50 " placeholder="First name" name="firstname" id="firstname" aria-label="First Name" value="<?php echo $fName; ?>">
                    <span class="error"><?php echo $mNameError; ?></span>
                    <input type="text" class="form-control w-50 my-2" placeholder="Middle name" name="middlename" aria-label="Middle Name" value="<?php echo $mName; ?>">
                    <span class="error"><?php echo $lNameError; ?></span>
                    <input type="text" class="form-control w-50 my-2" placeholder="Last name" name="lastname" aria-label="Last Name" value="<?php echo $lName; ?>">
                </div>
                <!-- <div>
                    <span class="error"><?php echo $ageError; ?></span>
                    <input class="date" type="date" name="age" id="age">
                </div>
                <div> -->

                <div>
                    <span class="error"><?php echo $ageError  ?></span>
                    <!-- <label for="age">Date of birth</label> -->
                    <p>Date of Birth</p>
                    <input class="date" type="date" name="age" id="age">
                </div>

                <!-- GENDER  -->
                <div class="col">
                    <h4>Gender</h4>
                    <span class="error"><?php echo $genderError; ?></span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php echo ($gender === "male") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="male"> Male </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php echo ($gender === "female") ? "checked" : ""; ?>>
                        <label class="form-check-label" for="female"> Female </label>
                    </div>
                </div>
            </div>


            <div class="col-6 d-flex w-100">

                <!-- FATHERS NAME  -->
                <div class="col-6">
                    <h5>Father's name</h5>
                    <span class="error"><?php echo $fatherNameError; ?></span>
                    <input type="text" class="form-control w-50 " placeholder="First name" name="fatherfirstname" aria-label="First Name" value="<?php echo $fatherName; ?>">
                    <span class="error"><?php echo $fatherLastNameError; ?></span>
                    <input type="text" class="form-control w-50 my-2" placeholder="last name" name="fatherlastname" aria-label="Last Name" value="<?php echo $fatherLastName; ?>">
                </div>

                <!-- MOTHERS NAME  -->
                <div class="col-6">
                    <h5>Mothers's name</h5>
                    <span class="error"><?php echo $motherfirstNameError; ?></span>
                    <input type="text" class="form-control w-50 " placeholder="First name" name="motherfirstname" aria-label="First Name" value="<?php echo $motherfirstName; ?>">
                    <span class="error"><?php echo $motherLastNameError; ?></span>
                    <input type="text" class="form-control w-50 my-2" placeholder="last name" name="motherlastname" aria-label="Last Name" value="<?php echo $motherLastName; ?>">
                </div>
            </div>


            <!-- ADDRESS  -->
            <div class="row mt-4">
                <h3>Address</h3>
                <!-- STREET ADDRESS  -->
                <div class="col">
                    <span class="error"><?php echo $streetError; ?></span>
                    <input type="text" class="form-control" placeholder="Street Address" name="streetaddress" aria-label="Street Address" value="<?php echo $street; ?>">
                </div>
                <!-- CITY -->
                <div class="col">
                    <span class="error"><?php echo $cityError; ?></span>
                    <input type="text" class="form-control" placeholder="City" name="city" aria-label="City" value="<?php echo $city; ?>">
                </div>
                <!-- STATE  -->
                <div class="col">
                    <span><?php echo $stateError; ?></span>
                    <input type="text" class="form-control" name="state" placeholder="state / Province" value="<?php echo $state; ?>">
                </div>
                <!-- COUNTRY  -->
                <div class="col">
                    <span><?php echo $countryError; ?></span>
                    <input type="text" class="form-control" placeholder="Country" name="country" aria-label="Country" value="<?php echo $country; ?>">
                </div>
                <!-- ZIPCODE  -->
                <div class="col">
                    <span class="error"><?php echo $errorZipcode; ?></span>
                    <input type="text" class="form-control" placeholder="ZIP Code" name="zipcode" aria-label="ZIP Code" value="<?php echo $zipcode; ?>">
                </div>
            </div>


            <!-- CONTACT INFORMATION  -->

            <div class="col mt-2">
                <h3>Contact Information</h3>
                <div class="row d-flex">
                    <span class="error"><?php echo $emailError; ?></span>
                    <input type="email" class="form-control w-50 mx-2" id="floatingInput" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
                    <span class="error"><?php echo $phoneError; ?></span>
                    <input type="phone" class="form-control w-50 mx-2 my-4" id="floatingInput" name="phonenumber" placeholder="Phone number" value="<?php echo $phonenumber; ?>">
                </div>
            </div>

            <!-- COURSES  -->
            <h3>Courses</h3>
            <div class="col">
                <select class="form-select w-50" name="courses" aria-label="Default select example">
                    <!-- <option selected>Courses</option> -->
                    <option value="b-tech" <?php echo ($courses === "b-tech") ? "selected" : ""; ?>>Bachelor of Technology (B Tech)</option>
                    <option value="b-com" <?php echo ($courses === "b-com") ? "selected" : ""; ?>>Bachelor of Commerce (B Com)</option>
                    <option value="bca" <?php echo ($courses === "bca") ? "selected" : ""; ?>>Bachelor of Computer Applications (BCA)</option>
                    <option value="ba" <?php echo ($courses === "ba") ? "selected" : ""; ?>>Bachelor of Arts (BA)</option>
                    <option value="mbbs" <?php echo ($courses === "mbbs") ? "selected" : ""; ?>>Bachelor of Medicine and Bachelor of Surgery (MBBS)</option>
                </select>
            </div>
            <div class="form-floating my-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="comment" style="height: 100px"><?php echo $comment; ?></textarea>
                <label for="floatingTextarea2">Comment</label>
            </div>

            <!-- SUBMIT  -->
            <div class="d-grid gap-2 col-6 mx-auto mt-5">
                <button class="btn btn-primary" type="submit" name="submit" value="signup">Submit</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>