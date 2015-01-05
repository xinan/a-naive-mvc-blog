tinymce.init({
	selector:"textarea", 
	content_css: "/public/css/bootstrap.min.css",
	plugins: "advlist autolink lists link charmap preview wordcount visualblocks visualchars fullscreen insertdatetime table contextmenu emoticons",
	toolbar1: "undo redo | styleselect | bold italic underline strikethrough superscript subscript | alignleft aligncenter alignright alighjustify",
	toolbar2: "bullist numlist outdent indent | link table charmap emoticons | visualchars visualblocks fullscreen preview",
	browser_spellcheck: true, 
	menubar: false, 
	relative_urls: false, 
	auto_focus: "autofocus",
	visual_table_class: "table table-bordered",
	entity_encoding : "raw",
	invalid_elements : "script",
	style_formats: [
        {title: 'Heading', block: 'h2', classes: 'heading'},
        {title: 'Sub Heading', block: 'h3', classes: 'subheading'},
        {title: 'Paragraph', block: 'p', classes: 'paragraph'},
        {title: 'Code', block: 'code', classes: 'code'},
        {title: 'pre', block: 'pre', classes: 'pre'}
    ]
});