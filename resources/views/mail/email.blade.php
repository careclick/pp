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
                {{-- <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <a href="https://redcarehmo.com">
                          <img src="https://www.careclick.healthcare/banner.png" width="100%" style="height:auto;" alt="RedcareHMO & CareClick">
                        </a>
                        <p style="margin-top:20px;"><b>Hi {{ $user['firstname'] }},</b></p>
                        <p>In partnership with the CareClick Virtual Clinic, Redcare HMO is pleased to offer you 24/7 telemedicine healthcare services.</p>
                        <p>You can now get access to qualified medical doctors for GP consultations via video and voice calls any time of the day! </p>
                        <p>For video calls, just <a href="https://careclick.healthcare/redcare" style="color:red;">click here</a> and log in with your details below:</p>
                        <p><b>Username:</b> {{ $user['username'] }}</p>
                        <p><b>Password:</b> {{ $user['password'] }}</p>
                        <div style="margin-top:20px;">
                          <p>For voice calls, you can call any of the following numbers:</p>
                          <p>014483371</p>
                        </div>
                        <div style="margin-top:20px; margin-bottom:10px;">
                          For enquiries/ support, please contact us: customerexperience@redcarehmo.com or call:
                          <p>0818 674 4444</p>
                          <p>0818 684 4444</p>
                          <p>0818 694 4444</p>
                        </div>
                      </td>
                    </tr> --}}
                    {{-- <tr>
                      <td>
                        <img src="https://careclick.healthcare/redcare_footer.png" width="100%" style="height:auto;" alt="RedcareHMO">
                      </td>
                    </tr> --}}
                  {{-- </table>
                </td> --}}
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <a href="https://careclick.healthcare">
                          <img src="https://www.careclick.healthcare/emm.jpg" width="100%" style="height:auto;" alt="CareClick">
                        </a>
                        <p style="margin-top:20px;	line-height: 1.5; font-size:16px;">Congratulations, <b>Hi {{ $user['name'] }},</b> and welcome to the CareClick Clinic!</p>
                        <p style="font-size: 16px; 	line-height: 1.5;">We are your 24/7 virtual clinic through which you can now access qualified medical practitioners for basic medical care needs anywhere and anytime from the comfort of your home or offices.</p>
                        <p style="font-size: 16px; 	line-height: 1.5;">We are happy to have you here, and as a welcome treat, we have offered you your first month subscription as a trial period at the rate of N10.00. We expect that you will use this first month as an opportunity to test the platform, get acquainted and make yourself comfortable with it. After this trial month, your subscription will revert to our standard rate of a N1000/month.</p>
                        <p style="font-size: 16px; 	line-height: 1.5;">As a subscriber to the CareClick Clinic, you have the opportunity to access any of the medical professionals on our platform at any time for your medical advice/consultations/diagnosis/investigation requests/prescriptions/and referrals for specialist care or to physical hospitals whenever necessary.</p>
                        <p style="font-size: 16px; 	line-height: 1.5;">In addition, where you have any issues with using the mobile application, registered subscribers can access care through our mobile call centre @ 01-4483371 – our doctors are also there waiting for you. Registration details will be required, and callers will be subjected to a verification process.</p>
                        <p style="font-size: 16px;	line-height: 1.5;">Please click <a href="http://careclick.healthcare/user-guide.pdf" style="color:blue;"><b>here</b></a> to access the user guide to the clinic, please avail yourself with the contact details below for speedy response to any need.</p>
                        <p style="font-size: 16px; 	line-height: 1.5;">General Enquiries: contact@careclick.healthcare</p>
                        <p style="font-size: 16px;	line-height: 1.5;">Customer Service: customerservice@careclick.healthcare</p>
                        <p style="font-size: 16px;	line-height: 1.5;">Telephone Enquiries: 01-4483371; +2348186744444; 08186844444</p>

                        <p style="margin-top: 10px;	line-height: 1.5; font-size:16px;">Finally, kindly follow us on our social media platforms to know more about us, our activities and service offerings – again we are extremely excited to have you on board.</p>
                        <div style="margin-top:20px; margin-bottom:10px;">
                          <p style="margin-top: 10px;	line-height: 1.5; font-size:16px;">CareClick</p>
                          <p style="margin-top: 10px;	line-height: 1.5; font-size:16px;">Yours in Health</p>
                        </div>
                      </td>
                    </tr>
                    <tr style="height:80px; width:100%; background:#F1F8FE; margin: auto; display: block">
                    <td><a href="https://www.facebook.com/careclick.healthcare"><img src="https://careclick.healthcare/images/facebook.png" style="margin-top: 25px; margin-left:20px;" alt=""></a></td>
                    <td><a href="https://www.twitter.com/careclickclinic/"><img src="https://careclick.healthcare/images/twitter.png" style="margin-top: 25px; margin-left:20px;" alt=""></a></td>
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