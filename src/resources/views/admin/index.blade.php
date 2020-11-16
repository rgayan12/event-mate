  <h1>Showing all Events</h1>

   
    <div class="card">
        <div class="card-header">
            {{ trans('Announcement') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('Event') }}
                        </th>
                        <th>
                            {{ trans('Message') }}
                        </th>
                       <th>
                            {{ trans('Status') }}
                        </th>
                    
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($events as $event)
                        <tr data-entry-id="{{ $event->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $event->name ?? '' }}
                            </td>
                            <td>
                                {{ strip_tags($event->description ?? '') }}
                            </td>
                            <td>
                                   {{ $event->venue }}
                            </td>
                            <td>


                                <a class="btn btn-xs btn-info" href="{{ route('manage.events.edit', $event->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                                <form action="{{ route('manage.events.destroy', $event->id) }}" method="post" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>

                            </td>

                        </tr>
                    @empty
                    <h1>No Records at the moment</h1>           

                        @endforelse
                    </tbody>
                </table>
            </div>


        </div>
    </div>
