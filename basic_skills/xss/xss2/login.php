<?php
if (isset($_POST['type'])) {
  switch ($_POST['type']) {
    case 'login': 
      if ($_POST['username'] == 'admin') {
        if ($_POST['password'] == 'qwertyuiop') {
          setcookie('token',md5('iamadmin'),time()+60*60);
          echo '欢迎回来Admin';
        } else {
          echo '密码不正确';
        }
      }
      else{
        setcookie('token',md5(time()),time()+60*60);
        echo '欢迎回来';
      }
      break;
    
    default:
      echo '请先登录';
      break;
  }
}

?>