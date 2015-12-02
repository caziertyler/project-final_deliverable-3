<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/24/15
 * Time: 6:05 PM
 */

namespace Notes\Persistence\Entity;

use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserFactory;
use Notes\Domain\Entity\UserRepositoryInterface;

class MysqlUserRepository implements UserRepositoryInterface
{

    /**
     * @param \Notes\Domain\Entity\User $user
     * @return mixed
     */
    public function add(User $user)
    {
        // TODO: Implement add() method.
    }

    /**
     * @param \Notes\Domain\ValueObject $id
     * @return mixed
     */
    public function addByUserId(User $id)
    {
        // TODO: Implement addByUserId() method.
    }

    /**
     * @return int
     */
    public function count()
    {
        // TODO: Implement count() method.
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    /**
     * @param \Notes\Domain\Entity\User $ user
     * @return mixed
     */
    public function get(User $user)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param \Notes\Domain\ValueObject $id
     * @return mixed
     */
    public function getByUserId(User $id)
    {
        // TODO: Implement getByUserId() method.
    }

    /**
     * @param \Notes\Domain\Entity\User $ user
     * @return mixed
     */
    public function modify(User $user)
    {
        // TODO: Implement modify() method.
    }

    /**
     * @param \Notes\Domain\ValueObject $id
     * @return mixed
     */
    public function modifyByUserId(User $id)
    {
        // TODO: Implement modifyByUserId() method.
    }

    /**
     * @param \Notes\Domain\Entity\User $ user
     * @return mixed
     */
    public function remove(User $user)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @param \Notes\Domain\ValueObject $id
     * @return mixed
     */
    public function removeByUserId(User $id)
    {
        // TODO: Implement removeByUserId() method.
    }
}