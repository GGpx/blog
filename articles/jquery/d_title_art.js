$('#supprimer').on('click',function () {
    $.post({
        url: "articles/controllers/delete_article.php",
        data: {
            id: $('#id').val(),
        },
        success: function () {
            alert('kkdfkkf');
            // for(i=0 ; i < 3 ; i++){
            // var template = $('.div_bdd');
            // template.html(articles.id);

            // $("#title_art").remove(template);
            // };
        },
    dataType: "json"
    });
});