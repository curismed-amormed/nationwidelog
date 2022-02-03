@extends('main')
@section('index')

<section class="main-section">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-3">
                    <div class="align-self-center">
                        <h2 class="common-title mb-0">Manage Patients Account</h2>
                    </div>
                    <div class="align-self-center">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target = "#ajax-patient-model"><i
                                        class='ri-add-line align-middle me-1' id="addNewpatient"></i>Add Patient</a>
                       
                    </div>
                </div>
                <!-- Add Patient Modal -->
                <div class="modal fade" id="ajax-patient-model" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajaxPatientModel">Add Patient</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="javascript:void(0)" id="addEditPatientForm" name="addEditPatientForm" method="POST">
                                <div class="modal-body">
                                    <div class="row">
                                    <input type="hidden" name="id" id="id">
                                        <div class="col-md-6 mb-2">
                                            <label>Account No</label>
                                            <input type="text" class="form-control form-control-sm" id = "account_no" name= "account_no" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>First Name</label>
                                            <input type="text" class="form-control form-control-sm" id = "first_name" name= "first_name" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control form-control-sm" id = "last_name" name= "last_name" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>DOB</label>
                                            <input type="date" class="form-control form-control-sm" id = "dob" name= "dob" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-save" value="addNewPatient">Save<i
                                            class="bx bx-loader bx-spin align-middle ms-2 font-size-16"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- table -->
                <div class="table-responsive patient_table">
                    <table id='patTable' class="table table-sm table-bordered c_table">
                        <thead>
                            <tr>
                                <th class="w150">Account No</th>
                                <th class="w150">First Name</th>
                                <th class="w150">Last Name</th>
                                <th class="w50">DOB</th>
                                <th>Created Date</th>
                                <th>Updated Date</th>
                                <th>Action</th>
                            </tr>
                            <tr class="bg-white">
                                <th><input type="text" name="accountNo" id="accountNo" onkeyup="getValac()" class="form-control form-control-sm"
                                        placeholder="Search A/C No.."></th>
                                       
                                <th><input type="text" name="firstName" id="firstName" onkeyup="getVal()" class="form-control form-control-sm"
                                        placeholder="Search First Name.."></th>
                                <th><input type="text" name="lastName" id="lastName" onkeyup="getVal1()" class="form-control form-control-sm"
                                        placeholder="Search Last Name.."></th>
                                <th><input type="date" class="form-control form-control-sm" name="dobDate" id="dobDate"
                                onkeyup="getValdb()"></th>
                                                 

                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($patients as $patient)
                            <tr>
                                <td><a href="{{ route('detail.index', $patient->account_no) }}">{{ $patient->account_no }}</a></td>
                                <td>{{ $patient->first_name }}</td>
                                <td>{{ $patient->last_name }}</td>
                                <td>{{ $patient->dob }}</td>
                                <td>{{ $patient->created_at }}</td>
                                <td>{{ $patient->updated_at }}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="javascript:void(0)" data-id="{{ $patient->id }}" data-bs-toggle="modal"
                                        class="edit"><i
                                        class='bx bx-edit'></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" data-id="{{ $patient->id }}" class="delete"><i
                                                    class='bx bx-trash text-danger'></i></a></li>
                                    </ul>
                                    @endforeach
                                    
                                </td>
                            </tr>
                            
                           
                            
                            
                        </tbody>
                    </table>
                </div>
                <!-- pagination -->
                {!! $patients->links() !!}
               
            </div>
        </section>

        @endsection

