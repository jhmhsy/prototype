<h1>Services Plan Cancelation - Pending</h1>
<p>A service has been marked for <strong>cancellation</strong> and is awaiting admin approval.</p>

<p>Below is the details of Canceled Service:</p>

<ul>
    <li><strong>Member Name:</strong> {{ $service->member->name }}</li>
    <li><strong>Service Type:</strong> {{ $service->service_type }}</li>
    <li><strong>Start Date:</strong> {{ $service->start_date }}</li>
    <li><strong>Due Date:</strong> {{ $service->due_date }}</li>
    <li><strong>Amount:</strong> {{ $service->amount }}</li>
    <li><strong>Current Status:</strong> {{ $service->status }}</li>
</ul>

<p>Click the link below for the approval:</p>
<a href="{{ $confirmationUrl }}">Redirect Now</a>