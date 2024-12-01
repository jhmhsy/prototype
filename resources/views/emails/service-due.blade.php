<!DOCTYPE html>
<html>

<head>
    <title>Service Plan Due Reminder</title>
</head>

<body>
    <h1>Service Due Reminder</h1>

    <p>Dear {{ $member->name }},</p>

    <p>This is a reminder that you have an upcoming service due:</p>

    <ul>
        <li>Service Type: {{ $service->service_type }}</li>
        <li>Start Date: {{ $service->start_date }}</li>
        <li>Due Date: {{ $service->due_date }}</li>
        <li>Amount: {{ $service->amount }}</li>
    </ul>

    <p>Please take necessary action before the due date.</p>

    <p>Thank you for your attention to this matter.</p>
</body>

</html>