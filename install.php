
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

        $mysqli->close();

        // too lazy to write function to copy whole directories and subdirectories in php right now
        exec("Xcopy /E /I C:\\wpcreator\\files\\wordpress C:\\wamp64\\www\\$siteName", $result);

        $installationDir = "C:\\wamp64\\www\\$siteName";


        //copy the wp-config.php

        copy("C:\\wpcreator\\files\\wp-config.php", $installationDir . "\\wp-config.php");

    /*$mydir = 'C:/wamp64/www/wp';
    $siteurl = 'http://localhost/wp';
    define( 'WP_INSTALLING', true );
    require_once $mydir . '/wp-load.php';
    

    require_once $mydir . '/wp-admin/includes/upgrade.php';

    require_once $mydir . '/wp-admin/includes/translation-install.php';
    
    require_once $mydir . '/wp-admin/install.php';

    require_once $mydir . '/wp-includes/wp-db.php';
    
    $result = wp_install('test-blog', 'admin', 'dylanelliott27@hotmail.com', true);
    
    
    update_option( 'siteurl', $siteurl );
    update_option( 'home', $siteurl );


    var_dump( $result );
    echo 'done';

exit; */
