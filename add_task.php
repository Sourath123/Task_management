<?php

include('header.php');

include('class/user.php');

$obj_user = new user();
$user = $obj_user->getuser();

?>



<div id="layoutSidenav_content">



    <main>

        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">

            <div class="container-fluid">

                <div class="page-header-content">

                    <div class="row align-items-center justify-content-between pt-3">

                        <div class="col-auto mb-3">

                            <h1 class="page-header-title">

                                <div class="page-header-icon"><i data-feather="user"></i></div>

                                Add Task

                            </h1>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        <!-- Main page content-->

        <div class="container mt-5">



            <form role="form" action="" method="POST" enctype="multipart/form-data" id="add_task">

                <div class="card mb-4">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-xl-12 pr-3">

                                <div class="form-group">

                                    <label class="small mb-1" for="inputUsername">Task Name <span
                                            class="text-danger">*</span></label>

                                    <input class="form-control" id="taskname" name="taskname" type="text"
                                        placeholder="Enter Task name" value="" autocomplete="off" />

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">

                                        <label class="small mb-1" for="startdate">Start Date</label>

                                        <input class="form-control" id="startdate" name="startdate" type="date" />

                                    </div>

                                    <div class="form-group col-md-6">

                                        <label class="small mb-1" for="enddate">End date</label>

                                        <input class="form-control" id="enddate" name="enddate" type="date" />

                                    </div>

                                </div>


                                <div class="form-row">

                                    <div class="form-group col-md-6">

                                        <label class="small mb-1" for="user">Assign user</label>

                                        <select class="form-control" id="user" name="user">

                                            <!-- <option value="">Select</option> -->
                                            <option>Select</option>
                                            <?php



                                            foreach ($user as $k => $val) {

                                                $selected = "";

                                                echo "<option value='" . $val['id'] . "' $selected >" . $val['first_name'] . "</option>";



                                            }



                                            ?>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">

                                        <label class="small mb-1" for="category">Task Category</label>

                                        <select class="form-control" id="category" name="category">

                                            <!-- <option value="">Select</option> -->
                                            <option value="1">Work</option>
                                            <option value="0">Personal</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="small mb-1" for="description">Task Details </label>

                                    <textarea class="form-control" rows="3" id="description" name="description"
                                        placeholder="Enter Task Details"></textarea>

                                </div>
                                <div class="d-flex justify-content-end">

<button class="btn btn-primary" type="submit">Submit</button>

</div>
                            </div>
                        </div>

                    </div>

            </form>



        </div>



    </main>


</div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="js/jquery.maskedinput.js"></script>

<script src="js/scripts.js"></script>

<script src="js/dashboard.js"></script>



</body>



</html>