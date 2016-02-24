<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>phpblog</title>
    <link rel="stylesheet" href="../style/<?= $style ?>.css">
    <link rel="stylesheet" href="../style/font-awesome.min.css">
</head>
<body>
<div class="home">
    <div class="header">
        <h1><?= $user['login'];?>'s Blog</h1>
        <a href="<?= SITE_URL ?>?action=profile">Профиль</a>
    </div>
<div class="container">


    <form class='send-message' action="<?= $site_url ?>?action=save" method="post">
        <div class='message_form'>Название Поста</div>
        <input type="text" name="message_title" id="message_title" rows="10"><?= empty($message_ID) ? '' : $messages[0]['message_title'] ?>
        <div class='message_form'>Текст Поста</div>
        <textarea name="message" id="message" rows="10"><?= empty($message_ID) ? '' : $messages[0]['message'] ?></textarea>
        <input type="hidden" name="message_ID" value="<?= $message_ID ?>">
        <input type="submit" name="action" value="Отправить">
        <input type="hidden" name="token" value="<?= $token ?>">
    </form>

<?php if (!empty($messages)): ?>
    <?php foreach ($messages as $message): ?>
        <div class="message">
            <div class='message_title'><?= $message['message_title']; ?></h2></div>
            <div class="message_text"><?= htmlspecialchars($message['message']); ?></div>
            <div class="message_footer">
            <div class="message_login"><?= $message['login']; ?></div>
            <div class="message_time"><?= $message['time']; ?></div>
                <form class='delete' action="<?= $site_url ?>?action=delete" method="post">
                    <input type="hidden" name="message_ID" value="<?= $message['message_ID'] ?>">
                    <label><input type="submit" name="action" value=''>
                    <i class="fa fa-trash-o"></i></label>
                </form>


            </div>
        </div>
        <br/>
    <?php endforeach ?>
<?php endif ?>

    <?php for ($i=1; $i<=$page_count; $i++): ?>
    <a href="<?= $site_url ?>?action=home&page=<?= $i; ?>"><?= $i; ?></a>
    <?php endfor ?>
</div>
</div>

<script src="../js/js.js" type="text/javascript" ></script>

</body>
</html>