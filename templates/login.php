<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>epic blog</title>
    <link rel="stylesheet" href="../style/<?= $style ?>.css">
</head>
<body>
<video autoplay loop muted class="bgvideo" id="bgvideo">
    <source src="../style/login_bg.mp4" type="video/mp4">
</video>
<div class="container">
<div class="login">
    <img src="../style/hashtag.jpg" alt="">
<form action="<?= SITE_URL ?>?action=login" method="post">
    <input type="text" name="login" value="<?= $login ?>" placeholder="login" title="login">
    <input type="password" name="password" placeholder="password" title="password">
    <input type="submit" name="action" value="Sign In">
    <input type="hidden" name="token" value="<?= $token ?>">
</form>
</div>
</div>
</body>
</html>