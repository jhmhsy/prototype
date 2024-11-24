<h1>Overdue Subscription - Checked-In <strong>"{{ \Carbon\Carbon::now()->toFormattedDateString() }}"</strong></h1>
<p>A member with an overdue subscription has been checked in. Please review the details below:</p>


@if ($overdueServices->isNotEmpty())
    <h2>Subscription Inf.</h2>
    <ul>
        <li><strong>Member Name:</strong> {{ $member->name }}</li>
        <li><strong>Service Type:</strong> {{ $overdueServices->first()->service_type }}</li>
        <li><strong>Start Date:</strong> {{ $overdueServices->first()->start_date }}</li>
        <li><strong>Due Date:</strong> {{ $overdueServices->first()->due_date }}</li>
    </ul>
@endif


@if ($overdueLockers->isNotEmpty())
    <h2>Locker # Inf.</h2>
    <ul>
        <li><strong>Member Name:</strong> {{ $member->name }}</li>
        <li><strong>Locker No:</strong> {{ $overdueLockers->first()->locker_no }}</li>
        <li><strong>Start Date:</strong> {{ $overdueLockers->first()->start_date }}</li>
        <li><strong>Due Date:</strong> {{ $overdueLockers->first()->due_date }}</li>
        <li><strong>Amount:</strong> {{ $overdueLockers->first()->amount }}</li>
    </ul>
@endif



@if ($overdueTreadmills->isNotEmpty())
    <h2>Treadmill Inf.</h2>
    <ul>
        <li><strong>Member Name:</strong> {{ $member->name }}</li>
        <li><strong>Treadmill No:</strong> {{ $overdueTreadmills->first()->treadmill_no }}</li>
        <li><strong>Start Date:</strong> {{ $overdueTreadmills->first()->start_date }}</li>
        <li><strong>Due Date:</strong> {{ $overdueTreadmills->first()->due_date }}</li>
        <li><strong>Amount:</strong> {{ $overdueTreadmills->first()->amount }}</li>
    </ul>
@endif

<p>Click the link below to be directed to this member's record.</p>
<a href="{{ $confirmationUrl }}">Redirect Now</a>