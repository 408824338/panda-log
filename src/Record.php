<?php
/*
 * This file is part of panda-log.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    code lighter
 * @copyright https://github.com/ofix
 * @we-chat   981326632
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @Date      2017/12/2
 * @Time      13:40
 */

namespace common\panda;
/* all record saved format as follows
 * 4 byte record length|1 byte record type|remain bytes are custom
 * different record type data may need different decode method
 */
abstract class Record
{
    const RECORD_TYPE_EMPTY  = 1;
    const RECORD_TYPE_STRING = 2;
    const RECORD_TYPE_SQL    = 3;
    const RECORD_TYPE_ARRAY  = 4;
    const RECORD_TYPE_OBJECT = 5;
    const RECORD_TYPE_REQUEST= 6;
    const RECORD_TYPE_LOGIN  = 7;
    const EMPTY_PLACE_HOLDER = 'nul'; //空字符串占位符
    const EOL = '\n'; //分割符
    public $type;
    public $data;
    public function __construct()
    {
        $this->type = self::RECORD_TYPE_EMPTY;
        $this->data = null;
    }

    public function read(BinaryStream $stream,$raw_bytes){

    }
    public function write(BinaryStream $stream){
        $len = strlen($this->data);
        $stream->writeUInt32($len); // 4个字节长度
        $stream->writeUByte($this->type);
        $stream->writeStringClean($this->data); //剩下的都是数据字节
    }
}