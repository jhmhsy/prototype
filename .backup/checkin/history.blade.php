<x-dash-layout>
    <div class="container">
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

        <table class="table">
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
                        <td>{{ \Carbon\Carbon::parse($checkin->checkin_date)->format('M j') }}</td>
                        <td>{{ \Carbon\Carbon::parse($checkin->checkin_time)->format('g:ia') }}</td>
                        <td>{{ $checkin->type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $checkins->appends(['search' => request('search'), 'sort' => $sort])->links() }}
    </div>
</x-dash-layout>