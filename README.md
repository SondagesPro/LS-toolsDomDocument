# toolsSmartDomDocument
Tool for another plugin : Add some libraries for easiest manipulation on DOM

## Documentation
The primary purpose is to manipulate HTML just before shown. Exemple of usage for beforeQuestionRender {ANSWERS}. Not using regexp, because find id or element in HTML is more stable.

The class can be easily imported using `$dom = new \toolsDomDocument\SmartDOMDocument();`. After 2 function extend php DOMDocument are added.
- loadPartialHTML : to load the HTML of answers
- saveHTMLExact : to get exact HTML updated.

## Copyright
- Copyright © 2016 Denis Chenu <http://sondages.pro>
- Licence : GNU General Public License <https://www.gnu.org/licenses/gpl-3.0.html>
- The class is a fork of SmartDOMDocument © Artem Russakovskii, see <http://beerpla.net> distributed in MIT Licence
