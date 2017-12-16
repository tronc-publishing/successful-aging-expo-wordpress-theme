jQuery(document).ready(function() {

    var formfield;

    jQuery('.imgUploadBtn').click(function() {
        formfield = jQuery(this).prev('input');
        tb_show('','media-upload.php?TB_iframe=true');
        console.log('clicked');
        return false;
    });

    window.old_tb_remove = window.tb_remove;
    window.tb_remove = function() {
        window.old_tb_remove();
        formfield=null;
    };

    // window.send_to_editor(html) is how wp would normally handle the received data
    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html){
        if(formfield) {
            fileurl = jQuery('img',html).attr('src');
            jQuery(formfield).val(fileurl);
            tb_remove();
        } else {
            window.original_send_to_editor(html);
        }
    };
});
