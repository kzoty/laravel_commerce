<?php

namespace CodeCommerce;


class Cart {

	private $items;

	/**
	 * Cart constructor.
	 */
	public function __construct() {
		$this->items = [];
	}

	public function add($id, $name, $price) {
		$this->items + [
				$id => [
					'qtd' => isset( $this->items[ $id ][ 'qtd' ] ) ? $this->items[ $id ][ 'qtd' ]++:1,
					'price' => $price,
					'name' => $name,
				]
			];
	}

	/**
	 * @param $id
	 */
	public function remove( $id ) {
		unset(  $this->items[ $id ] );
	}

	/**
	 * @return array
	 */
	public function all() {
		return $this->items;
	}

	/**
	 * @return int
	 */
	public function getTotal() {
		$total = 0;
		foreach ( $this->items as $item ) {
			$total += $item[ 'qtd' ] * $item[ 'price' ];
		}

		return $total;
	}
}