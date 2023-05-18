                                ==To enable Email follow the following steps(XAMPP)==
                           
                                        =Open XAMPP Installation Directory=
Go to your account through which you want to send mail.<br>
Go to Security Section and turn on the 2-Step Verification.<br>
In the Security Section go to App Password.<br>
Select app as Mail and Device as Your System and than generate.<br>
Save thr Password Provided by the google as we will need it later.<br>

                           
                           
                                        =Open XAMPP Installation Directory=


Go to C:\xampp\php and open the php.ini file.<br>
Find [mail function] by pressing ctrl + f.<br>
Search and pass the following values:<br>
SMTP=smtp.gmail.com<br>
smtp_port=587<br>
sendmail_from = YourGmailId@gmail.com<br>
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"<br>
Save the file<br><br>


Now, go to C:\xampp\sendmail and open the sendmail.ini file.<br><br>

Find [sendmail] by pressing ctrl + f.<br>
Search and pass the following values<br>
smtp_server=smtp.gmail.com<br>
smtp_port=587 or 25 //use any of them<br>
error_logfile=error.log<br>
debug_logfile=debug.log<br>
auth_username=YourGmailId@gmail.com<br>
auth_password=Your-Gmail-Password(The password that you got for the application from your Google Account)<br>
force_sender=YourGmailId@gmail.com(optional)<br>
Save the file<br><br>


                                =To enable certification follow the following steps(XAMPP)=                    
Make sure you have the GD extension installed. If you're using XAMPP, you can check if the GD extension is enabled by following these steps:<br>
Locate the php.ini file. It is typically found in the php folder within your XAMPP installation directory.<br>
Open php.ini in a text editor.<br>
Search for the line ;extension=gd (it may be different if you are using a different version of PHP).<br>
Remove the semicolon (;) at the beginning of the line to uncomment it.<br>
Save the php.ini file and restart the web server (Apache) from the XAMPP control panel.<br>
