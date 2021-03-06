<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "category_id",
        "name",
        "description",
        "price",
        "featured",
        "recommended",
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'products_tags');
    }

	public function getTagListAttribute() {
		$tags = $this->tags->lists( 'name' )->all();
		return implode(',',$tags);
	}

	public function getMainImageAttribute() {
		$images = $this->images->all();
		if ( count( $images ) ) {
			return '/uploads/' . $images[0]->id . '.' . $images[0]->extension;
		} else {
			return 'images/no-image.jpg';
		}
	}

	static public function getProductsByTag( $id ) {
		return Tag::find( $id )->products;
	}

	/**
	 * Featured Products
	 *
	 * @param $query
	 * @return mixed
	 */
	public function scopeFeatured( $query ) {
		return $query->where( "featured", "=", 1 );
	}

	/**
	 * Recommended Products
	 *
	 * @param $query
	 * @return mixed
	 */
	public function scopeRecommended( $query ) {
		return $query->where( "recommended", "=", 1 );
	}
}
