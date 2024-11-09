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
