<?php

/*
 * This file is a part of the Data Replicator library.
 *
 * (c) 2014 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace EBT\DataReplicator\Tests;

use EBT\DataReplicator\BaseDataReplicator;
use EBT\DataReplicator\DataReplicatorInterface;

class DataReplicatorTestClass extends BaseDataReplicator implements DataReplicatorInterface
{
    const DESTINATION_BASE_TABLE_NAME = 'country_';
    const DESTINATION_CONTROL_TABLE = 'replicator_control';
    const REPLICATOR_NAME = 'country';

    /**
     * @var string
     */
    protected $currentVersion = 'a';

    /**
     * {@inheritdoc}
     */
    public function replicate()
    {
        return $this->getNextVersion();
    }

    /**
     * {@inheritdoc}
     */
    public function changeCurrentVersion($newVersion)
    {
        $this->currentVersion = $newVersion;
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentVersion()
    {
        return $this->currentVersion;
    }

    /**
     * {@inheritdoc}
     */
    public function getReplicatorName()
    {
        return self::REPLICATOR_NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function getDestinationControlTable()
    {
        return self::DESTINATION_CONTROL_TABLE;
    }
}
