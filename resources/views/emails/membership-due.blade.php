<!DOCTYPE html>
<html>

<head>
    <title>Membership Expiration Reminder</title>
</head>

<body>
    <h1>Annual Membership Expiration Reminder</h1>

    <p>Dear {{ $member->name }},</p>

    <p>This is a reminder that your Annual Membership is due to expire soon:</p>

    <ul>
        <li>Membership Type: {{ $member->membership_type }}</li>
        <li>Start Date: {{ $membership->start_date->format('Y-m-d') }}</li>
        <li>Expiration Date: {{ $membership->due_date->format('Y-m-d') }}</li>
    </ul>

    <p>Please renew your membership before the expiration date to maintain continuous access to our facilities and
        services.</p>

    <p>If you have any questions about renewal or our membership options, please don't hesitate to contact us.</p>

    <p>Thank you for being a valued member of our facility.</p>
</body>

</html>