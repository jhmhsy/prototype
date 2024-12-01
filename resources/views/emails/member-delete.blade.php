<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Member Deletion - Pending </title>
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
                            <h1 style="color: #2c3e50; margin-bottom: 30px; font-size: 24px;">Member Deletion -
                                Pending Approval
                            </h1>
                            <p style="margin-bottom: 15px;">A Member has been marked for <strong>Deletion</strong> and
                                is awaiting admin approval.
                            </p>

                            <p style="margin-bottom: 15px;">Below is the details of the Member:
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
                                                    Member Name
                                                </td>
                                                <td style="color: #212529; text-align: right;">
                                                    {{ $member->name }}
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
                                                    Annual Membership Type
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
                                                    {{ $member->membershipDuration->start_date ?? 'N/A' }}
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
                                                    {{ $member->membershipDuration->due_date ?? 'N/A' }}
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
                                                    {{ $member->amount ?? 'N/A' }}
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
                                                    {{ $member->membershipDuration->status ?? 'N/A' }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="margin-bottom: 20px;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ $confirmationUrl }}"
                                            style="display: block; width: 100%; padding: 12px 20px; background-color: #3498db; color: #ffffff; text-align: center; text-decoration: none; border-radius: 6px; font-weight: 600;">
                                            Redirect Now
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin-bottom: 15px;">Click the link above for the approval:</p>
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