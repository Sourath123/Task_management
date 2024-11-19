<?php include('header.php'); 

include('class/user.php');
$obj_user = new user();
 $res = $obj_user->get_task();

?>
 <div id="layoutSidenav_content">

 

 <main>

  <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">

                        <div class="container-fluid">

                            <div class="page-header-content">

                                <div class="row align-items-center justify-content-between pt-3">

                                    <div class="col-auto mb-3">

                                        <h1 class="page-header-title">

                                            <div class="page-header-icon"><i data-feather="filter"></i></div>

                                           List of Tasks 
                                        </h1>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </header>

   <!-- Main page content-->

   <div class="container mt-5">

      <div class="card mb-4">

	  <div class="card-body">
        
	      <div class="d-flex justify-content-end align-items-sm-center flex-column flex-sm-row mb-4">

	      <a href="add_task.php" class="btn btn-primary mr-2">Add Task</a>
          <div  id="head1" >
          </div>
	      </div>
          <div class="row">
      <select class="form-control col-md-2" id="search" name="search" style="margin-left:1%;margin-bottom:2%;">
    <option value="" selected >Select</option>
    <option value="city" >Work</option>
    <option value="state" >Personal</option>
</select>
<input type="text" id="search_item" class="form-control col-md-3" style="margin-left:1%;">
<button class="btn btn-primary mr-2" id="search_btn" style=" height: 41px;
    margin-left: 10px;">Search</button>
 </div>
 <div class="datatable">
    <table class="table table-bordered table-hover" id="tasks" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Task Name</th>
                <th>Task Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Category</th>
                
                <th>User</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach($res as $row){ 
                if($row['task_category'] == '1'){
                    $cat = 'Work';
                }else{
                    $cat = 'Personal';
                }?>
            <tr>
<td><?= $i;?></td>
<td><?= $row['task_name'];?></td>
<td><?= $row['task_desc'];?></td>
<td><?= $row['start_date'];?></td>
<td><?= $row['end_date'];?></td>
<td><?= $cat;?></td>
<td><?= $row['first_name'].$row['last_name'];?></td>
<td><a href="edit_task.php?id=<?=$row['task_id'];?>" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" data-tooltip="tooltip" title="Edit"><i data-feather="edit"></i></a> &nbsp;<a href="#" data-toggle="modal" data-target="#confirm-delete" data-id="<?= $row['task_id'];?>" class="btn btn-datatable btn-icon btn-transparent-dark mr-2" data-tooltip="tooltip" title="Delete"><i data-feather="trash-2"></i></a></td>
            </tr>
            <?php $i++;}?>
        </tbody>
        
    </table>
</div>

	  

	   </div>

		</div>

	</div>

 </main>



            </div>

        </div>

		

	<!-- Modal -->

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>

                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

            </div>

            <div class="modal-body">Are you sure want to delete this Task?</div>
          
           <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" id="delete_rest" type="button">Delete</button></div>

        </div>

    </div>

</div>	


</div>

		
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">		

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/dashboard.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>


        

    </body>

</html>

