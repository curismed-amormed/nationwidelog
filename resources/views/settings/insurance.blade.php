@extends('main')
@section('index')

<section class="main-section">
            <div class="container-fluid">
                <!-- table -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="align-self-center">
                                <h2 class="common-title mb-0">Manage Insurance Name</h2>
                            </div>
                            <div class="align-self-center">
                            <button type="button" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target = "#ajax-insurance-model"><i
                                        class='ri-add-line align-middle me-1' id="addNewInsurance"></i>Add Insurance Name</a>
                                <!-- <div class="btn btn-sm btn-primary" data-bs-toggle="modal">
                                        <button type="button" class='ri-add-line align-middle me-1'id="addNewInsurance"></i>Add Insurance Name</div> -->

                            </div>
                        </div>
                        <!-- Add Users Modal -->
                        <div class="modal fade" id="ajax-insurance-model" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ajaxInsuranceModel">Add Insurance Name</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="javascript:void(0)" id="addEditUserForm" name="addEditUserForm" method = "POST">
                                        <div class="modal-body">
                                            <div class="row">
                                            <input type="hidden" name="id" id="id">

                                                <div class="col-md-6 mb-2">
                                                    <label>Insurance Name</label>
                                                    <input type="text" class="form-control form-control-sm" id = "insurance_name" name= "insurance_name" required>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label>Status</label>
                                                    <select class="form-select form-select-sm" id = "status" name= "status">
                                                        <option value="">Select</option>
                                                        <option>Active</option>
                                                        <option>In-Active</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" id="btn-save" value="addNewInsurance">Save<i
                                                    class="bx bx-loader bx-spin align-middle ms-2 font-size-16"></i></button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive patient_table">
                            <table class="table table-sm table-bordered c_table">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th class="w200">Insurance Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($insurances as $insurance)

                                    <tr>
                                    <td>{{ $insurance->id }}</td>
                                    <td>{{ $insurance->insurance_name }}</td>
                                    <td>{{ $insurance->status }}</td>
                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><a href="javascript:void(0)" data-id="{{ $insurance->id }}"
                                                        data-bs-toggle="modal" class = "edit" title="Edit"><i
                                                            class='bx bx-edit'></i></a></li>
                                                <li class="list-inline-item"><a href=""javascript:void(0)" data-id="{{ $insurance->id }}" title="Detele"
                                                    class="delete"><i
                                                            class='bx bx-trash text-danger'></i></a></li>
                                            </ul>
                                            @endforeach
                                            <!-- modal -->
                                            <div class="modal fade" id="editDenial" data-bs-backdrop="static"
                                                data-bs-keyboard="false">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Insurance Name</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="#">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-2">
                                                                        <label>Insurance Name</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            required>
                                                                    </div>
                                                                    <div class="col-md-6 mb-2">
                                                                        <label>Status</label>
                                                                        <select class="form-select form-select-sm">
                                                                            <option value="">Select</option>
                                                                            <option>Active</option>
                                                                            <option>In-Active</option>
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
                    </div>
                </div>
                <!-- pagination -->
                {!! $insurances->links() !!}
                <!-- <ul class="pagination">
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
                </ul> -->
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
    $('#addNewInsurance').click(function () {
       $('#addEditInsuranceForm').trigger("reset");
       $('#ajaxInsuranceModel').html("Add Pending Reason");
       $('#ajax-insurance-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        console.log('id');
    //    $('#editUSer').modal('show');
        // $('#editUSer').show();
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{route('insurance.edit')}}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
            //   $('#ajaxUserModel').html("Edit User");
              $('#ajax-insurance-model').modal('show');
              $('#id').val(res.id);
              $('#insurance_name').val(res.insurance_name);
              $('#status').val(res.status);
            
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{route('insurance.delete')}}",
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
          var insurance_name = $("#insurance_name").val();
          var status = $("#status").val();
          console.log(status);
          console.log('id');
          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{route('insurance.store')}}",
            data: {
              id:id,
              insurance_name:insurance_name,
              status:status,
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