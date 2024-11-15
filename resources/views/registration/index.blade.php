@extends('layouts.side') @section('content')
<div>
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Registrations</h1>
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
                        <form>
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="exampleInputEmail1">From</label>
                                    <input type="date" class="form-control" name="from" required />
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="exampleInputEmail1">To</label>
                                    <input type="date" class="form-control" name="to" required />
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="exampleInputEmail1">Event</label>
                                    <select  class="form-control select2bs4" name="event_id" id="event_id"  >
                                        <option value="" hidden></option>
                                        @foreach($events as $event)
                                        <option value="{{$event->e_id}}" >{{$event->event_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2 py-2">
                                    <br />
                                    <button type="submit" id="reload" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        <table id="example1" class="table table-bordered table-striped">
                            @if($from && $to)<caption style="caption-side:top"><b>Details from the period of {{ date('d-m-Y', strtotime($from))}} to {{ date('d-m-Y', strtotime($to))}}</b></caption>@endif
                            <thead>
                                <tr>
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Event Name</th>
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
                                    <td>{{$registration->event_name}}</td>
                                    <td>{{$registration->r_name}}</td>
                                    <td>{{$registration->r_email}}</td>
                                    <td>{{dmYConverter($registration->r_date)}}</td>
                                    <td>{{$registration->r_phone_no}}</td>
                                </tr>
                                @endforeach
                            </tbody>
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
