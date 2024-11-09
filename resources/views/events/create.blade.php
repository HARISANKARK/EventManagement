@extends('layouts.side') @section('content')

<div>
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Event</h3>
            </div>
            <form action="{{route('events.store')}}" method="post" id="formId">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Event Name</label>
                            <input type="text" class="form-control" name="event_name" placeholder="Event Name" required />
                            @error('event_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Description" required />
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Event Date</label>
                            <input type="date" class="form-control" name="event_date" min="{{date('Y-m-d')}}" required />
                            @error('event_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Maximum No.of Attendees</label>
                            <input type="number" class="form-control" name="no_of_attendees" placeholder="No Of Attendees" required />
                            @error('no_of_attendees')
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
