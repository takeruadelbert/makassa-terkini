<html>
    <head>
        <title>

        </title>
    </head>
    <body>
        <div style="color: black;">
            <p>Dear <?= $email ?>,</p>
            <p>Terima kasih untuk pendaftaran Anda sebagai member Makassar Terkini.</p>
            <p>Berikut username dan password untuk akun anda di website Makassar Terkini : </p>
            <ul>
                <li>username : <?= $email ?></li>
                <li>password : <?= $password ?></li>
            </ul>
            <p>Password anda dapat diubah pada saat anda login.</p><br>
            <p>Salam,</p> <br>
            <p>Admin Website Makassar Terkini</p> <br>
        </div>
    </body>
</html>