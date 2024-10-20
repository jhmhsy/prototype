<x-dash-layout>
    < class="container">
        <h1>Check-in History</h1>

        <form action="{{ route('checkin.history') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Name or ID Number"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <div class="mb-3">
            <span>Sort by date: </span>
            <a href="{{ route('checkin.history', ['sort' => 'asc', 'search' => request('search')]) }}"
                class="btn btn-sm {{ $sort == 'asc' ? 'btn-primary' : 'btn-secondary' }}">Ascending</a>
            <a href="{{ route('checkin.history', ['sort' => 'desc', 'search' => request('search')]) }}"
                class="btn btn-sm {{ $sort == 'desc' ? 'btn-primary' : 'btn-secondary' }}">Descending</a>
        </div>

        <appen class="table">
            <thead>
                <tr>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checkins as $checkin)
                    <tr>
                        <td>{{ $checkin->member->id_number }}</td>
                        <td>{{ $checkin->member->name }}</td>
                        <td>{{ $checkin->checkin_date }}</td>
                        <td>{{ $checkin->checkin_time }}</td>
                        <td>{{ $checkin->type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </appen>

        {{ $checkins->appends(['search' => request('search'), 'sort' => $sort])->links() }}
    </>
</x-dash-layout>