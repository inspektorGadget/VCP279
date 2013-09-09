<?php


/**
 * Base class that represents a row from the 'rentals' table.
 *
 * 
 *
 * @package    propel.generator.VCP279.om
 */
abstract class BaseRentals extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'RentalsPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RentalsPeer
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
     * The value for the student field.
     * @var        int
     */
    protected $student;

    /**
     * The value for the faculty field.
     * @var        int
     */
    protected $faculty;

    /**
     * The value for the item field.
     * @var        int
     */
    protected $item;

    /**
     * The value for the out_date field.
     * @var        string
     */
    protected $out_date;

    /**
     * The value for the due_date field.
     * @var        string
     */
    protected $due_date;

    /**
     * The value for the status field.
     * @var        string
     */
    protected $status;

    /**
     * The value for the comments field.
     * @var        string
     */
    protected $comments;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByStudent;

    /**
     * @var        Person
     */
    protected $aPersonRelatedByFaculty;

    /**
     * @var        Equipment
     */
    protected $aEquipment;

    /**
     * @var        rentalStatus
     */
    protected $arentalStatus;

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
     * Get the [id] column value.
     * 
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [student] column value.
     * 
     * @return int
     */
    public function getStudent()
    {

        return $this->student;
    }

    /**
     * Get the [faculty] column value.
     * 
     * @return int
     */
    public function getFaculty()
    {

        return $this->faculty;
    }

    /**
     * Get the [item] column value.
     * 
     * @return int
     */
    public function getItem()
    {

        return $this->item;
    }

    /**
     * Get the [optionally formatted] temporal [out_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getOutDate($format = '%x')
    {
        if ($this->out_date === null) {
            return null;
        }

        if ($this->out_date === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->out_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->out_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [due_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDueDate($format = '%x')
    {
        if ($this->due_date === null) {
            return null;
        }

        if ($this->due_date === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->due_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->due_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [status] column value.
     * 
     * @return string
     */
    public function getStatus()
    {

        return $this->status;
    }

    /**
     * Get the [comments] column value.
     * 
     * @return string
     */
    public function getComments()
    {

        return $this->comments;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param  int $v new value
     * @return Rentals The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = RentalsPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [student] column.
     * 
     * @param  int $v new value
     * @return Rentals The current object (for fluent API support)
     */
    public function setStudent($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->student !== $v) {
            $this->student = $v;
            $this->modifiedColumns[] = RentalsPeer::STUDENT;
        }

        if ($this->aPersonRelatedByStudent !== null && $this->aPersonRelatedByStudent->getId() !== $v) {
            $this->aPersonRelatedByStudent = null;
        }


        return $this;
    } // setStudent()

    /**
     * Set the value of [faculty] column.
     * 
     * @param  int $v new value
     * @return Rentals The current object (for fluent API support)
     */
    public function setFaculty($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->faculty !== $v) {
            $this->faculty = $v;
            $this->modifiedColumns[] = RentalsPeer::FACULTY;
        }

        if ($this->aPersonRelatedByFaculty !== null && $this->aPersonRelatedByFaculty->getId() !== $v) {
            $this->aPersonRelatedByFaculty = null;
        }


        return $this;
    } // setFaculty()

    /**
     * Set the value of [item] column.
     * 
     * @param  int $v new value
     * @return Rentals The current object (for fluent API support)
     */
    public function setItem($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->item !== $v) {
            $this->item = $v;
            $this->modifiedColumns[] = RentalsPeer::ITEM;
        }

        if ($this->aEquipment !== null && $this->aEquipment->getId() !== $v) {
            $this->aEquipment = null;
        }


        return $this;
    } // setItem()

    /**
     * Sets the value of [out_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Rentals The current object (for fluent API support)
     */
    public function setOutDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->out_date !== null || $dt !== null) {
            $currentDateAsString = ($this->out_date !== null && $tmpDt = new DateTime($this->out_date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->out_date = $newDateAsString;
                $this->modifiedColumns[] = RentalsPeer::OUT_DATE;
            }
        } // if either are not null


        return $this;
    } // setOutDate()

    /**
     * Sets the value of [due_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Rentals The current object (for fluent API support)
     */
    public function setDueDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->due_date !== null || $dt !== null) {
            $currentDateAsString = ($this->due_date !== null && $tmpDt = new DateTime($this->due_date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->due_date = $newDateAsString;
                $this->modifiedColumns[] = RentalsPeer::DUE_DATE;
            }
        } // if either are not null


        return $this;
    } // setDueDate()

    /**
     * Set the value of [status] column.
     * 
     * @param  string $v new value
     * @return Rentals The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[] = RentalsPeer::STATUS;
        }

        if ($this->arentalStatus !== null && $this->arentalStatus->getStatus() !== $v) {
            $this->arentalStatus = null;
        }


        return $this;
    } // setStatus()

    /**
     * Set the value of [comments] column.
     * 
     * @param  string $v new value
     * @return Rentals The current object (for fluent API support)
     */
    public function setComments($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->comments !== $v) {
            $this->comments = $v;
            $this->modifiedColumns[] = RentalsPeer::COMMENTS;
        }


        return $this;
    } // setComments()

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
            $this->student = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->faculty = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->item = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->out_date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->due_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->status = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->comments = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 8; // 8 = RentalsPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Rentals object", $e);
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

        if ($this->aPersonRelatedByStudent !== null && $this->student !== $this->aPersonRelatedByStudent->getId()) {
            $this->aPersonRelatedByStudent = null;
        }
        if ($this->aPersonRelatedByFaculty !== null && $this->faculty !== $this->aPersonRelatedByFaculty->getId()) {
            $this->aPersonRelatedByFaculty = null;
        }
        if ($this->aEquipment !== null && $this->item !== $this->aEquipment->getId()) {
            $this->aEquipment = null;
        }
        if ($this->arentalStatus !== null && $this->status !== $this->arentalStatus->getStatus()) {
            $this->arentalStatus = null;
        }
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
            $con = Propel::getConnection(RentalsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RentalsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPersonRelatedByStudent = null;
            $this->aPersonRelatedByFaculty = null;
            $this->aEquipment = null;
            $this->arentalStatus = null;
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
            $con = Propel::getConnection(RentalsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RentalsQuery::create()
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
            $con = Propel::getConnection(RentalsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RentalsPeer::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPersonRelatedByStudent !== null) {
                if ($this->aPersonRelatedByStudent->isModified() || $this->aPersonRelatedByStudent->isNew()) {
                    $affectedRows += $this->aPersonRelatedByStudent->save($con);
                }
                $this->setPersonRelatedByStudent($this->aPersonRelatedByStudent);
            }

            if ($this->aPersonRelatedByFaculty !== null) {
                if ($this->aPersonRelatedByFaculty->isModified() || $this->aPersonRelatedByFaculty->isNew()) {
                    $affectedRows += $this->aPersonRelatedByFaculty->save($con);
                }
                $this->setPersonRelatedByFaculty($this->aPersonRelatedByFaculty);
            }

            if ($this->aEquipment !== null) {
                if ($this->aEquipment->isModified() || $this->aEquipment->isNew()) {
                    $affectedRows += $this->aEquipment->save($con);
                }
                $this->setEquipment($this->aEquipment);
            }

            if ($this->arentalStatus !== null) {
                if ($this->arentalStatus->isModified() || $this->arentalStatus->isNew()) {
                    $affectedRows += $this->arentalStatus->save($con);
                }
                $this->setrentalStatus($this->arentalStatus);
            }

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

        $this->modifiedColumns[] = RentalsPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . RentalsPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(RentalsPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(RentalsPeer::STUDENT)) {
            $modifiedColumns[':p' . $index++]  = '`student`';
        }
        if ($this->isColumnModified(RentalsPeer::FACULTY)) {
            $modifiedColumns[':p' . $index++]  = '`faculty`';
        }
        if ($this->isColumnModified(RentalsPeer::ITEM)) {
            $modifiedColumns[':p' . $index++]  = '`item`';
        }
        if ($this->isColumnModified(RentalsPeer::OUT_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`out_date`';
        }
        if ($this->isColumnModified(RentalsPeer::DUE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`due_date`';
        }
        if ($this->isColumnModified(RentalsPeer::STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`status`';
        }
        if ($this->isColumnModified(RentalsPeer::COMMENTS)) {
            $modifiedColumns[':p' . $index++]  = '`comments`';
        }

        $sql = sprintf(
            'INSERT INTO `rentals` (%s) VALUES (%s)',
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
                    case '`student`':						
                        $stmt->bindValue($identifier, $this->student, PDO::PARAM_INT);
                        break;
                    case '`faculty`':						
                        $stmt->bindValue($identifier, $this->faculty, PDO::PARAM_INT);
                        break;
                    case '`item`':						
                        $stmt->bindValue($identifier, $this->item, PDO::PARAM_INT);
                        break;
                    case '`out_date`':						
                        $stmt->bindValue($identifier, $this->out_date, PDO::PARAM_STR);
                        break;
                    case '`due_date`':						
                        $stmt->bindValue($identifier, $this->due_date, PDO::PARAM_STR);
                        break;
                    case '`status`':						
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case '`comments`':						
                        $stmt->bindValue($identifier, $this->comments, PDO::PARAM_STR);
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
        $this->setId($pk);

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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPersonRelatedByStudent !== null) {
                if (!$this->aPersonRelatedByStudent->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByStudent->getValidationFailures());
                }
            }

            if ($this->aPersonRelatedByFaculty !== null) {
                if (!$this->aPersonRelatedByFaculty->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPersonRelatedByFaculty->getValidationFailures());
                }
            }

            if ($this->aEquipment !== null) {
                if (!$this->aEquipment->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aEquipment->getValidationFailures());
                }
            }

            if ($this->arentalStatus !== null) {
                if (!$this->arentalStatus->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->arentalStatus->getValidationFailures());
                }
            }


            if (($retval = RentalsPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = RentalsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getId();
                break;
            case 1:
                return $this->getStudent();
                break;
            case 2:
                return $this->getFaculty();
                break;
            case 3:
                return $this->getItem();
                break;
            case 4:
                return $this->getOutDate();
                break;
            case 5:
                return $this->getDueDate();
                break;
            case 6:
                return $this->getStatus();
                break;
            case 7:
                return $this->getComments();
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
        if (isset($alreadyDumpedObjects['Rentals'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Rentals'][$this->getPrimaryKey()] = true;
        $keys = RentalsPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getStudent(),
            $keys[2] => $this->getFaculty(),
            $keys[3] => $this->getItem(),
            $keys[4] => $this->getOutDate(),
            $keys[5] => $this->getDueDate(),
            $keys[6] => $this->getStatus(),
            $keys[7] => $this->getComments(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach($virtualColumns as $key => $virtualColumn)
        {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aPersonRelatedByStudent) {
                $result['PersonRelatedByStudent'] = $this->aPersonRelatedByStudent->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPersonRelatedByFaculty) {
                $result['PersonRelatedByFaculty'] = $this->aPersonRelatedByFaculty->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEquipment) {
                $result['Equipment'] = $this->aEquipment->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->arentalStatus) {
                $result['rentalStatus'] = $this->arentalStatus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = RentalsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setId($value);
                break;
            case 1:
                $this->setStudent($value);
                break;
            case 2:
                $this->setFaculty($value);
                break;
            case 3:
                $this->setItem($value);
                break;
            case 4:
                $this->setOutDate($value);
                break;
            case 5:
                $this->setDueDate($value);
                break;
            case 6:
                $this->setStatus($value);
                break;
            case 7:
                $this->setComments($value);
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
        $keys = RentalsPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setStudent($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setFaculty($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setItem($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setOutDate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDueDate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setComments($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RentalsPeer::DATABASE_NAME);

        if ($this->isColumnModified(RentalsPeer::ID)) $criteria->add(RentalsPeer::ID, $this->id);
        if ($this->isColumnModified(RentalsPeer::STUDENT)) $criteria->add(RentalsPeer::STUDENT, $this->student);
        if ($this->isColumnModified(RentalsPeer::FACULTY)) $criteria->add(RentalsPeer::FACULTY, $this->faculty);
        if ($this->isColumnModified(RentalsPeer::ITEM)) $criteria->add(RentalsPeer::ITEM, $this->item);
        if ($this->isColumnModified(RentalsPeer::OUT_DATE)) $criteria->add(RentalsPeer::OUT_DATE, $this->out_date);
        if ($this->isColumnModified(RentalsPeer::DUE_DATE)) $criteria->add(RentalsPeer::DUE_DATE, $this->due_date);
        if ($this->isColumnModified(RentalsPeer::STATUS)) $criteria->add(RentalsPeer::STATUS, $this->status);
        if ($this->isColumnModified(RentalsPeer::COMMENTS)) $criteria->add(RentalsPeer::COMMENTS, $this->comments);

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
        $criteria = new Criteria(RentalsPeer::DATABASE_NAME);
        $criteria->add(RentalsPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Rentals (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setStudent($this->getStudent());
        $copyObj->setFaculty($this->getFaculty());
        $copyObj->setItem($this->getItem());
        $copyObj->setOutDate($this->getOutDate());
        $copyObj->setDueDate($this->getDueDate());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setComments($this->getComments());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Rentals Clone of current object.
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
     * @return RentalsPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RentalsPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param                  Person $v
     * @return Rentals The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersonRelatedByStudent(Person $v = null)
    {
        if ($v === null) {
            $this->setStudent(NULL);
        } else {
            $this->setStudent($v->getId());
        }

        $this->aPersonRelatedByStudent = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addRentalsRelatedByStudent($this);
        }


        return $this;
    }


    /**
     * Get the associated Person object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Person The associated Person object.
     * @throws PropelException
     */
    public function getPersonRelatedByStudent(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPersonRelatedByStudent === null && ($this->student !== null) && $doQuery) {
            $this->aPersonRelatedByStudent = PersonQuery::create()->findPk($this->student, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersonRelatedByStudent->addRentalssRelatedByStudent($this);
             */
        }

        return $this->aPersonRelatedByStudent;
    }

    /**
     * Declares an association between this object and a Person object.
     *
     * @param                  Person $v
     * @return Rentals The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPersonRelatedByFaculty(Person $v = null)
    {
        if ($v === null) {
            $this->setFaculty(NULL);
        } else {
            $this->setFaculty($v->getId());
        }

        $this->aPersonRelatedByFaculty = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Person object, it will not be re-added.
        if ($v !== null) {
            $v->addRentalsRelatedByFaculty($this);
        }


        return $this;
    }


    /**
     * Get the associated Person object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Person The associated Person object.
     * @throws PropelException
     */
    public function getPersonRelatedByFaculty(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPersonRelatedByFaculty === null && ($this->faculty !== null) && $doQuery) {
            $this->aPersonRelatedByFaculty = PersonQuery::create()->findPk($this->faculty, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPersonRelatedByFaculty->addRentalssRelatedByFaculty($this);
             */
        }

        return $this->aPersonRelatedByFaculty;
    }

    /**
     * Declares an association between this object and a Equipment object.
     *
     * @param                  Equipment $v
     * @return Rentals The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEquipment(Equipment $v = null)
    {
        if ($v === null) {
            $this->setItem(NULL);
        } else {
            $this->setItem($v->getId());
        }

        $this->aEquipment = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Equipment object, it will not be re-added.
        if ($v !== null) {
            $v->addRentals($this);
        }


        return $this;
    }


    /**
     * Get the associated Equipment object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Equipment The associated Equipment object.
     * @throws PropelException
     */
    public function getEquipment(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aEquipment === null && ($this->item !== null) && $doQuery) {
            $this->aEquipment = EquipmentQuery::create()->findPk($this->item, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEquipment->addRentalss($this);
             */
        }

        return $this->aEquipment;
    }

    /**
     * Declares an association between this object and a rentalStatus object.
     *
     * @param                  rentalStatus $v
     * @return Rentals The current object (for fluent API support)
     * @throws PropelException
     */
    public function setrentalStatus(rentalStatus $v = null)
    {
        if ($v === null) {
            $this->setStatus(NULL);
        } else {
            $this->setStatus($v->getStatus());
        }

        $this->arentalStatus = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the rentalStatus object, it will not be re-added.
        if ($v !== null) {
            $v->addRentals($this);
        }


        return $this;
    }


    /**
     * Get the associated rentalStatus object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return rentalStatus The associated rentalStatus object.
     * @throws PropelException
     */
    public function getrentalStatus(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->arentalStatus === null && (($this->status !== "" && $this->status !== null)) && $doQuery) {
            $this->arentalStatus = rentalStatusQuery::create()
                ->filterByRentals($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->arentalStatus->addRentalss($this);
             */
        }

        return $this->arentalStatus;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->student = null;
        $this->faculty = null;
        $this->item = null;
        $this->out_date = null;
        $this->due_date = null;
        $this->status = null;
        $this->comments = null;
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
            if ($this->aPersonRelatedByStudent instanceof Persistent) {
              $this->aPersonRelatedByStudent->clearAllReferences($deep);
            }
            if ($this->aPersonRelatedByFaculty instanceof Persistent) {
              $this->aPersonRelatedByFaculty->clearAllReferences($deep);
            }
            if ($this->aEquipment instanceof Persistent) {
              $this->aEquipment->clearAllReferences($deep);
            }
            if ($this->arentalStatus instanceof Persistent) {
              $this->arentalStatus->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aPersonRelatedByStudent = null;
        $this->aPersonRelatedByFaculty = null;
        $this->aEquipment = null;
        $this->arentalStatus = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RentalsPeer::DEFAULT_STRING_FORMAT);
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
