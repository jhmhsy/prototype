<body>
    <h1>A New Member Has Just Joined!</h1>
    <p>You’ve got a new member on board! Here’s a quick snapshot of their details:</p>

    <ul>
        <li><strong>Name:</strong> {{ $name }}</li>
        <li><strong>Membership Type:</strong> {{ $membership_type }}</li>
        <li><strong>Amount:</strong> {{ $amount ?? 'N/A' }}</li>
        <li><strong>Start Date:</strong> {{ $start_date }}</li>
        <li><strong>Due Date:</strong> {{ $due_date }}</li>
        <li><strong>Status:</strong> {{ $status ?? 'N/A' }}</li>
    </ul>

    <p>Feel free to check the member's full details here:</p>
    <a href="{{ $confirmationUrl }}">Redirect Now</a>
</body>