# chatterie

<b>Modification du fichier host (C:\Windows\System32\drivers\etc\hosts) :</b> <br />
127.0.0.1			chatterie.test
<br />
<b>Modification du fichier vhost (C:\xampp\apache\conf\extra\httpd-vhosts.conf) :</b> <br />
<VirtualHost *:80><br />
    ServerName chatterie.test<br />
    DocumentRoot "C:/xampp/htdocs/chatterie/"<br />
	ErrorLog "logs/chatterie-error.log"<br />
	CustomLog "logs/chatterie-access.log" common<br />
</VirtualHost>
