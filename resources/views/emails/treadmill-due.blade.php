<!DOCTYPE html>
<html>

<head>
    <title>Treadmill Subscription Due Reminder</title>
</head>

<body>
    <h1>Treadmill Subscription Due Reminder</h1>

    <p>Dear {{ $member->name }},</p>

    <p>This is a reminder that your treadmill subscription is due soon:</p>

    <ul>
        <li>Start Date: {{ $treadmill->start_date }}</li>
        <li>Due Date: {{ $treadmill->due_date }}</li>
        <li>Amount: {{ $treadmill->amount }}</li>
        <li>Duration: {{ $treadmill->month }} month(s)</li>
    </ul>

    <p>Please process the renewal before the due date to avoid any interruption in your treadmill access.</p>

    <p>Thank you for choosing our services.</p>
</body>

</html>