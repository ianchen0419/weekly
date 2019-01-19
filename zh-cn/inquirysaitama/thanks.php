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
    <link href="//weeklycenter.co.jp/" rel="index" title="东京・埼玉短租公寓请检索【Weekly Center】">
    

    <link rel="stylesheet" href="../webchangercmn.css" type="text/css" />
    <script type="text/javascript" src="../wctarget.js"></script>
</head>
<body id="acp-page">

    <div id="header-wrap">
        <div id="header">
            <header>
                <div id="logo">
                    <!-- $$$CMS:共通logotext$$$ -->
                    <p id="logo-text">东京・埼玉短租公寓请检索【Weekly Center】</p>
                    <!-- $$$CME -->
                    <h1><a href="/zh-cn/index.html"><img src="../common/img/logo_en.svg" alt="ウィークリーセンター" width="307" height="61">&nbsp;</a></h1>
                </div>
                <!-- $$$CMS:共通header$$$ -->
                <div id="header-navi">
                    <nav>
                        <ul id="navi-sub">
                            <li><a href="../faq/index.html">常见问题</a></li>
                            <li><a href="../company/index.html" title="公司介绍">公司介绍</a></li>
                            <li class="mobile-hide">
                                <div title="language" class="language-button">
                                    <span class="language-text">languages</span>
                                    <span class="arrow-down"></span>
                                    <ul class="drop-panel">
                                        <li class="drop-item">
                                            <a href="../../index.html">日本語</a>
                                        </li>
                                        <li class="drop-item">
                                            <a href="../../en/index.html">English</a>
                                        </li>
                                        <li class="drop-item">
                                            <a href="../../zh-tw/index.html">繁體中文</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <ul id="navi-main">
                            <li class="nm01"><a href="../tokyo/index.html" title="东京地区一覧表">东京地区一覧表</a></li>
                            <li class="nm02"><a href="../saitama/index.html" title="埼玉地区一覧表">埼玉地区一覧表</a></li>
                            <li class="nm03"><a href="../reserve/index.html" title="订房">订房</a></li>
                            <li class="nm04"><a href="../charge/index.html" title="费用说明">费用说明</a></li>
                            <li class="nm05"><a title="联络我们" href="../inquiry/index.html">联络我们</a></li>
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
            <li>与我们联络：Weekly Center 埼玉</li>
        </ol>
        <!-- END:pagelist-wrap -->
    </div>

    <div id="title-wrap">
        <div><h3>
          <span class="en"><!-- $$$TXS:コメント11$$$ -->Inquiry<!-- $$$TXE --></span>
          <span class="ja">联络我们</span></h3>
      </div>
      <!-- END:title-wrap -->
  </div>

  <div id="container-wrap">
    <div id="container">
        <main>
            
            <!-- WSC[main]S -->
            <div class="tit-l">
                <h2>与我们联络：Weekly Center 埼玉</h2>
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
                            $mailer->From 'form_saitama@weeklycenter.co.jp';     
                            $mailer->FromName = "Weekly Center";  
                            $mailer->Subject = "お問合せ_埼玉"; 
                            $mailer->Body = 
                                '■お名前'."<br>".$people_name."<br><br>".
                                '■電話番号'."<br>".$people_phone."<br><br>".
                                '■メールアドレス'."<br>".$people_email."<br><br>".
                                '■住所'."<br>".$people_address."<br><br>".
                                '■お問い合せ内容・ご意見'."<br>".nl2br($people_message)."<br><br>";
                            $mailer->AddAddress("form_saitama@weeklycenter.co.jp"); 
                            
                            if($mailer->Send()) {
                                //成功時の記述
                                $to_user = $people_email;
                                $subject_user = '谢谢您的询问：weeklycenter 埼玉'; 
                                $headers_user = "From: form_saitama@weeklycenter.co.jp";
                                $content_user = 
                                    'Dear '.$people_name."\n".
                                    '谢谢您的询问。'."\n".
                                    '----------------------------------------------------------'."\n\n\n".
                                    '■姓名'."\n".$people_name."\n\n".
                                    '■电话'."\n".$people_phone."\n\n".
                                    '■E-mail'."\n".$people_email."\n\n".
                                    '■住址'."\n".$people_address."\n\n".
                                    '■询问内容及意见'."\n".$people_message."\n\n".
                                    '----------------------------------------------------------'."\n\n".
                                    '================================='."\n".
                                    '株式会社Weekly Center'."\n".
                                    '〒101-0036'."\n".
                                    '东京都千代田区神田北乗物町2番地 神田乗物町604'."\n\n".
                                    '■东京订房中心 TEL.03-5950-1111'."\n".
                                    '■秋叶原直通 TEL.03-5820-0111'."\n".
                                    '■御茶水营业所 TEL.03-5807-6980'."\n".
                                    '■埼玉订房中心 TEL.048-651-1111'."\n".
                                    '================================='."\n\n";

                                mail($to_user, $subject_user, $content_user, $headers_user);
                                print_r('谢谢您的询问');
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
                <h3>订房电话</h3>
            </div>
            <ul>
                <li class="footerlist01">
                    <p class="yoyakuc"><a href="../inquiry/index.html">东京订房中心</a></p>
                    <address>03-5950-1111</address>
                </li>
                <li class="footerlist01">
                    <p class="yoyakuc"><a href="../inquiry/index.html">秋叶原直通</a></p>
                    <address>03-5820-0111</address>
                </li>
                <li class="footerlist01">
                    <p class="yoyakuc"><a href="../inquiry/index.html">御茶水营业所</a></p>
                    <address>03-5807-6980</address>
                </li>
                <li class="footerlist02">
                    <p class="yoyakuc"><a href="../inquiry/index.html">埼玉订房中心</a></p>
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
    AxWrite('400179691001','ax171212222956847');
// -->
</script>
<!-- WCNAXE -->
</body>
</html>