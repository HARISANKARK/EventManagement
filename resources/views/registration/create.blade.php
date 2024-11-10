@extends('layouts.side') @section('content')

<div>
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Registration</h3>
            </div>
            <form action="{{route('registrations.store')}}" method="post" id="formId">
                @csrf
                <div class="card-body">
                    <div class="row mb-4 text-center">
                        <div class="col-md-12">
                            <h3 class="font-weight-bold text-info">{{ $event->event_name }}</h3>
                            <p class="text-muted"><i class="fas fa-info-circle"></i> {{ $event->description }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <h5><i class="fas fa-calendar-alt text-primary"></i> Event Date</h5>
                            <p class="font-weight-bold">{{ dmYConverter($event->e_date) }}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <h5><i class="fas fa-users text-primary"></i> Maximum Attendees</h5>
                            <p class="font-weight-bold">{{ $event->no_of_attendees }}</p>
                        </div>
                    </div>
                    <div class="row">
                        {{-- Hidden Fields --}}
                        <input hidden type="text" class="form-control" name="event_id" placeholder="Event Id" value="{{$e_id}}" required />
                        <input hidden type="date" class="form-control" name="date" placeholder="Event Id" value="{{date('Y-m-d')}}" required />

                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required />
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required />
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="number"  class="form-control" name="phone_no" pattern="[0-9]{10}" minlength="10" maxlength="10" placeholder="Enter 10-digit phone number" required />
                            @error('phone_no')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
