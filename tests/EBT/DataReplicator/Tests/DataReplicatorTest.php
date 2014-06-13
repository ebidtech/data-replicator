<?php

/*
 * This file is a part of the EBDate library.
 *
 * (c) 2013 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\DataReplicator\Tests;

use Doctrine\DBAL\Connection;

class DataReplicatorTest extends TestCase
{
    /**
     * @var Connection
     */
    protected $doctrineConnection;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->doctrineConnection = $this->getMockBuilder('Doctrine\DBAL\Connection')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testChangeCurrentVersion()
    {
        $dataReplicatorTestClass = new DataReplicatorTestClass($this->doctrineConnection);

        $this->assertEquals(
            'a',
            $dataReplicatorTestClass->getCurrentVersion()
        );

        $dataReplicatorTestClass->changeCurrentVersion('b');

        $this->assertEquals(
            'b',
            $dataReplicatorTestClass->getCurrentVersion()
        );
    }

    public function testGetNextVersion()
    {
        $dataReplicatorTestClass = new DataReplicatorTestClass($this->doctrineConnection);

        $this->assertEquals(
            'a',
            $dataReplicatorTestClass->getCurrentVersion()
        );

        $this->assertEquals(
            'b',
            $dataReplicatorTestClass->getNextVersion()
        );
    }
}
