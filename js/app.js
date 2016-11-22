(function($){

    //Chargement des articles toute les 5 secondes
    setInterval(function() {
        $('#article').load('post/article.php');
    }, 1000);

    $('#addPost').submit(function() {
        var errors = false;
        var errorName = false;
        var errorContent = false;
        var name = $('#name').val();
        var content = $('#content').val();

        if(name == "") {
            errorName = "est obligatoire";
            errors = true;
        }

        if(content == "") {
            errorContent = "est obligatoire";
            errors = true;
        }

        if(errors == true) {
            $('#error_name').text(errorName);
            $('#error_content').text(errorContent);
        }else {
            if (errors == false) {
                $('#error_name').fadeOut();
                $('#error_content').fadeOut();
            }
            $.ajax({
                url: 'post/addPost.php',
                data: {
                    name: $('#name').val(),
                    content: $('#content').val()
                },
                type: 'POST',

                success: function(response) {
                    $('#success').text(response).fadeIn();
                    setInterval(function() {
                        $('#success').fadeOut();
                    }, 2000);
                    document.getElementById('addPost').reset();
                },

                error: function(response) {
                    console.log('Error: ' + response);
                }
            });
        }

        return false;
    });
})(jQuery);