$(document).ready(function () {

    //disable / require field in category creation

    showIcon();

    $('#id_parent').on('change', function () {
        showIcon();
        if(($(this).val()).length > 0){
            $('#cat_icon').attr('disabled', 'disabled');
            $('#cat_icon').removeAttr('required');
            $(this).attr('required', 'required');
        } else {
            $('#cat_icon').removeAttr('disabled');
            $('#cat_icon').attr('required', 'required');
            $(this).removeAttr('required');
        }
    });

    $('#cat_icon').on('input', function () {
        if(($(this).val()).length > 0){
            $('#id_parent').attr('disabled', 'disabled');
            $('#id_parent').removeAttr('required');
            $(this).attr('required', 'required');
        } else {
            $('#id_parent').removeAttr('disabled');
            $('#id_parent').attr('required', 'required');
            $(this).removeAttr('required');
        }
    });

    function showIcon(){
        var form_icon = $('#form_icon');
        var option_cat = $('select#id_parent');

        form_icon.show();

        $.each(option_cat, function () {
            if($(this).val() > 0){
                form_icon.hide();
            }
        });
    }

});