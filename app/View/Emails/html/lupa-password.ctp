<html>
    <head>
        <title>

        </title>
    </head>
    <body>
        <div style="color: black;">
            <p>Dear <?= $username ?>,</p> <br>
            <p>Klik <a href="<?= Router::url("/reset-password/$token", true) ?>">link</a> ini untuk melakukan reset password anda. </p>
            
            <br>
            <p>Terima kasih.</p>
            <br>
            <p>Salam,</p> <br>
            <p>Admin Website Makassar Terkini</p> <br>
        </div>
    </body>
</html>