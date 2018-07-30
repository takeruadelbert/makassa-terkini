<html>
    <head>
        <title>

        </title>
    </head>
    <body>
        <div style="color: black;">
            <p>Halo,</p> </br>
            <p>
                Kami dari tim Makassar Terkini hanya ingin memberitahukan kepada anda bahwa telah ada berita terbaru di situs <a href="<?= Router::url("/", true) ?>">Makassar Terkini</a>.
                Untuk melihat berita-berita terbaru, anda dapat mengklik pada <a href="<?= Router::url("/newsletter/$id", true) ?>">link</a> ini.
            </p>
            <p>Salam,</p> </br>
            <p>Admin Website Makassar Terkini</p> </br>
            </br></br></br></br></br>
            <p>
                Untuk berhenti berlangganan, silahkan klik <a href="<?= Router::url("/newsletters/stop_subscribe/$id", true) ?>">link</a> ini.
            </p>
        </div>
    </body>
</html>