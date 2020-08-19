<?php
#apagar o usuário
include 'conn.php';
$conexao = OpenCon();
$matricula=filter_input(INPUT_GET, 'matricula', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$result_usuario=("DELETE FROM usuarios WHERE matricula='$matricula' ");
$resultado_usuario=mysqli_query($conexao, $result_usuario);

#apagar todos os arquivos do usuário
include 'conn.php';
$conexao = OpenCon();
$matricula=filter_input(INPUT_GET, 'matricula', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$result_usuario=("DELETE FROM banco WHERE matricula='$matricula' ");
$resultado_usuario=mysqli_query($conexao, $result_usuario);

?>

<script>
	window.open(document.referrer,'_self');
</script>
