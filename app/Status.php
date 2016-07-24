<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {
    public function orders() {
        return $this->hasMany( 'CodeCommerce\Order' );
    }
}
