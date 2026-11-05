<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
</head>
<body style="margin: 0; padding: 20px; background: #f4f5f7; font-family: Arial, sans-serif; color: #1b1e24;">
    <div style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 10px; overflow: hidden;">
        <div style="background: #ff6a00; color: #fff; padding: 18px 24px; font-size: 20px; font-weight: bold;">
            potuzhnoprint.ua — нова заявка
        </div>
        <div style="padding: 24px;">
            <p><strong>Ім'я:</strong> {{ $order['name'] }}</p>
            <p><strong>Email:</strong> {{ $order['email'] }}</p>
            <p><strong>Тема:</strong> {{ $order['topic'] }}</p>
            <p><strong>Повідомлення:</strong></p>
            <p style="background: #f4f5f7; padding: 12px; border-radius: 6px;">{!! nl2br(e($order['message'])) !!}</p>
        </div>
    </div>
</body>
</html>