<?php

/**
 * This file contains pre-defined functions for easy use elsewhere.
 */

    function CSSLink($path)
    {
        return '<link href='.$path.' rel="stylesheet" type="text/css" />';
    }

    function JSLink($path)
    {
        return '<script src='.$path.'></script>';
    }

?>