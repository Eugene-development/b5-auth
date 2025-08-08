<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добро пожаловать в BONUS5</title>
    <style type="text/css">
        /* Mobile Responsive Styles */
        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
                max-width: 100% !important;
            }
            .content-card {
                margin: 10px !important;
                border-radius: 12px !important;
            }
            .header-padding {
                padding: 30px 20px !important;
            }
            .content-padding {
                padding: 30px 20px !important;
            }
            .title-text {
                font-size: 36px !important;
                letter-spacing: 4px !important;
            }
            .welcome-text {
                font-size: 24px !important;
                letter-spacing: 1px !important;
            }
            .button-padding {
                padding: 14px 24px !important;
                font-size: 14px !important;
            }
            .feature-icon {
                width: 20px !important;
                height: 20px !important;
            }
            .feature-text {
                font-size: 14px !important;
            }
        }

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            .email-body {
                background-color: #0f172a !important;
            }
        }

        /* Print styles */
        @media print {
            .email-container {
                background: white !important;
                color: black !important;
            }
        }
    </style>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
</head>
<body style="margin: 0; padding: 0; background-color: #111827; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; line-height: 1.6; color: #f3f4f6;">
    <!-- Email Container -->
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="min-height: 100vh; background-color: #111827;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                <!-- Main Content Card -->
                <table width="600" cellpadding="0" cellspacing="0" border="0" class="content-card" style="max-width: 600px; width: 100%; background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(79, 70, 229, 0.1) 100%); border-radius: 16px; overflow: hidden; border: 1px solid rgba(255, 255, 255, 0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="padding: 0;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td class="header-padding" style="background: linear-gradient(135deg, #10b981 0%, #4f46e5 100%); padding: 40px 30px; text-align: center;">
                                        <!-- Logo/Brand -->
                                        <h1 class="title-text" style="margin: 0; font-size: 48px; font-weight: 600; letter-spacing: 8px; color: #ffffff; text-transform: uppercase; text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);">
                                            BONUS 5
                                        </h1>
                                        <div style="margin-top: 8px; height: 3px; width: 80px; background: rgba(255, 255, 255, 0.3); margin-left: auto; margin-right: auto; border-radius: 2px;"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Main Content -->
                    <tr>
                        <td class="content-padding" style="padding: 50px 40px;">
                            <!-- Welcome Message -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="text-align: center; padding-bottom: 30px;">
                                        <h2 class="welcome-text" style="margin: 0; font-size: 28px; font-weight: 600; color: #ffffff; letter-spacing: 2px;">
                                            🎉 Поздравляем!
                                        </h2>
                                        {{-- <p style="margin: 16px 0 0 0; font-size: 18px; color: #10b981; line-height: 1.7; font-weight: 600;">
                                            {{ $user->name ?? 'Дорогой клиент' }}
                                        </p> --}}
                                        <p style="margin: 16px 0 0 0; font-size: 18px; color: #10b981; line-height: 1.7; font-weight: 600;">
                                            Ваш аккаунт успешно активирован
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Welcome Content -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="background: rgba(255, 255, 255, 0.05); border-radius: 12px; padding: 30px; border: 1px solid rgba(255, 255, 255, 0.1);">
                                        {{-- <p style="margin: 0 0 24px 0; font-size: 16px; color: #f3f4f6; line-height: 1.7; text-align: center;">
                                             <strong style="color: #10b981;">{{ $user->name ?? 'дорогой клиент' }}, добро пожаловать</strong>!
                                        </p> --}}
                                        {{-- <p style="margin: 0 0 24px 0; font-size: 16px; color: #f3f4f6; line-height: 1.7; text-align: center;">
                                            Инструкция!
                                        </p>

                                        <p style="margin: 0 0 32px 0; font-size: 16px; color: #f3f4f6; line-height: 1.7; text-align: center;">
                                            Теперь у вас есть полный доступ ко всем возможностям нашей платформы.
                                        </p> --}}



                                        <!-- Quick Start Tips -->
                                        <p style="margin: 32px 0 16px 0; font-size: 18px; color: #ffffff; font-weight: 600; text-align: center;">
                                            🚀 Что делать дальше:
                                        </p>

                                        <!-- Tips List -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 20px 0;">
                                            <tr>
                                                <td style="padding: 12px 0;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td width="30" valign="top" style="padding-right: 12px;">
                                                                <span style="color: #10b981; font-size: 18px; font-weight: bold;">1.</span>
                                                            </td>
                                                            <td>
                                                                <p style="margin: 0; font-size: 15px; color: #d1d5db; line-height: 1.6;">
                                                                    Перейдите по <strong style="color: #ffffff;">ссылке</strong> на форму нашего партнёра для отправки данных
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 12px 0;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td width="30" valign="top" style="padding-right: 12px;">
                                                                <span style="color: #10b981; font-size: 18px; font-weight: bold;">2.</span>
                                                            </td>
                                                            <td>
                                                                <p style="margin: 0; font-size: 15px; color: #d1d5db; line-height: 1.6;">
                                                                    Заполните <strong style="color: #ffffff;">форму </strong> и вставьте ваш секретный ключ (он есть в вашем кабинете)
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 12px 0;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td width="30" valign="top" style="padding-right: 12px;">
                                                                <span style="color: #10b981; font-size: 18px; font-weight: bold;">3.</span>
                                                            </td>
                                                            <td>
                                                                <p style="margin: 0; font-size: 15px; color: #d1d5db; line-height: 1.6;">
                                                                    Отслеживайте статус проекта в личном кабинете <strong style="color: #ffffff;">и получайте бонусы</strong> при успешной сделке
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- Dashboard Button -->
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 32px 0;">
                                            <tr>
                                                <td align="center">
                                                    <table cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td style="background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%); border-radius: 8px; box-shadow: 0 4px 14px 0 rgba(16, 185, 129, 0.4); transition: all 0.3s ease;">
                                                                <a href="https://bonus.band/"
                                                                   class="button-padding"
                                                                   style="display: inline-block; padding: 16px 32px; font-size: 16px; font-weight: 600; color: #ffffff; text-decoration: none; letter-spacing: 1px; text-transform: uppercase; border-radius: 8px;"
                                                                   target="_blank">
                                                                    Ссылка на форму
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Benefits Section -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top: 40px;">
                                <tr>
                                    <td>
                                        <h3 style="margin: 0 0 24px 0; font-size: 20px; font-weight: 600; color: #ffffff; text-align: center; letter-spacing: 1px;">
                                            🎁 Ваши преимущества в BONUS5:
                                        </h3>

                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding: 16px 0;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td width="40" valign="top" style="padding-right: 16px;">
                                                                <table cellpadding="0" cellspacing="0" border="0" style="width: 24px; height: 24px; background: #10b981; border-radius: 50%;">
                                                                    <tr>
                                                                        <td align="center" valign="middle" style="width: 24px; height: 24px; text-align: center; vertical-align: middle;">
                                                                            <span style="color: #ffffff; font-size: 14px; font-weight: bold; line-height: 1;">👥</span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>

                                                            <td>
                                                                <p style="margin: 0; font-size: 16px; color: #d1d5db; line-height: 1.6;">
                                                                    <strong style="color: #ffffff;">Полная конфиденциальность</strong> вашей личности
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 16px 0;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td width="40" valign="top" style="padding-right: 16px;">
                                                                <table cellpadding="0" cellspacing="0" border="0" style="width: 24px; height: 24px; background: #10b981; border-radius: 50%;">
                                                                    <tr>
                                                                        <td align="center" valign="middle" style="width: 24px; height: 24px; text-align: center; vertical-align: middle;">
                                                                            <span style="color: #ffffff; font-size: 14px; font-weight: bold; line-height: 1;">💰</span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <p style="margin: 0; font-size: 16px; color: #d1d5db; line-height: 1.6;">
                                                                    <strong style="color: #ffffff;">Реферальные бонусы</strong> за приведение друзей
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 16px 0;">
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td width="40" valign="top" style="padding-right: 16px;">
                                                                <table cellpadding="0" cellspacing="0" border="0" style="width: 24px; height: 24px; background: #10b981; border-radius: 50%;">
                                                                    <tr>
                                                                        <td align="center" valign="middle" style="width: 24px; height: 24px; text-align: center; vertical-align: middle;">
                                                                            <span style="color: #ffffff; font-size: 14px; font-weight: bold; line-height: 1;">🛡️</span>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td>
                                                                <p style="margin: 0; font-size: 16px; color: #d1d5db; line-height: 1.6;">
                                                                    <strong style="color: #ffffff;">100% безопасность</strong> и защита данных
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Support Information -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top: 40px;">
                                <tr>
                                    <td style="background: rgba(79, 70, 229, 0.1); border-radius: 12px; padding: 24px; border: 1px solid rgba(79, 70, 229, 0.2);">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="text-align: center;">
                                                    <h4 style="margin: 0 0 12px 0; font-size: 16px; color: #ffffff; font-weight: 600;">
                                                        💬 Нужна помощь?
                                                    </h4>
                                                    <p style="margin: 0 0 16px 0; font-size: 14px; color: #d1d5db; line-height: 1.6;">
                                                        Наша служба поддержки всегда готова помочь вам разобраться с любыми вопросами.
                                                    </p>

                                                    <a href="{{ $frontendUrl }}/profile"
                                                       style="color: #60a5fa; text-decoration: none; font-weight: 600; font-size: 14px;">
                                                        info@bonus5.ru
                                                    </a>
                                                    {{-- <a href="{{ $frontendUrl }}/profile"
                                                       style="color: #60a5fa; text-decoration: none; font-weight: 600; font-size: 14px;">
                                                        Связаться с поддержкой →
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background: rgba(255, 255, 255, 0.05); padding: 30px 40px; border-top: 1px solid rgba(255, 255, 255, 0.1);">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="text-align: center;">
                                        <p style="margin: 0 0 16px 0; font-size: 14px; color: #9ca3af; line-height: 1.6;">
                                            Спасибо, что выбрали BONUS5. Желаем вам успешного заработка!
                                        </p>
                                        <p style="margin: 0; font-size: 14px; color: #6b7280; line-height: 1.6;">
                                            С уважением,<br>
                                            <strong style="color: #ffffff; letter-spacing: 2px;">Команда BONUS5</strong>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <!-- Bottom Spacing -->
                <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top: 20px;">
                    <tr>
                        <td style="text-align: center; padding: 20px;">
                            <p style="margin: 0; font-size: 12px; color: #6b7280;">
                                © {{ date('Y') }} BONUS5. Все права защищены.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
