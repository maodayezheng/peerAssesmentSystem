<?php

class Path
{
    private $path;

    /*
     * @param $absolutePath is the HTML style absolute path which you
     *        want to reference. e.g. /WebContent/CSS/index.css
     */
    public function __construct($absolutePath)
    {
        $serverRoot = $_SERVER['DOCUMENT_ROOT'];

        // Deal with localHost case
        if( $_SERVER['SERVER_ADDR'] === "127.0.0.1")
        {
            // In this case $_SERVER['DOCUMENT_ROOT'] = /opt/lampp/htdocs/peerAssesmentSystem/
            // and HTML absolute paths have their root as /opt/lampp/htdocs/

            if(strtolower(substr($absolutePath, -3, 3)) === "php")    // for PHP files
            {
                $this -> path = $_SERVER['DOCUMENT_ROOT'].$absolutePath;
            } else  // for html, js, CSS files
            {
                $this -> path = "/peerAssesmentSystem".$absolutePath;
            }
        } else // Deal with path on server.
        {

        }
    }

    public function __toString()
    {
        return $this->path;

    }

}




?>