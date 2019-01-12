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
    <script src="../common/js/jquery.min.js"></script>
    <script src="../common/js/wc_script.js"></script>
    <link href="//weeklycenter.co.jp/" rel="index" title="東京・埼玉短租公寓請檢索【Weekly Center】">
    

    <link rel="stylesheet" href="../webchangercmn.css" type="text/css" />
    <link rel="stylesheet" href="thankswebchanger.css" type="text/css" />
    <script type="text/javascript" src="../wctarget.js"></script>
</head>
<body id="acp-page" onbeforeunload="location.href='location.href='../index.html''">

    <div id="header-wrap">
        <div id="header">
            <header>
                <div id="logo">
                    <!-- $$$CMS:共通logotext$$$ -->
                    <p id="logo-text">東京・埼玉短租公寓請檢索【Weekly Center】</p>
                    <!-- $$$CME -->
                    <h1><a href="/zh-tw/index.html"><img src="../common/img/logo_en.svg" alt="ウィークリーセンター" width="307" height="61">&nbsp;</a></h1>
                </div>
                <!-- $$$CMS:共通header$$$ -->
                <div id="header-navi">
                    <nav>
                        <ul id="navi-sub">
                            <li><a href="../faq/index.html">常見問題</a></li>
                            <li><a href="../company/index.html" title="公司介紹">公司介紹</a></li>
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
                                            <a href="../../zh-cn/index.html">简体中文</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <ul id="navi-main">
                            <li class="nm01"><a href="../tokyo/index.html" title="東京地區一覧表">東京地區一覧表</a></li>
                            <li class="nm02"><a href="../saitama/index.html" title="埼玉地區一覧表">埼玉地區一覧表</a></li>
                            <li class="nm03"><a href="../reserve/index.html" title="訂房">訂房</a></li>
                            <li class="nm04"><a href="../charge/index.html" title="費用說明">費用說明</a></li>
                            <li class="nm05"><a title="聯絡我們" href="../inquiry/index.html">聯絡我們</a></li>
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
            <li>訂房頁面： Weekly Center 池袋</li>
        </ol>
        <!-- END:pagelist-wrap -->
    </div>

    <div id="title-wrap">
        <div><h3>
          <span class="en"><!-- $$$TXS:コメント11$$$ -->RESERVE<!-- $$$TXE --></span>
          <span class="ja">訂房頁面</span></h3>
      </div>
      <!-- END:title-wrap -->
  </div>

  <div id="container-wrap">
    <div id="container">
        <main>

            <!-- WSC[main]S -->
            <div class="tit-l">
                <h2>訂房頁面： Weekly Center 池袋</h2>
            </div>



            <div class="containerbox">

                <p class="boxwrap1">
                    <?php
                        if (!empty($_POST['your_submit']) && $code==''){
                            require_once "../phpmailer/class.phpmailer.php";
                            // 文字の処理
                            $_SESSION['code']=$_POST['code'];
                            $resident_name = htmlspecialchars($_POST['resident_name']);
                            $people_number = htmlspecialchars($_POST['people_number']);
                            $room_type = htmlspecialchars($_POST['room_type']);
                            $room_plan = htmlspecialchars($_POST['plan']);
                            $date_from = htmlspecialchars($_POST['jquery-ui-datepicker-from']);
                            $date_to = htmlspecialchars($_POST['jquery-ui-datepicker-to']);
                            $people_type = htmlspecialchars($_POST['mailform7']);
                            $people_name = htmlspecialchars($_POST['mailform8']);
                            $people_tel = htmlspecialchars($_POST['mailform10']);
                            $people_email = htmlspecialchars($_POST['mailform11']);
                            $people_country = htmlspecialchars($_POST['country']);
                            $people_address = htmlspecialchars($_POST['localaddress1']);
                            $people_comment = nl2br(htmlspecialchars($_POST['mailform12']));
                            $people_comment = nl2br(htmlspecialchars($_POST['mailform12']));

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
                            $mailer->From 'form_ikebukuro@weeklycenter.co.jp';     
                            $mailer->FromName = "Weekly Center";  
                            $mailer->Subject = "ご予約_池袋"; 
                            $mailer->Body = 
                                '■建物名'."<br>".$resident_name."<br><br>".
                                '■利用人数'."<br>".$people_number."<br><br>".
                                '■部屋タイプ'."<br>".$room_type."<br><br>".
                                '■プラン'."<br>".$room_type."<br><br>".
                                '■利用予定期間:in'."<br>".$date_from."<br><br>".
                                '■利用予定期間:out'."<br>".$date_to."<br><br>".
                                '■お申し込み種別'."<br>".$people_type."<br><br>".
                                '■お申し込み者氏名'."<br>".$people_name."<br><br>".
                                '■電話番号'."<br>".$people_tel."<br><br>".
                                '■メールアドレス'."<br>".$people_email."<br><br>".
                                '■国籍'."<br>".$people_country."<br><br>".
                                '■住所'."<br>".$people_address."<br><br>".
                                '■通信欄その他ご希望・お問合せ'."<br>".$people_comment."<br><br>";
                            $mailer->AddAddress("form_ikebukuro@weeklycenter.co.jp"); 
                            
                            if($mailer->Send()) {
                                //成功時の記述
                                $mailer->From = $people_email;
                                $mailer->FromName = "Weekly Center";  
                                $mailer->Subject = "謝謝您的詢問：weeklycenter 池袋"; 
                                $mailer->Body = 
                                    'Dear '.$people_name."<br>".
                                    '謝謝您的詢問。'."<br>".
                                    '----------------------------------------------------------'."<br><br><br>".
                                    '■建築物名稱'."<br>".$resident_name."<br><br>".
                                    '■使用人數'."<br>".$people_number."<br><br>".
                                    '■房間'."<br>".$room_type."<br><br>".
                                    '■方案'."<br>".$room_type."<br><br>".
                                    '■預定使用期間: check-in'."<br>".$date_from."<br><br>".
                                    '■預定使用期間: check-out'."<br>".$date_to."<br><br>".
                                    '■申請類型'."<br>".$people_type."<br><br>".
                                    '■申請者姓名'."<br>".$people_name."<br><br>".
                                    '■TEL'."<br>".$people_tel."<br><br>".
                                    '■E-Mail'."<br>".$people_email."<br><br>".
                                    '■國籍'."<br>".$people_country."<br><br>".
                                    '■住址'."<br>".$people_address."<br><br>".
                                    '■聯絡欄 其他要求/諮詢'."<br>".$people_comment."<br><br><br><br>".
                                    '----------------------------------------------------------'."<br><br>".
                                    '================================='."<br>".
                                    '株式会社Weekly Center'."<br>".
                                    '〒101-0036'."<br>".
                                    '東京都千代田區神田北乗物町2番地 神田乗物町604'."<br><br>".
                                    '■東京訂房中心 TEL.03-5950-1111'."<br>".
                                    '■秋葉原直通 TEL.03-5820-0111'."<br>".
                                    '■御茶水營業所 TEL.03-5807-6980'."<br>".
                                    '■埼玉訂房中心 TEL.048-651-1111'."<br>".
                                    '================================='."<br><br>";

                                    $mailer->AddAddress($people_email);
                                    $mailer->Send();

                                    $code='mail sent';


                                    print_r('謝謝您的詢問');
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
                <h3>訂房電話</h3>
            </div>
            <ul>
                <li class="footerlist01">
                    <p class="yoyakuc"><a href="../inquiry/index.html">東京訂房中心</a></p>
                    <address>03-5950-1111</address>
                </li>
                <li class="footerlist01">
                    <p class="yoyakuc"><a href="../inquiry/index.html">秋葉原直通</a></p>
                    <address>03-5820-0111</address>
                </li>
                <li class="footerlist01">
                    <p class="yoyakuc"><a href="../inquiry/index.html">御茶水營業所</a></p>
                    <address>03-5807-6980</address>
                </li>
                <li class="footerlist02">
                    <p class="yoyakuc"><a href="../inquiry/index.html">埼玉訂房中心</a></p>
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
<script src="../common/js/script.js"></script>
<!-- WCNAXS -->
<script type="text/javascript" src="../wcax.js"></script>
<script type="text/javascript">
    <!-- 
    AxWrite('400179691001','ax171212222958192');
// -->
</script>
<!-- WCNAXE -->
</body>
</html>