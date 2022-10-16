<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PORTFOLIO</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
  <div class="header">
    <div class="header-left"></div>
    <div class="header-right">
      <ul>
        <li class="selected">掲示板</li>
      </ul>
    </div>
  </div>

  <div class="main">
    <div class="thanks-message">入力頂きありがとうございます。</div>
    <div class="display-contact">
      <div class="form-title">入力内容</div>

      <div class="form-item">■ お名前</div>
      <?php echo $_POST['name']; ?>

      <div class="form-item">■ プログラミング言語</div>
      <!-- この下でcategoryを受け取りechoしましょう -->
      <?php echo $_POST['contents']; ?>

            <div class="form-item">■ コメント</div>
            <?php echo $_POST['body']; ?><br><br>

            <button onclick="location.href='index.php'">戻る</button>
    </div>
  </div>

  <?php
$id = null;
$name = $_POST["name"];
$contents = $_POST["contents"];
date_default_timezone_set('Asia/Tokyo');
$created_at = date("Y-m-d H:i:s");
//DB接続情報を設定します。
$pdo = new PDO(
    "mysql:dbname=sample;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
);
//ここで「DB接続NG」だった場合、接続情報に誤りがあります。
if ($pdo) {
    echo "";
} else {
    echo "";
}
//SQLを実行。
$regist = $pdo->prepare("INSERT INTO post(id, name, contents, created_at) VALUES (:id,:name,:contents,:created_at)");
$regist->bindParam(":id", $id);
$regist->bindParam(":name", $name);
$regist->bindParam(":contents", $contents);
$regist->bindParam(":created_at", $created_at);
$regist->execute();
//ここで「登録失敗」だった場合、SQL文に誤りがあります。
if ($regist) {
    echo "";
} else {
    echo "";
}
?>
<!-- 追記ここまで -->   

    
  </div>
</body>
</html>