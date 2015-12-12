<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/11/15 14:56
 */

namespace App\Http\Controllers;


use App\Model\User;
use App\Enum\User as UserEnum;
use App\Model\UserInfo;
use App\Model\UserLike;
use App\Model\UserObject;
use App\Model\UserRecommend;

class IndexController extends Controller
{

    public function getIndex()
    {
        $recommends = UserRecommend::with(array(
            'user' => function ($query) {
                //只需要正常状态的会员
                return $query->status();
            }
        ))->index()->orderBy('order')->get()->all();
        $users = array();
        foreach ($recommends as $recommend) {

            $users = array_merge($users, $recommend->user->all());
        }

        return $this->view('index')->with('users', $users);
    }

    public function getSearch()
    {
        $users = [];
        return $this->view('search')->with('users', $users);
    }

    public function getSeedMale()
    {
        $maleName = array(
            '帅到没朋友', '浪漫人生路', '青酒余生.', '万人迷', '你的笑°', '瞒着世界.', '旧情人', '青酒与书.', '对风说爱你', '你不用长高因为我会弯腰', '南望.',
            '北盼.', '几分情话.', '给我一杯酒', '情话与我', '深街酒肆.', '恍惚i', '久居我心', '当然i', '于酒说心事', '怪味✊', '活在裆下', '奶香萌男i',
            '大白衬衣', '南稔', '萌面大叔', '冷暖少年°', '纯情的小太阳', '余生太长', '吃草长大', '笑拥孤独', '花街良人.', '烈酒清风.', '秋初',
            '最怕你闹', '了我痴心,', '矢遇', '没有海绵的宝宝i', '几人与我', '时光少年依旧蓝i',
            '昨晚繁琐', '柳叶弯眉小清新', '再遇见.', '别赶我走', '清一色', '南朽', '萌面超人',
            '岁月彷徨′╮', '走过一意孤行', '笑颜如花', '抱不住太阳的深海', '梦醒了i她走了i',
            '青衫栀拾', '你眼睛会笑', '独饮烈酒i', '温情浪友', '余生伴你流浪', '差不多先生', '绿衫君', '忍俊不禁.',
            '老楼里的猫.', '恋爱无限期', '恋爱无限期', '你在心上', '嗯哼i', '恋上你的笑', '京城鹿少', '初遇她',
            '做我怀中的猫', '怪情歌', '时间作怪', '空城旧梦*', '像尘埃', '熟到陌路', '伤我何妨', '余生独望', '无人转角', '拭去岁月',
            '千丝乱绪', '握手已空', '孤赌一注', '独守寂寥', '倾一世旧梦', '习惯没依靠', '心事写进风', '怎知我深情!', '继续、那寂寞',
            '梦里泪@盼君归', '记忆绵长，都是伤', '回忆算不算曾经', '梦中人太多情', '世间孤独归我所有', '梦里无你怎安眠', '微笑、不代表开心',
            '忠于职守的孤独', '孤独深扎骨髓', '远方再无故人讯', '时光糟蹋人心', '伴你之久终成客', '情商终变为情伤', '路过风景，路过你'
        );
        $provinces = array(
            '北京' => array('北京'),
            '天津' => array('天津'),
            '重庆' => array('重庆'),
            '上海' => array('上海'),
            '内蒙古' => array('赤峰', '呼和浩特', '巴彦淖尔', '锡林郭勒', '二连浩特', '包头', '乌海', '通辽')

        );

        $strocks = array(
            '汉族', '蒙古族', '回族'
        );
        foreach ($maleName as $name) {
            $province = array_rand($provinces);
            $city = arand($provinces[$province]);
            $province2 = array_rand($provinces);
            $city2 = arand($provinces[$province2]);
            $strock = arand($strocks);
            $form = array(
                'user_name' => $name,
                'realname' => $name,
                'mobile' => rand(130, 189) . rand(1000, 9999) . rand(1000, 9999),
                'sex' => \App\Enum\User::SEX_MALE,
                'birthday' => rand(1972, 1997) . '-' . rand(1, 12) . '-' . rand(1, 29),
                'work_province' => $province,
                'work_city' => $city,
                'level' => arand(array(1, 1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3)),
                'salary' => arand(array(1, 1, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 7, 7, 7, 8, 8, 9)),
                'marriage' => arand(array(1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 3)),
                'education' => arand(array(1, 1, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 6, 7)),
                'house' => rand(1, 5),
                'children' => arand(array(1, 1, 1, 1, 1, 1, 2)),
                'height' => rand(163, 193),
                'status' => \App\Enum\User::STATUS_OK
            );
            try {

                transaction();
                //创建用户
                $user = User::create($form);

                //创建用户详情
                $user->info()->save(new UserInfo(array(
                    'stock' => $strock,
                    'origin_province' => $province2,
                    'origin_city' => $city2
                )));

                //创建择偶对象
                $ageStart = rand(18, 39);
                $ageEnd = rand($ageStart + 1, $ageStart + 10);
                $heightStart = rand(160, 180);
                $heightEnd = rand($heightStart + 3, $heightStart + 20);
                $province3 = array_rand($provinces);
                $city3 = arand($provinces[$province3]);
                $user->object()->save(new UserObject(array(
                    'sex' => \App\Enum\User::SEX_FEMALE,
                    'salary_start' => arand(array(null, null, null, 1, 2, 3, 3, 4)),
                    'salary_end' => arand(array(null, null, null, 5, 6, 7)),
                    'marriage' => arand(array(null, null, null, 1, 1, 1, 2)),
                    'education' => arand(array(null, null, null, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 6)),
                    'house' => arand(array(null, null, null, 1, 2, 3, 4, 5)),
                    'children' => arand(array(null, null, null, null, 1, 1, 1, 1, 1, 1, 2)),
                    'height_start' => $heightStart,
                    'height_end' => $heightEnd,
                    'age_start' => $ageStart,
                    'age_end' => $ageEnd,
                    'work_province' => $province3,
                    'work_city' => $city3

                )));
                //创建推荐数据
                for ($i = rand(0, 2); $i <= 2; $i++) {
                    if ($i) {
                        $user->recommend()->save(new UserRecommend(array(
                            'page' => $i,
                            'order' => rand(0, 100)
                        )));
                    }
                }
                echo '<span style="color:green">创建成功,ID:' . $user->user_id . "</span><br>";
                commit();
            } catch (\Exception $ex) {
                rollback();
                echo '<span style="color:red">' . $name . '创建失败!,原因:' . $ex->getMessage() . "</span><br/><br/>";
            }


        }
    }

