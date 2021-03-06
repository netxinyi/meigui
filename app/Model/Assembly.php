<?php


namespace App\Model;


class Assembly extends BaseModel
{


	/**
	 * 表名
	 * @var string
	 */
	protected $table = 'assembly';

	/**
	 * 主键ID
	 * @var string
	 */
	protected $primaryKey = 'assembly_id';


	/**
	 * 时间维护
	 * @var bool
	 */
	public $timestamps = true;


	/**
	 * 批量赋值白名单
	 * @var array
	 */
	protected $fillable = [
		'title',
		'admin_id',
		'index_status',
		'content'
	];


	/*
	|--------------------------------------------------------------------------
	| 关系映射
	|--------------------------------------------------------------------------
	*/

	/**
	 * 与管理员表的一对一逆向关系
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function admin()
	{

		return $this->belongsTo('App\Model\Admin', 'admin_id', 'admin_id');
	}

}