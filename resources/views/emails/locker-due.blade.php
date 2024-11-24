<!DOCTYPE html>
<html>

<head>
    <title>Locker Rental Due Reminder</title>
</head>

<body>
    <h1>Locker Rental Due Reminder</h1>

    <p>Dear {{ $member->name }},</p>

    <p>This is a reminder that your locker rental is due soon:</p>

    <ul>
        <li>Locker Number: {{ $locker->locker_no }}</li>
        <li>Start Date: {{ $locker->start_date }}</li>
        <li>Due Date: {{ $locker->due_date }}</li>
        <li>Amount: {{ $locker->amount }}</li>
        <li>Duration: {{ $locker->month }} month(s)</li>
    </ul>

    <p>Please process the renewal before the due date to avoid any inconvenience.</p>

    <p>Thank you for choosing our services.</p>
</body>

</html>