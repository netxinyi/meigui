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
    const SEX_FEMALE = 2;

    #性别-男
    const SEX_MALE = 1;


    #性别组
    public static $sexForm = [
        self::SEX_MALE   => '男',
        self::SEX_FEMALE => '女'
    ];

    #婚恋状况-未婚
    const MARITAL_STATUS_UNMARRIED = 1;

    #婚恋状况-离异
    const MARITAL_STATUS_DIVORCED = 2;

    #婚恋状况-丧偶
    const MARITAL_STATUS_WIDOWED = 3;

    #婚恋状态组
    public static $maritalForm = [
        self::MARITAL_STATUS_UNMARRIED => '未婚',
        self::MARITAL_STATUS_DIVORCED  => '离异',
        self::MARITAL_STATUS_WIDOWED   => '丧偶'
    ];

    #月收入

    const SALARY_2000    = 1;

    const SALARY_5000    = 2;

    const SALARY_10000   = 3;

    const SALARY_20000   = 5;

    const SALARY_50000   = 7;

    const SALARY_100000  = 8;

    const SALARY_200000  = 9;

    const SALARY_500000  = 10;

    const SALARY_1000000 = 11;

    const SALARY_OTHER   = 12;

    #月收入组
    public static $salaryForm = [
        self::SALARY_2000    => '2000元以下',
        self::SALARY_5000    => '2000-5000元',
        self::SALARY_10000   => '5000-1万元',
        self::SALARY_20000   => '1万元-2万元',
        self::SALARY_50000   => '2万元-5万元',
        self::SALARY_100000  => '5万元-10万元',
        self::SALARY_200000  => '10万元-20万元',
        self::SALARY_500000  => '20万元-50万元',
        self::SALARY_1000000 => '50万元-100万元',
        self::SALARY_OTHER   => '100万元以上'
    ];

    #教育程度
    const EDUCATION_1 = 1;

    const EDUCATION_2 = 2;

    const EDUCATION_3 = 3;

    const EDUCATION_4 = 4;

    const EDUCATION_5 = 5;

    const EDUCATION_6 = 6;

    const EDUCATION_7 = 7;

    #教育程度组
    public static $educationForm = [
        self::EDUCATION_1 => '高中/中专以下',
        self::EDUCATION_2 => '高中/中专',
        self::EDUCATION_3 => '大专',
        self::EDUCATION_4 => '本科',
        self::EDUCATION_5 => '硕士',
        self::EDUCATION_6 => '博士',
        self::EDUCATION_7 => '博士后',
    ];

}