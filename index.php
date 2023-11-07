<?php
    include('sql.php');
    $sql = "select * from bbsx_class;";
    $result = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $webname; ?></title>
        <link rel="shortcut icon" href="icon.png" type="image/x-icon" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="static/css/2.12.css?version=10.24">
        <script type="text/javascript" src="static/js/font.js"></script>
    </head>
    
    <body>
        <div style="
                margin: 0 auto;
                text-align: right;
                font-size: 16px;"><a onclick="zh_tran('t');">繁体字</a> <a onclick="zh_tran('s');">简体字</a></div>
        <div style="margin: 0 auto;text-align: center;"><h1><?php echo $webname; ?></h1></div>
        <table style="margin: 0 auto; margin-top: 3px;" width="800">
            <tr>
                <td colspan="3">论坛无需注册即可发言～仅支持PC端进行交流。</td>
            </tr>
            <tr>
                <th bgcolor="#FFCC99" bordercolor="#FFFFFF" width="200">版块</th>
                <th bgcolor="#FFCC99">版块概述&版规</th>
                <th bgcolor="#FFCC99">版主</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td bgcolor="#FFCC99" bordercolor="#FFFFFF" height="80" class="index_td">
                        <a href="board.php?board=<?php echo $row['board']; ?>"><?php echo $row['class']; ?></a>
                        <?php if (empty($row['status'])) { ?>
                                <a title="由于不可抗力因素或者版主申请关闭了该版块，内容也将不可见。"><font color="#C0C0C0">【版块关闭】</font></a>
                        <?php }else{ echo ""; } ?>
                    </td>
                    <td bgcolor="#FFCC99" class="index_td"><font color="#909090" size="-1"><?php echo strip_tags(nl2br($row['outline'])) ?></font></td>
                    <td bgcolor="#FFCC99" class="index_td"><?php echo $row['admin']; ?></td>
                </tr>
            <?php }?>
        </table>
        <p style="text-align: center;"><font color="#b4b4b4" size="-1">最后生成于<?php echo date("Y-m-d H:i:s") ?> | 加载数据库、版块、信息等共用时<?php $load = microtime();print (number_format($load,2));?>秒</font></p>
        <p style="margin-bottom: 24px; text-align: center;">&copy; 2022 - <?php echo date('Y'); ?> <?php echo $webname; ?> All rights reserved.</p>
    </body>
</html>
