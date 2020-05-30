<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Twitch - {{ $subject }}</title>
    <link href="{{ asset('css/mails.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;562;600;700&family=Jost:ital,wght@0,200,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <body style="background-color: rgb(100, 65, 165);">
        <table class="body"
            style="background-color: rgb(100, 65, 165); font-family: 'Jost', sans-serif; font-weight: 400; padding-bottom: 30px">
            <tr>
                <td align="center" class="center" valign="top">
                    <center data-parsed="">
                        <table align="center" class="container float-center">
                            <tbody>
                                <tr>
                                    <td>
                                        <table class="spacer">
                                            <tbody>
                                                <tr>
                                                    <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="row">
                                            <tbody>
                                                <tr>
                                                    <th class="small-12 large-12 columns first last">
                                                        <table style="background-color: rgb(100, 65, 165); color:white;">
                                                            <tr>
                                                                <th>
                                                                    <h1>Hi {{$name}},</h1>
                                                                    <p class="lead">You send an email from the Twitch.tv website.
                                                                        </p>
                                                                    <img alt="" class="mainimage" width="800px"
                                                                        style="border-radius: 15px;"
                                                                        src="https://blog.twitch.tv/assets/uploads/twitch-generic-email-1-1-1-1.jpg">

                                                                    <p> We'll answer as soon as possible
                                                                        <br>In the mean time, watch some of your favourite streamer on
                                                                        <a href="https://www.twitch.tv/" style="color:white;">Twitch.tv</a>
                                                                    </p>

                                                                    <div
                                                                        style="padding: 30px; margin-top:50px; background-color: white; border-radius: 15px; color:black">
                                                                        <h3 align="left">{{$subject}}</h3>
                                                                        <pre align="left"
                                                                            style="font-family: 'Jost', sans-serif; font-weight: 200;">{{$content}}</pre>
                                                                    </div>
                                                                </th>
                                                                <th class="expander"></th>
                                                            </tr>
                                                        </table>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>

                    </center>
                </td>
            </tr>
            </tbody>
        </table>
        </center>
        </td>
        </tr>
        </table>
        <table align="left" class="menu " style="height: 75px; background-color: white; width: 100%;">
            <tr>
              <td>
                <table>
                    <tr>
                        <th class="menu-item float-center" style="text-align: left;" colspan="3">
                          <h2 >Volg ons op</h2>
                        </th>
                      </tr>
                  <tr style="color: black">
                    <th class="menu-item float-center" style="text-align: left; padding-right: 30px;">
                        <a href="https://www.instagram.com/twitch/">Instagram</a>
                      </th>
                    <th class="menu-item float-center" style="text-align: left; padding-right: 30px;">
                      <a href="https://twitter.com/twitch">Twitter</a>
                    </th>
                    <th class="menu-item float-center" style="text-align: left; padding-right: 30px;">
                      <a href="https://www.facebook.com/Twitch/">Facebook</i></a>
                    </th>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        <!-- prevent Gmail on iOS font size manipulation -->
        <div style="display:none; white-space:nowrap; font:15px courier; line-height:0;"> &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </div>
    </body>
</body>

</html>
