
# 1. UDOO board set up

In this chapter we will see how to set up our UDOO board so that it is ready for us to install the IoT Privacy and Security Framework Application. 

## 1.1 Prepare micro SD card

First things first and we cannot do anything with our UDOO if we don't have a micro SD card set up first.

### 1.1.1 Overview


The UDOO board has no internal storage so in order to boot we have to prepare a micro SD card to use as storage. The card has to contain an operating system and be bootable, meaning our UDOO board has to be able to start as soon as we plug it in. Here we use Debian Linux as our operating system and more specifically the image provided from the UDOO team on their [downloads][downloads page] page. We chose the UDOObuntu 2.2.0 Minimal image based on Ubuntu 14.04 LTS but without any graphical interface. Feel free to use the UDOObuntu 2.2.0 image, on which we have tested the application and it works without any issues, if you need the graphical inteface. You can even create your own image out of any Debian Linux distribution if you feel more adventurous. You can find more info [here][distro info].

The minimum SD card size you can use is 4 GB and the maximum tested is 64 GB but you can probably use bigger ones without issue.

[downloads page]: https://www.udoo.org/downloads/  

[distro info]: https://www.udoo.org/docs/Advanced_Topics/Install_A_Custom_Debian_Distro_With_Debootstrap.html

### 1.1.2 Steps


* Download any of the previously discussed micro SD images from the [UDOO website][downloads page].
  
* Extract the .img file from the .zip file you downloaded into any folder (this path will be referred to as \<img\_file_path> in the guide).
   
* Follow the instructions below for the OS you use:

 <details>
 <summary>Windows</summary>
 <br>
  
  * Extract the downloaded zip file, so you'll have a .img image file. Do not use the preinstalled archive extractor, use 7-zip or similar to decompress the zip file.

  * Download the Win32DiskImager software and unzip it.

  * If your PC has a slot for SD cards (you may need a Micro SD to SD adapter), simply insert the card. If not, insert the card into any SD card reader and then connect it to the PC.

  *  Run the file named Win32DiskImager.exe right-clicking it and selecting “Run as administrator”.

  * If the Micro SD card (Device) used is not detected automatically, click on the drop down box on the right and select the identifier of the Micro SD card that has been plugged in (e.g. [H:]). If your Micro SD card is not listed, try to format it using the FAT32 file system.

  * Heads up! Please be careful to select the correct drive identifier; if you use the wrong identifier you may lose all data in your PC!

  * In the Image File box, choose the downloaded .img file and click “Write”. Click yes in case a warning message pops up.

  * The Micro SD card is now ready to be used. Simply insert it in the board’s Micro SD Card slot and boot the system.
</br>
</details>
  
<details>
<summary>MacOS</summary>
<br>
  
  * From the Terminal app run
	
  	```df -h```

 * If your Mac has a slot for SD cards (you may need a Micro SD to SD adapter), simply insert the card. If not, insert the card into any SD card reader and then connect it to the Mac.
 
 * Run again

 	 ```df -h```

 * The device that wasn't listed before is the Micro SD card just inserted. The name shown will be the one of the filesystem’s partition, for example, /dev/disk3s1. Now consider the raw device name for using the entire disk, by omitting the final s1 and replacing disk with rdisk (considering the previous example, use rdisk3, not disk3 nor rdisk3s1).

 * Heads up! Please be careful to select the correct device identifier; if you use the wrong identifier you may lose all data in your Mac!

 * Unmount all the partitions in the SD card (use the correct name found previously, followed by letters and numbers that identify the partitions). using diskutil:

	```sudo diskutil unmount /dev/disk3s1```

 * Now write the image on the Micro SD card using the command:

	```sudo dd bs=1m if=<img_file_path> of=/dev/<sd_name>```

 * Please make sure that you replaced the argument of input file (if=<img_file_path>) with the path to the .img file, and that the device name specified in output file’s argument (of=/dev/<sd_name>) is correct. Please also make sure that the device name is the one of the whole Micro SD card as described above, not just a partition (for example, rdisk3, not disk3s1). For example:

 
   ```
   sudo dd bs=1m if=/Users/YourName/Download/udoobuntu-udoo-qdl_v2.0.img  of=/dev/rdisk3
   ```

 * Once dd has been completed, run:

   	```sudo sync```
   		 
   	 ```sudo diskutil eject /dev/rdisk3```

 * The Micro SD card is now ready to be used. Simply insert it in the board’s Micro SD Card slot and boot the system.
   
   </br>
   </details>
   
 <details>
