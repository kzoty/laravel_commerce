<?php

$path = 'temp/'; //Caminho dos arquivos xml

if ( is_dir( $path ) ) {
	$pathContent = scandir( $path );

	/**
	 * Lista arquivos do diretório (se maior que 2)
	 * Por padrão, toda pasta tem arquivo "." e ".."
	 */
	if ( count( $pathContent ) > 2 ) {
		foreach ( $pathContent as $eachFile ) {
			if ( $eachFile != "." && $eachFile != ".." ) {
				//Print
				debug( $eachFile );
				debug( '----------------------------------' );

				/**
				 * Carrega arquivo.
				 */
				$xml = simplexml_load_file( $path . $eachFile );

				/**
				 * Dados Fornecedor.
				 */
				$fornCNPJ = (string) $xml->NFe->infNFe->emit->CNPJ;
				$fornRazao = (string) $xml->NFe->infNFe->emit->xNome;

				//Print
				debug( "Razão: " . $fornRazao );
				debug( "CNPJ: " . $fornCNPJ );
				debug( '----------------------------------' );

				/**
				 * Produtos
				 */
				$totalProdutos = count( $xml->NFe->infNFe->det );

				//Print
				debug( "Total de produtos: " . $totalProdutos );
				debug( '----------------------------------' );
				for ( $i = 0; $i < $totalProdutos; $i++ ) {
					/**
					 * Pega informação de cada produto.
					 */
					$eachProduct = $xml->NFe->infNFe->det[ $i ];
					$eachProductName = (string) $eachProduct->prod->xProd;
					$eachProductPrice = (float) $eachProduct->prod->vProd;

					//Print.
					debug( "Produto: " . $eachProductName );
					debug( "Preço: R$ " . $eachProductPrice );
					debug( '..................................' );
				}

				debug( "####################################################################" );
			}
		}
	}
} else {
	debug( "A pasta não foi encontrada" );
}

/**
 * @param $x
 * @param null $y
 */
function debug($x, $y=null) {
	echo "<pre>";
	print_r($x);
	echo "</pre>";
	if($y) exit;
}