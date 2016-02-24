<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>epic blog</title>
    <link rel="stylesheet" href="style/<?= $style ?>.css">
</head>
<body>
<div class="profile">
<div class="header">
    <h1><?= $user['login'];?>'s Blog</h1>
    <a href="<?= SITE_URL ?>?action=home">Домой</a>
</div>
<div class="container">


<form action="<?= $site_url ?>?action=profile" method="post">
    <input type="radio" name="style" value="0" <?= $style == 'white' ? 'checked' : '' ?>>default<br>
    <input type="radio" name="style" value="1" <?= $style == 'black' ? 'checked' : '' ?>>black<br>
    <input type="radio" name="style" value="2" <?= $style == 'blue' ? 'checked' : '' ?>>blue<br>
    <input type="submit" name="action" value="Сохранить">
</form>


</div>

</div>
</body>
</html>