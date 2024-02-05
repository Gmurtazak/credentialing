<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password link</title>
</head>
<body style="margin: 0; padding: 0; text-align: center;">
<div
    style="box-sizing:border-box; background-color:#f8fafc; color:#74787e; height:100%; line-height:1.4; margin:0; width:100%!important; word-break:break-word">
  <style>
    <!--
    @media only screen and (max-width: 600px) {
      .rps_ce8c .x_inner-body {
        width: 100% !important
      }

      .rps_ce8c .x_footer {
        width: 100% !important
      }

    }

    @media only screen and (max-width: 500px) {
      .rps_ce8c .x_button {
        width: 100% !important
      }

    }

    -->
  </style>
  <table class="x_wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation"
         style="box-sizing:border-box; background-color:#f8fafc; margin:0; padding:0; width:100%">
    <tbody>
    <tr>
      <td align="center" style="box-sizing:border-box">
        <table class="x_content" width="100%" cellpadding="0" cellspacing="0" role="presentation"
               style="box-sizing:border-box; margin:0; padding:0; width:100%">
          <tbody>
          <tr>
              <td class="x_header" style="box-sizing:border-box; padding:25px 0; text-align:center"><a
                      href="{{url('/')}}" target="_blank" rel="noopener noreferrer" data-auth="NotApplicable"
                      style="font-family:Arial,sans-serif;box-sizing:border-box; color:#bbbfc3; font-size:19px; font-weight:bold; text-decoration:none">
                      {{--                    <img src="" alt="{{config('app.name')}}" style="width:15%"/>--}}
                      {{config('app.name')}}
                  </a>
              </td>
          </tr>
          <tr>
            <td class="x_body" width="100%" cellpadding="0" cellspacing="0"
                style="box-sizing:border-box; background-color:#ffffff; border-bottom:1px solid #edeff2; border-top:1px solid #edeff2; margin:0; padding:0; width:100%">
              <table class="x_inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation"
                     style="box-sizing:border-box; background-color:#ffffff; margin:0 auto; padding:0; width:570px">
                <tbody>
                <tr>
                  <td class="x_content-cell" style="box-sizing:border-box; padding:35px">
                    <h1 style="font-family:Arial,sans-serif;box-sizing:border-box; color:#3d4852; font-size:19px; font-weight:bold; margin-top:0; text-align:left"> Dear {{ $name }}, </h1>
                    <h5 style="font-family:Arial,sans-serif;box-sizing:border-box; color:#3d4852; font-size:15px; font-weight:bold; margin-top:0; text-align:left"> Reset password link is here</h5>
                    <p style="font-family:Arial,sans-serif;box-sizing:border-box; color:#3d4852; font-size:16px; line-height:1.5em; margin-top:0; text-align:left">
                      Regards,<br>{{ config('app.name') }}</p>
                  </td>
                </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td style="box-sizing:border-box">
              <table class="x_footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation"
                     style="box-sizing:border-box; margin:0 auto; padding:0; text-align:center; width:570px">
                <tbody>
                <tr>
                  <td class="x_content-cell" align="center" style="box-sizing:border-box; padding:35px"><p
                      style="font-family:Arial,sans-serif;box-sizing:border-box; line-height:1.5em; margin-top:0; color:#aeaeae; font-size:12px; text-align:center">
                    © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p></td>
                </tr>
                </tbody>
              </table>
            </td>
          </tr>
          </tbody>
        </table>
      </td>
    </tr>
    </tbody>
  </table>
</div>
</body>
</html>
