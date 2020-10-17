$(document).ready(function() {
    //Associar o evento de click ao botão	
    $('#btn_tweet').click(function() {

        if ($('#texto_tweet').val().length > 0) { //o length vai retornar para nos a quantidade de caracteres dentro da nossa string

            $.ajax({
                url: 'inclui_tweet.php', //o caminho da requisição
                method: 'post',
                data: $('#form_tweet').serialize(), //quais são as informações que serão enviadas para o script
                success: function(data) { //caso a requisição seja feita com sucesso, vamos atribuir um função
                    $('#texto_tweet').val('');
                    atualizaTweet();
                }
            }); //a função ajax recebe um parãmetro json

        }
    });

    function atualizaTweet() {
        //carregar os tweets

        $.ajax({
            url: 'get_tweet.php',
            success: function(data) {
                $('#tweets').html(data);

            }
        });
    }

    atualizaTweet();
});

//procurar pessoas
$(document).ready(function(){

$('#btn_procurar_pessoa').click(function(){

if($('#nome_pessoa').val().length > 0){

$.ajax({

    url: 'get_pessoas.php',

    method: 'POST',

    data: $('#form_procurar_pessoas').serialize(),

    success: function(data){

        $('#pessoas').html(data);

        $('.btn_seguir').click(function(){

            var id_usuario = $(this).data('id_usuario');

            $('#btn_seguir_' + id_usuario).hide();

            $('#btn_deixar_seguir_' + id_usuario).show();

            $.ajax({

                url: 'seguir.php',

                method: 'POST',

                data: { seguir_id_usuario : id_usuario },

                success: function(data){

                    alert("Registro efetuado com sucesso!");

                }

            });

        });

        $('.btn_deixar_seguir').click(function(){

            var id_usuario = $(this).data('id_usuario');

            $('#btn_seguir_' + id_usuario).show();

            $('#btn_deixar_seguir_' + id_usuario).hide();

            $.ajax({

                url: 'deixar_seguir.php',

                method: 'POST',

                data: { deixar_seguir_id_usuario : id_usuario },

                success: function(data){

                    alert("Registro removido com sucesso!");

                }

            });

        });

    }

});

}

});

});