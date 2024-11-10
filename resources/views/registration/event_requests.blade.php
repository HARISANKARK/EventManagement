@extends('layouts.side') @section('content')
<div>
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$event->event_name}} - Registrations</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            @if(count($registrations)>0)
                            <thead>
                                <tr>
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Registration Date</th>
                                    <th scope="col">Phone No</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1) @foreach($registrations as $registration)
                                <tr class="odd">
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$registration->r_name}}</td>
                                    <td>{{$registration->r_email}}</td>
                                    <td>{{$registration->r_date}}</td>
                                    <td>{{$registration->r_phone_no}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>
@endsection
