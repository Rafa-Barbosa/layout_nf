<?php

$dadosNota['caminho_brasao']    = $dadosNota['caminho_brasao'] ?? 'img/brasao-sp.jpg';

// Cálculo dos impostos
$dadosNota['valor_deducoes']    = $dadosNota['valor_deducoes'] ?? 0;
$dadosNota['base_calculo']      = $dadosNota['valor_total'] - $dadosNota['valor_deducoes'];
$dadosNota['aliquota']          = $dadosNota['aliquota'] ?? 5;
$dadosNota['valor_iss']         = $dadosNota['base_calculo'] * $dadosNota['aliquota'] / 100;
$dadosNota['valor_credito']     = $dadosNota['valor_credito'] ?? 0;


// Formata os valores
$dadosNota['dt_emissao']        = implode('/', array_reverse(explode('-', $dadosNota['dt_emissao'])));

$dadosNota['valor_total']       = number_format($dadosNota['valor_total'], 2, ',', '.');
$dadosNota['valor_inss']        = isset($dadosNota['valor_inss'])   ? number_format($dadosNota['valor_inss'], 2, ',', '.')      : '----';
$dadosNota['valor_irrf']        = isset($dadosNota['valor_irrf'])   ? number_format($dadosNota['valor_irrf'], 2, ',', '.')      : '----';
$dadosNota['valor_csll']        = isset($dadosNota['valor_csll'])   ? number_format($dadosNota['valor_csll'], 2, ',', '.')      : '----';
$dadosNota['valor_cofins']      = isset($dadosNota['valor_cofins']) ? number_format($dadosNota['valor_cofins'], 2, ',', '.')    : '----';
$dadosNota['valor_pis']         = isset($dadosNota['valor_pis'])    ? number_format($dadosNota['valor_pis'], 2, ',', '.')       : '----';

