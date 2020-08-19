<?php
include 'conn.php';
$conexao = OpenCon();
$id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario=("DELETE FROM cgg WHERE id='$id' ");
$resultado_usuario=mysqli_query($conexao, $result_usuario);
?>

<script>
	window.open(document.referrer,'_self');
</script>


