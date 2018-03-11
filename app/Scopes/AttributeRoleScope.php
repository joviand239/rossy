<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AttributeRoleScope implements Scope {
	protected $type;
	protected $subtype;

	public function __construct($type, $subtype) {
		$this->type = $type;
		$this->subtype = $subtype;
	}


	public function apply(Builder $builder, Model $model) {
		$builder->where(['type'=>$this->type, 'subtype'=>$this->subtype]);
	}
}