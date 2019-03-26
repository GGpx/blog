$('#valider').on('click', function () {
    $.post({
        url: "articles/controllers/save_article.php",
        data: {
            id: $('#id').val(),
            title: $("#title").val(),
            article: $("#article").val()
        },
        success: function (articles) {
            // for(i=0 ; i < 3 ; i++){
            var template = $('.div_bdd').clone();
            $('#c_id').text(articles.id);
            $("#c_title").text(articles.title);
            $('#c_article').text(articles.article);
            $("#title_art").append(template);
            // };
        },
    dataType: "json"
    });
});