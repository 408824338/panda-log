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
namespace ofix\PandaLog\core;

class RecordArray extends Record
{
    public function __construct()
    {
        parent::__construct();
        $this->type = self::RECORD_TYPE_OBJECT;
    }
    public function log($array){
        $this->data = json_encode($array);
    }
    public function read(BinaryStream $stream,$byte_count){
        $data = $stream->readStringClean($byte_count);
        $this->data = json_decode($data);
    }
}