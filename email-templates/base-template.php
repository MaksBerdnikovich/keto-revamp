<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Email Keto diet template</title>
    <style>
        @media only screen and (max-width: 620px) {
            table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important;
            }

            table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
                font-size: 16px !important;
            }

            table[class=body] .wrapper,
            table[class=body] .article {
                padding: 10px !important;
            }

            table[class=body] .content {
                padding: 0 !important;
            }

            table[class=body] .container {
                padding: 0 !important;
                width: 100% !important;
            }

            table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }

            table[class=body] .btn table {
                width: 100% !important;
            }

            table[class=body] .btn a {
                width: 100% !important;
            }

            table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important;
            }
        }
        @media all {
            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
                font-size: inherit;
                font-family: inherit;
                font-weight: inherit;
                line-height: inherit;
            }

            .btn-primary table td:hover {
                background-color: #34495e !important;
                border-bottom-color: #454545 !important;
            }

            .btn-primary a:hover {  }

            table[class=body] {
                background-repeat: no-repeat;
                background-size: cover;
                background-image: url(<?php echo get_stylesheet_directory_uri() . '/img/email-back.jpg' ?>);
            }
        }
    </style>
</head>
<body class="" style="background-color: #fff; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 16px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%" bgcolor="#f6f6f6">
    <tr>
        <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;" valign="top">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 16px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;" width="580" valign="top">
            <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">

                <!-- START CENTERED WHITE CONTAINER -->
                <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-radius: 3px; width: 100%;" width="100%">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class="wrapper" style="font-family: sans-serif; font-size: 16px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                                <tr>
                                    <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;" valign="top">
                                        <div class="logo" style="text-align: center; margin-bottom: 40px;">
                                            <img src="<?php echo get_stylesheet_directory_uri() .'/dist/images/logo/logo.png'?>" alt="logo" style="border: none; -ms-interpolation-mode: bicubic; max-width: 250px;">
                                        </div>
                                        <p class="title" style="font-family: sans-serif; margin: 0; text-align: center; font-weight: 700; font-size: 28px; margin-bottom: 25px; color: #141414;"><?php echo $args['title'] ?></p>
                                        <?php get_template_part('email-templates/template', $args['template'], $args['data']) ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                </table>
                <!-- END CENTERED WHITE CONTAINER -->

                <div class="pre-footer" style="padding: 0 20px 20px 20px;">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #239ef5; color: #fff; text-align: center; padding: 15px 15px 0 15px; border-radius: 9px;" width="100%" bgcolor="#239ef5" align="center">
                        <tr>
                            <td class="content-block" style="font-family: sans-serif; font-size: 16px; vertical-align: top; padding-bottom: 10px; padding-top: 10px;" valign="top">
                                <p class="title" style="font-family: sans-serif; margin: 0; margin-bottom: 15px; font-weight: 700; font-size: 18px;">Questions?</p>
                                <p style="font-family: sans-serif; font-size: 15px; font-weight: normal; margin: 0; margin-bottom: 15px;">Simply <a href="#" style="color:#fff; text-decoration: underline;">reply</a> to this email to connect with our support team!</p>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- START FOOTER -->
                <div class="footer" style="clear: both; margin-top: 10px; text-align: center; width: 100%;">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                        <tr>
                            <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #303030; font-size: 12px; text-align: center;" valign="top" align="center">
                                <span class="apple-link" style="color: #303030; font-size: 12px; text-align: center;">You are receiving this email because you left a product in your </span>
                                <br> cart on <a href="#" style="text-decoration: underline; color: #24394f; font-size: 12px; text-align: center;"><?php echo home_url() ?></a> <br><br> <a href="#" style="text-decoration: underline; color: #24394f; font-size: 12px; text-align: center;">Unsubscribe</a>.
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- END FOOTER -->

            </div>
        </td>
        <td style="font-family: sans-serif; font-size: 16px; vertical-align: top;" valign="top">&nbsp;</td>
    </tr>
</table>
</body>
</html>