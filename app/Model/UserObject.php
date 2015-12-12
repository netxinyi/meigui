<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/29 18:25
 */

namespace App\Model;


use App\Enum\User as UserEnum;

class UserObject extends BaseModel
{

    /**
     * 表名
     *
     * @var string
     */
    protected $table = 'user_object';


    /**
     * 主键
     * @var string
     */
    protected $primaryKey = 'user_id';

    public $timestamps = false;

    /**
     * 追加属性
     * @var array
     */
    protected $append = ['sex_lang', 'age_lang', 'house_lang', 'height_lang', 'level_lang', 'education_lang', 'salary_lang', 'marriage_lang', 'children_lang'];

    /*
    |--------------------------------------------------------------------------
    | 访问器
    |--------------------------------------------------------------------------
    */


    public function getHouseLangAttribute()
    {
        return $this->getLang(UserEnum::$houseLang, 'house');
    }

    public function getSexLangAttribute()
    {
        return UserEnum::$sexLang[$this->attributes['sex']];
    }

    public function getLevelLangAttribute()
    {
        return $this->getLang(UserEnum::$levelLang, 'level');
    }

    public function getEducationLangAttribute()
    {
        return $this->getLang(UserEnum::$educationLang, 'education');
    }

    public function getMarriageLangAttribute()
    {
        return $this->getLang(UserEnum::$marriageLang, 'marriage');
    }

    public function getChildrenLangAttribute()
    {
        return $this->getLang(UserEnum::$childrenLang, 'children');
    }

    public function getSalaryLangAttribute()
    {
        $start = array_get($this->attributes, 'salary_start');
        $end = array_get($this->attributes, 'salary_end');
        if ($start && $end) {
            return $start . ' 到 ' . $end;
        } elseif ($start) {
            return $start . '以上';
        } elseif ($end) {
            return $end . '以下';
        }

        return '不限';
    }

    public function getHeightLangAttribute()
    {
        $start = array_get($this->attributes, 'height_start');
        $end = array_get($this->attributes, 'height_end');
        if ($start && $end) {
            return $start . ' 到 ' . $end . ' cm';
        } elseif ($start) {
            return $start . 'cm 以上';
        } elseif ($end) {
            return $end . 'cm 以下';
        }

        return '不限';
    }

    public function getAgeLangAttribute()
    {
        $start = array_get($this->attributes, 'age_start');
        $end = array_get($this->attributes, 'age_end');
        if ($start && $end) {
            return $start . ' 到 ' . $end . ' 岁';
        } elseif ($start) {
            return $start . '岁以上';
        } elseif ($end) {
            return $end . '岁以下';
        }

        return '不限';
    }
}