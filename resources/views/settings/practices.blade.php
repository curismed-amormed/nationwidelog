@extends('main')
@section('index')
<section class="main-section">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-3">
                    <div class="align-self-center">
                        <h2 class="common-title mb-0">Manage Practices</h2>
                    </div>
                    <div class="align-self-center">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target = "#ajax-practice-model"><i
                                        class='ri-add-line align-middle me-1' id="addNewPractice"></i>Add Practice</a>
                        <!-- <div class="btn btn-sm btn-primary" data-bs-toggle="modal">
                            <button type="button" class='ri-add-line align-middle me-1'id="addNewPractice"></i>Add Practice</div> -->
                    </div>
                </div>
                <!-- Add Records Modal -->
                <!-- modal -->
                <div class="modal fade" id="ajax-practice-model" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajaxPracticeModel">Add Practice Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="#javascript:void(0)" id="addEditPracticeForm" name="addEditPracticeForm"
                            method = "POST">
                                <div class="modal-body">
                                    <div class="row">
                                    <input type="hidden" name="id" id="id">

                                        <div class="col-md-6 mb-2">
                                            <label>Name</label>
                                            <input type="text" class="form-control form-control-sm" id="name" name = "name" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Address 1</label>
                                            <input type="text" class="form-control form-control-sm" id="address1" name = "address1" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Address 2</label>
                                            <input type="text" class="form-control form-control-sm" id="address2" name = "address2" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Email</label>
                                            <input type="email" class="form-control form-control-sm" id="email" name = "email" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Phone</label>
                                            <input type="number" class="form-control form-control-sm" id="phone" name = "phone" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-save" value="addNewPractice">Save<i
                                            class="bx bx-loader bx-spin align-middle ms-2 font-size-16"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- table -->
                <div class="table-responsive patient_table">
                    <table class="table table-sm table-bordered c_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Practice Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Contact Person</th>
                                <th>User Count</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($practices as $practice)
                            <tr>
                                <td>{{ $practice->id }}</td>
                                <td>{{ $practice->name }}</td>
                                <td>{{ $practice->address1 }}</td>
                                <td>{{ $practice->address2 }}</td>
                                <td>{{ $practice->email }}</td>
                                <td>{{ $practice->phone }}</td>
                                <td>{{ $practice->created_at }}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="javascript:void(0)" data-id="{{ $practice->id }}" data-bs-toggle="modal"
                                                title="Edit" class="edit"><i class='bx bx-edit'></i></a></li>
                                        <li class="list-inline-item"><a href=""  title="Pdf"><i class='bx bxs-file-pdf'></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" data-id="{{ $practice->id }}" title="Detele"
                                        class="delete"><i
                                                    class='bx bx-trash text-danger'></i></a></li>
                                    </ul>
                                    @endforeach
                                    <!-- modal -->
                                    <div class="modal fade" id="editPrac" data-bs-backdrop="static"
                                        data-bs-keyboard="false">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Practice Information</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <label>Name</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Address 1</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Address 2</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Email</label>
                                                                <input type="email" class="form-control form-control-sm"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Phone</label>
                                                                <input type="tel" class="form-control form-control-sm"
                                                                    required>
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
                <!-- <ul class="pagination">
                    <li class="page-item"> -->
                    {!! $practices->links() !!}
                        <!-- <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a> -->
                    <!-- </li> -->
                    <!-- <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a> -->
                    </li>
                </ul>
            </div>
        </section>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script type="text/javascript">
 $(document).ready(function($){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#addNewPractice').click(function () {
       $('#addEditPracticeForm').trigger("reset");
       $('#ajaxPracticeModel').html("Add Practice");
       $('#ajax-practice-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        console.log('id');
    //    $('#editUSer').modal('show');
        // $('#editUSer').show();
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('practice.edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
            //   $('#ajaxUserModel').html("Edit User");
              $('#ajax-practice-model').modal('show');
              $('#id').val(res.id);
              $('#name').val(res.name);
              $('#address1').val(res.address1);
              $('#address2').val(res.address2);
              $('#email').val(res.email);
              $('#phone').val(res.phone);
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('practice.delete') }}",
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
          var name = $("#name").val();
          var address1 = $("#address1").val();
          var address2 = $("#address2").val();
          var email = $("#email").val();
          var phone = $("#phone").val();
          console.log(name);
          console.log('id');
          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('practice.store') }}",
            data: {
              id:id,
              name:name,
              address1:address1,
              address2:address2,
              email:email,
              phone:phone
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
@endsection
