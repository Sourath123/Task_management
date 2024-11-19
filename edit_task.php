<?php

include('header.php');

include('class/user.php');

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;

$obj_user = new user();
$user = $obj_user->getuser();
$details = $obj_user->getdetails($id);
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

                                View/Edit Task

                            </h1>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        <!-- Main page content-->

        <div class="container mt-5">



            <form role="form" action="" method="POST" enctype="multipart/form-data" id="edit_task">

                <div class="card mb-4">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-xl-12 pr-3">

                                <div class="form-row">

                                    <div class="form-group col-md-6">
<input type="hidden" value="<?php echo $id;?>" id="task_id" name="task_id">
                                        <label class="small mb-1" for="inputUsername">Task Name <span
                                                class="text-danger">*</span></label>

                                        <input class="form-control" id="taskname" name="taskname" type="text"
                                            placeholder="Enter Task name" value="<?php echo $details['task_name']; ?>"
                                            autocomplete="off" />

                                    </div>
                                    <div class="form-group col-md-6">

                                        <label class="small mb-1" for="task_status">Task Status</label>

                                        <select class="form-control" id="task_status" name="task_status">
<option value="">Select</option>
<option value="1"  <?php if ($details['status'] == '1') {
                                                echo 'Selected';
                                            } ?>>Pending</option>
<option value="2"  <?php if ($details['task_category'] == '2') {
                                                echo 'Selected';
                                            } ?>>In-progress</option>
<option value="3"  <?php if ($details['task_category'] == '3') {
                                                echo 'Selected';
                                            } ?>>Completed</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">

                                        <label class="small mb-1" for="startdate">Start Date</label>

                                        <input class="form-control" id="startdate" name="startdate" type="date"
                                            value="<?= $details['start_date']; ?>" />

                                    </div>

                                    <div class="form-group col-md-6">

                                        <label class="small mb-1" for="enddate">End date</label>

                                        <input class="form-control" id="enddate" name="enddate" type="date"
                                            value="<?= $details['end_date']; ?>" />

                                    </div>

                                </div>


                                <div class="form-row">

                                    <div class="form-group col-md-6">

                                        <label class="small mb-1" for="user">Assign user</label>

                                        <select class="form-control" id="user" name="user">
                                            <option value="">Select</option>
                                            <?php
                                            foreach ($user as $val) {
                                                $selected = "";
                                                if (isset($details['user_id']) && trim($details['user_id']) == $val['id']) {
                                                    $selected = "selected";
                                                }
                                                echo "<option value='{$val['id']}' $selected>" . htmlspecialchars($val['first_name'], ENT_QUOTES) . "</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>

                                    <div class="form-group col-md-6">

                                        <label class="small mb-1" for="category">Task Category</label>

                                        <select class="form-control" id="category" name="category">

                                            <!-- <option value="">Select</option> -->
                                            <option value="1" <?php if ($details['task_category'] == '1') {
                                                echo 'Selected';
                                            } ?>>Work</option>
                                            <option value="0" <?php if ($details['task_category'] == '0') {
                                                echo 'Selected';
                                            } ?>>Personal</option>

                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="small mb-1" for="description">Task Details </label>

                                    <textarea class="form-control" rows="3" id="description" name="description"
                                        placeholder="Enter Task Details"><?= $details['task_desc']; ?></textarea>

                                </div>
                                <div class="d-flex justify-content-end">

                                    <button class="btn btn-primary" type="submit">Update</button>

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