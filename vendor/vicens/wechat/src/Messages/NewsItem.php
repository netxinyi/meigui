<?php
/**
 * NewsItem.php
 *
 * Part of Vicens\Wechat.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    overtrue <i@overtrue.me>
 * @copyright 2015 overtrue <i@overtrue.me>
 * @link      https://github.com/overtrue
 * @link      http://overtrue.me
 */

namespace Vicens\Wechat\Messages;

/**
 * 图文项
 */
class NewsItem extends BaseMessage
{


    /**
     * 属性
     *
     * @var array
     */
    protected $properties = array(
        'title',
        'description',
        'pic_url',
        'url',
    );

}
