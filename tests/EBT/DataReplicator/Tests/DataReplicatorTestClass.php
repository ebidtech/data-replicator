<?php

/**
 * LICENSE: [EMAILBIDDING_DESCRIPTION_LICENSE_HERE]
 *
 * @author     Diogo Rocha <diogo.rocha@emailbidding.com>
 * @copyright  2012-2014 Emailbidding
 * @license    [EMAILBIDDING_URL_LICENSE_HERE]
 */

namespace EBT\DataReplicator\Tests;

use EBT\DataReplicator\BaseDataReplicator;
use EBT\DataReplicator\DataReplicatorInterface;

/**
 * DataReplicatorTestClass
 */
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
