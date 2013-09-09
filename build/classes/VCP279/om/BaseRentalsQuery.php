<?php


/**
 * Base class that represents a query for the 'rentals' table.
 *
 * 
 *
 * @method RentalsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RentalsQuery orderByStudent($order = Criteria::ASC) Order by the student column
 * @method RentalsQuery orderByFaculty($order = Criteria::ASC) Order by the faculty column
 * @method RentalsQuery orderByItem($order = Criteria::ASC) Order by the item column
 * @method RentalsQuery orderByOutDate($order = Criteria::ASC) Order by the out_date column
 * @method RentalsQuery orderByDueDate($order = Criteria::ASC) Order by the due_date column
 * @method RentalsQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method RentalsQuery orderByComments($order = Criteria::ASC) Order by the comments column
 *
 * @method RentalsQuery groupById() Group by the id column
 * @method RentalsQuery groupByStudent() Group by the student column
 * @method RentalsQuery groupByFaculty() Group by the faculty column
 * @method RentalsQuery groupByItem() Group by the item column
 * @method RentalsQuery groupByOutDate() Group by the out_date column
 * @method RentalsQuery groupByDueDate() Group by the due_date column
 * @method RentalsQuery groupByStatus() Group by the status column
 * @method RentalsQuery groupByComments() Group by the comments column
 *
 * @method RentalsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RentalsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RentalsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RentalsQuery leftJoinPersonRelatedByStudent($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByStudent relation
 * @method RentalsQuery rightJoinPersonRelatedByStudent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByStudent relation
 * @method RentalsQuery innerJoinPersonRelatedByStudent($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByStudent relation
 *
 * @method RentalsQuery leftJoinPersonRelatedByFaculty($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByFaculty relation
 * @method RentalsQuery rightJoinPersonRelatedByFaculty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByFaculty relation
 * @method RentalsQuery innerJoinPersonRelatedByFaculty($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByFaculty relation
 *
 * @method RentalsQuery leftJoinEquipment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Equipment relation
 * @method RentalsQuery rightJoinEquipment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Equipment relation
 * @method RentalsQuery innerJoinEquipment($relationAlias = null) Adds a INNER JOIN clause to the query using the Equipment relation
 *
 * @method RentalsQuery leftJoinrentalStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the rentalStatus relation
 * @method RentalsQuery rightJoinrentalStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the rentalStatus relation
 * @method RentalsQuery innerJoinrentalStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the rentalStatus relation
 *
 * @method Rentals findOne(PropelPDO $con = null) Return the first Rentals matching the query
 * @method Rentals findOneOrCreate(PropelPDO $con = null) Return the first Rentals matching the query, or a new Rentals object populated from the query conditions when no match is found
 *
 * @method Rentals findOneByStudent(int $student) Return the first Rentals filtered by the student column
 * @method Rentals findOneByFaculty(int $faculty) Return the first Rentals filtered by the faculty column
 * @method Rentals findOneByItem(int $item) Return the first Rentals filtered by the item column
 * @method Rentals findOneByOutDate(string $out_date) Return the first Rentals filtered by the out_date column
 * @method Rentals findOneByDueDate(string $due_date) Return the first Rentals filtered by the due_date column
 * @method Rentals findOneByStatus(string $status) Return the first Rentals filtered by the status column
 * @method Rentals findOneByComments(string $comments) Return the first Rentals filtered by the comments column
 *
 * @method array findById(int $id) Return Rentals objects filtered by the id column
 * @method array findByStudent(int $student) Return Rentals objects filtered by the student column
 * @method array findByFaculty(int $faculty) Return Rentals objects filtered by the faculty column
 * @method array findByItem(int $item) Return Rentals objects filtered by the item column
 * @method array findByOutDate(string $out_date) Return Rentals objects filtered by the out_date column
 * @method array findByDueDate(string $due_date) Return Rentals objects filtered by the due_date column
 * @method array findByStatus(string $status) Return Rentals objects filtered by the status column
 * @method array findByComments(string $comments) Return Rentals objects filtered by the comments column
 *
 * @package    propel.generator.VCP279.om
 */
