<?php

function insert_message(\PDO $connection, $message, $user_ID, $message_title)
{
    if (empty($message)) {
        return false;
    }

    $params = [
        'message' => $message,
        'user_ID' => $user_ID,
        'message_title' => $message_title,
    ];
        $sql = 'INSERT INTO `messages` SET `message`=:message, `time`=NOW(), `user_ID`=:user_ID, `message_title`=:message_title';
    $query = $connection->prepare($sql);
    return $query->execute($params);
}



function update_message(\PDO $connection, $message, $message_ID, $message_title)
{
    if (empty($message)) {
        return false;
    }

    $query = $connection->prepare('UPDATE `messages` SET `message`=:message, `message_title`=:message_title WHERE `message_ID`=:message_ID');
    return $query->execute([
        'message' => $message,
        'message_ID' => $message_ID,
        'message_title'=> $message_title,
    ]);
}



function load_messages(\PDO $connection, $message_ID = null, $posts_per_page, $i)
{
    $from=$i*$posts_per_page-$posts_per_page;
    return
    $connection->query("SELECT m.`message_ID`,m.`message_title`,m.`message`,m.`time`,u.`login` FROM `messages` m LEFT JOIN `users` u ON m.`user_ID`=u.`user_ID` ORDER BY m.`time` DESC LIMIT $from, $posts_per_page" )->fetchAll();
}


function delete_messages(\PDO $connection, $message_ID){


    $query=$connection->prepare('DELETE FROM `messages` WHERE `message_ID`=:message_ID');
    return $query->execute([
        'message_ID' => $message_ID,
    ]);
}



function valid_token($token)
{
    return !empty($_SESSION['token']) && $token == $_SESSION['token'];
}




function template($name, array $vars = [])
{
    if (!is_file($name)) {
        throw new exception("Could not load template file {$name}");
    }
    ob_start();
    extract($vars);
    require($name);
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
}


