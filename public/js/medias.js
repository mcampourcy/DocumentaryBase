$(document).ready(function() {

    //Upload medias
    $('#form_mediatheque').on('submit', function(e) {
        e.preventDefault();
        var formdata = new FormData($(this)[0]);

        $.ajax({
            url: 'http://localhost/projets/zeproject/public/media/new/post',
            type: "POST",
            data: formdata,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: showMessages,
            error: showMessages
        });

    });

    //Show error and success messages after upload
    function showMessages(data) {
        var uploads = data.uploads;
        for(var ii = 0; ii < uploads.length; ii++){
            if(uploads[ii].media_ext === ('jpg' || 'png')){
                $('#images .text-doc').prepend(
                    '<div class="bloc-img">' +
                        '<div class="bloc-info">' +
                            '<div class="info">' +
                                '<a ' +
                                    'href="'+ uploads[ii].media_url +'" ' +
                                    'class="view text-info" ' +
                                    'data-toggle="lightbox" ' +
                                    'data-title="' + uploads[ii].media_title +
                                    '">' +
                                        '<i class="fa fa-eye"></i>' +
                                '</a>' +
                                '<a href="media/delete*media-'+ uploads[ii].media_id +'" class="delete text-danger">' +
                                    '<i class="fa fa-close"></i>' +
                                '</a>' +
                            '</div>' +
                        '</div>' +
                        '<a href="'+ uploads[ii].media_url +'">' +
                            '<img src="'+ uploads[ii].media_url +'" alt="" class="img-thumbnail img-responsive">' +
                        '</a>' +
                    '</div>');
            }else if(uploads[ii].media_ext === ('pdf' || 'doc')){
                $('#documents .text-doc').append(
                    '<div class="bloc-img text-center">' +
                        '<div class="bloc-info">' +
                            '<div class="info">' +
                                '<a href="'+ uploads[ii].media_url +'" class="view text-info" target="_blank">' +
                                    '<i class="fa fa-eye"></i>' +
                                '</a>' +
                                '<a href="media/delete*media-'+ uploads[ii].media_id +'" class="delete text-danger">' +
                                    '<i class="fa fa-close"></i>' +
                                '</a>' +
                            '</div>' +
                        '</div>' +
                        '<img ' +
                            'src="images/icon-'+ uploads[ii].media_ext +'.png" ' +
                            'alt="" ' +
                            'class="img-thumbnail img-responsive" ' +
                            'style="height: auto">' +
                        '<p><strong>'+ uploads[ii].media_title +'</strong></p>' +
                    '</div>');
            }
        }//endfor
        $('#form_m').slideDown(function() {
            $('#form_m').empty();
            if(data.success != ''){
                $('#form_m').append('<p class="bg-success">' + data.success + '</p>');
            }
            for(var ii = 0; ii < data.error.length; ii++){
                $('#form_m').append('<p class="bg-danger">' + data.error[ii] + '</p>');
            }
            setTimeout(function() {
                $('#form_m').slideUp();
            }, 5000);
        });
        $('#form_mediatheque')[0].reset();
    }

});

