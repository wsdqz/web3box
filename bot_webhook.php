<?php
$botToken = '***';

$chatDb = 'support_chats.json';

$update = json_decode(file_get_contents('php://input'), true);

file_put_contents('debug.log', print_r($update, true), FILE_APPEND);

if (!isset($update['message'])) {
    exit;
}

$message = $update['message'];
$chatId = $message['chat']['id'];
$text = $message['text'] ?? '';

if (file_exists($chatDb)) {
    $chats = json_decode(file_get_contents($chatDb), true);
} else {
    $chats = [];
}

if ($text === '/start') {
    if (!in_array($chatId, $chats)) {
        $chats[] = $chatId;
        file_put_contents($chatDb, json_encode($chats));
    }

    $welcomeMessage = "👋 *Добро пожаловать в бота поддержки Web3Box!*\n\n";
    $welcomeMessage .= "Вы успешно подписались на получение тикетов поддержки от пользователей сайта.\n\n";
    $welcomeMessage .= "Все новые запросы поддержки будут приходить прямо сюда.";

    sendMessage($chatId, $welcomeMessage, $botToken);
}

else if ($text === '/stop') {
    $chats = array_filter($chats, function($id) use ($chatId) {
        return $id !== $chatId;
    });
    file_put_contents($chatDb, json_encode($chats));

    $byeMessage = "❌ Вы отписались от получения тикетов поддержки.\n\n";
    $byeMessage .= "Чтобы подписаться снова, используйте команду /start";

    sendMessage($chatId, $byeMessage, $botToken);
}
else if ($text === '/status') {
    $status = in_array($chatId, $chats) ?
        "✅ Вы подписаны на получение тикетов поддержки." :
        "❌ Вы не подписаны на получение тикетов поддержки.";

    $statusMessage = "*Статус подписки:*\n\n" . $status;
    $statusMessage .= "\n\nВсего подписчиков: " . count($chats);

    sendMessage($chatId, $statusMessage, $botToken);
}
else if ($text === '/help') {
    $helpMessage = "*Доступные команды:*\n\n";
    $helpMessage .= "/start - Подписаться на получение тикетов\n";
    $helpMessage .= "/stop - Отписаться от получения тикетов\n";
    $helpMessage .= "/status - Проверить статус подписки\n";
    $helpMessage .= "/help - Показать это сообщение";

    sendMessage($chatId, $helpMessage, $botToken);
}

function sendMessage($chatId, $text, $botToken) {
    $params = [
        'chat_id' => $chatId,
        'text' => $text,
        'parse_mode' => 'Markdown'
    ];

    $url = "https://api.telegram.org/bot{$botToken}/sendMessage?" . http_build_query($params);
    file_get_contents($url);
}
?>