tinymce.init({ 
    selector:'textarea#MyTextArea',
    promotion: false,
    skin: 'oxide-dark',
    content_css: 'writer',
    placeholder: "Saisissez ici votre texte et mettez-le en forme !",
    language: 'fr_FR',
    plugins: 'advlist autolink link image lists charmap preview',
    external_plugins: {
        'maths': 'http://www.maths.com/plugin.min.js'
    },
    images_upload_url: 'postAcceptor.php',
    // automatic_uploads: false,
    images_upload_base_path: '/images',
    images_file_types: 'jpg,svg,webp,png'
});