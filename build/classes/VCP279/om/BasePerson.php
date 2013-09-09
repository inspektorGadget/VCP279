<?php


/**
 * Base class that represents a row from the 'person' table.
 *
 * 
 *
 * @package    propel.generator.VCP279.om
 */
abstract class BasePerson extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'PersonPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PersonPeer
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
     * The value for the first_name field.
     * @var        string
     */
    protected $first_name;

    /**
     * The value for the last_name field.
     * @var        string
     */
    protected $last_name;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the address_line_one field.
     * @var        string
     */
    protected $address_line_one;

    /**
     * The value for the address_line_two field.
     * @var        string
     */
    protected $address_line_two;

    /**
     * The value for the state field.
     * @var        string
     */
    protected $state;

    /**
     * The value for the zip field.
     * @var        int
     */
    protected $zip;

    /**
     * The value for the student_id field.
     * @var        string
     */
    protected $student_id;

    /**
     * The value for the user_type field.
     * @var        string
     */
    protected $user_type;

    /**
     * @var        UserTypes
     */
    protected $aUserTypes;

    /**
     * @var        PropelObjectCollection|Rentals[] Collection to store aggregation of Rentals objects.
     */
    protected $collRentalssRelatedByStudent;
    protected $collRentalssRelatedByStudentPartial;

    /**
     * @var        PropelObjectCollection|Rentals[] Collection to store aggregation of Rentals objects.
     */
    protected $collRentalssRelatedByFaculty;
    protected $collRentalssRelatedByFacultyPartial;

    /**
     * @var        PropelObjectCollection|Enrollment[] Collection to store aggregation of Enrollment objects.
     */
    protected $collEnrollments;
    protected $collEnrollmentsPartial;

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
    protected $rentalssRelatedByStudentScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rentalssRelatedByFacultyScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $enrollmentsScheduledForDeletion = null;

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
     * Get the [first_name] column value.
     * 
     * @return string
     */
    public function getFirstName()
    {

        return $this->first_name;
    }

    /**
     * Get the [last_name] column value.
     * 
     * @return string
     */
    public function getLastName()
    {

        return $this->last_name;
    }

    /**
     * Get the [email] column value.
     * 
     * @return string
     */
    public function getEmail()
    {

        return $this->email;
    }

    /**
     * Get the [address_line_one] column value.
     * 
     * @return string
     */
    public function getAddressLineOne()
    {

        return $this->address_line_one;
    }

    /**
     * Get the [address_line_two] column value.
     * 
     * @return string
     */
    public function getAddressLineTwo()
    {

        return $this->address_line_two;
    }

    /**
     * Get the [state] column value.
     * 
     * @return string
     */
    public function getState()
    {

        return $this->state;
    }

    /**
     * Get the [zip] column value.
     * 
     * @return int
     */
    public function getZip()
    {

        return $this->zip;
    }

    /**
     * Get the [student_id] column value.
     * 
     * @return string
     */
    public function getStudentId()
    {

        return $this->student_id;
    }

    /**
     * Get the [user_type] column value.
     * 
     * @return string
     */
    public function getUserType()
    {

        return $this->user_type;
    }

    /**
     * Set the value of [id] column.
     * 
     * @param  int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = PersonPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [first_name] column.
     * 
     * @param  string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[] = PersonPeer::FIRST_NAME;
        }


        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     * 
     * @param  string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[] = PersonPeer::LAST_NAME;
        }


        return $this;
    } // setLastName()

    /**
     * Set the value of [email] column.
     * 
     * @param  string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = PersonPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [address_line_one] column.
     * 
     * @param  string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setAddressLineOne($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address_line_one !== $v) {
            $this->address_line_one = $v;
            $this->modifiedColumns[] = PersonPeer::ADDRESS_LINE_ONE;
        }


        return $this;
    } // setAddressLineOne()

    /**
     * Set the value of [address_line_two] column.
     * 
     * @param  string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setAddressLineTwo($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address_line_two !== $v) {
            $this->address_line_two = $v;
            $this->modifiedColumns[] = PersonPeer::ADDRESS_LINE_TWO;
        }


        return $this;
    } // setAddressLineTwo()

    /**
     * Set the value of [state] column.
     * 
     * @param  string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setState($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->state !== $v) {
            $this->state = $v;
            $this->modifiedColumns[] = PersonPeer::STATE;
        }


        return $this;
    } // setState()

    /**
     * Set the value of [zip] column.
     * 
     * @param  int $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setZip($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->zip !== $v) {
            $this->zip = $v;
            $this->modifiedColumns[] = PersonPeer::ZIP;
        }


        return $this;
    } // setZip()

    /**
     * Set the value of [student_id] column.
     * 
     * @param  string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setStudentId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->student_id !== $v) {
            $this->student_id = $v;
            $this->modifiedColumns[] = PersonPeer::STUDENT_ID;
        }


        return $this;
    } // setStudentId()

    /**
     * Set the value of [user_type] column.
     * 
     * @param  string $v new value
     * @return Person The current object (for fluent API support)
     */
    public function setUserType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->user_type !== $v) {
            $this->user_type = $v;
            $this->modifiedColumns[] = PersonPeer::USER_TYPE;
        }

        if ($this->aUserTypes !== null && $this->aUserTypes->getUserCategory() !== $v) {
            $this->aUserTypes = null;
        }


        return $this;
    } // setUserType()

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
            $this->first_name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->last_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->email = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->address_line_one = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->address_line_two = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->state = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->zip = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->student_id = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->user_type = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 10; // 10 = PersonPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Person object", $e);
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

        if ($this->aUserTypes !== null && $this->user_type !== $this->aUserTypes->getUserCategory()) {
            $this->aUserTypes = null;
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
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PersonPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUserTypes = null;
            $this->collRentalssRelatedByStudent = null;

            $this->collRentalssRelatedByFaculty = null;

            $this->collEnrollments = null;

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
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PersonQuery::create()
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
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PersonPeer::addInstanceToPool($this);
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

            if ($this->aUserTypes !== null) {
                if ($this->aUserTypes->isModified() || $this->aUserTypes->isNew()) {
                    $affectedRows += $this->aUserTypes->save($con);
                }
                $this->setUserTypes($this->aUserTypes);
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

            if ($this->rentalssRelatedByStudentScheduledForDeletion !== null) {
                if (!$this->rentalssRelatedByStudentScheduledForDeletion->isEmpty()) {
                    RentalsQuery::create()
                        ->filterByPrimaryKeys($this->rentalssRelatedByStudentScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rentalssRelatedByStudentScheduledForDeletion = null;
                }
            }

            if ($this->collRentalssRelatedByStudent !== null) {
                foreach ($this->collRentalssRelatedByStudent as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rentalssRelatedByFacultyScheduledForDeletion !== null) {
                if (!$this->rentalssRelatedByFacultyScheduledForDeletion->isEmpty()) {
                    RentalsQuery::create()
                        ->filterByPrimaryKeys($this->rentalssRelatedByFacultyScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rentalssRelatedByFacultyScheduledForDeletion = null;
                }
            }

            if ($this->collRentalssRelatedByFaculty !== null) {
                foreach ($this->collRentalssRelatedByFaculty as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->enrollmentsScheduledForDeletion !== null) {
                if (!$this->enrollmentsScheduledForDeletion->isEmpty()) {
                    EnrollmentQuery::create()
                        ->filterByPrimaryKeys($this->enrollmentsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->enrollmentsScheduledForDeletion = null;
                }
            }

            if ($this->collEnrollments !== null) {
                foreach ($this->collEnrollments as $referrerFK) {
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

        $this->modifiedColumns[] = PersonPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PersonPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PersonPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(PersonPeer::FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`first_name`';
        }
        if ($this->isColumnModified(PersonPeer::LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`last_name`';
        }
        if ($this->isColumnModified(PersonPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(PersonPeer::ADDRESS_LINE_ONE)) {
            $modifiedColumns[':p' . $index++]  = '`address_line_one`';
        }
        if ($this->isColumnModified(PersonPeer::ADDRESS_LINE_TWO)) {
            $modifiedColumns[':p' . $index++]  = '`address_line_two`';
        }
        if ($this->isColumnModified(PersonPeer::STATE)) {
            $modifiedColumns[':p' . $index++]  = '`state`';
        }
        if ($this->isColumnModified(PersonPeer::ZIP)) {
            $modifiedColumns[':p' . $index++]  = '`zip`';
        }
        if ($this->isColumnModified(PersonPeer::STUDENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`student_id`';
        }
        if ($this->isColumnModified(PersonPeer::USER_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`user_type`';
        }

        $sql = sprintf(
            'INSERT INTO `person` (%s) VALUES (%s)',
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
                    case '`first_name`':						
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case '`last_name`':						
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case '`email`':						
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`address_line_one`':						
                        $stmt->bindValue($identifier, $this->address_line_one, PDO::PARAM_STR);
                        break;
                    case '`address_line_two`':						
                        $stmt->bindValue($identifier, $this->address_line_two, PDO::PARAM_STR);
                        break;
                    case '`state`':						
                        $stmt->bindValue($identifier, $this->state, PDO::PARAM_STR);
                        break;
                    case '`zip`':						
                        $stmt->bindValue($identifier, $this->zip, PDO::PARAM_INT);
                        break;
                    case '`student_id`':						
                        $stmt->bindValue($identifier, $this->student_id, PDO::PARAM_STR);
                        break;
                    case '`user_type`':						
                        $stmt->bindValue($identifier, $this->user_type, PDO::PARAM_STR);
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

            if ($this->aUserTypes !== null) {
                if (!$this->aUserTypes->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUserTypes->getValidationFailures());
                }
            }


            if (($retval = PersonPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collRentalssRelatedByStudent !== null) {
                    foreach ($this->collRentalssRelatedByStudent as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRentalssRelatedByFaculty !== null) {
                    foreach ($this->collRentalssRelatedByFaculty as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collEnrollments !== null) {
                    foreach ($this->collEnrollments as $referrerFK) {
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
        $pos = PersonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getFirstName();
                break;
            case 2:
                return $this->getLastName();
                break;
            case 3:
                return $this->getEmail();
                break;
            case 4:
                return $this->getAddressLineOne();
                break;
            case 5:
                return $this->getAddressLineTwo();
                break;
            case 6:
                return $this->getState();
                break;
            case 7:
                return $this->getZip();
                break;
            case 8:
                return $this->getStudentId();
                break;
            case 9:
                return $this->getUserType();
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
        if (isset($alreadyDumpedObjects['Person'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Person'][$this->getPrimaryKey()] = true;
        $keys = PersonPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getFirstName(),
            $keys[2] => $this->getLastName(),
            $keys[3] => $this->getEmail(),
            $keys[4] => $this->getAddressLineOne(),
            $keys[5] => $this->getAddressLineTwo(),
            $keys[6] => $this->getState(),
            $keys[7] => $this->getZip(),
            $keys[8] => $this->getStudentId(),
            $keys[9] => $this->getUserType(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach($virtualColumns as $key => $virtualColumn)
        {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aUserTypes) {
                $result['UserTypes'] = $this->aUserTypes->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collRentalssRelatedByStudent) {
                $result['RentalssRelatedByStudent'] = $this->collRentalssRelatedByStudent->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRentalssRelatedByFaculty) {
                $result['RentalssRelatedByFaculty'] = $this->collRentalssRelatedByFaculty->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collEnrollments) {
                $result['Enrollments'] = $this->collEnrollments->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PersonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setFirstName($value);
                break;
            case 2:
                $this->setLastName($value);
                break;
            case 3:
                $this->setEmail($value);
                break;
            case 4:
                $this->setAddressLineOne($value);
                break;
            case 5:
                $this->setAddressLineTwo($value);
                break;
            case 6:
                $this->setState($value);
                break;
            case 7:
                $this->setZip($value);
                break;
            case 8:
                $this->setStudentId($value);
                break;
            case 9:
                $this->setUserType($value);
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
        $keys = PersonPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFirstName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setLastName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setEmail($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setAddressLineOne($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setAddressLineTwo($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setState($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setZip($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setStudentId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setUserType($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PersonPeer::DATABASE_NAME);

        if ($this->isColumnModified(PersonPeer::ID)) $criteria->add(PersonPeer::ID, $this->id);
        if ($this->isColumnModified(PersonPeer::FIRST_NAME)) $criteria->add(PersonPeer::FIRST_NAME, $this->first_name);
        if ($this->isColumnModified(PersonPeer::LAST_NAME)) $criteria->add(PersonPeer::LAST_NAME, $this->last_name);
        if ($this->isColumnModified(PersonPeer::EMAIL)) $criteria->add(PersonPeer::EMAIL, $this->email);
        if ($this->isColumnModified(PersonPeer::ADDRESS_LINE_ONE)) $criteria->add(PersonPeer::ADDRESS_LINE_ONE, $this->address_line_one);
        if ($this->isColumnModified(PersonPeer::ADDRESS_LINE_TWO)) $criteria->add(PersonPeer::ADDRESS_LINE_TWO, $this->address_line_two);
        if ($this->isColumnModified(PersonPeer::STATE)) $criteria->add(PersonPeer::STATE, $this->state);
        if ($this->isColumnModified(PersonPeer::ZIP)) $criteria->add(PersonPeer::ZIP, $this->zip);
        if ($this->isColumnModified(PersonPeer::STUDENT_ID)) $criteria->add(PersonPeer::STUDENT_ID, $this->student_id);
        if ($this->isColumnModified(PersonPeer::USER_TYPE)) $criteria->add(PersonPeer::USER_TYPE, $this->user_type);

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
        $criteria = new Criteria(PersonPeer::DATABASE_NAME);
        $criteria->add(PersonPeer::ID, $this->id);

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
     * @param object $copyObj An object of Person (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setAddressLineOne($this->getAddressLineOne());
        $copyObj->setAddressLineTwo($this->getAddressLineTwo());
        $copyObj->setState($this->getState());
        $copyObj->setZip($this->getZip());
        $copyObj->setStudentId($this->getStudentId());
        $copyObj->setUserType($this->getUserType());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getRentalssRelatedByStudent() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRentalsRelatedByStudent($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRentalssRelatedByFaculty() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRentalsRelatedByFaculty($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getEnrollments() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addEnrollment($relObj->copy($deepCopy));
                }
            }

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
     * @return Person Clone of current object.
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
     * @return PersonPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PersonPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a UserTypes object.
     *
     * @param                  UserTypes $v
     * @return Person The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUserTypes(UserTypes $v = null)
    {
        if ($v === null) {
            $this->setUserType(NULL);
        } else {
            $this->setUserType($v->getUserCategory());
        }

        $this->aUserTypes = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the UserTypes object, it will not be re-added.
        if ($v !== null) {
            $v->addPerson($this);
        }


        return $this;
    }


    /**
     * Get the associated UserTypes object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return UserTypes The associated UserTypes object.
     * @throws PropelException
     */
    public function getUserTypes(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUserTypes === null && (($this->user_type !== "" && $this->user_type !== null)) && $doQuery) {
            $this->aUserTypes = UserTypesQuery::create()
                ->filterByPerson($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUserTypes->addPersons($this);
             */
        }

        return $this->aUserTypes;
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
        if ('RentalsRelatedByStudent' == $relationName) {
            $this->initRentalssRelatedByStudent();
        }
        if ('RentalsRelatedByFaculty' == $relationName) {
            $this->initRentalssRelatedByFaculty();
        }
        if ('Enrollment' == $relationName) {
            $this->initEnrollments();
        }
    }

    /**
     * Clears out the collRentalssRelatedByStudent collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addRentalssRelatedByStudent()
     */
    public function clearRentalssRelatedByStudent()
    {
        $this->collRentalssRelatedByStudent = null; // important to set this to null since that means it is uninitialized
        $this->collRentalssRelatedByStudentPartial = null;

        return $this;
    }

    /**
     * reset is the collRentalssRelatedByStudent collection loaded partially
     *
     * @return void
     */
    public function resetPartialRentalssRelatedByStudent($v = true)
    {
        $this->collRentalssRelatedByStudentPartial = $v;
    }

    /**
     * Initializes the collRentalssRelatedByStudent collection.
     *
     * By default this just sets the collRentalssRelatedByStudent collection to an empty array (like clearcollRentalssRelatedByStudent());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRentalssRelatedByStudent($overrideExisting = true)
    {
        if (null !== $this->collRentalssRelatedByStudent && !$overrideExisting) {
            return;
        }
        $this->collRentalssRelatedByStudent = new PropelObjectCollection();
        $this->collRentalssRelatedByStudent->setModel('Rentals');
    }

    /**
     * Gets an array of Rentals objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Rentals[] List of Rentals objects
     * @throws PropelException
     */
    public function getRentalssRelatedByStudent($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRentalssRelatedByStudentPartial && !$this->isNew();
        if (null === $this->collRentalssRelatedByStudent || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRentalssRelatedByStudent) {
                // return empty collection
                $this->initRentalssRelatedByStudent();
            } else {
                $collRentalssRelatedByStudent = RentalsQuery::create(null, $criteria)
                    ->filterByPersonRelatedByStudent($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRentalssRelatedByStudentPartial && count($collRentalssRelatedByStudent)) {
                      $this->initRentalssRelatedByStudent(false);

                      foreach ($collRentalssRelatedByStudent as $obj) {
                        if (false == $this->collRentalssRelatedByStudent->contains($obj)) {
                          $this->collRentalssRelatedByStudent->append($obj);
                        }
                      }

                      $this->collRentalssRelatedByStudentPartial = true;
                    }

                    $collRentalssRelatedByStudent->getInternalIterator()->rewind();

                    return $collRentalssRelatedByStudent;
                }

                if ($partial && $this->collRentalssRelatedByStudent) {
                    foreach ($this->collRentalssRelatedByStudent as $obj) {
                        if ($obj->isNew()) {
                            $collRentalssRelatedByStudent[] = $obj;
                        }
                    }
                }

                $this->collRentalssRelatedByStudent = $collRentalssRelatedByStudent;
                $this->collRentalssRelatedByStudentPartial = false;
            }
        }

        return $this->collRentalssRelatedByStudent;
    }

    /**
     * Sets a collection of RentalsRelatedByStudent objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rentalssRelatedByStudent A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setRentalssRelatedByStudent(PropelCollection $rentalssRelatedByStudent, PropelPDO $con = null)
    {
        $rentalssRelatedByStudentToDelete = $this->getRentalssRelatedByStudent(new Criteria(), $con)->diff($rentalssRelatedByStudent);


        $this->rentalssRelatedByStudentScheduledForDeletion = $rentalssRelatedByStudentToDelete;

        foreach ($rentalssRelatedByStudentToDelete as $rentalsRelatedByStudentRemoved) {
            $rentalsRelatedByStudentRemoved->setPersonRelatedByStudent(null);
        }

        $this->collRentalssRelatedByStudent = null;
        foreach ($rentalssRelatedByStudent as $rentalsRelatedByStudent) {
            $this->addRentalsRelatedByStudent($rentalsRelatedByStudent);
        }

        $this->collRentalssRelatedByStudent = $rentalssRelatedByStudent;
        $this->collRentalssRelatedByStudentPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Rentals objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Rentals objects.
     * @throws PropelException
     */
    public function countRentalssRelatedByStudent(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRentalssRelatedByStudentPartial && !$this->isNew();
        if (null === $this->collRentalssRelatedByStudent || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRentalssRelatedByStudent) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getRentalssRelatedByStudent());
            }
            $query = RentalsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByStudent($this)
                ->count($con);
        }

        return count($this->collRentalssRelatedByStudent);
    }

    /**
     * Method called to associate a Rentals object to this object
     * through the Rentals foreign key attribute.
     *
     * @param    Rentals $l Rentals
     * @return Person The current object (for fluent API support)
     */
    public function addRentalsRelatedByStudent(Rentals $l)
    {
        if ($this->collRentalssRelatedByStudent === null) {
            $this->initRentalssRelatedByStudent();
            $this->collRentalssRelatedByStudentPartial = true;
        }

        if (!in_array($l, $this->collRentalssRelatedByStudent->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRentalsRelatedByStudent($l);

            if ($this->rentalssRelatedByStudentScheduledForDeletion and $this->rentalssRelatedByStudentScheduledForDeletion->contains($l)) {
                $this->rentalssRelatedByStudentScheduledForDeletion->remove($this->rentalssRelatedByStudentScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	RentalsRelatedByStudent $rentalsRelatedByStudent The rentalsRelatedByStudent object to add.
     */
    protected function doAddRentalsRelatedByStudent($rentalsRelatedByStudent)
    {
        $this->collRentalssRelatedByStudent[]= $rentalsRelatedByStudent;
        $rentalsRelatedByStudent->setPersonRelatedByStudent($this);
    }

    /**
     * @param	RentalsRelatedByStudent $rentalsRelatedByStudent The rentalsRelatedByStudent object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeRentalsRelatedByStudent($rentalsRelatedByStudent)
    {
        if ($this->getRentalssRelatedByStudent()->contains($rentalsRelatedByStudent)) {
            $this->collRentalssRelatedByStudent->remove($this->collRentalssRelatedByStudent->search($rentalsRelatedByStudent));
            if (null === $this->rentalssRelatedByStudentScheduledForDeletion) {
                $this->rentalssRelatedByStudentScheduledForDeletion = clone $this->collRentalssRelatedByStudent;
                $this->rentalssRelatedByStudentScheduledForDeletion->clear();
            }
            $this->rentalssRelatedByStudentScheduledForDeletion[]= clone $rentalsRelatedByStudent;
            $rentalsRelatedByStudent->setPersonRelatedByStudent(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related RentalssRelatedByStudent from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Rentals[] List of Rentals objects
     */
    public function getRentalssRelatedByStudentJoinEquipment($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RentalsQuery::create(null, $criteria);
        $query->joinWith('Equipment', $join_behavior);

        return $this->getRentalssRelatedByStudent($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related RentalssRelatedByStudent from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Rentals[] List of Rentals objects
     */
    public function getRentalssRelatedByStudentJoinrentalStatus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RentalsQuery::create(null, $criteria);
        $query->joinWith('rentalStatus', $join_behavior);

        return $this->getRentalssRelatedByStudent($query, $con);
    }

    /**
     * Clears out the collRentalssRelatedByFaculty collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addRentalssRelatedByFaculty()
     */
    public function clearRentalssRelatedByFaculty()
    {
        $this->collRentalssRelatedByFaculty = null; // important to set this to null since that means it is uninitialized
        $this->collRentalssRelatedByFacultyPartial = null;

        return $this;
    }

    /**
     * reset is the collRentalssRelatedByFaculty collection loaded partially
     *
     * @return void
     */
    public function resetPartialRentalssRelatedByFaculty($v = true)
    {
        $this->collRentalssRelatedByFacultyPartial = $v;
    }

    /**
     * Initializes the collRentalssRelatedByFaculty collection.
     *
     * By default this just sets the collRentalssRelatedByFaculty collection to an empty array (like clearcollRentalssRelatedByFaculty());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRentalssRelatedByFaculty($overrideExisting = true)
    {
        if (null !== $this->collRentalssRelatedByFaculty && !$overrideExisting) {
            return;
        }
        $this->collRentalssRelatedByFaculty = new PropelObjectCollection();
        $this->collRentalssRelatedByFaculty->setModel('Rentals');
    }

    /**
     * Gets an array of Rentals objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Rentals[] List of Rentals objects
     * @throws PropelException
     */
    public function getRentalssRelatedByFaculty($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRentalssRelatedByFacultyPartial && !$this->isNew();
        if (null === $this->collRentalssRelatedByFaculty || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRentalssRelatedByFaculty) {
                // return empty collection
                $this->initRentalssRelatedByFaculty();
            } else {
                $collRentalssRelatedByFaculty = RentalsQuery::create(null, $criteria)
                    ->filterByPersonRelatedByFaculty($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRentalssRelatedByFacultyPartial && count($collRentalssRelatedByFaculty)) {
                      $this->initRentalssRelatedByFaculty(false);

                      foreach ($collRentalssRelatedByFaculty as $obj) {
                        if (false == $this->collRentalssRelatedByFaculty->contains($obj)) {
                          $this->collRentalssRelatedByFaculty->append($obj);
                        }
                      }

                      $this->collRentalssRelatedByFacultyPartial = true;
                    }

                    $collRentalssRelatedByFaculty->getInternalIterator()->rewind();

                    return $collRentalssRelatedByFaculty;
                }

                if ($partial && $this->collRentalssRelatedByFaculty) {
                    foreach ($this->collRentalssRelatedByFaculty as $obj) {
                        if ($obj->isNew()) {
                            $collRentalssRelatedByFaculty[] = $obj;
                        }
                    }
                }

                $this->collRentalssRelatedByFaculty = $collRentalssRelatedByFaculty;
                $this->collRentalssRelatedByFacultyPartial = false;
            }
        }

        return $this->collRentalssRelatedByFaculty;
    }

    /**
     * Sets a collection of RentalsRelatedByFaculty objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rentalssRelatedByFaculty A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setRentalssRelatedByFaculty(PropelCollection $rentalssRelatedByFaculty, PropelPDO $con = null)
    {
        $rentalssRelatedByFacultyToDelete = $this->getRentalssRelatedByFaculty(new Criteria(), $con)->diff($rentalssRelatedByFaculty);


        $this->rentalssRelatedByFacultyScheduledForDeletion = $rentalssRelatedByFacultyToDelete;

        foreach ($rentalssRelatedByFacultyToDelete as $rentalsRelatedByFacultyRemoved) {
            $rentalsRelatedByFacultyRemoved->setPersonRelatedByFaculty(null);
        }

        $this->collRentalssRelatedByFaculty = null;
        foreach ($rentalssRelatedByFaculty as $rentalsRelatedByFaculty) {
            $this->addRentalsRelatedByFaculty($rentalsRelatedByFaculty);
        }

        $this->collRentalssRelatedByFaculty = $rentalssRelatedByFaculty;
        $this->collRentalssRelatedByFacultyPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Rentals objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Rentals objects.
     * @throws PropelException
     */
    public function countRentalssRelatedByFaculty(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRentalssRelatedByFacultyPartial && !$this->isNew();
        if (null === $this->collRentalssRelatedByFaculty || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRentalssRelatedByFaculty) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getRentalssRelatedByFaculty());
            }
            $query = RentalsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPersonRelatedByFaculty($this)
                ->count($con);
        }

        return count($this->collRentalssRelatedByFaculty);
    }

    /**
     * Method called to associate a Rentals object to this object
     * through the Rentals foreign key attribute.
     *
     * @param    Rentals $l Rentals
     * @return Person The current object (for fluent API support)
     */
    public function addRentalsRelatedByFaculty(Rentals $l)
    {
        if ($this->collRentalssRelatedByFaculty === null) {
            $this->initRentalssRelatedByFaculty();
            $this->collRentalssRelatedByFacultyPartial = true;
        }

        if (!in_array($l, $this->collRentalssRelatedByFaculty->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRentalsRelatedByFaculty($l);

            if ($this->rentalssRelatedByFacultyScheduledForDeletion and $this->rentalssRelatedByFacultyScheduledForDeletion->contains($l)) {
                $this->rentalssRelatedByFacultyScheduledForDeletion->remove($this->rentalssRelatedByFacultyScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	RentalsRelatedByFaculty $rentalsRelatedByFaculty The rentalsRelatedByFaculty object to add.
     */
    protected function doAddRentalsRelatedByFaculty($rentalsRelatedByFaculty)
    {
        $this->collRentalssRelatedByFaculty[]= $rentalsRelatedByFaculty;
        $rentalsRelatedByFaculty->setPersonRelatedByFaculty($this);
    }

    /**
     * @param	RentalsRelatedByFaculty $rentalsRelatedByFaculty The rentalsRelatedByFaculty object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeRentalsRelatedByFaculty($rentalsRelatedByFaculty)
    {
        if ($this->getRentalssRelatedByFaculty()->contains($rentalsRelatedByFaculty)) {
            $this->collRentalssRelatedByFaculty->remove($this->collRentalssRelatedByFaculty->search($rentalsRelatedByFaculty));
            if (null === $this->rentalssRelatedByFacultyScheduledForDeletion) {
                $this->rentalssRelatedByFacultyScheduledForDeletion = clone $this->collRentalssRelatedByFaculty;
                $this->rentalssRelatedByFacultyScheduledForDeletion->clear();
            }
            $this->rentalssRelatedByFacultyScheduledForDeletion[]= clone $rentalsRelatedByFaculty;
            $rentalsRelatedByFaculty->setPersonRelatedByFaculty(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related RentalssRelatedByFaculty from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Rentals[] List of Rentals objects
     */
    public function getRentalssRelatedByFacultyJoinEquipment($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RentalsQuery::create(null, $criteria);
        $query->joinWith('Equipment', $join_behavior);

        return $this->getRentalssRelatedByFaculty($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related RentalssRelatedByFaculty from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Rentals[] List of Rentals objects
     */
    public function getRentalssRelatedByFacultyJoinrentalStatus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RentalsQuery::create(null, $criteria);
        $query->joinWith('rentalStatus', $join_behavior);

        return $this->getRentalssRelatedByFaculty($query, $con);
    }

    /**
     * Clears out the collEnrollments collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Person The current object (for fluent API support)
     * @see        addEnrollments()
     */
    public function clearEnrollments()
    {
        $this->collEnrollments = null; // important to set this to null since that means it is uninitialized
        $this->collEnrollmentsPartial = null;

        return $this;
    }

    /**
     * reset is the collEnrollments collection loaded partially
     *
     * @return void
     */
    public function resetPartialEnrollments($v = true)
    {
        $this->collEnrollmentsPartial = $v;
    }

    /**
     * Initializes the collEnrollments collection.
     *
     * By default this just sets the collEnrollments collection to an empty array (like clearcollEnrollments());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initEnrollments($overrideExisting = true)
    {
        if (null !== $this->collEnrollments && !$overrideExisting) {
            return;
        }
        $this->collEnrollments = new PropelObjectCollection();
        $this->collEnrollments->setModel('Enrollment');
    }

    /**
     * Gets an array of Enrollment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Person is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Enrollment[] List of Enrollment objects
     * @throws PropelException
     */
    public function getEnrollments($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collEnrollmentsPartial && !$this->isNew();
        if (null === $this->collEnrollments || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collEnrollments) {
                // return empty collection
                $this->initEnrollments();
            } else {
                $collEnrollments = EnrollmentQuery::create(null, $criteria)
                    ->filterByPerson($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collEnrollmentsPartial && count($collEnrollments)) {
                      $this->initEnrollments(false);

                      foreach ($collEnrollments as $obj) {
                        if (false == $this->collEnrollments->contains($obj)) {
                          $this->collEnrollments->append($obj);
                        }
                      }

                      $this->collEnrollmentsPartial = true;
                    }

                    $collEnrollments->getInternalIterator()->rewind();

                    return $collEnrollments;
                }

                if ($partial && $this->collEnrollments) {
                    foreach ($this->collEnrollments as $obj) {
                        if ($obj->isNew()) {
                            $collEnrollments[] = $obj;
                        }
                    }
                }

                $this->collEnrollments = $collEnrollments;
                $this->collEnrollmentsPartial = false;
            }
        }

        return $this->collEnrollments;
    }

    /**
     * Sets a collection of Enrollment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $enrollments A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Person The current object (for fluent API support)
     */
    public function setEnrollments(PropelCollection $enrollments, PropelPDO $con = null)
    {
        $enrollmentsToDelete = $this->getEnrollments(new Criteria(), $con)->diff($enrollments);


        $this->enrollmentsScheduledForDeletion = $enrollmentsToDelete;

        foreach ($enrollmentsToDelete as $enrollmentRemoved) {
            $enrollmentRemoved->setPerson(null);
        }

        $this->collEnrollments = null;
        foreach ($enrollments as $enrollment) {
            $this->addEnrollment($enrollment);
        }

        $this->collEnrollments = $enrollments;
        $this->collEnrollmentsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Enrollment objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Enrollment objects.
     * @throws PropelException
     */
    public function countEnrollments(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collEnrollmentsPartial && !$this->isNew();
        if (null === $this->collEnrollments || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collEnrollments) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getEnrollments());
            }
            $query = EnrollmentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPerson($this)
                ->count($con);
        }

        return count($this->collEnrollments);
    }

    /**
     * Method called to associate a Enrollment object to this object
     * through the Enrollment foreign key attribute.
     *
     * @param    Enrollment $l Enrollment
     * @return Person The current object (for fluent API support)
     */
    public function addEnrollment(Enrollment $l)
    {
        if ($this->collEnrollments === null) {
            $this->initEnrollments();
            $this->collEnrollmentsPartial = true;
        }

        if (!in_array($l, $this->collEnrollments->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddEnrollment($l);

            if ($this->enrollmentsScheduledForDeletion and $this->enrollmentsScheduledForDeletion->contains($l)) {
                $this->enrollmentsScheduledForDeletion->remove($this->enrollmentsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Enrollment $enrollment The enrollment object to add.
     */
    protected function doAddEnrollment($enrollment)
    {
        $this->collEnrollments[]= $enrollment;
        $enrollment->setPerson($this);
    }

    /**
     * @param	Enrollment $enrollment The enrollment object to remove.
     * @return Person The current object (for fluent API support)
     */
    public function removeEnrollment($enrollment)
    {
        if ($this->getEnrollments()->contains($enrollment)) {
            $this->collEnrollments->remove($this->collEnrollments->search($enrollment));
            if (null === $this->enrollmentsScheduledForDeletion) {
                $this->enrollmentsScheduledForDeletion = clone $this->collEnrollments;
                $this->enrollmentsScheduledForDeletion->clear();
            }
            $this->enrollmentsScheduledForDeletion[]= clone $enrollment;
            $enrollment->setPerson(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Person is new, it will return
     * an empty collection; or if this Person has previously
     * been saved, it will retrieve related Enrollments from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Person.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Enrollment[] List of Enrollment objects
     */
    public function getEnrollmentsJoinClasses($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = EnrollmentQuery::create(null, $criteria);
        $query->joinWith('Classes', $join_behavior);

        return $this->getEnrollments($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->address_line_one = null;
        $this->address_line_two = null;
        $this->state = null;
        $this->zip = null;
        $this->student_id = null;
        $this->user_type = null;
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
            if ($this->collRentalssRelatedByStudent) {
                foreach ($this->collRentalssRelatedByStudent as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRentalssRelatedByFaculty) {
                foreach ($this->collRentalssRelatedByFaculty as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collEnrollments) {
                foreach ($this->collEnrollments as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aUserTypes instanceof Persistent) {
              $this->aUserTypes->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collRentalssRelatedByStudent instanceof PropelCollection) {
            $this->collRentalssRelatedByStudent->clearIterator();
        }
        $this->collRentalssRelatedByStudent = null;
        if ($this->collRentalssRelatedByFaculty instanceof PropelCollection) {
            $this->collRentalssRelatedByFaculty->clearIterator();
        }
        $this->collRentalssRelatedByFaculty = null;
        if ($this->collEnrollments instanceof PropelCollection) {
            $this->collEnrollments->clearIterator();
        }
        $this->collEnrollments = null;
        $this->aUserTypes = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PersonPeer::DEFAULT_STRING_FORMAT);
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
