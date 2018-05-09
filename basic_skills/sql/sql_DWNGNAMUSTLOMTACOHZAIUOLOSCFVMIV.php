<?php 
ob_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>登陆伪造</title>
    <!-- 代码来源：作业-张栩豪 version:1.2 -->
  </head>
  <style>
  td,th{border:solid 1px white; padding:0; background:#e6e6e6;}
  table{border-collapse:collapse;}
  .box{background:#cccccc;}
  .box1{text-align:right; font-weight:bold;}
  </style>
  <body>
    <div>
    <form action="#" method="post">
      <table style="height:300px;">
      <tbody>
      <tr>
      <th style="background:#cccccc; font-size:30px; text-align:center;" colspan="2" >用户登录</th>
      </tr>
      <tr>
      <td class="box1">用户名：</td>
      <td>
      <input type="text" name="username" value="" placeholder="请输入用户名...." style="height:30px;">
      </td>
      </tr>
      <tr>
      <td class="box1">密码：</td>
      <td>
      <input type="password" name="password" value="" placeholder="请输入密码...." style="height:30px;">
      </td>
      </tr>
      <tr>
      <td class="box1">登录情况：</td>
      <td>
        <?php
        header('content-type:text/html;charset=utf-8');
        error_reporting(0);
        $user=$_POST['username'];
        $pass=md5($_POST['password']);
        $link=mysql_connect('sqld.duapp.com:4050','780480a5d2194c5d9ac6f80ca91fdb07','be8c2e3b960f461284f4d1d77d65c63f');
        if(!$link)
        {
          echo '数据库连接失败';
        }
        mysql_select_db('xVHvzclXJLXShtSJEzYP');
        $sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
        $a=mysql_query($sql,$link);
        $b=mysql_fetch_array($a);
        if($b) {
          if ($b['username'] === 'root') {
            echo 'HFCTF{******}';
          }else{
            echo header('Location: ./PXWEFKMYXXVAQBFGPYRFUSSKDJJNILRB.html');
          }
        }
        else{
          if($link)
          {
            if($user==NULL){
              echo '用户名不能为空';
            }
            elseif($pass==md5(null))
            {
              echo '密码不能为空';
            }
            else{
              echo '失败';
            }
          }
        }
        mysql_close($link);
        ?>
      </td>
      </tr>
      <tr>
      <td class="box1">提示：</td>
      <td>
        <br/>请以用户root登陆。（或许先试试上一题的方法？）
      </td>
      </tr>
      <tr>
      <td class="box1">当前SQL：</td>
      <td>
        <?php echo $sql; ?>
      </td>
      </tr>
      <tr>
      <td class="box" colspan="2">
      <div style="text-align:center; margin:0px auto">
      <input type="submit" name="" value="提交"/>
      </div>
      </td>
      </tr>
  </body>
</html>
<?php
ob_end_flush();
?>