<x-dash-layout>
    <div class="container">
        <h1>Member Check-in</h1>

        <form action="{{ route('checkin.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by ID Number"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>

            <input type="file" id="qrInput" accept="image/*" class="hidden">
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                                <tr>
                                    <td>{{ $member->id_number }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>
                                        @php
                                            // Check if the member has already checked in today
                                            $alreadyCheckedIn = \App\Models\CheckinRecord::where('user_id', $member->id)
                                                ->whereDate('checkin_date', \Carbon\Carbon::now()->toDateString())
                                                ->exists();
                                        @endphp
                                        @if ($alreadyCheckedIn)
                                            <span class="text-danger">User has checked in.</span>
                                        @else
                                            <form action="{{ route('checkin.store', $member) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success" {{ $alreadyCheckedIn ? 'disabled' : '' }}>
                                                    Check-in
                                                </button>
                                            </form>
                                        @endif



                                    </td>
                                </tr>
                @endforeach

            </tbody>
        </table>

        {{ $members->links() }}
    </div>
</x-dash-layout>