<summary>Linux</summary>
<br>

 * From the terminal run

 	```df -h```

 * If your PC has a slot for SD cards (you may need a Micro SD to SD adapter), simply insert the card. If not, insert the card into any SD card reader and then connect it to the PC.

 * Run again

	```df -h```

 * The device that wasn't listed before is the Micro SD card just inserted. The left column will show the device name assigned to the Micro SD card. It will have a name similar to /dev/mmcblk0p1 or /dev/sdd1. The last part of the name (p1 or 1, respectively) is the partition number, but it is necessary to write on the whole Micro SD card, not only on one partition. Therefore, it is necessary to remove that part from the name (for example /dev/mmcblk0 or /dev/sdd) in order to work with the whole Micro SD card.

 * Heads up! Please be careful to select the correct device identifier; if you use the wrong identifier you may lose all data in your PC!

 * Unmount all the partitions in the SD card (use the correct name found previously, followed by letters and numbers that identify the partitions). using umount:

 	```sudo umount /dev/sdd1```

  * Now write the image on the Micro SD card using the command:

    ```sudo dd bs=1M if=<img_file_path> of=/dev/<sd_name>```

 * Please make sure that you replaced the argument of input file (if=<img_file_path>) with the path to the .img file, and that the device name specified in output file’s argument (of=/dev/<sd_name>) is correct. For example:

   ```
   sudo dd bs=1m if=/home/YourName/Download/udoobuntu-udoo-qdl_v2.0.img of=/dev/sdd
    ```

 * Once dd has been completed, run:

	```sudo sync```

 * The Micro SD card is now ready to be used. Simply insert it in the board’s Micro SD Card slot and boot the system.
    </br>
    </details>
  <br></br>
  
  If you encounter any issues you can visit the UDOO official [documentation page][doc page].

[doc page]: https://www.udoo.org/docs/Getting_Started/Create_A_Bootable_MicroSD_card_for_UDOO_QUAD-DUAL.html 
   
You should now have a bootable micro SD card. Insert it in your UDOO board and power it on. 

Next we have to communicate with our now booted board.

## 1.2 Connect to UDOO board

The easiest way to connect to UDOO is using SSH. That means that you get to connect from your PC or laptop without having to have physical access to the board, as long as you are in the same network. Unfortunately, you cannot use this method out of the box and you will have to set some things up in order to use it. There are two methods to do that. You either connect a monitor and a keyboard to your board or you connect a serial cable. Let's see both of them in more detail. In any case you could follow the whole procedure to set up the application without connecting via SSH using one of these two methods. So if you are happy with either, after setting them up, skip the SSH part that follows.

### 1.2.1 Monitor and keyboard

