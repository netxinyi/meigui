<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-05 09:48
 */

namespace App\Enum;


class User
{


    #性别-女
    const SEX_FEMALE = 0;

    #性别-男
    const SEX_MALE = 1;


    #性别组
    public static $sexLang = [
        self::SEX_MALE => '男',
        self::SEX_FEMALE => '女'
    ];

    #婚恋状况-未婚
    const MARRIAGE_UNMARRIED = 1;

    #婚恋状况-离异
    const MARRIAGE_DIVORCED = 2;

    #婚恋状况-丧偶
    const MARRIAGE_WIDOWED = 3;

    #婚恋状态
    public static $marriageLang = [
        self::MARRIAGE_UNMARRIED => '未婚',
        self::MARRIAGE_DIVORCED => '离异',
        self::MARRIAGE_WIDOWED => '丧偶'
    ];

    #月收入
    const SALARY_0 = 1;

    const SALARY_1000 = 2;

    const SALARY_2000 = 3;

    const SALARY_3000 = 4;

    const SALARY_5000 = 5;

    const SALARY_8000 = 6;
    const SALARY_10000 = 7;
    const SALARY_20000 = 8;
    const SALARY_50000 = 9;

    #月收入组
    public static $salaryLang = [
        self::SALARY_0 => '1000元以下',
        self::SALARY_1000 => '1001-2000元',
        self::SALARY_2000 => '2001-5000元',
        self::SALARY_5000 => '5001-8000元',
        self::SALARY_8000 => '8001-10000元',
        self::SALARY_10000 => '10001-20000元',
        self::SALARY_20000 => '20001-50000元',
        self::SALARY_50000 => '50000元以上'
    ];

    #教育程度
    const EDUCATION_GAOZHONG = 1;

    const EDUCATION_ZHONGZHUAN = 2;

    const EDUCATION_DAZHUAN = 3;

    const EDUCATION_BENKE = 4;

    const EDUCATION_SHUOSHI = 5;

    const EDUCATION_BOSHI = 6;

    const EDUCATION_BOSHIHOU = 7;

    #教育程度组
    public static $educationLang = [
        self::EDUCATION_GAOZHONG => '高中及以下',
        self::EDUCATION_ZHONGZHUAN => '中专',
        self::EDUCATION_DAZHUAN => '大专',
        self::EDUCATION_BENKE => '本科',
        self::EDUCATION_SHUOSHI => '硕士',
        self::EDUCATION_BOSHI => '博士',
        self::EDUCATION_BOSHIHOU => '博士后',
    ];

    #住房情况
    const HOUSE_JIAREN = 1;
    const HOUSE_ZUFANG = 2;
    const HOUSE_GOUFANG = 3;
    const HOUSE_SUSHE = 4;
    const HOUSE_HUNGOU = 5;

    public static $zhufangLang = [
        self::HOUSE_JIAREN => '与家人同住',
        self::HOUSE_ZUFANG => '租房',
        self::HOUSE_GOUFANG => '已购房',
        self::HOUSE_SUSHE => '单位宿舍',
        self::HOUSE_HUNGOU => '婚后购房',
    ];

    #有无小孩
    const CHILDREN_NO = 1;
    const CHILDREN_HAS = 2;

    public static $childrenLang = [
        self::CHILDREN_NO => '没有',
        self::CHILDREN_HAS => '有'
    ];

    #账号状态
    const STATUS_CHECK = 0;
    const STATUS_OK = 1;
    const STATUS_NOCHECK = 2;

    public static $statusLang = [
        self::STATUS_CHECK => '待审核',
        self::STATUS_NOCHECK => '审核未通过',
        self::STATUS_OK => '正常'
    ];

    #账号等级
    const LEVEL_1 = 1;
    const LEVEL_2 = 2;
    const LEVEL_3 = 3;
    const LEVEL_4 = 4;

    public static $levelLang = [
        self::LEVEL_1 => '普通用户',
        self::LEVEL_2 => '普通会员',
        self::LEVEL_3 => '高级会员',
        self::LEVEL_4 => '特邀嘉宾'
    ];

    #择偶条件-收入
    const SALARY_OBJECT_1000 = 1;
    const SALARY_OBJECT_2000 = 2;
    const SALARY_OBJECT_3000 = 3;
    const SALARY_OBJECT_5000 = 4;
    const SALARY_OBJECT_8000 = 5;
    const SALARY_OBJECT_10000 = 6;
    const SALARY_OBJECT_20000 = 7;
    const SALARY_OBJECT_50000 = 8;

    public static $salaryObjectLang = [
        self::SALARY_OBJECT_1000 => '1000元',
        self::SALARY_OBJECT_2000 => '2000元',
        self::SALARY_OBJECT_3000 => '3000元',
        self::SALARY_OBJECT_5000 => '5000元',
        self::SALARY_OBJECT_8000 => '8000元',
        self::SALARY_OBJECT_10000 => '10000元',
        self::SALARY_OBJECT_20000 => '20000元',
        self::SALARY_OBJECT_50000 => '50000元',
    ];


    const RECOMMEND_INDEX = 1;
    const RECOMMEND_HOME = 2;
    const RECOMMEND_NO = 0;

}