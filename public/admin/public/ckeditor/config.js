

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:

    config.extraPlugins = [
        'find' , 'dialog','font' , 'justify' , 'colorbutton' , 'lineheight' , 'colordialog' , 'uploadimage' ,
        'filebrowser' , 'uploadfile' ,
        'video'];

    config.language= 'fa';
    config.skin= 'moono-dark';



    /// horof bozorg dar avalesh
    config.toolbar = [
        { items: [  'Source' ] },
        { items: [  'Cut', 'Copy' , 'Paste' , 'PasteText' , 'PasteFromWord'] },
        { items: [ 'find'] },
        { items: ['Table' , 'SpecialChar' ,'HorizontalRule'] },
        { items: ['Anchor' , 'Image' , 'Video'] },
        { items: ['Link' , 'Unlink'] },
        { items: ['Maximize' , 'Blockquote'] },
        { items: [ 'JustifyBlock', 'JustifyRight', 'JustifyCenter', 'JustifyLeft'] },
        { items: ['NumberedList', 'BulletedList', 'Indent', 'Outdent'] },
        { items: ['Format' , 'Font' , 'FontSize'] },
        { items: ['Bold' , 'Italic' , 'Underline' , 'Strike'] },
        { items: ['Subscript', 'Superscript'] },
        { items: ['TextColor', 'BGColor']}
    ];


    config.filebrowserBrowseUrl="public/ckeditor/ckfinder/ckfinder.html";
    config.filebrowserImageBrowseUrl="public/ckeditor/ckfinder/ckfinder.html?type=Images";
    config.filebrowserFlashBrowseUrl="public/ckeditor/ckfinder/ckfinder.html?type=Flash";
    config.filebrowserUploadUrl="public/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files";
    config.filebrowserImageUploadUrl="public/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";
    config.filebrowserFlashUploadUrl="public/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";

};


