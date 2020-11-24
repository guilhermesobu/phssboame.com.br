<div class="row rounded mb-4 justify-content-center bg-orange text-white">

    <div class="col-lg-4 col-10 py-4 align-self-center">
        <p>Planos de saúde com atendimento em Americana e Santa Barbara d’Oeste.</p>
        <p>Com hospitais em ambas as cidades e rede credenciada de médicos com 1600 profissionais.</p>
        <p>Centro de atendimento para agilizar as consultas e espaço Saúde para melhor atender todos os nossos clientes.</p>
        <p>Planos familiares e empresarias, a partir de duas pessoas e a partir da MEI.</p>
        <p>Faça já uma cotação e aproveite o que a vida tem de melhor para você!</p>
    </div>
    
    <div class="col-1 d-none d-lg-block border-right my-4"></div>

    <div class="col-lg-6 col-10 py-4">
        <h2 class="text-center pb-2">Entre em contato prenchendo o formulário.</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">


            <div class="form-group row">
                <label for="mailname" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="realname" id="mailname" placeholder="Digite aqui seu NOME">
                </div>
            </div>

            <div class="form-group row">
                <label for="mailphone" class="col-sm-2 col-form-label">Telefone</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="phone" id="mailphone" placeholder="Digite aqui seu TELEFONE">
                </div>
            </div>

            <div class="form-group row">
                <label for="mailemail" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" name="eMail" id="mailemail" placeholder="Digite aqui seu E-MAIL">
                </div>
            </div>

            <div class="form-group row">
                <label for="mailcity" class="col-sm-2 col-form-label">Cidade</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="city" id="mailcity" placeholder="Digite aqui a CIDADE em que você mora">
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label for="mailplans" class="col-sm-2 col-form-label py-0">Tipo de Plano</label>
                <div class="col-sm-10">
                <select class="form-control" name="plans" id="mailplans">
                    <option value="juridico">Pessoa Jurídica</option>
                    <option value="fisico">Pessoa Física</option>
                </select>
                </div>
            </div>

            <div class="form-group row align-items-center">
                <label for="mailtext" class="col-sm-2 col-form-label">Mensagem</label>
                <div class="col-sm-10">
                    <textarea class="form-control" type="text" name="texto" id="mailtext"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center my-3 pt-3">
                    <button class="btn bg-blue text-wine align-self-center" type="submit" value="Enviar" id="mailbtn"><b>ENVIAR MENSAGEM<b></button>
                </div>
            </div>

        </form>
    </div>

</div>

<?php

if (!isset($_POST["eMail"])) {
?>

<?php } else {
    function checaDados($vet)
    {
        foreach ($vet as $val) {
            if (preg_match("/(%0A|%0D|\n+|\r+)/i", $val) != 0) {
                echo "Tentativa de injeção de dados.";
                return 1;
            }
        }
        return 0;
    }

    //Const
    define("TO", "naiara@candidaadv.com.br");               //AQUI PRECISA MUDAR
    define("ASS", "Contato via p&Aacute;gina WEB.");
    //if (checaDados($_POST)){ exit(1); }
    // send mail :
    $_POST['message'] = "Mensagem de " . $_POST['realname'] . "\nEmail: " . $_POST['eMail'];
    $_POST['message'] .= "\n\n" . $_POST['texto'];
    $_POST['eMail'] = "From: " . $_POST['eMail'];
    if (mail(TO, ASS, $_POST['message'], $_POST['eMail'])) {
        // display confirmation message if mail sent successfully
        //header("Location: obrigado.html");
        //Para utilizar a funcao header nao pode haver nenhum dado enviado antes do header
        //Redirecionamento por META tag:
        echo "<script>
            var mailModalJs = document.querySelector('#mailModalBtn');
            setTimeout(()=>{mailModalJs.click();}, 1);
            console.log('Mensagem de sucesso mostrada.');
        </script>";
    } else {
        // sending failed, display error message
        echo "<p>Seu e-mail nao p&ocirc;de ser enviado.</p>";
    }
} //else
?>