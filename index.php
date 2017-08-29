<?php
include("cabecalho.php");

include("logica-usuario.php");



verificaLoginSucesso();
verificaLogoutSucesso();


if(isset($_SESSION["danger"])) {
    mensagem('danger', $_SESSION["danger"]);
    unset($_SESSION["danger"]);
}

if(isset($_SESSION["success"])) {
    mensagem('success', $_SESSION["success"]);
    unset($_SESSION["success"]);
}

if (usuarioEstaLogado()) {
    mensagem('success', 'Você está logado como ' . usuarioLogado() );
    ?>
         <a href="logout.php">Deslogar</a></p>
    <?php
} else {
    ?>    

    <h1>Bem vindo!</h1>
    <h2>Login</h2>  
    <form action="login.php" method="post">
        <table class="table">
            <tr>
                <td>Email</td>
                <td><input class="form-control" type="email" name="email"></td>
            </tr>
            <tr>
                <td>Senha</td>
                <td><input class="form-control" type="password" name="senha"></td>
            </tr>
            <tr>
                <td><button type="submit" class="btn btn-primary">Login</button></td>
            </tr>
        </table>
    </form>
    <?php
}
?>

<?php include("rodape.php"); ?>
