<?php

/**
 * Replicators are classes responsible to copy complete entities from a database to another
 * They also use a control mechanism to guarantee that there's no concurrent and
 * inconsistent accesses to the replicated data
 * This is the Base class to be extended (with some common methods) by other replicators.
 *
 *
 * LICENSE: [EMAILBIDDING_DESCRIPTION_LICENSE_HERE]
 *
 * @author     Filipe Silva <filipe.silva@emailbidding.com>
 * @copyright  2012-2014 Emailbidding
 * @license    [EMAILBIDDING_URL_LICENSE_HERE]
 */

namespace EBT\DataReplicator;

use Doctrine\DBAL\Connection;

abstract class BaseDataReplicator
{
    /**
     * @var Connection
     */
    protected $destDBCon;

    /**
     * @param Connection $destinationDBConnection
     */
    public function __construct(Connection $destinationDBConnection)
    {
        $this->destDBCon = $destinationDBConnection;
    }

    /**
     * Change current version
     *
     * @param string $newVersion
     */
    public function changeCurrentVersion($newVersion)
    {
        $this->destDBCon->executeUpdate(
            sprintf(
                'UPDATE %s SET current_version = ?, updated_at = NOW() WHERE name = ?',
                $this->getDestinationControlTable()
            ),
            array(
                $newVersion,
                $this->getReplicatorName()
            )
        );
    }

    /**
     * Get current version
     *
     * @return string
     */
    public function getCurrentVersion()
    {
        $statement = $this->destDBCon->executeQuery(
            sprintf('SELECT * FROM %s WHERE name = ?', $this->getDestinationControlTable()),
            array($this->getReplicatorName())
        );

        $controlEntry = $statement->fetchAll();

        return current($controlEntry)['current_version'];
    }

    /**
     * Get next available version
     *
     * @return string
     */
    public function getNextVersion()
    {
        if ('a' === $this->getCurrentVersion()) {
            return 'b';
        }
        return 'a';
    }

    /**
     * Get replicator unique identifier
     *
     * @return string
     */
    abstract public function getReplicatorName();

    /**
     * Get replicator control table
     *
     * @return string
     */
    abstract public function getDestinationControlTable();
}
