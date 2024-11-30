<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YouTube Download MP3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    a{
        text-align: center;
        text-decoration: none;
        color: white;
        margin-top: 110px;
    }
    .asd{
        width: 100%;
        background-color: #1E90FF;
        color: white;
        border-radius: 7px;
        height: 50px;
    }
    .container{
        margin-top: 15%;
        padding-right: 10%;
        padding-left: 10%;
    }
    .btn btn-outline-secondary{
        color: red;  
    }
        h1{
            color: #1E90FF;
            text-align: center;
            margin-top: 7%;
        }
    </style>
  </head>
  <body>
      <div class="container">
        <h1>YouTube Download MP3</h1>  
        <br>
        <br>
        <form action="index.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Вставте ссылку" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button name="but" class="btn btn-outline-secondary" type="submit">Отправить</button>
          </div>
        </div>
        </form>
          <?php
          if(isset($_POST['but'])){
          $link = $_POST['name'];
	  $NameLink = "http://example.com/curl.php?url=".$link;
	  $Name = file_get_contents($NameLink);
	  exec("yt-dlp -f 'ba' -x --audio-format mp3 . '$link' .  -o '%(id)s.%(ext)s'");
	  $dir = "/var/www/html/"; 
	  $f = scandir($dir);
	  $path = "/var/www/html/music/".$Name.".mp3";
	      foreach ($f as $file){
	    	if(preg_match('/\.(mp3)/', $file)){

	    		$file = rename($file, $path);

	    	}
	    }
	  $Name = "music/".$Name.".mp3";
          echo "<div class='asd'>";?>
          <h1><a href="<?= $Name?>" download>Скачать файл</a></h1>
          <?php
          echo "</div>";
          }
          ?>
        </div>
    </div>
  </body>
</html>
