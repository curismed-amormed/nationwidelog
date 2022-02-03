@extends('main')
@section('index')

<section class="main-section">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-3">
                    <div class="align-self-center">
                        <h2 class="common-title mb-0">Manage Work Status</h2>
                    </div>
                    <div class="align-self-center">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target = "#ajax-workstatus-model"><i
                                class='ri-add-line align-middle me-1' id = "addNewWorkstatus"></i>Add Document</a>
                    </div>
                </div>
                <!-- modal -->
                <div class="modal fade" id="ajax-workstatus-model" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajaxWorkstatusModel">Add Document information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="javascript:void(0)" id="addEditWorkstatusForm" name="addEditWorkstatusForm" method="POST"
                            enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label>Location</label>
                                            <select class="form-select form-select-sm" id="location" name="location" required>
                                               
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label>File Name</label>
                                            <input type="text" class="form-control form-control-sm" id="file_name" name="file_name" required>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label>Total Pages</label>
                                            <input type="number" class="form-control form-control-sm" id="total_pages" name="total_pages" required>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label>PDF Pages</label>
                                            <input type="number" class="form-control form-control-sm" id="pdf_pages" name="pdf_pages" required>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label>Status</label>
                                            <select class="form-select form-select-sm" id="status" name="status" required>
                                                <option value="0">Select Status</option>
                                                <option>Open</option>
                                                <option>Closed</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label>Select File</label>
                                            <input type="file" class="form-control form-control-sm" id="work_file" name="work_file" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-save" value="addNewWorkstatus">Save<i
                                            class="bx bx-loader bx-spin align-middle ms-2 font-size-16"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- table -->
                <div class="table-responsive">
                    <table class="table table-sm table-bordered c_table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th class="w100">Category</th>
                                <th class="w100">File Name</th>
                                <th>Total Pages</th>
                                <th>Pdf Received</th>
                                <th>Pdf Entered</th>
                                <th>Pending</th>
                                <th class="w100">Status</th>
                                <th class="w50">Documents</th>
                                <th>Completed</th>
                                <th>Action</th>
                            </tr>
                            <tr class="bg-white">
                                <th></th>
                                <th>
                                    <select class="form-select form-select-sm">
                                        <option value="0">Select</option>
                                        <option>Billing</option>
                                        <option>Posting</option>
                                    </select>
                                </th>
                                <th>
                                    <input type="text" class="form-control form-control-sm" placeholder="Search File">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <select class="form-select form-select-sm">
                                        <option value="0">Select</option>
                                        <option>Not Started</option>
                                        <option>In Progress</option>
                                        <option>Completed</option>
                                    </select>
                                </th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($workstatus as $work)
                            <tr>
                                <td>{{ $work->created_at}}</td>
                                <td>Posting</td>
                                <td>
                                    <a href="#fileDetails" data-bs-toggle="modal">{{ $work->file_name}}</a>
                                    <!-- modal -->
                                    <div class="modal fade" id="fileDetails" data-bs-backdrop="static"
                                        data-bs-keyboard="false">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">View Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-sm table-bordered c_table">
                                                            <thead>
                                                                <tr>
                                                                    <th><input type="checkbox"></th>
                                                                    <th>Facility</th>
                                                                    <th>Provider</th>
                                                                    <th>DOS</th>
                                                                    <th>Patient</th>
                                                                    <th>File Name</th>
                                                                    <th>Pdf Received</th>
                                                                    <th>Reason</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="checkbox"></td>
                                                                    <td>test test</td>
                                                                    <td>test test</td>
                                                                    <td>2018-08-03 00:00:00</td>
                                                                    <td>test</td>
                                                                    <td>eis-02102021</td>
                                                                    <td>1</td>
                                                                    <td>1</td>
                                                                    <td>Closed</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save<i
                                                            class="bx bx-loader bx-spin align-middle ms-2 font-size-16"></i></button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $work->total_pages}}</td>
                                <td>{{ $work->pdf_pages}}</td>
                                <td>20</td>
                                <td>20</td>
                                <td>Not Started</td>
                                <td>Yes</td>
                                <td>N/A</td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="javascript:void(0)"  data-id="{{ $work->id }}"
                                        data-original-title="Edit" class="edit" title="Edit"><i class='bx bx-edit'></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" id="workstatus.delete"
                                        data-original-title="Delete" class="delete" data-id="{{ $work->id }} title="Deactivate"><i
                                                    class='bx bx-trash text-danger'></i></a></li>
                                    </ul>
                                    @endforeach
                                    <!-- modal -->
                                    
                                </td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        @endsection

        @section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   <script type="text/javascript">
$(document).ready( function () {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#work_file').change(function(){
           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
  
   });
   
    $('#addNewWorkstatus').click(function () {
       $('#addEditWorkstatusForm').trigger("reset");
       $('#ajaxWorkstatusModel').html("Add Book");
       $('#ajax-workstatus-model').modal('show');
       $("#work_file").attr("required", "true");
       $('#id').val('');
       $('#preview-image').attr('src', 'https://www.riobeauty.co.uk/images/product_image_not_found.gif');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('workstatus.edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxWorkstatusModel').html("Edit Workstatus");
              $('#ajax-workstatus-model').modal('show');
              $('#id').val(res.id);
              $('#location').val(res.location);
              $('#file_name').val(res.file_name);
              $('#total_pages').val(res.total_pages);
              $('#pdf_pages').val(res.pdf_pages);
              $('#status').val(res.status);
              $('#work_file').removeAttr('required');
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('workstatus.delete') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                window.location.reload();
           }
        });
       }
    });
   $('#addEditWorkstatusForm').submit(function(e) {
     e.preventDefault();
  
     var formData = new FormData(this);
  
     $.ajax({
        type:'POST',
        url: "{{ route('workstatus.store')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            window.location.reload();
       
          $("#btn-save").html('Submit');
          $("#btn-save"). attr("disabled", false);
         }
       });
   });
});
</script>
</script>
@endsection