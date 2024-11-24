<h1>Treadmill Cancelation - Pending</h1>
<p>A treadmill has been marked for <strong>cancellation</strong> and is awaiting admin approval.</p>

<p>Below is the details of Canceled Service:</p>

<ul>
    <li><strong>Member Name:</strong> {{ $treadmill->member->name }}</li>
    <li><strong>Service Type:</strong> Treadmill</li>
    <li><strong>Start Date:</strong> {{ $treadmill->start_date }}</li>
    <li><strong>Due Date:</strong> {{ $treadmill->due_date }}</li>
    <li><strong>Amount:</strong> {{ $treadmill->amount }}</li>
    <li><strong>Current Status:</strong> {{ $treadmill->status }}</li>
</ul>

<p>Click the link below for the approval:</p>
<a href="{{ $confirmationUrl }}">Redirect Now</a>