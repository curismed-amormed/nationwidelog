@extends('main')
@section('index')

<section class="main-section">
            <div class="container-fluid">
                <h2 class="common-title">Manage Pending List</h2>
                <!-- table -->
                <div class="table-responsive">
                    <table class="table table-sm table-bordered c_table">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Location</th>
                                <th>DOS</th>
                                <th>Patient Name</th>
                                <th>Pending Reason</th>
                                <th>Response</th>
                                <th>File Name</th>
                                <th>Page</th>
                                <th>Document</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($pendinglist as $pat)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td></td>
                                <td>{{ $pat->dos }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $pat->workstatus->file_name }}</td>
                                <td>test</td>
                                <td>test</td>
                                <td>
                                    <i class='bx bxs-circle text-success' title="Active"></i>
                                </td>
                                <td>
                                    <a href="#"><i class='bx bx-trash text-danger'></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endsection