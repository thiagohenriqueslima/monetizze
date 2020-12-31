<?php

require_once('LoteriaService.php');

$loteriaService = new LoteriaService(6, 1);
$loteriaService->gerarJogos();
$loteriaService->realizarSorteio();
$resultado = $loteriaService->confereResultado();

echo $resultado;