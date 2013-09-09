<?php


/**
 * Base class that represents a query for the 'equipment_status' table.
 *
 * 
 *
 * @method equipmentStatusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method equipmentStatusQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method equipmentStatusQuery groupById() Group by the id column
 * @method equipmentStatusQuery groupByStatus() Group by the status column
 *
 * @method equipmentStatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method equipmentStatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method equipmentStatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method equipmentStatusQuery leftJoinEquipment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Equipment relation
 * @method equipmentStatusQuery rightJoinEquipment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Equipment relation
 * @method equipmentStatusQuery innerJoinEquipment($relationAlias = null) Adds a INNER JOIN clause to the query using the Equipment relation
 *
 * @method equipmentStatus findOne(PropelPDO $con = null) Return the first equipmentStatus matching the query
 * @method equipmentStatus findOneOrCreate(PropelPDO $con = null) Return the first equipmentStatus matching the query, or a new equipmentStatus object populated from the query conditions when no match is found
 *
 * @method equipmentStatus findOneByStatus(int $status) Return the first equipmentStatus filtered by the status column
 *
 * @method array findById(int $id) Return equipmentStatus objects filtered by the id column
 * @method array findByStatus(int $status) Return equipmentStatus objects filtered by the status column
 *
 * @package    propel.generator.VCP279.om
 */
abstract class BaseequipmentStatusQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseequipmentStatusQuery object.
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
            $modelName = 'equipmentStatus';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new equipmentStatusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   equipmentStatusQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return equipmentStatusQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof equipmentStatusQuery) {
            return $criteria;
        }
        $query = new equipmentStatusQuery(null, null, $modelAlias);

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
     * @return   equipmentStatus|equipmentStatus[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = equipmentStatusPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(equipmentStatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 equipmentStatus A model object, or null if the key is not found
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
     * @return                 equipmentStatus A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `status` FROM `equipment_status` WHERE `id` = :p0';
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
            $obj = new equipmentStatus();
            $obj->hydrate($row);
            equipmentStatusPeer::addInstanceToPool($obj, (string) $key);
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
     * @return equipmentStatus|equipmentStatus[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|equipmentStatus[]|mixed the list of results, formatted by the current formatter
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
     * @return equipmentStatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(equipmentStatusPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return equipmentStatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(equipmentStatusPeer::ID, $keys, Criteria::IN);
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
     * @return equipmentStatusQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(equipmentStatusPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(equipmentStatusPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(equipmentStatusPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * @param     mixed $status The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return equipmentStatusQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_scalar($status)) {
            $status = equipmentStatusPeer::getSqlValueForEnum(equipmentStatusPeer::STATUS, $status);
        } elseif (is_array($status)) {
            $convertedValues = array();
            foreach ($status as $value) {
                $convertedValues[] = equipmentStatusPeer::getSqlValueForEnum(equipmentStatusPeer::STATUS, $value);
            }
            $status = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(equipmentStatusPeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related Equipment object
     *
     * @param   Equipment|PropelObjectCollection $equipment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 equipmentStatusQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEquipment($equipment, $comparison = null)
    {
        if ($equipment instanceof Equipment) {
            return $this
                ->addUsingAlias(equipmentStatusPeer::STATUS, $equipment->getItemStatus(), $comparison);
        } elseif ($equipment instanceof PropelObjectCollection) {
            return $this
                ->useEquipmentQuery()
                ->filterByPrimaryKeys($equipment->getPrimaryKeys())
                ->endUse();
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
     * @return equipmentStatusQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   equipmentStatus $equipmentStatus Object to remove from the list of results
     *
     * @return equipmentStatusQuery The current query, for fluid interface
     */
    public function prune($equipmentStatus = null)
    {
        if ($equipmentStatus) {
            $this->addUsingAlias(equipmentStatusPeer::ID, $equipmentStatus->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
