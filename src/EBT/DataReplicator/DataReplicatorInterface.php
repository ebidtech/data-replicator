<?php

/**
 * LICENSE: [EMAILBIDDING_DESCRIPTION_LICENSE_HERE]
 *
 * @author     Filipe Silva <filipe.silva@emailbidding.com>
 * @copyright  2012-2014 Emailbidding
 * @license    [EMAILBIDDING_URL_LICENSE_HERE]
 */

namespace EBT\DataReplicator;

interface DataReplicatorInterface
{
    /**
     * @return string new version available
     */
    public function replicate();

    /**
     * @param $newVersion
     */
    public function changeCurrentVersion($newVersion);

    /**
     * @return string current version
     */
    public function getCurrentVersion();

    /**
     * @return string next available version
     */
    public function getNextVersion();

    /**
     * @return string Replicator unique identifier
     */
    public function getReplicatorName();
}
