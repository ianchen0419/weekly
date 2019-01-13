<?php 
    session_start(); 
    if(isset($_POST['code'])) {  
        if($_POST['code'] == $_SESSION['code']){
            // データは再送信されようとします
            header ('Location: https://weeklycenter.co.jp');
            return;
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Weekly Center</title>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- WCRDS --><!-- WCRDE -->
    <meta content="ウィークリーマンション,東京,マンスリーマンション,埼玉,ウィークリーセンター,Weekly Center" name="keywords">
    <meta content="マンスリーマンション・ウィークリーマンション（東京・埼玉）をお探しの方は【ウィークリーセンター】へ。カバン一つでの入居で、即自炊生活ができちゃうほどの設備と徹底した室内清掃で、いつでもキレイで快適！" name="description">
    <meta content="all" name="Robots">
    <link href="../favicon.png" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700,900" rel="stylesheet">
    <link href="../common/css/plugin.css" rel="stylesheet">
    <link href="../common/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="https://zipcode.global-websystem.net/api/postcode.css" type="text/css" />
    <script src="../common/js/jquery.min.js"></script>
    <script src="../common/js/wc_script.js"></script>
    <link href="//weeklycenter.co.jp/" rel="index" title="If you're looking for short stay apartment in Tokyo and Saitama, Weekly Center will be the best choice for you.">
    <link rel="stylesheet" href="../webchangercmn.css" type="text/css" />
    <script type="text/javascript" src="../wctarget.js"></script>
</head>
<body id="acp-page">

    <div id="header-wrap">
        <div id="header">
            <header>
                <div id="logo">
                    <!-- $$$CMS:共通logotext$$$ -->
                    <p id="logo-text">If you're looking for short stay apartment in Tokyo and Saitama, Weekly Center will be the best choice for you.</p>
                    <!-- $$$CME -->
                    <h1><a href="/en/index.html"><img src="../common/img/logo_en.svg" alt="ウィークリーセンター" width="307" height="61">&nbsp;</a></h1>
                </div>
                <!-- $$$CMS:共通header$$$ -->
                <div id="header-navi">
                    <nav>
                        <ul id="navi-sub">
                            <li><a href="../faq/index.html">Q&A</a></li>
                            <li><a href="../company/index.html" title="About Us">About Us</a></li>
                            <li class="mobile-hide">
                                <div title="language" class="language-button">
                                    <span class="language-text">languages</span>
                                    <span class="arrow-down"></span>
                                    <ul class="drop-panel">
                                        <li class="drop-item">
                                            <a href="../../index.html">日本語</a>
                                        </li>
                                        <li class="drop-item">
                                            <a href="../../zh-tw/index.html">繁體中文</a>
                                        </li>
                                        <li class="drop-item">
                                            <a href="../../zh-cn/index.html">简体中文</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <ul id="navi-main">
                            <li class="nm01"><a href="../tokyo/index.html" title="Tokyo Area">Tokyo Area</a></li>
                            <li class="nm02"><a href="../saitama/index.html" title="Saitama Area">Saitama Area</a></li>
                            <li class="nm03"><a href="../reserve/index.html" title="Reservation">Reservation</a></li>
                            <li class="nm04"><a href="../charge/index.html" title="Accommodation Fee">Accommodation Fee</a></li>
                            <li class="nm05"><a title="Contact Us" href="../inquiry/index.html">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- $$$CME -->
            </header>
            <!-- END:header -->
        </div>
        <!-- END:header-wrap -->
    </div>

    <div id="pagelist-wrap">
        <ol id="pagelist">
            <li><!-- $$$TXS:コメント9$$$ --><a href="../index.html">HOME</a><!-- $$$TXE --></li>
            <li>Contact Form: Weekly Center Ikebukuro</li>
        </ol>
        <!-- END:pagelist-wrap -->
    </div>

    <div id="title-wrap">
        <div><h3>
          <span class="en"><!-- $$$TXS:コメント11$$$ -->Inquiry<!-- $$$TXE --></span>
          <span class="ja">Contact Us</span></h3>
      </div>
      <!-- END:title-wrap -->
  </div>

  <div id="container-wrap">
    <div id="container">
        <main>
            
            <!-- WSC[main]S -->
            <div class="tit-l">
                <h2>Contact Form: Weekly Center Ikebukuro</h2>
            </div>

            

            <div class="containerbox">


                <p class="boxwrap1">
                    <?php
                        if (!empty($_POST['your_submit'])){
                            require_once "../phpmailer/class.phpmailer.php";
                            $_SESSION['code']=$_POST['code'];
                            // 文字の処理
                            $people_name = htmlspecialchars($_POST['mailform1']);
                            $people_phone = htmlspecialchars($_POST['mailform3']);
                            $people_email = htmlspecialchars($_POST['mailform4']);
                            $people_address = htmlspecialchars($_POST['localaddress1']);
                            $people_message = htmlspecialchars($_POST['mailform9']);

                            $mailer = new PHPMailer();
                            $mailer->SMTPSecure = "ssl";
                            $mailer->Host = "smtp.gmail.com";
                            $mailer->Port = 465;
                            $mailer->CharSet = "utf-8";    
                            $mailer->Username = "inquiry.workcapital@gmail.com";       
                            $mailer->Password = "contactwc180623@"; 
                            $mailer->IsSMTP();
                            $mailer->SMTPAuth = true;
                            $mailer->SMTPDebug  = 1;
                            $mailer->Encoding = "base64";
                            $mailer->IsHTML(true); 
                            $mailer->From = "ianchen0419@gmail.com";
                            // $mailer->From 'form_ikebukuro@weeklycenter.co.jp';     
                            $mailer->FromName = "Weekly Center";  
                            $mailer->Subject = "お問合せ_池袋"; 
                            $mailer->Body = 
                                '■お名前'."<br>".$people_name."<br><br>".
                                '■電話番号'."<br>".$people_phone."<br><br>".
                                '■メールアドレス'."<br>".$people_email."<br><br>".
                                '■住所'."<br>".$people_address."<br><br>".
                                '■お問い合せ内容・ご意見'."<br>".nl2br($people_message)."<br><br>";
                            $mailer->AddAddress("ianchen0419@gmail.com"); 
                            // $mailer->AddAddress("form_ikebukuro@weeklycenter.co.jp"); 
                            
                            if($mailer->Send()) {
                                //成功時の記述
                                $to_user = $people_email;
                                $subject_user = 'Thank you for your inquiry.: weeklycenter Ikebukuro'; 
                                $headers_user = "From: ianchen0419@gmail.com";
                                // $headers_user = "From: form_ikebukuro@weeklycenter.co.jp";
                                $content_user = 
                                    'Dear '.$people_name."\n".
                                    'Thank you for your inquiry.'."\n".
                                    '----------------------------------------------------------'."\n\n\n".
                                    '■Name'."\n".$people_name."\n\n".
                                    '■Telephone'."\n".$people_phone."\n\n".
                                    '■E-mail'."\n".$people_email."\n\n".
                                    '■Address'."\n".$people_address."\n\n".
                                    '■Inquiry content / opinion'."\n".$people_message."\n\n".
                                    '----------------------------------------------------------'."\n\n".
                                    '================================='."\n".
                                    'Weekly Center Co., Ltd.'."\n".
                                    '604, 2 Kandakitanorimonocho, Chiyoda-ku, Tokyo, 101-0036, JAPAN'."\n\n".
                                    '■Tokyo Reservation Center TEL.03-5950-1111'."\n".
                                    '■Akihabara direct line TEL.03-5820-0111'."\n".
                                    '■Ochanomizu Sales Office TEL.03-5807-6980'."\n".
                                    '■Saitama Reservation Center TEL.048-651-1111'."\n".
                                    '================================='."\n\n";

                                mail($to_user, $subject_user, $content_user, $headers_user);
                                print_r('Thank you for your inquiry.');
                            } else {
                                //失敗時の記述
                                print_r('送信失敗しました');
                            }
                        }
                                

                    ?>


                

                </p>

                
            </div>

            <!-- WSC[main]E -->
            
        </main>
        <!-- END:container -->
    </div>
    <!-- END:container-wrap -->
</div>

<!-- $$$CMS:共通footer$$$ -->

<footer>
    <div id="footer-wrap">
        <div id="footer">
            <div class="cap-l3">
                <h3>Reservation / Contact number</h3>
            </div>
            <ul>
                <li class="footerlist01">
                    <p class="yoyakuc"><a href="../inquiry/index.html">Tokyo<br>Reservation<br>Center</a></p>
                    <address>03-5950-1111</address>
                </li>
                <li class="footerlist01">
                    <p class="yoyakuc"><a href="../inquiry/index.html">Akihabara<br>direct<br>line</a></p>
                    <address>03-5820-0111</address>
                </li>
                <li class="footerlist01">
                    <p class="yoyakuc"><a href="../inquiry/index.html">Ochanomizu<br>Sales<br>Office</a></p>
                    <address>03-5807-6980</address>
                </li>
                <li class="footerlist02">
                    <p class="yoyakuc"><a href="../inquiry/index.html">Saitama<br>Reservation<br>Center</a></p>
                    <address>048-651-1111</address>
                </li>
            </ul>
            <!-- END:footer -->
        </div>
        <!-- END:footer-wrap -->
    </div>
    <div id="copy-wrap">
        <small>Copyright (c)<a href="../index.html">Weekly Center</a>. All rights reserved.　</small>
        <!-- END:copy-wrap -->
    </div>
</footer>

<div id="page-side-banner">
    <div id="pageside-top">
        <p><a href="#">Page Top</a></p>
    </div>
</div>
<!-- $$$CME -->

<script src="../common/js/modernizr.js"></script>
<script src="../common/js/lightbox.min.js"></script>
<script src="../common/js/TweenMax.min.js"></script>
<script src="../common/js/ScrollToPlugin.min.js"></script>
<script src="../common/js/swiper.min.js"></script>
<script src="../common/js/perfect-scrollbar.min.js"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<script src="https://zipcode.global-websystem.net/api/postcode.js"></script>
<script src="../common/js/script.js"></script>
<!-- WCNAXS -->
<script type="text/javascript" src="../wcax.js"></script>
<script type="text/javascript">
    <!-- 
    AxWrite('400179691001','ax171212222956027');
// -->
</script>
<!-- WCNAXE -->
</body>
</html>