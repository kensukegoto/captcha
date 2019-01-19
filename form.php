<?php
session_start();

$input = isset($_GET['input'])?$_GET['input']:"";

$captcha = "<img src='genImage.php'>";
$msg = "５文字のひらがなを入力してください。";
$form = <<< END_OF_FORM
<form method="GET">
  <input type="text" name="input">
  <input type="submit" value="OK">
</form>
END_OF_FORM;

if(isset($_SESSION["CAPTCHA"]) && $_SESSION["CAPTCHA"]===$input){
  $msg = "<h3>正解です！</h3><a href='form.php'>もう一度試す</a>";
  $captcha = $form = "-"; // CAPTCHAやフォームを表示しない
}else{
  if($input!=""){
    $msg = "間違い！もう一度、{$msg}";
  }
}

echo <<< END_OF_HTML
<html><head><meta charset="UTF-8"></head>
<body>
  <h1>CAPTCHAのテスト</h1>
  <p>$captcha</p>
  <p>$msg</p>
  <p>$form</p>
END_OF_HTML;
