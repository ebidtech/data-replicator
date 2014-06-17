<?php

/*
 * This file is a part of the Data Replicator library.
 *
 * (c) 2014 Ebidtech
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
