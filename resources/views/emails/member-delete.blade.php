<h1>Member Deletion - Pending</h1>
<p>A Member has been marked for <strong>Deletion</strong> and is awaiting admin approval.</p>

<p>Below is the details of the Member:</p>

<ul>
    <li><strong>Member Name:</strong> {{ $member->name }}</li>
    <li><strong>Type:</strong> {{ $member->membership_type }}</li>
    <li><strong>Start Date:</strong> {{ $member->membershipDuration->start_date ?? 'N/A' }}</li>
    <li><strong>Due Date:</strong> {{ $member->membershipDuration->due_date ?? 'N/A' }}</li>
    <li><strong>Amount:</strong> {{ $member->amount ?? 'N/A' }}</li>
    <li><strong>Current Status:</strong> {{ $member->membershipDuration->status ?? 'N/A' }}</li>
</ul>


<p>Click the link below for the approval:</p>
<a href="{{ $confirmationUrl }}">Approve Deletion</a>