<?php


/**
 * Base class that represents a query for the 'enrollment' table.
 *
 * 
 *
 * @method EnrollmentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EnrollmentQuery orderByStudent($order = Criteria::ASC) Order by the student column
 * @method EnrollmentQuery orderByClassId($order = Criteria::ASC) Order by the class_id column
 *
 * @method EnrollmentQuery groupById() Group by the id column
 * @method EnrollmentQuery groupByStudent() Group by the student column
 * @method EnrollmentQuery groupByClassId() Group by the class_id column
 *
 * @method EnrollmentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EnrollmentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EnrollmentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EnrollmentQuery leftJoinPerson($relationAlias = null) Adds a LEFT JOIN clause to the query using the Person relation
 * @method EnrollmentQuery rightJoinPerson($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Person relation
 * @method EnrollmentQuery innerJoinPerson($relationAlias = null) Adds a INNER JOIN clause to the query using the Person relation
 *
 * @method EnrollmentQuery leftJoinClasses($relationAlias = null) Adds a LEFT JOIN clause to the query using the Classes relation
 * @method EnrollmentQuery rightJoinClasses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Classes relation
 * @method EnrollmentQuery innerJoinClasses($relationAlias = null) Adds a INNER JOIN clause to the query using the Classes relation
 *
 * @method Enrollment findOne(PropelPDO $con = null) Return the first Enrollment matching the query
 * @method Enrollment findOneOrCreate(PropelPDO $con = null) Return the first Enrollment matching the query, or a new Enrollment object populated from the query conditions when no match is found
 *
 * @method Enrollment findOneByStudent(int $student) Return the first Enrollment filtered by the student column
 * @method Enrollment findOneByClassId(int $class_id) Return the first Enrollment filtered by the class_id column
 *
 * @method array findById(int $id) Return Enrollment objects filtered by the id column
 * @method array findByStudent(int $student) Return Enrollment objects filtered by the student column
 * @method array findByClassId(int $class_id) Return Enrollment objects filtered by the class_id column
 *
 * @package    propel.generator.VCP279.om
 */
abstract class BaseEnrollmentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEnrollmentQuery object.
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
            $modelName = 'Enrollment';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EnrollmentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EnrollmentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EnrollmentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EnrollmentQuery) {
            return $criteria;
        }
        $query = new EnrollmentQuery(null, null, $modelAlias);

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
     * @return   Enrollment|Enrollment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EnrollmentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EnrollmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Enrollment A model object, or null if the key is not found
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
     * @return                 Enrollment A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `student`, `class_id` FROM `enrollment` WHERE `id` = :p0';
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
            $obj = new Enrollment();
            $obj->hydrate($row);
            EnrollmentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Enrollment|Enrollment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Enrollment[]|mixed the list of results, formatted by the current formatter
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
     * @return EnrollmentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EnrollmentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EnrollmentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EnrollmentPeer::ID, $keys, Criteria::IN);
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
     * @return EnrollmentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EnrollmentPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EnrollmentPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnrollmentPeer::ID, $id, $comparison);
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
     * @see       filterByPerson()
     *
     * @param     mixed $student The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EnrollmentQuery The current query, for fluid interface
     */
    public function filterByStudent($student = null, $comparison = null)
    {
        if (is_array($student)) {
            $useMinMax = false;
            if (isset($student['min'])) {
                $this->addUsingAlias(EnrollmentPeer::STUDENT, $student['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($student['max'])) {
                $this->addUsingAlias(EnrollmentPeer::STUDENT, $student['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnrollmentPeer::STUDENT, $student, $comparison);
    }

    /**
     * Filter the query on the class_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClassId(1234); // WHERE class_id = 1234
     * $query->filterByClassId(array(12, 34)); // WHERE class_id IN (12, 34)
     * $query->filterByClassId(array('min' => 12)); // WHERE class_id >= 12
     * $query->filterByClassId(array('max' => 12)); // WHERE class_id <= 12
     * </code>
     *
     * @see       filterByClasses()
     *
     * @param     mixed $classId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EnrollmentQuery The current query, for fluid interface
     */
    public function filterByClassId($classId = null, $comparison = null)
    {
        if (is_array($classId)) {
            $useMinMax = false;
            if (isset($classId['min'])) {
                $this->addUsingAlias(EnrollmentPeer::CLASS_ID, $classId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($classId['max'])) {
                $this->addUsingAlias(EnrollmentPeer::CLASS_ID, $classId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EnrollmentPeer::CLASS_ID, $classId, $comparison);
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EnrollmentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPerson($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(EnrollmentPeer::STUDENT, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EnrollmentPeer::STUDENT, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPerson() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Person relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EnrollmentQuery The current query, for fluid interface
     */
    public function joinPerson($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Person');

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
            $this->addJoinObject($join, 'Person');
        }

        return $this;
    }

    /**
     * Use the Person relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPerson($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Person', 'PersonQuery');
    }

    /**
     * Filter the query by a related Classes object
     *
     * @param   Classes|PropelObjectCollection $classes The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EnrollmentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClasses($classes, $comparison = null)
    {
        if ($classes instanceof Classes) {
            return $this
                ->addUsingAlias(EnrollmentPeer::CLASS_ID, $classes->getId(), $comparison);
        } elseif ($classes instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EnrollmentPeer::CLASS_ID, $classes->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByClasses() only accepts arguments of type Classes or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Classes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EnrollmentQuery The current query, for fluid interface
     */
    public function joinClasses($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Classes');

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
            $this->addJoinObject($join, 'Classes');
        }

        return $this;
    }

    /**
     * Use the Classes relation Classes object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ClassesQuery A secondary query class using the current class as primary query
     */
    public function useClassesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClasses($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Classes', 'ClassesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Enrollment $enrollment Object to remove from the list of results
     *
     * @return EnrollmentQuery The current query, for fluid interface
     */
    public function prune($enrollment = null)
    {
        if ($enrollment) {
            $this->addUsingAlias(EnrollmentPeer::ID, $enrollment->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
