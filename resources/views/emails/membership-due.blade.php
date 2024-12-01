<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Membership Expiration Reminder</title>
    <!--[if mso]>
    <style type="text/css">
        body, table, td, a { font-family: Arial, Helvetica, sans-serif !important; }
    </style>
    <![endif]-->
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%"
        style="background-color: #f4f4f6;">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%"
                    style="max-width: 600px; background-color: #ffffff; border-radius: 12px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);">
                    <tr>
                        <td style="padding: 40px; text-align: center;">
                            <h1 style="color: #2c3e50; margin-bottom: 30px; font-size: 24px;">Annual Membership
                                Expiration Reminder
                            </h1>

                            <p style="margin-bottom: 15px;">Dear {{ $member->name }},</p>

                            <p style="margin-bottom: 15px;">This is a reminder that your Annual Membership is due to
                                expire soon:
                            </p>

                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="background-color: #f8f9fa; border-radius: 8px; margin-bottom: 20px;">
                                <tr>
                                    <td style="padding: 10px 20px; border-bottom: 1px solid #e9ecef;">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                            width="100%">
                                            <tr>
                                                <td
                                                    style="color: #495057;  text-align: left; font-weight: 600; width: 50%;">
                                                    Membership Type
                                                </td>
                                                <td style="color: #212529; text-align: right;">
                                                    {{ $member->membership_type }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 20px; border-bottom: 1px solid #e9ecef;">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                            width="100%">
                                            <tr>
                                                <td
                                                    style="color: #495057;  text-align: left; font-weight: 600; width: 50%;">
                                                    Start Date
                                                </td>
                                                <td style="color: #212529; text-align: right;">
                                                    {{ $membership->start_date->format('Y-m-d') }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 20px; border-bottom: 1px solid #e9ecef;">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                            width="100%">
                                            <tr>
                                                <td
                                                    style="color: #495057;  text-align: left; font-weight: 600; width: 50%;">
                                                    Due Date</td>
                                                <td style="color: #212529; text-align: right;">
                                                    {{ $membership->due_date->format('Y-m-d') }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 20px; border-bottom: 1px solid #e9ecef;">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                            width="100%">
                                            <tr>
                                                <td
                                                    style="color: #495057;  text-align: left; font-weight: 600; width: 50%;">
                                                    Amount</td>
                                                <td style="color: #212529; text-align: right;">
                                                    {{ $member->amount }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 10px 20px; border-bottom: 1px solid #e9ecef;">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0"
                                            width="100%">
                                            <tr>
                                                <td
                                                    style="color: #495057;  text-align: left; font-weight: 600; width: 50%;">
                                                    Status</td>
                                                <td style="color: #212529; text-align: right;">
                                                    {{ $membership->status }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin-bottom: 15px;">Please renew your membership before the expiration date to
                                maintain continuous access to our facilities and
                                services.</p>

                            <p style="color: #6c757d; text-align: center; font-size: 14px;">If you have any questions
                                about renewal or our membership options, please don't hesitate to contact us.
                            </p>

                            <p style="color: #6c757d; text-align: center; font-size: 14px;">Thank you for being a valued
                                member of our facility.
                            </p>
                        </td>
                    </tr>
                </table>

                <!-- Responsive CSS for mobile devices -->
                <style type="text/css">
                    @media only screen and (max-width: 600px) {
                        table[class="container"] {
                            width: 100% !important;
                            padding: 0 20px !important;
                        }

                        td[class="details"] {
                            padding: 10px !important;
                        }

                        h1 {
                            font-size: 20px !important;
                        }
                    }
                </style>
            </td>
        </tr>
    </table>
</body>

</html>