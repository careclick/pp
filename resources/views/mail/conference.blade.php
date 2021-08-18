<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>CareClick</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      
      /*All the styling goes here*/
      
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; 
      }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; 
      }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; 
      }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; 
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 15px!important; 
      }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff!important;
        border-radius: 3px;
        width: 100%; 
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%; 
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; 
      }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; 
      }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; 
      }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }

      a {
        color: #3498db;
        text-decoration: underline; 
      }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; 
      }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; 
      }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; 
      }

      .btn-primary table td {
        background-color: #3498db; 
      }

      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; 
      }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; 
      }

      .first {
        margin-top: 0; 
      }

      .align-center {
        text-align: center; 
      }

      .align-right {
        text-align: right; 
      }

      .align-left {
        text-align: left; 
      }

      .clear {
        clear: both; 
      }

      .mt0 {
        margin-top: 0; 
      }

      .mb0 {
        margin-bottom: 0; 
      }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; 
      }

      .powered-by a {
        text-decoration: none; 
      }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0; 
      }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
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

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
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
        }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; 
        } 
      }

    </style>
  </head>
  <body class="">
    {{-- <span class="preheader"> </span> --}}
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <a href="https://careclick.healthcare/event">
                          <img src="https://www.careclick.healthcare/telehealth.png" width="100%" style="height:auto;" alt="CareClick">
                        </a>
                        <p style="margin-top:20px;	line-height: 1.5; font-size:16px;">
                        <p><b>Dear Sir,</b></p>
                        <p><b>INVITATION TO BE A SPECIAL GUEST AT THE CARECLICK TELEHEALTH CONFERENCE</b></p>
                        <p style="font-size: 16px;">The current global pandemic has brought the role of Telehealth in guaranteeing wider healthcare access to front burner, and CareClick Technologies is therefore organising its CareClick Telehealth Conference with the theme the Future of Healthcare Today.</p>
                        </p>
                                    <p style="font-size: 16px; 	line-height: 1.5;">
                        CareClick Technologies is a pioneering telemedicine company focused on bridging the gap in the provision of quality healthcare services by providing 24/7 remote, affordable, convenient and secure means for the public to connect to certified quality & affordable healthcare providers through our different technology platforms, and we are organising this conference so that we can begin to create a strong conversation around the use of Telehealth in Nigeria.
                        </p>
                                    <p style="font-size: 16px; 	line-height: 1.5;">
                        The CareClick Telehealth Conference is a one-day virtual conference aimed at bringing together local and international telehealth experts, healthcare providers and stakeholders to discuss trends, innovations, practical challenges encountered and solutions adopted in the use and future of Telehealth in Nigeria – and it will be our highest honour to have you or your designate as a special guest at this event.
                        </p>
                                    <p style="font-size: 16px; 	line-height: 1.5;">
                        It is scheduled to hold as follows;
                        <p>
                        <ul>
                          <li style="font-size: 16px;">
                            Date: Thursday, September 24th
                          </li>
                          <li style="font-size: 16px;">
                            Venue: Zoom
                          </li>
                          <li style="font-size: 16px;">
                            Time: 11am
                          </li>
                          <li style="font-size: 16px;">
                            Registration Link: <a href="http://bit.ly/telehealthconference">http://bit.ly/telehealthconference</a>
                          </li>
                        </ul>
                        </p>
                        </p>
                                    <p style="font-size: 16px; 	line-height: 1.5;">
                        The Keynote Speech for the conference is to be delivered by Sharon Allen, the Co-founder and Executive Director of the World Telehealth Initiative and an international leader in philanthropic telehealth.
                        <p style="font-size: 16px;">Please find attached the conference flier, we would be incredibly grateful to have you there.</p>
                        </p>
                        <p style="font-size: 16px;	line-height: 1.5;">
                        For further information, please contact me on +2347039091072 or modupe@careclick.healthcare
                        </p>
                        <p style="font-size: 16px; 	line-height: 1.5;">We look forward to having you there.</p>
                        <div style="margin-top:20px; margin-bottom:10px;">
                          <p style="margin-top: 10px;	line-height: 1.5; font-size:16px;">Thank you.</p>
                          <p style="margin-top: 10px;	line-height: 1.5; font-size:16px;">Kind Regards</p>
                        </div>
                      </td>
                    </tr>
                    <tr style="height:80px; width:100%; background:#F1F8FE; margin: auto; display: block">
                    <td><a href="https://www.facebook.com/careclick.healthcare"><img src="https://careclick.healthcare/images/facebook.png" style="margin-top: 25px; margin-left:20px;" alt=""></a></td>
                    <td><a href="https://www.twitter.com/careclickafrica/"><img src="https://careclick.healthcare/images/twitter.png" style="margin-top: 25px; margin-left:20px;" alt=""></a></td>
                    <td><a href="https://instagram.com/careclickclinic"><img src="https://careclick.healthcare/images/instagram.png" style="margin-top: 25px; margin-left:20px;" alt=""></a></td>
                    </tr>  
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block powered-by">
                    © {{ date('Y') }} <a href="careclick.healthcare">CareClick. All rights reserved.</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>