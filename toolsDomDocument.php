<?php

/**
 * Tool for another plugin : Add some libraries for easiest manipulation on DOM
 *
 * @author Denis Chenu <denis@sondages.pro>
 * @copyright 2015-2025 Denis Chenu <http://www.sondages.pro>
 * @license GPL v3
 * @version 0.3.0
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
    protected static $name = 'toolsDomDocument';
    protected static $description = 'Tools for plugin : SmartDomDocument';

    /**
    * Add function to be used in beforeQuestionRender event
    */
    public function init()
    {
        if (version_compare(PHP_VERSION, '8.0.0') < 0) {
            Yii::setPathOfAlias('toolsDomDocument', dirname(__FILE__) . "/libraries_php7/SmartDOMDocument/");
            return;
        }
        Yii::setPathOfAlias('toolsDomDocument', dirname(__FILE__) . "/libraries/SmartDOMDocument/");
    }
}
