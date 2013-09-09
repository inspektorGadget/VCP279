<?php


/**
 * Base class that represents a query for the 'equipment' table.
 *
 * 
 *
 * @method EquipmentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EquipmentQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method EquipmentQuery orderBySerial($order = Criteria::ASC) Order by the serial column
 * @method EquipmentQuery orderByPurchaseDate($order = Criteria::ASC) Order by the purchase_date column
 * @method EquipmentQuery orderByItemStatus($order = Criteria::ASC) Order by the item_status column
 * @method EquipmentQuery orderByComments($order = Criteria::ASC) Order by the comments column
 *
 * @method EquipmentQuery groupById() Group by the id column
 * @method EquipmentQuery groupByName() Group by the name column
 * @method EquipmentQuery groupBySerial() Group by the serial column
 * @method EquipmentQuery groupByPurchaseDate() Group by the purchase_date column
 * @method EquipmentQuery groupByItemStatus() Group by the item_status column
 * @method EquipmentQuery groupByComments() Group by the comments column
 *
 * @method EquipmentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EquipmentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EquipmentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EquipmentQuery leftJoinequipmentStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the equipmentStatus relation
 * @method EquipmentQuery rightJoinequipmentStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the equipmentStatus relation
 * @method EquipmentQuery innerJoinequipmentStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the equipmentStatus relation
 *
 * @method EquipmentQuery leftJoinRentals($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rentals relation
 * @method EquipmentQuery rightJoinRentals($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rentals relation
 * @method EquipmentQuery innerJoinRentals($relationAlias = null) Adds a INNER JOIN clause to the query using the Rentals relation
 *
 * @method Equipment findOne(PropelPDO $con = null) Return the first Equipment matching the query
 * @method Equipment findOneOrCreate(PropelPDO $con = null) Return the first Equipment matching the query, or a new Equipment object populated from the query conditions when no match is found
 *
 * @method Equipment findOneByName(string $name) Return the first Equipment filtered by the name column
 * @method Equipment findOneBySerial(string $serial) Return the first Equipment filtered by the serial column
 * @method Equipment findOneByPurchaseDate(string $purchase_date) Return the first Equipment filtered by the purchase_date column
 * @method Equipment findOneByItemStatus(string $item_status) Return the first Equipment filtered by the item_status column
 * @method Equipment findOneByComments(string $comments) Return the first Equipment filtered by the comments column
 *
 * @method array findById(int $id) Return Equipment objects filtered by the id column
 * @method array findByName(string $name) Return Equipment objects filtered by the name column
 * @method array findBySerial(string $serial) Return Equipment objects filtered by the serial column
 * @method array findByPurchaseDate(string $purchase_date) Return Equipment objects filtered by the purchase_date column
 * @method array findByItemStatus(string $item_status) Return Equipment objects filtered by the item_status column
 * @method array findByComments(string $comments) Return Equipment objects filtered by the comments column
 *
 * @package    propel.generator.VCP279.om
 */
