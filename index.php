<?php

$messege_array = array();
$pdo = null;
$stmt = null;
$error_messege = array();

try {
    $pdo = new PDO('mysql:host=localhost;dbname=linedummy',"root", "12password34");
} catch (PDOException $e){
    $error_messege[] = $e -> getMessege();
}

if(empty($error_message)){
    $postDate = date("Y-m-d H:i:s");
        $stmt = $pdo -> prepare("INSERT INTO linetable (`messegeArea`,`datetime`) VALUES (':messegeArea',':dateTime');");
        $stmt -> bindParam(':messegeArea', $_POST["messegeArea"],PDO::PARAM_STR);
        
        

}

//DBから取得

$sql = "SELECT messegeArea FROM linetable";
$messege_array = $pdo -> query($sql);

//接続を閉じる
$pdo = null;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>LINE</title>
</head>
<body>
    <header>
        <div class="header_top"></div>
        <div class="header_name">LINE</div>
    </header>

    <?php foreach($messege_array as $messegeArea) : ?>
        <div class="output_wrapper">
            <div name="output_wrapper" style="background-color: white; padding: 10px; margin-bottom: 10px; border: 1px solid #333333; border-radius: 10px;">
                <p><?php echo $_POST["messegeArea"];?></p>
            </div>
        </div>
    <?php endforeach;?>


    <form class="input-wrapper" method="post">
        <section class="messege">
            <textarea name="messegeArea" id="messegeArea" value="" cols="30" rows="2"></textarea>
            <input type="submit" name="messegeSend" class="messegeSend" value="送る">
        </section>
    </form>
    
</body>
</html>
