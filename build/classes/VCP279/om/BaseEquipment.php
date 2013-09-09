<?php


/**
 * Base class that represents a row from the 'equipment' table.
 *
 * 
 *
 * @package    propel.generator.VCP279.om
 */
abstract class BaseEquipment extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'EquipmentPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        EquipmentPeer
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
     * The value for the serial field.
     * @var        string
     */
    protected $serial;

    /**
     * The value for the purchase_date field.
     * @var        string
     */
    protected $purchase_date;

    /**
     * The value for the item_status field.
     * @var        string
     */
    protected $item_status;

    /**
     * The value for the comments field.
     * @var        string
     */
    protected $comments;

    /**
     * @var        equipmentStatus
     */
    protected $aequipmentStatus;

    /**
     * @var        PropelObjectCollection|Rentals[] Collection to store aggregation of Rentals objects.
     */
    protected $collRentalss;
    protected $collRentalssPartial;

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
    protected $rentalssScheduledForDeletion = null;

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
     * Get the [name] column value.
     * 
     * @return string
     */
    public function getName()
    {

        return $this->name;
    }

    /**
     * Get the [serial] column value.
     * 
     * @return string
     */
    public function getSerial()
    {

        return $this->serial;
    }

    /**
     * Get the [optionally formatted] temporal [purchase_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPurchaseDate($format = '%x')
    {
        if ($this->purchase_date === null) {
            return null;
        }

        if ($this->purchase_date === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->purchase_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->purchase_date, true), $x);
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
     * Get the [item_status] column value.
     * 
     * @return string
     */
    public function getItemStatus()
    {

        return $this->item_status;
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
     * @return Equipment The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = EquipmentPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [name] column.
     * 
     * @param  string $v new value
     * @return Equipment The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = EquipmentPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [serial] column.
     * 
     * @param  string $v new value
     * @return Equipment The current object (for fluent API support)
     */
    public function setSerial($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->serial !== $v) {
            $this->serial = $v;
            $this->modifiedColumns[] = EquipmentPeer::SERIAL;
        }


        return $this;
    } // setSerial()

    /**
     * Sets the value of [purchase_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Equipment The current object (for fluent API support)
     */
    public function setPurchaseDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->purchase_date !== null || $dt !== null) {
            $currentDateAsString = ($this->purchase_date !== null && $tmpDt = new DateTime($this->purchase_date)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->purchase_date = $newDateAsString;
                $this->modifiedColumns[] = EquipmentPeer::PURCHASE_DATE;
            }
        } // if either are not null


        return $this;
    } // setPurchaseDate()

    /**
     * Set the value of [item_status] column.
     * 
     * @param  string $v new value
     * @return Equipment The current object (for fluent API support)
     */
    public function setItemStatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->item_status !== $v) {
            $this->item_status = $v;
            $this->modifiedColumns[] = EquipmentPeer::ITEM_STATUS;
        }

        if ($this->aequipmentStatus !== null && $this->aequipmentStatus->getStatus() !== $v) {
            $this->aequipmentStatus = null;
        }


        return $this;
    } // setItemStatus()

    /**
     * Set the value of [comments] column.
     * 
     * @param  string $v new value
     * @return Equipment The current object (for fluent API support)
     */
    public function setComments($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->comments !== $v) {
            $this->comments = $v;
            $this->modifiedColumns[] = EquipmentPeer::COMMENTS;
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
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->serial = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->purchase_date = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->item_status = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->comments = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 6; // 6 = EquipmentPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Equipment object", $e);
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

        if ($this->aequipmentStatus !== null && $this->item_status !== $this->aequipmentStatus->getStatus()) {
            $this->aequipmentStatus = null;
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
            $con = Propel::getConnection(EquipmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = EquipmentPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aequipmentStatus = null;
            $this->collRentalss = null;

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
            $con = Propel::getConnection(EquipmentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = EquipmentQuery::create()
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
            $con = Propel::getConnection(EquipmentPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                EquipmentPeer::addInstanceToPool($this);
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

            if ($this->aequipmentStatus !== null) {
                if ($this->aequipmentStatus->isModified() || $this->aequipmentStatus->isNew()) {
                    $affectedRows += $this->aequipmentStatus->save($con);
                }
                $this->setequipmentStatus($this->aequipmentStatus);
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

            if ($this->rentalssScheduledForDeletion !== null) {
                if (!$this->rentalssScheduledForDeletion->isEmpty()) {
                    RentalsQuery::create()
                        ->filterByPrimaryKeys($this->rentalssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rentalssScheduledForDeletion = null;
                }
            }

            if ($this->collRentalss !== null) {
                foreach ($this->collRentalss as $referrerFK) {
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

        $this->modifiedColumns[] = EquipmentPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EquipmentPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EquipmentPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(EquipmentPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(EquipmentPeer::SERIAL)) {
            $modifiedColumns[':p' . $index++]  = '`serial`';
        }
        if ($this->isColumnModified(EquipmentPeer::PURCHASE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`purchase_date`';
        }
        if ($this->isColumnModified(EquipmentPeer::ITEM_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`item_status`';
        }
        if ($this->isColumnModified(EquipmentPeer::COMMENTS)) {
            $modifiedColumns[':p' . $index++]  = '`comments`';
        }

        $sql = sprintf(
            'INSERT INTO `equipment` (%s) VALUES (%s)',
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
                    case '`serial`':						
                        $stmt->bindValue($identifier, $this->serial, PDO::PARAM_STR);
                        break;
                    case '`purchase_date`':						
                        $stmt->bindValue($identifier, $this->purchase_date, PDO::PARAM_STR);
                        break;
                    case '`item_status`':						
                        $stmt->bindValue($identifier, $this->item_status, PDO::PARAM_STR);
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

            if ($this->aequipmentStatus !== null) {
                if (!$this->aequipmentStatus->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aequipmentStatus->getValidationFailures());
                }
            }


            if (($retval = EquipmentPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collRentalss !== null) {
                    foreach ($this->collRentalss as $referrerFK) {
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
        $pos = EquipmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getName();
                break;
            case 2:
                return $this->getSerial();
                break;
            case 3:
                return $this->getPurchaseDate();
                break;
            case 4:
                return $this->getItemStatus();
                break;
            case 5:
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
        if (isset($alreadyDumpedObjects['Equipment'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Equipment'][$this->getPrimaryKey()] = true;
        $keys = EquipmentPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getSerial(),
            $keys[3] => $this->getPurchaseDate(),
            $keys[4] => $this->getItemStatus(),
            $keys[5] => $this->getComments(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach($virtualColumns as $key => $virtualColumn)
        {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aequipmentStatus) {
                $result['equipmentStatus'] = $this->aequipmentStatus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collRentalss) {
                $result['Rentalss'] = $this->collRentalss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = EquipmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setName($value);
                break;
            case 2:
                $this->setSerial($value);
                break;
            case 3:
                $this->setPurchaseDate($value);
                break;
            case 4:
                $this->setItemStatus($value);
                break;
            case 5:
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
        $keys = EquipmentPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSerial($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPurchaseDate($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setItemStatus($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setComments($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EquipmentPeer::DATABASE_NAME);

        if ($this->isColumnModified(EquipmentPeer::ID)) $criteria->add(EquipmentPeer::ID, $this->id);
        if ($this->isColumnModified(EquipmentPeer::NAME)) $criteria->add(EquipmentPeer::NAME, $this->name);
        if ($this->isColumnModified(EquipmentPeer::SERIAL)) $criteria->add(EquipmentPeer::SERIAL, $this->serial);
        if ($this->isColumnModified(EquipmentPeer::PURCHASE_DATE)) $criteria->add(EquipmentPeer::PURCHASE_DATE, $this->purchase_date);
        if ($this->isColumnModified(EquipmentPeer::ITEM_STATUS)) $criteria->add(EquipmentPeer::ITEM_STATUS, $this->item_status);
        if ($this->isColumnModified(EquipmentPeer::COMMENTS)) $criteria->add(EquipmentPeer::COMMENTS, $this->comments);

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
        $criteria = new Criteria(EquipmentPeer::DATABASE_NAME);
        $criteria->add(EquipmentPeer::ID, $this->id);

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
     * @param object $copyObj An object of Equipment (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setSerial($this->getSerial());
        $copyObj->setPurchaseDate($this->getPurchaseDate());
        $copyObj->setItemStatus($this->getItemStatus());
        $copyObj->setComments($this->getComments());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getRentalss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRentals($relObj->copy($deepCopy));
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
     * @return Equipment Clone of current object.
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
     * @return EquipmentPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new EquipmentPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a equipmentStatus object.
     *
     * @param                  equipmentStatus $v
     * @return Equipment The current object (for fluent API support)
     * @throws PropelException
     */
    public function setequipmentStatus(equipmentStatus $v = null)
    {
        if ($v === null) {
            $this->setItemStatus(NULL);
        } else {
            $this->setItemStatus($v->getStatus());
        }

        $this->aequipmentStatus = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the equipmentStatus object, it will not be re-added.
        if ($v !== null) {
            $v->addEquipment($this);
        }


        return $this;
    }


    /**
     * Get the associated equipmentStatus object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return equipmentStatus The associated equipmentStatus object.
     * @throws PropelException
     */
    public function getequipmentStatus(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aequipmentStatus === null && (($this->item_status !== "" && $this->item_status !== null)) && $doQuery) {
            $this->aequipmentStatus = equipmentStatusQuery::create()
                ->filterByEquipment($this) // here
                ->findOne($con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aequipmentStatus->addEquipments($this);
             */
        }

        return $this->aequipmentStatus;
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
        if ('Rentals' == $relationName) {
            $this->initRentalss();
        }
    }

    /**
     * Clears out the collRentalss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Equipment The current object (for fluent API support)
     * @see        addRentalss()
     */
    public function clearRentalss()
    {
        $this->collRentalss = null; // important to set this to null since that means it is uninitialized
        $this->collRentalssPartial = null;

        return $this;
    }

    /**
     * reset is the collRentalss collection loaded partially
     *
     * @return void
     */
    public function resetPartialRentalss($v = true)
    {
        $this->collRentalssPartial = $v;
    }

    /**
     * Initializes the collRentalss collection.
     *
     * By default this just sets the collRentalss collection to an empty array (like clearcollRentalss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRentalss($overrideExisting = true)
    {
        if (null !== $this->collRentalss && !$overrideExisting) {
            return;
        }
        $this->collRentalss = new PropelObjectCollection();
        $this->collRentalss->setModel('Rentals');
    }

    /**
     * Gets an array of Rentals objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Equipment is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Rentals[] List of Rentals objects
     * @throws PropelException
     */
    public function getRentalss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRentalssPartial && !$this->isNew();
        if (null === $this->collRentalss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRentalss) {
                // return empty collection
                $this->initRentalss();
            } else {
                $collRentalss = RentalsQuery::create(null, $criteria)
                    ->filterByEquipment($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRentalssPartial && count($collRentalss)) {
                      $this->initRentalss(false);

                      foreach ($collRentalss as $obj) {
                        if (false == $this->collRentalss->contains($obj)) {
                          $this->collRentalss->append($obj);
                        }
                      }

                      $this->collRentalssPartial = true;
                    }

                    $collRentalss->getInternalIterator()->rewind();

                    return $collRentalss;
                }

                if ($partial && $this->collRentalss) {
                    foreach ($this->collRentalss as $obj) {
                        if ($obj->isNew()) {
                            $collRentalss[] = $obj;
                        }
                    }
                }

                $this->collRentalss = $collRentalss;
                $this->collRentalssPartial = false;
            }
        }

        return $this->collRentalss;
    }

    /**
     * Sets a collection of Rentals objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rentalss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Equipment The current object (for fluent API support)
     */
    public function setRentalss(PropelCollection $rentalss, PropelPDO $con = null)
    {
        $rentalssToDelete = $this->getRentalss(new Criteria(), $con)->diff($rentalss);


        $this->rentalssScheduledForDeletion = $rentalssToDelete;

        foreach ($rentalssToDelete as $rentalsRemoved) {
            $rentalsRemoved->setEquipment(null);
        }

        $this->collRentalss = null;
        foreach ($rentalss as $rentals) {
            $this->addRentals($rentals);
        }

        $this->collRentalss = $rentalss;
        $this->collRentalssPartial = false;

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
    public function countRentalss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRentalssPartial && !$this->isNew();
        if (null === $this->collRentalss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRentalss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getRentalss());
            }
            $query = RentalsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEquipment($this)
                ->count($con);
        }

        return count($this->collRentalss);
    }

    /**
     * Method called to associate a Rentals object to this object
     * through the Rentals foreign key attribute.
     *
     * @param    Rentals $l Rentals
     * @return Equipment The current object (for fluent API support)
     */
    public function addRentals(Rentals $l)
    {
        if ($this->collRentalss === null) {
            $this->initRentalss();
            $this->collRentalssPartial = true;
        }

        if (!in_array($l, $this->collRentalss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRentals($l);

            if ($this->rentalssScheduledForDeletion and $this->rentalssScheduledForDeletion->contains($l)) {
                $this->rentalssScheduledForDeletion->remove($this->rentalssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param	Rentals $rentals The rentals object to add.
     */
    protected function doAddRentals($rentals)
    {
        $this->collRentalss[]= $rentals;
        $rentals->setEquipment($this);
    }

    /**
     * @param	Rentals $rentals The rentals object to remove.
     * @return Equipment The current object (for fluent API support)
     */
    public function removeRentals($rentals)
    {
        if ($this->getRentalss()->contains($rentals)) {
            $this->collRentalss->remove($this->collRentalss->search($rentals));
            if (null === $this->rentalssScheduledForDeletion) {
                $this->rentalssScheduledForDeletion = clone $this->collRentalss;
                $this->rentalssScheduledForDeletion->clear();
            }
            $this->rentalssScheduledForDeletion[]= clone $rentals;
            $rentals->setEquipment(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Equipment is new, it will return
     * an empty collection; or if this Equipment has previously
     * been saved, it will retrieve related Rentalss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Equipment.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Rentals[] List of Rentals objects
     */
    public function getRentalssJoinPersonRelatedByStudent($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RentalsQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByStudent', $join_behavior);

        return $this->getRentalss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Equipment is new, it will return
     * an empty collection; or if this Equipment has previously
     * been saved, it will retrieve related Rentalss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Equipment.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Rentals[] List of Rentals objects
     */
    public function getRentalssJoinPersonRelatedByFaculty($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RentalsQuery::create(null, $criteria);
        $query->joinWith('PersonRelatedByFaculty', $join_behavior);

        return $this->getRentalss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Equipment is new, it will return
     * an empty collection; or if this Equipment has previously
     * been saved, it will retrieve related Rentalss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Equipment.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Rentals[] List of Rentals objects
     */
    public function getRentalssJoinrentalStatus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RentalsQuery::create(null, $criteria);
        $query->joinWith('rentalStatus', $join_behavior);

        return $this->getRentalss($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
        $this->serial = null;
        $this->purchase_date = null;
        $this->item_status = null;
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
            if ($this->collRentalss) {
                foreach ($this->collRentalss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aequipmentStatus instanceof Persistent) {
              $this->aequipmentStatus->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collRentalss instanceof PropelCollection) {
            $this->collRentalss->clearIterator();
        }
        $this->collRentalss = null;
        $this->aequipmentStatus = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EquipmentPeer::DEFAULT_STRING_FORMAT);
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
