<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> </title>
</head>
<?php
/*if ((($_FILES["type"] == "txt")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {*/
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "./homework/" . $_FILES["file"]["name"]);
      echo "提交成功";
      /*}
    }
  }
else
  {
  echo "The format of the file you uploaded is incorrect";
  }*/
?>
<a href="http://h.abplan.top/" target="_self"><input type="button" value="再交一份" /></a>
<body>
</body>
</html>