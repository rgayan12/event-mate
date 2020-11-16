
<a href="{{ route('manage.events.edit', $event->id) }}">Edit</a>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Slot</button>


<h1>{{ $event->name }}</h1>
<h2>{!! $event->description !!}</h2>
<h3> Booking Link - {{ $event->booking_link}} <h3>
image {{ $event->thumbnail_image}}




@forelse($event->slots as $slot)
  <h2>Date & Time: {{ $slot->date }}  {{ $slot->time }}</h2>

@empty
     No Event Slots were Adeed
@endforelse




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Slot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    <form action="{{route('manage.events.store')}}" method="post"> 
    @csrf
      <div class="modal-body">

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" aria-describedby="dateField">
        </div>

        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" class="form-control" id="time" name="time" aria-describedby="timeField">
        </div>

      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>