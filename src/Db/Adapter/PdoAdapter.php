<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/24/15
 * Time: 6:14 PM
 */

namespace Notes\Db\Adapter;

/**
 * Class PdoAdapter
 * @package Notes\Db\Adapter
 */
class PdoAdapter implements DBAdapterInterface
{
    /** @var  string */
    protected $dsn;

    /** @var  string */
    protected $password;

    /** @var  string */
    protected $username;

    /**
     * @param $dsn
     * @param $username
     * @param $password
     */
    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->password = password;
        $this->username = $username;

    }

    /**
     * connect()
     */
    public function connect()
    {
        $this->pd = new \PDO($this->dsn, $this->username, $this->password);
    }

    /**
     * close()
     */
    public function close()
    {
        try {
            unset($this->pdo);
        }  catch(Exception $e)  {
            die($e->getCode() . '; ' . $e->getMessage());
        }

    }

    public function delete()
    {

    }

    public function execute()
    {
        // TODO: Implement execute() method.
    }

    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function select()
    {
        // TODO: Implement select() method.
    }

    public function sql($sql)
    {
        // TODO: Implement sql() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}