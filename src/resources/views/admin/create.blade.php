<div>
    <form name="frmEvent" action="{{route('manage.events.store')}}" method="post">
        @csrf
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">{{ trans('Name') }} *</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <div class="form-group {{ $errors->has('venue') ? 'has-error' : '' }}">
            <label for="venue">{{ trans('venue') }} *</label>
            <input type="text" id="venue" name="venue" class="form-control" value="{{ old('venue') }}" required>
            @if($errors->has('venue'))
                <div class="invalid-feedback">
                    {{ $errors->first('venue') }}
                </div>
            @endif
        </div>

        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description">{{ trans('description') }} </label>
            <input type="description" id="description" name="description" class="form-control" value="{{ old('description') }}">
            @if($errors->has('description'))
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
            @endif
        </div>

        <div class="form-group {{ $errors->has('booking_link') ? 'has-error' : '' }}">
            <label for="booking_link">{{ trans('Booking Link') }} *</label>
            <input type="text" id="booking_link" name="booking_link" class="form-control" value="{{ old('booking_link') }}">
            @if($errors->has('booking_link'))
                <div class="invalid-feedback">
                    {{ $errors->first('booking_link') }}
                </div>
            @endif
        </div>

        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info">
                <i class="fa fa-picture-o"></i> Select thumbnail
                </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" value="{{ isset($event) ? $event->image : '' }}" required name="image" style="pointer-events: none;">
            </div>

            
        <img id="holder" style="margin-top:15px;max-height:100px;">

        <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
                
    </form>
</div>