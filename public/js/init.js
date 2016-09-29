$(document).ready(function () {

    //LightBox medias
    $('.fancybox').fancybox();

    //Alert before delete element
    $('.delete').on('click', function () {
       if(!confirm('Souhaitez-vous vraiment supprimer cet élément ?')) return false;
    });

    //Alert before duplicate element
    $('.duplicate').on('click', function () {
        if(!confirm('Souhaitez-vous vraiment dupliquer cet élément ?')) return false;
    });

});