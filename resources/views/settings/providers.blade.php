@extends('main')
@section('index')

<section class="main-section">
            <div class="container-fluid">
                <!-- table -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="align-self-center">
                                <h2 class="common-title mb-0">Manage Providers</h2>
                            </div>
                            <div class="align-self-center">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target = "#ajax-provider-model"><i
                                        class='ri-add-line align-middle me-1' id="addNewProvider"></i>Add Providers</a>
                                <!-- <div class="btn btn-sm btn-primary" data-bs-toggle="modal">
                                <button type="button" class='ri-add-line align-middle me-1'id="addNewProvider"></i>Add Providers</div> -->

                            </div>
                        </div>
                        <!-- Add Users Modal -->
                        <div class="modal fade" id="ajax-provider-model" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ajaxProviderModel">Add Providers</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="javascript:void(0)" id="addEditUserForm" name="addEditUserForm" method = "POST">
                                        <div class="modal-body">
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
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" id="btn-save" value="addNewProvider">Save<i
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
                                        <th>Id</th>
                                        <th class="w200">First Name</th>
                                        <th class="w200">Last Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($providers as $provider)
                                    <tr>
                                    <td>{{ $provider->id }}</td>
                                    <td>{{ $provider->first_name }}</td>
                                   <td>{{ $provider->last_name }}</td>
                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><a href="javascript:void(0)" data-id="{{ $provider->id }}"
                                                        data-bs-toggle="modal" title="Edit" class="edit"><i
                                                            class='bx bx-edit'></i></a></li>
                                                <li class="list-inline-item"><a href="javascript:void(0)" data-id="{{ $provider->id }}" title="Detele" class="delete"><i
                                                            class='bx bx-trash text-danger'></i></a></li>
                                            </ul>
                                            @endforeach
                                            <!-- modal -->
                                            <div class="modal fade" id="editProvider" data-bs-backdrop="static"
                                                data-bs-keyboard="false">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Providers</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="#">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-2">
                                                                        <label>First Name</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
                                                                            required>
                                                                    </div>
                                                                    <div class="col-md-6 mb-2">
                                                                        <label>Last Name</label>
                                                                        <input type="text"
                                                                            class="form-control form-control-sm"
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
                    </div>
                </div>
                <!-- pagination -->
                <!-- <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li> -->
                    {!! $providers->links() !!}
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
    $('#addNewProvider').click(function () {
       $('#addEditProviderForm').trigger("reset");
       $('#ajaxProviderModel').html("Add Pending Reason");
       $('#ajax-provider-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        console.log('id');
    //    $('#editUSer').modal('show');
        // $('#editUSer').show();
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{route('provider.edit')}}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
            //   $('#ajaxUserModel').html("Edit User");
              $('#ajax-provider-model').modal('show');
              $('#id').val(res.id);
              $('#first_name').val(res.first_name);
              $('#last_name').val(res.last_name);
            
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{route('provider.delete')}}",
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
          console.log(last_name);
          console.log('id');
          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{route('provider.store')}}",
            data: {
              id:id,
              first_name:first_name,
              last_name:last_name,
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