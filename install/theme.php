<?php
/**
* @author Dennis Vorpahl <info@webmeteor24.de>
* @copyright 2016 Webmeteor24 ({@link http://webmeteor24.de})
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*/

if (!defined("IN_METEOR")) { die("Access Denied"); }

function showheader(){
    echo "<!DOCTYPE html>\n";
    echo "<html lang=\"de\">\n";
    echo "<head>\n";
    echo "<meta charset=\"utf-8\">\n";
    echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\n";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";

    echo "<title>Allrounder CMS Installation</title>\n";

    echo "<script src='http://code.jquery.com/jquery-latest.min.js' type='text/javascript'></script>\n";

    echo "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\">\n";
    echo "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css\">\n";
    echo "<!-- Unterstützung für Media Queries und HTML5-Elemente in IE8 über HTML5 shim und Respond.js -->\n";
    echo "<!--[if lt IE 9]>\n";
    echo "<script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>\n";
    echo "<script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>\n";
    echo "<![endif]-->\n";

    echo "<link href='css/setup.css' media=\"print, projection, screen\" rel='stylesheet' type='text/css'>\n";
    echo "<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js\"></script>\n";
    echo "</head>\n";
    echo "<body>\n";
    echo "<div class=\"container\">\n";

    echo "<div class=\"jumbotron\">\n";
    echo "<h1><a href=\"#\">Allrounder CMS</a></h1>\n";

}

function showfooter(){
    echo "</div>\n";


    echo "<footer class=\"footer\">\n";
    echo "Powered by Allrounder CMS 2017 by <a href=\"http://www.allroundercms.de\" target=\"_blank\">Allrounder CMS</a>\n";
    echo "</footer>";
    echo "</div>\n";
    echo "</body>\n";
    echo "</html>";

}
