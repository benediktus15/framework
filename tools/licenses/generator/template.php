<?php 
global $data;
$lang = $data['lang'];
$langName = $data['langName'];
$purchase = isset($data['purchase']) ? $data['purchase'] : false;
$version = $data['version'];

?><!doctype html>
 <html>
  <head>
    <title>RazorFlow - HTML5 Dashboard Framework</title>
    <style>
    /*
      Simple Grid
      Learn More - http://dallasbass.com/simple-grid-a-lightweight-responsive-css-grid/
      Project Page - http://thisisdallas.github.com/Simple-Grid/
      Author - Dallas Bass
      Site - dallasbass.com
    */

    *, *:after, *:before {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    body {
      margin: 0px;
    }

    [class*='col-'] {
      float: left;
      padding-right: 20px; /* column-space */
    }

    .grid {
      width: 100%;
      max-width: 1140px;
      min-width: 755px;
      margin: 0 auto;
      overflow: hidden;
    }

    .grid:after {
      content: "";
      display: table;
      clear: both;
    }

    .grid-pad {
      padding-top: 20px;
      padding-left: 20px; /* grid-space to left */
      padding-right: 0px; /* grid-space to right: (grid-space-left - column-space) e.g. 20px-20px=0 */
    }

    .push-right {
      float: right;
    }

    /* Content Columns */

    .col-1-1 {
      width: 100%;
    }
    .col-2-3, .col-8-12 {
      width: 66.66%;
    }

    .col-1-2, .col-6-12 {
      width: 50%;
    }

    .col-1-3, .col-4-12 {
      width: 33.33%;
    }

    .col-1-4, .col-3-12 {
      width: 25%;
    }

    .col-1-5 {
      width: 20%;
    }

    .col-1-6, .col-2-12 {
      width: 16.667%;
    }

    .col-1-7 {
      width: 14.28%;
    }

    .col-1-8 {
      width: 12.5%;
    }

    .col-1-9 {
      width: 11.1%;
    }

    .col-1-10 {
      width: 10%;
    }

    .col-1-11 {
      width: 9.09%;
    }

    .col-1-12 {
      width: 8.33%
    }

    /* Layout Columns */

    .col-11-12 {
      width: 91.66%
    }

    .col-10-12 {
      width: 83.333%;
    }

    .col-9-12 {
      width: 75%;
    }

    .col-5-12 {
      width: 41.66%;
    }

    .col-7-12 {
      width: 58.33%
    }



    /* Pushing blocks */

    .push-2-3, .push-8-12 {
      margin-left: 66.66%;
    }

    .push-1-2, .push-6-12 {
      margin-left: 50%;
    }

    .push-1-3, .push-4-12 {
      margin-left: 33.33%;
    }

    .push-1-4, .push-3-12 {
      margin-left: 25%;
    }

    .push-1-5 {
      margin-left: 20%;
    }

    .push-1-6, .push-2-12 {
      margin-left: 16.667%;
    }

    .push-1-7 {
      margin-left: 14.28%;
    }

    .push-1-8 {
      margin-left: 12.5%;
    }

    .push-1-9 {
      margin-left: 11.1%;
    }

    .push-1-10 {
      margin-left: 10%;
    }

    .push-1-11 {
      margin-left: 9.09%;
    }

    .push-1-12 {
      margin-left: 8.33%
    }


    @media handheld, only screen and (max-width: 767px) {
      .grid {
        width: 100%;
        min-width: 0;
        margin-left: 0px;
        margin-right: 0px;
        padding-left: 20px; /* grid-space to left */
        padding-right: 10px; /* grid-space to right: (grid-space-left - column-space) e.g. 20px-10px=10px */
      }
      
      [class*='col-'] {
        width: auto;
        float: none;
        margin-left: 0px;
        margin-right: 0px;
        margin-top: 10px;
        margin-bottom: 10px;
        padding-left: 0px;
        padding-right: 10px; /* column-space */
      }
      
      
      /* Mobile Layout */
      
      [class*='mobile-col-'] {
        float: left;
        margin-left: 0px;
        margin-right: 0px;
        margin-top: 0px;
        margin-bottom: 10px;
        padding-left: 0px;
        padding-right: 10px; /* column-space */
        padding-bottom: 0px;
      }
      
      .mobile-col-1-1 {
        width: 100%;
      }
      .mobile-col-2-3, .mobile-col-8-12 {
        width: 66.66%;
      }

      .mobile-col-1-2, .mobile-col-6-12 {
        width: 50%;
      }

      .mobile-col-1-3, .mobile-col-4-12 {
        width: 33.33%;
      }

      .mobile-col-1-4, .mobile-col-3-12 {
        width: 25%;
      }

      .mobile-col-1-5 {
        width: 20%;
      }

      .mobile-col-1-6, .mobile-col-2-12 {
        width: 16.667%;
      }

      .mobile-col-1-7 {
        width: 14.28%;
      }

      .mobile-col-1-8 {
        width: 12.5%;
      }

      .mobile-col-1-9 {
        width: 11.1%;
      }

      .mobile-col-1-10 {
        width: 10%;
      }

      .mobile-col-1-11 {
        width: 9.09%;
      }

      .mobile-col-1-12 {
        width: 8.33%
      }

      /* Layout Columns */

      .mobile-col-11-12 {
        width: 91.66%
      }

      .mobile-col-10-12 {
        width: 83.333%;
      }

      .mobile-col-9-12 {
        width: 75%;
      }

      .mobile-col-5-12 {
        width: 41.66%;
      }

      .mobile-col-7-12 {
        width: 58.33%
      }
      
      .hide-on-mobile {
        display: none !important;
        width: 0;
        height: 0;
      }

    }

    .pull-right {
      float: right !important;
    }

    .website-link {
      background: #F5F5F5;
      padding: 10px;
      display: inline-block;
      text-transform: uppercase;
      font-weight: 800;
      font-size: 12px;
      border-radius: 2px;
      -webkit-border-radius: 2px; 
      -moz-border-radius: 2px; 

    }

    body {
      font-family: "Avenir-Light", "Helvetica Neue", Helvetica, Arial, sans-serif;
    }

    .banner {
      background-color: #F5F5F5;
      border-top: 2px solid #E5E5E5;
    }

    h1 {
      font-size: 36px;
      color: #215387;
    }

    h4 {
      font-size: 18px;
      font-weight: 600;
      color: #215387;
    }

    h5 {

    }

    h6 {
      font-size: 14px;
    }

    a {
      color: #215387;
      text-decoration: none;
    }

    .footer {
      width: 100%;
      background: #F5F5F5;
      text-align: center;
      padding-top: 20px;
      min-height: 150px;
      font-size: 12px;
    }

    .sidebar {
      border-left: 1px dashed #CCC;
      padding-left: 25px;
    }

    .body {
      padding-top: 40px;
      padding-bottom: 200px;
    }

    .body h4 {
      color: #000;
      font-weight: 800;
    }

    .body h5 {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 0;
    }

    .banner div {
      padding: 25px 0px;
    }

    hr {
      border: 0;
      border-bottom: 1px solid #E5E5E5;
    }

    ul {
      list-style-type: none;
      padding-left: 0;
    }

    ul li {
      padding-bottom: 10px;
    }

    ul li img:first-child {
      padding-right: 5px;
    }

    ul li img:last-child {
      padding-left: 5px;
      width: 18px;
    }

    .sidebar-item a {
      font-size: 14px;
      text-decoration: none;
    }

    .sidebar-item a span {
      text-decoration: underline;
    }

    .sidebar-item > h5 {
      border-bottom: 1px solid #E5E5E5;
      padding-bottom: 5px;
    }

    .bg-overlay {
      background: #ecf2f9;
      padding: 10px;
      font-size: 14px;
    }

    .curves {
      position: absolute;
      margin-left:  43%;
      margin-top: -30px;
      border: 0;
      padding: 20px 15px 0px 30px !important;
      background: #FFF;
      border-radius: 200px;
      -webkit-border-radius: 200px; 
      -moz-border-radius: 200px; 

      height: 60px;
    }

    .curves a {
      background: #215387;
      padding: 10px 15px;
      border-radius: 2px;
      color: #FFF;
      font-size: 18px;
      text-transform: uppercase;
      border-radius: 50px;
      -webkit-border-radius: 50px; 
      -moz-border-radius: 50px; 
      margin-left: -15px;
      position: relative;
      top: -2px;
      padding-right: 40px;
    }

    .curves img {
      position: absolute;
      left: 88%;
      top: 20px;
    }

    h1 {
      margin-bottom: -15px;
    }

    .btn {
      background: #215387;
      color: #FFF;
      border-radius: 2px;
      -webkit-border-radius: 2px; 
      -moz-border-radius: 2px; 
      padding: 2px 20px;
    }

    .content {
      padding-left: 20px !important;
    }

    h4 span {
      font-size: 13px;
      bottom: 2px;
      font-weight: normal;
      background: #215387;
      position: relative;
      padding: 0 6px;
      margin-left: 6px;
      border-radius: 3px;
      -webkit-border-radius: 3px; 
      -moz-border-radius: 3px; 

      color: #fff;
    }

    .bg-overlay a {
      text-decoration: underline;
    }



    .logo {
      background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQ4AAAAkCAYAAAB48dRBAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NDkxMSwgMjAxMy8xMC8yOS0xMTo0NzoxNiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NUMxNEZFOEYwRTY3MTFFNDk0NDNEMjhEOUMzQzE5QzAiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NUMxNEZFOEUwRTY3MTFFNDk0NDNEMjhEOUMzQzE5QzAiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChNYWNpbnRvc2gpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6Q0NFNjM1RjlCMjZGMTFFM0JENUI4M0IwMEY1QUMwNDYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6Q0NFNjM1RkFCMjZGMTFFM0JENUI4M0IwMEY1QUMwNDYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7RFD9UAAA1EElEQVR42ux9CZxk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);

      background-repeat: no-repeat;
      height: 50px;
    }
    </style>
  </head>
  <body>

    <div class="grid grid-pad">
      <div class="col-1-2">
          <a href="http://razorflow.com"><div class="logo"></div></a>
      </div>
      <div class="col-1-2">
        <div class="content pull-right">
          <a href="http://razorflow.com" class="website-link">VISIT WEBSITE</a>
        </div>
      </div>
    </div>
    <div class="banner">
      <div class="grid grid-pad">
        <div class="col-10-12 content">
            <h1>THANK YOU</h1>
            <h4>
              FOR <?= $purchase ? "PURCHASING":"DOWNLOADING"; ?> RAZORFLOW DASHBOARD FRAMEWORK: <?= strtoupper($langName); ?>
              <span><?= $data['license_name']; ?></span>
            </h4>
        </div>
        <div class="col-4-12">
        </div>
      </div>
      <div class="curves">
        <a href="http://razorflow.com/docs/dashboard/">Click here to get started
        </a>
          <img alt="" src="data:image/png;base64,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" />
      </div>
    </div>
    <div class="grid grid-pad body">
       <div class="col-8-12">
        <h4>Welcome!</h4>
        <p>
          RazorFlow Dashboard Framework helps you build interactive dashboards in HTML5 that work well on all modern devices. The best part is you do not have to worry about the quirks involved with cross-browser or cross-device applications, as our framework abstracts all that pain for you.
        </p>

        <p>
          You can configure components of the dashboard using an intuitive API, which will intelligently render the dashboard according to the capabilities and form-factor of your user's device. RazorFlow Dashboard Framework lets you focus on the important things: your users and the information they care about. You write code for the dashboard only once, but it works perfectly on all modern devices.
        </p>

        <?php if($lang =="js" || $lang=="suite") { ?>
        <p>
          Use the JavaScript library to build immersive, interactive dashboards with fine grained control that works with just about any server technology out there.
        </p>
        <?php } ?>

        <?php if($lang =="php" || $lang=="suite") { ?>
        <p>
          This download also includes the powerful PHP API which helps you build full-featured interactive dashboards faster and more productively than ever. Works with all major databases, MVC Frameworks and libraries.
        </p>
        <?php } ?>

        <h4>Downloading Latest Versions</h4>
        <p>Since RazorFlow is frequently updated with new features, improved stability and better tools - we recommend that you download the latest version when you start development. In the right-column of this page you will find links to download copies of RazorFlow. This is a direct download and there are no forms to fill out, and that link will always download the latest version.</p>
        <?php if ($purchase) { ?>

        <h4>Priority Support</h4>
        <p>We are constantly updating our support infrastructure to give you a better experience while writing support queries to help solve your problems quickly and effectively. <a href="http://www.razorflow.com/contact/support.php">Ask a support question here</a>.</p>
        
        <h4>Phone Support</h4>
        <p>Your license entitles you to support over the phone. Please send a support message mentioning that you wish to have a support call, and a member from the RazorFlow team will call you at a time of your convenience.</p>
        <? } ?>
      </div>
       <div class="col-4-12">
          <div class="sidebar">
          <div class="sidebar-item">
            <h5>Version <?= $version; ?></h5>
            <p style="font-size:14px">This package contains Version <?= $version; ?> of RazorFlow Dashboard Framework, released on <?= date("jS F Y");?>.</p>
          </div>
          
          <div class="sidebar-item">

            <h5>Download</h5>
            <ul>
              <li>
                <a href="#">
                  Download Latest <?= $purchase ? "Licensed" : "Developer"; ?> Version 
                  <img alt="" src="data:image/png;base64,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" />
                </a>
              </li>
            </ul>
          </div>
          <div class="sidebar-item">
            <h5>License</h5>
            <ul>
              <li><a href="http://razorflow.com/license/show.php?id=<?= $data['license_id']; ?>">
                <img alt="" src="data:image/png;base64,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" />

                <span>View License (<?= $data['license_name']; ?>)</span></a></li>
            </ul>
          </div>

          <div class="sidebar-item">
            <div class="bg-overlay">
              Want to try the latest features before they are released? Sign up for the <a href="http://razorflow.com/beta/">RazorFlow Beta Program</a></div>
          </div>

        </div>
      </div>
    </div>

    <div class="footer">&copy; 2014 RazorFlow Technologies LLP. All rights reserved.</div>
  </body>
  </html>