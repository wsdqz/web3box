<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['name']) || !isset($data['telegram']) || !isset($data['message'])) {
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit;
}

$botToken = '***';

$chatDb = 'support_chats.json';

$message = "📩 *Новый тикет поддержки!*\n\n";
$message .= "👤 *Имя:* " . $data['name'] . "\n";
$message .= "📱 *Telegram:* " . $data['telegram'] . "\n";
$message .= "📝 *Сообщение:* " . $data['message'] . "\n";
$message .= "\n🕒 " . date('d.m.Y H:i:s');

$params = [
    'parse_mode' => 'Markdown',
    'text' => $message
];

if (file_exists($chatDb)) {
    $chats = json_decode(file_get_contents($chatDb), true);
} else {
    $chats = [];
}

if (empty($chats)) {
    echo json_encode(['success' => false, 'message' => 'No recipients configured']);
    exit;
}

$success = false;
foreach ($chats as $chatId) {
    $params['chat_id'] = $chatId;
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage?" . http_build_query($params);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $responseData = json_decode($response, true);
    if (isset($responseData['ok']) && $responseData['ok'] === true) {
        $success = true;
    }
}

if ($success) {
    echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to send message']);
}
?>