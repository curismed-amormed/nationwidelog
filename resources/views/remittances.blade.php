@extends('main')
@section('index')

<section class="main-section">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-3">
                    <div class="align-self-center">
                        <h2 class="common-title mb-0">Manage E-Remittance</h2>
                    </div>
                    <div class="align-self-center">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target = "#ajax-remittance-model"><i
                                class='ri-add-line align-middle me-1' id = "addNewRemittance"></i>Add E-Remittance</a>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="ajax-remittance-model" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajaxRemittanceModel">Add E-Remittance</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="javascript:void(0)" id="addEditRemittanceForm" name="addEditRemittanceForm" method="POST"
                            enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                    
                                        <div class="col-md-6 mb-2">
                                        <input type="hidden" name="id" id="id">
                                            <label>Select File</label>
                                            <input type="file" class="form-control form-control-sm" id="doc" name="doc" required="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Provider</label>
                                            <select class="form-select form-select-sm"  id="provider_id" name="provider_id" required="">
                                            @foreach ($providers as $prov)
                                       <option value="{{$prov->id}}">{{ $prov->first_name }}</option>
                                         @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Insurance</label>
                                            <select class="form-select form-select-sm"  id="insurance_id" name="insurance_id" required="">
                                           
                                     @foreach ($insurances as $remit)
                                <option value="{{$remit->id}}">{{ $remit->insurance_name }}</option>
                                      @endforeach
                           
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Check Date</label>
                                            <input type="date" class="form-control form-control-sm"  id="check_date" name="check_date" required="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Check #</label>
                                            <input type="text" class="form-control form-control-sm"  id="check_no" name="check_no" required="">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Check $</label>
                                            <input type="text" class="form-control form-control-sm" id="check_amount" name="check_amount" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-save" value="addNewRemittance">Save<i
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
                                <th>Provider</th>
                                <th>Insurance</th>
                                <th>Check Date</th>
                                <th>Check No</th>
                                <th>File Name</th>
                                <th>Check Amount</th>
                                <th>Reconcil</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($remittances as $rem)
                            <tr>
                            <td>{{ $rem->provider->first_name}}</td>
                            <td>{{ $rem->insurance->insurance_name }}</td>
                            <td>{{ $rem->check_date }}</td>
                             <td>{{ $rem->check_no }}</td>
                             <td>{{ $rem->doc }}</td>
                             <td>{{ $rem->check_amount }}</td>
                            <td></td>
                           
                                <td>
                                    <ul class="list-inline">
                                    
                                        <li class="list-inline-item"><a href="javascript:void(0)"  data-id="{{ $rem->id }}"
                                        data-original-title="Edit" class="edit" 
                                        data-bs-toggle="modal"
                                                title="Edit"><i class='bx bx-edit'></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" title="Detele" id="remittance.delete"
                                        data-original-title="Delete" class="delete" data-id="{{ $rem->id }}" ><i
                                                    class='bx bx-trash text-danger'></i></a></li>
                                    </ul>
                                    @endforeach
                                    <!-- modal -->
                                    <div class="modal fade" id="editRemittance" data-bs-backdrop="static"
                                        data-bs-keyboard="false">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit E-Remittance</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-2">
                                                                <label>Select File</label>
                                                                <input type="file" class="form-control form-control-sm"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Provider</label>
                                                                <select class="form-select form-select-sm" required>
                                                                    <option value="">Select</option>
                                                                    <option>test</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Insurance</label>
                                                                <select class="form-select form-select-sm" required>
                                                                
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Check Date</label>
                                                                <input type="date" class="form-control form-control-sm"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Check #</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    required>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <label>Check $</label>
                                                                <input type="text" class="form-control form-control-sm"
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
    $('#doc').change(function(){
           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
  
   });
   
    $('#addNewRemittance').click(function () {
       $('#addEditRemittanceForm').trigger("reset");
       $('#ajaxRemittanceModel').html("Add Book");
       $('#ajax-remittance-model').modal('show');
       $("#doc").attr("required", "true");
       $('#id').val('');
       $('#preview-image').attr('src', 'https://www.riobeauty.co.uk/images/product_image_not_found.gif');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('remittance.edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxRemittanceModel').html("Edit Book");
              $('#ajax-remittance-model').modal('show');
              $('#id').val(res.id);
              $('#check_date').val(res.check_date);
              $('#check_amount').val(res.check_amount);
              $('#check_no').val(res.check_no);
              $('#provider_id').val(res.provider_id);
              $('#insurance_id').val(res.insurance_id);
              $('#doc').removeAttr('required');
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('remittance.delete') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                window.location.reload();
           }
        });
       }
    });
   $('#addEditRemittanceForm').submit(function(e) {
     e.preventDefault();
  
     var formData = new FormData(this);
  
     $.ajax({
        type:'POST',
        url: "{{ route('remittance.store')}}",
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