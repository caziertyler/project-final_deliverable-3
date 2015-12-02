<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/24/15
 * Time: 6:11 PM
 */

namespace Notes\Db\Adapter;


interface RdbmsAdpterInterface extends DbAdapterInterface
{
    public function delete($table, $criteria);
    public function execute();
    public function insert($table, $data);
    public function select($table, $criteria);
    public function sql($sql);
    public function update($table, $data, $criteria);
}