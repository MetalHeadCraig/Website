<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=4a5750emszqk1kng6oe7006z1bc1pvri8zaumnx979w4bllf"></script>
<script>
tinymce.init({
  selector: 'textarea#local-upload',
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'],
  toolbar: 'undo redo | formatselect | bold italic underline backcolor | link unlink | image code | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ],

  /* without images_upload_url set, Upload tab won't show up*/
  images_upload_url: 'uploadimage.php',
  images_upload_base_path: '../images/',
});

</script>