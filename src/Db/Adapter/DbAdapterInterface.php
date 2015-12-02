<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/24/15
 * Time: 6:31 PM
 */

namespace Notes\Db\Adapter;


interface DbAdapterInterface
{
    public function close();
    public function connect();
}