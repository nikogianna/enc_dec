# IoT Privacy & Security Framework 

This is an application to encrypt, hash and decrypt messages and files used within an IoT context running on the UDOO board. 



## Installation on the board


* Upgrade to [php7.1][link_1]

[link_1]: https://www.digitalocean.com/community/tutorials/how-to-upgrade-to-php-7-on-ubuntu-14-04

* ```apt-get install php7.1-mbstring```

* ```apt-get install php7.1-zip```

* ```apt-get install php-curl```

* Install Composer

 ```
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```

* ```git clone https://github.com/nikogianna/enc_dec.git``` 

* ```chmod +x bin/webserver```

* Modify enc_def.conf to suit your directory structure

 ```mv enc_dec.conf /etc/init/```

* ```composer install --no-dev --optimize-autoloader```

* reboot 


The application should be accessible on the same network at 192.168.0.8:8090/
