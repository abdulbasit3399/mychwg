
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    </head>


    <body>

        <div style="margin-top: 50px;">
            <table cellpadding="0" cellspacing="0" style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
                <thead>
                    <tr style="background-color: #fff; padding: 3px 0; border: none; line-height: 68px; text-align: center; color: #fff; font-size: 24px; letter-spacing: 1px;">
                        <th scope="col" style="border-bottom: 1px solid #ddd;">
                            <img src="{{ asset($setting['logo']) ?? ''}}" style="width: 180px;padding-top: 20px;">
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td style="padding: 48px 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;">
                            <h1>Hello</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 15px 24px 15px; color: #8492a6;">
                            Your virtual appointment with <strong>{{$data['homeopath'] ?? 'Homeopath' }}</strong> is ready to begin.<br>
                            Please click the link to join:<br>

                            <a href="{{$data['message']??''}}">Canadian Homeopathy Wellness Group</a>

                            <br>

                        </td>
                    </tr>

                    


                    <tr>
                        <td style="padding: 15px 24px 15px; color: #8492a6;">
                           <p>Team</p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
                            © {{ now()->year }} {{ env('APP_NAME') }}.
        </div>
        <!-- Hero End -->
    </body>
</html>
