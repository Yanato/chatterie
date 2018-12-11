# chatterie

Modification du fichier host (C:\Windows\System32\drivers\etc\hosts) : 
127.0.0.1			chatterie.test


Modification du fichier vhost (C:\xampp\apache\conf\extra\httpd-vhosts.conf) : 
<VirtualHost *:80>
    ServerName chatterie.test
    DocumentRoot "C:/xampp/htdocs/chatterie/"
	ErrorLog "logs/chatterie-error.log"
	CustomLog "logs/chatterie-access.log" common
</VirtualHost>
