<!DOCTYPE html>
<html>

<head>
    <title>Meu Painel</title>
    <!-- Inclua os arquivos CSS e JavaScript do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f4f4f4;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            border-bottom: none;
        }
    </style>
</head>


<body>
    <div class="container2" style="display: none;" id="container2">
        <h1 class="text-center">Meu Painel</h1> <br><br>
        <div id="loading" style="display: flex; justify-content: center; align-items: center;">
            <img src="loading2.gif" alt="Loading...">
        </div>
        <h6 class="text-center">Importando... aguarde....</h6> <br><br>
    </div>


    <div class="container" id="container">
        <h1 class="text-center">Meu Painel</h1>
        <form action="app/importar.php" method="post" name="inserir">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Empresa
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <input type="text" class="form-control" name="empresa" value="01">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            TESTSETOR
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" name="setor">
                                <label class="form-check-label" for="gridCheck1">
                                    Importar Setor ?
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            TESTFABRICANTE
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" name="fabricante">
                                <label class="form-check-label" for="gridCheck1">
                                    Importar Fabricante ?
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            TESTGRUPO
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" name="grupo">
                                <label class="form-check-label" for="gridCheck1">
                                    Importar Grupo ?
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            TESTSUBGRUPO
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" name="sub_grupo">
                                <label class="form-check-label" for="gridCheck1">
                                    Importar SubGrupo ?
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            TESTMARCA
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" name="marca">
                                <label class="form-check-label" for="gridCheck1">
                                    Importar Marca ?
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            TESTEMBALAGEM
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" name="embalagem">
                                <label class="form-check-label" for="gridCheck1">
                                    Importar Embalagem ?
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            CLIENTES ?
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" name="cliente">
                                <label class="form-check-label" for="gridCheck1">
                                    Importar Clientes ?
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            PRODUTOS
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" name="produtos">
                                <label class="form-check-label" for="gridCheck1">
                                    Importar Produtos
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <br>
            <button id="meuBotao" type="submit" class="btn btn-primary" name="acionar_funcao_importar" value="Acionar Função" onclick="carregar()">IMPORTAR </button>
        </form>
    </div>
</body>

<script>
    function carregar() {
        document.getElementById("container").style.display = "none";
        document.getElementById("container2").style.display = "block";


    }
</script>


</html>