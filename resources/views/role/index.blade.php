@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Role') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('role.store') }}">
                        @csrf

                        <div class="modal-body">
                                                        <div class="row">
                                                        <div class="col-md-5 mb-3">
                                <label for="starting_date">Name:</label>
                                <input class="form-control" name="name" type="text"
                                       >
                            </div>
                                                            
                                                           
                        

                        

                                                            <div class="mb-3 text-left">
                                <button type="submit"
                                        class="btn btn-info bg-ubs border-0 rounded-pill btn-lg mt-2 px-5 py-2">
                                    Submit
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
