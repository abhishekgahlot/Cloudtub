<?php
set_include_path('phpmailer');
require 'class.phpmailer.php';
$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'postmaster@cloudtub.com';      // SMTP username
$mail->Password = '2eue8ah5c4s1';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'signup@cloudtub.com';
$mail->FromName = 'Cloudtub';
 // Add a recipient
$mail->addAddress('abhishekgahlot007@gmail.com');               // Name is optional

                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML



$body1='<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <title>Cloudtub Email</title>
    </head>

<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<style type="text/css">
	    @import url(http://fonts.googleapis.com/css?family=Noto+Sans:400,700);

        @import url(http://fonts.googleapis.com/css?family=Rochester);

        body{
            width: 100%;
            background-color: #d5dce6;
            margin:0;
            padding:0;
            -webkit-font-smoothing: antialiased;
        }

        p,h1,h2,h3,h4{
            margin-top:0;
            margin-bottom:0;
            padding-top:0;
            padding-bottom:0;
        }

        span.preheader{display: none; font-size: 1px;}

        html{
            width: 100%;
        }

        table{
            font-size: 14px;
            border: 0;
            border-collapse:collapse;
            mso-table-lspace:0pt;
            mso-table-rspace:0pt;
        }


         @media only screen and (max-width: 640px){

            .top-bg{width: 440px !important;}
            .main-header{line-height: 28px !important; font-size: 20px !important;}
            .main-subheader{line-height: 28px !important;}

            .main-image img{width: 420px !important; height: auto !important;}


            .container600{width: 440px !important;}
            .container560{width: 420px !important;}


            .divider img{width: 440px !important; height: 1px !important;}


            .banner{width: 400px !important; height: auto !important;}

            .section-item{width: 420px !important; text-align: center;}

            .unsubscribe{line-height: 26px !important; font-size: 13px !important;}
            .vertical-spacing{width: 420px !important;}
            .bottom-shadow{width: 440px !important;}
        }

        @media only screen and (max-width: 479px){


            .top-bg{width: 280px !important;}

            .nav{width: 260px !important;}
            .main-header{line-height: 28px !important; font-size: 18px !important;}
            .main-subheader{line-height: 28px !important;}


            .main-image img{width: 260px !important; height: auto !important;}


            .container600{width: 280px !important;}
            .container560{width: 260px !important;}


            .divider img{width: 280px !important; height: 1px !important;}

            .section-item{width: 260px !important; text-align: center !important;}


            .unsubscribe{line-height: 26px !important; font-size: 13px !important;}
            .vertical-spacing{width: 260px !important;}
            .bottom-shadow{width: 280px !important;}
        }
    </style>

    <table bgcolor="#D5DCE6" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td height="47"></td>
            </tr>
            <tr>
                <td align="center">
                    <table class="container600" bgcolor="#F8F8F8" border="0" cellpadding="0" cellspacing="0" width="600" align="center">


                        <tbody>
                        	<td style="line-height: 25px;"><img src="http://www.cloudtub.com/coming-soon/cr/top-header-bg.png" style="display: block; width: 600px; max-height:5px;" alt="" class="top-bg" border="0" height="25" width="600" /></td>
                            <tr mc:repeatable="">
                                <td align="center">
                                    <table class="container600" border="0" cellpadding="0" cellspacing="0" width="600" align="center">
                                        <tbody>
                                            <tr>
                                                <td height="40"></td>
                                            </tr>

                                            <tr>
                                                <td align="center">
                                                    <table class="container560" border="0" cellpadding="0" cellspacing="0" width="560" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <table style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="logo" border="0" cellpadding="0" cellspacing="0" align="left">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center">
                                                                                    <h3 style="font-family: Rochester, cursive;font-size:40px;font-weight:300;"><a href="http://www.cloudtub.com" style="display: block; width: 147px; height: 30px; border-style: none !important; border: 0 !important;text-decoration:none;color:rgb(72, 130, 206);">Cloudtub</a></h3>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <table style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="nav" border="0" cellpadding="0" cellspacing="0" align="left">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="20" width="20"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <table style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="nav" border="0" cellpadding="0" cellspacing="0" align="right">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="10"></td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td mc:edit="view-online" style="font-size: 13px; " align="center">
                                                                                    <table class="date" border="0" cellpadding="0" cellspacing="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td mc:edit="online" style="color: #9099a6; font-size: 18px; font-family: Noto Sans, Arial, sans-serif; line-height:30px;" class="view-online">Registration Successful</td>
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
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td height="40"></td>
                            </tr>

                            <tr mc:repeatable="">
                                <td>
                                    <table class="container600" border="0" cellpadding="0" cellspacing="0" width="600" align="center">
                                        <tbody>
                                            <tr>
                                                <td style="line-height: 2px;" class="divider"><hr style="border: 0;height: 1px; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);"/> </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td height="45"></td>
                            </tr>

                            <tr mc:repeatable="">
                                <td align="center">
                                    <table class="container600" border="0" cellpadding="0" cellspacing="0" width="600" align="center">
                                        <tbody>
                                            <tr>
                                                <td class="main-image" align="center"><img editable="true" mc:edit="main-image" src="http://www.cloudtub.com/coming-soon/cr/main-image.png" style="display: block; width: 560px; height: 296px;" alt="main image" border="0" height="296" width="560" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr mc:repeatable="">
                                <td height="45"></td>
                            </tr>

                            <tr mc:repeatable="">
                                <td align="center">
                                    <table class="container600" border="0" cellpadding="0" cellspacing="0" width="600" align="center">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table class="container560" border="0" cellpadding="0" cellspacing="0" width="520" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td mc:edit="main-header" style="color: #6c7480; font-size: 25px; font-family: Noto Sans, Arial, sans-serif;" class="main-header" align="center">Dear Don<br />
                                                                You just signed up for <a href="" style="color: #4882ce; text-decoration: none;">Amazing</a> Cloud Storage Service.</td>
                                                            </tr>

                                                            <tr>
                                                                <td height="15"></td>
                                                            </tr>

                                                            <tr>
                                                                <td mc:edit="main-subheader" style="color: #b2b8bf; font-size: 14px; font-family: PT Sans, Arial, sans-serif; line-height: 36px;" class="main-subheader" align="center">
                                                                    <h2>Verify Your Account Using this Link :</h2><a href="http://www.google.com">http://www.google.http://www.google.comm/http://www.google.com</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr mc:repeatable="">
                                <td height="45"></td>
                            </tr>

                            <tr mc:repeatable="">
                                <td>
                                    <table class="container600" border="0" cellpadding="0" cellspacing="0" width="600" align="center">
                                        <tbody>
                                            <tr>
                                                <td style="line-height: 3px;" class="divider"><hr style="border: 0;height: 1px; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);"/> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td mc:edit="main-subheader" style="color: #b2b8bf; font-size: 14px; font-family: PT Sans, Arial, sans-serif; line-height: 36px;" class="main-subheader" align="center">
                                    <h3>If you are still having problems signing up,
                                     please Contact Us at contact@cloudtub.com<br />
                                    Once Again Thank you for registering.Have A Great Day</h3>
                                </td>
                            </tr>

                            <tr mc:repeatable="">
                                <td>
                                    <table class="container600" border="0" cellpadding="0" cellspacing="0" width="600" align="center">
                                        <tbody>
                                            <tr>
                                                <td style="line-height: 3px;" class="divider"><hr style="border: 0;height: 1px; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);"/> </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td height="45"></td>
                            </tr>

					<tr>
						<td align="center">
							<table border="0" align="center" width="560" cellpadding="0" cellspacing="0" class="container560">

								<tr>
									<td align="center">
										<table border="0" align="left" cellpadding="0" cellspacing="0" class="container560">
											<tr>
												<td align="center">
													<table border="0" align="center" cellpadding="0" cellspacing="0" class="website">
														<tr>
															<td align="center">
							                					<a href="" style="font-family: Rochester, cursive;font-size:30px;font-weight:300;text-decoration:none;color:rgb(72, 130, 206);display: inline; width: 108px; height: 23px; border-style: none !important; border: 0 !important;">Cloudtub</a>


							                				</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>

										<table border="0" width="34" align="left" cellpadding="0" cellspacing="0" class="container560">
				                			<tr>
				                				<td height="20" width="34"></td>
				                			</tr>
				                		</table>

				                		<table border="0" align="right" cellpadding="0" cellspacing="0" class="container560">
				                			<tr>
				                				<td align="center">
				                					<table border="0" align="center" cellpadding="0" cellspacing="0">
				                						<tr>
															 <tr>
                                                                                <td><a style="display: block; width: 34px; border-style: none !important; border: 0 !important;" target="_blank" href="//www.facebook.com/cloudtub"><img editable="true" mc:edit="facebook" style="display: block;" src="http://www.cloudtub.com/coming-soon/cr/facebook.png" alt="facebook" border="0" height="34" width="34" /></a></td>

                                                                                <td>&nbsp;&nbsp;</td>

                                                                                <td><a style="display: block; width: 34px; border-style: none !important; border: 0 !important;" target="_blank" href="//www.twitter.com/cloudtub"><img editable="true" mc:edit="twitter" style="display: block;" src="http://www.cloudtub.com/coming-soon/cr/twitter.png" alt="twitter" border="0" height="34" width="34" /></a></td>

                                                                                <td>&nbsp;&nbsp;</td>

                                                                                <td><a style="display: block; width: 34px; border-style: none !important; border: 0 !important;" target="_blank" href="//plus.google.com/114057120706005228626"><img editable="true" mc:edit="google" style="display: block;" src="http://www.cloudtub.com/coming-soon/cr/google.png" alt="google" border="0" height="34" width="34" /></a></td>
                                                                            </tr>

														</tr>
				                					</table>
				                				</td>
				                			</tr>
										</table>

									</td>
								</tr>
							</table>
						</td>
					</tr>

					<tr><td height="35"></td></tr>

					<!-------------- end footer ------------->
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <table class="container600" border="0" cellpadding="0" cellspacing="0" width="600" align="center">
                        <tbody>
                            <tr>
                                <td style="line-height: 35px;" align="center"><img src="http://www.cloudtub.com/coming-soon/cr/footer-shadow.png" style="display: block; width: 600px; height: 35px;" class="bottom-shadow" border="0" height="35" width="600" /></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td height="20"></td>
            </tr>

            <tr>
                <td>
                    <table class="container600" border="0" cellpadding="0" cellspacing="0" width="600" align="center">
                        <tbody>
                            <tr>
                                <td height="30"></td>
                            </tr>

                            <tr>
                                <td mc:edit="copy" style="color: #9da5b0; font-size: 14px; font-family: PT Sans, Arial, sans-serif;" class="unsubscribe" align="center">Copyright © Cloudtub 2012-2013.</td>
                            </tr>

                            <tr>
                                <td height="45"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>';


$body3='
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!-- Define Charset -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- Responsive Meta Tag -->
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />

    <title>Cloudtub</title><!-- Responsive Styles and Valid Styles -->


    <style type="text/css">
    	@import url(http://fonts.googleapis.com/css?family=Noto+Sans:400,700);

	    body{
            width: 100%;
            background-color: #d5dce6;
            margin:0;
            padding:0;
            -webkit-font-smoothing: antialiased;
        }

        p,h1,h2,h3,h4{
	        margin-top:0;
			margin-bottom:0;
			padding-top:0;
			padding-bottom:0;
        }

        span.preheader{display: none; font-size: 1px;}

        html{
            width: 100%;
        }

        table{
            font-size: 14px;
            border: 0;
            border-collapse:collapse;
            mso-table-lspace:0pt;
            mso-table-rspace:0pt;
        }

        /* ----------- responsivity ----------- */
         @media only screen and (max-width: 640px){
			/*------ top header ------ */
			.top-bg{width: 440px !important;}
			.main-header{line-height: 28px !important; font-size: 20px !important;}
            .main-subheader{line-height: 28px !important;}

			/*----- main image -------*/
			.main-image img{width: 420px !important; height: auto !important;}

			/*-------- container --------*/
			.container600{width: 440px !important;}
			.container560{width: 420px !important;}

			/*-------- divider --------*/
			.divider img{width: 440px !important; height: 1px !important;}

			/*----- banner -------*/
			.banner{width: 400px !important; height: auto !important;}
			/*-------- secions ----------*/
			.section-item{width: 420px !important; text-align: center;}


			/*-------- footer ------------*/
			.unsubscribe{line-height: 26px !important; font-size: 13px !important;}
			.vertical-spacing{width: 420px !important;}
			.bottom-shadow{width: 440px !important;}
		}

		@media only screen and (max-width: 479px){

			/*------ top header ------ */
			.top-bg{width: 280px !important;}
			.logo{width: 260px !important;}
			.nav{width: 260px !important;}
			.main-header{line-height: 28px !important; font-size: 18px !important;}
            .main-subheader{line-height: 28px !important;}

			/*----- main image -------*/
			.main-image img{width: 260px !important; height: auto !important;}

			/*-------- container --------*/
			.container600{width: 280px !important;}
			.container560{width: 260px !important;}

			/*-------- divider --------*/
			.divider img{width: 280px !important; height: 1px !important;}

			/*-------- secions ----------*/
			.section-item{width: 260px !important; text-align: center !important;}

			/*-------- footer ------------*/
			.unsubscribe{line-height: 26px !important; font-size: 13px !important;}
			.vertical-spacing{width: 260px !important;}
			.bottom-shadow{width: 280px !important;}
		}

	</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">


	<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="d5dce6">

		<tr><td height="47"></td></tr>



		<tr>
			<td align="center">
				<table width="600" cellpadding="0" align="center" cellspacing="0" border="0" bgcolor="f8f8f8" class="container600">
					<td style="line-height: 25px;">
							<img src="http://www.cloudtub.com/coming-soon/cr/top-header-bg.png" style="display: block; width: 600px; max-height: 5px;" width="600" height="25" border="0" alt="" class="top-bg" />
						</td>

					<!-- ------------ header ----------- -->
					<tr mc:repeatable>
						<td align="center">

							<table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600">

								<tr><td height="40"></td></tr>

								<tr>
									<td align="center">
										<table width="560" cellpadding="0" align="center" cellspacing="0" border="0" class="container560">
											<tr>
												<td align="center">
													<table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="logo">
							                			<tr>
							                				<td align="center">

							          <a href="http://www.cloudtub.com" style="display: block; width: 147px; height: 30px; border-style: none !important; border: 0 !important;text-decoration:none;color:rgb(72, 130, 206);font-family: Rochester, cursive;font-size:35px;font-weight:300;">Cloudtub</a>

							                				</td>
							                			</tr>
							                		</table>

							                		<table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="nav">
							                			<tr>
							                				<td height="20" width="20"></td>
							                			</tr>
							                		</table>

							                		<table border="0" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="nav">
									        			<tr><td height="5"></td></tr>
									        			<tr>
									        				<td align="center" mc:edit="view-online" style="font-size: 13px; font-family: Helvetica, Arial, sans-serif;">
									        					<table border="0" cellpadding="0" cellspacing="0" class="date">
									                				<tr>

											                    		<td mc:edit="online" style="color: #9099a6; font-size: 14px; font-family: Noto Sans, Arial, sans-serif;" class="view-online">
											                    			<singleline>
							 <a href="" style="color: #4882ce; text-decoration: none;">Registration Successful</a>
																			</singleline>
											                    		</td>
											                    	</tr>

									                			</table>
									        				</td>
									        			</tr>
									        		</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>

							</table>
						</td>
					</tr>

					<!-- ------------ end header ----------- -->

					<tr><td height="40"></td></tr>

					<!-------------- divider ------------->
					<tr mc:repeatable>
						<td>
							<table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600">
								<tr>
									<td style="line-height: 3px;" class="divider"><hr style="border: 0;height: 1px; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);"/> </td>
								</tr>
							</table>
						</td>
					</tr>
					<!-------------- end divider ------------->

					<tr><td height="45"></td></tr>

					<!-------------- main image ------------->
					<tr mc:repeatable>
						<td align="center">
							<table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600">
								<tr>
									<td align="center" class="main-image">
							        	<img editable="true" mc:edit="main-image" src="http://www.cloudtub.com/coming-soon/cr/main-image.png" style="display: block; width: 560px; height: 296px;" width="560" height="296" border="0" alt="main image" />
							        </td>
								</tr>
							</table>
						</td>
					</tr>
					<!-------------- end main image ------------->

					<tr mc:repeatable><td height="45"></td></tr>

					<!-------------- main text ------------->
					<tr mc:repeatable>
						<td align="center">
							<table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600">
								<tr>
			        				<td align="center">
			        					<table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="container560">
			        						<tr>
			        							<td align="center" mc:edit="main-header" style="color: #6c7480; font-size: 25px; font-family: Noto Sans, Arial, sans-serif;" class="main-header">
						        					<multiline>
						        						Dear Don<br />
                          You just signed up for <a href="" style="color: #4882ce; text-decoration: none;">Amazing</a>
                           Cloud Storage Service.
                           							</multiline>
						        				</td>
			        						</tr>
			        						<tr><td height="15"></td></tr>
			        						<tr>
			        							<td align="center" mc:edit="main-subheader" style="color: #b2b8bf; font-size: 14px; font-family: PT Sans, Arial, sans-serif; line-height: 36px;" class="main-subheader">
			        								<multiline>
			        									<h2>Verify Your Account Using this Link :</h2><a href="http://www.google.com">http://www.google.http://www.google.comm/http://www.google.com</a>
			        								</multiline>
			        							</td>
			        						</tr>
			        					</table>
			        				</td>
			        			</tr>
							</table>
						</td>
					</tr>
					<!-------------- end main text ------------->

					<tr mc:repeatable><td height="45"></td></tr>

					<!-------------- divider ------------->
					<tr mc:repeatable>
						<td>
							<table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600">
								<tr>
									<td style="line-height: 3px;" class="divider"><hr style="border: 0;height: 1px; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);"/> </td>
								</tr>
							</table>
						</td>
					</tr>
					<!-------------- end divider ------------->
					<tr mc:repeatable><td height="45"></td></tr>


					<tr mc:repeatable>
						 <td mc:edit="main-subheader" style="color: #6c7480; font-size: 14px; font-family: PT Sans, Arial, sans-serif; line-height: 36px;" class="main-subheader" align="center">
                                    <h3>If you are still having problems signing up,
                                     please Contact Us at contact@cloudtub.com<br />
                                    Once Again Thank you for registering.Have A Great Day</h3>
                                </td>

					</tr>



					<tr mc:repeatable><td height="45"></td></tr>

					<!-------------- divider ------------->
					<tr mc:repeatable>
						<td>
							<table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600">
								<tr>
									<td style="line-height: 3px;" class="divider"><hr style="border: 0;height: 1px; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);"/> </td>
								</tr>
							</table>
						</td>
					</tr>
					<!-------------- end divider ------------->

					<tr><td height="45"></td></tr>

					<!-------------- footer ------------->
					<tr>
						<td align="center">
							<table border="0" align="center" width="560" cellpadding="0" cellspacing="0" class="container560">

								<tr>
									<td align="center">
										<table border="0" align="left" cellpadding="0" cellspacing="0" class="container560">
											<tr>
												<td align="center">
													<table border="0" align="center" cellpadding="0" cellspacing="0" class="website">
														<tr>
															<td align="center">
							                					<a href="http://www.cloudtub.com" style="display: block; width: 147px; height: 30px; border-style: none !important; border: 0 !important;text-decoration:none;color:rgb(72, 130, 206);font-family: Rochester, cursive;font-size:30px;font-weight:300;">Cloudtub</a>							                				</td>


														</tr>
													</table>
												</td>
											</tr>
										</table>

										<table border="0" width="34" align="left" cellpadding="0" cellspacing="0" class="container560">
				                			<tr>
				                				<td height="20" width="34"></td>
				                			</tr>
				                		</table>

				                		<table border="0" align="right" cellpadding="0" cellspacing="0" class="container560">
				                			<tr>
				                				<td align="center">
				                					<table border="0" align="center" cellpadding="0" cellspacing="0">
				                						<tr>
															 <td><a style="display: block; width: 34px; border-style: none !important; border: 0 !important;" target="_blank" href="//www.facebook.com/cloudtub"><img editable="true" mc:edit="facebook" style="display: block;" src="http://www.cloudtub.com/coming-soon/cr/facebook.png" alt="facebook" border="0" height="34" width="34" /></a></td>

                                                                                <td>&nbsp;&nbsp;</td>

                                                                                <td><a style="display: block; width: 34px; border-style: none !important; border: 0 !important;" target="_blank" href="//www.twitter.com/cloudtub"><img editable="true" mc:edit="twitter" style="display: block;" src="http://www.cloudtub.com/coming-soon/cr/twitter.png" alt="twitter" border="0" height="34" width="34" /></a></td>

                                                                                <td>&nbsp;&nbsp;</td>

                                                                                <td><a style="display: block; width: 34px; border-style: none !important; border: 0 !important;" target="_blank" href="//plus.google.com/114057120706005228626"><img editable="true" mc:edit="google" style="display: block;" src="http://www.cloudtub.com/coming-soon/cr/google.png" alt="google" border="0" height="34" width="34" /></a></td>

														</tr>
				                					</table>
				                				</td>
				                			</tr>
										</table>

									</td>
								</tr>
							</table>
						</td>
					</tr>

					<tr><td height="35"></td></tr>

					<!-------------- end footer ------------->

				</table>
			</td>
		</tr>

		<tr>
			<td align="center">

				<table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600">
					<tr>
						<td align="center" style="line-height: 35px;">
							<img src="http://www.cloudtub.com/coming-soon/cr/footer-shadow.png" style="display: block; width: 600px; height: 35px;" width="600" height="35" border="0" class="bottom-shadow" />
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<tr><td height="20"></td></tr>

		<tr>
			<td>
				<table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600">

					<tr><td height="30"></td></tr>
					<tr>
						<td align="center" mc:edit="copy" style="color: #9da5b0; font-size: 14px; font-family: PT Sans, Arial, sans-serif;" class="unsubscribe">
	    					<multiline>
	    						Copyright © Cloudtub  2012-2013.
	    					</multiline>
	    				</td>
					</tr>
					<tr><td height="45"></td></tr>
				</table>
			</td>
		</tr>

	</table>
</body>
</html>';

$body4='<!DOCTYPE HTML> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <!-- Define Charset --> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <!-- Responsive Meta Tag --> <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" /> <title>Cloudtub</title><!-- Responsive Styles and Valid Styles --> <style type="text/css"> @import url(http://fonts.googleapis.com/css?family=Noto+Sans:400,700); body{ width: 100%; background-color: #d5dce6; margin:0; padding:0; -webkit-font-smoothing: antialiased; } p,h1,h2,h3,h4{ margin-top:0; margin-bottom:0; padding-top:0; padding-bottom:0; } span.preheader{display: none; font-size: 1px;} html{ width: 100%; } table{ font-size: 14px; border: 0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; } /* ----------- responsivity ----------- */ @media only screen and (max-width: 640px){ /*------ top header ------ */ .top-bg{width: 440px !important;} .main-header{line-height: 28px !important; font-size: 20px !important;} .main-subheader{line-height: 28px !important;} /*----- main image -------*/ .main-image img{width: 420px !important; height: auto !important;} /*-------- container --------*/ .container600{width: 440px !important;} .container560{width: 420px !important;} /*-------- divider --------*/ .divider img{width: 440px !important; height: 1px !important;} /*----- banner -------*/ .banner{width: 400px !important; height: auto !important;} /*-------- secions ----------*/ .section-item{width: 420px !important; text-align: center;} /*-------- footer ------------*/ .unsubscribe{line-height: 26px !important; font-size: 13px !important;} .vertical-spacing{width: 420px !important;} .bottom-shadow{width: 440px !important;} } @media only screen and (max-width: 479px){ /*------ top header ------ */ .top-bg{width: 280px !important;} .logo{width: 260px !important;} .nav{width: 260px !important;} .main-header{line-height: 28px !important; font-size: 18px !important;} .main-subheader{line-height: 28px !important;} /*----- main image -------*/ .main-image img{width: 260px !important; height: auto !important;} /*-------- container --------*/ .container600{width: 280px !important;} .container560{width: 260px !important;} /*-------- divider --------*/ .divider img{width: 280px !important; height: 1px !important;} /*-------- secions ----------*/ .section-item{width: 260px !important; text-align: center !important;} /*-------- footer ------------*/ .unsubscribe{line-height: 26px !important; font-size: 13px !important;} .vertical-spacing{width: 260px !important;} .bottom-shadow{width: 280px !important;} } </style> </head> <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"> <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="d5dce6"> <tr><td height="47"></td></tr> <tr> <td align="center"> <table width="600" cellpadding="0" align="center" cellspacing="0" border="0" bgcolor="f8f8f8" class="container600"> <td style="line-height: 25px;"> <img src="http://www.cloudtub.com/coming-soon/cr/top-header-bg.png" style="display: block; width: 600px; max-height: 5px;" width="600" height="25" border="0" alt="" class="top-bg" /> </td> <!-- ------------ header ----------- --> <tr mc:repeatable> <td align="center"> <table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600"> <tr><td height="40"></td></tr> <tr> <td align="center"> <table width="560" cellpadding="0" align="center" cellspacing="0" border="0" class="container560"> <tr> <td align="center"> <table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="logo"> <tr> <td align="center"> <a href="http://www.cloudtub.com" style="display: block; width: 147px; height: 30px; border-style: none !important; border: 0 !important;text-decoration:none;color:rgb(72, 130, 206);font-family: Rochester, cursive;font-size:35px;font-weight:300;">Cloudtub</a> </td> </tr> </table> <table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="nav"> <tr> <td height="20" width="20"></td> </tr> </table> <table border="0" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="nav"> <tr><td height="5"></td></tr> <tr> <td align="center" mc:edit="view-online" style="font-size: 13px; font-family: Helvetica, Arial, sans-serif;"> <table border="0" cellpadding="0" cellspacing="0" class="date"> <tr> <td mc:edit="online" style="color: #9099a6; font-size: 14px; font-family: Noto Sans, Arial, sans-serif;" class="view-online"> <singleline> <a href="" style="color: #4882ce; text-decoration: none;">Registration Successful</a> </singleline> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> <!-- ------------ end header ----------- --> <tr><td height="40"></td></tr> <!-------------- divider -------------> <tr mc:repeatable> <td> <table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600"> <tr> <td style="line-height: 3px;" class="divider"><hr style="border: 0;height: 1px; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);"/> </td> </tr> </table> </td> </tr> <!-------------- end divider -------------> <tr><td height="45"></td></tr> <!-------------- main image -------------> <tr mc:repeatable> <td align="center"> <table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600"> <tr> <td align="center" class="main-image"> <img editable="true" mc:edit="main-image" src="http://www.cloudtub.com/coming-soon/cr/main-image.png" style="display: block; width: 560px; height: 296px;" width="560" height="296" border="0" alt="main image" /> </td> </tr> </table> </td> </tr> <!-------------- end main image -------------> <tr mc:repeatable><td height="45"></td></tr> <!-------------- main text -------------> <tr mc:repeatable> <td align="center"> <table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600"> <tr> <td align="center"> <table border="0" width="520" align="center" cellpadding="0" cellspacing="0" class="container560"> <tr> <td align="center" mc:edit="main-header" style="color: #6c7480; font-size: 25px; font-family: Noto Sans, Arial, sans-serif;" class="main-header"> <multiline> Dear Don<br/><br/> You just signed up for <a href="" style="color: #4882ce; text-decoration: none;">Amazing</a> Cloud Storage Service. </multiline> </td> </tr> <tr><td height="15"></td></tr> <tr> <td align="center" mc:edit="main-subheader" style="color: #b2b8bf; font-size: 14px; font-family: PT Sans, Arial, sans-serif; line-height: 36px;" class="main-subheader"> <multiline> <h2>Verify Your Account Using this Link :</h2><a href="http://www.google.com">http://www.google.http://www.google.comm/http://www.google.com</a> </multiline> </td> </tr> </table> </td> </tr> </table> </td> </tr> <!-------------- end main text -------------> <tr mc:repeatable><td height="45"></td></tr> <!-------------- divider -------------> <tr mc:repeatable> <td> <table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600"> <tr> <td style="line-height: 3px;" class="divider"><hr style="border: 0;height: 1px; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);"/> </td> </tr> </table> </td> </tr> <!-------------- end divider -------------> <tr mc:repeatable><td height="45"></td></tr> <tr mc:repeatable> <td mc:edit="main-subheader" style="color: #6c7480; font-size: 14px; font-family: PT Sans, Arial, sans-serif; line-height: 36px;" class="main-subheader" align="center"> <h3>If you are still having problems signing up, please Contact Us at contact@cloudtub.com<br /> Once Again Thank you for registering.Have A Great Day</h3> </td> </tr> <tr mc:repeatable><td height="45"></td></tr> <!-------------- divider -------------> <tr mc:repeatable> <td> <table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600"> <tr> <td style="line-height: 3px;" class="divider"><hr style="border: 0;height: 1px; border-top: 1px solid rgba(0, 0, 0, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.3);"/> </td> </tr> </table> </td> </tr> <!-------------- end divider -------------> <tr><td height="45"></td></tr> <!-------------- footer -------------> <tr> <td align="center"> <table border="0" align="center" width="560" cellpadding="0" cellspacing="0" class="container560"> <tr> <td align="center"> <table border="0" align="left" cellpadding="0" cellspacing="0" class="container560"> <tr> <td align="center"> <table border="0" align="center" cellpadding="0" cellspacing="0" class="website"> <tr> <td align="center"> <a href="http://www.cloudtub.com" style="display: block; width: 147px; height: 30px; border-style: none !important; border: 0 !important;text-decoration:none;color:rgb(72, 130, 206);font-family: Rochester, cursive;font-size:30px;font-weight:300;">Cloudtub</a> </td> </tr> </table> </td> </tr> </table> <table border="0" width="34" align="left" cellpadding="0" cellspacing="0" class="container560"> <tr> <td height="20" width="34"></td> </tr> </table> <table border="0" align="right" cellpadding="0" cellspacing="0" class="container560"> <tr> <td align="center"> <table border="0" align="center" cellpadding="0" cellspacing="0"> <tr> <td><a style="display: block; width: 34px; border-style: none !important; border: 0 !important;" target="_blank" href="//www.facebook.com/cloudtub"><img editable="true" mc:edit="facebook" style="display: block;" src="http://www.cloudtub.com/coming-soon/cr/facebook.png" alt="facebook" border="0" height="34" width="34" /></a></td> <td>&nbsp;&nbsp;</td> <td><a style="display: block; width: 34px; border-style: none !important; border: 0 !important;" target="_blank" href="//www.twitter.com/cloudtub"><img editable="true" mc:edit="twitter" style="display: block;" src="http://www.cloudtub.com/coming-soon/cr/twitter.png" alt="twitter" border="0" height="34" width="34" /></a></td> <td>&nbsp;&nbsp;</td> <td><a style="display: block; width: 34px; border-style: none !important; border: 0 !important;" target="_blank" href="//plus.google.com/114057120706005228626"><img editable="true" mc:edit="google" style="display: block;" src="http://www.cloudtub.com/coming-soon/cr/google.png" alt="google" border="0" height="34" width="34" /></a></td> </tr> </table> </td> </tr> </table> </td> </tr> </table> </td> </tr> <tr><td height="35"></td></tr> <!-------------- end footer -------------> </table> </td> </tr> <tr> <td align="center"> <table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600"> <tr> <td align="center" style="line-height: 35px;"> <img src="http://www.cloudtub.com/coming-soon/cr/footer-shadow.png" style="display: block; width: 600px; height: 35px;" width="600" height="35" border="0" class="bottom-shadow" /> </td> </tr> </table> </td> </tr> <tr><td height="20"></td></tr> <tr> <td> <table width="600" cellpadding="0" align="center" cellspacing="0" border="0" class="container600"> <tr><td height="30"></td></tr> <tr> <td align="center" mc:edit="copy" style="color: #9da5b0; font-size: 14px; font-family: PT Sans, Arial, sans-serif;" class="unsubscribe"> <multiline> Copyright © Cloudtub 2012-2013. </multiline> </td> </tr> <tr><td height="45"></td></tr> </table> </td> </tr> </table> </body> </html>';

$mail->Subject = 'Test Message From Cloudtub';
$mail->Body    = $body4;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';