abstract class BaseEquipmentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEquipmentQuery object.
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
            $modelName = 'Equipment';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EquipmentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EquipmentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EquipmentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EquipmentQuery) {
            return $criteria;
        }
        $query = new EquipmentQuery(null, null, $modelAlias);

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
     * @return   Equipment|Equipment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EquipmentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EquipmentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Equipment A model object, or null if the key is not found
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
     * @return                 Equipment A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `serial`, `purchase_date`, `item_status`, `comments` FROM `equipment` WHERE `id` = :p0';
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
            $obj = new Equipment();
            $obj->hydrate($row);
            EquipmentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Equipment|Equipment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Equipment[]|mixed the list of results, formatted by the current formatter
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
     * @return EquipmentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EquipmentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EquipmentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EquipmentPeer::ID, $keys, Criteria::IN);
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
     * @return EquipmentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EquipmentPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EquipmentPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EquipmentPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EquipmentQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EquipmentPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the serial column
     *
     * Example usage:
     * <code>
     * $query->filterBySerial('fooValue');   // WHERE serial = 'fooValue'
     * $query->filterBySerial('%fooValue%'); // WHERE serial LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serial The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EquipmentQuery The current query, for fluid interface
     */
    public function filterBySerial($serial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serial)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serial)) {
                $serial = str_replace('*', '%', $serial);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EquipmentPeer::SERIAL, $serial, $comparison);
    }

    /**
     * Filter the query on the purchase_date column
     *
     * Example usage:
     * <code>
     * $query->filterByPurchaseDate('2011-03-14'); // WHERE purchase_date = '2011-03-14'
     * $query->filterByPurchaseDate('now'); // WHERE purchase_date = '2011-03-14'
     * $query->filterByPurchaseDate(array('max' => 'yesterday')); // WHERE purchase_date < '2011-03-13'
     * </code>
     *
     * @param     mixed $purchaseDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EquipmentQuery The current query, for fluid interface
     */
    public function filterByPurchaseDate($purchaseDate = null, $comparison = null)
    {
        if (is_array($purchaseDate)) {
            $useMinMax = false;
            if (isset($purchaseDate['min'])) {
                $this->addUsingAlias(EquipmentPeer::PURCHASE_DATE, $purchaseDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($purchaseDate['max'])) {
                $this->addUsingAlias(EquipmentPeer::PURCHASE_DATE, $purchaseDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EquipmentPeer::PURCHASE_DATE, $purchaseDate, $comparison);
    }

    /**
     * Filter the query on the item_status column
     *
     * Example usage:
     * <code>
     * $query->filterByItemStatus('fooValue');   // WHERE item_status = 'fooValue'
     * $query->filterByItemStatus('%fooValue%'); // WHERE item_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EquipmentQuery The current query, for fluid interface
     */
    public function filterByItemStatus($itemStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $itemStatus)) {
                $itemStatus = str_replace('*', '%', $itemStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EquipmentPeer::ITEM_STATUS, $itemStatus, $comparison);
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
     * @return EquipmentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EquipmentPeer::COMMENTS, $comments, $comparison);
    }

    /**
     * Filter the query by a related equipmentStatus object
     *
     * @param   equipmentStatus|PropelObjectCollection $equipmentStatus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EquipmentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByequipmentStatus($equipmentStatus, $comparison = null)
    {
        if ($equipmentStatus instanceof equipmentStatus) {
            return $this
                ->addUsingAlias(EquipmentPeer::ITEM_STATUS, $equipmentStatus->getStatus(), $comparison);
        } elseif ($equipmentStatus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EquipmentPeer::ITEM_STATUS, $equipmentStatus->toKeyValue('PrimaryKey', 'Status'), $comparison);
        } else {
            throw new PropelException('filterByequipmentStatus() only accepts arguments of type equipmentStatus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the equipmentStatus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EquipmentQuery The current query, for fluid interface
     */
    public function joinequipmentStatus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('equipmentStatus');

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
            $this->addJoinObject($join, 'equipmentStatus');
        }

        return $this;
    }

    /**
     * Use the equipmentStatus relation equipmentStatus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   equipmentStatusQuery A secondary query class using the current class as primary query
     */
    public function useequipmentStatusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinequipmentStatus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'equipmentStatus', 'equipmentStatusQuery');
    }

    /**
     * Filter the query by a related Rentals object
     *
     * @param   Rentals|PropelObjectCollection $rentals  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EquipmentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRentals($rentals, $comparison = null)
    {
        if ($rentals instanceof Rentals) {
            return $this
                ->addUsingAlias(EquipmentPeer::ID, $rentals->getItem(), $comparison);
        } elseif ($rentals instanceof PropelObjectCollection) {
            return $this
                ->useRentalsQuery()
                ->filterByPrimaryKeys($rentals->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRentals() only accepts arguments of type Rentals or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rentals relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EquipmentQuery The current query, for fluid interface
     */
    public function joinRentals($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rentals');

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
            $this->addJoinObject($join, 'Rentals');
        }

        return $this;
    }

    /**
     * Use the Rentals relation Rentals object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RentalsQuery A secondary query class using the current class as primary query
     */
    public function useRentalsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRentals($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rentals', 'RentalsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Equipment $equipment Object to remove from the list of results
     *
     * @return EquipmentQuery The current query, for fluid interface
     */
    public function prune($equipment = null)
    {
        if ($equipment) {
            $this->addUsingAlias(EquipmentPeer::ID, $equipment->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
