<?php
declare(strict_types=1);
/**
 * Contains class Connection.
 *
 * PHP version 7.2+
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
 * Class Connection is a wrapper for an underlying \PDO instance.
 *
 * This was suppose to just be a transparent extending wrapper around \PDO. Plan was to have something to make testing
 * easier and have place to implement an interface but instead I've had to go beyond that to make it work like I wanted
 * it to.
 *
 * @mixin \PDO
 */
class Connection implements ConnectionInterface {
    /**
     * Connection constructor.
     *
     * @param string      $dsn      The Data Source Name, or DSN, contains the information required to connect to the
     *                              database. In general, a DSN consists of the PDO driver name, followed by a colon,
     *                              followed by the PDO driver-specific connection syntax. See the docs
     *                              for<b>\PDO::__construct()</b> for full details.
     * @param string|null $username The user name for the DSN string. This parameter is optional for some PDO drivers.
     *                              Example: SqlLite since it just a file in a directory somewhere it doesn't need
     *                              this.
     * @param string|null $password The password for the DSN string. This parameter is optional for some PDO drivers.
     *                              Example: SqlLite since it just a file in a directory somewhere it doesn't need
     *                              this.
     * @param array|null  $options  A key=>value array of driver-specific connection options.
     *
     * @throws \PDOException The \PDO constructor always throws an exception even if you are setting it to use errors
     *                       instead. That setting will only effect any of the follow interacts with \PDO.
     * @see \PDO
     */
    public function __construct(string $dsn, string $username = null, string $password = null, array $options = null) {
        $this->pdo = new \PDO($dsn, $username, $password, $options);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->sql92Mode = false;
    }
    /**
     * Allow any other underlying \PDO methods be called without having to wrap them all.
     *
     * The wrapper methods of this class are expected to cover what Yapeal-ng itself uses from \PDO but allows the rest
     * as well through this method.
     *
     * @param string $name      Name of any \PDO methods not defined above.
     * @param array  $arguments Method arguments as a name=>value array.
     *
     * @return mixed
     * @throws \BadMethodCallException
     */
    public function __call(string $name, array $arguments) {
        if (!method_exists($this->pdo, $name)) {
            throw new \BadMethodCallException('Unknown method ' . $name);
        }
        $mess = "Call to an unexposed but valid \\PDO method '$name'. If you need to use it insure it is added to"
            . self::class;
        throw new \BadMethodCallException($mess);
    }
    /**
     * Initiates a transaction.
     *
     * @return bool <b>true</b> on success or may return <b>false</b> or emits <b>\PDOException</b> (depending on error
     * handling).
     * @throws \PDOException
     */
    public function beginTransaction(): bool {
        return (bool)$this->pdo->beginTransaction();
    }
    /**
     * Commits a transaction.
     *
     * @return bool <b>true</b> on success or may emit a <b>\PDOException</b>.
     * @throws \PDOException
     */
    public function commit(): bool {
        return (bool)$this->pdo->commit();
    }
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
     */
    public function exec(string $statement): int {
        return $this->pdo->exec($statement);
    }
    /**
     * @return \PDO
     */
    public function getPdo(): \PDO {
        return $this->pdo;
    }
    /**
     * Checks if inside a transaction.
     *
     * @return bool <b>true</b> if a transaction is currently active, and <b>false</b> if not.
     */
    public function inTransaction(): bool {
        return (bool)$this->pdo->inTransaction();
    }
    /**
     * Flag to mark if the under-laying PDO driver has already been set to it's most SQL-92 compatible mode or not.
     *
     * @return bool
     */
    public function isSql92Mode(): bool {
        return $this->sql92Mode;
    }
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
     */
    public function prepare(string $statement, array $driver_options = []): \PDOStatement {
        return $this->pdo->prepare($statement, $driver_options);
    }
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
     * @see \PDOStatement::setFetchMode For a full description of the second and following parameters.
     */
    public function query(string $statement, int $mode = \PDO::FETCH_BOTH, ...$arguments): \PDOStatement {
        if (0 === count($arguments)) {
            return $this->pdo->query($statement, $mode);
        }
        return $this->pdo->query($statement, $mode, ...$arguments);
    }
    /**
     * Rolls back a transaction.
     *
     * @return bool <b>true</b> on success or will emit a <b>\PDOException</b>.
     * @throws \PDOException
     */
    public function rollBack(): bool {
        return (bool)$this->pdo->rollBack();
    }
    /**
     * Set an attribute.
     *
     * @param int   $attribute
     * @param mixed $value
     *
     * @return bool <b>true</b> on success or will emit a <b>\PDOException</b>.
     */
    public function setAttribute(int $attribute, $value): bool {
        return (bool)$this->pdo->setAttribute($attribute, $value);
    }
    /**
     * @param bool $value
     *
     * @return self Fluent interface
     */
    public function setSql92Mode(bool $value = true): self {
        $this->sql92Mode = $value;
        return $this;
    }
    /**
     * @var \PDO $pdo
     */
    private $pdo;
    /**
     * @var bool $sql92Mode
     */
    private $sql92Mode;
}
