tinymce.init({ 
    selector:'textarea#MyTextArea',
    promotion: false,
    skin: 'oxide-dark',
    content_css: 'writer',
    placeholder: "Saisissez ici votre texte et mettez-le en forme !",
    language: 'fr_FR',
    plugins: 'advlist autolink link image lists charmap preview code',
    external_plugins: {
        'maths': 'http://www.maths.com/plugin.min.js'
    },
    images_upload_url: 'upload.php',
});