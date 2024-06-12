<?php
$lecturer_id = $_GET['edit_lecturer'];

$user = new User();
//fetch user data
$sql = "SELECT * FROM `lecturer` WHERE `lecturer_id` = '$lecturer_id'";
$row = $user->details($sql);

if (!$row) {
    //If enter Manually wrong id in the url
    echo "  <script>
                    window.location.href='index.php?lecturers';
                </script> ";
}

echo $first_name = $row['first_name'];
echo $last_name = $row['last_name'];
echo $phone = $row['phone'];
echo $subject = $row['subject'];


?>


<style>
    .image{
        display: inline;
        position: relative;

    }

    .bi-x-circle-fill{
        position: absolute;
        right: 0;
        top: 0;
        height: 21px;
        width: 21px;
        background-color: #FFFFFF;
        border-radius: 25px;
        cursor: pointer;
    }

</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit College</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Colleges</li>
                <li class="breadcrumb-item active">Edit Colleges</li>
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
                        <form class="row g-3 pt-4" method="POST" action="includes/function.php"
                              enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="first_name" id="college_name"
                                           placeholder="First Name" value="<?=$first_name?>" required>
                                    <label for="floatingName">First Name</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                           placeholder="last Name" value="<?=$last_name?>" required>
                                    <label for="floatingName">Last Name</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                           placeholder="Enter your subject" value="<?=$subject?>" required>
                                    <label for="floatingName">Subject</label>
                                </div>
                            </div>


                            <div class="col-md-12 d-none">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="lecturer_id" id="lecturer_id"
                                           placeholder="" value="<?=$lecturer_id?>" required readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="phone" id="phone"
                                           placeholder="Your Email" value="<?=$phone?>"  required>
                                    <label for="floatingEmail">Phone No.</label>
                                </div>
                            </div>



                            <div class="text-center">
                                <button type="submit" name="edit_lecturer" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<script>
    function myFunction(value)
    {
        var id = value;

        let text = "Are you sure, you want to delete current college Image?";
        if (confirm(text) == true)
        {
            // text = "You pressed OK!";
            window.location.href = 'includes/function.php?delete_image='+id;
        }
        else
        {
            text = "You canceled!";
        }
        // document.getElementById("demo").innerHTML = text;
    }



</script>