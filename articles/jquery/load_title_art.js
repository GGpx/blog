$('#bouton').on('click', function () {
    $.post({
        url: "articles/controllers/load_article.php",
        data: {
            id: $('#id').val(),
            title: $("#title").val(),
            article: $("#article").val()
        },
        success: function (articles) {
            for(i=0 ; i < 3 ; i++){
            var template = $('.card').clone();
            $(".card .card-title").text(articles[i].title);
            $('.card .card-text').text(articles[i].article);
            $('.card').removeClass('card');
            $("#carte").append(template);
            };
        },
    dataType: "json"
    });
});



