@extends('main')
@section('index')

<section class="main-section">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-3">
                    <div class="align-self-center">
                        <h2 class="common-title mb-0">Manage Medical Records</h2>
                    </div>
                    <div class="align-self-center">
                    
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target = "#ajax-medical-model"><i
                                class='ri-add-line align-middle me-1' id = "addNewMedical"></i>Add Medical Record</a>
                    </div>
                </div>
                <!-- Add Records Modal -->
                <div class="modal fade" id="ajax-medical-model" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id = "ajaxMedicalModel">Add Medical Records</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="javascript:void(0)" id="addEditMedicalForm" name="addEditMedicalForm" method="POST"
                            enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label>Select File</label>
                                            <input type="file" class="form-control form-control-sm" id="medicaldoc" name="medicaldoc" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>File Type</label>
                                            <select class="form-select form-select-sm" id="file_type" name="file_type" required>
                                                <option value="">Select</option>
                                                <option>Demo</option>
                                                <option>EBO</option>
                                                <option>EOB</option>
                                                <option>ERA</option>
                                                <option>Super Bill</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Insurance</label>
                                            <select class="form-select form-select-sm" id="insurance_id" name="insurance_id" required>
                                            @foreach ($insurances as $insurance)
                                <option value="{{$insurance->id}}">{{ $insurance->insurance_name }}</option>
                                      @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Provider</label>
                                            <select class="form-select form-select-sm" id="provider_id" name="provider_id">
                                            @foreach ($providers as $prov)
                                       <option value="{{$prov->id}}">{{ $prov->first_name }}</option>
                                         @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Location</label>
                                            <select class="form-select form-select-sm" id="location" name="location">
                                                <option value="">Select</option>
                                                <option>test</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Denial Date
                                            </label>
                                            <input type="date" class="form-control form-control-sm" id="denial_date" name="denial_date" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>DOS
                                            </label>
                                            <input type="date" class="form-control form-control-sm" id="dos" name="dos" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Encounter #
                                            </label>
                                            <input type="text" class="form-control form-control-sm" id="encounter" name="encounter" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Patient
                                            </label>
                                            <input type="text" class="form-control form-control-sm" id="patient" name="patient" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Reason</label>
                                            <select class="form-select form-select-sm" id="medical_reason" name="medical_reason">
                                                <option value="">Select</option>
                                                <option>Need Authorization</option>
                                                <option>Need Chart notes</option>
                                                <option>Need Medical records</option>
                                                <option>Need office visit notes</option>
                                                <option>Need Operative report</option>
                                                <option>Need Pathology report</option>
                                                <option>Need Pre-Existing condition records</option>
                                                <option>Need Referral</option>
                                                <option>Need Surgeons notes</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Status</label>
                                            <select class="form-select form-select-sm" id="medical_status" name="medical_status">
                                                <option value="">Select</option>
                                                <option>Open</option>
                                                <option>Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-save" value="addNewMedical">Save<i
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
                                <th>Location</th>
                                <th>Insurance</th>
                                <th class="w150">Patient</th>
                                <th class="w100">DOS</th>
                                <th class="w50">Encounter ID</th>
                                <th>Denial Reason</th>
                                <th>Response</th>
                                <th>Response Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <tr class="bg-white">
                                <th></th>
                                <th></th>
                                <th><input type="search" class="form-control form-control-sm"
                                        placeholder="Search Patient.."></th>
                                <th><input type="search" class="form-control form-control-sm"
                                        placeholder="Search DOS.."></th>
                                <th><input type="search" class="form-control form-control-sm" placeholder="Search..">
                                </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($medicals as $medical)
                            <tr>
                                <td>{{ $medical->location}}</td>
                                <td>{{ $medical->insurance->insurance_name }}</td>
                                <td>{{ $medical->patient}}</td>
                                <td>{{ $medical->dos}}</td>
                                <td>{{ $medical->encounter}}</td>
                                <td>{{ $medical->medical_reason}}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $medical->medical_status}}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="medical-record-detail.html" title="Reply"><i
                                                    class="ri-reply-line"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" data-id="{{ $medical->id }}" data-bs-toggle="modal"
                                                title="Edit" class="edit" ><i class='bx bx-edit'></i></a></li>
                                        <li class="list-inline-item"><a href="#" title="Pdf"><i
                                                    class='bx bxs-file-pdf'></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" title="Detele" id="medical.delete"
                                        data-original-title="Delete" class="delete" data-id="{{ $medical->id }}"><i
                                                    class='bx bx-trash text-danger'></i></a></li>
                                    </ul>
                                    
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- pagination -->
                {!! $medicals->links() !!}
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
$(document).ready( function () {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#medicaldoc').change(function(){
           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
  
   });
   
    $('#addNewMedical').click(function () {
       $('#addEditMedicalForm').trigger("reset");
       $('#ajaxMedicalModel').html("Add Medical");
       $('#ajax-medical-model').modal('show');
       $("#medicaldoc").attr("required", "true");
       $('#id').val('');
       $('#preview-image').attr('src', 'https://www.riobeauty.co.uk/images/product_image_not_found.gif');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('medical.edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxMedicalModel').html("Edit Medical");
              $('#ajax-medical-model').modal('show');
              $('#id').val(res.id);
              $('#location').val(res.location);
              $('#dos').val(res.dos);
              $('#patient').val(res.patient);
              $('#provider_id').val(res.provider_id);
              $('#insurance_id').val(res.insurance_id);
              $('#medical_status').val(res.medical_status);
              $('#file_type').val(res.file_type);
              $('#denial_date').val(res.denial_date);
              $('#encounter').val(res.encounter);
              $('#medical_reason').val(res.medical_reason);
              $('#medicaldoc').removeAttr('required');
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('medical.delete') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                window.location.reload();
           }
        });
       }
    });
   $('#addEditMedicalForm').submit(function(e) {
     e.preventDefault();
  
     var formData = new FormData(this);
  
     $.ajax({
        type:'POST',
        url: "{{ route('medical.store')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
             window.location.reload();
            //console.log(data);
       
          $("#btn-save").html('Submit');
          $("#btn-save"). attr("disabled", false);
         }
       });
   });
});
</script>
</script>
@endsection