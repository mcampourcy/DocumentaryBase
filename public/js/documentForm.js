$(document).ready(function () {

    //WYSIWYG Editor SummerNote
    $('.summernote').summernote();

    //Lightbox medias
    $(".various").fancybox({
        maxWidth	: 1200,
        autoSize	: false
    });

    //MEDIAS
    $('#include_media .section-mediatheque .img-thumbnail').on('click', function() {
        $(this).toggleClass('selected');
    });

    // validation sélection d'images dans la popup
    $('#include_media #validation').on('click', function() {
        $('.images_liees').hide();
        $('.images_liees').empty();
        $('#include_media img.selected').each(function(k,v) {
            console.log($(this));
            $('.images_liees').append('<div class="bloc-img"><img src="' + $(this).attr('src') + '" alt="" class="img-thumbnail img-responsive img-liee" id="' + $(this).attr('id') + '"></div>');
        });//endeach
        $('.images_liees').show();
        $.fancybox.close();
    });

    // validation formulaire > maj la liste ids_images dans le champ hidden
    $('#form-document').on('submit', function() {
        ids_images = '';
        $('img.img-liee').each(function(k,v){
            if (k>0) ids_images += ',';
            ids_images += $(this).attr('id');
        });
        $('#ids_images').val(ids_images);
    });

    //Show subcat menu in doc edit

    showSubcat();

    $('#cat_id').on('change', function () {
        $('select#subcat_id').prop('selectedIndex', 0);
        showSubcat();
    });

    function showSubcat(){
        var cat_val = $('#cat_id').val();
        var option_subcat = $('select#subcat_id > option');

        if(cat_val > 0){
            $('.select_subcat').show();
            $('select#subcat_id').show();
        } else {
            $('.select_subcat').hide();
            $('select#subcat_id').hide().prop('selectedIndex', 0);
        }

        $.each(option_subcat, function() {
            var parent_id = $(this).attr('data_parent');
            if(parent_id != cat_val){
                $(this).hide();
            } else {
                $(this).show();
            }
        });

    }

});