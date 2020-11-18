<html>

<head>
    <title>暗証番号検索</title>
    <link rel="icon" type="image/vnd.microsoft.icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" integrity="sha384-3+mjTIH6k3li4tycpEniAI83863YpLyJGB/hdI15inFZcAQK3IeMdXSgnoPkTzHn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_CHTML" integrity="sha384-crwIf/BuaWM9rM65iM+dWFldgQ1Un8jWZMuh3puxb8TOY9+linwLoI7ZHZT+aekW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body style="margin-left:20px;margin-right:20px;">
    <div id="MathJax_Message" style="display: none;"></div>
    <table style="width:100%;">
        <tbody>
            <tr>
                <td>
                    <h2><span class="glyphicon glyphicon-globe"></span>&nbsp;暗証番号検索</h2>
                </td>
                <td align="right"><a href="/">メインページへ</a></td>
            </tr>
        </tbody>
    </table>
    <hr style="margin-top:0px">
    <form action="sql-injection.php" method="post">名前とパスワードを入力すると、暗証番号が表示されます。<br><br>名前: <input type="text" name="name" size="20" maxlength="20">&nbsp;&nbsp;パスワード: <input type="password" name="password" size="20" maxlength="20" autocomplete="off"><br><br><input type="submit" value="送信"><br><br>名前とパスワードを入力して下さい。<br><br>
    
        <?php
            $rowsTable = [];
            $count = 0;

            if (isset($_POST['name']) && isset($_POST['password']) && strlen($_POST['password']) >= 8) {
                $servername = "localhost";
                $database = "test";
                $username = "root";
                $password = "";
                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $database);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "SELECT * FROM users WHERE is_public = 1 AND name = '".$_POST["name"]."' AND password = '".$_POST["password"]."'";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                $i = 0;

                if ($count > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $rowsTable[$i] = $row;
                        $i++;
                    }
                }

                mysqli_close($conn);
            }
        ?>

        <table class="table table-striped table-bordered table-hover" style="font-size:small; <?php if ($count == 0) echo "display: none;"; else echo "display:block;"?>"><tbody><tr><th>名前</th><th>暗証番号</th></tr><?php foreach ($rowsTable as $tr) echo "<tr><td>" . $tr['name'] . "</td><td>" . $tr['secret'] . "</td></tr>"?></tbody></table>

        <div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span>&nbsp; <code>Mark</code> と <code>password</code>を入力すると、暗証番号が表示されます。パスワードに <code>' OR '1'='1</code> を入力すると、他のユーザーの情報が表示できます。</div>
    </form>
</body>

</html>