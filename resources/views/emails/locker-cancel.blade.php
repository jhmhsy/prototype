<h1>Locker Cancelation - Pending</h1>
<p>A Locker has been marked for <strong>cancellation</strong> and is awaiting admin approval.</p>

<p>Below is the details of Canceled Service:</p>

<ul>
    <li><strong>Member Name:</strong> {{ $locker->member->name }}</li>
    <li><strong>Service Type:</strong> Locker No#{{ $locker->locker_no }}</li>
    <li><strong>Start Date:</strong> {{ $locker->start_date }}</li>
    <li><strong>Due Date:</strong> {{ $locker->due_date }}</li>
    <li><strong>Amount:</strong> {{ $locker->amount }}</li>
    <li><strong>Current Status:</strong> {{ $locker->status }}</li>
</ul>

<p>Click the link below for the approval:</p>
<a href="{{ $confirmationUrl }}">Redirect Now</a>