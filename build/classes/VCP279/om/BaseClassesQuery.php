<?php


/**
 * Base class that represents a query for the 'classes' table.
 *
 * 
 *
 * @method ClassesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ClassesQuery orderByClassId($order = Criteria::ASC) Order by the class_id column
 * @method ClassesQuery orderByClassName($order = Criteria::ASC) Order by the class_name column
 *
 * @method ClassesQuery groupById() Group by the id column
 * @method ClassesQuery groupByClassId() Group by the class_id column
 * @method ClassesQuery groupByClassName() Group by the class_name column
 *
 * @method ClassesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClassesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClassesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClassesQuery leftJoinEnrollment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Enrollment relation
 * @method ClassesQuery rightJoinEnrollment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Enrollment relation
 * @method ClassesQuery innerJoinEnrollment($relationAlias = null) Adds a INNER JOIN clause to the query using the Enrollment relation
 *
 * @method Classes findOne(PropelPDO $con = null) Return the first Classes matching the query
 * @method Classes findOneOrCreate(PropelPDO $con = null) Return the first Classes matching the query, or a new Classes object populated from the query conditions when no match is found
 *
 * @method Classes findOneByClassId(string $class_id) Return the first Classes filtered by the class_id column
 * @method Classes findOneByClassName(string $class_name) Return the first Classes filtered by the class_name column
 *
 * @method array findById(int $id) Return Classes objects filtered by the id column
 * @method array findByClassId(string $class_id) Return Classes objects filtered by the class_id column
 * @method array findByClassName(string $class_name) Return Classes objects filtered by the class_name column
 *
 * @package    propel.generator.VCP279.om
 */
abstract class BaseClassesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClassesQuery object.
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
            $modelName = 'Classes';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClassesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClassesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClassesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClassesQuery) {
            return $criteria;
        }
        $query = new ClassesQuery(null, null, $modelAlias);

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
     * @return   Classes|Classes[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClassesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClassesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Classes A model object, or null if the key is not found
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
     * @return                 Classes A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `class_id`, `class_name` FROM `classes` WHERE `id` = :p0';
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
            $obj = new Classes();
            $obj->hydrate($row);
            ClassesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Classes|Classes[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Classes[]|mixed the list of results, formatted by the current formatter
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
     * @return ClassesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClassesPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClassesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClassesPeer::ID, $keys, Criteria::IN);
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
     * @return ClassesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClassesPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClassesPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClassesPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the class_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClassId('fooValue');   // WHERE class_id = 'fooValue'
     * $query->filterByClassId('%fooValue%'); // WHERE class_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $classId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClassesQuery The current query, for fluid interface
     */
    public function filterByClassId($classId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($classId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $classId)) {
                $classId = str_replace('*', '%', $classId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClassesPeer::CLASS_ID, $classId, $comparison);
    }

    /**
     * Filter the query on the class_name column
     *
     * Example usage:
     * <code>
     * $query->filterByClassName('fooValue');   // WHERE class_name = 'fooValue'
     * $query->filterByClassName('%fooValue%'); // WHERE class_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $className The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClassesQuery The current query, for fluid interface
     */
    public function filterByClassName($className = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($className)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $className)) {
                $className = str_replace('*', '%', $className);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClassesPeer::CLASS_NAME, $className, $comparison);
    }

    /**
     * Filter the query by a related Enrollment object
     *
     * @param   Enrollment|PropelObjectCollection $enrollment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClassesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEnrollment($enrollment, $comparison = null)
    {
        if ($enrollment instanceof Enrollment) {
            return $this
                ->addUsingAlias(ClassesPeer::ID, $enrollment->getClassId(), $comparison);
        } elseif ($enrollment instanceof PropelObjectCollection) {
            return $this
                ->useEnrollmentQuery()
                ->filterByPrimaryKeys($enrollment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEnrollment() only accepts arguments of type Enrollment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Enrollment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClassesQuery The current query, for fluid interface
     */
    public function joinEnrollment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Enrollment');

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
            $this->addJoinObject($join, 'Enrollment');
        }

        return $this;
    }

    /**
     * Use the Enrollment relation Enrollment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EnrollmentQuery A secondary query class using the current class as primary query
     */
    public function useEnrollmentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEnrollment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Enrollment', 'EnrollmentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Classes $classes Object to remove from the list of results
     *
     * @return ClassesQuery The current query, for fluid interface
     */
    public function prune($classes = null)
    {
        if ($classes) {
            $this->addUsingAlias(ClassesPeer::ID, $classes->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
