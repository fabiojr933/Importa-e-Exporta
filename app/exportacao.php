<?php
require 'config.php';
require 'connOrigem.php'; // Inclua o arquivo de conexão
require 'connDestino.php';

set_time_limit(30000);

class Exportacao
{
    public function produtosInsert()
    {


        // Crie uma instância da classe Database
        $dbOrigem = new DatabaseOrigem(ip_origem, caminho_origem, usuario_origem, senha_origem);
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connOrigem = $dbOrigem->connectOrigem();
        $connDestino = $dbDestino->connectDestino();

        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TESTPRODUTOGERAL";
        $result = $connOrigem->query($query);



        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            // Processar os resultados
            $CODIGO                         = $row['CODIGO'];
            $DESCRICAO                      = $row['DESCRICAO'];
            $FABRICANTE                     = $row['FABRICANTE'];
            $DESCRICAOREDUZIDA              = $row['DESCRICAOREDUZIDA'];
            $DESCRICAOGRADE                 = $row['DESCRICAOGRADE'];
            $CODIGOBARRA                    = $row['CODIGOBARRA'];
            $CODIGOFABRICA                  = $row['CODIGOFABRICA'];
            $REFERENCIA                     = $row['REFERENCIA'];
            $MARCA                          = $row['MARCA'];
            $EMBALAGEM                      = $row['EMBALAGEM'];
            $QTDEEMBALAGEM                  = $row['QTDEEMBALAGEM'];
            $PESOBRUTO                      = $row['PESOBRUTO'];
            $GRUPOICMS                      = '01';


            //ESSE CAMPO NÃO PERNITE NULL, VERIFICA SE A FOREIGN KEY ESTA NULL, CASO ESTIVER ELE BUSCA PRIMEIRA OPÇÃO NA TABELA RELACIONADA
            if ($GRUPOICMS <> '01' || $GRUPOICMS <> '02') {

                $queryIcms = "SELECT FIRST 1  A.CODIGOID FROM TESTGRUPOICMS A";
                $resulIcms = $connDestino->query($queryIcms);
                $rowIcms = $resulIcms->fetch(PDO::FETCH_ASSOC);
                $GRUPOICMS = $rowIcms['CODIGOID'];
            }
            $PESOLIQUIDO                    = $row['PESOLIQUIDO'];
            $APLICACAO                      = $row['APLICACAO'];
            $COMPOSICAO                     = $row['COMPOSICAO'];
            $OBSERVACAO                     = $row['OBSERVACAO'];
            $DATACADASTRO                   = $row['DATACADASTRO'];
            $USUARIO                        = $row['USUARIO'];
            $USAMILHAR                      = $row['USAMILHAR'];
            $PRODUTOPRINCIPAL               = $row['PRODUTOPRINCIPAL'];
            $PRODUTOCOMPRA                  = $row['PRODUTOCOMPRA'];
            $IMAGEPRODUTO                   = $row['IMAGEPRODUTO'];
            $ESPESSURA                      = $row['ESPESSURA'];
            $LARGURA                        = $row['LARGURA'];
            $COMPRIMENTO                    = $row['COMPRIMENTO'];
            $CBM                            = $row['CBM'];
            $INCENTIVOFISCAL                = $row['INCENTIVOFISCAL'];
            $FATOR                          = $row['FATOR'];
            $TIPOFATOR                      = $row['TIPOFATOR'];
            $CLASSIFICACAOFISCAL            = $row['CLASSIFICACAOFISCAL'];
            $IDCELULA                       = $row['IDCELULA'];
            $PRODUTOGRADE                   = $row['PRODUTOGRADE'];
            $DIFERENCIADOPRECOS             = $row['DIFERENCIADOPRECOS'];
            $DIFERENCIADOOUTROS             = $row['DIFERENCIADOOUTROS'];
            $IPI                            = $row['IPI'];
            $IDCLASSIFICACAO                = $row['IDCLASSIFICACAO'];
            $INFORMACAOEMBALAGEM            = $row['INFORMACAOEMBALAGEM'];
            $GENERONCM                      = $row['GENERONCM'];
            $CODIGOSERVICOCLASS             = $row['CODIGOSERVICOCLASS'];
            $TIPOIPIENTRADA                 = $row['TIPOIPIENTRADA'];
            $TIPOIPISAIDA                   = $row['TIPOIPISAIDA'];
            $CLASSEENQUADRAMENTO            = $row['CLASSEENQUADRAMENTO'];
            $CODIGOENQUADRAMENTO            = $row['CODIGOENQUADRAMENTO'];
            $CODIGOSITPIS                   = $row['CODIGOSITPIS'];
            $ALIQPIS                        = $row['ALIQPIS'];
            $ALIQPISST                      = $row['ALIQPISST'];
            $CODIGOSITCOFINS                = $row['CODIGOSITCOFINS'];
            $ALIQCOFINS                     = $row['ALIQCOFINS'];
            $ALIQCOFINSST                   = $row['ALIQCOFINSST'];
            $CODIGOCOMBUSTIVEL              = $row['CODIGOCOMBUSTIVEL'];
            $TIPOIPIDEVCOMPRA               = $row['TIPOIPIDEVCOMPRA'];
            $DIASVALIDADE                   = $row['DIASVALIDADE'];
            $CODIGOMAPA                     = $row['CODIGOMAPA'];
            $IDESTGIRO                      = $row['IDESTGIRO'];
            $PESOEMBALAGEM                  = $row['IDESTGIRO'];
            $CODIGOSITCOFINSENTRADA         = $row['CODIGOSITCOFINSENTRADA'];
            $CODIGOSITPISENTRADA            = $row['CODIGOSITPISENTRADA'];
            $SIGLAMATERIALEMBALAGEM         = $row['SIGLAMATERIALEMBALAGEM'];
            $SIGLAEMBALAGEM                 = $row['SIGLAEMBALAGEM'];
            $EXPORTARINDEA                  = $row['EXPORTARINDEA'];
            $UNIDADEMEDIDAINDEA             = $row['UNIDADEMEDIDAINDEA'];
            $EMBTRIBUTAVEL                  = $row['EMBTRIBUTAVEL'];
            $GTINTRIBUTAVEL                 = $row['GTINTRIBUTAVEL'];
            $CODIGOANTERIOR                 = $row['CODIGOANTERIOR'];
            $TIPOIPIDEVVENDA                = $row['TIPOIPIDEVVENDA'];
            $IPIPAUTAUNIT                   = $row['IPIPAUTAUNIT'];
            $FATORCONVERSAOEMBTRIBUTAVEL    = $row['FATORCONVERSAOEMBTRIBUTAVEL'];
            $EXCECAONCM                     = $row['EXCECAONCM'];
            $CODIGONBS                      = $row['CODIGONBS'];
            $M3COMPRIMENTO                  = $row['M3COMPRIMENTO'];
            $M3LARGURA                      = $row['M3LARGURA'];
            $M3ALTURA                       = $row['M3ALTURA'];
            $DATAHORAALTERACAO              = $row['DATAHORAALTERACAO'];
            $ENVIAREMBTRIBUTAVELSPED        = $row['ENVIAREMBTRIBUTAVELSPED'];
            $MOVIMENTACAOFISICA             = $row['MOVIMENTACAOFISICA'];
            $IMPRIMEOBSNFE                  = $row['IMPRIMEOBSNFE'];
            $INDICADORMEDICAMENTO           = $row['INDICADORMEDICAMENTO'];
            $TIPOPRODUTOMEDICAMENTO         = $row['TIPOPRODUTOMEDICAMENTO'];
            $IDCOMBUSTIVEL                  = $row['IDCOMBUSTIVEL'];
            $FATORCONVERSAOCOLORANTE        = $row['FATORCONVERSAOCOLORANTE'];
            $IDCEST                         = $row['IDCEST'];


            if ($IDCEST >= 1) {
                $queryIdcest = "SELECT A.IDCEST FROM TESTCEST A WHERE A.IDCEST = $IDCEST ";
                $resultIdcest = $connDestino->query($queryIdcest);
                $rowIdcest = $resultIdcest->fetch(PDO::FETCH_ASSOC);

                if ($rowIdcest == null) {
                    $query2Idcest = "SELECT FIRST 1 A.IDCEST FROM TESTCEST A ";
                    $result2Idcest = $connDestino->query($query2Idcest);
                    $row2Idcest = $result2Idcest->fetch(PDO::FETCH_ASSOC);
                    $IDCEST = $row2Idcest['IDCEST'];
                }
            }
            $IDPRODUTOUNIDADEREFERENCIA     = $row['IDPRODUTOUNIDADEREFERENCIA'];
            $OBS                            = $row['OBS'];
            $PRODUTOCOMFOTO                 = $row['PRODUTOCOMFOTO'];
            $INCLUIFRETEBASECALCULOICMS     = $row['INCLUIFRETEBASECALCULOICMS'];
            $DESCRICAOESTENDIDANFE          = $row['DESCRICAOESTENDIDANFE'];
            $USADESCRICAOESTENDIDANFE       = $row['USADESCRICAOESTENDIDANFE'];

            $sql = "UPDATE OR INSERT INTO TESTPRODUTOGERAL 
                        (CODIGO, 
                        DESCRICAO, 
                        FABRICANTE, 
                        DESCRICAOREDUZIDA, 
                        DESCRICAOGRADE, 
                        CODIGOBARRA, 
                        CODIGOFABRICA, 
                        REFERENCIA, 
                        MARCA, 
                        EMBALAGEM, 
                        QTDEEMBALAGEM, 
                        PESOBRUTO, 
                        GRUPOICMS, 
                        PESOLIQUIDO, 
                        APLICACAO, 
                        COMPOSICAO, 
                        OBSERVACAO, 
                        DATACADASTRO, 
                        USUARIO, 
                        USAMILHAR, 
                        PRODUTOPRINCIPAL, 
                        PRODUTOCOMPRA, 
                        IMAGEPRODUTO, 
                        ESPESSURA, 
                        LARGURA, 
                        COMPRIMENTO, 
                        CBM, 
                        INCENTIVOFISCAL, 
                        FATOR, 
                        TIPOFATOR, 
                        CLASSIFICACAOFISCAL, 
                        IDCELULA, 
                        PRODUTOGRADE, 
                        DIFERENCIADOPRECOS, 
                        DIFERENCIADOOUTROS, 
                        IPI, 
                        IDCLASSIFICACAO, 
                        INFORMACAOEMBALAGEM, 
                        GENERONCM, 
                        CODIGOSERVICOCLASS, 
                        TIPOIPIENTRADA, 
                        TIPOIPISAIDA, 
                        CLASSEENQUADRAMENTO, 
                        CODIGOENQUADRAMENTO, 
                        CODIGOSITPIS, 
                        ALIQPIS, 
                        ALIQPISST, 
                        CODIGOSITCOFINS, 
                        ALIQCOFINS, 
                        ALIQCOFINSST, 
                        CODIGOCOMBUSTIVEL, 
                        TIPOIPIDEVCOMPRA, 
                        DIASVALIDADE, 
                        CODIGOMAPA, 
                        IDESTGIRO, 
                        PESOEMBALAGEM, 
                        CODIGOSITCOFINSENTRADA, 
                        CODIGOSITPISENTRADA, 
                        SIGLAMATERIALEMBALAGEM, 
                        SIGLAEMBALAGEM, 
                        EXPORTARINDEA, 
                        UNIDADEMEDIDAINDEA, 
                        EMBTRIBUTAVEL, 
                        GTINTRIBUTAVEL, 
                        CODIGOANTERIOR, 
                        TIPOIPIDEVVENDA, 
                        IPIPAUTAUNIT, 
                        FATORCONVERSAOEMBTRIBUTAVEL, 
                        EXCECAONCM, 
                        CODIGONBS, 
                        M3COMPRIMENTO, 
                        M3LARGURA, 
                        M3ALTURA, 
                        DATAHORAALTERACAO, 
                        ENVIAREMBTRIBUTAVELSPED, 
                        MOVIMENTACAOFISICA, 
                        IMPRIMEOBSNFE, 
                        INDICADORMEDICAMENTO, 
                        TIPOPRODUTOMEDICAMENTO, 
                        IDCOMBUSTIVEL, 
                        FATORCONVERSAOCOLORANTE, 
                        IDCEST, 
                        IDPRODUTOUNIDADEREFERENCIA, 
                        OBS, 
                        PRODUTOCOMFOTO, 
                        INCLUIFRETEBASECALCULOICMS, 
                        DESCRICAOESTENDIDANFE, 
                        USADESCRICAOESTENDIDANFE) 
                        VALUES 
                        (:CODIGO, 
                        :DESCRICAO, 
                        :FABRICANTE, 
                        :DESCRICAOREDUZIDA, 
                        :DESCRICAOGRADE, 
                        :CODIGOBARRA, 
                        :CODIGOFABRICA, 
                        :REFERENCIA, 
                        :MARCA, 
                        :EMBALAGEM, 
                        :QTDEEMBALAGEM, 
                        :PESOBRUTO, 
                        :GRUPOICMS, 
                        :PESOLIQUIDO, 
                        :APLICACAO, 
                        :COMPOSICAO, 
                        :OBSERVACAO, 
                        :DATACADASTRO, 
                        :USUARIO, 
                        :USAMILHAR, 
                        :PRODUTOPRINCIPAL, 
                        :PRODUTOCOMPRA, 
                        :IMAGEPRODUTO, 
                        :ESPESSURA, 
                        :LARGURA, 
                        :COMPRIMENTO, 
                        :CBM, 
                        :INCENTIVOFISCAL, 
                        :FATOR, 
                        :TIPOFATOR, 
                        :CLASSIFICACAOFISCAL, 
                        :IDCELULA, 
                        :PRODUTOGRADE, 
                        :DIFERENCIADOPRECOS, 
                        :DIFERENCIADOOUTROS, 
                        :IPI, 
                        :IDCLASSIFICACAO, 
                        :INFORMACAOEMBALAGEM, 
                        :GENERONCM, 
                        :CODIGOSERVICOCLASS, 
                        :TIPOIPIENTRADA, 
                        :TIPOIPISAIDA, 
                        :CLASSEENQUADRAMENTO, 
                        :CODIGOENQUADRAMENTO, 
                        :CODIGOSITPIS, 
                        :ALIQPIS, 
                        :ALIQPISST, 
                        :CODIGOSITCOFINS, 
                        :ALIQCOFINS, 
                        :ALIQCOFINSST, 
                        :CODIGOCOMBUSTIVEL, 
                        :TIPOIPIDEVCOMPRA, 
                        :DIASVALIDADE, 
                        :CODIGOMAPA, 
                        :IDESTGIRO, 
                        :PESOEMBALAGEM, 
                        :CODIGOSITCOFINSENTRADA, 
                        :CODIGOSITPISENTRADA, 
                        :SIGLAMATERIALEMBALAGEM, 
                        :SIGLAEMBALAGEM, 
                        :EXPORTARINDEA, 
                        :UNIDADEMEDIDAINDEA, 
                        :EMBTRIBUTAVEL, 
                        :GTINTRIBUTAVEL, 
                        :CODIGOANTERIOR, 
                        :TIPOIPIDEVVENDA, 
                        :IPIPAUTAUNIT, 
                        :FATORCONVERSAOEMBTRIBUTAVEL, 
                        :EXCECAONCM, 
                        :CODIGONBS, 
                        :M3COMPRIMENTO, 
                        :M3LARGURA, 
                        :M3ALTURA, 
                        :DATAHORAALTERACAO, 
                        :ENVIAREMBTRIBUTAVELSPED, 
                        :MOVIMENTACAOFISICA, 
                        :IMPRIMEOBSNFE, 
                        :INDICADORMEDICAMENTO, 
                        :TIPOPRODUTOMEDICAMENTO, 
                        :IDCOMBUSTIVEL, 
                        :FATORCONVERSAOCOLORANTE, 
                        :IDCEST, 
                        :IDPRODUTOUNIDADEREFERENCIA, 
                        :OBS, 
                        :PRODUTOCOMFOTO, 
                        :INCLUIFRETEBASECALCULOICMS, 
                        :DESCRICAOESTENDIDANFE, 
                        :USADESCRICAOESTENDIDANFE) MATCHING (CODIGO)";

            // Prepare a consulta
            $stmt = $connDestino->prepare($sql);

            // Associe os valores aos parâmetros na consulta
            $stmt->bindParam(':CODIGO', $CODIGO);
            $stmt->bindParam(':DESCRICAO', $DESCRICAO);
            $stmt->bindParam(':FABRICANTE', $FABRICANTE);
            $stmt->bindParam(':DESCRICAOREDUZIDA', $DESCRICAOREDUZIDA);
            $stmt->bindParam(':DESCRICAOGRADE', $DESCRICAOGRADE);
            $stmt->bindParam(':CODIGOBARRA', $CODIGOBARRA);
            $stmt->bindParam(':CODIGOFABRICA', $CODIGOFABRICA);
            $stmt->bindParam(':REFERENCIA', $REFERENCIA);
            $stmt->bindParam(':MARCA', $MARCA);
            $stmt->bindParam(':EMBALAGEM', $EMBALAGEM);
            $stmt->bindParam(':QTDEEMBALAGEM', $QTDEEMBALAGEM);
            $stmt->bindParam(':PESOBRUTO', $PESOBRUTO);
            $stmt->bindParam(':GRUPOICMS', $GRUPOICMS);
            $stmt->bindParam(':PESOLIQUIDO', $PESOLIQUIDO);
            $stmt->bindParam(':APLICACAO', $APLICACAO);
            $stmt->bindParam(':COMPOSICAO', $COMPOSICAO);
            $stmt->bindParam(':OBSERVACAO', $OBSERVACAO);
            $stmt->bindParam(':DATACADASTRO', $DATACADASTRO);
            $stmt->bindParam(':USUARIO', $USUARIO);
            $stmt->bindParam(':USAMILHAR', $USAMILHAR);
            $stmt->bindParam(':PRODUTOPRINCIPAL', $PRODUTOPRINCIPAL);
            $stmt->bindParam(':PRODUTOCOMPRA', $PRODUTOCOMPRA);
            $stmt->bindParam(':IMAGEPRODUTO', $IMAGEPRODUTO);
            $stmt->bindParam(':ESPESSURA', $ESPESSURA);
            $stmt->bindParam(':LARGURA', $LARGURA);
            $stmt->bindParam(':COMPRIMENTO', $COMPRIMENTO);
            $stmt->bindParam(':CBM', $CBM);
            $stmt->bindParam(':INCENTIVOFISCAL', $INCENTIVOFISCAL);
            $stmt->bindParam(':FATOR', $FATOR);
            $stmt->bindParam(':TIPOFATOR', $TIPOFATOR);
            $stmt->bindParam(':CLASSIFICACAOFISCAL', $CLASSIFICACAOFISCAL);
            $stmt->bindParam(':IDCELULA', $IDCELULA);
            $stmt->bindParam(':PRODUTOGRADE', $PRODUTOGRADE);
            $stmt->bindParam(':DIFERENCIADOPRECOS', $DIFERENCIADOPRECOS);
            $stmt->bindParam(':DIFERENCIADOOUTROS', $DIFERENCIADOOUTROS);
            $stmt->bindParam(':IPI', $IPI);
            $stmt->bindParam(':IDCLASSIFICACAO', $IDCLASSIFICACAO);
            $stmt->bindParam(':INFORMACAOEMBALAGEM', $INFORMACAOEMBALAGEM);
            $stmt->bindParam(':GENERONCM', $GENERONCM);
            $stmt->bindParam(':CODIGOSERVICOCLASS', $CODIGOSERVICOCLASS);
            $stmt->bindParam(':TIPOIPIENTRADA', $TIPOIPIENTRADA);
            $stmt->bindParam(':TIPOIPISAIDA', $TIPOIPISAIDA);
            $stmt->bindParam(':CLASSEENQUADRAMENTO', $CLASSEENQUADRAMENTO);
            $stmt->bindParam(':CODIGOENQUADRAMENTO', $CODIGOENQUADRAMENTO);
            $stmt->bindParam(':CODIGOSITPIS', $CODIGOSITPIS);
            $stmt->bindParam(':ALIQPIS', $ALIQPIS);
            $stmt->bindParam(':ALIQPISST', $ALIQPISST);
            $stmt->bindParam(':CODIGOSITCOFINS', $CODIGOSITCOFINS);
            $stmt->bindParam(':ALIQCOFINS', $ALIQCOFINS);
            $stmt->bindParam(':ALIQCOFINSST', $ALIQCOFINSST);
            $stmt->bindParam(':CODIGOCOMBUSTIVEL', $CODIGOCOMBUSTIVEL);
            $stmt->bindParam(':TIPOIPIDEVCOMPRA', $TIPOIPIDEVCOMPRA);
            $stmt->bindParam(':DIASVALIDADE', $DIASVALIDADE);
            $stmt->bindParam(':CODIGOMAPA', $CODIGOMAPA);
            $stmt->bindParam(':IDESTGIRO', $IDESTGIRO);
            $stmt->bindParam(':PESOEMBALAGEM', $PESOEMBALAGEM);
            $stmt->bindParam(':CODIGOSITCOFINSENTRADA', $CODIGOSITCOFINSENTRADA);
            $stmt->bindParam(':CODIGOSITPISENTRADA', $CODIGOSITPISENTRADA);
            $stmt->bindParam(':SIGLAMATERIALEMBALAGEM', $SIGLAMATERIALEMBALAGEM);
            $stmt->bindParam(':SIGLAEMBALAGEM', $SIGLAEMBALAGEM);
            $stmt->bindParam(':EXPORTARINDEA', $EXPORTARINDEA);
            $stmt->bindParam(':UNIDADEMEDIDAINDEA', $UNIDADEMEDIDAINDEA);
            $stmt->bindParam(':EMBTRIBUTAVEL', $EMBTRIBUTAVEL);
            $stmt->bindParam(':GTINTRIBUTAVEL', $GTINTRIBUTAVEL);
            $stmt->bindParam(':CODIGOANTERIOR', $CODIGOANTERIOR);
            $stmt->bindParam(':TIPOIPIDEVVENDA', $TIPOIPIDEVVENDA);
            $stmt->bindParam(':IPIPAUTAUNIT', $IPIPAUTAUNIT);
            $stmt->bindParam(':FATORCONVERSAOEMBTRIBUTAVEL', $FATORCONVERSAOEMBTRIBUTAVEL);
            $stmt->bindParam(':EXCECAONCM', $EXCECAONCM);
            $stmt->bindParam(':CODIGONBS', $CODIGONBS);
            $stmt->bindParam(':M3COMPRIMENTO', $M3COMPRIMENTO);
            $stmt->bindParam(':M3LARGURA', $M3LARGURA);
            $stmt->bindParam(':M3ALTURA', $M3ALTURA);
            $stmt->bindParam(':DATAHORAALTERACAO', $DATAHORAALTERACAO);
            $stmt->bindParam(':ENVIAREMBTRIBUTAVELSPED', $ENVIAREMBTRIBUTAVELSPED);
            $stmt->bindParam(':MOVIMENTACAOFISICA', $MOVIMENTACAOFISICA);
            $stmt->bindParam(':IMPRIMEOBSNFE', $IMPRIMEOBSNFE);
            $stmt->bindParam(':INDICADORMEDICAMENTO', $INDICADORMEDICAMENTO);
            $stmt->bindParam(':TIPOPRODUTOMEDICAMENTO', $TIPOPRODUTOMEDICAMENTO);
            $stmt->bindParam(':IDCOMBUSTIVEL', $IDCOMBUSTIVEL);
            $stmt->bindParam(':FATORCONVERSAOCOLORANTE', $FATORCONVERSAOCOLORANTE);
            $stmt->bindParam(':IDCEST', $IDCEST);
            $stmt->bindParam(':IDPRODUTOUNIDADEREFERENCIA', $IDPRODUTOUNIDADEREFERENCIA);
            $stmt->bindParam(':OBS', $OBS);
            $stmt->bindParam(':PRODUTOCOMFOTO', $PRODUTOCOMFOTO);
            $stmt->bindParam(':INCLUIFRETEBASECALCULOICMS', $INCLUIFRETEBASECALCULOICMS);
            $stmt->bindParam(':DESCRICAOESTENDIDANFE', $DESCRICAOESTENDIDANFE);
            $stmt->bindParam(':USADESCRICAOESTENDIDANFE', $USADESCRICAOESTENDIDANFE);

            // Execute a consulta de inserção
            $stmt->execute();
        }

