<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group"> <label for="event_name">Event Name</label> <input type="text" name="event_name"
                class="form-control{{ $errors->has('event_name') ? ' is-invalid' : '' }}" placeholder="Event Name"
                value="{{ old('event_name', $employeeDevelopment->event_name) }}"> {!! $errors->first('event_name', '<div class="invalid-feedback">:message</div>') !!} </div>
        <div class="form-group"> <label for="speaker">Speaker</label> <input type="text" name="speaker"
                class="form-control{{ $errors->has('speaker') ? ' is-invalid' : '' }}" placeholder="Speaker"
                value="{{ old('speaker', $employeeDevelopment->speaker) }}"> {!! $errors->first('speaker', '<div class="invalid-feedback">:message</div>') !!} </div>
        <div class="form-group"> <label for="event_organizer">Event Organizer</label> <input type="text"
                name="event_organizer" class="form-control{{ $errors->has('event_organizer') ? ' is-invalid' : '' }}"
                placeholder="Event Organizer"
                value="{{ old('event_organizer', $employeeDevelopment->event_organizer) }}"> {!! $errors->first('event_organizer', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group"> <label for="place">Place</label> <input type="text" name="place"
                class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}" placeholder="Place"
                value="{{ old('place', $employeeDevelopment->place) }}"> {!! $errors->first('place', '<div class="invalid-feedback">:message</div>') !!} </div>
        <div class="form-group"> <label for="price">Price</label> <input type="text" name="price"
                class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="Price"
                value="{{ old('price', $employeeDevelopment->price) }}"> {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!} </div>
        <div class="form-group"> <label for="event_type">Event Type</label> <input type="text" name="event_type"
                class="form-control{{ $errors->has('event_type') ? ' is-invalid' : '' }}" placeholder="Event Type"
                value="{{ old('event_type', $employeeDevelopment->event_type) }}"> {!! $errors->first('event_type', '<div class="invalid-feedback">:message</div>') !!} </div>
        <div class="form-group"> <label for="start_date">Start Date</label> <input type="text" name="start_date"
                class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" placeholder="Start Date"
                value="{{ old('start_date', $employeeDevelopment->start_date) }}"> {!! $errors->first('start_date', '<div class="invalid-feedback">:message</div>') !!} </div>
        <div class="form-group"> <label for="end_date">End Date</label> <input type="text" name="end_date"
                class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" placeholder="End Date"
                value="{{ old('end_date', $employeeDevelopment->end_date) }}"> {!! $errors->first('end_date', '<div class="invalid-feedback">:message</div>') !!} </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
