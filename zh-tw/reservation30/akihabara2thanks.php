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
    <script type="text/javascript" src="../wctarget.js"></script>
</head>
<body id="acp-page">

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
            <li>訂房頁面： Weekly Center 秋葉原 Part 2</li>
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
            <div class="tit-l"><!-- $$$LOC -->
                <h2>訂房頁面： Weekly Center 秋葉原 Part 2</h2>
            </div>



            <div class="containerbox"><!-- $$$LOC -->

                <p class="boxwrap1">
                    <?php
                        if (!empty($_POST['your_submit'])){
                            require_once "../phpmailer/class.phpmailer.php";
                            $_SESSION['code']=$_POST['code'];
                            // 文字の処理
                            $resident_name = htmlspecialchars($_POST['resident_name']);
                            $people_number = htmlspecialchars($_POST['people_number']);
                            $room_type = htmlspecialchars($_POST['room_type']);
                            $stay_plan = htmlspecialchars($_POST['plan']);
                            $stay_plan_admin='';
                            if($stay_plan=='短期（7〜29晚）'){
                                $stay_plan_admin='ショート(7～29泊)';
                            }else if($stay_plan=='中期（30〜89晚）'){
                                $stay_plan_admin='ミドル(30～89泊)';
                            }else if($stay_plan=='長期（90晚〜）'){
                                $stay_plan_admin='ロング(90泊～)';
                            }
                            $date_from = htmlspecialchars($_POST['jquery-ui-datepicker-from']);
                            $date_to = htmlspecialchars($_POST['jquery-ui-datepicker-to']);
                            $people_type = htmlspecialchars($_POST['mailform7']);
                            $people_type_user='';
                            if($people_type=='個人'){
                                $people_type_user='個人';
                            }else if($people_type=='法人'){
                                $people_type_user='公司行號';
                            }
                            $people_name = htmlspecialchars($_POST['mailform8']);
                            $people_tel = htmlspecialchars($_POST['mailform10']);
                            $people_email = htmlspecialchars($_POST['mailform11']);
                            $people_country = htmlspecialchars($_POST['country']);
                            $people_address = htmlspecialchars($_POST['localaddress1']);
                            $people_comment = htmlspecialchars($_POST['mailform12']);

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
                            $mailer->SetFrom($people_email, 'Yoyaku');
                            $mailer->Subject = "ご予約_秋葉原 Part2"; 
                            $mailer->Body = 
                                '■建物名'."<br>".$resident_name."<br><br>".
                                '■利用人数'."<br>".$people_number."<br><br>".
                                '■部屋タイプ'."<br>".$room_type."<br><br>".
                                '■プラン'."<br>".$stay_plan_admin."<br><br>".
                                '■利用予定期間:in'."<br>".$date_from."<br><br>".
                                '■利用予定期間:out'."<br>".$date_to."<br><br>".
                                '■お申し込み種別'."<br>".$people_type."<br><br>".
                                '■お申し込み者氏名'."<br>".$people_name."<br><br>".
                                '■電話番号'."<br>".$people_tel."<br><br>".
                                '■メールアドレス'."<br>".$people_email."<br><br>".
                                '■国籍'."<br>".$people_country."<br><br>".
                                '■住所'."<br>".$people_address."<br><br>".
                                '■通信欄その他ご希望・お問合せ'."<br>".nl2br($people_comment)."<br><br>";
                            $mailer->AddAddress("form_akihabara@weeklycenter.co.jp"); 
                            
                            if($mailer->Send()) {
                                //成功時の記述
                                $to_user = $people_email;
                                $subject_user = '謝謝您的詢問：weeklycenter 秋葉原 Part2'; 
                                $headers_user = "From: form_akihabara@weeklycenter.co.jp";
                                $content_user = 
                                    $people_name.' 先生 / 小姐，您好：'."\n\n".
                                    '非常感謝您的預約。'."\n".
                                    '我們將儘速確認目前空房狀況後，主動回信聯絡您。'."\n\n".
                                    '※請注意：本次訂房尚未成立'."\n".
                                    '稍後本公司將回信與您確認訂房內容，方才完成訂房手續。'."\n".
                                    '若您超過2天仍未收到回信，煩請主動來電詢問，謝謝。'."\n".
                                    '----------------------------------------------------------'."\n\n\n".
                                    '■建築物名稱'."\n".$resident_name."\n\n".
                                    '■使用人數'."\n".$people_number."\n\n".
                                    '■房間'."\n".$room_type."\n\n".
                                    '■方案'."\n".$stay_plan."\n\n".
                                    '■預定使用期間: check-in'."\n".$date_from."\n\n".
                                    '■預定使用期間: check-out'."\n".$date_to."\n\n".
                                    '■申請類型'."\n".$people_type_user."\n\n".
                                    '■申請者姓名'."\n".$people_name."\n\n".
                                    '■TEL'."\n".$people_tel."\n\n".
                                    '■E-Mail'."\n".$people_email."\n\n".
                                    '■國籍'."\n".$people_country."\n\n".
                                    '■住址'."\n".$people_address."\n\n".
                                    '■聯絡欄 其他要求/諮詢'."\n".$people_comment."\n\n\n\n".
                                    '----------------------------------------------------------'."\n\n".
                                    '================================='."\n".
                                    '株式会社Weekly Center'."\n".
                                    '〒101-0036'."\n".
                                    '東京都千代田區神田北乗物町2番地 神田乗物町604'."\n\n".
                                    '■東京訂房中心 TEL.03-5950-1111'."\n".
                                    '■秋葉原直通 TEL.03-5820-0111'."\n".
                                    '■埼玉訂房中心 TEL.048-651-1111'."\n".
                                    '================================='."\n\n";

                                mail($to_user, $subject_user, $content_user, $headers_user);
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
    AxWrite('400179691001','c180124112047975');
// -->
</script>
<!-- WCNAXE -->
</body>
</html>