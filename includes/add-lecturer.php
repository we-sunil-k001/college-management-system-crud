<?php

//Generating random code
function random_strings($length_of_string)
{
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';         // String of all alphanumeric character
    return substr(str_shuffle($str_result),0, $length_of_string);       // Shuffle the $str_result and returns substring of specified length
}

$college_id =  "Col".random_strings(8);         // This function will generate Random string of length 8

?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add New lecturer</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">lecturer</li>
                <li class="breadcrumb-item active">Add New lecturer</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <!--                        <h5 class="card-title"></h5>-->

                        <!-- Floating Labels Form -->
                        <form class="row g-3 pt-4" method="POST" action="includes/function.php" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="first_name" id="college_name"
                                           placeholder="First Name" required>
                                    <label for="floatingName">First Name</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                           placeholder="last Name" required>
                                    <label for="floatingName">Last Name</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                           placeholder="Enter your subject" required>
                                    <label for="floatingName">Subject</label>
                                </div>
                            </div>

                            <div class="col-md- d-none">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="created_by" id="created_by"
                                           placeholder="" value="<?=$user_id?>" required readonly>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="phone" id="phone"
                                           placeholder="Your Email" required>
                                    <label for="floatingEmail">Phone No.</label>
                                </div>
                            </div>


                            <div class="text-center">
                                <button type="submit" name="add_lecturer" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->