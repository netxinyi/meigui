<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/29 18:25
 */

namespace App\Model;


class UserBind extends BaseModel
{
	/**
	 * 表名
	 *
	 * @var string
	 */
	protected $table = 'user_bind';


	/**
	 * 主键
	 * @var string
	 */
	protected $primaryKey = 'bind_id';

	public $timestamps = false;

	public function scopeOpenId($query,$openid){
		return $query->where('openid',$openid);
	}
}