
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Manage lecturers</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">lecturers</li>
                <li class="breadcrumb-item active">Manage lecturers</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="text-end"><button class="btn btn-md btn-success my-3 px-4" onclick="window.location.href = 'index.php?add-lecturer'">Add New</button></div>



                        <!-- Table with stripped rows -->
                        <table class="table datatable ">
                            <thead>
                            <tr>
                                <th class="text-center">S.no </th>
                                <th>First Name </th>
                                <th>Last Name</th>
                                <th>Phone No.</th>
                                <th>Subject</th>
<!--                                <th>Status</th>-->
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            //fetch user data
                            $sql = "SELECT * FROM `lecturer` WHERE `created_by` = '$user_id'";
                            $result = $user->get_All_College($sql);
                            $count = 1;

                            foreach($result as $row)
                            {
                                $college_id = $row['college_id'];
                                ?>
                                <tr>
                                    <td class="align-middle text-center"><?php echo $count; ?></td>

                                    <td class="align-middle"><?php echo $row['first_name']; ?></td>
                                    <td class="align-middle"><?php echo $row['last_name']; ?></td>
                                    <td class="align-middle"><?php echo $row['phone']; ?></td>
                                    <td class="align-middle"><?php echo $row['subject']; ?></td>
<!--                                    <td class="align-middle">--><?php //echo $row['status']; ?><!--</td>-->
                                    <td class="align-middle text-center"><a href="index.php?edit_college=<?=$college_id?>" class="text-light  bg-success px-2 rounded p-1 "><i class="bi bi-pencil-square"></i> </a></td>
                                    <td class="align-middle text-center"><a href="includes/function.php?delete_college=<?=$college_id?>" class="text-light bg-danger px-2 rounded p-1 " onclick="return  confirm('Are you sure, You want to delete this College? ')"><i class="bi bi-trash"></i> </a></td>
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