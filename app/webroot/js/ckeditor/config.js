/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.allowedContent = true;
	config.allowedContent = {
        script:true,
		div:true,
		//ins: true,
        $1: {
            // This will set the default set of elements
            elements: CKEDITOR.dtd,
            attributes: true,
            styles: true,
            classes: true
        }
    };
	config.extraAllowedContent = 'div(*){*}[*];ins(*){*}[*]';
	config.protectedSource.push(/<ins[^>]*><\/ins>/g);
};

//var editor = CKEDITOR.replace( 'wysiwyg5', {
//	allowedContent: {
//		script: true,
//		div: true,
//		$1: {
//			// This will set the default set of elements
//			elements: CKEDITOR.dtd,
//			attributes: true,
//			styles: true,
//			classes: true
//		}
//	}
//} );