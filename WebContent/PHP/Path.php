<?php

class Path
{
    private $path;

    /*
     * @param $absolutePath is a HTML style absolute path which you
     *        want to reference. e.g. /WebContent/CSS/index.css
     */
    public function __construct($absolutePath)
    {
        $this -> path = $_SERVER['DOCUMENT_ROOT'].$absolutePath;
        echo $this -> path;
    }

    public function __toString()
    {
        // Path string for localhost needs to be amended.
        $lhost = substr($this->path, 0, 18);
        if(substr($this->path, 0, 18) === "/opt/lampp/htdocs/")
        {

        }

        echo "<br /> lhost: $lhost<br />";

        $rest = substr("abcdef", 0, -1);  // returns "abcde"
        $rest = substr("abcdef", 2, -1);  // returns "cde"
        $rest = substr("abcdef", 4, -4);  // returns false
        $rest = substr("abcdef", -3, -1); // returns "de"

        if($this->path)
        return $this->path;
    }

}




?>