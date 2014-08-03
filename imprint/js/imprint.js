/**
 * @package imprint an ownCloud app
 * @category base
 * @author Christian Reiner
 * @copyright 2012-2013 Christian Reiner <foss@christian-reiner.info>
 * @license GNU Affero General Public license (AGPL)
 * @link information http://apps.owncloud.com/content/show.php?content=153220
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the license, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * @file js/imprint.js
 * @brief Imprint js "object", only used for language setting ATM.
 * @author Claus-Justus Heine
 */

var Imprint = Imprint || {};

(function(window, $, Imprint, undefined) {
    Imprint.language = 'en';

    /**
     * Fills height and width of window. (more precise than height: 100%; or width:
     * 100%;)
     */
    Imprint.fillWindow = function(selector) {
	if (selector.length === 0) {
	    return;
	}
	Imprint.fillHeight(selector);
	var width = parseFloat($(window).width()) - selector.offset().left;
	selector.css('width', width + 'px');
	if (selector.outerWidth() > selector.width()) {
	    selector.css('width', width
			 - (selector.outerWidth() - selector.width()) + 'px');
	}
	console.warn("This function is deprecated! Use CSS instead");
    };

    /**
     * Fills height of window. (more precise than height: 100%;)
     */
    Imprint.fillHeight = function(selector) {
	if (selector.length === 0) {
	    return;
	}
	var height = parseFloat($(window).height()) - selector.offset().top;
	selector.css('height', height + 'px');
	if (selector.outerHeight() > selector.height()) {
	    selector.css('height', height
			 - (selector.outerHeight() - selector.height()) + 'px');
	}
	console.warn("This function is deprecated! Use CSS instead");
    }


})(window, jQuery, Imprint);

$('#imprint-frame').ready(function() {
    $(window).resize(function() {
	Imprint.fillWindow($('#imprint-container'));
    });

    $('#imprint-frame').load(function() {
	Imprint.fillWindow($('#imprint-container'));
    });

    if (Imprint.mode == 'guest') {
	$(window).resize();
        $('#imprint-iframe').show();
    } else {
        $("#loader").show();
        $("#loader").fadeOut(1500, function() {
	    $(window).resize();
            $('#imprint-iframe').show();
        });
    }
});

