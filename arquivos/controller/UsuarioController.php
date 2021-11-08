<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php
    include_once "../conexao/Conexao.php";
    include_once "../model/Usuario.php";
    include_once "../dao/UsuarioDAO.php";

    //instancia as classes
    $usuario = new Usuario();
    $usuariodao = new UsuarioDAO();

    //pega todos os dados passado por POST

    $d = filter_input_array(INPUT_POST);

    //se a operação for gravar entra nessa condição
    if(isset($_POST['cadastrar'])){

        $usuario->setNome($d['nome']);
        $usuario->setSobrenome($d['sobrenome']);
        $usuario->setIdade($d['idade']);
        $usuario->setSexo($d['sexo']);

        $usuariodao->create($usuario);

        header("Location: ../../");
    } 

    else if(isset($_POST['editar'])){
        $usuario->setNome($d['nome']);
        $usuario->setSobrenome($d['sobrenome']);
        $usuario->setIdade($d['idade']);
        $usuario->setSexo($d['sexo']);
        $usuario->setID($d['id']);

        $usuariodao->update($usuario);

        header("location: ../../");
    }
    
    else if(isset($_GET['del'])){

        $usuario->setId($_GET['del']);

        $usuariodao->delete($usuario);

        header("Location: ../../");
    }else{
        header("Location: ../../");
    }
    ?>