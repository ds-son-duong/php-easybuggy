<?php
$string = '';

if (isset($_POST['string'])) {
    $string = $_POST['string'];
    $string = strrev($string);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文字列の逆転</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body style="margin-left:20px;margin-right:20px;">
    <div id="MathJax_Message" style="display: none;"></div>
    <table style="width:100%;">
        <tbody>
            <tr>
                <td>
                    <h2><span class="glyphicon glyphicon-globe"></span>&nbsp;文字列の逆転</h2>
                </td>
                <td align="right"><a href="/">メインページへ</a></td>
            </tr>
        </tbody>
    </table>
    <hr style="margin-top:0px">
    <form action="xss.php" method="post">
        文字列を入力すると、文字列が逆転して表示されます。
        <br>
        <br>
        文字列: <input type="text" name="string" size="100" maxlength="100">
        <br>
        <br>
        <input type="submit" value="送信">
        <br>
        <br>
        <?php
            if (empty($string)) {
                echo "文字列を入力して下さい。";
            } else {
                echo "逆転した文字列 : " . $string;
            }
        ?>
        
        <br>
        <br>

        <div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span>&nbsp; 名前に <code>&gt;tpircs/&lt;;)eikooc.tnemucod(trela&gt;tpIrcs&lt;</code> を入力すると、セッションIDが表示されます。</div>
    </form>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</html>