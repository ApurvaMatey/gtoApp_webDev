<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>{{@$header}}</title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">
        <style>
            div.gallery {
                margin: 5px;
                border: 1px solid #ccc;
                float: left;
                width: 180px;
            }

            div.gallery:hover {
                border: 1px solid #777;
            }

            div.gallery img {
                width: 100%;
                height: auto;
            }

            div.desc {
                padding: 15px;
                text-align: center;
            }
        </style>
    </head>

    <body width="100%" bgcolor="#fff">
        <div style="width: 100%; background: #fff;">

            <table role="presentation" cellspacing="0" cellpadding="0" align="center" width="auto" style="margin: auto; background:#fff; border:2px solid #f64e03;  font-size: 14px; font-family:arial;width:580px;" class="email-container">
                <!-- Email Header : BEGIN -->
                <tr>
                    <td style="padding: 10px 0; border:2px solid #fff;  background:#f64e03; text-align: center">
                        <img src="{!!$logo!!}" aria-hidden="true" width="200" height="50" alt="alt_text" border="0" style="height: auto; background:#f64e03; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">

                    </td>
                </tr>
                <!-- Email Header : END -->
                <!-- Email Body : BEGIN -->
                <tr>
                    <td style="padding: 20px 50px; text-align: left;color:#222;">
                        Hi {{ $data["name"] }}, <br>
                        <br/>We've received a request to reset your password for your GTO Alert account.
                        <br/>Please click on below button to set a new password:<br>
                        <br/>

                        <!-- <a href=" {!! $url !!} " style="background: #f64e03;color: #fff;padding: 7px 12px;text-align: center;text-decoration: none;">Click Here</a>    -->
                        <a href="index.php" style="background: #f64e03;color: #fff;padding: 7px 12px;text-align: center;text-decoration: none;">Click Here</a>   

                    </td>
                </tr>
                <tr>
                    <td style="padding: 20px 50px; text-align: left;color:#222;"><p>
                            Regards,<br>
                            GTO Team<br>
                        </p>
                    </td>
                </tr>
                <!-- Email Body : END -->
                <!-- Email Footer : BEGIN -->
                <tr>
                    <td style="padding: 5px 10px;width: 100%; border:2px solid #fff; font-size: 12px; font-family: sans-serif; line-height:18px; border-top:1px solid #f64e03;  text-align: right; color: #fff; background:#f64e03"> GTO App &copy; 2021
                    </td>
                </tr>
                <!-- Email Footer : END -->
            </table>

        </div>



    </body>
</html>
