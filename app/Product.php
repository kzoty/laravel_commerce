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
}
