<div style="margin: 0; padding: 0; background-color: #e6f2ff; font-family: Arial, sans-serif;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;">
        <tr>
            <td align="center" style="padding: 20px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                    style="max-width: 600px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <!-- Header -->
                    <tr>
                        <td align="center"
                            style="padding: 40px 20px; background: linear-gradient(to right, #ffc0cb, #d8bfd8, #b0c4de); border-top-left-radius: 8px; border-top-right-radius: 8px;">
                            <h1 style="margin: 0; font-size: 24px; color: #000000;">Welcome to Gym One</h1>
                            <p style="margin-top: 10px; font-size: 16px; color: #000000;">We're thrilled to have you on
                                board.</p>
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td style="padding: 20px;">
                            <h2 style="font-size: 20px; color: #333333;">Hi {{ $user->name }},</h2>
                            <p style="font-size: 16px; line-height: 1.5; color: #666666;">We're excited to support you
                                on your fitness journey! At <b>Gym One</b>, we offer the best
                                environment and resources to help you achieve your goals.</p>
                            <h3 style="font-size: 22px; color: #c9c80a; margin-top: 20px;">What Awaits You:</h3>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="padding: 5px 0;">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td
                                                    style="background-color: #fafaf1; color: #ffffff; font-size: 14px; font-weight: bold; padding: 5px 10px; border-radius: 50%;">
                                                    🔥</td>
                                                <td style="padding-left: 10px; font-size: 16px; color: #333333;">Dynamic
                                                    workout experiences</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 0;">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td
                                                    style="background-color: #fafaf1; color: #ffffff; font-size: 14px; font-weight: bold; padding: 5px 10px; border-radius: 50%;">
                                                    💪</td>
                                                <td style="padding-left: 10px; font-size: 16px; color: #333333;">
                                                    Highest Quality of gym equipments!</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 0;">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td
                                                    style="background-color: #fafaf1; color: #ffffff; font-size: 14px; font-weight: bold; padding: 5px 10px; border-radius: 50%;">
                                                    🌟</td>
                                                <td style="padding-left: 10px; font-size: 16px; color: #333333;">
                                                    Engaging community events full of fun!</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <p style="font-size: 16px; line-height: 1.5; color: #666666; margin-top: 20px;">Get started
                                by logging into your account and exploring our resources!</p>
                        </td>
                    </tr>
                    <!-- CTA Button -->
                    <tr>
                        <td align="center" style="padding: 30px; background-color: #f0f0f0;">
                            <a href="https://gymonedanao.com"
                                style="background-color: #e1e019; color: #000000; text-decoration: none; padding: 12px 30px; border-radius: 5px; font-weight: bold; font-size: 16px; display: inline-block;">Join
                                the Fun!</a>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td align="center" style="padding: 20px; font-size: 14px; color: #999999;">
                            <div class="bg-gray-100 p-6 text-center text-sm text-gray-600">
                                <p>
                                    You're receiving this email because you recently created an account on
                                    <a href="https://gymonedanao.com"
                                        style="color: #000000; text-decoration: none; font-weight: bold;">
                                        gymonedanao.com
                                    </a>.
                                    If you didn't create an account, please ignore this email.
                                </p>
                                <p class="mb-2">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

</html>