![UDOO board](https://www.udoo.org/docs/img/Box1_Tutorials_UdooSite.png)

This is the easiest of the two methods and if you have a spare monitor and keyboard it is recommended. If not, don't worry. We have alternatives. Skip to the next section.

##### 1. Insert the micro SD card. The one we created in section 1.1


![UDOO sd](https://hackster.imgix.net/uploads/image/file/51144/udoo-usd.jpg?auto=compress%2Cformat&w=1280&h=960&fit=max)

##### 2. Connect the HDMI cable
UDOO DUAL/QUAD features full HD video output on standard HDMI connector. Plug your full-size ‘male’ HDMI cable to UDOO DUAL/QUAD, then plug it to your monitor or digital TV.

##### 3. Connect network (optional)

If you want, you can plug your RJ-45 (LAN) ethernet cable now, but you can do it later when the board is booted or you can just use the WiFi to connect wirelessly to your network.

##### 4. Connect input

Every keyboard and mouse should work with UDOO DUAL/QUAD. Wireless keyboards/mouses should work as well.

##### 5. Power up

Use your UDOO DUAL/QUAD 12V and 2Amp switching DC supply. This supply is designed to work anywhere in the world using 100V-240V AC wall power but you may need a plug adapter.

UDOO DUAL/QUAD will boot as soon as you connect the power supply. 

You now have three choices:

* If you have connected the ethernet cable use your board as is. Easier in the short term. Just skip the rest of this chapter and start setting the application up.

* Regardless of whether you have connected an ethernet cable, set up WiFi but not SSH access. Now, you are connected to the network but you still have to have physical access to your board. Skip to the [Setting WiFi](#setting-wifi) section and then start setting up the application.

* Exactly the same as the previous one but now you plan to use SSH to remotely access your board. [Set up WiFi](#setting-wifi) but keep on reading so you can also set up SSH. When you are done you will be able to access your UDOO from anywhere, as long as you are in the same network.  


### 1.2.2 <a name="setting-serial"></a>Serial Cable


Connecting via serial will practically result in a shell console, the same as the one you’ll obtain through SSH connection. The drawback is you have to have your board connected to your computer in order to control it while that's not the case with SSH.

The procedure to connect via serial depends on your computer's operating system.

<details>
	<summary>Windows</summary>
  
   <br>

* Download the serial adapter Driver [here][wind_driver].

[wind_driver]:http://www.silabs.com/products/mcu/pages/usbtouartbridgevcpdrivers.aspx

* Install the proper version for your Operating system: CP210xVCPInstaller_x86.exe for 32-bit systems CP210xVCPInstaller_x64.exe for 64-bit system
 
  [How to define your Windows version][wind_version].

[wind_version]:http://windows.microsoft.com/en-us/windows7/32-bit-and-64-bit-windows-frequently-asked-questions

* Download and install a software called [putty][]. This will be used later too if you plan to connect to your board via SSH.

[putty]:http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html 

* Open putty and configure it following these instructions: 
  * Connection type “serial” Port: “COM3” (please note that this value may be different, check the number of the COM assigned in Windows Device Manager) 
  * Speed: “115200” 
  * Save the configuration as “Udoo-serial” for future uses.

     ![putty](https://www.udoo.org/docs/img/udooserial1win.png)

* Connect the serial port of UDOO DUAL/QUAD (CN6) to your PC using the micro USB cable as shown in the image below. 

![serial port](https://udooorgcdn-aidilabsrl.netdna-ssl.com/wp-content/uploads/2013/10/board_usb2-01.jpg)

* Power up UDOO DUAL/QUAD

* Click Open on the putty control panel

* You’re in! You’ll be able to see the startup process and access the remote shell  console on UDOO DUAL/QUAD.

  ![console](https://www.udoo.org/docs/img/udoowin2.png)
</br>
</details>


<details>
<summary>Linux</summary>
<br>
 
 * Connect the serial port of UDOO DUAL/QUAD (CN6) to your PC using the micro USB cable.

![serial port](https://udooorgcdn-aidilabsrl.netdna-ssl.com/wp-content/uploads/2013/10/board_usb2-01.jpg)


 * Open your favourite terminal application and type:
   
   ```dmesg```

   You should see this line at the end of the output: 
  
   ```usb 2-2.1: cp21x converter now attached to tty```
  
  
  ![console usb](https://www.udoo.org/docs/img/Linux1.png)

* Install minicom using these commands:

  ```
  sudo apt-get update
  sudo apt-get install minicom
  ```

* Open Minicom and configure it (first time only) using the following command:

  ``` sudo minicom -sw```
  
* Go to “Serial port setup” and edit as follows:
  * Serial Device: /dev/ttyUSB0 (type a key) 
  * Hardware Flow Control: No (type f key) 
  * Software Flow Control: No (type g key)  

  ![console usb 2](https://www.udoo.org/docs/img/Linux2.png)

* Press exit and "Save setup as dfl"

* Exit Minicom

* Let’s give proper access permissions to serial port with:
   
   ```sudo chmod 666 /dev/ttyUSB0```

* Now we can start listening with:

   ```sudo minicom -w```
 
* Power cycle (restart) UDOO DUAL/QUAD to see the boot process and connect it to serial console shell.

You are now connected to UDOO via serial cable.

</br>
</details>

<details>
<summary>MacOS</summary>  
<br>

* Download the serial adapter Driver [here][mac driver]

[mac driver]: http://www.silabs.com/products/mcu/pages/usbtouartbridgevcpdrivers.aspx

* Connect the serial port of UDOO DUAL/QUAD (CN6) to your PC using the micro USB cable.

  ![serial port](https://udooorgcdn-aidilabsrl.netdna-ssl.com/wp-content/uploads/2013/10/board_usb2-01.jpg)

* Download and install [Serial Tools][serial tools]

[serial tools]: https://itunes.apple.com/us/app/serialtools/id611021963?mt=12

* Open Serial Tools, and change the following parameters:
  *  Serial Port: “SLEB_USBtoUART” 
  *  Baud rate “115200”

    ![serial tools](https://www.udoo.org/docs/img/Mac1.png)

* Hit connect, and you should be connected to your UDOO board.

     ![serial tools 2](https://www.udoo.org/docs/img/Mac2.png)


</br>
</details>


***
So now you are connected to your UDOO. But let's face it. Having to connect a monitor and a keyboard is not very convenient and the serial connection much less so. If you are happy with any of them by all means, keep using them and set up the application this way (skip the rest of this chapter). But if you want to connect to your UDOO via SSH now is the time to move to the next section where we see how to set up our board to use WiFi. 


## <a name="setting-wifi"></a> 1.3 Wifi Set Up

Your board is running (meaning its operating system is) Ubuntu. In Ubuntu it is very easy to connect your UDOO to a wireless network via WiFi. All you have to do is issue these commands:

* First we check to see which networks our board can "see".

  ```sudo nmcli dev wifi```

* Then we connect to our chosen network.

  ```sudo nmcli dev wifi connect ESSID_NAME password ESSID_PASSWORD```
  
  ESSID\_NAME is the name of the network we are connecting to and ESSID_PASSWORD is the password the network uses.  
  
    ![nmcli](https://i.stack.imgur.com/rRJTz.png)


```sudo``` is needed before certain commands to give us access to certain functions that are only available to the administrator of the system. The root password is going to be asked. By default it is ```udooer```.
  
  
The UDOO should now be connected to the network. 
  
## 1.4 <a name= "finding-ip"></a>Finding the IP

Now that our board is connected to our local network we have to find its address so that we can access it remotely via SSH. All we have to do is issue one command:

```ifconfig wlan | grep 'inet addr'```

UDOO's IP is the first number we see in the output. Let's take this example output:

```inet addr:192.168.0.8  Bcast:192.168.0.255  Mask:255.255.255.0```

The IP address is 192.168.0.8

We now know our board's IP address.

## 1.5 SSH connection

In order to connect via SSH to our board, it needs to be in the same network as the computer from which we will be connecting. That means they have to be connected to the same router in most cases. If that is the case we can now connect via SSH.

Depending on the operating system our computer runs we can do that in different ways.


<details>
<summary>Windows</summary>  
<br>
   
   We already have [putty](#setting-serial) installed so all we have to do is type in the address we found earlier. When asked for credentials just type ``udooer`` for username and ``udooer`` for password unless you have changed it, in which case adjust these accordingly. 
   
   **Note**: While you type the password you will not see anything being displayed in the terminal. That is normal and is done for security purposes. Just type the password and hit Return (Enter).
</br>
</details>

<details>
<summary>Linux or MacOS</summary>
  
   <br>
   
   Here things are even easier. Just open your favourite terminal application and type:
   
   ```ssh udooer@<IP_address>```
   
   <IP_address> is the address we found [earlier](#finding-ip)
   
   When you are asked for the password type ```udooer``` unless you have changed it.
   
   Note: While you type the password you will not see anything being displayed in the terminal. That is normal and is done for security purposes. Just type the password and hit Return (Enter).
</br>
</details>

And that's it! You are now connected to your board via SSH. Congratulations!
***

# 2. Application Set Up

With access to our board we can now focus on setting the application up.

These steps have been tested on both the UDOObuntu images (minimal and full). If you are using a different distribution adjust accordingly.

1. First of all we have to upgrade PHP to version 7.1 from 5.5 that comes preinstalled. To do so follow these steps:
 
   * ```sudo apt-get install -y language-pack-en-base```
   
   * ```sudo LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php```
   
   * ```sudo add-apt-repository ppa:ondrej/php```
   
   * ```sudo apt-get update```
   
   * ```sudo apt-get install php7.1```
 
2. Now that PHP has been upgraded to 7.1 we also have to install some packages to extend its functionality. We can do that by issuing these commands:

   * ```apt-get install php7.1-mbstring```
   
   * ```apt-get install php7.1-zip```
   
   * ```apt-get install php-curl```
   

3. Next we have to install Composer which is a package manager for PHP. More specifically Composer is a tool for dependency management in PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you. To install it we issue this command:

    ```
    curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
    ``` 
    
4. Time to get the actual application. Issue the command:

     ```
     git clone https://github.com/nikogianna/enc_dec.git
     ```    
      
5. We now have everything we need to start putting the application together. Navigate to the directory where you downloaded the application and run this command:
  
    ```
    composer install --no-dev --optimize-autoloader
    ```
   
 
6. Start a web server to make the application accessible. Issue the command:

  
   ```
   php artisan serve --host 0.0.0.0 --port 8080
   ```
    
7. You can now go to your browser and visit the [IP you found](#finding-ip) earlier followed by the port you used in the previous command. So if the IP you found was ```192.168.0.8``` you can access the application by browsing to the following address:
   
       192.168.0.8:8080/
       
  
***
And voila! The IoT Privacy and Security Framework. But how is it used? That's explained in the next chapter.

# 3. Using the application

The application can be used to encrypt and decrypt text and files. Let's see how.

![app home page](https://i.ibb.co/YRSfdkq/Screenshot-2018-12-07-at-22-56-42.png)

This is the Welcome page. Here you can navigate to the different functions.

## 3.1 Encryption

We can encrypt text and files using two different encryption algorithms. We can also generate a hash of either files or text. 

<details>
<summary> 3.1.1 Text encryption </summary>
<br>

In order to encrypt text you have to click on the Encrypt Text button of the Welcome page. You will then be directed to the Encrypt Text page.

![app encrypt text](https://i.ibb.co/6rgDy4F/Screenshot-2018-12-07-at-23-12-32.png)

Here you can type the text you want to encrypt in the box on the left. The maximum length of the text is 750 characters.

Below the text box there are the buttons with which you can chose the encryption algorithm you want to use. You have three choices: **256 bit AES**, **RSA**, **256 bit SHA-2 digest**. 

On the right half of the page you can chose how to import the encryption key to be used in the encryption. Of course this is only applicable to **AES** and **RSA** encryption methods, since **SHA** does not use an encryption key. The choices you have are **Auto-Key**, **File-Key** and **Text-Key**. 

**Auto-Key** generates a random key 512 byte key (in the case of the **RSA** both a private and a public key are generated). This key (private for **RSA**) is then used to encrypt the text. When the encryption is completed the encrypted text along with the key is downloaded in a zip file (for **RSA** both the private and the public key are zipped).

**File-Key** allows you to upload a file containing the key with which you wish to encrypt the text you have typed. If you choose this method the only thing that will be returned when the encryption is completed is the encrypted text.

**Text-Key** allows you to type a key in the text box. If you are using **AES** you have to note what the encryption text you typed was because it is not returned in the download of the encrypted text and you can only decrypt the text using the same key. If you are using **RSA** you don't have to note it because it is not going to be used for the decryption. We will see how to decrypt below.

Now that you have chosen all aspects of the text encryption you can hit the **Submit** button. If nothing went wrong you should get a download of a zip file that is not 0 bytes. If for any reason something did not work properly the file will have a size of 0 bytes.  
</br>
</details>

<details>
<summary> 3.1.2 File encryption </summary>
<br>

In order to encrypt a file you have to click on the Encrypt File button of the Welcome page. You will then be directed to the Encrypt File page.

![app encrypt file](https://i.ibb.co/JkBJP2G/Screenshot-2018-12-07-at-23-15-06.png)

Here you can upload a file from your computer that you want to encrypt in the box on the left. The maximum size of the uploaded file is 2 MB if you choose to encrypt with **AES** or digest with **SHA** and 10 KB if you choose to encrypt with **RSA**. The file types you can upload are jpeg,png,jpg,zip,pdf,doc,docx,txt,asc. 

Below the Upload File box there are buttons with which you can chose the encryption algorithm you want to use. You have three choices: **256 bit AES**, **RSA**, **256 bit SHA-2 digest**. 

On the right half of the page you can chose how to import the encryption key to be used in the encryption. Of course this is only applicable to **AES** and **RSA** encryption methods, since **SHA** does not use an encryption key. The choices you have are **Auto-Key**, **File-Key** and **Text-Key**. 

**Auto-Key** generates a random key 512 byte key (in the case of the **RSA** both a private and a public key are generated). This key (private for **RSA**) is then used to encrypt the file. When the encryption is completed the encrypted file along with the key is downloaded in a zip file (for **RSA** both the private and the public key are zipped).

**File-Key** allows you to upload a file containing the key with which you wish to encrypt the file you have uploaded. If you choose this method the only thing that will be returned when the encryption is completed is the encrypted file.

**Text-Key** allows you to type a key in the text box. If you are using **AES** you have to note what the encryption text you typed was because it is not returned in the download of the encrypted file and you can only decrypt the file using the same key. If you are using **RSA** you don't have to note it because it is not going to be used for the decryption. We will see how to decrypt below.

Now that you have chosen all aspects of the file encryption you can hit the **Submit** button. If nothing went wrong you should get a download of a zip file that is not 0 bytes. If for any reason something did not work properly the file will have a size of 0 bytes.

</br>
</details>

## 3.2 Decryption

We can also decrypt text or files that have been ecnrypted with one of the algorithms used in the application's encryption part.

<details>
<summary> 3.2.1 Text decryption </summary>
<br>
In order to decrypt some text that you have encrypted with one of the methods that are available in the Encrypt Text page you have to navigate to the Decrypt Text page using the Decrypt Text button in the Welcome page.

![app decrypt text](https://i.ibb.co/fYZMHpp/Screenshot-2018-12-07-at-23-19-04.png)

Once on this page you can type the text you want to decrypt on the left side text area and choose the algorithm that was used to encrypt it using the buttons below it. You can choose between **256 bit AES** and **RSA**. The maximum size of text you can upload is 750 characters.

You then have to upload the key you want to use for the decryption on the right side of the page. You have two choices: **File-Key** and **Text-Key**.

With **File-Key** you can upload a file containing the key with which you wish to decrypt the text. In the case of **AES** that key is going to be the same you used for the encryption. In the case of **RSA**, if you encrypted using a private key it is going to be the corresponding public key and if (although not recommended) you encrypted using a public key it is going to be the corresponding private key. 

Whenever you are ready click the **Submit** button and you will get a prompt to download the decrypted text in the form of a txt file. If the size is 0 bytes something went wrong. It might be a number of things but most likely the key used to decrypt was not correct. If its size is not 0 bytes the decryption was successful. You can now go ahead and open it using your favourite text editor and you should see the decrypted text. 
</br>
</details>

<details>
<summary> 3.2.2 File decryption</summary>
<br>
In order to decrypt a file that you have encrypted with one of the methods that are available in the Encrypt File page you have to navigate to the Decrypt File page using the Decrypt File button in the Welcome page.

![app decrypt file](https://i.ibb.co/6XsfyxD/Screenshot-2018-12-07-at-23-19-15.png)

Once on this page you can upload the file you want to decrypt on the left side text area and choose the algorithm that was used to encrypt it using the buttons below it. You can choose between **256 bit AES** and **RSA**. The maximum file size is 2 MB for **AES** and 10 KB for **RSA**.

You then have to upload the key you want to use for the decryption on the right side of the page. You have two choices: **File-Key** and **Text-Key**.

With **File-Key** you can upload a file containing the key with which you wish to decrypt the file. In the case of **AES** that key is going to be the same you used for the encryption. In the case of **RSA**, if you encrypted using a private key it is going to be the corresponding public key and if (although not recommended) you encrypted using a public key it is going to be the corresponding private key. 

Whenever you are ready click the **Submit** button and you will get a prompt to download the decrypted file in the form of a file without any file extension. If the size is 0 bytes something went wrong. It might be a number of things but most likely the key used to decrypt was not correct. If its size is not 0 bytes the decryption was successful. You can now go ahead and open it. You can do that by choosing the application you would have used to open the file before it was encrypted. For example if the file is an encrypted image you can use your favourite application to view images and you should see the decrypted image.  

</br>
</details>


