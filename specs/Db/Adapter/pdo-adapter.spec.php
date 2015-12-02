<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/24/15
 * Time: 6:09 PM
 */

use Notes\db\Adapter\PdoAdapter;

describe('Notes\Db\Adapter\PdoAdapter', function () {
    beforeEach(function () {
        $this->dsn = 'mysql:dbname=testdb;host=127.0.0.1';
        $this->username = 'joe';
        $this->password = '1234pass';
    });
    describe('->__construct()', function () {
        it('should return a PdoAdapter object', function () {
            $actual = new PdoAdapter($this->dsn, $this->username, $this->password);

            expect($actual)->to->be->instanceof('Notes\Db\Adapter\PdoAdapter');
        });
    });
});