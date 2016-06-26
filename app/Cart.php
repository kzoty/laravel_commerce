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
		$this->items += [
			$id => [
				'qtd' => isset( $this->items[ $id ] ) ? $this->items[ $id ][ 'qtd' ] ++ : 1,
				'price' => $price,
				'name' => $name,
				'image' => '',
			]
		];

		return $this->items;
	}

    /**
     * @param $id
     * @param $qtd
     * @return array
     */
    public function update($id, $qtd) {
        $this->items[ $id ][ 'qtd' ] = $qtd;

        return $this->items;
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
	 * @param $key
	 * @param $image
	 */
	public function setImage( $key, $image ) {
		$this->items[ $key ][ 'image' ] = $image;
	}

	/**
	 * @param $key
	 * @return mixed
	 */
	public function getImage( $key ) {
		return  $this->items[ $key ][ 'image' ];
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