<?php
$url = 'http://machado%ss%w7solucoes.com.br:2346%ss%w7s@rastreador4g-homologacao.us-east-1.elasticbeanstalk.com/api/v2/recebimentos';

$post_array = array(
	"uuid"	=> "9a51a5a5-d8d0-440b-ad66-dd2f490b5b90",
	"documentoEloDestino" => "03938381000142",
	"nomeDocumentoEloDestino" => "cnpj",
	"documentoComplementarEloDestino" => "254107869",
	"nomeDocumentoComplementarEloDestino" => "inscricao_estadual",
	"documentoEloOrigem" => "08421511000199",
	"nomeDocumentoEloOrigem" => "cnpj",
	"documentoComplementarEloOrigem" => "123454",
	"nomeDocumentoComplementarEloOrigem" => "inscricao_rural",
	"dataMovimentacao" => "2016-06-067T17=>24=>09.938Z",
	"idTipoProduto" => 8146,
	"quantidade" => 3,
	"nomeEmbalagem" => "Bandeja",
	"unidadeEmbalagem" => "Un",
	"capacidadeEmbalagem" => 1
);

$headers = array(
	'accept: application/json',
//	'accept-encoding: gzip, deflate',
//	'accept-language: en-US,en;q=0.8',
	'Authorization: basic',
);

$response = simplePostRequest( $url, $post_array, $headers );
#debug($response);
#postRequest( $url, $post_array );

/**
 * @param $url
 * @param $data
 * @param $headers
 * @return mixed
 */
function simplePostRequest( $url, $data, $headers ) {
	//url-ify the data for the POST
	$fields_string = '';
	foreach($data as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');

	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($data));
	curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($data));
	$curl_response = curl_exec($ch);

	debug($curl_response,1);

	curl_close($ch);

	return $curl_response;
}

function postRequest( $service_url, $curl_post_data = array() ) {
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
		$info = curl_getinfo($curl);
		curl_close($curl);
		die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);
	$decoded = json_decode($curl_response);
	if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
		die('error occured: ' . $decoded->response->errormessage);
	}
	echo 'response ok!';
}

/**
 * @param $var
 * @param bool $stop
 */
function debug( $var, $stop = false ) {
	echo "<pre>";
	print_r( $var );
	echo "</pre>";
	if( $stop ) exit();
}