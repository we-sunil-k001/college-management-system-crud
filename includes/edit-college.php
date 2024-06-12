<?php
$college_id = $_GET['edit_college'];

$user = new User();
//fetch user data
$sql = "SELECT * FROM `college` WHERE `college_id` = '$college_id'";
$row = $user->details($sql);

if (!$row) {
    //If enter Manually wrong id in the url
    echo "  <script>
                    window.location.href='index.php?colleges';
                </script> ";
}

$college_name = $row['name'];
$address = $row['address'];
$phone = $row['phone'];
$image_url = $row['image_url'];

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
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="college_name" id="college_name"
                                           placeholder="Your Name" value="<?= $college_name ?>" required>
                                    <label for="floatingName">College Name</label>
                                </div>
                            </div>


                            <div class="col-md-12 d-none">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="college_id" id="college_id"
                                           placeholder="" value="<?= $college_id ?>" required readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="phone" id="phone"
                                           placeholder="Your Email"  value="<?= $phone ?>" required>
                                    <label for="floatingEmail">Phone No.</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Address" name="address" required
                                              id="address"
                                              style="height: 100px;"> <?= $address ?></textarea>
                                    <label for="floatingTextarea">Address</label>
                                </div>
                            </div>


                            <?php
                            if(empty($image_url))
                            {
                                ?>
                                <div class="form-group col-sm-12 pt-3">
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" name="upload_main_image"
                                               id="upload_main_image" required>
                                        <label for="floatingTextarea" class="mb-4">Media (Max. size, 500kb
                                            png/jpg/jpeg) </label>
                                    </div>
                                </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="form-group col-sm-12 pt-3">
                                    <div class="col-sm-12">
                                        <small class="text-danger fw-bold">To add new Cover Image, delete existing below image first.</small>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>


                            <?php
                            if(!empty($image_url))
                            {
                                ?>
                                <div class="col-md-12 container pt-3">
                                    <label for="inputName5" class="form-label">Uploaded College Image</label>

                                    <div class="row">

                                        <div class="col-md-2 image col-sm-12 col-6 p-2 mb-3 text-center shadow-sm">
                                            <a onclick="myFunction('<?=$college_id?>')"><i class="bi bi-x-circle-fill text-danger"></i></a>
                                            <img src="uploaded_college_images/<?= $row['image_url']?>" id="college-img" class="img-fluid" style="" alt="<?php
                                            $alt= str_replace(' ', '-', ( $row['image_url'])); echo$alt ?>">      <!--  Important....-->
                                            <br><sub class="fw-bold p-2"><?= $row['image_url']?> <sub>

                                        </div>

                                    </div>
                                </div>
                                <?php
                            }
                            ?>



                            <div class="text-center">
                                <button type="submit" name="edit_college" class="btn btn-primary w-100">Submit</button>
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