@section('js')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <script type="text/javascript">
       
    

    function getVal() {
        const val = document.getElementById('firstName').value;
        var _token = $("input[name=_token]").val();

        $.ajax({
            url:"{{ route('getFirstName') }}",
            method:"GET",
            data:{firstName:val, _token:_token},
            dataType:"json",
            success:function(data){
                data = data.data;
                var output = '';
                if(data.length > 0)
                {
                for(var count = 0; count < data.length; count++)
                {
                output += '<tr>';
                output += '<td>'+data[count].account_no+'</td>';
                output += '<td>'+data[count].first_name+'</td>';
                output += '<td>'+data[count].last_name+'</td>';
                output += '<td>'+data[count].dob+'</td>';
                output += '<td>'+data[count].created_at+'</td>';
                output += '<td>'+data[count].updated_at+'</td>';


                output += '</tr>';
                }
                }
                else
                {
                output += '<tr>';
                output += '<td colspan="6">No Data Found</td>';
                output += '</tr>';
                }
                $('tbody').html(output);
            },
        });
    }

    function getVal1() {
        const val = document.getElementById('lastName').value;
        var _token = $("input[name=_token]").val();

        $.ajax({
            url:"{{ route('getLastName') }}",
            method:"GET",
            data:{lastName:val, _token:_token},
            dataType:"json",
            success:function(data){
                data = data.data;
                var output = '';
                if(data.length > 0)
                {
                for(var count = 0; count < data.length; count++)
                {
                output += '<tr>';
                output += '<td>'+data[count].account_no+'</td>';
                output += '<td>'+data[count].first_name+'</td>';
                output += '<td>'+data[count].last_name+'</td>';
                output += '<td>'+data[count].dob+'</td>';
                output += '<td>'+data[count].created_at+'</td>';
                output += '<td>'+data[count].updated_at+'</td>';


                output += '</tr>';
                }
                }
                else
                {
                output += '<tr>';
                output += '<td colspan="6">No Data Found</td>';
                output += '</tr>';
                }
                $('tbody').html(output);
            },
        });
    }
       
    function getValac() {
        const val = document.getElementById('accountNo').value;
        var _token = $("input[name=_token]").val();

        $.ajax({
            url:"{{ route('getAccount') }}",
            method:"GET",
            data:{accountNo:val, _token:_token},
            dataType:"json",
            success:function(data){
                data = data.data;
                var output = '';
                if(data.length > 0)
                {
                for(var count = 0; count < data.length; count++)
                {
                output += '<tr>';
                output += '<td>'+data[count].account_no+'</td>';
                output += '<td>'+data[count].first_name+'</td>';
                output += '<td>'+data[count].last_name+'</td>';
                output += '<td>'+data[count].dob+'</td>';
                output += '<td>'+data[count].created_at+'</td>';
                output += '<td>'+data[count].updated_at+'</td>';


                output += '</tr>';
                }
                }
                else
                {
                output += '<tr>';
                output += '<td colspan="6">No Data Found</td>';
                output += '</tr>';
                }
                $('tbody').html(output);
            },
        });
    }

    function getValdb() {
        const val = document.getElementById('dobDate').value;
        var _token = $("input[name=_token]").val();

        $.ajax({
            url:"{{ route('getDob') }}",
            method:"GET",
            data:{dobDate:val, _token:_token},
            dataType:"json",
            success:function(data){
                data = data.data;
                var output = '';
                if(data.length > 0)
                {
                for(var count = 0; count < data.length; count++)
                {
                output += '<tr>';
                output += '<td>'+data[count].account_no+'</td>';
                output += '<td>'+data[count].first_name+'</td>';
                output += '<td>'+data[count].last_name+'</td>';
                output += '<td>'+data[count].dob+'</td>';
                output += '<td>'+data[count].created_at+'</td>';
                output += '<td>'+data[count].updated_at+'</td>';


                output += '</tr>';
                }
                }
                else
                {
                output += '<tr>';
                output += '<td colspan="6">No Data Found</td>';
                output += '</tr>';
                }
                $('tbody').html(output);
            },
        });
    }

 $(document).ready(function($){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#addNewInsurance').click(function () {
       $('#addEditPatientForm').trigger("reset");
       $('#ajaxPatientModel').html("Add Pending Reason");
       $('#ajax-patient-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        console.log('id');
    //    $('#editUSer').modal('show');
        // $('#editUSer').show();
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{route('patient.edit')}}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
            //   $('#ajaxUserModel').html("Edit User");
              $('#ajax-patient-model').modal('show');
              $('#id').val(res.id);
              $('#first_name').val(res.first_name);
              $('#last_name').val(res.last_name);
              $('#account_no').val(res.account_no);
              $('#dob').val(res.dob);
           }
        });
    });
    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{route('patient.delete')}}",
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
          var account_no = $("#account_no").val();
          var dob = $("#dob").val();
          console.log(status);
          console.log('id');
          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{route('patient.store')}}",
            data: {
              id:id,
              first_name:first_name,
              last_name:last_name,
              account_no:account_no,
              dob:dob,
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