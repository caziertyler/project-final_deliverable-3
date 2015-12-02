<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/24/15
 * Time: 6:23 PM
 */

use Notes\Domain\Entity\UserBuilder;
use Notes\Persistence\Entity\MysqlUserRepository;
use Notes\Domain\ValueObject\StringLiteral;


describe('Notes\Persistence\Entity\MysqlUserRepository', function () {
    beforeEach(function () {
        $this->faker = \Faker\Factory::create();
        $this->repo = new MysqlUserRepository();
        $this->userBuilder = new UserBuilder();
        $this->userBuilder->setEmail($this->faker->email);
        $this->userBuilder->setFirstName($this->faker->firstName);
        $this->userBuilder->setLastName($this->faker->lastName);
    });
    describe('->__construct()', function () {
        it('should construct an MysqlUserRepository object', function () {
            expect($this->repo)->to->be->instanceof(
                'Notes\Persistence\Entity\MysqlUserRepository'
            );
        });
    });
    describe('->add()', function () {
        it('should add one User to the repository', function () {
            $this->repo->add($this->userBuilder->build());

            expect($this->repo->count())->to->equal(1);
        });
    });
    describe('->count()', function () {
        it('should return an integer count', function () {
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            $this->userBuilder->setEmail($this->faker->email);
            $this->userBuilder->setFirstName($this->faker->firstName);
            $this->userBuilder->setLastName($this->faker->lastName);
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(2);
        });
    });
    describe('->get()', function () {
        it('should return a single User object', function () {
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(1);

            $actual = $this->repo->getUser($user);

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->getAll()', function () {
        it('should return a single User object', function () {
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            $this->userBuilder->setEmail($this->faker->email);
            $this->userBuilder->setFirstName($this->faker->firstName);
            $this->userBuilder->setLastName($this->faker->lastName);
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(2);

            $actual = $this->repo->getAll();

            expect($actual[0])->to->be->instanceof('Notes\Domain\Entity\User');
            expect($actual[1])->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->getByUserId()', function () {
        it('should return a single User object', function () {
            $user = $this->userBuilder->build();
            $id = $this->userBuilder->getId();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(1);

            $actual = $this->repo->getById($id);

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
    describe('->modify()', function () {
        it('should update a User email, firstname, and lastname', function () {
            $originalUser = $this->userBuilder->build();
            $this->repo->add($originalUser);

            expect($this->repo->count())->to->equal(1);

            $testEmail = $this->faker->email;
            $testFirstname = $this->faker->firstName;
            $testLastname = $this->faker->lastName;

            $this->userBuilder->setEmail($testEmail);
            $this->userBuilder->setFirstName($testFirstname);
            $this->userBuilder->setLastName($testLastname);
            $newUser = $this->userBuilder->build();

            $this->repo->modify($originalUser, $newUser);

            expect($originalUser->getEmail())->to->equal(new StringLiteral($testEmail));
            expect($originalUser->getFirstName())->to->equal(new StringLiteral($testFirstname));
            expect($originalUser->getLastName())->to->equal(new StringLiteral($testLastname));
        });
    });
    describe('->modifyById()', function () {
        it('should update a User email, firstname, and lastname', function () {
            $originalUser = $this->userBuilder->build();
            $this->repo->add($originalUser);

            expect($this->repo->count())->to->equal(1);

            $testEmail = $this->faker->email;
            $testFirstname = $this->faker->firstName;
            $testLastname = $this->faker->lastName;

            $this->userBuilder->setEmail($testEmail);
            $this->userBuilder->setFirstName($testFirstname);
            $this->userBuilder->setLastName($testLastname);
            $newUser = $this->userBuilder->build();

            $this->repo->modify($originalUser->getId(), $newUser);

            expect($originalUser->getEmail())->to->equal(new StringLiteral($testEmail));
            expect($originalUser->getFirstName())->to->equal(new StringLiteral($testFirstname));
            expect($originalUser->getLastName())->to->equal(new StringLiteral($testLastname));
        });
    });
    describe('->remove()', function () {
        it('should remove a User from a repository', function () {
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(1);

            $this->repo->remove($user);
            expect($this->repo->count())->to->equal(0);
        });
    });
    describe('->removeById()', function () {
        it('should remove a User from a repository', function () {
            $user = $this->userBuilder->build();
            $this->repo->add($user);

            expect($this->repo->count())->to->equal(1);

            $this->repo->remove($user->getId());
            expect($this->repo->count())->to->equal(0);
        });
    });
});