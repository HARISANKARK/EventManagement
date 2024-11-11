@extends('layouts.side')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 style="align: left;margin:3px;">Dashboard</h2>
        <div class="col-md-12">
            <div class="card-body">
                <section class="col-lg-12 connectedSortable">
                    @if(count($events) > 0)
                        <!--<div class="col-md-3">-->
                            <div class="card shadow">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Events</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sl No</th>
                                                    <th scope="col">Event Name</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Event Date</th>
                                                    <th scope="col">Maximum No.of Attendees</th>
                                                    @if(Auth::user()->role == 2){{-- user --}}
                                                    <th scope="col">#</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($i=1)
                                                @foreach($events as $event)
                                                <tr class="odd">
                                                    <th scope="row">{{$i++}}</th>
                                                    <td>{{$event->event_name}}</td>
                                                    <td>{{$event->description}}</td>
                                                    <td>{{$event->e_date}}</td>
                                                    <td>{{$event->no_of_attendees}}</td>
                                                    <?php
                                                        $user_count = 0;
                                                        $user_count = App\Models\Registration::where('event_id',$event->e_id)->count();
                                                        $registration_status = App\Models\Registration::where('event_id',$event->e_id)->where('r_user_id',Auth::user()->id)->first();
                                                    ?>
                                                    @if(Auth::user()->role == 2){{-- user --}}
                                                    <td>
                                                        @if($registration_status == NULL)
                                                            @if($user_count < $event->no_of_attendees)
                                                                <a href="{{route('registrations.create',$event->e_id)}}" class="btn btn-primary" onclick="return confirm('Do you want to Apply This Event ?')">Register</a>
                                                            @else
                                                                <p style="color: red">Event Has Reached its maximum number of attendees</p>
                                                            @endif
                                                        @else
                                                            <p>Registerd</p>
                                                        @endif
                                                    </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        <!--</div>-->
                    @endif
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
