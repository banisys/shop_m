/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	 config.width = '100%',
         config.height = 150,
         /*config.toolbarCanCollapse = true,*/
         config.uiColor = '#ffffff' ,
   config.filebrowserBrowseUrl = '/public/Ckeditor/ckfinder/ckfinder.html';
   config.filebrowserImageBrowseUrl = '/public/Ckeditor/ckfinder/ckfinder.html?type=Images';
   config.filebrowserFlashBrowseUrl = '/public/Ckeditor/ckfinder/ckfinder.html?type=Flash';
   config.filebrowserUploadUrl = '/public/Ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
   config.filebrowserImageUploadUrl = '/public/Ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
   config.filebrowserFlashUploadUrl = '/public/Ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

   //config.extraPlugins = 'video,lineheight,pastefromword';
    //config.extraPlugins = 'emoji';

};
