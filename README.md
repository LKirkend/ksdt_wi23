# KSDT Website

[https://ksdt.ucsd.edu/](https://ksdt.ucsd.edu/)

Welcome to the new, improved KSDT Website theme, brought to fruition with the collaboration of the KSDT Design and Computer Engineering Teams! In this theme, you'll find countless cool features, such as: 

 - A radio player that streams the coolest DJ picks
 - An embed that takes you straight to the KSDT Instagram
 - Functions that work great on mobile and web browsers, such as a toggled down menu!
 - A cascading CSS Style Guide filled with gradients of pink and purples.
 - A navigation bar with pages: contact, scheduler, about, and more!
 
# Contributors

**A huge thank you to the contributors who have created the best college radio website around!**

## Computer Engineering Team

Logan Kirkendall

Steven Schaeffer

Zach Lawrence

Chloe Keggen

Catherine Zhang

Christine Nguyen

Daniel Hernandez

# Design Team

# Installation

1. If you have XAMPP installed, uninstall it. Delete XAMPP folder (C:/XAMPP) because it doesn’t actually fully remove it…
2. Download the 3 files in this [directory](https://drive.google.com/drive/folders/1UwMW-5j_vDPD0s5OPQjZo6MgRRpqO24K)
3. Run the XAMPP installer. Unselect all components except for MySQL and phpMyAdmin
4. Unzip the wordpress zip file. Place the wordpress folder within C:/xampp/htdocs
5. Open the XAMPP installer program, start Apache and MySQL
6. Navigate to [localhost/phpMyAdmin](localhost/phpMyAdmin). Create a new database with name ‘wordpress’ and collation `*utf8mb4_unicode_520_ci*`
7. Navigate to [localhost/wordpress](localhost/wordpress). Go through the installation, change the username to “root” and leave the password field empty. Ensure that the database name is ‘wordpress’ and the prefix is ‘wp_’ 
- If it says “*Error establishing a database connection*”, **make sure that there is a wp-config.php file** within your C:/xampp/htdocs/wordpress/ folder
  - If needed, use the wp-config-sample file and rename it to wp-config.php, change DB_NAME to “wordpress”, DB_USER to “root”, and DB_PASSWORD to “”
8. In your wp-config.php file (C:/xampp/htdocs/wordpress), add the following:

` define('WP_HOME', 'http://localhost/wordpress/');`

` define('WP_SITEURL', 'http://localhost/wordpress/');`

9. Restart Apache2 and phpmyadmin via xampp. Whenever you change wp-config.php, you need to restart the site. 
10. Create your user account.
11. Login, navigate to [localhost/wordpress/wp-admin/plugin-install.php?s=migration&tab=search&type=term](localhost/wordpress/wp-admin/plugin-install.php?s=migration&tab=search&type=term) and install the All-in-One WP Migration plugin. **Click activate after it’s done installing**
  - If it asks for ftp client credentials, ensure permissions are correct. The unix command “chmod -R 777 [directory]” recursively changes it. 
    - Navigate to C:/xampp/htdocs/wordpress/ and run 
    
  ` “find . -type d -exec chmod 777 {} + ”` , and

  ` “find . -type f -exec chmod 777 {} +”`
- If that still doesn’t work, add ` define ( 'FS_METHOD', 'direct');` to your wp-config.php
12. Navigate to C:\XAMPP\php\ and open php.ini (increase import file size)
  - Change ”upload_max_filesize=40G”
  - Change “post_max_size=40G”
  - Note: On MacOS, your php.ini is located /xampp/etc/ *for whatever reason*
13. Navigate to [localhost/wordpress/wp-admin/admin.php?page=ai1wm_import](localhost/wordpress/wp-admin/admin.php?page=ai1wm_import) and import the ksdt.*.wordpress file contained within this [directory](https://drive.google.com/drive/folders/1UwMW-5j_vDPD0s5OPQjZo6MgRRpqO24K)
14. Let it fully install, click confirm when told that it will replace the site. Once it’s done, it may give you 403 Forbidden when navigating to any page. If this is the case:
15. Navigate to the wp_options table in the database [localhost/phpmyadmin/sql.php?server=1&db=wordpress&table=wp_options&pos=0](localhost/phpmyadmin/sql.php?server=1&db=wordpress&table=wp_options&pos=0) and edit the active_plugins option. Delete all active plugins except for migration. Should look like ` ‘a:19:{i:5;s:51:"all-in-one-wp-migration/all-in-one-wp-migration.php";}’` but not exactly. 
16. Navigate to C:\xampp\htdocs\wordpress\ and delete the .htaccess file
  - For Mac users paste this command into the terminal to see the hidden file:
“defaults write com.apple.finder AppleShowAllFiles True; killall Finder”
17. Login with **Username:** “user” **password:** “Password123!” .If this doesn’t work:
  - Go to [localhost/phpmyadmin](localhost/phpmyadmin) and navigate to wp_users in the wordpress database. Go to the user “logan”, change the user_pass to anything you desire, and select md5 for the function.


Great! You have set up your local environment! 

