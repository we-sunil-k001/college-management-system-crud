
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
                        <div class="text-end"><button class="btn btn-md btn-success my-3 px-4">Add New</button></div>



                        <!-- Table with stripped rows -->
                        <table class="table datatable ">
                            <thead>
                            <tr>
                                <th style="width: 10%">S.no </th>
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

                                    foreach($result as $row)
                                    {
                                        ?>
                                        <tr>
                                            <td class="align-middle"><?php echo $row['name']; ?></td>
                                            <td class="align-middle"><?php echo $row['name']; ?></td>
                                            <td class="align-middle"><?php echo $row['phone']; ?></td>
                                            <td class="align-middle"><?php echo $row['address']; ?></td>
                                            <td class="align-middle"><?php echo $row['status']; ?></td>
                                            <td class="align-middle"><a href="#" class="text-light  bg-success px-2 rounded p-1 "><i class="bi bi-pencil-square"></i> </a></td>
                                            <td class="align-middle"><a href="#" class="text-light bg-danger px-2 rounded p-1 "><i class="bi bi-trash"></i> </a></td>

                                        </tr>

                                        <?php
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