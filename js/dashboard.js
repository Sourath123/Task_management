$("#add_task").on("submit", function (e) {
    e.preventDefault();
    let err = 0;
    const name = $("#taskname").val().trim();
    const startdate = $("#startdate").val().trim();
    const enddate = $("#enddate").val().trim();
    const user = $("#user").val().trim();
    const category = $("#category").val().trim();
    const description = $("#description").val().trim();

    $(".form-control").css("border", "1px solid #ccc");


    if (name === "") {
        err = 1;
        swal("Error!", "Please Enter Task Name", "error");
        $("#taskname").css("border", "solid 1px red").focus();
        return false;
    }


    if (category === "") {
        err = 1;
        swal("Error!", "Please Select Category", "error");
        $("#category").css("border", "solid 1px red").focus();
        return false;
    }


    if (err === 0) {
        $.ajax({
            type: "POST",
            url: "ajax/add_task.php",
            data: {
                name: name,
                startdate: startdate,
                enddate: enddate,
                user: user,
                category: category,
                description: description
            },
            success: function (responseData) {
               // alert(responseData);
                try {
                    const response = JSON.parse(responseData);
                   // alert(response.is_error);
                    if (response.is_error == 0) {
                        swal("Success!", "Task added successfully!", "success").then(() => {
                     
                            $("#add_task")[0].reset();
                        });
                    } else {
                        swal("Error!", "Unexpected Error Occured!", "error");
                    }
                } catch (e) {
                    swal("Error!", "Unexpected server response!", "error");
                }
            },
          
        });
    }
});

$("#edit_task").on("submit", function (e) {
    e.preventDefault();
    let err = 0;
    const name = $("#taskname").val().trim();
    const startdate = $("#startdate").val().trim();
    const enddate = $("#enddate").val().trim();
    const user = $("#user").val().trim();
    const category = $("#category").val().trim();
    const description = $("#description").val().trim();
    const status = $("#task_status").val().trim();
    const task_id = $("#task_id").val().trim(); 

    $(".form-control").css("border", "1px solid #ccc");


    if (name === "") {
        err = 1;
        swal("Error!", "Please Enter Task Name", "error");
        $("#taskname").css("border", "solid 1px red").focus();
        return false;
    }


    if (category === "") {
        err = 1;
        swal("Error!", "Please Select Category", "error");
        $("#category").css("border", "solid 1px red").focus();
        return false;
    }


    if (err === 0) {
        $.ajax({
            type: "POST",
            url: "ajax/edit_task.php",
            data: {
                name: name,
                startdate: startdate,
                enddate: enddate,
                user: user,
                category: category,
                description: description,
                status: status,
                task_id:task_id
            },
            success: function (responseData) {
               // alert(responseData);
                try {
                    const response = JSON.parse(responseData);
                   // alert(response.is_error);
                    if (response.is_error == 0) {
                        swal("Success!", "Task Updated successfully!", "success").then(() => {
                     
                           location.reload();
                        });
                    } else {
                        swal("Error!", "Unexpected Error Occured!", "error");
                    }
                } catch (e) {
                    swal("Error!", "Unexpected server response!", "error");
                }
            },
          
        });
    }
});


$('#confirm-delete').on('show.bs.modal', function(e) {
	
	
    var rest_id = $(e.relatedTarget).data('id');
	$('#delete_rest').on('click', function(e){
	$.ajax({
	      
		  url: 'ajax/delete_task.php',
          type: 'POST',
          data: {rest_id: rest_id},
          dataType: 'json',
		    success: function (response) {
              
				$("#confirm-delete").modal('hide');
				
					swal("Success!", "Successfully Deleted Task!", "success");
                    // $('#tasks').DataTable().draw();
                    location.reload();
					
						 
	        }
 
		  });
		
	});
	
});	 
