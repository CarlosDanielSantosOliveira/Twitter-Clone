<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <title>Twitter clone</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">


    <?php

    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $usuario_existe = false;
    $email_existe = false;

    //verificar se o usuário já existe
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' ";
    if ($resultado_id = mysqli_query($link, $sql)) {

        $dados_usuario = mysqli_fetch_array($resultado_id);

        if (isset($dados_usuario['usuario'])) {

            $usuario_existe = true;
        }
    } else {
        echo 'Erro ao tentar localizar o registro de usuário';
    }

    //verificar se o e-mail já existe
    $sql = "SELECT * FROM usuarios WHERE email = '$email' ";
    if ($resultado_id = mysqli_query($link, $sql)) {

        $dados_usuario = mysqli_fetch_array($resultado_id);

        if (isset($dados_usuario['email'])) {

            $email_existe = true;
        }
    } else {
        echo 'Erro ao tentar localizar o registro de email';
    }

    if ($usuario_existe || $email_existe) {

        $retorno_get = '';

        if ($usuario_existe) {
            $retorno_get .= "erro_usuario=1&";
        }

        if ($email_existe) {
            $retorno_get .= "erro_email=1&";
        }

        header('Location: inscrevase.php?' . $retorno_get);
        die();
    }

    $sql = "INSERT INTO usuarios (usuario, email, senha) VALUES ('$usuario', '$email', '$senha')";

    //executar a query
    if (mysqli_query($link, $sql)) {

        echo '<center> 
                    <div class="container panel registrado_sucesso">
                     <div class="conteudo_registra_sucesso">
                         Usuário registrado com sucesso!
                         </br>
                         <a href="index.php">
                            <div class="btn">                           
                                Voltar para a tela de login
                            </div>
                         </a>
                     </div>   
              </center>
                    </div>';
    } else {
        echo '<center> 
                         <div class="container panel registrado_sucesso">
                            <div class="conteudo_registra_sucesso">
                            Erro ao registrar o usuário
                            </br>
                                <a href="inscrevase.php">
                                    <div class="btn">                           
                                        Voltar para a tela de Cadastro
                                    </div>
                                </a>
                                    <a href="index.php">
                                        <div class="btn">                           
                                            Voltar para a tela de Login
                                        </div>
                                    </a>
                            </div>   
             </center>
                         </div>';
    }

    ?>
    </bodt