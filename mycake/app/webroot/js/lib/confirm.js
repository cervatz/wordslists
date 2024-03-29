/*
 * SimpleModal Confirm Modal Dialog
 * http://www.ericmmartin.com/projects/simplemodal/
 * http://code.google.com/p/simplemodal/
 *
 * Copyright (c) 2009 Eric Martin - http://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Revision: $Id: confirm.js 212 2009-09-03 05:33:44Z emartin24 $
 *
 */

$(document).ready(function () {
	$('#confirm-dialog input.confirm, #confirm-dialog a.confirm').click(function (e) {
		e.preventDefault();
		//alert(e.currentTarget);
		// example of calling the confirm function
		// you must use a callback function to perform the "yes" action
		confirm("Confirm operation ?", function () {window.location.href = e.currentTarget});
	});
});

function confirm(message, callback) {
	$('#confirm').modal({
		closeHTML:"<a href='#' title='Close' class='modal-close'>x</a>",
		position: ["20%",],
		overlayId:'confirm-overlay',
		containerId:'confirm-container', 
		onShow: function (dialog) {
			$('.message', dialog.data[0]).append(message);

			// if the user clicks "yes"
			$('.yes', dialog.data[0]).click(function () {
				// call the callback
				if ($.isFunction(callback)) {
					callback.apply();
				}
				// close the dialog
				$.modal.close();
			});
		}
	});
}