        $dbOrigem->closeOrigem();
        $dbDestino->closeDestino();
    }

    public function setorInsert($empresa)
    {

        $quantidadeProduto = 0;
        $qtde = 0;
        // Crie uma instância da classe Database
        $dbOrigem = new DatabaseOrigem(ip_origem, caminho_origem, usuario_origem, senha_origem);
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connOrigem = $dbOrigem->connectOrigem();
        $connDestino = $dbDestino->connectDestino();


        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TESTSETOR A WHERE A.EMPRESA = $empresa";
        $result = $connOrigem->query($query);


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {


            // Processar os resultados
            $EMPRESA           = $row['EMPRESA'];
            $CODIGO            = $row['CODIGO'];
            $DESCRICAO         = $row['DESCRICAO'];
            $ABREV             = $row['ABREV'];
            $USUARIO           = $row['USUARIO'];
            $USADONOPDV        = $row['USADONOPDV'];
            $IDESTGIRO         = $row['IDESTGIRO'];

            $sql = "UPDATE OR INSERT INTO TESTSETOR 
                        (EMPRESA, 
                        CODIGO, 
                        DESCRICAO, 
                        ABREV, 
                        USUARIO, 
                        USADONOPDV, 
                        IDESTGIRO) 
                        VALUES 
                        (:EMPRESA, 
                        :CODIGO, 
                        :DESCRICAO, 
                        :ABREV, 
                        :USUARIO, 
                        :USADONOPDV, 
                        :IDESTGIRO)  MATCHING (EMPRESA, CODIGO)";

            // Prepare a consulta
            $stmt = $connDestino->prepare($sql);



            // Associe os valores aos parâmetros na consulta
            $stmt->bindParam(':EMPRESA', $EMPRESA);
            $stmt->bindParam(':CODIGO', $CODIGO);
            $stmt->bindParam(':DESCRICAO', $DESCRICAO);
            $stmt->bindParam(':ABREV', $ABREV);
            $stmt->bindParam(':USUARIO', $USUARIO);
            $stmt->bindParam(':USADONOPDV', $USADONOPDV);
            $stmt->bindParam(':IDESTGIRO', $IDESTGIRO);

            // Execute a consulta de inserção          
            $stmt->execute();
        };

        $dbOrigem->closeOrigem();
        $dbDestino->closeDestino();
    }

    public function fabricanteInsert()
    {


        // Crie uma instância da classe Database
        $dbOrigem = new DatabaseOrigem(ip_origem, caminho_origem, usuario_origem, senha_origem);
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connOrigem = $dbOrigem->connectOrigem();
        $connDestino = $dbDestino->connectDestino();

        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TESTFABRICANTE";
        $result = $connOrigem->query($query);




        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            // Processar os resultados
            $CODIGO            = $row['CODIGO'];
            $DESCRICAO         = $row['DESCRICAO'];
            $CPFCNPJ           = $row['CPFCNPJ'];
            $USUARIO           = $row['USUARIO'];
            $ABREVIATURA       = $row['ABREVIATURA'];
            $IDESTGIRO         = $row['IDESTGIRO'];
            $ENVIARCNPJSEFAZ   = $row['ENVIARCNPJSEFAZ'];


            $sql = "UPDATE OR INSERT INTO TESTFABRICANTE
                        (CODIGO, 
                        DESCRICAO, 
                        CPFCNPJ, 
                        USUARIO, 
                        ABREVIATURA, 
                        IDESTGIRO, 
                        ENVIARCNPJSEFAZ) 
                        VALUES 
                        (:CODIGO, 
                        :DESCRICAO, 
                        :CPFCNPJ, 
                        :USUARIO, 
                        :ABREVIATURA, 
                        :IDESTGIRO, 
                        :ENVIARCNPJSEFAZ)";

            // Prepare a consulta
            $stmt = $connDestino->prepare($sql);

            // Associe os valores aos parâmetros na consulta
            $stmt->bindParam(':CODIGO', $CODIGO);
            $stmt->bindParam(':DESCRICAO', $DESCRICAO);
            $stmt->bindParam(':CPFCNPJ', $CPFCNPJ);
            $stmt->bindParam(':USUARIO', $USUARIO);
            $stmt->bindParam(':ABREVIATURA', $ABREVIATURA);
            $stmt->bindParam(':IDESTGIRO', $IDESTGIRO);
            $stmt->bindParam(':ENVIARCNPJSEFAZ', $ENVIARCNPJSEFAZ);

            // Execute a consulta de inserção
            $stmt->execute();
        };

        $dbOrigem->closeOrigem();
        $dbDestino->closeDestino();
    }

    public function sub_grupoInsert($EMPRESA)
    {

        // Crie uma instância da classe Database
        $dbOrigem = new DatabaseOrigem(ip_origem, caminho_origem, usuario_origem, senha_origem);
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connOrigem = $dbOrigem->connectOrigem();
        $connDestino = $dbDestino->connectDestino();


        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TESTSUBGRUPO A WHERE A.EMPRESA = '$EMPRESA' ";
        $result = $connOrigem->query($query);




        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            // Processar os resultados
            $EMPRESA               = $row['EMPRESA'];
            $GRUPO                 = $row['GRUPO'];

            //ESSE CAMPO NÃO PERNITE NULL, VERIFICA SE A FOREIGN KEY ESTA NULL, CASO ESTIVER ELE BUSCA PRIMEIRA OPÇÃO NA TABELA RELACIONADA
            if ($GRUPO == null) {

                $queryTem = "SELECT FIRST 1  A.CODIGO FROM TESTGRUPO A";
                $resultTem = $connOrigem->query($queryTem);
                $row = $resultTem->fetch(PDO::FETCH_ASSOC);
                $GRUPO = $row['CODIGO'];
            }
            $SUBGRUPO              = $row['SUBGRUPO'];
            $DESCRICAO             = $row['DESCRICAO'];
            $USUARIO               = $row['USUARIO'];
            $AJUSTE                = $row['AJUSTE'];
            $AJUSTEESPECIAL        = $row['AJUSTEESPECIAL'];
            $IDESTGIRO             = $row['IDESTGIRO'];
            $DATAHORAALTERACAO     = $row['DATAHORAALTERACAO'];

            $sql = "UPDATE OR INSERT INTO TESTSUBGRUPO 
                       (EMPRESA, 
                       GRUPO, 
                       SUBGRUPO, 
                       DESCRICAO, 
                       USUARIO, 
                       AJUSTE, 
                       AJUSTEESPECIAL,
                       IDESTGIRO,
                       DATAHORAALTERACAO) 
                        VALUES 
                        (:EMPRESA, 
                        :GRUPO, 
                        :SUBGRUPO, 
                        :DESCRICAO, 
                        :USUARIO, 
                        :AJUSTE, 
                        :AJUSTEESPECIAL,
                        :IDESTGIRO,
                        :DATAHORAALTERACAO) MATCHING (EMPRESA, GRUPO, SUBGRUPO)";

            // Prepare a consulta
            $stmt = $connDestino->prepare($sql);

            // Associe os valores aos parâmetros na consulta
            $stmt->bindParam(':EMPRESA', $EMPRESA);
            $stmt->bindParam(':GRUPO', $GRUPO);
            $stmt->bindParam(':SUBGRUPO', $SUBGRUPO);
            $stmt->bindParam(':DESCRICAO', $DESCRICAO);
            $stmt->bindParam(':USUARIO', $USUARIO);
            $stmt->bindParam(':AJUSTE', $AJUSTE);
            $stmt->bindParam(':AJUSTEESPECIAL', $AJUSTEESPECIAL);
            $stmt->bindParam(':IDESTGIRO', $IDESTGIRO);
            $stmt->bindParam(':DATAHORAALTERACAO', $DATAHORAALTERACAO);
            // Execute a consulta de inserção
            $stmt->execute();
        }

        $dbOrigem->closeOrigem();
        $dbDestino->closeDestino();
    }

    public function grupoInsert($EMPRESA)
    {

        $quantidadeProduto = 0;
        $qtde = 0;
        // Crie uma instância da classe Database
        $dbOrigem = new DatabaseOrigem(ip_origem, caminho_origem, usuario_origem, senha_origem);
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connOrigem = $dbOrigem->connectOrigem();
        $connDestino = $dbDestino->connectDestino();

        //VERIFICA A QUANTIDADE DE PRODUTOS
        $queryQtde = "SELECT COUNT(A.CODIGO) AS QTDE FROM TESTGRUPO A";
        $resultQtde = $connOrigem->query($queryQtde);

        if ($resultQtde) {
            $rowQtde = $resultQtde->fetch(PDO::FETCH_ASSOC);
            if ($rowQtde) {
                $quantidadeProduto = $rowQtde['QTDE'];
            } else {
                echo "Nenhum resultado encontrado.";
            }
        } else {
            echo "Erro na consulta SQL: " . $connOrigem->errorInfo()[2];
        }

        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TESTGRUPO A WHERE A.EMPRESA = '$EMPRESA'";
        $result = $connOrigem->query($query);




        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            if (intval($qtde) <= intval($quantidadeProduto)) {

                // Processar os resultados
                $EMPRESA                    = $row['EMPRESA'];
                $CODIGO                     = $row['CODIGO'];
                $DESCRICAO                  = $row['DESCRICAO'];
                $USUARIO                    = $row['USUARIO'];
                $AJUSTE                     = $row['AJUSTE'];
                $TIPO                       = $row['TIPO'];
                $TIPONFE                    = $row['TIPONFE'];
                $ISSQNSUBSTITUICAO          = $row['ISSQNSUBSTITUICAO'];
                $IDCONTASPED                = $row['IDCONTASPED'];
                $IDESTGIRO                  = $row['IDESTGIRO'];
                $IDGRUPOTRIBUTACAO          = $row['IDGRUPOTRIBUTACAO'];
                $TIPOITEM                   = $row['TIPOITEM'];
                $DATAHORAALTERACAO          = $row['DATAHORAALTERACAO'];
                $PERMITEESTOQUENEGATIVO     = $row['PERMITEESTOQUENEGATIVO'];
                $ENVIAECOMOBILE             = $row['ENVIAECOMOBILE'];
                $RASTRO                     = $row['RASTRO'];

                $sql = "UPDATE OR INSERT INTO TESTGRUPO 
                       (EMPRESA, 
                       CODIGO, 
                       DESCRICAO, 
                       USUARIO, 
                       AJUSTE, 
                       TIPO, 
                       TIPONFE,
                       ISSQNSUBSTITUICAO,
                       IDCONTASPED,
                       IDESTGIRO,
                       IDGRUPOTRIBUTACAO,
                       TIPOITEM,
                       DATAHORAALTERACAO,
                       PERMITEESTOQUENEGATIVO,
                       ENVIAECOMOBILE,
                       RASTRO) 
                        VALUES 
                        (:EMPRESA, 
                        :CODIGO, 
                        :DESCRICAO, 
                        :USUARIO, 
                        :AJUSTE, 
                        :TIPO,
                        :TIPONFE,
                        :ISSQNSUBSTITUICAO,
                        :IDCONTASPED,
                        :IDESTGIRO,
                        :IDGRUPOTRIBUTACAO,
                        :TIPOITEM,
                        :DATAHORAALTERACAO,
                        :PERMITEESTOQUENEGATIVO,
                        :ENVIAECOMOBILE,
                        :RASTRO) MATCHING (EMPRESA, CODIGO)";

                // Prepare a consulta
                $stmt = $connDestino->prepare($sql);

                // Associe os valores aos parâmetros na consulta
                $stmt->bindParam(':EMPRESA', $EMPRESA);
                $stmt->bindParam(':CODIGO', $CODIGO);
                $stmt->bindParam(':TIPO', $TIPO);
                $stmt->bindParam(':DESCRICAO', $DESCRICAO);
                $stmt->bindParam(':USUARIO', $USUARIO);
                $stmt->bindParam(':AJUSTE', $AJUSTE);
                $stmt->bindParam(':TIPONFE', $TIPONFE);
                $stmt->bindParam(':ISSQNSUBSTITUICAO', $ISSQNSUBSTITUICAO);
                $stmt->bindParam(':IDCONTASPED', $IDCONTASPED);
                $stmt->bindParam(':IDESTGIRO', $IDESTGIRO);
                $stmt->bindParam(':IDGRUPOTRIBUTACAO', $IDGRUPOTRIBUTACAO);
                $stmt->bindParam(':TIPOITEM', $TIPOITEM);
                $stmt->bindParam(':DATAHORAALTERACAO', $DATAHORAALTERACAO);
                $stmt->bindParam(':PERMITEESTOQUENEGATIVO', $PERMITEESTOQUENEGATIVO);
                $stmt->bindParam(':ENVIAECOMOBILE', $ENVIAECOMOBILE);
                $stmt->bindParam(':RASTRO', $RASTRO);
                // Execute a consulta de inserção
                $stmt->execute();
            }
            $qtde = $qtde + 1;
        };

        $dbOrigem->closeOrigem();
        $dbDestino->closeDestino();
    }

    public function marcaInsert()
    {

        $quantidadeProduto = 0;
        $qtde = 0;
        // Crie uma instância da classe Database
        $dbOrigem = new DatabaseOrigem(ip_origem, caminho_origem, usuario_origem, senha_origem);
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connOrigem = $dbOrigem->connectOrigem();
        $connDestino = $dbDestino->connectDestino();

        //VERIFICA A QUANTIDADE DE PRODUTOS
        $queryQtde = "SELECT COUNT(A.CODIGO) AS QTDE FROM TESTMARCA A";
        $resultQtde = $connOrigem->query($queryQtde);

        if ($resultQtde) {
            $rowQtde = $resultQtde->fetch(PDO::FETCH_ASSOC);
            if ($rowQtde) {
                $quantidadeProduto = $rowQtde['QTDE'];
            } else {
                echo "Nenhum resultado encontrado.";
            }
        } else {
            echo "Erro na consulta SQL: " . $connOrigem->errorInfo()[2];
        }

        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TESTMARCA";
        $result = $connOrigem->query($query);




        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if (intval($qtde) <= intval($quantidadeProduto)) {

                // Processar os resultados
                $CODIGO                = $row['CODIGO'];
                $DESCRICAO             = $row['DESCRICAO'];
                $USUARIO               = $row['USUARIO'];
                $IDESTGIRO             = $row['IDESTGIRO'];
                $DATAHORAALTERACAO     = $row['DATAHORAALTERACAO'];
                $ATIVO                 = $row['ATIVO'];

                $sql = "UPDATE OR INSERT INTO TESTMARCA 
                       (CODIGO, 
                       DESCRICAO, 
                       USUARIO, 
                       IDESTGIRO, 
                       DATAHORAALTERACAO) 
                        VALUES 
                        (:CODIGO, 
                        :DESCRICAO, 
                        :USUARIO, 
                        :IDESTGIRO, 
                        :DATAHORAALTERACAO
                        )  MATCHING (CODIGO)";

                // Prepare a consulta
                $stmt = $connDestino->prepare($sql);

                // Associe os valores aos parâmetros na consulta
                $stmt->bindParam(':CODIGO', $CODIGO);
                $stmt->bindParam(':DESCRICAO', $DESCRICAO);
                $stmt->bindParam(':USUARIO', $USUARIO);
                $stmt->bindParam(':IDESTGIRO', $IDESTGIRO);
                $stmt->bindParam(':DATAHORAALTERACAO', $DATAHORAALTERACAO);
                //  $stmt->bindParam(':ATIVO', $ATIVO);
                // Execute a consulta de inserção
                $stmt->execute();
            }
            $qtde = $qtde + 1;
        };

        $dbOrigem->closeOrigem();
        $dbDestino->closeDestino();
    }

    public function embalagemInsert()
    {

        $quantidadeProduto = 0;
        $qtde = 0;
        // Crie uma instância da classe Database
        $dbOrigem = new DatabaseOrigem(ip_origem, caminho_origem, usuario_origem, senha_origem);
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connOrigem = $dbOrigem->connectOrigem();
        $connDestino = $dbDestino->connectDestino();

        //VERIFICA A QUANTIDADE DE PRODUTOS
        $queryQtde = "SELECT COUNT(A.CODIGO) AS QTDE FROM TESTEMBALAGEM A";
        $resultQtde = $connOrigem->query($queryQtde);

        if ($resultQtde) {
            $rowQtde = $resultQtde->fetch(PDO::FETCH_ASSOC);
            if ($rowQtde) {
                $quantidadeProduto = $rowQtde['QTDE'];
            } else {
                echo "Nenhum resultado encontrado.";
            }
        } else {
            echo "Erro na consulta SQL: " . $connOrigem->errorInfo()[2];
        }

        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TESTEMBALAGEM";
        $result = $connOrigem->query($query);




        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if (intval($qtde) <= intval($quantidadeProduto)) {

                // Processar os resultados
                $CODIGO                = $row['CODIGO'];
                $DESCRICAO             = $row['DESCRICAO'];
                $USUARIO               = $row['USUARIO'];

                $sql = "UPDATE OR INSERT INTO TESTEMBALAGEM 
                       (CODIGO, 
                       DESCRICAO, 
                       USUARIO) 
                        VALUES 
                        (:CODIGO, 
                        :DESCRICAO, 
                        :USUARIO) MATCHING (CODIGO)";

                // Prepare a consulta
                $stmt = $connDestino->prepare($sql);

                // Associe os valores aos parâmetros na consulta
                $stmt->bindParam(':CODIGO', $CODIGO);
                $stmt->bindParam(':DESCRICAO', $DESCRICAO);
                $stmt->bindParam(':USUARIO', $USUARIO);

                // Execute a consulta de inserção
                $stmt->execute();
            }
            $qtde = $qtde + 1;
        };

        $dbOrigem->closeOrigem();
        $dbDestino->closeDestino();
    }

    public function produtos2Insert($EMPRESA)
    {

        // Crie uma instância da classe Database
        $dbOrigem = new DatabaseOrigem(ip_origem, caminho_origem, usuario_origem, senha_origem);
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connOrigem = $dbOrigem->connectOrigem();
        $connDestino = $dbDestino->connectDestino();

        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TESTPRODUTO A WHERE A.EMPRESA = '$EMPRESA'";
        $result = $connOrigem->query($query);




        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            // Processar os resultados

            $EMPRESA                        = $row['EMPRESA'];
            $PRODUTO                        = $row['PRODUTO'];
            $CUSTOFABRICA                   = $row['CUSTOFABRICA'];
            $CUSTOORIGEM                    = $row['CUSTOORIGEM'];
            $CUSTOREPOSICAO                 = $row['CUSTOREPOSICAO'];
            $CUSTOFINAL                     = $row['CUSTOFINAL'];
            $CUSTOMEDIO                     = $row['CUSTOMEDIO'];
            $MARGEMLUCRO                    = $row['MARGEMLUCRO'];
            $PRSUGERIDO                     = $row['PRSUGERIDO'];
            $PRPAUTA                        = $row['PRPAUTA'];
            $USAPAUTA                       = $row['USAPAUTA'];
            $PERCMAXDESC                    = $row['PERCMAXDESC'];
            $ESTOQUEMINIMO                  = $row['ESTOQUEMINIMO'];
            $ESTOQUEMAXIMO                  = $row['ESTOQUEMAXIMO'];
            $ULTENTRADAQTDE                 = $row['ULTENTRADAQTDE'];
            $ULTENTRADADATA                 = $row['ULTENTRADADATA'];
            $ULTENTRADAPRECOUNIT            = $row['ULTENTRADAPRECOUNIT'];
            $ULTSAIDADATA                   = $row['ULTSAIDADATA'];
            $COMISSAOPRODUTO                = $row['COMISSAOPRODUTO'];
            $COMVDAPRAZO                    = $row['COMVDAPRAZO'];
            $COMVDAVISTA                    = $row['COMVDAVISTA'];
            $ATIVO                          = $row['ATIVO'];
            $USUARIO                        = $row['USUARIO'];
            $SETOR                          = $row['SETOR'];
            $ESTOQUECRITICO                 = $row['ESTOQUECRITICO'];
            $PRPRATICADO                    = $row['PRPRATICADO'];
            $ESTREGULADOR                   = $row['ESTREGULADOR'];
            $ESTFRACIONADO                  = $row['ESTFRACIONADO'];
            $ESTDISPONIVEL                  = $row['ESTDISPONIVEL'];
            $ESTARETIRAR                    = $row['ESTARETIRAR'];
            $ESTCONDICIONAL                 = $row['ESTCONDICIONAL'];
            $ESTRESERVADO                   = $row['ESTRESERVADO'];
            $ESTPEDIDO                      = $row['ESTPEDIDO'];
            $PERCAJUSTE                     = $row['PERCAJUSTE'];
            $LOTEPROMOCAO                   = $row['LOTEPROMOCAO'];
            $DESCONTOESPECIAL               = $row['DESCONTOESPECIAL'];
            $GARANTIA                       = $row['GARANTIA'];
            $PRECOFIXO                      = $row['PRECOFIXO'];
            $GRUPO                          = $row['GRUPO'];
            //ESSE CAMPO NÃO PERNITE NULL, VERIFICA SE A FOREIGN KEY ESTA NULL, CASO ESTIVER ELE BUSCA PRIMEIRA OPÇÃO NA TABELA RELACIONADA
            if ($GRUPO == null) {

                $queryGrupo = "SELECT FIRST 1  A.CODIGO FROM TESTGRUPO A";
                $resultGrupo = $connDestino->query($queryGrupo);
                $rowGrupo = $resultGrupo->fetch(PDO::FETCH_ASSOC);
                $GRUPO = $rowGrupo['CODIGO'];
            }
            $SUBGRUPO                       = $row['SUBGRUPO'];
            //ESSE CAMPO NÃO PERNITE NULL, VERIFICA SE A FOREIGN KEY ESTA NULL, CASO ESTIVER ELE BUSCA PRIMEIRA OPÇÃO NA TABELA RELACIONADA
            if ($SUBGRUPO == null) {

                $querySub = "SELECT FIRST 1  A.SUBGRUPO FROM TESTSUBGRUPO A";
                $resultSub = $connDestino->query($querySub);
                $rowSub = $resultSub->fetch(PDO::FETCH_ASSOC);
                $SUBGRUPO = $rowSub['SUBGRUPO'];
            }
            $AJUSTEATC                      = $row['AJUSTEATC'];
            $PRATACADO                      = $row['PRATACADO'];
            $QTDMINATC                      = $row['QTDMINATC'];
            $ESTADO                         = $row['ESTADO'];
            $ALIQCOMPRA_ICMS                = $row['ALIQCOMPRA_ICMS'];
            $ALIQCOMPRA_REDUCAO             = $row['ALIQCOMPRA_REDUCAO'];
            $ALIQCOMPRA_MARGEM              = $row['ALIQCOMPRA_MARGEM'];
            $ALIQVENDA_ICMS1                = $row['ALIQVENDA_ICMS1'];
            $ALIQVENDA_ICMS2                = $row['ALIQVENDA_ICMS2'];
            $ALIQVENDA_REDUCAO              = $row['ALIQVENDA_REDUCAO'];
            $MENSAGEMLIMINAR                = $row['MENSAGEMLIMINAR'];
            $DATAALTERACAO                  = $row['DATAALTERACAO'];
            $CONTROLEDEALTERACAO            = $row['CONTROLEDEALTERACAO'];
            $MARGEMLUCROGARANTIDO           = $row['MARGEMLUCROGARANTIDO'];
            $PRODUTOGENERICO                = $row['PRODUTOGENERICO'];
            $AJUSTE                         = $row['AJUSTE'];
            $AJUSTEESPECIAL                 = $row['AJUSTEESPECIAL'];
            $CUSTOMEDIOREPOSICAO            = $row['CUSTOMEDIOREPOSICAO'];
            $CORRIGEVENDANOPCP              = $row['CORRIGEVENDANOPCP'];
            $CONTROLALOTE                   = $row['CONTROLALOTE'];
            $EXPORTAPDA                     = $row['EXPORTAPDA'];
            $PAUTACOMPRA                    = $row['PAUTACOMPRA'];
            $PAUTAVENDA                     = $row['PAUTAVENDA'];
            $CUSTOUTILIZADO                 = $row['CUSTOUTILIZADO'];
            $DISPONIVELVENDA                = $row['DISPONIVELVENDA'];
            $PRECOANTERIOR                  = $row['PRECOANTERIOR'];
            $IDCONTASPED                    = $row['IDCONTASPED'];
            $ULTENTRADAVALIDACAO            = $row['ULTENTRADAVALIDACAO'];
            $ULTUSUARIOVALIDACAO            = $row['ULTUSUARIOVALIDACAO'];
            $TABELAPROMOCIONAL              = $row['TABELAPROMOCIONAL'];
            $ALIQISSQN                      = $row['ALIQISSQN'];
            $NATUREZAOPERACAOISS            = $row['NATUREZAOPERACAOISS'];
            $CODIGOTRIBUTACAOISSQN          = $row['CODIGOTRIBUTACAOISSQN'];
            $IDALTERACAO                    = $row['IDALTERACAO'];
            $IDENVIOPAF                     = $row['IDENVIOPAF'];
            $IDGRUPOTRIBUTACAO              = $row['IDGRUPOTRIBUTACAO'];

            $IDTABELAPISITEM                = $row['IDTABELAPISITEM'];
            //ESSE CAMPO NÃO PERNITE NULL, VERIFICA SE A FOREIGN KEY ESTA NULL, CASO ESTIVER ELE BUSCA PRIMEIRA OPÇÃO NA TABELA RELACIONADA
            if ($IDTABELAPISITEM >= 1) {
                $queryPis = "SELECT A.IDTABELAPISCOFINS FROM TESTTABELAPISCOFINSITEM A WHERE A.IDTABELAPISCOFINS = $IDTABELAPISITEM ";
                $resultPis = $connDestino->query($queryPis);
                $rowPis = $resultPis->fetch(PDO::FETCH_ASSOC);
                if ($rowPis['IDTABELAPISCOFINS'] == null) {
                    $query2Pis = "SELECT FIRST 1 A.IDTABELAPISCOFINS FROM TESTTABELAPISCOFINSITEM A  ";
                    $result2Pis = $connDestino->query($query2Pis);
                    $row2Pis = $result2Pis->fetch(PDO::FETCH_ASSOC);
                    $IDTABELAPISITEM = $row2Pis['IDTABELAPISCOFINS'];
                }
            }


            $IDTABELACOFINSITEM             = $row['IDTABELACOFINSITEM'];
            //ESSE CAMPO NÃO PERNITE NULL, VERIFICA SE A FOREIGN KEY ESTA NULL, CASO ESTIVER ELE BUSCA PRIMEIRA OPÇÃO NA TABELA RELACIONADA
            if ($IDTABELACOFINSITEM >= 1) {
                $queryCofins = "SELECT A.IDTABELAPISCOFINS FROM TESTTABELAPISCOFINSITEM A WHERE A.IDTABELAPISCOFINS = $IDTABELACOFINSITEM ";
                $resultCofins = $connDestino->query($queryCofins);
                $rowCofins = $resultCofins->fetch(PDO::FETCH_ASSOC);
                if ($rowCofins['IDTABELAPISCOFINS'] == null) {
                    $query2Cofins = "SELECT FIRST 1 A.IDTABELAPISCOFINS FROM TESTTABELAPISCOFINSITEM A  ";
                    $result2Cofins = $connDestino->query($query2Cofins);
                    $row2Cofins = $result2Cofins->fetch(PDO::FETCH_ASSOC);
                    $IDTABELACOFINSITEM = $row2Cofins['IDTABELAPISCOFINS'];
                }
            }

            $IDEXPORTACAO                   = $row['IDEXPORTACAO'];
            $CARGAOPERACIONAL               = '01';
            $DATAIDALTERACAO                = $row['DATAIDALTERACAO'];
            $DESCICMSRO                     = $row['DESCICMSRO'];
            $FONTEIMPOSTOEMPRESA            = $row['FONTEIMPOSTOEMPRESA'];
            $ALIQIMPOSTONACIONAL            = $row['ALIQIMPOSTONACIONAL'];
            $ALIQIMPOSTOINTERNACIONAL       = $row['ALIQIMPOSTOINTERNACIONAL'];
            $FONTEIMPSERVEMPRESA            = $row['FONTEIMPSERVEMPRESA'];
            $ALIQIMPOSTOSERVNACIONAL        = $row['ALIQIMPOSTOSERVNACIONAL'];
            $ALIQIMPOSTOSERVINTERNACIONAL   = $row['ALIQIMPOSTOSERVINTERNACIONAL'];
            $GERAREGISTROC197               = $row['GERAREGISTROC197'];
            $ALIQICMSC197                   = $row['ALIQICMSC197'];
            $DATAHORAALTERACAO              = $row['DATAHORAALTERACAO'];
            $ALIQREDUCAOISSQN               = $row['ALIQREDUCAOISSQN'];
            $PERMITECREDITOICMSPRURAL       = $row['PERMITECREDITOICMSPRURAL'];
            $ALIQCREDITOICMSPRURAL          = $row['ALIQCREDITOICMSPRURAL'];
            $CONTROLANUMEROSERIE            = $row['CONTROLANUMEROSERIE'];
            $MEDIABASESTRETIDO              = $row['MEDIABASESTRETIDO'];
            $MEDIAVALORSTRETIDO             = $row['MEDIAVALORSTRETIDO'];
            $ORIGEMALTERACAOCUSTOS          = $row['ORIGEMALTERACAOCUSTOS'];
            $ESTTRANSITO                    = $row['ESTTRANSITO'];
            $VLRCUSTOFRETE                  = $row['VLRCUSTOFRETE'];
            $VLRCUSTOSEGURO                 = $row['VLRCUSTOSEGURO'];
            $VLRCUSTODESPESA                = $row['VLRCUSTODESPESA'];
            $VLRCUSTOIRRF                   = $row['VLRCUSTOIRRF'];
            $VLRCUSTOIPI                    = $row['VLRCUSTOIPI'];
            $VLRCUSTOOUTROS                 = $row['VLRCUSTOOUTROS'];
            $VLRCUSTOICMSST                 = $row['VLRCUSTOICMSST'];
            $VLRCUSTOAJUSTESUPERSIMPLES     = $row['VLRCUSTOAJUSTESUPERSIMPLES'];
            $VLRCUSTOEXTRA                  = $row['VLRCUSTOEXTRA'];
            $VLRCUSTOFRETEEXTRA             = $row['VLRCUSTOFRETEEXTRA'];
            $ENVIAECOMOBILE                 = $row['ENVIAECOMOBILE'];
            $VLRCUSTOICMSESTIMATIVA         = $row['VLRCUSTOICMSESTIMATIVA'];
            $PRECOCONSUMIDOR                = $row['PRECOCONSUMIDOR'];
            $ESTVENDAEXTERNA                = $row['ESTVENDAEXTERNA'];
            $AJUSTECUSTONOTA                = $row['AJUSTECUSTONOTA'];
            $AJUSTECUSTOREPOSICAO           = $row['AJUSTECUSTOREPOSICAO'];
            $VALORCUSTOICMSDESONERADO       = $row['VALORCUSTOICMSDESONERADO'];
            $VALORCUSTOICMSANTECIPADO       = $row['VALORCUSTOICMSANTECIPADO'];
            $DATAHORAALTERACAOCAD           = $row['DATAHORAALTERACAOCAD'];
            $TIPOTRIBUTACAOSERVICO          = $row['TIPOTRIBUTACAOSERVICO'];
            $VLRCUSTODESCONTO               = $row['VLRCUSTODESCONTO'];
            $VLRCUSTOACRESCIMO              = $row['VLRCUSTOACRESCIMO'];
            $ESCALARELEVANTE                = $row['ESCALARELEVANTE'];
            $CNPJFABRICANTE                 = $row['CNPJFABRICANTE'];
            $IDSEQUENCIACARGA               = $row['IDSEQUENCIACARGA'];
            $CPRODANVISA                    = $row['CPRODANVISA'];
            $GID_CODIGOBENEFICIO            = $row['GID_CODIGOBENEFICIO'];
            $MOTIVOISENCAOANVISA            = $row['MOTIVOISENCAOANVISA'];
            $MEDIAVLRICMSSUBSTITUTO         = $row['MEDIAVLRICMSSUBSTITUTO'];
            $ENVIAB2B                       = $row['ENVIAB2B'];
            $SALDOFLEX                      = $row['SALDOFLEX'];
            $ACRESCIMOFLEX                  = $row['ACRESCIMOFLEX'];
            $DESCONTOFLEX                   = $row['DESCONTOFLEX'];
            $TRIBUTA_FET                    = $row['TRIBUTA_FET'];
            $RESTRINGIRVENDA                = $row['RESTRINGIRVENDA'];
            $QTDE_VENDA_MULTIPLA            = $row['QTDE_VENDA_MULTIPLA'];
            $VALORCUSTOICMSSTDESONERADO     = $row['VALORCUSTOICMSSTDESONERADO'];
            $FAMILIAPROD                    = $row['FAMILIAPROD'];
            $DESCONTOMAXIMOFLEX             = $row['DESCONTOMAXIMOFLEX'];
            $MARGEMLUCROATACADO             = $row['MARGEMLUCROATACADO'];
            $CUSTOFINALATACADO              = $row['CUSTOFINALATACADO'];

            $sql = "UPDATE OR INSERT INTO TESTPRODUTO 
                       (EMPRESA,
                        PRODUTO,
                        CUSTOFABRICA,
                        CUSTOORIGEM,
                        CUSTOREPOSICAO,
                        CUSTOFINAL,
                        CUSTOMEDIO,
                        MARGEMLUCRO,
                        PRSUGERIDO,
                        PRPAUTA,
                        USAPAUTA,
                        PERCMAXDESC,
                        ESTOQUEMINIMO,
                        ESTOQUEMAXIMO,
                        ULTENTRADAQTDE,
                        ULTENTRADADATA,
                        ULTENTRADAPRECOUNIT,
                        ULTSAIDADATA,
                        COMISSAOPRODUTO,
                        COMVDAPRAZO,
                        COMVDAVISTA,
                        ATIVO,
                        USUARIO,
                        SETOR,
                        ESTOQUECRITICO,
                        PRPRATICADO,
                        ESTREGULADOR,
                        ESTFRACIONADO,
                        ESTDISPONIVEL,
                        ESTARETIRAR,
                        ESTCONDICIONAL,
                        ESTRESERVADO,
                        ESTPEDIDO,
                        PERCAJUSTE,
                        LOTEPROMOCAO,
                        DESCONTOESPECIAL,
                        GARANTIA,
                        PRECOFIXO,
                        GRUPO,
                        SUBGRUPO,
                        AJUSTEATC,
                        PRATACADO,
                        QTDMINATC,
                        ESTADO,
                        ALIQCOMPRA_ICMS,
                        ALIQCOMPRA_REDUCAO,
                        ALIQCOMPRA_MARGEM,
                        ALIQVENDA_ICMS1,
                        ALIQVENDA_ICMS2,
                        ALIQVENDA_REDUCAO,
                        MENSAGEMLIMINAR,
                        DATAALTERACAO,
                        CONTROLEDEALTERACAO,
                        MARGEMLUCROGARANTIDO,
                        PRODUTOGENERICO,
                        AJUSTE,
                        AJUSTEESPECIAL,
                        CUSTOMEDIOREPOSICAO,
                        CORRIGEVENDANOPCP,
                        CONTROLALOTE,
                        EXPORTAPDA,
                        PAUTACOMPRA,
                        PAUTAVENDA,
                        CUSTOUTILIZADO,
                        DISPONIVELVENDA,
                        PRECOANTERIOR,
                        IDCONTASPED,
                        ULTENTRADAVALIDACAO,
                        ULTUSUARIOVALIDACAO,
                        TABELAPROMOCIONAL,
                        ALIQISSQN,
                        NATUREZAOPERACAOISS,
                        CODIGOTRIBUTACAOISSQN,
                        IDALTERACAO,
                        IDENVIOPAF,
                        IDGRUPOTRIBUTACAO,
                        IDTABELAPISITEM,
                        IDTABELACOFINSITEM,
                        IDEXPORTACAO,
                        CARGAOPERACIONAL,
                        DATAIDALTERACAO,
                        DESCICMSRO,
                        FONTEIMPOSTOEMPRESA,
                        ALIQIMPOSTONACIONAL,
                        ALIQIMPOSTOINTERNACIONAL,
                        FONTEIMPSERVEMPRESA,
                        ALIQIMPOSTOSERVNACIONAL,
                        ALIQIMPOSTOSERVINTERNACIONAL,
                        GERAREGISTROC197,
                        ALIQICMSC197,
                        DATAHORAALTERACAO,
                        ALIQREDUCAOISSQN,
                        PERMITECREDITOICMSPRURAL,
                        ALIQCREDITOICMSPRURAL,
                        CONTROLANUMEROSERIE,
                        MEDIABASESTRETIDO,
                        MEDIAVALORSTRETIDO,
                        ORIGEMALTERACAOCUSTOS,
                        ESTTRANSITO,
                        VLRCUSTOFRETE,
                        VLRCUSTOSEGURO,
                        VLRCUSTODESPESA,
                        VLRCUSTOIRRF,
                        VLRCUSTOIPI,
                        VLRCUSTOOUTROS,
                        VLRCUSTOICMSST,
                        VLRCUSTOAJUSTESUPERSIMPLES,
                        VLRCUSTOEXTRA,
                        VLRCUSTOFRETEEXTRA,
                        ENVIAECOMOBILE,
                        VLRCUSTOICMSESTIMATIVA,
                        PRECOCONSUMIDOR,
                        ESTVENDAEXTERNA,
                        AJUSTECUSTONOTA,
                        AJUSTECUSTOREPOSICAO,
                        VALORCUSTOICMSDESONERADO,
                        VALORCUSTOICMSANTECIPADO,
                        DATAHORAALTERACAOCAD,
                        TIPOTRIBUTACAOSERVICO,
                        VLRCUSTODESCONTO,
                        VLRCUSTOACRESCIMO,
                        ESCALARELEVANTE,
                        CNPJFABRICANTE,
                        IDSEQUENCIACARGA,
                        CPRODANVISA,
                        GID_CODIGOBENEFICIO,
                        MOTIVOISENCAOANVISA,
                        MEDIAVLRICMSSUBSTITUTO,
                        ENVIAB2B,
                        SALDOFLEX,
                        ACRESCIMOFLEX,
                        DESCONTOFLEX,
                        TRIBUTA_FET,
                        RESTRINGIRVENDA,
                        QTDE_VENDA_MULTIPLA,
                        VALORCUSTOICMSSTDESONERADO,
                        FAMILIAPROD,
                        DESCONTOMAXIMOFLEX,
                        MARGEMLUCROATACADO,
                        CUSTOFINALATACADO) 
                        VALUES 
                       (:EMPRESA,
                        :PRODUTO,
                        :CUSTOFABRICA,
                        :CUSTOORIGEM,
                        :CUSTOREPOSICAO,
                        :CUSTOFINAL,
                        :CUSTOMEDIO,
                        :MARGEMLUCRO,
                        :PRSUGERIDO,
                        :PRPAUTA,
                        :USAPAUTA,
                        :PERCMAXDESC,
                        :ESTOQUEMINIMO,
                        :ESTOQUEMAXIMO,
                        :ULTENTRADAQTDE,
                        :ULTENTRADADATA,
                        :ULTENTRADAPRECOUNIT,
                        :ULTSAIDADATA,
                        :COMISSAOPRODUTO,
                        :COMVDAPRAZO,
                        :COMVDAVISTA,
                        :ATIVO,
                        :USUARIO,
                        :SETOR,
                        :ESTOQUECRITICO,
                        :PRPRATICADO,
                        :ESTREGULADOR,
                        :ESTFRACIONADO,
                        :ESTDISPONIVEL,
                        :ESTARETIRAR,
                        :ESTCONDICIONAL,
                        :ESTRESERVADO,
                        :ESTPEDIDO,
                        :PERCAJUSTE,
                        :LOTEPROMOCAO,
                        :DESCONTOESPECIAL,
                        :GARANTIA,
                        :PRECOFIXO,
                        :GRUPO,
                        :SUBGRUPO,
                        :AJUSTEATC,
                        :PRATACADO,
                        :QTDMINATC,
                        :ESTADO,
                        :ALIQCOMPRA_ICMS,
                        :ALIQCOMPRA_REDUCAO,
                        :ALIQCOMPRA_MARGEM,
                        :ALIQVENDA_ICMS1,
                        :ALIQVENDA_ICMS2,
                        :ALIQVENDA_REDUCAO,
                        :MENSAGEMLIMINAR,
                        :DATAALTERACAO,
                        :CONTROLEDEALTERACAO,
                        :MARGEMLUCROGARANTIDO,
                        :PRODUTOGENERICO,
                        :AJUSTE,
                        :AJUSTEESPECIAL,
                        :CUSTOMEDIOREPOSICAO,
                        :CORRIGEVENDANOPCP,
                        :CONTROLALOTE,
                        :EXPORTAPDA,
                        :PAUTACOMPRA,
                        :PAUTAVENDA,
                        :CUSTOUTILIZADO,
                        :DISPONIVELVENDA,
                        :PRECOANTERIOR,
                        :IDCONTASPED,
                        :ULTENTRADAVALIDACAO,
                        :ULTUSUARIOVALIDACAO,
                        :TABELAPROMOCIONAL,
                        :ALIQISSQN,
                        :NATUREZAOPERACAOISS,
                        :CODIGOTRIBUTACAOISSQN,
                        :IDALTERACAO,
                        :IDENVIOPAF,
                        :IDGRUPOTRIBUTACAO,
                        :IDTABELAPISITEM,
                        :IDTABELACOFINSITEM,
                        :IDEXPORTACAO,
                        :CARGAOPERACIONAL,
                        :DATAIDALTERACAO,
                        :DESCICMSRO,
                        :FONTEIMPOSTOEMPRESA,
                        :ALIQIMPOSTONACIONAL,
                        :ALIQIMPOSTOINTERNACIONAL,
                        :FONTEIMPSERVEMPRESA,
                        :ALIQIMPOSTOSERVNACIONAL,
                        :ALIQIMPOSTOSERVINTERNACIONAL,
                        :GERAREGISTROC197,
                        :ALIQICMSC197,
                        :DATAHORAALTERACAO,
                        :ALIQREDUCAOISSQN,
                        :PERMITECREDITOICMSPRURAL,
                        :ALIQCREDITOICMSPRURAL,
                        :CONTROLANUMEROSERIE,
                        :MEDIABASESTRETIDO,
                        :MEDIAVALORSTRETIDO,
                        :ORIGEMALTERACAOCUSTOS,
                        :ESTTRANSITO,
                        :VLRCUSTOFRETE,
                        :VLRCUSTOSEGURO,
                        :VLRCUSTODESPESA,
                        :VLRCUSTOIRRF,
                        :VLRCUSTOIPI,
                        :VLRCUSTOOUTROS,
                        :VLRCUSTOICMSST,
                        :VLRCUSTOAJUSTESUPERSIMPLES,
                        :VLRCUSTOEXTRA,
                        :VLRCUSTOFRETEEXTRA,
                        :ENVIAECOMOBILE,
                        :VLRCUSTOICMSESTIMATIVA,
                        :PRECOCONSUMIDOR,
                        :ESTVENDAEXTERNA,
                        :AJUSTECUSTONOTA,
                        :AJUSTECUSTOREPOSICAO,
                        :VALORCUSTOICMSDESONERADO,
                        :VALORCUSTOICMSANTECIPADO,
                        :DATAHORAALTERACAOCAD,
                        :TIPOTRIBUTACAOSERVICO,
                        :VLRCUSTODESCONTO,
                        :VLRCUSTOACRESCIMO,
                        :ESCALARELEVANTE,
                        :CNPJFABRICANTE,
                        :IDSEQUENCIACARGA,
                        :CPRODANVISA,
                        :GID_CODIGOBENEFICIO,
                        :MOTIVOISENCAOANVISA,
                        :MEDIAVLRICMSSUBSTITUTO,
                        :ENVIAB2B,
                        :SALDOFLEX,
                        :ACRESCIMOFLEX,
                        :DESCONTOFLEX,
                        :TRIBUTA_FET,
                        :RESTRINGIRVENDA,
                        :QTDE_VENDA_MULTIPLA,
                        :VALORCUSTOICMSSTDESONERADO,
                        :FAMILIAPROD,
                        :DESCONTOMAXIMOFLEX,
                        :MARGEMLUCROATACADO,
                        :CUSTOFINALATACADO) MATCHING (EMPRESA, PRODUTO)";

            // Prepare a consulta
            $stmt = $connDestino->prepare($sql);

            // Associe os valores aos parâmetros na consulta

            $stmt->bindParam(':EMPRESA',                        $EMPRESA);
            $stmt->bindParam(':PRODUTO',                        $PRODUTO);
            $stmt->bindParam(':CUSTOFABRICA',                   $CUSTOFABRICA);
            $stmt->bindParam(':CUSTOORIGEM',                    $CUSTOORIGEM);
            $stmt->bindParam(':CUSTOREPOSICAO',                 $CUSTOREPOSICAO);
            $stmt->bindParam(':CUSTOFINAL',                     $CUSTOFINAL);
            $stmt->bindParam(':CUSTOMEDIO',                     $CUSTOMEDIO);
            $stmt->bindParam(':MARGEMLUCRO',                    $MARGEMLUCRO);
            $stmt->bindParam(':PRSUGERIDO',                     $PRSUGERIDO);
            $stmt->bindParam(':PRPAUTA',                        $PRPAUTA);
            $stmt->bindParam(':USAPAUTA',                       $USAPAUTA);
            $stmt->bindParam(':PERCMAXDESC',                    $PERCMAXDESC);
            $stmt->bindParam(':ESTOQUEMINIMO',                  $ESTOQUEMINIMO);
            $stmt->bindParam(':ESTOQUEMAXIMO',                  $ESTOQUEMAXIMO);
            $stmt->bindParam(':ULTENTRADAQTDE',                 $ULTENTRADAQTDE);
            $stmt->bindParam(':ULTENTRADADATA',                 $ULTENTRADADATA);
            $stmt->bindParam(':ULTENTRADAPRECOUNIT',            $ULTENTRADAPRECOUNIT);
            $stmt->bindParam(':ULTSAIDADATA',                   $ULTSAIDADATA);
            $stmt->bindParam(':COMISSAOPRODUTO',                $COMISSAOPRODUTO);
            $stmt->bindParam(':COMVDAPRAZO',                    $COMVDAPRAZO);
            $stmt->bindParam(':COMVDAVISTA',                    $COMVDAVISTA);
            $stmt->bindParam(':ATIVO',                          $ATIVO);
            $stmt->bindParam(':USUARIO',                        $USUARIO);
            $stmt->bindParam(':SETOR',                          $SETOR);
            $stmt->bindParam(':ESTOQUECRITICO',                 $ESTOQUECRITICO);
            $stmt->bindParam(':PRPRATICADO',                    $PRPRATICADO);
            $stmt->bindParam(':ESTREGULADOR',                   $ESTREGULADOR);
            $stmt->bindParam(':ESTFRACIONADO',                  $ESTFRACIONADO);
            $stmt->bindParam(':ESTDISPONIVEL',                  $ESTDISPONIVEL);
            $stmt->bindParam(':ESTARETIRAR',                    $ESTARETIRAR);
            $stmt->bindParam(':ESTCONDICIONAL',                 $ESTCONDICIONAL);
            $stmt->bindParam(':ESTRESERVADO',                   $ESTRESERVADO);
            $stmt->bindParam(':ESTPEDIDO',                      $ESTPEDIDO);
            $stmt->bindParam(':PERCAJUSTE',                     $PERCAJUSTE);
            $stmt->bindParam(':LOTEPROMOCAO',                   $LOTEPROMOCAO);
            $stmt->bindParam(':DESCONTOESPECIAL',               $DESCONTOESPECIAL);
            $stmt->bindParam(':GARANTIA',                       $GARANTIA);
            $stmt->bindParam(':PRECOFIXO',                      $PRECOFIXO);
            $stmt->bindParam(':GRUPO',                          $GRUPO);
            $stmt->bindParam(':SUBGRUPO',                       $SUBGRUPO);
            $stmt->bindParam(':AJUSTEATC',                      $AJUSTEATC);
            $stmt->bindParam(':PRATACADO',                      $PRATACADO);
            $stmt->bindParam(':QTDMINATC',                      $QTDMINATC);
            $stmt->bindParam(':ESTADO',                         $ESTADO);
            $stmt->bindParam(':ALIQCOMPRA_ICMS',                $ALIQCOMPRA_ICMS);
            $stmt->bindParam(':ALIQCOMPRA_REDUCAO',             $ALIQCOMPRA_REDUCAO);
            $stmt->bindParam(':ALIQCOMPRA_MARGEM',              $ALIQCOMPRA_MARGEM);
            $stmt->bindParam(':ALIQVENDA_ICMS1',                $ALIQVENDA_ICMS1);
            $stmt->bindParam(':ALIQVENDA_ICMS2',                $ALIQVENDA_ICMS2);
            $stmt->bindParam(':ALIQVENDA_REDUCAO',              $ALIQVENDA_REDUCAO);
            $stmt->bindParam(':MENSAGEMLIMINAR',                $MENSAGEMLIMINAR);
            $stmt->bindParam(':DATAALTERACAO',                  $DATAALTERACAO);
            $stmt->bindParam(':CONTROLEDEALTERACAO',            $CONTROLEDEALTERACAO);
            $stmt->bindParam(':MARGEMLUCROGARANTIDO',           $MARGEMLUCROGARANTIDO);
            $stmt->bindParam(':PRODUTOGENERICO',                $PRODUTOGENERICO);
            $stmt->bindParam(':AJUSTE',                         $AJUSTE);
            $stmt->bindParam(':AJUSTEESPECIAL',                 $AJUSTEESPECIAL);
            $stmt->bindParam(':CUSTOMEDIOREPOSICAO',            $CUSTOMEDIOREPOSICAO);
            $stmt->bindParam(':CORRIGEVENDANOPCP',              $CORRIGEVENDANOPCP);
            $stmt->bindParam(':CONTROLALOTE',                   $CONTROLALOTE);
            $stmt->bindParam(':EXPORTAPDA',                     $EXPORTAPDA);
            $stmt->bindParam(':PAUTACOMPRA',                    $PAUTACOMPRA);
            $stmt->bindParam(':PAUTAVENDA',                     $PAUTAVENDA);
            $stmt->bindParam(':CUSTOUTILIZADO',                 $CUSTOUTILIZADO);
            $stmt->bindParam(':DISPONIVELVENDA',                $DISPONIVELVENDA);
            $stmt->bindParam(':PRECOANTERIOR',                  $PRECOANTERIOR);
            $stmt->bindParam(':IDCONTASPED',                    $IDCONTASPED);
            $stmt->bindParam(':ULTENTRADAVALIDACAO',            $ULTENTRADAVALIDACAO);
            $stmt->bindParam(':ULTUSUARIOVALIDACAO',            $ULTUSUARIOVALIDACAO);
            $stmt->bindParam(':TABELAPROMOCIONAL',              $TABELAPROMOCIONAL);
            $stmt->bindParam(':ALIQISSQN',                      $ALIQISSQN);
            $stmt->bindParam(':NATUREZAOPERACAOISS',            $NATUREZAOPERACAOISS);
            $stmt->bindParam(':CODIGOTRIBUTACAOISSQN',          $CODIGOTRIBUTACAOISSQN);
            $stmt->bindParam(':IDALTERACAO',                    $IDALTERACAO);
            $stmt->bindParam(':IDENVIOPAF',                     $IDENVIOPAF);
            $stmt->bindParam(':IDGRUPOTRIBUTACAO',              $IDGRUPOTRIBUTACAO);
            $stmt->bindParam(':IDTABELAPISITEM',                $IDTABELAPISITEM);
            $stmt->bindParam(':IDTABELACOFINSITEM',             $IDTABELACOFINSITEM);
            $stmt->bindParam(':IDEXPORTACAO',                   $IDEXPORTACAO);
            $stmt->bindParam(':CARGAOPERACIONAL',               $CARGAOPERACIONAL);
            $stmt->bindParam(':DATAIDALTERACAO',                $DATAIDALTERACAO);
            $stmt->bindParam(':DESCICMSRO',                     $DESCICMSRO);
            $stmt->bindParam(':FONTEIMPOSTOEMPRESA',            $FONTEIMPOSTOEMPRESA);
            $stmt->bindParam(':ALIQIMPOSTONACIONAL',            $ALIQIMPOSTONACIONAL);
            $stmt->bindParam(':ALIQIMPOSTOINTERNACIONAL',       $ALIQIMPOSTOINTERNACIONAL);
            $stmt->bindParam(':FONTEIMPSERVEMPRESA',            $FONTEIMPSERVEMPRESA);
            $stmt->bindParam(':ALIQIMPOSTOSERVNACIONAL',        $ALIQIMPOSTOSERVNACIONAL);
            $stmt->bindParam(':ALIQIMPOSTOSERVINTERNACIONAL',   $ALIQIMPOSTOSERVINTERNACIONAL);
            $stmt->bindParam(':GERAREGISTROC197',               $GERAREGISTROC197);
            $stmt->bindParam(':ALIQICMSC197',                   $ALIQICMSC197);
            $stmt->bindParam(':DATAHORAALTERACAO',              $DATAHORAALTERACAO);
            $stmt->bindParam(':ALIQREDUCAOISSQN',               $ALIQREDUCAOISSQN);
            $stmt->bindParam(':PERMITECREDITOICMSPRURAL',       $PERMITECREDITOICMSPRURAL);
            $stmt->bindParam(':ALIQCREDITOICMSPRURAL',          $ALIQCREDITOICMSPRURAL);
            $stmt->bindParam(':CONTROLANUMEROSERIE',            $CONTROLANUMEROSERIE);
            $stmt->bindParam(':MEDIABASESTRETIDO',              $MEDIABASESTRETIDO);
            $stmt->bindParam(':MEDIAVALORSTRETIDO',             $MEDIAVALORSTRETIDO);
            $stmt->bindParam(':ORIGEMALTERACAOCUSTOS',          $ORIGEMALTERACAOCUSTOS);
            $stmt->bindParam(':ESTTRANSITO',                    $ESTTRANSITO);
            $stmt->bindParam(':VLRCUSTOFRETE',                  $VLRCUSTOFRETE);
            $stmt->bindParam(':VLRCUSTOSEGURO',                 $VLRCUSTOSEGURO);
            $stmt->bindParam(':VLRCUSTODESPESA',                $VLRCUSTODESPESA);
            $stmt->bindParam(':VLRCUSTOIRRF',                   $VLRCUSTOIRRF);
            $stmt->bindParam(':VLRCUSTOIPI',                    $VLRCUSTOIPI);
            $stmt->bindParam(':VLRCUSTOOUTROS',                 $VLRCUSTOOUTROS);
            $stmt->bindParam(':VLRCUSTOICMSST',                 $VLRCUSTOICMSST);
            $stmt->bindParam(':VLRCUSTOAJUSTESUPERSIMPLES',     $VLRCUSTOAJUSTESUPERSIMPLES);
            $stmt->bindParam(':VLRCUSTOEXTRA',                  $VLRCUSTOEXTRA);
            $stmt->bindParam(':VLRCUSTOFRETEEXTRA',             $VLRCUSTOFRETEEXTRA);
            $stmt->bindParam(':ENVIAECOMOBILE',                 $ENVIAECOMOBILE);
            $stmt->bindParam(':VLRCUSTOICMSESTIMATIVA',         $VLRCUSTOICMSESTIMATIVA);
            $stmt->bindParam(':PRECOCONSUMIDOR',                $PRECOCONSUMIDOR);
            $stmt->bindParam(':ESTVENDAEXTERNA',                $ESTVENDAEXTERNA);
            $stmt->bindParam(':AJUSTECUSTONOTA',                $AJUSTECUSTONOTA);
            $stmt->bindParam(':AJUSTECUSTOREPOSICAO',           $AJUSTECUSTOREPOSICAO);
            $stmt->bindParam(':VALORCUSTOICMSDESONERADO',       $VALORCUSTOICMSDESONERADO);
            $stmt->bindParam(':VALORCUSTOICMSANTECIPADO',       $VALORCUSTOICMSANTECIPADO);
            $stmt->bindParam(':DATAHORAALTERACAOCAD',           $DATAHORAALTERACAOCAD);
            $stmt->bindParam(':TIPOTRIBUTACAOSERVICO',          $TIPOTRIBUTACAOSERVICO);
            $stmt->bindParam(':VLRCUSTODESCONTO',               $VLRCUSTODESCONTO);
            $stmt->bindParam(':VLRCUSTOACRESCIMO',              $VLRCUSTOACRESCIMO);
            $stmt->bindParam(':ESCALARELEVANTE',                $ESCALARELEVANTE);
            $stmt->bindParam(':CNPJFABRICANTE',                 $CNPJFABRICANTE);
            $stmt->bindParam(':IDSEQUENCIACARGA',               $IDSEQUENCIACARGA);
            $stmt->bindParam(':CPRODANVISA',                    $CPRODANVISA);
            $stmt->bindParam(':GID_CODIGOBENEFICIO',            $GID_CODIGOBENEFICIO);
            $stmt->bindParam(':MOTIVOISENCAOANVISA',            $MOTIVOISENCAOANVISA);
            $stmt->bindParam(':MEDIAVLRICMSSUBSTITUTO',         $MEDIAVLRICMSSUBSTITUTO);
            $stmt->bindParam(':ENVIAB2B',                       $ENVIAB2B);
            $stmt->bindParam(':SALDOFLEX',                      $SALDOFLEX);
            $stmt->bindParam(':ACRESCIMOFLEX',                  $ACRESCIMOFLEX);
            $stmt->bindParam(':DESCONTOFLEX',                   $DESCONTOFLEX);
            $stmt->bindParam(':TRIBUTA_FET',                    $TRIBUTA_FET);
            $stmt->bindParam(':RESTRINGIRVENDA',                $RESTRINGIRVENDA);
            $stmt->bindParam(':QTDE_VENDA_MULTIPLA',            $QTDE_VENDA_MULTIPLA);
            $stmt->bindParam(':VALORCUSTOICMSSTDESONERADO',     $VALORCUSTOICMSSTDESONERADO);
            $stmt->bindParam(':FAMILIAPROD',                    $FAMILIAPROD);
            $stmt->bindParam(':DESCONTOMAXIMOFLEX',             $DESCONTOMAXIMOFLEX);
            $stmt->bindParam(':MARGEMLUCROATACADO',             $MARGEMLUCROATACADO);
            $stmt->bindParam('CUSTOFINALATACADO',               $CUSTOFINALATACADO);


            // Execute a consulta de inserção
            $stmt->execute();
        };

        $dbOrigem->closeOrigem();
        $dbDestino->closeDestino();
    }

    public function unidadeRefInsert()
    {

        $quantidadeProduto = 0;
        $qtde = 0;
        // Crie uma instância da classe Database
        $dbOrigem = new DatabaseOrigem(ip_origem, caminho_origem, usuario_origem, senha_origem);
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connOrigem = $dbOrigem->connectOrigem();
        $connDestino = $dbDestino->connectDestino();

        //VERIFICA A QUANTIDADE DE PRODUTOS
        $queryQtde = "SELECT COUNT(A.IDPRODUTOUNIDADEREFERENCIA) AS QTDE FROM TESTPRODUTOUNIDADEREFERENCIA A";
        $resultQtde = $connOrigem->query($queryQtde);

        if ($resultQtde) {
            $rowQtde = $resultQtde->fetch(PDO::FETCH_ASSOC);
            if ($rowQtde) {
                $quantidadeProduto = $rowQtde['QTDE'];
            } else {
                echo "Nenhum resultado encontrado.";
            }
        } else {
            echo "Erro na consulta SQL: " . $connOrigem->errorInfo()[2];
        }

        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TESTPRODUTOUNIDADEREFERENCIA";
        $result = $connOrigem->query($query);




        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if (intval($qtde) <= intval($quantidadeProduto)) {

                // Processar os resultados
                $IDPRODUTOUNIDADEREFERENCIA   = $row['IDPRODUTOUNIDADEREFERENCIA'];
                $DESCRICAO                    = $row['DESCRICAO'];
                $FATOR                        = $row['FATOR'];

                $sql = "UPDATE OR INSERT INTO TESTPRODUTOUNIDADEREFERENCIA 
                       (IDPRODUTOUNIDADEREFERENCIA, 
                       DESCRICAO, 
                       FATOR) 
                        VALUES 
                        (:IDPRODUTOUNIDADEREFERENCIA, 
                        :DESCRICAO, 
                        :FATOR)  MATCHING (IDPRODUTOUNIDADEREFERENCIA)";

                // Prepare a consulta
                $stmt = $connDestino->prepare($sql);

                // Associe os valores aos parâmetros na consulta
                $stmt->bindParam(':IDPRODUTOUNIDADEREFERENCIA', $IDPRODUTOUNIDADEREFERENCIA);
                $stmt->bindParam(':DESCRICAO', $DESCRICAO);
                $stmt->bindParam(':FATOR', $FATOR);

                // Execute a consulta de inserção
                $stmt->execute();
            }
            $qtde = $qtde + 1;
        };

        $dbOrigem->closeOrigem();
        $dbDestino->closeDestino();
    }

    public function grupoTributacaoInsert($EMPRESA)
    {

        $quantidadeProduto = 0;
        $qtde = 0;
        // Crie uma instância da classe Database
        $dbOrigem = new DatabaseOrigem(ip_origem, caminho_origem, usuario_origem, senha_origem);
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connOrigem = $dbOrigem->connectOrigem();
        $connDestino = $dbDestino->connectDestino();

        //VERIFICA A QUANTIDADE DE PRODUTOS
        $queryQtde = "SELECT COUNT(A.IDGRUPOTRIBUTACAO) AS QTDE FROM TESTGRUPOTRIBUTACAO A";
        $resultQtde = $connOrigem->query($queryQtde);

        if ($resultQtde) {
            $rowQtde = $resultQtde->fetch(PDO::FETCH_ASSOC);
            if ($rowQtde) {
                $quantidadeProduto = $rowQtde['QTDE'];
            } else {
                echo "Nenhum resultado encontrado.";
            }
        } else {
            echo "Erro na consulta SQL: " . $connOrigem->errorInfo()[2];
        }

        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TESTGRUPOTRIBUTACAO A WHERE A.EMPRESA = '$EMPRESA'";
        $result = $connOrigem->query($query);




        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if (intval($qtde) <= intval($quantidadeProduto)) {

                // Processar os resultados
                $EMPRESA              = $row['EMPRESA'];
                $IDGRUPOTRIBUTACAO    = $row['IDGRUPOTRIBUTACAO'];
                $DESCRICAO            = $row['DESCRICAO'];
                $USUARIO              = $row['USUARIO'];

                $sql = "UPDATE OR INSERT INTO TESTGRUPOTRIBUTACAO 
                       (EMPRESA, 
                       IDGRUPOTRIBUTACAO, 
                       DESCRICAO,
                       USUARIO) 
                        VALUES 
                        (:EMPRESA, 
                        :IDGRUPOTRIBUTACAO, 
                        :DESCRICAO,
                        :USUARIO) MATCHING (EMPRESA, IDGRUPOTRIBUTACAO)";

                // Prepare a consulta
                $stmt = $connDestino->prepare($sql);

                // Associe os valores aos parâmetros na consulta
                $stmt->bindParam(':EMPRESA', $EMPRESA);
                $stmt->bindParam(':IDGRUPOTRIBUTACAO', $IDGRUPOTRIBUTACAO);
                $stmt->bindParam(':DESCRICAO', $DESCRICAO);
                $stmt->bindParam(':USUARIO', $USUARIO);


                // Execute a consulta de inserção
                $stmt->execute();
            }
            $qtde = $qtde + 1;
        };

        $dbOrigem->closeOrigem();
        $dbDestino->closeDestino();
    }

    public function contaSpedInsert()
    {
        // Crie uma instância da classe Database
        $dbOrigem = new DatabaseOrigem(ip_origem, caminho_origem, usuario_origem, senha_origem);
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connOrigem = $dbOrigem->connectOrigem();
        $connDestino = $dbDestino->connectDestino();


        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TGERCONTASPED A";
        $result = $connOrigem->query($query);




        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {


            // Processar os resultados
            $IDCONTASPED            = $row['IDCONTASPED'];
            $CONTASPED              = $row['CONTASPED'];
            $DESCRICAO              = $row['DESCRICAO'];
            $DATAINCLUSAO           = $row['DATAINCLUSAO'];
            $NATUREZA               = $row['NATUREZA'];
            $TIPOCONTA              = $row['TIPOCONTA'];
            $CONTASPEDREFERENCIAL   = $row['CONTASPEDREFERENCIAL'];

            $sql = "UPDATE OR INSERT INTO TGERCONTASPED 
                      (IDCONTASPED, 
                       CONTASPED, 
                       DESCRICAO,
                       DATAINCLUSAO,
                       NATUREZA,
                       TIPOCONTA,
                       CONTASPEDREFERENCIAL) 
                        VALUES 
                        (:IDCONTASPED, 
                        :CONTASPED, 
                        :DESCRICAO,
                        :DATAINCLUSAO,
                        :NATUREZA,
                        :TIPOCONTA,
                        :CONTASPEDREFERENCIAL) MATCHING (IDCONTASPED)";

            // Prepare a consulta
            $stmt = $connDestino->prepare($sql);

            // Associe os valores aos parâmetros na consulta
            $stmt->bindParam(':IDCONTASPED', $IDCONTASPED);
            $stmt->bindParam(':CONTASPED', $CONTASPED);
            $stmt->bindParam(':DESCRICAO', $DESCRICAO);
            $stmt->bindParam(':DATAINCLUSAO', $DATAINCLUSAO);
            $stmt->bindParam(':NATUREZA', $NATUREZA);
            $stmt->bindParam(':TIPOCONTA', $TIPOCONTA);
            $stmt->bindParam(':CONTASPEDREFERENCIAL', $CONTASPEDREFERENCIAL);


            // Execute a consulta de inserção
            $stmt->execute();
        };

        $dbOrigem->closeOrigem();
        $dbDestino->closeDestino();
    }


    public function tabelaPrecoProdutosInsert($EMPRESA)
    {

        // Crie uma instância da classe Database
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connDestino = $dbDestino->connectDestino();

        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TESTPRODUTO A WHERE A.EMPRESA = '$EMPRESA'";
        $result = $connDestino->query($query);




        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            // Processar os resultados 
            $EMPRESA                  = $row['EMPRESA'];
            $PRODUTO                  = $row['PRODUTO'];
            $CUSTOFABRICA             = $row['CUSTOFABRICA'];
            $CUSTONOTA                = $row['CUSTOFABRICA'];
            $CUSTOREPOSICAO           = $row['CUSTOREPOSICAO'];
            $CUSTOFINAL               = $row['CUSTOFINAL'];
            $CUSTOMEDIO               = $row['CUSTOMEDIO'];
            $CUSTOMEDIOREPOSICAO      = $row['CUSTOMEDIOREPOSICAO'];
            $CARGAOPERACIONAL         = $row['CARGAOPERACIONAL'];
            $AJUSTE                   = $row['AJUSTE'];
            $MARGEMLUCRO              = $row['MARGEMLUCRO'];
            $PRSUGERIDO               = $row['PRSUGERIDO'];
            $PRPRATICADO              = $row['PRPRATICADO'];
            $DATAALTERACAO            = $row['DATAALTERACAO'];
            $IDALTERACAO              = $row['IDALTERACAO'];
            $IDENVIOPAF               = $row['IDENVIOPAF'];
            $DATAHORAALTERACAO        = $row['DATAHORAALTERACAO'];



            $sql = "UPDATE OR INSERT INTO TESTTABELAPRECOPRODUTOS 
                       (EMPRESA,
                        IDTABELAPRECO,
                        PRODUTO,
                        CUSTOFABRICA,
                        CUSTONOTA,
                        CUSTOREPOSICAO,
                        CUSTOFINAL,
                        CUSTOMEDIO,
                        CUSTOMEDIOREPOSICAO,
                        CARGAOPERACIONAL,
                        PERCCARGAOPERACIONAL,
                        AJUSTE,
                        MARGEMLUCRO,
                        PRSUGERIDO,
                        PRPRATICADO,
                        PRANTERIOR,
                        VALORESESPECIFICOS,
                        QTDEMINIMA,
                        QTDEMAXIMA,
                        QTDEPROMOCAO,
                        DATAALTERACAO,                       
                        IDALTERACAO,
                        IDENVIOPAF,
                        PERCCOMISSAO,
                        DATAHORAALTERACAO)
                        VALUES 
                       (:EMPRESA,
                        1,
                        :PRODUTO,
                        :CUSTOFABRICA,
                        :CUSTONOTA,
                        :CUSTOREPOSICAO,
                        :CUSTOFINAL,
                        :CUSTOMEDIO,
                        :CUSTOMEDIOREPOSICAO,
                        :CARGAOPERACIONAL,
                        0,
                        :AJUSTE,
                        :MARGEMLUCRO,
                        :PRSUGERIDO,
                        :PRPRATICADO,
                        0,
                        'N',
                        0,
                        0,
                        0,
                        :DATAALTERACAO,                       
                        :IDALTERACAO,
                        :IDENVIOPAF,
                        0,
                        :DATAHORAALTERACAO) MATCHING (EMPRESA, IDTABELAPRECO, PRODUTO)";

            // Prepare a consulta
            $stmt = $connDestino->prepare($sql);

            // Associe os valores aos parâmetros na consulta
            $stmt->bindParam(':EMPRESA',               $EMPRESA);
            $stmt->bindParam(':PRODUTO',               $PRODUTO);
            $stmt->bindParam(':CUSTOFABRICA',          $CUSTOFABRICA);
            $stmt->bindParam(':CUSTONOTA',             $CUSTONOTA);
            $stmt->bindParam(':CUSTOREPOSICAO',        $CUSTOREPOSICAO);
            $stmt->bindParam(':CUSTOFINAL',            $CUSTOFINAL);
            $stmt->bindParam(':CUSTOMEDIO',            $CUSTOMEDIO);
            $stmt->bindParam(':CUSTOMEDIOREPOSICAO',   $CUSTOMEDIOREPOSICAO);
            $stmt->bindParam(':CARGAOPERACIONAL',      $CARGAOPERACIONAL);
            $stmt->bindParam(':AJUSTE',                $AJUSTE);
            $stmt->bindParam(':MARGEMLUCRO',           $MARGEMLUCRO);
            $stmt->bindParam(':PRSUGERIDO',            $PRSUGERIDO);
            $stmt->bindParam(':PRPRATICADO',           $PRPRATICADO);
            $stmt->bindParam(':DATAALTERACAO',         $DATAALTERACAO);
            $stmt->bindParam(':IDALTERACAO',           $IDALTERACAO);
            $stmt->bindParam(':IDENVIOPAF',            $IDENVIOPAF);
            $stmt->bindParam(':DATAHORAALTERACAO',     $DATAHORAALTERACAO);

            // Execute a consulta de inserção
            $stmt->execute();
        };
        $dbDestino->closeDestino();
    }


    public function estoquerodutosInsert($EMPRESA)
    {

        // Crie uma instância da classe Database
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connDestino = $dbDestino->connectDestino();

        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TESTPRODUTO A WHERE A.EMPRESA = '$EMPRESA'";
        $result = $connDestino->query($query);


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            // Processar os resultados 
            $EMPRESA             = $row['EMPRESA'];
            $PRODUTO             = $row['PRODUTO'];
            $ESTDISPONIVEL       = $row['ESTDISPONIVEL'];
            $ESTARETIRAR         = $row['ESTARETIRAR'];
            $ESTCONDICIONAL      = $row['ESTCONDICIONAL'];
            $ESTRESERVADO        = $row['ESTRESERVADO'];
            $IDALTERACAO         = $row['IDALTERACAO'];
            $IDENVIOPAF          = $row['IDENVIOPAF'];
            $DATAHORAALTERACAO   = $row['DATAHORAALTERACAO'];
            $ESTVENDAEXTERNA     = $row['ESTVENDAEXTERNA'];



            $sql = "UPDATE OR INSERT INTO TESTESTOQUE 
                       (EMPRESA,
                        ALMOX,
                        PRODUTO,
                        ESTDISPONIVEL,
                        ESTARETIRAR,
                        ESTCONDICIONAL,
                        ESTRESERVADO,
                        ENDERECO,
                        ESTIDEAL,
                        IDALTERACAO,
                        IDENVIOPAF,
                        DATAHORAALTERACAO,
                        ESTTRANSITO,
                        ESTVENDAEXTERNA)
                        VALUES 
                       (:EMPRESA,
                        '01',
                        :PRODUTO,
                        :ESTDISPONIVEL,
                        :ESTARETIRAR,
                        :ESTCONDICIONAL,
                        :ESTRESERVADO,
                        '',
                        0,
                        :IDALTERACAO,
                        :IDENVIOPAF,
                        :DATAHORAALTERACAO,
                        :ESTTRANSITO,
                        :ESTVENDAEXTERNA) MATCHING (EMPRESA, PRODUTO)";

            // Prepare a consulta
            $stmt = $connDestino->prepare($sql);

            // Associe os valores aos parâmetros na consulta
            $stmt->bindParam(':EMPRESA',           $EMPRESA);
            $stmt->bindParam(':PRODUTO',           $PRODUTO);
            $stmt->bindParam(':ESTDISPONIVEL',     $ESTDISPONIVEL);
            $stmt->bindParam(':ESTARETIRAR',       $ESTARETIRAR);
            $stmt->bindParam(':ESTCONDICIONAL',    $ESTCONDICIONAL);
            $stmt->bindParam(':ESTRESERVADO',      $ESTRESERVADO);
            $stmt->bindParam(':IDALTERACAO',       $IDALTERACAO);
            $stmt->bindParam(':IDENVIOPAF',        $IDENVIOPAF);
            $stmt->bindParam(':DATAHORAALTERACAO', $DATAHORAALTERACAO);
            $stmt->bindParam(':ESTTRANSITO',       $ESTTRANSITO);
            $stmt->bindParam(':ESTVENDAEXTERNA',   $ESTVENDAEXTERNA);


            // Execute a consulta de inserção
            $stmt->execute();
        };
        $dbDestino->closeDestino();
    }



    public function clienteGeralInsert()
    {
        // Crie uma instância da classe Database
        $dbOrigem = new DatabaseOrigem(ip_origem, caminho_origem, usuario_origem, senha_origem);
        $dbDestino = new DatabaseDestino(ip_destino, caminho_destino, usuario_destino, senha_destino);

        // Faça a conexão
        $connOrigem = $dbOrigem->connectOrigem();
        $connDestino = $dbDestino->connectDestino();


        // Agora você pode usar a variável $conn para executar consultas no banco de dados Firebird
        // Exemplo de consulta
        $query = "SELECT * FROM TRECCLIENTEGERAL A";
        $result = $connOrigem->query($query);




        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // Processar os resultados


            $CODIGO                     = $row['CODIGO'];
            $PESSOA                     = $row['PESSOA'];
            $CPFCNPJ                    = $row['CPFCNPJ'];
            $RGIE                       = $row['RGIE'];
            $ORGAOEXPEDIDOR             = $row['ORGAOEXPEDIDOR'];
            $RGPR                       = $row['RGPR'];
            $NOME                       = $row['NOME'];
            $FANTASIA                   = $row['FANTASIA'];
            $ENDERECO                   = $row['ENDERECO'];
            $COMPLEMENTO                = $row['COMPLEMENTO'];
            $BAIRRO                     = $row['BAIRRO'];
            $CIDADE                     = $row['CIDADE'];
            $CEP                        = $row['CEP'];
            $CAIXAPOSTAL                = $row['CAIXAPOSTAL'];
            $FONE                       = $row['FONE'];
            $FAX                        = $row['FAX'];
            $EMAIL                      = $row['EMAIL'];
            $HOMEPAGE                   = $row['HOMEPAGE'];
            $ENDERECOCOB                = $row['ENDERECOCOB'];
            $COMPLCOBRANCA              = $row['COMPLCOBRANCA'];
            $BAIRROCOB                  = $row['BAIRROCOB'];
            $CIDADECOB                  = $row['CIDADECOB'];
            $CEPCOB                     = $row['CEPCOB'];
            $CAIXAPOSTALCOB             = $row['CAIXAPOSTALCOB'];
            $PORTADOR                   = $row['PORTADOR'];
            $ATIVIDADE                  = $row['ATIVIDADE'];
            $REFBAN1                    = $row['REFBAN1'];
            $AGREFBAN1                  = $row['AGREFBAN1'];
            $FONEREFBAN1                = $row['FONEREFBAN1'];
            $REFBAN2                    = $row['REFBAN2'];
            $AGREFBAN2                  = $row['AGREFBAN2'];
            $FONEREFBAN2                = $row['FONEREFBAN2'];
            $REFBAN3                    = $row['REFBAN3'];
            $AGREFBAN3                  = $row['AGREFBAN3'];
            $FONEREFBAN3                = $row['FONEREFBAN3'];
            $BEMIMOV1                   = $row['BEMIMOV1'];
            $LOCALBEMIMOV1              = $row['LOCALBEMIMOV1'];
            $LOCALBEMIMOV1              = $row['LOCALBEMIMOV1'];
            $BEMIMOV2                   = $row['BEMIMOV2'];
            $LOCALBEMIMOV2              = $row['LOCALBEMIMOV2'];
            $VALORBEMIMOV2              = $row['VALORBEMIMOV2'];
            $BEMIMOV3                   = $row['BEMIMOV3'];
            $LOCALBEMIMOV3              = $row['LOCALBEMIMOV3'];
            $VALORBEMIMOV3              = $row['VALORBEMIMOV3'];
            $BEM1                       = $row['BEM1'];
            $TIPOBEM1                   = $row['TIPOBEM1'];
            $VALORBEM1                  = $row['VALORBEM1'];
            $BEM2                       = $row['BEM2'];
            $TIPOBEM2                   = $row['TIPOBEM2'];
            $VALORBEM2                  = $row['VALORBEM2'];
            $BEM3                       = $row['BEM3'];
            $TIPOBEM3                   = $row['TIPOBEM3'];
            $VALORBEM3                  = $row['VALORBEM3'];
            $REFCOM1                    = $row['REFCOM1'];
            $FONEREFCOM1                = $row['FONEREFCOM1'];
            $REFCOM2                    = $row['REFCOM2'];
            $FONEREFCOM2                = $row['FONEREFCOM2'];
            $REFCOM3                    = $row['REFCOM3'];
            $FONEREFCOM3                = $row['FONEREFCOM3'];
            $AREABEMIMOV1               = $row['AREABEMIMOV1'];
            $AREABEMIMOV2               = $row['AREABEMIMOV2'];
            $AREABEMIMOV3               = $row['AREABEMIMOV3'];
            $CLIENTEDESDE               = $row['CLIENTEDESDE'];
            $APROVADOPOR                = $row['APROVADOPOR'];
            $DATACADASTRO               = $row['DATACADASTRO'];
            $BLOQUEADO                  = $row['BLOQUEADO'];
            $USUARIO                    = $row['USUARIO'];
            $EMPRESACONVENIO            = $row['EMPRESACONVENIO'];
            $CONVENENTECONVENIADO       = $row['CONVENENTECONVENIADO'];
            $CONVENIOCANCELADO          = $row['CONVENIOCANCELADO'];
            $OBSREFCOM1                 = $row['OBSREFCOM1'];
            $OBSREFCOM2                 = $row['OBSREFCOM2'];
            $OBSREFCOM3                 = $row['OBSREFCOM3'];
            $LIMITE                     = $row['LIMITE'];
            $LIMITEGLOBAL               = $row['LIMITEGLOBAL'];
            $VENCTOLIMITE               = $row['VENCTOLIMITE'];
            $CONCEDIDOPOR               = $row['CONCEDIDOPOR'];
            $CONCEDIDOEM                = $row['CONCEDIDOEM'];
            $LIMITEANT                  = $row['LIMITEANT'];
            $VENCTOLIMITEANT            = $row['VENCTOLIMITEANT'];
            $CONCEDIDOEMANT             = $row['CONCEDIDOEMANT'];
            $CONCEDIDOPORANT            = $row['CONCEDIDOPORANT'];
            $LIMITECONVENIO             = $row['LIMITECONVENIO'];
            $VENCTOLIMITECONV           = $row['VENCTOLIMITECONV'];
            $CONCEDIDOPORCONV           = $row['CONCEDIDOPORCONV'];
            $CONCEDIDOEMCONV            = $row['CONCEDIDOEMCONV'];
            $LIMITEANTCONV              = $row['LIMITEANTCONV'];
            $VENCTOLIMITEANTCONV        = $row['VENCTOLIMITEANTCONV'];
            $CONCEDIDOEMANTCONV         = $row['CONCEDIDOEMANTCONV'];
            $CONCEDIDOPORANTCONV        = $row['CONCEDIDOPORANTCONV'];
            $AUTORIZAEMAIL              = $row['AUTORIZAEMAIL'];
            $DATAULTIMOENVIO            = $row['DATAULTIMOENVIO'];
            $ULTATUALIZACAODATA         = $row['ULTATUALIZACAODATA'];
            $ULTATUALIZACAOUSUARIO      = $row['ULTATUALIZACAOUSUARIO'];
            $ENVIADOCARTAOFIDELIDADE    = $row['ENVIADOCARTAOFIDELIDADE'];
            $TIPOIMOVEL                 = $row['TIPOIMOVEL'];
            $MELHORDIARECEBIMENTO       = $row['MELHORDIARECEBIMENTO'];
            $DIRETORIOREQUISICAOTEF     = $row['DIRETORIOREQUISICAOTEF'];
            $DIRETORIORESPOSTATEF       = $row['DIRETORIORESPOSTATEF'];
            $CODIGOSUFRAMA              = $row['CODIGOSUFRAMA'];
            $FONECELULAR                = $row['FONECELULAR'];
            $OBSNOTA                    = $row['OBSNOTA'];
            $SUBSTITUTOISSQN            = $row['SUBSTITUTOISSQN'];
            $CARTAOFIDELIDADE           = $row['CARTAOFIDELIDADE'];
            $PROPRIEDADERURAL           = $row['PROPRIEDADERURAL'];
            $IDENTFIDCLIENTE            = $row['IDENTFIDCLIENTE'];
            $ISENTOISSQN                = $row['ISENTOISSQN'];
            $SUPERSIMPLES               = $row['SUPERSIMPLES'];
            $CODIGOCARTAO               = $row['CODIGOCARTAO'];
            $AUTORIZADO1                = $row['AUTORIZADO1'];
            $AUTORIZADO2                = $row['AUTORIZADO2'];
            $AUTORIZADO3                = $row['AUTORIZADO3'];
            $AUTORIZADO4                = $row['AUTORIZADO4'];
            $AUTORIZADO5                = $row['AUTORIZADO5'];
            $IMPRIMEAUTORIZADOS         = $row['IMPRIMEAUTORIZADOS'];
            $IMPRIMETEXTOSPCSERASA      = $row['IMPRIMETEXTOSPCSERASA'];
            $DIAVCTOQUALICARD           = $row['DIAVCTOQUALICARD'];
            $PLACA                      = $row['PLACA'];
            $IDCONTROLENOTEBOOK         = $row['IDCONTROLENOTEBOOK'];
            $IDALTERACAODEBITO          = $row['IDALTERACAODEBITO'];
            $CONTAREFBAN1               = $row['CONTAREFBAN1'];
            $CONTAREFBAN2               = $row['CONTAREFBAN2'];
            $CONTAREFBAN3               = $row['CONTAREFBAN3'];
            $BLOQUEIAPLACANAOCADASTRADA = $row['BLOQUEIAPLACANAOCADASTRADA'];
            $INSCRICAOMUNICIPAL         = $row['INSCRICAOMUNICIPAL'];
            $DATAHORAALTERACAO          = $row['DATAHORAALTERACAO'];
            $ENVIARORDEMCOMPRA          = $row['ENVIARORDEMCOMPRA'];
            $FIDELIDADE                 = $row['FIDELIDADE'];
            $NUMEROENDERECO             = $row['NUMEROENDERECO'];
            $NUMEROENDERECOCOB          = $row['NUMEROENDERECOCOB'];
            $IDESTRANGEIRO              = $row['IDESTRANGEIRO'];
            $NIRF                       = $row['NIRF'];
            $NIRF_OLD                   = $row['NIRF_OLD'];
            $OBS                        = $row['OBS'];
            $OBSFINANCEIRA              = $row['OBSFINANCEIRA'];
            $TEXTOSPCSERASA             = $row['TEXTOSPCSERASA'];
            $CODIGOIBGE                 = $row['CODIGOIBGE'];
            $CODIGOIBGECOB              = $row['CODIGOIBGECOB'];
            $REPLICADO                  = $row['REPLICADO'];
            $CPFCNPJCONVENIO            = $row['CPFCNPJCONVENIO'];
            $NIRFCONVENIO               = $row['NIRFCONVENIO'];
            $BLOQUEIAVENDASEMPLACA      = $row['BLOQUEIAVENDASEMPLACA'];
            $SUBSTITUTOIRRF             = $row['SUBSTITUTOIRRF'];
            $SUBSTITUTOCSLL             = $row['SUBSTITUTOCSLL'];
            $SUBSTITUTOINSS             = $row['SUBSTITUTOINSS'];
            $SUBSTITUTOPISCOFINS        = $row['SUBSTITUTOPISCOFINS'];
            $GIDMEIOPUBLIC              = $row['GIDMEIOPUBLIC'];
        //    $GIDREGIAO                  = $row['GIDREGIAO'];
        //    $REGIAO                     = $row['REGIAO'];
       /*     $GIDTIPOCLIENTE             = $row['GIDTIPOCLIENTE'];
            $TIPOCLIENTE                = $row['TIPOCLIENTE'];
            $GID_ENDERECO               = $row['GID_ENDERECO'];
            $DESTINOREVENDA             = $row['DESTINOREVENDA'];
            $DESTINOARMAZENADOR         = $row['DESTINOARMAZENADOR'];
            $ANVISA_MS_DATA_AFE         = $row['ANVISA_MS_DATA_AFE'];
            $ANVISA_MS_DATA_AE          = $row['ANVISA_MS_DATA_AE'];
            $CREDITOPRESUMIDO           = $row['CREDITOPRESUMIDO'];
            $IDNIF                      = $row['IDNIF'];
            $NIF                        = $row['NIF'];
            $CAEPF                      = $row['CAEPF'];*/


            $sql = "UPDATE OR INSERT INTO TRECCLIENTEGERAL( 

                    CODIGO,
                    PESSOA,
                    CPFCNPJ,
                    RGIE,
                    ORGAOEXPEDIDOR,
                    RGPR,
                    NOME,
                    FANTASIA,
                    ENDERECO,
                    COMPLEMENTO,
                    BAIRRO,
                    CIDADE,
                    CEP,
                    CAIXAPOSTAL,
                    FONE,
                    FAX,
                    EMAIL,
                    HOMEPAGE,
                    ENDERECOCOB,
                    COMPLCOBRANCA,
                    BAIRROCOB,
                    CIDADECOB,
                    CEPCOB,
                    CAIXAPOSTALCOB,
                    PORTADOR,
                    ATIVIDADE,
                    REFBAN1,
                    AGREFBAN1,
                    FONEREFBAN1,
                    REFBAN2,
                    AGREFBAN2,
                    FONEREFBAN2,
                    REFBAN3,
                    AGREFBAN3,
                    FONEREFBAN3,
                    BEMIMOV1,
                    LOCALBEMIMOV1,
                    VALORBEMIMOV1,
                    BEMIMOV2,
                    LOCALBEMIMOV2,
                    VALORBEMIMOV2,
                    BEMIMOV3,
                    LOCALBEMIMOV3,
                    VALORBEMIMOV3,
                    BEM1,
                    TIPOBEM1,
                    VALORBEM1,
                    BEM2,
                    TIPOBEM2,
                    VALORBEM2,
                    BEM3,
                    TIPOBEM3,
                    VALORBEM3,
                    REFCOM1,
                    FONEREFCOM1,
                    REFCOM2,
                    FONEREFCOM2,
                    REFCOM3,
                    FONEREFCOM3,
                    AREABEMIMOV1,
                    AREABEMIMOV2,
                    AREABEMIMOV3,
                    CLIENTEDESDE,
                    APROVADOPOR,
                    DATACADASTRO,
                    BLOQUEADO,
                    USUARIO,
                    EMPRESACONVENIO,
                    CONVENENTECONVENIADO,
                    CONVENIOCANCELADO,
                    OBSREFCOM1,
                    OBSREFCOM2,
                    OBSREFCOM3,
                    LIMITE,
                    LIMITEGLOBAL,
                    VENCTOLIMITE,
                    CONCEDIDOPOR,
                    CONCEDIDOEM,
                    LIMITEANT,
                    VENCTOLIMITEANT,
                    CONCEDIDOEMANT,
                    CONCEDIDOPORANT,
                    LIMITECONVENIO,
                    VENCTOLIMITECONV,
                    CONCEDIDOPORCONV,
                    CONCEDIDOEMCONV,
                    LIMITEANTCONV,
                    VENCTOLIMITEANTCONV,
                    CONCEDIDOEMANTCONV,
                    CONCEDIDOPORANTCONV,
                    AUTORIZAEMAIL,
                    DATAULTIMOENVIO,
                    ULTATUALIZACAODATA,
                    ULTATUALIZACAOUSUARIO,
                    ENVIADOCARTAOFIDELIDADE,
                    TIPOIMOVEL,
                    MELHORDIARECEBIMENTO,
                    DIRETORIOREQUISICAOTEF,
                    DIRETORIORESPOSTATEF,
                    CODIGOSUFRAMA,
                    FONECELULAR,
                    OBSNOTA,
                    SUBSTITUTOISSQN,
                    CARTAOFIDELIDADE,
                    PROPRIEDADERURAL,
                    IDENTFIDCLIENTE,
                    ISENTOISSQN,
                    SUPERSIMPLES,
                    CODIGOCARTAO,
                    AUTORIZADO1,
                    AUTORIZADO2,
                    AUTORIZADO3,
                    AUTORIZADO4,
                    AUTORIZADO5,
                    IMPRIMEAUTORIZADOS,
                    IMPRIMETEXTOSPCSERASA,
                    DIAVCTOQUALICARD,
                    PLACA,
                    IDCONTROLENOTEBOOK,
                    IDALTERACAODEBITO,
                    CONTAREFBAN1,
                    CONTAREFBAN2,
                    CONTAREFBAN3,
                    BLOQUEIAPLACANAOCADASTRADA,
                    INSCRICAOMUNICIPAL,
                    DATAHORAALTERACAO,
                    ENVIARORDEMCOMPRA,
                    FIDELIDADE,
                    NUMEROENDERECO,
                    NUMEROENDERECOCOB,
                    IDESTRANGEIRO,
                    NIRF,
                    NIRF_OLD,
                    OBS,
                    OBSFINANCEIRA,
                    TEXTOSPCSERASA,
                    CODIGOIBGE,
                    CODIGOIBGECOB,
                    REPLICADO,
                    CPFCNPJCONVENIO,
                    NIRFCONVENIO,
                    BLOQUEIAVENDASEMPLACA,
                    SUBSTITUTOIRRF,
                    SUBSTITUTOCSLL,
                    SUBSTITUTOINSS,
                    SUBSTITUTOPISCOFINS,
                    GIDMEIOPUBLIC)
                    VALUES
                    (:CODIGO,
                    :PESSOA,
                    :CPFCNPJ,
                    :RGIE,
                    :ORGAOEXPEDIDOR,
                    :RGPR,
                    :NOME,
                    :FANTASIA,
                    :ENDERECO,
                    :COMPLEMENTO,
                    :BAIRRO,
                    :CIDADE,
                    :CEP,
                    :CAIXAPOSTAL,
                    :FONE,
                    :FAX,
                    :EMAIL,
                    :HOMEPAGE,
                    :ENDERECOCOB,
                    :COMPLCOBRANCA,
                    :BAIRROCOB,
                    :CIDADECOB,
                    :CEPCOB,
                    :CAIXAPOSTALCOB,
                    :PORTADOR,
                    :ATIVIDADE,
                    :REFBAN1,
                    :AGREFBAN1,
                    :FONEREFBAN1,
                    :REFBAN2,
                    :AGREFBAN2,
                    :FONEREFBAN2,
                    :REFBAN3,
                    :AGREFBAN3,
                    :FONEREFBAN3,
                    :BEMIMOV1,
                    :LOCALBEMIMOV1,
                    :VALORBEMIMOV1,
                    :BEMIMOV2,
                    :LOCALBEMIMOV2,
                    :VALORBEMIMOV2,
                    :BEMIMOV3,
                    :LOCALBEMIMOV3,
                    :VALORBEMIMOV3,
                    :BEM1,
                    :TIPOBEM1,
                    :VALORBEM1,
                    :BEM2,
                    :TIPOBEM2,
                    :VALORBEM2,
                    :BEM3,
                    :TIPOBEM3,
                    :VALORBEM3,
                    :REFCOM1,
                    :FONEREFCOM1,
                    :REFCOM2,
                    :FONEREFCOM2,
                    :REFCOM3,
                    :FONEREFCOM3,
                    :AREABEMIMOV1,
                    :AREABEMIMOV2,
                    :AREABEMIMOV3,
                    :CLIENTEDESDE,
                    :APROVADOPOR,
                    :DATACADASTRO,
                    :BLOQUEADO,
                    :USUARIO,
                    :EMPRESACONVENIO,
                    :CONVENENTECONVENIADO,
                    :CONVENIOCANCELADO,
                    :OBSREFCOM1,
                    :OBSREFCOM2,
                    :OBSREFCOM3,
                    :LIMITE,
                    :LIMITEGLOBAL,
                    :VENCTOLIMITE,
                    :CONCEDIDOPOR,
                    :CONCEDIDOEM,
                    :LIMITEANT,
                    :VENCTOLIMITEANT,
                    :CONCEDIDOEMANT,
                    :CONCEDIDOPORANT,
                    :LIMITECONVENIO,
                    :VENCTOLIMITECONV,
                    :CONCEDIDOPORCONV,
                    :CONCEDIDOEMCONV,
                    :LIMITEANTCONV,
                    :VENCTOLIMITEANTCONV,
                    :CONCEDIDOEMANTCONV,
                    :CONCEDIDOPORANTCONV,
                    :AUTORIZAEMAIL,
                    :DATAULTIMOENVIO,
                    :ULTATUALIZACAODATA,
                    :ULTATUALIZACAOUSUARIO,
                    :ENVIADOCARTAOFIDELIDADE,
                    :TIPOIMOVEL,
                    :MELHORDIARECEBIMENTO,
                    :DIRETORIOREQUISICAOTEF,
                    :DIRETORIORESPOSTATEF,
                    :CODIGOSUFRAMA,
                    :FONECELULAR,
                    :OBSNOTA,
                    :SUBSTITUTOISSQN,
                    :CARTAOFIDELIDADE,
                    :PROPRIEDADERURAL,
                    :IDENTFIDCLIENTE,
                    :ISENTOISSQN,
                    :SUPERSIMPLES,
                    :CODIGOCARTAO,
                    :AUTORIZADO1,
                    :AUTORIZADO2,
                    :AUTORIZADO3,
                    :AUTORIZADO4,
                    :AUTORIZADO5,
                    :IMPRIMEAUTORIZADOS,
                    :IMPRIMETEXTOSPCSERASA,
                    :DIAVCTOQUALICARD,
                    :PLACA,
                    :IDCONTROLENOTEBOOK,
                    :IDALTERACAODEBITO,
                    :CONTAREFBAN1,
                    :CONTAREFBAN2,
                    :CONTAREFBAN3,
                    :BLOQUEIAPLACANAOCADASTRADA,
                    :INSCRICAOMUNICIPAL,
                    :DATAHORAALTERACAO,
                    :ENVIARORDEMCOMPRA,
                    :FIDELIDADE,
                    :NUMEROENDERECO,
                    :NUMEROENDERECOCOB,
                    :IDESTRANGEIRO,
                    :NIRF,
                    :NIRF_OLD,
                    :OBS,
                    :OBSFINANCEIRA,
                    :TEXTOSPCSERASA,
                    :CODIGOIBGE,
                    :CODIGOIBGECOB,
                    :REPLICADO,
                    :CPFCNPJCONVENIO,
                    :NIRFCONVENIO,
                    :BLOQUEIAVENDASEMPLACA,
                    :SUBSTITUTOIRRF,
                    :SUBSTITUTOCSLL,
                    :SUBSTITUTOINSS,
                    :SUBSTITUTOPISCOFINS,
                    :GIDMEIOPUBLIC) MATCHING (CODIGO)";

           
            // Prepare a consulta
            $stmt = $connDestino->prepare($sql);

            // Associe os valores aos parâmetros na consulta
            $stmt->bindParam(':CODIGO',                     $CODIGO);
            $stmt->bindParam(':PESSOA',                     $PESSOA);
            $stmt->bindParam(':CPFCNPJ',                    $CPFCNPJ);
            $stmt->bindParam(':RGIE',                       $RGIE);
            $stmt->bindParam(':ORGAOEXPEDIDOR',             $ORGAOEXPEDIDOR);
            $stmt->bindParam(':RGPR',                       $RGPR);
            $stmt->bindParam(':NOME',                       $NOME);
            $stmt->bindParam(':FANTASIA',                   $FANTASIA);
            $stmt->bindParam(':ENDERECO',                   $ENDERECO);
            $stmt->bindParam(':COMPLEMENTO',                $COMPLEMENTO);
            $stmt->bindParam(':BAIRRO',                     $BAIRRO);
            $stmt->bindParam(':CIDADE',                     $CIDADE);
            $stmt->bindParam(':CEP',                        $CEP);
            $stmt->bindParam(':CAIXAPOSTAL',                $CAIXAPOSTAL);
            $stmt->bindParam(':FONE',                       $FONE);
            $stmt->bindParam(':FAX',                        $FAX);
            $stmt->bindParam(':EMAIL',                      $EMAIL);
            $stmt->bindParam(':HOMEPAGE',                   $HOMEPAGE);
            $stmt->bindParam(':ENDERECOCOB',                $ENDERECOCOB);
            $stmt->bindParam(':COMPLCOBRANCA',              $COMPLCOBRANCA);
            $stmt->bindParam(':BAIRROCOB',                  $BAIRROCOB);
            $stmt->bindParam(':CIDADECOB',                  $CIDADECOB);
            $stmt->bindParam(':CEPCOB',                     $CEPCOB);
            $stmt->bindParam(':CAIXAPOSTALCOB',             $CAIXAPOSTALCOB);
            $stmt->bindParam(':PORTADOR',                   $PORTADOR);
            $stmt->bindParam(':ATIVIDADE',                  $ATIVIDADE);
            $stmt->bindParam(':REFBAN1',                    $REFBAN1);
            $stmt->bindParam(':AGREFBAN1',                  $AGREFBAN1);
            $stmt->bindParam(':FONEREFBAN1',                $FONEREFBAN1);
            $stmt->bindParam(':REFBAN2',                    $REFBAN2);
            $stmt->bindParam(':AGREFBAN2',                  $AGREFBAN2);
            $stmt->bindParam(':FONEREFBAN2',                $FONEREFBAN2);
            $stmt->bindParam(':REFBAN3',                    $REFBAN3);
            $stmt->bindParam(':AGREFBAN3',                  $AGREFBAN3);
            $stmt->bindParam(':FONEREFBAN3',                $FONEREFBAN3);
            $stmt->bindParam(':BEMIMOV1',                   $BEMIMOV1);
            $stmt->bindParam(':LOCALBEMIMOV1',              $LOCALBEMIMOV1);
            $stmt->bindParam(':LOCALBEMIMOV1',              $LOCALBEMIMOV1);
            $stmt->bindParam(':BEMIMOV2',                   $BEMIMOV2);
            $stmt->bindParam(':LOCALBEMIMOV2',              $LOCALBEMIMOV2);
            $stmt->bindParam(':VALORBEMIMOV2',              $VALORBEMIMOV2);
            $stmt->bindParam(':BEMIMOV3',                   $BEMIMOV3);
            $stmt->bindParam(':LOCALBEMIMOV3',              $LOCALBEMIMOV3);
            $stmt->bindParam(':VALORBEMIMOV3',              $VALORBEMIMOV3);
            $stmt->bindParam(':BEM1',                       $BEM1);
            $stmt->bindParam(':TIPOBEM1',                   $TIPOBEM1);
            $stmt->bindParam(':VALORBEM1',                  $VALORBEM1);
            $stmt->bindParam(':BEM2',                       $BEM2);
            $stmt->bindParam(':TIPOBEM2',                   $TIPOBEM2);
            $stmt->bindParam(':VALORBEM2',                  $VALORBEM2);
            $stmt->bindParam(':BEM3',                       $BEM3);
            $stmt->bindParam(':TIPOBEM3',                   $TIPOBEM3);
            $stmt->bindParam(':VALORBEM3',                  $VALORBEM3);
            $stmt->bindParam(':REFCOM1',                    $REFCOM1);
            $stmt->bindParam(':FONEREFCOM1',                $FONEREFCOM1);
            $stmt->bindParam(':REFCOM2',                    $REFCOM2);
            $stmt->bindParam(':FONEREFCOM2',                $FONEREFCOM2);
            $stmt->bindParam(':REFCOM3',                    $REFCOM3);
            $stmt->bindParam(':FONEREFCOM3',                $FONEREFCOM3);
            $stmt->bindParam(':AREABEMIMOV1',               $AREABEMIMOV1);
            $stmt->bindParam(':AREABEMIMOV2',               $AREABEMIMOV2);
            $stmt->bindParam(':AREABEMIMOV3',               $AREABEMIMOV3);
            $stmt->bindParam(':CLIENTEDESDE',               $CLIENTEDESDE);
            $stmt->bindParam(':APROVADOPOR',                $APROVADOPOR);
            $stmt->bindParam(':DATACADASTRO',               $DATACADASTRO);
            $stmt->bindParam(':BLOQUEADO',                  $BLOQUEADO);
            $stmt->bindParam(':USUARIO',                    $USUARIO);
            $stmt->bindParam(':EMPRESACONVENIO',            $EMPRESACONVENIO);
            $stmt->bindParam(':CONVENENTECONVENIADO',       $CONVENENTECONVENIADO);
            $stmt->bindParam(':CONVENIOCANCELADO',          $CONVENIOCANCELADO);
            $stmt->bindParam(':OBSREFCOM1',                 $OBSREFCOM1);
            $stmt->bindParam(':OBSREFCOM2',                 $OBSREFCOM2);
            $stmt->bindParam(':OBSREFCOM3',                 $OBSREFCOM3);
            $stmt->bindParam(':LIMITE',                     $LIMITE);
            $stmt->bindParam(':LIMITEGLOBAL',               $LIMITEGLOBAL);
            $stmt->bindParam(':VENCTOLIMITE',               $VENCTOLIMITE);
            $stmt->bindParam(':CONCEDIDOPOR',               $CONCEDIDOPOR);
            $stmt->bindParam(':CONCEDIDOEM',                $CONCEDIDOEM);
            $stmt->bindParam(':LIMITEANT',                  $LIMITEANT);
            $stmt->bindParam(':VENCTOLIMITEANT',            $VENCTOLIMITEANT);
            $stmt->bindParam(':CONCEDIDOEMANT',             $CONCEDIDOEMANT);
            $stmt->bindParam(':CONCEDIDOPORANT',            $CONCEDIDOPORANT);
            $stmt->bindParam(':LIMITECONVENIO',             $LIMITECONVENIO);
            $stmt->bindParam(':VENCTOLIMITECONV',           $VENCTOLIMITECONV);
            $stmt->bindParam(':CONCEDIDOPORCONV',           $CONCEDIDOPORCONV);
            $stmt->bindParam(':CONCEDIDOEMCONV',            $CONCEDIDOEMCONV);
            $stmt->bindParam(':LIMITEANTCONV',              $LIMITEANTCONV);
            $stmt->bindParam(':VENCTOLIMITEANTCONV',        $VENCTOLIMITEANTCONV);
            $stmt->bindParam(':CONCEDIDOEMANTCONV',         $CONCEDIDOEMANTCONV);
            $stmt->bindParam(':CONCEDIDOPORANTCONV',        $CONCEDIDOPORANTCONV);
            $stmt->bindParam(':AUTORIZAEMAIL',              $AUTORIZAEMAIL);
            $stmt->bindParam(':DATAULTIMOENVIO',            $DATAULTIMOENVIO);
            $stmt->bindParam(':ULTATUALIZACAODATA',         $ULTATUALIZACAODATA);
            $stmt->bindParam(':ULTATUALIZACAOUSUARIO',      $ULTATUALIZACAOUSUARIO);
            $stmt->bindParam(':ENVIADOCARTAOFIDELIDADE',    $ENVIADOCARTAOFIDELIDADE);
            $stmt->bindParam(':TIPOIMOVEL',                 $TIPOIMOVEL);
            $stmt->bindParam(':MELHORDIARECEBIMENTO',       $MELHORDIARECEBIMENTO);
            $stmt->bindParam(':DIRETORIOREQUISICAOTEF',     $DIRETORIOREQUISICAOTEF);
            $stmt->bindParam(':DIRETORIORESPOSTATEF',       $DIRETORIORESPOSTATEF);
            $stmt->bindParam(':CODIGOSUFRAMA',              $CODIGOSUFRAMA);
            $stmt->bindParam(':FONECELULAR',                $FONECELULAR);
            $stmt->bindParam(':OBSNOTA',                    $OBSNOTA);
            $stmt->bindParam(':SUBSTITUTOISSQN',            $SUBSTITUTOISSQN);
            $stmt->bindParam(':CARTAOFIDELIDADE',           $CARTAOFIDELIDADE);
            $stmt->bindParam(':PROPRIEDADERURAL',           $PROPRIEDADERURAL);
            $stmt->bindParam(':IDENTFIDCLIENTE',            $IDENTFIDCLIENTE);
            $stmt->bindParam(':ISENTOISSQN',                $ISENTOISSQN);
            $stmt->bindParam(':SUPERSIMPLES',               $SUPERSIMPLES);
            $stmt->bindParam(':CODIGOCARTAO',               $CODIGOCARTAO);
            $stmt->bindParam(':AUTORIZADO1',                $AUTORIZADO1);
            $stmt->bindParam(':AUTORIZADO2',                $AUTORIZADO2);
            $stmt->bindParam(':AUTORIZADO3',                $AUTORIZADO3);
            $stmt->bindParam(':AUTORIZADO4',                $AUTORIZADO4);
            $stmt->bindParam(':AUTORIZADO5',                $AUTORIZADO5);
            $stmt->bindParam(':IMPRIMEAUTORIZADOS',         $IMPRIMEAUTORIZADOS);
            $stmt->bindParam(':IMPRIMETEXTOSPCSERASA',      $IMPRIMETEXTOSPCSERASA);
            $stmt->bindParam(':DIAVCTOQUALICARD',           $DIAVCTOQUALICARD);
            $stmt->bindParam(':PLACA',                      $PLACA);
            $stmt->bindParam(':IDCONTROLENOTEBOOK',         $IDCONTROLENOTEBOOK);
            $stmt->bindParam(':IDALTERACAODEBITO',          $IDALTERACAODEBITO);
            $stmt->bindParam(':CONTAREFBAN1',               $CONTAREFBAN1);
            $stmt->bindParam(':CONTAREFBAN2',               $CONTAREFBAN2);
            $stmt->bindParam(':CONTAREFBAN3',               $CONTAREFBAN3);
            $stmt->bindParam(':BLOQUEIAPLACANAOCADASTRADA', $BLOQUEIAPLACANAOCADASTRADA);
            $stmt->bindParam(':INSCRICAOMUNICIPAL',         $INSCRICAOMUNICIPAL);
            $stmt->bindParam(':DATAHORAALTERACAO',          $DATAHORAALTERACAO);
            $stmt->bindParam(':ENVIARORDEMCOMPRA',          $ENVIARORDEMCOMPRA);
            $stmt->bindParam(':FIDELIDADE',                 $FIDELIDADE);
            $stmt->bindParam(':NUMEROENDERECO',             $NUMEROENDERECO);
            $stmt->bindParam(':NUMEROENDERECOCOB',          $NUMEROENDERECOCOB);
            $stmt->bindParam(':IDESTRANGEIRO',              $IDESTRANGEIRO);
            $stmt->bindParam(':NIRF',                       $NIRF);
            $stmt->bindParam(':NIRF_OLD',                   $NIRF_OLD);
            $stmt->bindParam(':OBS',                        $OBS);
            $stmt->bindParam(':OBSFINANCEIRA',              $OBSFINANCEIRA);
            $stmt->bindParam(':TEXTOSPCSERASA',             $TEXTOSPCSERASA);
            $stmt->bindParam(':CODIGOIBGE',                 $CODIGOIBGE);
            $stmt->bindParam(':CODIGOIBGECOB',              $CODIGOIBGECOB);
            $stmt->bindParam(':REPLICADO',                  $REPLICADO);
            $stmt->bindParam(':CPFCNPJCONVENIO',            $CPFCNPJCONVENIO);
            $stmt->bindParam(':NIRFCONVENIO',               $NIRFCONVENIO);
            $stmt->bindParam(':BLOQUEIAVENDASEMPLACA',      $BLOQUEIAVENDASEMPLACA);
            $stmt->bindParam(':SUBSTITUTOIRRF',             $SUBSTITUTOIRRF);
            $stmt->bindParam(':SUBSTITUTOCSLL',             $SUBSTITUTOCSLL);
            $stmt->bindParam(':SUBSTITUTOINSS',             $SUBSTITUTOINSS);
            $stmt->bindParam(':SUBSTITUTOPISCOFINS',        $SUBSTITUTOPISCOFINS);
            $stmt->bindParam(':GIDMEIOPUBLIC',              $GIDMEIOPUBLIC);
       //     $stmt->bindParam(':GIDREGIAO',                  $GIDREGIAO);
       //     $stmt->bindParam(':REGIAO',                     $REGIAO);
       //     $stmt->bindParam(':GIDTIPOCLIENTE',             $GIDTIPOCLIENTE);
       //     $stmt->bindParam(':TIPOCLIENTE',                $TIPOCLIENTE);
       //     $stmt->bindParam(':GID_ENDERECO',               $GID_ENDERECO);
       //     $stmt->bindParam(':DESTINOREVENDA',             $DESTINOREVENDA);
      //      $stmt->bindParam(':DESTINOARMAZENADOR',         $DESTINOARMAZENADOR);
       //     $stmt->bindParam(':ANVISA_MS_DATA_AFE',         $ANVISA_MS_DATA_AFE);
        //    $stmt->bindParam(':ANVISA_MS_DATA_AE',          $ANVISA_MS_DATA_AE);
        //    $stmt->bindParam(':CREDITOPRESUMIDO',           $CREDITOPRESUMIDO);
       //     $stmt->bindParam(':IDNIF',                      $IDNIF);
       //     $stmt->bindParam(':NIF',                        $NIF);
       //     $stmt->bindParam(':CAEPF',                      $CAEPF);

            // Execute a consulta de inserção 
          
            $stmt->execute();
        };


        $dbOrigem->closeOrigem();
        $dbDestino->closeDestino();
    }
}
