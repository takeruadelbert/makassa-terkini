<html>
    <head>
        <title>

        </title>
    </head>
    <body>
        <div style="color: black;">
            <p>Dear <?= $username ?>,</p> <br>
            <p>Klik <a href="<?= Router::url("/m/reset-password/$token", true) ?>">link</a> ini untuk melakukan reset password anda. </p>
            <br>
            Terima kasih.
            <br>
            <p>Salam,</p> <br>
            <p>Admin Website Makassar Terkini</p> <br>
            </p>
        </div>
    </body>
</html>