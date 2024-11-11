@extends('layouts.side') @section('content')
<div>
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Events</h1>
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
                                <div class="form-group col-md-2 py-2">
                                    <br />
                                    <button type="submit" id="reload" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        <table id="example1" class="table table-bordered table-striped">
                            @if($from && $to)<caption style="caption-side:top"><b>Details from the period of {{ dmYConverter($from)}} to {{ dmYConverter($to)}}</b></caption>@endif
                            <thead>
                                <tr>
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Event Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Event Date</th>
                                    <th scope="col">Maximum No.of Attendees</th>
                                    @if(Auth::user()->role == 1)
                                        <th scope="col">Registerd Users Count</th>
                                    @endif
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($events as $event)
                                <tr class="odd">
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$event->event_name}}</td>
                                    <td>{{$event->description}}</td>
                                    <td>{{dmYConverter($event->e_date)}}</td>
                                    <td>{{$event->no_of_attendees}}</td>
                                    <?php
                                        $user_count = 0;
                                        $user_count = App\Models\Registration::where('event_id',$event->e_id)->count();
                                        $registration_status = App\Models\Registration::where('event_id',$event->e_id)->where('r_user_id',Auth::user()->id)->first();
                                    ?>
                                    @if(Auth::user()->role == 1){{-- admin --}}
                                        <td>{{$user_count}}</td>
                                    @endif
                                    <td>
                                        @if(Auth::user()->role == 1){{-- admin --}}
                                            <a href="{{route('events.edit',$event->e_id)}}" class="btn"><i class="fa fa-pencil" onclick="return confirm('Do you want to update details ?')"></i></a>
                                            <a href="{{route('registrations.event_requests',$event->e_id)}}" class="btn btn-success">Requests</a>
                                        @endif
                                        @if(Auth::user()->role == 2){{-- user --}}
                                            @if($registration_status == NULL)
                                                @if($user_count < $event->no_of_attendees)
                                                    <a href="{{route('registrations.create',$event->e_id)}}" class="btn btn-primary" onclick="return confirm('Do you want to Apply This Event ?')">Register</a>
                                                @else
                                                    <p style="color: red">Event Has Reached its maximum number of attendees</p>
                                                @endif
                                            @else
                                                <p>Registerd</p>
                                            @endif
                                        @endif
                                    </td>
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