    public function getSeedFemale()
    {
        $maleName = array(
            '丑妞', '┇ゐぅ誰，ηi卜自怞_', '心随你痛', '情稚', '旧情人的旧习惯', '变萌变软变淑女', '情字醉心口', '甜小妞', '我是小女银~', '-恋梦菇凉、',
            '能赋深情', '蒗與矜持_', '大姐范er', '※', '那操场永终点', '怪癖小姐的怪癖是妳。', '女生要泼辣点╮', '相思赋予谁', '不败得貂蝉',
            '画个句号给今天〃', '姬儿', '听说、你嫁给习惯', '黑市夫人', '薄情辞', '向晚蔻', '↘無良溫柔女', '℉键ραn感情﹏', '子兮分袂', '△柠檬之夏',
            '小心眼的人', 'や风吹泪落灬', '脑残女', '牠^_^裺滴命', '冷宫妃子怨℡', '苺籽奶酱(:≡', '埋下眼泪', '↓溫гê紅脣↑', '冰雨_落花', '森里伊人',
            '小河边唱歌', '′︷謎仄的性感', 'ぺ佳日摓jūnㄣ', '短发菇凉就是帅', '→習慣ろ畩賴鈊', '女汉子输给了装逼的萌妹子', '赱ɡé貓步,扭ɡé蠻腰', '魑媚',
            '小卖部遇萌男i', '┭台qiú輭мeì《', '无心少女毒如蝎', '妩媚给谁看#', '剪棹痮發♀朢棹魜渣', '怹辷zんΙ洅щò夣哩', '不温柔的女子', '纸柠',
            '親吻鎖傦', '屌国女农i', '￠', '眼睛里最美丽的老娘', '他说他不爱我°', '好姑娘就是不一样', '莪緗彅短橃罘洅噯亽碴', '╔甜羙誘秂╗',
            '躲在街头﹏独自哭泣', '揂gōu囘yì~', '「猫⑦jιē」', '、我的爱人。', '魔鬼~的女神', '長昼無亽', '烂人说爱', '゛病２τài女', '捕儚sんàóㄝ',
            '灬γè罙猫起', '单字情书', '^此颜差矣', '︻酥聲jιαΘ女~', '疚幼', '唯余泣叹', '灬苚揂取ηuǎη', '亽醜圈小', '姬妓', '最佳演员', '醉歌',
            '·°南風起等亇lαi', '七街酒', '旧照片', 'ηà年我╈⑧', '悲伤摇曳着', '含泪说分手', 'ㄣláη巷绿街灬', '你怀里的猫^', '~', '^', '雪念',
            '┆⒐丆倁足ぐ', '措辞', '━孤鯎等ηι—', '︶χiū稚(~)意', '呆萌狐狸么么哒', '◆輓携庩鉎◇', '﹎笑i戯', '吻尔之眸', '温酒诉情深', '喜萌你',
            '·°九色ιц尐ηǚ', '萌物少女', '★帽衫少女', '途径爱情', '猫眠花下○●○', '晨光如水', '有本事你爱我一辈子', '我为你真心的哭过', '良笙', '怕腥的猫ε==3',
            '软声猫吟', '千萬尐囡夢', 'ε飛翔の瘋τù子ˇ', '喜笑颜开^', '~', '^', '辣椒病女', '︶沐年廴χìа', '软甜野妹', '安与雪', 'うηáη街浪亽╮',
            '╮ɡū浪寡ㄝ支╭', '頭よ藏zんe觸角ゞ', '原谅我太野性', '﹏ー懜dυΘ年〆', '见蝴蝶飞越森林', '妓要从良', '一往痴心', '想哭、却没了泪', '→zι由初о勿☆',
            '︶zěη庅⒐动情', '古俗', '★`χυ多ηiaη前'
        );
        $provinces = array(
            '北京' => array('北京'),
            '天津' => array('天津'),
            '重庆' => array('重庆'),
            '上海' => array('上海'),
            '内蒙古' => array('赤峰', '呼和浩特', '巴彦淖尔', '锡林郭勒', '二连浩特', '包头', '乌海', '通辽')

        );

        $strocks = array(
            '汉族', '蒙古族', '回族'
        );
        foreach ($maleName as $name) {
            $province = array_rand($provinces);
            $city = arand($provinces[$province]);
            $province2 = array_rand($provinces);
            $city2 = arand($provinces[$province2]);
            $strock = arand($strocks);
            $form = array(
                'user_name' => $name,
                'realname' => $name,
                'mobile' => rand(130, 189) . rand(1000, 9999) . rand(1000, 9999),
                'sex' => \App\Enum\User::SEX_FEMALE,
                'birthday' => rand(1983, 1997) . '-' . rand(1, 12) . '-' . rand(1, 29),
                'work_province' => $province,
                'work_city' => $city,
                'level' => arand(array(1, 1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3)),
                'salary' => arand(array(1, 1, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 7, 7, 7, 8, 8, 9)),
                'marriage' => arand(array(1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 3)),
                'education' => arand(array(1, 1, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 6, 7)),
                'house' => rand(1, 5),
                'children' => arand(array(1, 1, 1, 1, 1, 1, 2)),
                'height' => rand(155, 175),
                'status' => \App\Enum\User::STATUS_OK
            );
            try {

                transaction();
                //创建用户
                $user = User::create($form);

                //创建用户详情
                $user->info()->save(new UserInfo(array(
                    'stock' => $strock,
                    'origin_province' => $province2,
                    'origin_city' => $city2
                )));

                //创建择偶对象
                $ageStart = rand(18, 39);
                $ageEnd = rand($ageStart + 1, $ageStart + 10);
                $heightStart = rand(170, 190);
                $heightEnd = rand($heightStart + 3, $heightStart + 20);
                $province3 = array_rand($provinces);
                $city3 = arand($provinces[$province3]);
                $user->object()->save(new UserObject(array(
                    'sex' => \App\Enum\User::SEX_MALE,
                    'salary_start' => arand(array(null, null, null, 1, 2, 3, 3, 4)),
                    'salary_end' => arand(array(null, null, null, 5, 6, 7)),
                    'marriage' => arand(array(null, null, null, 1, 1, 1, 2)),
                    'education' => arand(array(null, null, null, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 6)),
                    'house' => arand(array(null, null, null, 1, 2, 3, 4, 5)),
                    'children' => arand(array(null, null, null, null, 1, 1, 1, 1, 1, 1, 2)),
                    'height_start' => $heightStart,
                    'height_end' => $heightEnd,
                    'age_start' => $ageStart,
                    'age_end' => $ageEnd,
                    'work_province' => $province3,
                    'work_city' => $city3

                )));
                //创建推荐数据
                for ($i = rand(0, 2); $i <= 2; $i++) {
                    if ($i) {
                        $user->recommend()->save(new UserRecommend(array(
                            'page' => $i,
                            'order' => rand(0, 100)
                        )));
                    }
                }
                echo '<span style="color:green">创建成功,ID:' . $user->user_id . "</span><br>";
                commit();
            } catch (\Exception $ex) {
                rollback();
                echo '<span style="color:red">' . $name . '创建失败!,原因:' . $ex->getMessage() . "</span><br/><br/>";
            }


        }
    }

