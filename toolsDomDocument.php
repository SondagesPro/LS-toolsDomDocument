<?php
/**
 * Tool for another plugin : Add some libraries for easiest manipulation on DOM
 *
 * @author Denis Chenu <denis@sondages.pro>
 * @copyright 2015-2016 Denis Chenu <http://www.sondages.pro>
 * @license GPL v3
 * @version 0.1.0
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */
class toolsDomDocument extends PluginBase
{
    protected $storage = 'DbStorage';

    static protected $name = 'toolsDomDocument';
    static protected $description = 'Tools for plugin : SmartDomDocument';

    /**
    * Add function to be used in beforeQuestionRender event
    */
    public function init()
    {
        $this->subscribe('afterPluginLoad'); /* Seems the quickest way for an helper for other plugin */
    }

    /**
     * Set the alias to get the file
     */
    public function afterPluginLoad()
    {
        Yii::setPathOfAlias('toolsDomDocument', dirname(__FILE__)."/libraries/SmartDOMDocument/");
        //~ Yii::import('toolsDomDocument.SmartDOMDocument');
        //~ $dom = new \toolsDomDocument\SmartDOMDocument();
    }

}
