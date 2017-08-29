<?php

$nome = $_POST['nome'];
$profissao = $_POST['profissao'];
$tipo_de_moradia = $_POST['tipo de moradia'];
$idade = $_POST['idade'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);

$connect = mysql_connect('localhost','root','');
$db = mysql_select_db('mydb');
$query_select = "SELECT email
 FROM usuario WHERE email = '$email'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['email'];

  if($email == "" || $email == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.html';</script>";

    }else{
      if($logarray == $email){

        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
        die();

      }else{
        $query = "INSERT INTO usuarios (nome,profissao,tipo de moradia, idade, endereco, bairro, cidade, email, senha)
         VALUES ('$nome','$profissao','$tipo_de_moradia','$idade','$endereco','$bairro','$cidade','$email','$senha' )";
        $insert = mysql_query($query,$connect);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
        }
      }
    }




/*$sql =mysql_query ("INSERT INTO usuarios (nome,profissao,tipo de moradia, idade, endereco, bairro, cidade, email, senha)
 VALUES ('$nome','$profissao','$tipo_de_moradia','$idade','$endereco','$bairro','$cidade','$email','$senha' )");


/*1 $link = mysqli_connect("localhost", "root", "", "mydb");

 if (!$link) {
     echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
 }

 echo "Sucesso: Sucesso ao conectar-se com a base de dados MySQL." . PHP_EOL;

 mysqli_close($link);




$connect = mysql_connect('localhost','root','');
$db = mysql_select_db('mydb');
$query_select = "SELECT email FROM usuarios WHERE email = '$email'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['email'];

  if($email == "" || $email == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.html';</script>";

    }else{
      if($logarray == $email){

        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
        die();

      }else{
        $query = "INSERT INTO usuarios (nome,profissao,tipo de moradia, idade, endereco, bairro, cidade, email, senha)
         VALUES ('$nome','$profissao','$tipo_de_moradia','$idade','$endereco','$bairro','$cidade','$email','$senha' )";
        $insert = mysql_query($query,$connect);

        if($insert){

          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
        }
      }
    }
?>
