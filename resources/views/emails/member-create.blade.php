<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>New Member Signup</title>
    <style type="text/css">
    body,
    table,
    td,
    a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    table,
    td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
    }

    img {
        -ms-interpolation-mode: bicubic;
    }

    img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
    }

    table {
        border-collapse: collapse !important;
    }

    body {
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
    }

    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }
    </style>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"
        style="max-width: 600px; margin: 0 auto; background-color: #f4f4f4;">
        <tr>
            <td style="padding: 20px; background-color: #ffd700; text-align: center; color: #1a1a1a;">
                <h1 style="margin: 0; font-size: 24px; color: #1a1a1a;">A New Member Has Just Joined!</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; background-color: white;">
                <p style="margin: 0 0 15px 0; font-size: 16px; color: #1a1a1a;">You've got a new member on board! Here's
                    a quick snapshot of their details:</p>

                <table width="100%" style="margin-bottom: 20px; border-collapse: separate; border-spacing: 0;">
                    <tr>
                        <td
                            style="padding: 10px; background-color: #fff8e1; border-bottom: 1px solid #ffd700; color: #1a1a1a;">
                            <strong>Name:</strong> {{ $name }}
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="padding: 10px; background-color: #ffffff; border-bottom: 1px solid #ffd700; color: #1a1a1a;">
                            <strong>Annual Membership Type:</strong> {{ $membership_type }}
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="padding: 10px; background-color: #fff8e1; border-bottom: 1px solid #ffd700; color: #1a1a1a;">
                            <strong>Amount:</strong> {{ $amount ?? 'N/A' }}
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="padding: 10px; background-color: #ffffff; border-bottom: 1px solid #ffd700; color: #1a1a1a;">
                            <strong>Start Date:</strong> {{ \Carbon\Carbon::parse($start_date)->format('M d, Y') }}


                        </td>
                    </tr>
                    <tr>
                        <td
                            style="padding: 10px; background-color: #fff8e1; border-bottom: 1px solid #ffd700; color: #1a1a1a;">
                            <strong>Due Date:</strong> {{ \Carbon\Carbon::parse($due_date)->format('M d, Y') }}

                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; background-color: #ffffff; color: #1a1a1a;">
                            <strong>Status:</strong> {{ $status ?? 'N/A' }}
                        </td>
                    </tr>
                </table>

                <p style="margin: 0 0 15px 0; font-size: 16px; color: #1a1a1a;">Feel free to check the member's full
                    details here:</p>

                <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="text-align: center;">
                            <a href="{{ $confirmationUrl }}"
                                style="display: inline-block; padding: 12px 24px; background-color: #ffd700; color: #1a1a1a; text-decoration: none; border-radius: 5px; font-weight: bold; border: 2px solid #1a1a1a;">
                                View Full Details
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 15px; background-color: #1a1a1a; text-align: center; font-size: 12px; color: #ffd700;">
                © {{ date('Y') }} Your Organization. All rights reserved.
            </td>
        </tr>
    </table>
</body>

</html>