abstract class BaseRentalsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRentalsQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'vcp279';
        }
        if (null === $modelName) {
            $modelName = 'Rentals';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RentalsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RentalsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RentalsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RentalsQuery) {
            return $criteria;
        }
        $query = new RentalsQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query 
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Rentals|Rentals[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RentalsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RentalsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Rentals A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Rentals A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `student`, `faculty`, `item`, `out_date`, `due_date`, `status`, `comments` FROM `rentals` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Rentals();
            $obj->hydrate($row);
            RentalsPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Rentals|Rentals[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Rentals[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RentalsPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RentalsPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RentalsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RentalsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RentalsPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the student column
     *
     * Example usage:
     * <code>
     * $query->filterByStudent(1234); // WHERE student = 1234
     * $query->filterByStudent(array(12, 34)); // WHERE student IN (12, 34)
     * $query->filterByStudent(array('min' => 12)); // WHERE student >= 12
     * $query->filterByStudent(array('max' => 12)); // WHERE student <= 12
     * </code>
     *
     * @see       filterByPersonRelatedByStudent()
     *
     * @param     mixed $student The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function filterByStudent($student = null, $comparison = null)
    {
        if (is_array($student)) {
            $useMinMax = false;
            if (isset($student['min'])) {
                $this->addUsingAlias(RentalsPeer::STUDENT, $student['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($student['max'])) {
                $this->addUsingAlias(RentalsPeer::STUDENT, $student['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RentalsPeer::STUDENT, $student, $comparison);
    }

    /**
     * Filter the query on the faculty column
     *
     * Example usage:
     * <code>
     * $query->filterByFaculty(1234); // WHERE faculty = 1234
     * $query->filterByFaculty(array(12, 34)); // WHERE faculty IN (12, 34)
     * $query->filterByFaculty(array('min' => 12)); // WHERE faculty >= 12
     * $query->filterByFaculty(array('max' => 12)); // WHERE faculty <= 12
     * </code>
     *
     * @see       filterByPersonRelatedByFaculty()
     *
     * @param     mixed $faculty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function filterByFaculty($faculty = null, $comparison = null)
    {
        if (is_array($faculty)) {
            $useMinMax = false;
            if (isset($faculty['min'])) {
                $this->addUsingAlias(RentalsPeer::FACULTY, $faculty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($faculty['max'])) {
                $this->addUsingAlias(RentalsPeer::FACULTY, $faculty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RentalsPeer::FACULTY, $faculty, $comparison);
    }

    /**
     * Filter the query on the item column
     *
     * Example usage:
     * <code>
     * $query->filterByItem(1234); // WHERE item = 1234
     * $query->filterByItem(array(12, 34)); // WHERE item IN (12, 34)
     * $query->filterByItem(array('min' => 12)); // WHERE item >= 12
     * $query->filterByItem(array('max' => 12)); // WHERE item <= 12
     * </code>
     *
     * @see       filterByEquipment()
     *
     * @param     mixed $item The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function filterByItem($item = null, $comparison = null)
    {
        if (is_array($item)) {
            $useMinMax = false;
            if (isset($item['min'])) {
                $this->addUsingAlias(RentalsPeer::ITEM, $item['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($item['max'])) {
                $this->addUsingAlias(RentalsPeer::ITEM, $item['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RentalsPeer::ITEM, $item, $comparison);
    }

    /**
     * Filter the query on the out_date column
     *
     * Example usage:
     * <code>
     * $query->filterByOutDate('2011-03-14'); // WHERE out_date = '2011-03-14'
     * $query->filterByOutDate('now'); // WHERE out_date = '2011-03-14'
     * $query->filterByOutDate(array('max' => 'yesterday')); // WHERE out_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $outDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function filterByOutDate($outDate = null, $comparison = null)
    {
        if (is_array($outDate)) {
            $useMinMax = false;
            if (isset($outDate['min'])) {
                $this->addUsingAlias(RentalsPeer::OUT_DATE, $outDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outDate['max'])) {
                $this->addUsingAlias(RentalsPeer::OUT_DATE, $outDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RentalsPeer::OUT_DATE, $outDate, $comparison);
    }

    /**
     * Filter the query on the due_date column
     *
     * Example usage:
     * <code>
     * $query->filterByDueDate('2011-03-14'); // WHERE due_date = '2011-03-14'
     * $query->filterByDueDate('now'); // WHERE due_date = '2011-03-14'
     * $query->filterByDueDate(array('max' => 'yesterday')); // WHERE due_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $dueDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function filterByDueDate($dueDate = null, $comparison = null)
    {
        if (is_array($dueDate)) {
            $useMinMax = false;
            if (isset($dueDate['min'])) {
                $this->addUsingAlias(RentalsPeer::DUE_DATE, $dueDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dueDate['max'])) {
                $this->addUsingAlias(RentalsPeer::DUE_DATE, $dueDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RentalsPeer::DUE_DATE, $dueDate, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $status)) {
                $status = str_replace('*', '%', $status);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RentalsPeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the comments column
     *
     * Example usage:
     * <code>
     * $query->filterByComments('fooValue');   // WHERE comments = 'fooValue'
     * $query->filterByComments('%fooValue%'); // WHERE comments LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comments The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function filterByComments($comments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comments)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comments)) {
                $comments = str_replace('*', '%', $comments);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RentalsPeer::COMMENTS, $comments, $comparison);
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RentalsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByStudent($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(RentalsPeer::STUDENT, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RentalsPeer::STUDENT, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersonRelatedByStudent() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonRelatedByStudent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function joinPersonRelatedByStudent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonRelatedByStudent');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PersonRelatedByStudent');
        }

        return $this;
    }

    /**
     * Use the PersonRelatedByStudent relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonRelatedByStudentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersonRelatedByStudent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonRelatedByStudent', 'PersonQuery');
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RentalsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByFaculty($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(RentalsPeer::FACULTY, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RentalsPeer::FACULTY, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersonRelatedByFaculty() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonRelatedByFaculty relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function joinPersonRelatedByFaculty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonRelatedByFaculty');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PersonRelatedByFaculty');
        }

        return $this;
    }

    /**
     * Use the PersonRelatedByFaculty relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonRelatedByFacultyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersonRelatedByFaculty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonRelatedByFaculty', 'PersonQuery');
    }

    /**
     * Filter the query by a related Equipment object
     *
     * @param   Equipment|PropelObjectCollection $equipment The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RentalsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEquipment($equipment, $comparison = null)
    {
        if ($equipment instanceof Equipment) {
            return $this
                ->addUsingAlias(RentalsPeer::ITEM, $equipment->getId(), $comparison);
        } elseif ($equipment instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RentalsPeer::ITEM, $equipment->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEquipment() only accepts arguments of type Equipment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Equipment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function joinEquipment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Equipment');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Equipment');
        }

        return $this;
    }

    /**
     * Use the Equipment relation Equipment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EquipmentQuery A secondary query class using the current class as primary query
     */
    public function useEquipmentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEquipment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Equipment', 'EquipmentQuery');
    }

    /**
     * Filter the query by a related rentalStatus object
     *
     * @param   rentalStatus|PropelObjectCollection $rentalStatus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RentalsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByrentalStatus($rentalStatus, $comparison = null)
    {
        if ($rentalStatus instanceof rentalStatus) {
            return $this
                ->addUsingAlias(RentalsPeer::STATUS, $rentalStatus->getStatus(), $comparison);
        } elseif ($rentalStatus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RentalsPeer::STATUS, $rentalStatus->toKeyValue('PrimaryKey', 'Status'), $comparison);
        } else {
            throw new PropelException('filterByrentalStatus() only accepts arguments of type rentalStatus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the rentalStatus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function joinrentalStatus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('rentalStatus');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'rentalStatus');
        }

        return $this;
    }

    /**
     * Use the rentalStatus relation rentalStatus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   rentalStatusQuery A secondary query class using the current class as primary query
     */
    public function userentalStatusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinrentalStatus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'rentalStatus', 'rentalStatusQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rentals $rentals Object to remove from the list of results
     *
     * @return RentalsQuery The current query, for fluid interface
     */
    public function prune($rentals = null)
    {
        if ($rentals) {
            $this->addUsingAlias(RentalsPeer::ID, $rentals->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
