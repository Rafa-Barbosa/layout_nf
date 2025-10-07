<?php

$dadosNota = [];
$dadosNota['caminho_brasao'] = '../img/brasao-sp.jpg';
$dadosNota['rps'] = '1122';
$dadosNota['numero'] = '00001234';
$dadosNota['dt_emissao'] = '2025-07-22';
$dadosNota['hora_emissao'] = '16:54:07';
$dadosNota['codigo_verificacao'] = 'AAAA-BBBB';

//////////////// Dados do prestador ////////////////
$dadosNota['prestador_cpf_cnpj'] = '12.345.678/0001-90';
$dadosNota['prestador_im'] = '1.234.567-8';
$dadosNota['prestador_razao'] = 'Prestador Exemplo LTDA';
$dadosNota['prestador_endereco'] = 'Av. Exemplo, N 123, Sala 802 - Centro - CEP: 12345-678';
$dadosNota['prestador_municipio'] = 'São Paulo';
$dadosNota['prestador_uf'] = 'SP';

//////////////// Dados do Tomador ////////////////
$dadosNota['tomador_razao'] = 'Tomador Exemplo ME';
$dadosNota['tomador_cpf_cnpj'] = '98.765.432/0001-01';
$dadosNota['tomador_endereco'] = 'Rua Tomador, N 456 - Centro - CEP: 87654-321';
$dadosNota['tomador_municipio'] = 'São Paulo';
$dadosNota['tomador_uf'] = 'SP';
// $dadosNota['tomador_im'] = '9.876.543-2';
// $dadosNota['tomador_email'] = 'tomador@exemplo.com';

//////////////// Dados Intermediador ////////////////
// $dadosNota['intermediador_cpf_cnpj'] = '11.222.333/0001-44';
// $dadosNota['intermediador_razao'] = 'Intermediador Exemplo ME';

//////////////// Discriminação dos serviços ////////////////
$dadosNota['discriminacao'] = 'Serviço de consultoria em tecnologia da informação.';

//////////////// Valores ////////////////
$dadosNota['valor_total'] = 1680.00;
// $dadosNota['valor_inss'] = 0.00;
$dadosNota['valor_irrf'] = 25.20;
$dadosNota['valor_csll'] = 16.80;
$dadosNota['valor_cofins'] = 50.40;
$dadosNota['valor_pis'] = 10.92;
// $dadosNota['valor_deducoes'] = 0.00;
// $dadosNota['valor_credito'] = 0.00;


$dadosNota['codigo_servico'] = '1234 - Exemplo de serviço';
// $dadosNota['municipio_servico'] = 'São Paulo';
// $dadosNota['inscricao_obra'] = '1234567890';
// $dadosNota['valor_tributos'] = 103.32;
// $dadosNota['outras_informacoes'] = 'Nenhuma observação adicional.';

include '../layout_sp.php';