
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Colleges</li>
                <li class="breadcrumb-item active">Manage Colleges</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="text-end"><button class="btn btn-md btn-success my-3 px-4" onclick="window.location.href = 'index.php?add-college'">Add New</button></div>



                        <!-- Table with stripped rows -->
                        <table class="table datatable ">
                            <thead>
                            <tr>
                                <th style="width: 10%">S.no </th>
                                <th style="width: 5%">Preview </th>
                                <th style="width: 20%">College Name</th>
                                <th style="width: 10%">Phone No.</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                                //fetch user data
                                $sql = "SELECT * FROM `college` WHERE `created_by` = '$admin_id'";
                                $result = $user->get_All_College($sql);
                                $count = 1;

                                    foreach($result as $row)
                                    {
                                        $college_id = $row['college_id'];
                                        ?>
                                        <tr>
                                            <td class="align-middle"><?php echo $count; ?></td>
                                            <td class="align-middle">
                                                <img src="uploaded_college_images/<?= $row['image_url']?>" id="product-img" class="" style="height:50px; width:80px" alt="<?php
                                                $alt= str_replace(' ', '-', ( $row['image_url']));
                                                echo $alt?>">
                                            </td>
                                            <td class="align-middle"><?php echo $row['name']; ?></td>
                                            <td class="align-middle"><?php echo $row['phone']; ?></td>
                                            <td class="align-middle"><?php echo $row['address']; ?></td>
                                            <td class="align-middle"><?php echo $row['status']; ?></td>
                                            <td class="align-middle"><a href="#" class="text-light  bg-success px-2 rounded p-1 "><i class="bi bi-pencil-square"></i> </a></td>
                                            <td class="align-middle"><a href="includes/function.php?delete_college=<?=$college_id?>" class="text-light bg-danger px-2 rounded p-1 " onclick="return  confirm('Are you sure, You want to delete this College? ')"><i class="bi bi-trash"></i> </a></td>
                                        </tr>

                                        <?php
                                        $count++;
                                    }
                                    ?>

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->