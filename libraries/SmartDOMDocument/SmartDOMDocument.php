<?php

/**
* This class overcomes a few common annoyances with the DOMDocument class,
* such as saving partial HTML without automatically adding extra tags
* and properly recognizing various encodings, needed to be UTF-8.
* Tested only for LimeSurvey plugin with partial HTML
*
* @author Artem Russakovskii
* @author Denis Chenu
* @version 0.7.0
* @link http://beerpla.net
* @link http://www.php.net/manual/en/class.domdocument.php
* @license MIT
*/

namespace toolsDomDocument;

class SmartDOMDocument extends \DOMDocument
{
  /**
   * @var boolean $debug : See warning when loading HTML
   */
    public $debug = false;

  /**
  * Adds an ability to use the SmartDOMDocument object as a string in a string context.
  * For example, echo "Here is the HTML: $dom";
  */
    public function __toString()
    {
        return $this->saveHTMLExact();
    }

  /**
  * Load HTML with a proper encoding fix/hack.
  * Borrowed from the link below.
  *
  * @link http://www.php.net/manual/en/domdocument.loadhtml.php
  *
  * @param string $html
  *
  * @return bool
  */
    public function loadHTML(string $html, int $options = 0): bool
    {
        $contentType = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; // Force utf8
        if (!$this->debug) {
            return @parent::loadHTML($contentType . $html, $options); // suppress warnings
        } else {
            return parent::loadHTML($contentType . $html, $options);
        }
    }

  /**
  * Load partial HTML adding a doctype, and an empty head
  *
  * @see loadHTML
  *
  * @param string $html
  * @param string $doctype, default to html (HTML5)
  *
  * @return bool
  */
    public function loadPartialHTML(string $html, string $doctype = 'html')
    {
        $html = '<!DOCTYPE ' . $doctype . '><html><head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"></head><body>' . $html . '</body></html>';
        return self::loadHTML($html);
    }

  /**
  * Return HTML while stripping the annoying auto-added <html>, <body>, and doctype.
  *
  * @link http://php.net/manual/en/migration52.methods.php
  *
  * @return string
  */
    public function saveHTMLExact()
    {
        $content = preg_replace(
            array("/^\<\!DOCTYPE.*?<html>.*?<body>/si",
                                  "!</body></html>$!si"),
            "",
            $this->saveHTML()
        );
        return $content;
    }
}
