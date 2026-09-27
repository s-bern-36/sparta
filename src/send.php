<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем и очищаем данные от спама
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));

    if (!empty($phone)) {
        // Настройки письма
        $to = "s.bern36@mail.ru"; // 👈 ВАША ПОЧТА (куда слать уведомления)
        $subject = "Новая заявка на обратный звонок";
        
        // Текст письма (HTML-версия)
        $message = "
        <html>
        <head><title>$subject</title></head>
        <body>
            <h2>Заявка с сайта</h2>
            <p><strong>Имя:</strong> $name</p>
            <p><strong>Телефон:</strong> $phone</p>
            <p><strong>Дата:</strong> " . date("d.m.Y H:i") . "</p>
        </body>
        </html>";

        // Заголовки для корректной отправки HTML-письма в UTF-8
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: Сайт <noreply@vash-sayt.ru>" . "\r\n"; // 👈 Измените на свой домен

        // Отправка
        if (mail($to, $subject, $message, $headers)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>