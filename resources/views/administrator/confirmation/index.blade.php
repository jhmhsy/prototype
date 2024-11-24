<x-dash-layout>
    <div class="min-h-screen flex justify-center bg-background text-foreground px-4">
        <div class="w-full p-6 bg-card rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-6 text-left">Confirmation Page</h1>
            <div class="">
                <div class="container">
                    <h2>Pending Services for Approval</h2>

                    @if($pendingServices->isEmpty() && $pendingLockers->isEmpty() && $pendingTreadmills->isEmpty())


                    <p>No pending services to approve.</p>
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>Service Type</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendingServices as $service)
                            <tr>

                                <td>{{ $service->service_type }}</td>
                                <td>{{ $service->start_date }}</td>
                                <td>{{ $service->due_date }}</td>
                                <td>{{ $service->amount }}</td>
                                <td>
                                    <form action="{{ route('services.approve', $service->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                            Approve
                                        </button>
                                    </form>

                                    <form action="{{ route('services.disapprove', $service->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                            Disapprove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @foreach($pendingLockers as $locker)
                            <tr>
                                <td>Locker No#{{ $locker->locker_no }}</td>
                                <!-- Use 'locker_no' from the Locker model -->
                                <td>{{ $locker->month }}</td>
                                <!-- Assuming you want to show 'month', you can adjust this field -->
                                <td>{{ $locker->start_date }}</td>
                                <td>{{ $locker->due_date }}</td>
                                <td>{{ $locker->amount }}</td>
                                <td>
                                    <!-- Approve Locker -->
                                    <form action="{{ route('locker.approve', $locker->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                            Approve
                                        </button>
                                    </form>

                                    <!-- Disapprove Locker -->
                                    <form action="{{ route('locker.disapprove', $locker->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            Disapprove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @foreach($pendingTreadmills as $treadmill)
                            <tr>
                                <td>Treadmill</td>
                                <td>{{ $treadmill->user_id }}</td> <!-- Use 'user_id' from the Treadmill model -->
                                <td>{{ $treadmill->month }}</td> <!-- Assuming you want to show 'month' -->
                                <td>{{ $treadmill->start_date }}</td>
                                <td>{{ $treadmill->due_date }}</td>
                                <td>{{ $treadmill->amount }}</td>
                                <td>
                                    <!-- Approve Treadmill -->
                                    <form action="{{ route('treadmill.approve', $treadmill->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                            Approve
                                        </button>
                                    </form>

                                    <!-- Disapprove Treadmill -->
                                    <form action="{{ route('treadmill.disapprove', $treadmill->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            Disapprove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-dash-layout>