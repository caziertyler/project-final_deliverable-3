<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/29/15
 * Time: 5:04 PM
 */

namespace Notes\Domain\Entity;

use Notes\Domain\BuilderInterface;
use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\ValueObject\Uuid;

class UserBuilder implements BuilderInterface
{
    /** @var  string */
    protected $email;

    /** @var  string */
    protected $firstname;

    /** @var  \Notes\Domain\ValueObject\Uuid */
    protected $id;

    /** @var  string */
    protected $lastname;

    /**
     * @return \Notes\Domain\Entity\User
     * @throws BadMethodCallException
     */
    public function build()
    {
        if ($this->email === null || $this->firstname === null || $this->lastname === null) {
            throw new BadMethodCallException(
                __METHOD__. '(): requires that an email address, firstname, and lastname be set for a new user.'
            );
        } else {
            return new User(new Uuid, new StringLiteral($this->firstname), new StringLiteral($this->lastname), new StringLiteral($this->email));
        }
    }

    /**
     * @param string $email
     */
    public function setEmail (string $email)
    {
        $this->email = $email;
    }

    /**
     * @param string $firstname
     */
    public function setFirstName (string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param string $lastname
     */
    public function setLastName (string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail ()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstName ()
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastName ()
    {
        return $this->lastname;
    }
}