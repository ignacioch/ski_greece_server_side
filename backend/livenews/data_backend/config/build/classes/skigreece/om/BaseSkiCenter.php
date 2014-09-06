<?php


/**
 * Base class that represents a row from the 'skicenter' table.
 *
 *
 *
 * @package    propel.generator.skigreece.om
 */
abstract class BaseSkiCenter extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'SkiCenterPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SkiCenterPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the englishname field.
     * @var        string
     */
    protected $englishname;

    /**
     * The value for the snow_down field.
     * @var        int
     */
    protected $snow_down;

    /**
     * The value for the snow_up field.
     * @var        int
     */
    protected $snow_up;

    /**
     * The value for the temp field.
     * @var        double
     */
    protected $temp;

    /**
     * The value for the website field.
     * @var        string
     */
    protected $website;

    /**
     * The value for the weatherurl field.
     * @var        string
     */
    protected $weatherurl;

    /**
     * The value for the open field.
     * @var        int
     */
    protected $open;

    /**
     * @var        PropelObjectCollection|Track[] Collection to store aggregation of Track objects.
     */
    protected $collTracks;
    protected $collTracksPartial;

    /**
     * @var        PropelObjectCollection|Lift[] Collection to store aggregation of Lift objects.
     */
    protected $collLifts;
    protected $collLiftsPartial;

    /**
     * @var        PropelObjectCollection|Offer[] Collection to store aggregation of Offer objects.
     */
    protected $collOffers;
    protected $collOffersPartial;

    /**
     * @var        PropelObjectCollection|Camera[] Collection to store aggregation of Camera objects.
     */
    protected $collCameras;
    protected $collCamerasPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tracksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $liftsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $offersScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $camerasScheduledForDeletion = null;

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getid()
    {

        return $this->id;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getname()
    {

        return $this->name;
    }

    /**
     * Get the [englishname] column value.
     *
     * @return string
     */
    public function getenglishName()
    {

        return $this->englishname;
    }

    /**
     * Get the [snow_down] column value.
     *
     * @return int
     */
    public function getsnow_down()
    {

        return $this->snow_down;
    }

    /**
     * Get the [snow_up] column value.
     *
     * @return int
     */
    public function getsnow_up()
    {

        return $this->snow_up;
    }

    /**
     * Get the [temp] column value.
     *
     * @return double
     */
    public function gettemp()
    {

        return $this->temp;
    }

    /**
     * Get the [website] column value.
     *
     * @return string
     */
    public function getwebsite()
    {

        return $this->website;
    }

    /**
     * Get the [weatherurl] column value.
     *
     * @return string
     */
    public function getweatherurl()
    {

        return $this->weatherurl;
    }

    /**
     * Get the [open] column value.
     *
     * @return int
     */
    public function getopen()
    {

        return $this->open;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return SkiCenter The current object (for fluent API support)
     */
    public function setid($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = SkiCenterPeer::ID;
        }


        return $this;
    } // setid()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return SkiCenter The current object (for fluent API support)
     */
    public function setname($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = SkiCenterPeer::NAME;
        }


        return $this;
    } // setname()

    /**
     * Set the value of [englishname] column.
     *
     * @param  string $v new value
     * @return SkiCenter The current object (for fluent API support)
     */
    public function setenglishName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->englishname !== $v) {
            $this->englishname = $v;
            $this->modifiedColumns[] = SkiCenterPeer::ENGLISHNAME;
        }


        return $this;
    } // setenglishName()

    /**
     * Set the value of [snow_down] column.
     *
     * @param  int $v new value
     * @return SkiCenter The current object (for fluent API support)
     */
    public function setsnow_down($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->snow_down !== $v) {
            $this->snow_down = $v;
            $this->modifiedColumns[] = SkiCenterPeer::SNOW_DOWN;
        }


        return $this;
    } // setsnow_down()

    /**
     * Set the value of [snow_up] column.
     *
     * @param  int $v new value
     * @return SkiCenter The current object (for fluent API support)
     */
    public function setsnow_up($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->snow_up !== $v) {
            $this->snow_up = $v;
            $this->modifiedColumns[] = SkiCenterPeer::SNOW_UP;
        }


        return $this;
    } // setsnow_up()

    /**
     * Set the value of [temp] column.
     *
     * @param  double $v new value
     * @return SkiCenter The current object (for fluent API support)
     */
    public function settemp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->temp !== $v) {
            $this->temp = $v;
            $this->modifiedColumns[] = SkiCenterPeer::TEMP;
        }


        return $this;
    } // settemp()

    /**
     * Set the value of [website] column.
     *
     * @param  string $v new value
     * @return SkiCenter The current object (for fluent API support)
     */
    public function setwebsite($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->website !== $v) {
            $this->website = $v;
            $this->modifiedColumns[] = SkiCenterPeer::WEBSITE;
        }


        return $this;
    } // setwebsite()

    /**
     * Set the value of [weatherurl] column.
     *
     * @param  string $v new value
     * @return SkiCenter The current object (for fluent API support)
     */
    public function setweatherurl($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->weatherurl !== $v) {
            $this->weatherurl = $v;
            $this->modifiedColumns[] = SkiCenterPeer::WEATHERURL;
        }


        return $this;
    } // setweatherurl()

    /**
     * Set the value of [open] column.
     *
     * @param  int $v new value
     * @return SkiCenter The current object (for fluent API support)
     */
    public function setopen($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->open !== $v) {
            $this->open = $v;
            $this->modifiedColumns[] = SkiCenterPeer::OPEN;
        }


        return $this;
    } // setopen()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->englishname = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->snow_down = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->snow_up = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->temp = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
            $this->website = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->weatherurl = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->open = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 9; // 9 = SkiCenterPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating SkiCenter object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(SkiCenterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SkiCenterPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collTracks = null;

            $this->collLifts = null;

            $this->collOffers = null;

            $this->collCameras = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(SkiCenterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SkiCenterQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(SkiCenterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                SkiCenterPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->tracksScheduledForDeletion !== null) {
                if (!$this->tracksScheduledForDeletion->isEmpty()) {
                    TrackQuery::create()
                        ->filterByPrimaryKeys($this->tracksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tracksScheduledForDeletion = null;
                }
            }

            if ($this->collTracks !== null) {
                foreach ($this->collTracks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->liftsScheduledForDeletion !== null) {
                if (!$this->liftsScheduledForDeletion->isEmpty()) {
                    LiftQuery::create()
                        ->filterByPrimaryKeys($this->liftsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->liftsScheduledForDeletion = null;
                }
            }

            if ($this->collLifts !== null) {
                foreach ($this->collLifts as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->offersScheduledForDeletion !== null) {
                if (!$this->offersScheduledForDeletion->isEmpty()) {
                    OfferQuery::create()
                        ->filterByPrimaryKeys($this->offersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->offersScheduledForDeletion = null;
                }
            }

            if ($this->collOffers !== null) {
                foreach ($this->collOffers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->camerasScheduledForDeletion !== null) {
                if (!$this->camerasScheduledForDeletion->isEmpty()) {
                    CameraQuery::create()
                        ->filterByPrimaryKeys($this->camerasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->camerasScheduledForDeletion = null;
                }
            }

            if ($this->collCameras !== null) {
                foreach ($this->collCameras as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = SkiCenterPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SkiCenterPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SkiCenterPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(SkiCenterPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(SkiCenterPeer::ENGLISHNAME)) {
            $modifiedColumns[':p' . $index++]  = '`englishName`';
        }
        if ($this->isColumnModified(SkiCenterPeer::SNOW_DOWN)) {
            $modifiedColumns[':p' . $index++]  = '`snow_down`';
        }
        if ($this->isColumnModified(SkiCenterPeer::SNOW_UP)) {
            $modifiedColumns[':p' . $index++]  = '`snow_up`';
        }
        if ($this->isColumnModified(SkiCenterPeer::TEMP)) {
            $modifiedColumns[':p' . $index++]  = '`temp`';
        }
        if ($this->isColumnModified(SkiCenterPeer::WEBSITE)) {
            $modifiedColumns[':p' . $index++]  = '`website`';
        }
        if ($this->isColumnModified(SkiCenterPeer::WEATHERURL)) {
            $modifiedColumns[':p' . $index++]  = '`weatherurl`';
        }
        if ($this->isColumnModified(SkiCenterPeer::OPEN)) {
            $modifiedColumns[':p' . $index++]  = '`open`';
        }

        $sql = sprintf(
            'INSERT INTO `skicenter` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`englishName`':
                        $stmt->bindValue($identifier, $this->englishname, PDO::PARAM_STR);
                        break;
                    case '`snow_down`':
                        $stmt->bindValue($identifier, $this->snow_down, PDO::PARAM_INT);
                        break;
                    case '`snow_up`':
                        $stmt->bindValue($identifier, $this->snow_up, PDO::PARAM_INT);
                        break;
                    case '`temp`':
                        $stmt->bindValue($identifier, $this->temp, PDO::PARAM_STR);
                        break;
                    case '`website`':
                        $stmt->bindValue($identifier, $this->website, PDO::PARAM_STR);
                        break;
                    case '`weatherurl`':
                        $stmt->bindValue($identifier, $this->weatherurl, PDO::PARAM_STR);
                        break;
                    case '`open`':
                        $stmt->bindValue($identifier, $this->open, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setid($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = SkiCenterPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collTracks !== null) {
                    foreach ($this->collTracks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collLifts !== null) {
                    foreach ($this->collLifts as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collOffers !== null) {
                    foreach ($this->collOffers as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collCameras !== null) {
                    foreach ($this->collCameras as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = SkiCenterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getid();
                break;
            case 1:
                return $this->getname();
                break;
            case 2:
                return $this->getenglishName();
                break;
            case 3:
                return $this->getsnow_down();
                break;
            case 4:
                return $this->getsnow_up();
                break;
            case 5:
                return $this->gettemp();
                break;
            case 6:
                return $this->getwebsite();
                break;
            case 7:
                return $this->getweatherurl();
                break;
            case 8:
                return $this->getopen();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['SkiCenter'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SkiCenter'][$this->getPrimaryKey()] = true;
        $keys = SkiCenterPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getid(),
            $keys[1] => $this->getname(),
            $keys[2] => $this->getenglishName(),
            $keys[3] => $this->getsnow_down(),
            $keys[4] => $this->getsnow_up(),
            $keys[5] => $this->gettemp(),
            $keys[6] => $this->getwebsite(),
            $keys[7] => $this->getweatherurl(),
            $keys[8] => $this->getopen(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collTracks) {
                $result['Tracks'] = $this->collTracks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collLifts) {
                $result['Lifts'] = $this->collLifts->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collOffers) {
                $result['Offers'] = $this->collOffers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collCameras) {
                $result['Cameras'] = $this->collCameras->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = SkiCenterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setid($value);
                break;
            case 1:
                $this->setname($value);
                break;
            case 2:
                $this->setenglishName($value);
                break;
            case 3:
                $this->setsnow_down($value);
                break;
            case 4:
                $this->setsnow_up($value);
                break;
            case 5:
                $this->settemp($value);
                break;
            case 6:
                $this->setwebsite($value);
                break;
            case 7:
                $this->setweatherurl($value);
                break;
            case 8:
                $this->setopen($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = SkiCenterPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setid($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setname($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setenglishName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setsnow_down($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setsnow_up($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->settemp($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setwebsite($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setweatherurl($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setopen($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SkiCenterPeer::DATABASE_NAME);

        if ($this->isColumnModified(SkiCenterPeer::ID)) $criteria->add(SkiCenterPeer::ID, $this->id);
        if ($this->isColumnModified(SkiCenterPeer::NAME)) $criteria->add(SkiCenterPeer::NAME, $this->name);
        if ($this->isColumnModified(SkiCenterPeer::ENGLISHNAME)) $criteria->add(SkiCenterPeer::ENGLISHNAME, $this->englishname);
        if ($this->isColumnModified(SkiCenterPeer::SNOW_DOWN)) $criteria->add(SkiCenterPeer::SNOW_DOWN, $this->snow_down);
        if ($this->isColumnModified(SkiCenterPeer::SNOW_UP)) $criteria->add(SkiCenterPeer::SNOW_UP, $this->snow_up);
        if ($this->isColumnModified(SkiCenterPeer::TEMP)) $criteria->add(SkiCenterPeer::TEMP, $this->temp);
        if ($this->isColumnModified(SkiCenterPeer::WEBSITE)) $criteria->add(SkiCenterPeer::WEBSITE, $this->website);
        if ($this->isColumnModified(SkiCenterPeer::WEATHERURL)) $criteria->add(SkiCenterPeer::WEATHERURL, $this->weatherurl);
        if ($this->isColumnModified(SkiCenterPeer::OPEN)) $criteria->add(SkiCenterPeer::OPEN, $this->open);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(SkiCenterPeer::DATABASE_NAME);
        $criteria->add(SkiCenterPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getid();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setid($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getid();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of SkiCenter (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setname($this->getname());
        $copyObj->setenglishName($this->getenglishName());
        $copyObj->setsnow_down($this->getsnow_down());
        $copyObj->setsnow_up($this->getsnow_up());
        $copyObj->settemp($this->gettemp());
        $copyObj->setwebsite($this->getwebsite());
        $copyObj->setweatherurl($this->getweatherurl());
        $copyObj->setopen($this->getopen());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getTracks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTrack($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getLifts() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addLift($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getOffers() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addOffer($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getCameras() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addCamera($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setid(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return SkiCenter Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return SkiCenterPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SkiCenterPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Track' == $relationName) {
            $this->initTracks();
        }
        if ('Lift' == $relationName) {
            $this->initLifts();
        }
        if ('Offer' == $relationName) {
            $this->initOffers();
        }
        if ('Camera' == $relationName) {
            $this->initCameras();
        }
    }

    /**
     * Clears out the collTracks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SkiCenter The current object (for fluent API support)
     * @see        addTracks()
     */
    public function clearTracks()
    {
        $this->collTracks = null; // important to set this to null since that means it is uninitialized
        $this->collTracksPartial = null;

        return $this;
    }

    /**
     * reset is the collTracks collection loaded partially
     *
     * @return void
     */
    public function resetPartialTracks($v = true)
    {
        $this->collTracksPartial = $v;
    }

    /**
     * Initializes the collTracks collection.
     *
     * By default this just sets the collTracks collection to an empty array (like clearcollTracks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTracks($overrideExisting = true)
    {
        if (null !== $this->collTracks && !$overrideExisting) {
            return;
        }
        $this->collTracks = new PropelObjectCollection();
        $this->collTracks->setModel('Track');
    }

    /**
     * Gets an array of Track objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SkiCenter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Track[] List of Track objects
     * @throws PropelException
     */
    public function getTracks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTracksPartial && !$this->isNew();
        if (null === $this->collTracks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTracks) {
                // return empty collection
                $this->initTracks();
            } else {
                $collTracks = TrackQuery::create(null, $criteria)
                    ->filterBySkiCenter($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTracksPartial && count($collTracks)) {
                      $this->initTracks(false);

                      foreach ($collTracks as $obj) {
                        if (false == $this->collTracks->contains($obj)) {
                          $this->collTracks->append($obj);
                        }
                      }

                      $this->collTracksPartial = true;
                    }

                    $collTracks->getInternalIterator()->rewind();

                    return $collTracks;
                }

                if ($partial && $this->collTracks) {
                    foreach ($this->collTracks as $obj) {
                        if ($obj->isNew()) {
                            $collTracks[] = $obj;
                        }
                    }
                }

                $this->collTracks = $collTracks;
                $this->collTracksPartial = false;
            }
        }

        return $this->collTracks;
    }

    /**
     * Sets a collection of Track objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tracks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SkiCenter The current object (for fluent API support)
     */
    public function setTracks(PropelCollection $tracks, PropelPDO $con = null)
    {
        $tracksToDelete = $this->getTracks(new Criteria(), $con)->diff($tracks);


        $this->tracksScheduledForDeletion = $tracksToDelete;

        foreach ($tracksToDelete as $trackRemoved) {
            $trackRemoved->setSkiCenter(null);
        }

        $this->collTracks = null;
        foreach ($tracks as $track) {
            $this->addTrack($track);
        }

        $this->collTracks = $tracks;
        $this->collTracksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Track objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Track objects.
     * @throws PropelException
     */
    public function countTracks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTracksPartial && !$this->isNew();
        if (null === $this->collTracks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTracks) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getTracks());
            }
            $query = TrackQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySkiCenter($this)
                ->count($con);
        }

        return count($this->collTracks);
    }

    /**
     * Method called to associate a Track object to this object
     * through the Track foreign key attribute.
     *
     * @param    Track $l Track
     * @return SkiCenter The current object (for fluent API support)
     */
    public function addTrack(Track $l)
    {
        if ($this->collTracks === null) {
            $this->initTracks();
            $this->collTracksPartial = true;
        }

        if (!in_array($l, $this->collTracks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTrack($l);

            if ($this->tracksScheduledForDeletion and $this->tracksScheduledForDeletion->contains($l)) {
                $this->tracksScheduledForDeletion->remove($this->tracksScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Track $track The track object to add.
     */
    protected function doAddTrack($track)
    {
        $this->collTracks[]= $track;
        $track->setSkiCenter($this);
    }

    /**
     * @param	Track $track The track object to remove.
     * @return SkiCenter The current object (for fluent API support)
     */
    public function removeTrack($track)
    {
        if ($this->getTracks()->contains($track)) {
            $this->collTracks->remove($this->collTracks->search($track));
            if (null === $this->tracksScheduledForDeletion) {
                $this->tracksScheduledForDeletion = clone $this->collTracks;
                $this->tracksScheduledForDeletion->clear();
            }
            $this->tracksScheduledForDeletion[]= clone $track;
            $track->setSkiCenter(null);
        }

        return $this;
    }

    /**
     * Clears out the collLifts collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SkiCenter The current object (for fluent API support)
     * @see        addLifts()
     */
    public function clearLifts()
    {
        $this->collLifts = null; // important to set this to null since that means it is uninitialized
        $this->collLiftsPartial = null;

        return $this;
    }

    /**
     * reset is the collLifts collection loaded partially
     *
     * @return void
     */
    public function resetPartialLifts($v = true)
    {
        $this->collLiftsPartial = $v;
    }

    /**
     * Initializes the collLifts collection.
     *
     * By default this just sets the collLifts collection to an empty array (like clearcollLifts());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initLifts($overrideExisting = true)
    {
        if (null !== $this->collLifts && !$overrideExisting) {
            return;
        }
        $this->collLifts = new PropelObjectCollection();
        $this->collLifts->setModel('Lift');
    }

    /**
     * Gets an array of Lift objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SkiCenter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Lift[] List of Lift objects
     * @throws PropelException
     */
    public function getLifts($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collLiftsPartial && !$this->isNew();
        if (null === $this->collLifts || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collLifts) {
                // return empty collection
                $this->initLifts();
            } else {
                $collLifts = LiftQuery::create(null, $criteria)
                    ->filterBySkiCenter($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collLiftsPartial && count($collLifts)) {
                      $this->initLifts(false);

                      foreach ($collLifts as $obj) {
                        if (false == $this->collLifts->contains($obj)) {
                          $this->collLifts->append($obj);
                        }
                      }

                      $this->collLiftsPartial = true;
                    }

                    $collLifts->getInternalIterator()->rewind();

                    return $collLifts;
                }

                if ($partial && $this->collLifts) {
                    foreach ($this->collLifts as $obj) {
                        if ($obj->isNew()) {
                            $collLifts[] = $obj;
                        }
                    }
                }

                $this->collLifts = $collLifts;
                $this->collLiftsPartial = false;
            }
        }

        return $this->collLifts;
    }

    /**
     * Sets a collection of Lift objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $lifts A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SkiCenter The current object (for fluent API support)
     */
    public function setLifts(PropelCollection $lifts, PropelPDO $con = null)
    {
        $liftsToDelete = $this->getLifts(new Criteria(), $con)->diff($lifts);


        $this->liftsScheduledForDeletion = $liftsToDelete;

        foreach ($liftsToDelete as $liftRemoved) {
            $liftRemoved->setSkiCenter(null);
        }

        $this->collLifts = null;
        foreach ($lifts as $lift) {
            $this->addLift($lift);
        }

        $this->collLifts = $lifts;
        $this->collLiftsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Lift objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Lift objects.
     * @throws PropelException
     */
    public function countLifts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collLiftsPartial && !$this->isNew();
        if (null === $this->collLifts || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collLifts) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getLifts());
            }
            $query = LiftQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySkiCenter($this)
                ->count($con);
        }

        return count($this->collLifts);
    }

    /**
     * Method called to associate a Lift object to this object
     * through the Lift foreign key attribute.
     *
     * @param    Lift $l Lift
     * @return SkiCenter The current object (for fluent API support)
     */
    public function addLift(Lift $l)
    {
        if ($this->collLifts === null) {
            $this->initLifts();
            $this->collLiftsPartial = true;
        }

        if (!in_array($l, $this->collLifts->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddLift($l);

            if ($this->liftsScheduledForDeletion and $this->liftsScheduledForDeletion->contains($l)) {
                $this->liftsScheduledForDeletion->remove($this->liftsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Lift $lift The lift object to add.
     */
    protected function doAddLift($lift)
    {
        $this->collLifts[]= $lift;
        $lift->setSkiCenter($this);
    }

    /**
     * @param	Lift $lift The lift object to remove.
     * @return SkiCenter The current object (for fluent API support)
     */
    public function removeLift($lift)
    {
        if ($this->getLifts()->contains($lift)) {
            $this->collLifts->remove($this->collLifts->search($lift));
            if (null === $this->liftsScheduledForDeletion) {
                $this->liftsScheduledForDeletion = clone $this->collLifts;
                $this->liftsScheduledForDeletion->clear();
            }
            $this->liftsScheduledForDeletion[]= clone $lift;
            $lift->setSkiCenter(null);
        }

        return $this;
    }

    /**
     * Clears out the collOffers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SkiCenter The current object (for fluent API support)
     * @see        addOffers()
     */
    public function clearOffers()
    {
        $this->collOffers = null; // important to set this to null since that means it is uninitialized
        $this->collOffersPartial = null;

        return $this;
    }

    /**
     * reset is the collOffers collection loaded partially
     *
     * @return void
     */
    public function resetPartialOffers($v = true)
    {
        $this->collOffersPartial = $v;
    }

    /**
     * Initializes the collOffers collection.
     *
     * By default this just sets the collOffers collection to an empty array (like clearcollOffers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initOffers($overrideExisting = true)
    {
        if (null !== $this->collOffers && !$overrideExisting) {
            return;
        }
        $this->collOffers = new PropelObjectCollection();
        $this->collOffers->setModel('Offer');
    }

    /**
     * Gets an array of Offer objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SkiCenter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Offer[] List of Offer objects
     * @throws PropelException
     */
    public function getOffers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collOffersPartial && !$this->isNew();
        if (null === $this->collOffers || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collOffers) {
                // return empty collection
                $this->initOffers();
            } else {
                $collOffers = OfferQuery::create(null, $criteria)
                    ->filterBySkiCenter($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collOffersPartial && count($collOffers)) {
                      $this->initOffers(false);

                      foreach ($collOffers as $obj) {
                        if (false == $this->collOffers->contains($obj)) {
                          $this->collOffers->append($obj);
                        }
                      }

                      $this->collOffersPartial = true;
                    }

                    $collOffers->getInternalIterator()->rewind();

                    return $collOffers;
                }

                if ($partial && $this->collOffers) {
                    foreach ($this->collOffers as $obj) {
                        if ($obj->isNew()) {
                            $collOffers[] = $obj;
                        }
                    }
                }

                $this->collOffers = $collOffers;
                $this->collOffersPartial = false;
            }
        }

        return $this->collOffers;
    }

    /**
     * Sets a collection of Offer objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $offers A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SkiCenter The current object (for fluent API support)
     */
    public function setOffers(PropelCollection $offers, PropelPDO $con = null)
    {
        $offersToDelete = $this->getOffers(new Criteria(), $con)->diff($offers);


        $this->offersScheduledForDeletion = $offersToDelete;

        foreach ($offersToDelete as $offerRemoved) {
            $offerRemoved->setSkiCenter(null);
        }

        $this->collOffers = null;
        foreach ($offers as $offer) {
            $this->addOffer($offer);
        }

        $this->collOffers = $offers;
        $this->collOffersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Offer objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Offer objects.
     * @throws PropelException
     */
    public function countOffers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collOffersPartial && !$this->isNew();
        if (null === $this->collOffers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collOffers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getOffers());
            }
            $query = OfferQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySkiCenter($this)
                ->count($con);
        }

        return count($this->collOffers);
    }

    /**
     * Method called to associate a Offer object to this object
     * through the Offer foreign key attribute.
     *
     * @param    Offer $l Offer
     * @return SkiCenter The current object (for fluent API support)
     */
    public function addOffer(Offer $l)
    {
        if ($this->collOffers === null) {
            $this->initOffers();
            $this->collOffersPartial = true;
        }

        if (!in_array($l, $this->collOffers->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddOffer($l);

            if ($this->offersScheduledForDeletion and $this->offersScheduledForDeletion->contains($l)) {
                $this->offersScheduledForDeletion->remove($this->offersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Offer $offer The offer object to add.
     */
    protected function doAddOffer($offer)
    {
        $this->collOffers[]= $offer;
        $offer->setSkiCenter($this);
    }

    /**
     * @param	Offer $offer The offer object to remove.
     * @return SkiCenter The current object (for fluent API support)
     */
    public function removeOffer($offer)
    {
        if ($this->getOffers()->contains($offer)) {
            $this->collOffers->remove($this->collOffers->search($offer));
            if (null === $this->offersScheduledForDeletion) {
                $this->offersScheduledForDeletion = clone $this->collOffers;
                $this->offersScheduledForDeletion->clear();
            }
            $this->offersScheduledForDeletion[]= clone $offer;
            $offer->setSkiCenter(null);
        }

        return $this;
    }

    /**
     * Clears out the collCameras collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SkiCenter The current object (for fluent API support)
     * @see        addCameras()
     */
    public function clearCameras()
    {
        $this->collCameras = null; // important to set this to null since that means it is uninitialized
        $this->collCamerasPartial = null;

        return $this;
    }

    /**
     * reset is the collCameras collection loaded partially
     *
     * @return void
     */
    public function resetPartialCameras($v = true)
    {
        $this->collCamerasPartial = $v;
    }

    /**
     * Initializes the collCameras collection.
     *
     * By default this just sets the collCameras collection to an empty array (like clearcollCameras());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initCameras($overrideExisting = true)
    {
        if (null !== $this->collCameras && !$overrideExisting) {
            return;
        }
        $this->collCameras = new PropelObjectCollection();
        $this->collCameras->setModel('Camera');
    }

    /**
     * Gets an array of Camera objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SkiCenter is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Camera[] List of Camera objects
     * @throws PropelException
     */
    public function getCameras($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collCamerasPartial && !$this->isNew();
        if (null === $this->collCameras || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collCameras) {
                // return empty collection
                $this->initCameras();
            } else {
                $collCameras = CameraQuery::create(null, $criteria)
                    ->filterBySkiCenter($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collCamerasPartial && count($collCameras)) {
                      $this->initCameras(false);

                      foreach ($collCameras as $obj) {
                        if (false == $this->collCameras->contains($obj)) {
                          $this->collCameras->append($obj);
                        }
                      }

                      $this->collCamerasPartial = true;
                    }

                    $collCameras->getInternalIterator()->rewind();

                    return $collCameras;
                }

                if ($partial && $this->collCameras) {
                    foreach ($this->collCameras as $obj) {
                        if ($obj->isNew()) {
                            $collCameras[] = $obj;
                        }
                    }
                }

                $this->collCameras = $collCameras;
                $this->collCamerasPartial = false;
            }
        }

        return $this->collCameras;
    }

    /**
     * Sets a collection of Camera objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $cameras A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SkiCenter The current object (for fluent API support)
     */
    public function setCameras(PropelCollection $cameras, PropelPDO $con = null)
    {
        $camerasToDelete = $this->getCameras(new Criteria(), $con)->diff($cameras);


        $this->camerasScheduledForDeletion = $camerasToDelete;

        foreach ($camerasToDelete as $cameraRemoved) {
            $cameraRemoved->setSkiCenter(null);
        }

        $this->collCameras = null;
        foreach ($cameras as $camera) {
            $this->addCamera($camera);
        }

        $this->collCameras = $cameras;
        $this->collCamerasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Camera objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Camera objects.
     * @throws PropelException
     */
    public function countCameras(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collCamerasPartial && !$this->isNew();
        if (null === $this->collCameras || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collCameras) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getCameras());
            }
            $query = CameraQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySkiCenter($this)
                ->count($con);
        }

        return count($this->collCameras);
    }

    /**
     * Method called to associate a Camera object to this object
     * through the Camera foreign key attribute.
     *
     * @param    Camera $l Camera
     * @return SkiCenter The current object (for fluent API support)
     */
    public function addCamera(Camera $l)
    {
        if ($this->collCameras === null) {
            $this->initCameras();
            $this->collCamerasPartial = true;
        }

        if (!in_array($l, $this->collCameras->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddCamera($l);

            if ($this->camerasScheduledForDeletion and $this->camerasScheduledForDeletion->contains($l)) {
                $this->camerasScheduledForDeletion->remove($this->camerasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Camera $camera The camera object to add.
     */
    protected function doAddCamera($camera)
    {
        $this->collCameras[]= $camera;
        $camera->setSkiCenter($this);
    }

    /**
     * @param	Camera $camera The camera object to remove.
     * @return SkiCenter The current object (for fluent API support)
     */
    public function removeCamera($camera)
    {
        if ($this->getCameras()->contains($camera)) {
            $this->collCameras->remove($this->collCameras->search($camera));
            if (null === $this->camerasScheduledForDeletion) {
                $this->camerasScheduledForDeletion = clone $this->collCameras;
                $this->camerasScheduledForDeletion->clear();
            }
            $this->camerasScheduledForDeletion[]= clone $camera;
            $camera->setSkiCenter(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
        $this->englishname = null;
        $this->snow_down = null;
        $this->snow_up = null;
        $this->temp = null;
        $this->website = null;
        $this->weatherurl = null;
        $this->open = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collTracks) {
                foreach ($this->collTracks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collLifts) {
                foreach ($this->collLifts as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collOffers) {
                foreach ($this->collOffers as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collCameras) {
                foreach ($this->collCameras as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collTracks instanceof PropelCollection) {
            $this->collTracks->clearIterator();
        }
        $this->collTracks = null;
        if ($this->collLifts instanceof PropelCollection) {
            $this->collLifts->clearIterator();
        }
        $this->collLifts = null;
        if ($this->collOffers instanceof PropelCollection) {
            $this->collOffers->clearIterator();
        }
        $this->collOffers = null;
        if ($this->collCameras instanceof PropelCollection) {
            $this->collCameras->clearIterator();
        }
        $this->collCameras = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SkiCenterPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
