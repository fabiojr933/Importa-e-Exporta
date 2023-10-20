<?php
require 'exportacao.php';


if (isset($_POST['acionar_funcao_importar'])) {

    $empresa = $_POST['empresa'];

    $setor = $_POST['setor'];
    if ($setor == 'on') {
        $db = new Exportacao();
        $db->setorInsert($empresa);
    }

    $fabricante = $_POST['fabricante'];
    if ($fabricante == 'on') {
        $db = new Exportacao();
        $db->fabricanteInsert();
    }

    $grupo = $_POST['grupo'];
    if ($grupo == 'on') {
        $db = new Exportacao();
        $db->grupoTributacaoInsert($empresa);
        $db->contaSpedInsert();
        $db->grupoInsert($empresa);
    }

    $sub_grupo = $_POST['sub_grupo'];
    if ($sub_grupo == 'on') {
        $db = new Exportacao();
        $db->sub_grupoInsert($empresa);
    }


    $marca = $_POST['marca'];
    if ($marca == 'on') {
        $db = new Exportacao();
        $db->marcaInsert();
    }

    $embalagem = $_POST['embalagem'];
    if ($embalagem == 'on') {
        $db = new Exportacao();
        $db->embalagemInsert();
    }

    $produtos = $_POST['produtos'];
    if ($produtos == 'on') {
        $db = new Exportacao();
        $db->unidadeRefInsert();
        $db->produtosInsert();
        $db->produtos2Insert($empresa);
        $db->tabelaPrecoProdutosInsert($empresa);
        $db->estoquerodutosInsert($empresa);
    }

    $cliente = $_POST['cliente'];
    if ($cliente == 'on') {
        $db = new Exportacao();
        $db->clienteGeralInsert();
    }

    header("Location: ../index.php");
    exit;
}
