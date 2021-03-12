
<?php

    $wampdir = 'C:\wamp64\www';


    $siteName;
    $username = "admin";
    $email;
    $password;

    $longopts  = array(
        "sitename:",    
        "username::",   
        "email:",                
    );
    
    $options = getopt("", $longopts);
    
 
    if(! $options){
        throw new Error("Atleast the sitename is required.");
    }

    if(! array_key_exists('sitename', $options)){
        throw new Error("Site name needed.");
    }

    $siteName = $options['sitename'];



    $wampDirFiles = scandir($wampdir);

    foreach($wampDirFiles as $file){
        if($file == $siteName){
            throw new Error("There is already a directory for " . $siteName . " in WAMP www folder.");
        }
    }

        $mysqli = new mysqli("localhost:3308","root",""); // todo -- error checking

        $dbExists = $mysqli -> select_db($siteName);

        if($dbExists){
            throw new Error("Database " . $siteName . " already exists.");
        }

        $mysqli->query("create database $siteName");// todo error checking

        $mysqli->close();

        // too lazy to write function to copy whole directories and subdirectories in php right now
        exec("Xcopy /E /I C:\\wpcreator\\files\\wordpress C:\\wamp64\\www\\$siteName", $result);

        $installationDir = "C:\\wamp64\\www\\$siteName";


        //copy the wp-config.php

        copy("C:\\wpcreator\\files\\wp-config.php", $installationDir . "\\wp-config.php");

        //file_put_contents($installationDir . "\\wp-config.php", "define( 'DB_NAME', '$siteName' );", FILE_APPEND);

        $content = file_get_contents($installationDir . "\\wp-config.php");
        $newContent = str_replace("define( 'DB_NAME', 'testdb' );", "define( 'DB_NAME', '$siteName' );", $content);
        file_put_contents($installationDir . "\\wp-config.php", $newContent);



    $siteurl = "http://localhost/$siteName";


    define( 'WP_INSTALLING', true );
    require_once $installationDir . '/wp-load.php';
    

    require_once $installationDir . '/wp-admin/includes/upgrade.php';

    require_once $installationDir . '/wp-admin/includes/translation-install.php';
    
    require_once $installationDir . '/wp-admin/install.php';

    require_once $installationDir . '/wp-includes/wp-db.php';
    
    $result = wp_install($siteName, 'admin', 'dylanelliott27@hotmail.com', true);
    
    
    update_option( 'siteurl', $siteurl );
    update_option( 'home', $siteurl );


    var_dump( $result );
    echo 'done';

