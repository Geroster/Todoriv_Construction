<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $telegram_bot_token = "YOUR_BOT_TOKEN";
    $chat_id = "YOUR_CHAT_ID";
    
    $text = "New Contact Form Submission\n\n";
    $text .= "Name: $name\n";
    $text .= "Phone: $phone\n";
    $text .= "Email: $email\n\n";
    $text .= "Message:\n$message";
    
    $url = "https://api.telegram.org/bot$telegram_bot_token/sendMessage";
    $data = array(
        'chat_id' => $chat_id,
        'text' => $text
    );
    
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type:application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data)
        )
    );
    
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    
    header("Location: thank-you.html");
}
?> 