<?php
namespace HRM\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use HRM\Models\Leave;
use HRM\Models\Relation;
use HRM\Models\Department;

class Leave_Type extends Eloquent {


    protected $primaryKey = 'id';
    protected $table      = 'hrm_leave_type';
    public $timestamps    = false;

    protected $fillable = [
		'leave_type_name',
		'entitlement',
		'entitle_from',
		'entitle_to',
    ];

    public function departments() {
    	return $this->belongsToMany( 'HRM\Models\Department', 'hrm_relation', 'to', 'from' );
    }

}
