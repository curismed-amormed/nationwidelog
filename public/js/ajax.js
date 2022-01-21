<section class="main-section">
<div class="container-fluid">
                <div class="d-flex justify-content-between mb-3">
                    <div class="align-self-center">
                        <h2 class="common-title mb-0">Manage Users List</h2>
                    </div>
                    <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewUser" 
                    class="btn btn-success">Add</button></div>
                </div>
                <!-- Add Users Modal -->
                <div class="modal fade" id="ajax-user-model" aria-hidden = "true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajaxUserModel">Add Users Search information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                                <div class="modal-body">
                                <form action="javascript:void(0)" id="addEditUserForm" name="addEditUserForm" 
                                class="form-horizontal" method="POST">
                                <div class="row">
                                    <input type="hidden" name="id" id="id">

                                        <div class="col-md-6 mb-2">
                                            <label>First Name</label>
                                            <input type="text" class="form-control form-control-sm" id = "first_name" name= "first_name" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control form-control-sm" id = "last_name" name= "last_name" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Username</label>
                                            <input type="text" class="form-control form-control-sm" id = "name" name= "username" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Email</label>
                                            <input type="email" class="form-control form-control-sm" id = "email" name = "email" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Role</label>
                                            <select class="form-select form-select-sm" id = "role_id" name = "role_id">
                                                <option value="">Select</option>
                                                <option>Admin</option>
                                                <option>Office Staff</option>
                                                <option>Client</option>
                                                <option>Provider</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="btn-save" value="addNewUser" >Save<i
                                            class="bx bx-loader bx-spin align-middle ms-2 font-size-16"></i></button>
                                            </form>
                                </div>
                                <div class="modal-footer">
                                     <button type="submit" class="btn btn-primary" id="btn-save" value="addNewUser" >Save<i
                                            class="bx bx-loader bx-spin align-middle ms-2 font-size-16"></i></button>
                                    <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>  -->
                                </div>
                            
                        </div>
                    </div>
                </div>
                <!-- table -->
                <div class="table-responsive patient_table">
                    <table class="table table-sm table-bordered c_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Permission</th>
                                <th>Created Date</th>
                                <th>Updated Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#editUSer" data-bs-toggle="modal"
                                                title="Edit"><i class='bx bx-edit'></i></a></li>
                                        <li class="list-inline-item"><a href="#" title="Detele"><i
                                                    class='bx bx-trash text-danger'></i></a></li>
                                    </ul>
                                    <!-- modal -->
                                    <div class="modal fade" id="editUSer" data-bs-backdrop="static"
                                        data-bs-keyboard="false">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Users Search information</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <label>First Name</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Last Name</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Username</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Email</label>
                                                                <input type="email" class="form-control form-control-sm"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Role</label>
                                                                <select class="form-select form-select-sm">
                                                                    <option value="">Select</option>
                                                                    <option>Admin</option>
                                                                    <option>Office Staff</option>
                                                                    <option>Client</option>
                                                                    <option>Provider</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save<i
                                                                class="bx bx-loader bx-spin align-middle ms-2 font-size-16"></i></button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- pagination -->
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>   
        </section>
   @endsection

   <script type="text/javascript">
   <script type="text/javascript">
 $(document).ready(function($){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#addNewUser').click(function () {
       $('#addEditUserForm').trigger("reset");
       $('#ajaxUserModel').html("Add User");
       $('#ajax-user-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('edit-user') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxUserModel').html("Edit User");
              $('#ajax-user-model').modal('show');
              $('#id').val(res.id);
              $('#first_name').val(res.first_name);
              $('#last_name').val(res.last_name);
              $('#username').val(res.username);
              $('#email').val(res.email);
              $('#role_id').val(res.role_id);
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete-user') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              window.location.reload();
           }
        });
       }
    });
    $('body').on('click', '#btn-save', function (event) {
          var id = $("#id").val();
          var first_name = $("#first_name").val();
          var last_name = $("#last_name").val();
          var username = $("#username").val();
          var email = $("#email").val();
          var role_id = $("#role_id").val();
          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('add-update-user') }}",
            data: {
              id:id,
              first_name:first_name,
              last_name:last_name,
              username:username,
              email:email,
              role_id:role_id
            },
            dataType: 'json',
            success: function(res){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });
    });
});
</script>