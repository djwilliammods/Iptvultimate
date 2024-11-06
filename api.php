<?php

// IP ou URL do Xtream-Codes
define('IP','http://runpoint.pro:80');

function apixtream($url_api){	
$ch = curl_init();	
$timeout = 10;	
curl_setopt ($ch, CURLOPT_URL, $url_api);	
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);	
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);	
$retorno = curl_exec($ch);	
curl_close($ch);	
return $retorno;
}

/* UTILIZANDO A API XTREAM DE FORMA SIMPLES
 * Os metodos são acessados via GET ou POST apartir do envio de alguns paramêtros
 *
 * Login e Senha = Obrigatorio em todas as requisições
 *
 * Chamada Login: 
 * api.php?op=login&usuario=mullerneto&senha=Se6Tw
 *
 * Chamada Categorias de Canais:
 * api.php?op=categoria_canais&usuario=mullerneto&senha=Se6Tw
 *
 * Chamada Todos os Canais:
 * api.php?op=canais&usuario=mullerneto&senha=Se6Tw
 *
 * Chamada Canais por Categoria:
 * api.php?op=canais&categoria=ID&usuario=mullerneto&senha=Se6Tw
 *
 * Chamada Categorias de Vods (Filmes):
 * api.php?op=categoria_vods&usuario=mullerneto&senha=Se6Tw
 *
 * Camada Todos os Vods (Filmes):
 * api.php?op=vods&categoria=ID&usuario=mullerneto&senha=Se6Tw
 *
 * Chamada Vods por Categoria:
 * api.php?op=vods&categoria=ID&usuario=mullerneto&senha=Se6Tw
 *
 * Chamada Categorias Séries:
 * api.php?op=categoria_series&usuario=mullerneto&senha=Se6Tw
 *
 * Chamada Todas as Séries:
 * api.php?op=series&usuario=mullerneto&senha=Se6Tw
 *
 * Chamada Séries por Categoria:
 * api.php?op=series&categoria=ID&usuario=mullerneto&senha=Se6Tw
 *
 * Chamada Informações do Vod (Filme):
 * api.php?op=vod&id=ID&usuario=mullerneto&senha=Se6Tw
 *
 * Chamada Informações da Série
 * api.php?op=serie&id=ID&usuario=mullerneto&senha=Se6Tw
 *
 * Camada EPG Resumido Por Canal
 * api.php?op=epg_simples&id=ID&usuario=mullerneto&senha=Se6Tw
 *
 * Camada EPG Completo Por Canal
 * api.php?op=epg&id=ID&usuario=mullerneto&senha=Se6Tw
 *
 * Camada Todo EPG Full
 * api.php?op=epgfull&usuario=mullerneto&senha=Se6Tw
 *
 * Chamada do Parse Converter a Lista M3U em JSON
 * api.php?op=lista&usuario=mullerneto&senha=Se6Tw
 *
 * Faça as chamads através do seu navegador pela URL que você ai utilizar 
 * Exemplo: www.meudominio.com/api.php?op=epgfull&usuario=mullerneto&senha=Se6Tw
 *
 * Verão 1.0 
 * Necessário Tratar e Adaptar Arrys e Valores
 * 
*/


if($_REQUEST['op'] == 'login') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'categoria_canais') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_categories";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'canais') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	$categoria = $_REQUEST['categoria'];
	
	if($categoria > 0) {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_streams&category_id=$categoria";
	} else {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_live_streams";
	}
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}


if($_REQUEST['op'] == 'categoria_vods') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_categories";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'vods') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	$categoria = $_REQUEST['categoria'];
	
	if($categoria > 0) {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_streams&category_id=$categoria";
	} else {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_streams";
	}
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}


if($_REQUEST['op'] == 'categoria_series') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series_categories";
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}
 
if($_REQUEST['op'] == 'series') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	$categoria = $_REQUEST['categoria'];
	
	if($categoria > 0) {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series&category_id=$categoria";
	} else {
		$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series";
	}
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'serie') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	$id = $_REQUEST['id'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_series_info&series_id=$id";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'vod') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	$id = $_REQUEST['id'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_vod_info&vod_id=$id";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'epg_simples') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	$id = $_REQUEST['id'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_short_epg&stream_id=$id";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'epg') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	$id = $_REQUEST['id'];
	
	$url = IP."/player_api.php?username=$user&password=$pwd&action=get_simple_data_table&stream_id=$id";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'epgfull') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	$id = $_REQUEST['id'];
	
	$url = IP."/xmltv.php?username=$user&password=$pwd";
	
	$resposta = apixtream($url);
	$output = json_decode($resposta,true);
	echo $resposta;
}

if($_REQUEST['op'] == 'lista') {
	
	$user = $_REQUEST['mullerneto'];
	$pwd = $_REQUEST['Se6Tw'];
	
	$url = IP."/get.php?username=$user&password=$pwd&type=m3u_plus&output=m3u8";
	
	$resposta = apixtream($url);
	
	preg_match_all('/(?P<tag>#EXTINF:-1)|(?:(?P<prop_key>[-a-z]+)=\"(?P<prop_val>[^"]+)")|(?<something>,[^\r\n]+)|(?<url>http[^\s]+)/', $resposta, $match );

	$count = count( $match[0] );

	$resultados = [];
	$index = -1;

	for( $i =0; $i < $count; $i++ ){
	    $item = $match[0][$i];

	    if( !empty($match['tag'][$i])){

	    ++$index;
	    }elseif( !empty($match['prop_key'][$i])){

	    $resultados[$index][$match['prop_key'][$i]] = $match['prop_val'][$i];
	    }elseif( !empty($match['something'][$i])){

	    $resultados[$index]['something'] = $item;
	    }elseif( !empty($match['url'][$i])){
	    
	    $resultados[$index]['url'] = $item ;
	    }
	}

	echo json_encode($resultados);
	
}


if($_REQUEST['op'] == '') {
	
	echo 'API Xtream PHP 1.0';
	
}
?>