    public function getSeedLike()
    {
        $maleId = 166946;
        $maleIdMax = 167046;
        $femaleId = 167047;
        $femaleMax = 167183;
        try {
            transaction();
            for ($i = 0; $i <= 200; $i++) {
                $male = rand($maleId, $maleIdMax);
                $female = rand($femaleId, $femaleMax);
                $x = rand(0, 1);
                UserLike::create(array(
                    'user_id' => $x === 0 ? $female : $male,
                    'like_user_id' => $x !== 0 ? $female : $male
                ));
                echo '关联成功:男:' . $male . ',女:' . $female . '<br>';
            }
            commit();
            return '关联完毕' . '<br>';
        } catch (\Exception $e) {
            rollback();
            echo '关联回滚!' . '<br>';
            return $e->getMessage();
        }

    }

    public function getSeedMaleAvatar()
    {
        $FILE = new \Illuminate\Filesystem\Filesystem();

        $files = $FILE->files('/Users/vicens/www/meigui/public/uploads/avatar');
        try {

            transaction();
            foreach ($files as $path) {
                $file = $FILE->name($path) . '.jpg';

                $user = User::where('sex', UserEnum::SEX_MALE)->whereNull('avatar')->first();

                if ($user && !$user->getOriginal('avatar')) {
                    $user->update(array(
                        'avatar' => $file
                    ));
                }

            }
            commit();
            return '添加成功';
        } catch (\Exception $e) {
            rollback();
            return $e->getMessage();
        }

    }
}

function arand($array)
{
    $index = array_rand($array);
    return $array[$index];
}