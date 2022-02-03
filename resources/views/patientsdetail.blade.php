@extends('main')
@section('index')

<section class="main-section">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-3">
                    <div class="align-self-center">
                        <h2 class="common-title mb-0">{{ $patient->first_name }}</h2>
                    </div>
                    <div class="align-self-center">
                        <ul class="list-inline">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target = "#ajax-patientdetail-model"><i
                                        class='ri-add-line align-middle me-1' id="addNewPatientdetail"></i>Add Document</a>

                           
                            <li class="list-inline-item"><a href="{{ route('patient.index') }}" class="btn btn-sm btn-primary"><i
                                        class='ri-arrow-left-s-fill align-middle'></i>Back</a></li>
                        </ul>
                    </div>
                </div>
                <!-- modal -->
                <div class="modal fade" id="ajax-patientdetail-model" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajaxPatientdetailModel">Add Document information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="javascript:void(0)" id="addEditPatientdetailForm" name="addEditPatientdetailForm" method="POST">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label>File Name</label>
                                            <select class="form-select form-select-sm" id = "workstatus_id" name= "workstatus_id" required>
                                            @foreach ($workstatus as $work)
                                       <option value="{{$work->id}}">{{ $work->file_name }}</option>
                                         @endforeach
                                               
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Provider</label>
                                            <select class="form-select form-select-sm" id = "provider_id" name= "provider_id" required>
                                            @foreach ($providers as $provider)
                                       <option value="{{$provider->id}}">{{ $provider->first_name }}</option>
                                         @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>File Type</label>
                                            <select class="form-select form-select-sm" id = "file_type" name= "file_type" required>
                                                <option value="">Select File Type</option>
                                                <option>Authorization</option>
                                                <option>Correspondance</option>
                                                <option>Cosmetic</option>
                                                <option>Demo</option>
                                                <option>EOB</option>
                                                <option>Medical Record</option>
                                                <option>Patient Payment</option>
                                                <option>Referal</option>
                                                <option>Super Bill</option>
                                                <option>Transaction Sheet</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>DOS</label>
                                            <input type="date" class="form-control form-control-sm" id = "dos" name= "dos" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Reason</label>
                                            <select class="form-select form-select-sm" id = "select_reason" name= "select_reason">
                                                <option value="">Select Reason</option>
                                                <option>Need Auth</option>
                                                <option>Need copay value</option>
                                                <option>Need CPT</option>
                                                <option>Need CPT &amp; DX</option>
                                                <option>Need CPT and DX</option>
                                                <option>Need Demo &amp; Insurance</option>
                                                <option>Need Demo, DOS and DX</option>
                                                <option>Need DOS</option>
                                                <option>Need DX</option>
                                                <option>Need Insurance Card Copy</option>
                                                <option>Need Modifier</option>
                                                <option>Need Super Bill</option>
                                                <option>Need Taggable dx</option>
                                                <option>Need Units</option>
                                                <option>See comments</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Status</label>
                                            <select class="form-select form-select-sm" id = "select_status" name= "select_status" required>
                                                <option value="">Select Status</option>
                                                <option>Closed</option>
                                                <option>Open</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>No. of Pages</label>
                                            <input type="number" class="form-control form-control-sm" id = "no_of_pages" name= "no_of_pages">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Range</label>
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="1,2 or 3-8" id = "range" name= "range">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-save">Save<i
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
                                <th><input type="checkbox"></th>
                                <th>Location</th>
                                <th>Provider</th>
                                <th>DOS</th>
                                <th>Type</th>
                                <th>Patient Name</th>
                                <th>File Name</th>
                                <th class="w100">Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($patientsdetail as $pat)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>{{ $patient->account_no }}</td>
                                <td>{{ $pat->provider['first_name']}}</td>
                                <td>{{ $pat->dos}}</td>
                                <td>{{ $pat->file_type}}</td>
                                <td>{{ $patient->first_name }}</td>
                               
                                <td><a href="#">{{ $pat->workstatus['file_name']}}</a></td>
                                <td>
                                {{ $pat->select_status}}
                                    <!-- <select class="form-select form-select-sm">
                                        <option>Closed</option>
                                        <option>Open</option>
                                    </select> -->
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#editpDetails" data-bs-toggle="modal"
                                                title="Edit"><i class='bx bx-edit'></i></a></li>
                                        <li class="list-inline-item"><a href="#" title="Update"><i
                                                    class='bx bx-upload text-success'></i></a></li>
                                        <li class="list-inline-item"><a href="#" title="Delete"><i
                                                    class='bx bx-trash text-danger'></i></a></li>
                                    </ul>
                                    @endforeach
                                    <!-- modal -->
                                    <div class="modal fade" id="editpDetails" data-bs-backdrop="static"
                                        data-bs-keyboard="false">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Document information</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <label>File Name</label>
                                                                <select class="form-select form-select-sm" required>
                                                                    <option value="">Select File Name</option>
                                                                    <option>test</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Provider</label>
                                                                <select class="form-select form-select-sm" required>
                                                                    <option value="">Select Provider</option>
                                                                    <option>test</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>File Type</label>
                                                                <select class="form-select form-select-sm" required>
                                                                    <option value="">Select File Type</option>
                                                                    <option>Authorization</option>
                                                                    <option>Correspondance</option>
                                                                    <option>Cosmetic</option>
                                                                    <option>Demo</option>
                                                                    <option>EOB</option>
                                                                    <option>Medical Record</option>
                                                                    <option>Patient Payment</option>
                                                                    <option>Referal</option>
                                                                    <option>Super Bill</option>
                                                                    <option>Transaction Sheet</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>DOS</label>
                                                                <input type="date" class="form-control form-control-sm"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Reason</label>
                                                                <select class="form-select form-select-sm">
                                                                    <option value="">Select Reason</option>
                                                                    <option>Need Auth</option>
                                                                    <option>Need copay value</option>
                                                                    <option>Need CPT</option>
                                                                    <option>Need CPT &amp; DX</option>
                                                                    <option>Need CPT and DX</option>
                                                                    <option>Need Demo &amp; Insurance</option>
                                                                    <option>Need Demo, DOS and DX</option>
                                                                    <option>Need DOS</option>
                                                                    <option>Need DX</option>
                                                                    <option>Need Insurance Card Copy</option>
                                                                    <option>Need Modifier</option>
                                                                    <option>Need Super Bill</option>
                                                                    <option>Need Taggable dx</option>
                                                                    <option>Need Units</option>
                                                                    <option>See comments</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Status</label>
                                                                <select class="form-select form-select-sm" required>
                                                                    <option value="">Select Status</option>
                                                                    <option>Closed</option>
                                                                    <option>Open</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>No. of Pages</label>
                                                                <input type="number"
                                                                    class="form-control form-control-sm">
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Range</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    placeholder="1,2 or 3-8">
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
    $('#addNewPatientdetail').click(function () {
       $('#addEditPatientdetailForm').trigger("reset");
       $('#ajaxPatientdetailModel').html("Add Pending Reason");
       $('#ajax-patientdetail-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        console.log('id');
   
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{route('detail.edit')}}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
            //   $('#ajaxUserModel').html("Edit User");
              $('#ajax-patientdetail-model').modal('show');
              $('#id').val(res.id);
              $('#workstatus_id').val(res.workstatus_id);
              $('#file_type').val(res.file_type);
              $('#select_reason').val(res.select_reason);
              $('#no_of_pages').val(res.no_of_pages);
              $('#provider_id').val(res.provider_id);
              $('#dos').val(res.dos);
              $('#select_status').val(res.select_status);
              $('#range').val(res.range);
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{route('detail.delete')}}",
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
          var workstatus_id = $("#workstatus_id").val();
          var file_type = $("#file_type").val();
          var select_reason = $("#select_reason").val();
          var no_of_pages = $("#no_of_pages").val();
          var provider_id = $("#provider_id").val();
          var dos = $("#dos").val();
          var select_status = $("#select_status").val();
          var range = $("#range").val();
          console.log(status);
          console.log('id');
          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{route('detail.store')}}",
            data: {
              id:id,
              workstatus_id:workstatus_id,
              file_type:file_type,
              select_reason:select_reason,
              no_of_pages:no_of_pages,
              provider_id:provider_id,
              dos:dos,
              select_status:select_status,
              range:range,
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