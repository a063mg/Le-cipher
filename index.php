<?php
	include_once("db.php");

    $user = 'null';
    $login = $_POST['Login'];
    $password = $_POST['Password'];

    if (empty($_SESSION['password']) or empty($_SESSION['login'])) {

    	if (empty($login) or empty($password) or (empty($login) and empty($password))) {
    	   header('Location: enter.php');
    	}

    	while($data = mysqli_fetch_array($qr_result)){
    		if ($data['Login'] == $login and $data['Password'] == $password){
        		$_SESSION['password'] = $password;
        		$_SESSION['login'] = $login;
        		$user = $_SESSION['login'];
      		}
    	}

    }
    else{

    	while($data = mysqli_fetch_array($qr_result)){
    		if ($data['Login'] == $_SESSION['login'] and $data['Password'] == $_SESSION['password']){
        		$user = $_SESSION['login'];
      		}
    	}

    }
if ($user == 'null')
{
  header('Location: enter.php?error');
}

mysqli_close($connect_to_db);
?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/tcon.css" />

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

</head>

<body>
 
 <div class="header">
      <div class="menu">
        <button type="button" onclick="ToogleClick();" class="tcon tcon-menu--xcross" aria-label="toggle menu">
          <span class="tcon-menu__lines" aria-hidden="true"></span>
          <span class="tcon-visuallyhidden">toggle menu</span>
        </button>
      </div>

      <div class="logo">
        <a class="header_text">Le cipher</a>
      </div>

      <div class="header_block">
        <span class="login"><?php echo $user;?><br></span><a href="exit.php" class="exit_button">Выйти</a></form>
      </div>
  </div>

  <div class="layer">
      <div class="info_block">
        <p  class="info_paragraph">Инструкция</p>
        <p  class="info_caption">Представляем вам программу для шифровки/расшифровки изображениий:</p>
        <h1 href="" class="info_text"> <a class="capital">Д</a>ля шифровки выберете пункт засшифровать, в первой строке выберите изображение, которые вы зотите зашифровать, и во второй строке придумайте ключевое слово. Внимание! Ключевое слово должно состоять только из латинских букв или цифр. После этого скачайте зашифрованное изображение.</h1>
           <h1 class="info_text"> <a class="capital">Д</a>ля расшифровки выберете пункт расшифровать, в первой строке выберете уже зашифрованный файл, и во второй строке впишите ключ, которым вы шифровали это изображение. Внимание! Ключ чувствителен к регистру. После этого скачайте уже расшифрованное изображение.</h1>
      </div>
  </div>

  <div class="form">
    <form action=upload.php method=post enctype=multipart/form-data>
      <div class="box">
        <input type="file" name="imgfile" id="file-4" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" multiple style="display: none;"/>
        <label id="label" for="file-4"><span>Выберите файл&hellip;</span></label>
      </div>

      <input type="" class="key_input" required id="key" required pattern="[A-z0-9/+]{0,128}" title="Ваш ключ должен состоять только из любых латинских букв, цифр, а также знаков '/' и '+'..." placeholder="Выберите ключ..." name="key">

      <div class="checkbox_block">
        <label class="checkbox1"><input type="radio" checked name="encrypt" id="encrypt" value="encrypt"/>Зашивровать</label> <label class="checkbox2">Расшифровать<input id="decrypt" type="radio" value="decrypt" name="encrypt"/></label>
      </div>

      <button id="submit" class="submit_button">Отправить</button>

    </form>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="../../js/custom-file-input.js"></script>
<script src="js/tcon.js"></script>


  
<script type="text/javascript">
$(document).ready(function() {
    $('#submit').bind("click",function() 
    { 
        var imgVal = $('#file-4').val(); 
        if(imgVal=='') 
        { 
            label.querySelector( 'span' ).innerHTML = 'Неверный файл...';
            return false;
        } 


    }); 
});
</script>  

<script>transformicons.add('.tcon')</script>

</body>
</html>