$dadosNota['valor_deducoes']    = number_format($dadosNota['valor_deducoes'], 2, ',', '.');
$dadosNota['base_calculo']      = number_format($dadosNota['base_calculo'], 2, ',', '.');
$dadosNota['aliquota']          = number_format($dadosNota['aliquota'], 2, ',', '.');
$dadosNota['valor_iss']         = number_format($dadosNota['valor_iss'], 2, ',', '.');
$dadosNota['valor_credito']     = number_format($dadosNota['valor_credito'], 2, ',', '.');

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Fiscal Eletrônica de Serviços - NFS-e</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.2;
            background-color: white;
            color: black;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            border: 2px solid black;
            background-color: white;
        }

        .header {
            display: flex;
            align-items: center;
            padding: 0;
            border-bottom: 2px solid black;
        }

        .brasao {
            width: 80px;
            height: 100%;
            background-color: #ff0000;
            border-radius: 50%;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 8px;
        }

        .brasao img {
            max-width: 100%;
            max-height: 100%;
        }

        .header-text {
            flex: 1;
            text-align: center;
        }

        .header-text h1 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 2px;
        }

        .header-text h2 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .header-text h3 {
            font-size: 16px;
            font-weight: bold;
        }

        .numero-nota {
            text-align: center;
            border-left: 1px solid black;
            min-width: 150px;
        }

        .section {
            border-bottom: 2px solid black;
            padding: 0 8px;
        }

        .section-title {
            font-weight: bold;
            text-align: center;
            margin: 3px 0 5px;
            font-size: 15px;
        }

        .info-row {
            display: flex;
            margin-bottom: 3px;
        }

        .info-label {
            margin-right: 5px;
        }

        .info-value {
          font-weight: bold;
          flex: 1;
        }

        .two-column {
            display: flex;
            gap: 20px;
        }

        .column {
            flex: 1;
        }

        .discriminacao {
            min-height: 300px;
            margin: 5px 0;
        }

        .valores-table {
            width: 100%;
            border-collapse: collapse;
            border-bottom: 2px solid black;
        }

        .valores-table th,
        .valores-table td {
            border: 1px solid black;
            padding: 4px;
            text-align: center;
            font-size: 10px;
        }

        .valores-table th {
            background-color: #e0e0e0;
            font-weight: bold;
        }

        .valor-total {
            font-weight: bold;
            text-align: center;
            margin: 3px 0;
            font-size: 14px;
        }

        .outras-info {
            font-size: 9px;
            line-height: 1.3;
            min-height: 80px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Cabeçalho -->
        <div class="header">
            <div class="brasao"><img src="<?php echo $dadosNota['caminho_brasao']; ?>" alt="Brasão"></div>
            <div class="header-text">
                <h1>PREFEITURA DO MUNICÍPIO DE SÃO PAULO</h1>
                <h2>SECRETARIA MUNICIPAL DA FAZENDA</h2>
                <h3>NOTA FISCAL ELETRÔNICA DE SERVIÇOS - NFS-e</h3>
                <div style="font-size: 11px; margin-top: 3px;">RPS n° <?php echo $dadosNota['rps']; ?> emitido em <?php echo $dadosNota['dt_emissao']; ?></div>
            </div>
            <div class="numero-nota">
                <div style="text-align: left;">Número da Nota</div>
                <div style="font-size: 15px; font-weight: bold; border-bottom: 1px solid black;"><?php echo $dadosNota['numero']; ?></div>
                <div style="text-align: left;">Data e Hora da Emissão</div>
                <div style="font-size: 15px; border-bottom: 1px solid black;"><strong><?php echo $dadosNota['dt_emissao']; ?> <?php echo $dadosNota['hora_emissao']; ?></strong></div>
                <div style="text-align: left;">Código de Verificação</div>
                <div style="font-size: 15px;"><strong><?php echo $dadosNota['codigo_verificacao']; ?></strong></div>
            </div>
        </div>

        <!-- Prestador de Serviços -->
        <div class="section">
            <div class="section-title">PRESTADOR DE SERVIÇOS</div>
            <div class="info-row">
                <span class="info-label">CPF/CNPJ:</span>
                <span class="info-value"><?php echo $dadosNota['prestador_cpf_cnpj']; ?></span>
                <span class="info-label" style="margin-left: 50px;">Inscrição Municipal:</span>
                <span class="info-value"><?php echo ($dadosNota['prestador_im'] ?? '----'); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Nome/Razão Social:</span>
                <span class="info-value"><?php echo $dadosNota['prestador_razao']; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Endereço:</span>
                <span class="info-value"><?php echo $dadosNota['prestador_endereco']; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Município:</span>
                <span class="info-value"><?php echo $dadosNota['prestador_municipio']; ?></span>
                <span class="info-label" style="margin-left: 50px;">UF:</span>
                <span class="info-value"><?php echo $dadosNota['prestador_uf']; ?></span>
            </div>
        </div>

        <!-- Tomador de Serviços -->
        <div class="section">
            <div class="section-title">TOMADOR DE SERVIÇOS</div>
            <div class="info-row">
                <span class="info-label">Nome/Razão Social:</span>
                <span class="info-value"><?php echo $dadosNota['tomador_razao']; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">CPF/CNPJ:</span>
                <span class="info-value"><?php echo $dadosNota['tomador_cpf_cnpj']; ?></span>
                <span class="info-label" style="margin-left: 50px;">Inscrição Municipal:</span>
                <span class="info-value"><?php echo ($dadosNota['tomador_im'] ?? '----'); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Endereço:</span>
                <span class="info-value"><?php echo $dadosNota['tomador_endereco']; ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Município:</span>
                <span class="info-value"><?php echo $dadosNota['tomador_municipio']; ?></span>
                <span class="info-label" style="margin-left: 50px;">UF:</span>
                <span class="info-value"><?php echo $dadosNota['tomador_uf']; ?></span>
                <span class="info-label" style="margin-left: 50px;">E-mail:</span>
                <span class="info-value"><?php echo ($dadosNota['tomador_email'] ?? '----'); ?></span>
            </div>
        </div>

        <!-- Intermediário de Serviços -->
        <div class="section">
            <div class="section-title">INTERMEDIÁRIO DE SERVIÇOS</div>
            <div class="info-row">
                <span class="info-label">CPF/CNPJ:</span>
                <span class="info-value"><?php echo ($dadosNota['intermediador_cpf_cnpj'] ?? '----'); ?></span>
                <span class="info-label" style="margin-left: 50px;">Nome/Razão Social:</span>
                <span class="info-value"><?php echo ($dadosNota['intermediador_razao'] ?? '----'); ?></span>
            </div>
        </div>

        <!-- Discriminação dos Serviços -->
        <div class="section">
            <div class="section-title">DISCRIMINAÇÃO DOS SERVIÇOS</div>
            <div class="discriminacao">
                <?php echo $dadosNota['discriminacao']; ?>
            </div>
        </div>

        <!-- Valor Total -->
        <div class="valor-total">
            VALOR TOTAL DO SERVIÇO = R$ <?php echo $dadosNota['valor_total']; ?>
        </div>

        <!-- Tabela de Valores -->
        <table class="valores-table">
            <thead>
                <tr>
                    <th>INSS (R$)</th>
                    <th>IRRF (R$)</th>
                    <th>CSLL (R$)</th>
                    <th>COFINS (R$)</th>
                    <th>PIS/PASEP (R$)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $dadosNota['valor_inss']; ?></td>
                    <td><?php echo $dadosNota['valor_irrf']; ?></td>
                    <td><?php echo $dadosNota['valor_csll']; ?></td>
                    <td><?php echo $dadosNota['valor_cofins']; ?></td>
                    <td><?php echo $dadosNota['valor_pis']; ?></td>
                </tr>
                <tr>
                  <td colspan="5" style="text-align: left;">
                    Código do Serviço:<br>
                    <strong><?php echo $dadosNota['codigo_servico']; ?></strong>
                  </td>
                </tr>
                <tr>
                  <td>
                    Valor Total das Deduções (R$)<br>
                    <p style="text-align: right;"><strong><?php echo $dadosNota['valor_deducoes']; ?></strong></p>
                  </td>
                  <td>
                    Base de Cálculo (R$)<br>
                    <p style="text-align: right;"><strong><?php echo $dadosNota['base_calculo']; ?></strong></p>
                  </td>
                  <td>
                    Alíquota (%)<br>
                    <p style="text-align: right;"><strong><?php echo $dadosNota['aliquota']; ?>%</strong></p>
                  </td>
                  <td>
                    Valor do ISS (R$)<br>
                    <p style="text-align: right;"><strong><?php echo $dadosNota['valor_iss']; ?></strong></p>
                  </td>
                  <td>
                    Crédito (R$)<br>
                    <p style="text-align: right;"><strong><?php echo $dadosNota['valor_credito']; ?></strong></p>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    Município da Prestação do Serviço:<br>
                    <strong><?php echo ($dadosNota['municipio_servico'] ?? '-'); ?></strong>
                  </td>
                  <td>
                    Número Inscrição da Obra:<br>
                    <strong><?php echo ($dadosNota['inscricao_obra'] ?? '-'); ?></strong>
                  </td>
                  <td colspan="2">
                    Valor Aproximado dos Tributos / Fonte:<br>
                    <strong><?php echo ($dadosNota['valor_tributos'] ?? '-'); ?></strong>
                  </td>
                </tr>
            </tbody>
        </table>

        <!-- Outras Informações -->
        <?php if(isset($dadosNota['outras_informacoes'])) { ?>
            <div class="section">
                <div class="section-title">OUTRAS INFORMAÇÕES</div>
                <div class="outras-info">
                    <?php echo $dadosNota['outras_informacoes']; ?>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>