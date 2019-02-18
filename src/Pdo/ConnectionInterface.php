<?php
declare(strict_types=1);
/**
 * Contains interface ConnectionInterface.
 *
 * PHP version 7.0+
 *
 * LICENSE:
 * This file is part of ChartItMD.
 * Copyright (C) 2019 ChartItMD Development Group
 *
 * @author    Michael Cummings <mgcummings@yahoo.com>
 * @copyright 2019 ChartItMD Development Group
 * @license   Proprietary
 */

namespace ChartItMD\Pdo;

/**
 * Interface ConnectionInterface.
 */
interface ConnectionInterface {
    /**
     * Initiates a transaction.
     *
     * @return bool <b>true</b> on success or may return <b>false</b> or emits <b>\PDOException</b> (depending on error
     * handling).
     * @throws \PDOException
     */
    public function beginTransaction(): bool;
    /**
     * Commits a transaction.
     *
     * @return bool <b>true</b> on success or may emit a <b>\PDOException</b>.
     * @throws \PDOException
     */
    public function commit(): bool;
    /**
     * Execute an SQL statement and return the number of affected rows.
     *
     * @param string $statement This must be a valid SQL statement for the target database server. This can _not_ be
     *                          used with anything that returns a result set like SELECT etc. If you need that use
     *                          <b>query</b> or preferably <b>prepare</b> and <b>execute</b> for better safety and
     *                          improved repeated query handling.
     *
     * @return int <b>exec</b> returns the number of rows that were modified or deleted by the SQL statement
     * you issued. If no rows were affected, <b>exec</b> returns 0.
     * @throws \PDOException
     */
    public function exec(string $statement): int;
    /**
     * Checks if inside a transaction.
     *
     * @return bool <b>true</b> if a transaction is currently active, and <b>false</b> if not.
     */
    public function inTransaction(): bool;
    /**
     * Flag to mark if the under-laying PDO driver has already been set to it's most SQL-92 compatible mode or not.
     *
     * @return bool
     */
    public function isSql92Mode(): bool;
    /**
     * Prepares a statement for execution and returns a statement object.
     *
     * @param string $statement      This must be a valid SQL statement for the target database server.
     * @param array  $driver_options This array holds one or more key=>value pairs to set attribute values for the
     *                               <b>\PDOStatement</b> object that this method returns. You would most commonly use
     *                               this to set the <b>\PDO::ATTR_CURSOR</b> value to <b>\PDO::CURSOR_SCROLL</b> to
     *                               request a scrollable cursor. Some drivers have driver specific options that may be
     *                               set at prepare-time.
     *
     * @return \PDOStatement If the database server successfully prepares the statement, <b>prepare</b>
     * returns a <b>\PDOStatement</b> object. If the database server cannot successfully prepare the statement it emits
     * a <b>\PDOException</b>.
     * @throws \PDOException
     */
    public function prepare(string $statement, array $driver_options = []): \PDOStatement;
    /**
     * Executes an SQL statement, returning a result set as a PDOStatement object.
     *
     * __NOTE:__
     *     According to PHP this method doesn't accept any parameters including $statement which would make it kind of
     *     pointless. After take a look at the code for PDO I believe it has to do with a bug in how they try forcing an
     *     error for the no parameters case but it's some what unclear what's going on really. I'm going to give it
     *     something cleaner here and deal with it in Connection class with wrapper.
     *
     * @param string $statement       The SQL statement to prepare and execute.
     * @param int    $mode            The fetch mode must be one of the \PDO::FETCH_* constants.
     * @param mixed  $arguments       The second and following parameters are the same as the parameters for
     *                                \PDOStatement::setFetchMode.
     *
     * @return \PDOStatement <b>query</b> returns a PDOStatement object, or will emit a <b>\PDOException</b>.
     * @throws \PDOException
     * @see \PDOStatement::setFetchMode For a full description of the second and following parameters.
     */
    public function query(string $statement, int $mode = \PDO::ATTR_DEFAULT_FETCH_MODE, ...$arguments): \PDOStatement;
    /**
     * Rolls back a transaction.
     *
     * @return bool <b>true</b> on success or will emit a <b>\PDOException</b>.
     * @throws \PDOException
     */
    public function rollBack(): bool;
    /**
     * Set an attribute.
     *
     * @param int   $attribute
     * @param mixed $value
     *
     * @return bool <b>true</b> on success or will emit a <b>\PDOException</b>.
     * @throws \PDOException
     */
    public function setAttribute(int $attribute, $value): bool;
}
