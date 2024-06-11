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
        <h1>Add New College</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Colleges</li>
                <li class="breadcrumb-item active">Add New Colleges</li>
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
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="college_name" id="college_name"
                                           placeholder="Your Name" required>
                                    <label for="floatingName">College Name</label>
                                </div>
                            </div>

                            <div class="col-md-12 d-none">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="created_by" id="created_by"
                                           placeholder="" value="<?=$admin_id?>" required readonly>
                                </div>
                            </div>

                            <div class="col-md-12 d-none">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="college_id" id="college_id"
                                           placeholder="" value="<?=$college_id?>" required readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="phone" id="phone"
                                           placeholder="Your Email" required>
                                    <label for="floatingEmail">Phone No.</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Address" name="address" required id="address"
                                              style="height: 100px;"></textarea>
                                    <label for="floatingTextarea">Address</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="upload_main_image" id="upload_main_image"
                                          required>
                                    <label for="floatingTextarea" class="mb-4">Media (Max. size, 500kb png/jpg/jpeg) </label>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" name="add_college" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->