<html>

<head>
    <title>管理者ログインページ</title>
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
                    <h2><span class="glyphicon glyphicon-globe"></span>&nbsp;管理者ログインページ</h2>
                </td>
                <td align="right"><a href="/">メインページへ</a></td>
            </tr>
        </tbody>
    </table>
    <hr style="margin-top:0px">
    <p>ここから先は管理者権限が必要です。ユーザーIDとパスワードを入力して下さい。</p>
    <form method="POST" action="ldap-injection.php">
        <table width="400px" height="150px">
            <tbody>
                <tr>
                    <td>ユーザーID :&nbsp;</td>
                    <td><input type="text" name="userid" size="20"></td>
                </tr>
                <tr>
                    <td>パスワード :&nbsp;</td>
                    <td><input type="password" name="password" size="20" autocomplete="off"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="ログイン"></td>
                </tr>
            </tbody>
        </table>
        <?php
            // Ldapサーバー
            // $ldap_server = "ldap://localhost:389";
            // $ldap_server = "https://ldap.forumsys.com";
            
            // $ldap_port = '389';
            // // Ldapユーザー
            // $ldap_user = "ldapuser";
            
            // // ベースのDN
            // $base_dn = "OU=tset,DC=example,DC=com"; // DN
            
            // // $username = $_POST['username'];
            // // $password = $_POST['password'];

            // // アカウント
            // if (isset($_POST['userid']) && isset($_POST['password'])) {
            //     $user_id    = $_POST['userid'];   // ユーザ名
            //     $user_password  = $_POST['password']; // パスワード
                
            //     // コネクション接続
            //     $ldapconn = ldap_connect($ldap_server, $ldap_port);
            //     ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
                
            //     if(!$ldapconn){
            //         echo "コネクション接続できません";
            //         exit;
            //     }
            //     else{
            //         // バインド接続
            //         $ldapbind = ldap_bind($ldapconn, "CN=" . $ldap_user . "," . $base_dn, "password");
                    
            //         if(!$ldapbind){
            //             //コネクション切断
            //             ldap_unbind($ldapconn);
                
            //             echo "バインド接続できません";
            //             exit;
            //         }
            //     }
                
            //     if($ldapconn!==false){
                
            //         // ユーザの存在確認
            //         $user_filter = "(sAMAccountName=" . $user_id . ")";
            //         $ldapres = ldap_search($ldapconn, $base_dn, $user_filter, array("distinguishedName"));
                
            //         if(ldap_count_entries($ldapconn, $ldapres)==0){
            //             echo "ユーザが存在しない";
            //         }
            //         else{
            //             // DN名の取得
            //             $ldapentry = ldap_first_entry($ldapconn, $ldapres);
            //             $distinguishedNameArr = ldap_get_values($ldapconn, $ldapentry, "distinguishedName");
            //             $distinguishedName = $distinguishedNameArr[0];
                
            //             // バインド接続
            //             $ldapbind_user = ldap_bind($ldapconn2, $distinguishedName, $user_password);
                
            //             if(!$ldapbind_user){
            //                 echo "認証失敗";
            //             }
            //             else{
            //                 echo "認証成功";
            //             }
            //         }
                
            //         //コネクション切断
            //         ldap_unbind($ldapconn);
            //     }
            // }
                $username = $_POST['userid'];
                $password = $_POST['password'];

                $ldap_server = "ldap://localhost:389";
    
                // Ldapユーザー
                $ldap_user = "ldapuser";

                $ldapconfig['host'] = 'ldap://localhost';//CHANGE THIS TO THE CORRECT LDAP SERVER
                $ldapconfig['port'] = '389';
                $ldapconfig['basedn'] = 'dc=localhost,dc=com';//CHANGE THIS TO THE CORRECT BASE DN
                $ldapconfig['usersdn'] = 'cn=users';//CHANGE THIS TO THE CORRECT USER OU/CN
                $ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);

                ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
                ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
                ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 10);

                $dn="uid=".$username.",".$ldapconfig['usersdn'].",".$ldapconfig['basedn'];
                if(isset($_POST['username'])){
                if ($bind=ldap_bind($ds, $dn, $password)) {
                    header("location: http://unitop.vn");
                echo("Login correct");//REPLACE THIS WITH THE CORRECT FUNCTION LIKE A REDIRECT;
                } else {

                echo "Login Failed: Please check your username or password";
                }
                }
        ?>
        <div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span>&nbsp; <code>admin</code> と <code>password</code>を入力すると、ログインできます。<code>*)(|(objectClass=*</code>、<code>aaaaaaa)</code> を入力すると、認証を迂回してログインできます。</div>
    </form>
</body>

</html>