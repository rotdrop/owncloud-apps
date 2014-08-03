<?php

/**Configuration related stuff.
 *
 * @author Claus-Justus Heine
 * @copyright 2013 Claus-Justus Heine <himself@claus-justus-heine.de>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

/**DWEMBED namespace to prevent name-collisions.
 */
namespace Imprint
{

/**This class provides the two static login- and logoff-hooks needed
 * for authentication without storing passwords verbatim.
 */
class Config
{
  /**Configuration hook. The array can be filled with arbitrary
   * variable-value pairs (global scope). Additionally it is possible
   * to emit any other java-script code here, although this is
   * probably not the intended usage.
   */
  public static function jsLoadHook($params)
  {
    $jsAssign = &$params['array'];

    $language = \OCP\Config::getUserValue(\OCP\User::getUser(), 'core', 'lang', 'en');

    // prepare view
    if (\OCP\User::isLoggedIn()) {
      $tmpl_view = 'user';
    } else {
      $tmpl_view = 'guest';
    }

    $jsAssign['Imprint'] =
      "Imprint || {};\n".
      "Imprint.language = '".$language."'\n".
      "Imprint.mode = '".$tmpl_view."'";
  }
};

} // namespace

?>
