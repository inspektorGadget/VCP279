<?php


/**
 * Base class that represents a query for the 'person' table.
 *
 * 
 *
 * @method PersonQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PersonQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method PersonQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method PersonQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method PersonQuery orderByAddressLineOne($order = Criteria::ASC) Order by the address_line_one column
 * @method PersonQuery orderByAddressLineTwo($order = Criteria::ASC) Order by the address_line_two column
 * @method PersonQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method PersonQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method PersonQuery orderByStudentId($order = Criteria::ASC) Order by the student_id column
 * @method PersonQuery orderByUserType($order = Criteria::ASC) Order by the user_type column
 *
 * @method PersonQuery groupById() Group by the id column
 * @method PersonQuery groupByFirstName() Group by the first_name column
 * @method PersonQuery groupByLastName() Group by the last_name column
 * @method PersonQuery groupByEmail() Group by the email column
 * @method PersonQuery groupByAddressLineOne() Group by the address_line_one column
 * @method PersonQuery groupByAddressLineTwo() Group by the address_line_two column
 * @method PersonQuery groupByState() Group by the state column
 * @method PersonQuery groupByZip() Group by the zip column
 * @method PersonQuery groupByStudentId() Group by the student_id column
 * @method PersonQuery groupByUserType() Group by the user_type column
 *
 * @method PersonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PersonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PersonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PersonQuery leftJoinUserTypes($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserTypes relation
 * @method PersonQuery rightJoinUserTypes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserTypes relation
 * @method PersonQuery innerJoinUserTypes($relationAlias = null) Adds a INNER JOIN clause to the query using the UserTypes relation
 *
 * @method PersonQuery leftJoinRentalsRelatedByStudent($relationAlias = null) Adds a LEFT JOIN clause to the query using the RentalsRelatedByStudent relation
 * @method PersonQuery rightJoinRentalsRelatedByStudent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RentalsRelatedByStudent relation
 * @method PersonQuery innerJoinRentalsRelatedByStudent($relationAlias = null) Adds a INNER JOIN clause to the query using the RentalsRelatedByStudent relation
 *
 * @method PersonQuery leftJoinRentalsRelatedByFaculty($relationAlias = null) Adds a LEFT JOIN clause to the query using the RentalsRelatedByFaculty relation
 * @method PersonQuery rightJoinRentalsRelatedByFaculty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RentalsRelatedByFaculty relation
 * @method PersonQuery innerJoinRentalsRelatedByFaculty($relationAlias = null) Adds a INNER JOIN clause to the query using the RentalsRelatedByFaculty relation
 *
 * @method PersonQuery leftJoinEnrollment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Enrollment relation
 * @method PersonQuery rightJoinEnrollment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Enrollment relation
 * @method PersonQuery innerJoinEnrollment($relationAlias = null) Adds a INNER JOIN clause to the query using the Enrollment relation
 *
 * @method Person findOne(PropelPDO $con = null) Return the first Person matching the query
 * @method Person findOneOrCreate(PropelPDO $con = null) Return the first Person matching the query, or a new Person object populated from the query conditions when no match is found
 *
 * @method Person findOneByFirstName(string $first_name) Return the first Person filtered by the first_name column
 * @method Person findOneByLastName(string $last_name) Return the first Person filtered by the last_name column
 * @method Person findOneByEmail(string $email) Return the first Person filtered by the email column
 * @method Person findOneByAddressLineOne(string $address_line_one) Return the first Person filtered by the address_line_one column
 * @method Person findOneByAddressLineTwo(string $address_line_two) Return the first Person filtered by the address_line_two column
 * @method Person findOneByState(string $state) Return the first Person filtered by the state column
 * @method Person findOneByZip(int $zip) Return the first Person filtered by the zip column
 * @method Person findOneByStudentId(string $student_id) Return the first Person filtered by the student_id column
 * @method Person findOneByUserType(string $user_type) Return the first Person filtered by the user_type column
 *
 * @method array findById(int $id) Return Person objects filtered by the id column
 * @method array findByFirstName(string $first_name) Return Person objects filtered by the first_name column
 * @method array findByLastName(string $last_name) Return Person objects filtered by the last_name column
 * @method array findByEmail(string $email) Return Person objects filtered by the email column
 * @method array findByAddressLineOne(string $address_line_one) Return Person objects filtered by the address_line_one column
 * @method array findByAddressLineTwo(string $address_line_two) Return Person objects filtered by the address_line_two column
 * @method array findByState(string $state) Return Person objects filtered by the state column
 * @method array findByZip(int $zip) Return Person objects filtered by the zip column
 * @method array findByStudentId(string $student_id) Return Person objects filtered by the student_id column
 * @method array findByUserType(string $user_type) Return Person objects filtered by the user_type column
 *
 * @package    propel.generator.VCP279.om
 */
abstract class BasePersonQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePersonQuery object.
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
            $modelName = 'Person';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PersonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PersonQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PersonQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PersonQuery) {
            return $criteria;
        }
        $query = new PersonQuery(null, null, $modelAlias);

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
     * @return   Person|Person[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PersonPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Person A model object, or null if the key is not found
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
     * @return                 Person A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `first_name`, `last_name`, `email`, `address_line_one`, `address_line_two`, `state`, `zip`, `student_id`, `user_type` FROM `person` WHERE `id` = :p0';
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
            $obj = new Person();
            $obj->hydrate($row);
            PersonPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Person|Person[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Person[]|mixed the list of results, formatted by the current formatter
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersonPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersonPeer::ID, $keys, Criteria::IN);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PersonPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PersonPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%'); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstName)) {
                $firstName = str_replace('*', '%', $firstName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%'); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastName)) {
                $lastName = str_replace('*', '%', $lastName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the address_line_one column
     *
     * Example usage:
     * <code>
     * $query->filterByAddressLineOne('fooValue');   // WHERE address_line_one = 'fooValue'
     * $query->filterByAddressLineOne('%fooValue%'); // WHERE address_line_one LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addressLineOne The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByAddressLineOne($addressLineOne = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addressLineOne)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addressLineOne)) {
                $addressLineOne = str_replace('*', '%', $addressLineOne);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::ADDRESS_LINE_ONE, $addressLineOne, $comparison);
    }

    /**
     * Filter the query on the address_line_two column
     *
     * Example usage:
     * <code>
     * $query->filterByAddressLineTwo('fooValue');   // WHERE address_line_two = 'fooValue'
     * $query->filterByAddressLineTwo('%fooValue%'); // WHERE address_line_two LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addressLineTwo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByAddressLineTwo($addressLineTwo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addressLineTwo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addressLineTwo)) {
                $addressLineTwo = str_replace('*', '%', $addressLineTwo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::ADDRESS_LINE_TWO, $addressLineTwo, $comparison);
    }

    /**
     * Filter the query on the state column
     *
     * Example usage:
     * <code>
     * $query->filterByState('fooValue');   // WHERE state = 'fooValue'
     * $query->filterByState('%fooValue%'); // WHERE state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $state The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByState($state = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($state)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $state)) {
                $state = str_replace('*', '%', $state);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::STATE, $state, $comparison);
    }

    /**
     * Filter the query on the zip column
     *
     * Example usage:
     * <code>
     * $query->filterByZip(1234); // WHERE zip = 1234
     * $query->filterByZip(array(12, 34)); // WHERE zip IN (12, 34)
     * $query->filterByZip(array('min' => 12)); // WHERE zip >= 12
     * $query->filterByZip(array('max' => 12)); // WHERE zip <= 12
     * </code>
     *
     * @param     mixed $zip The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByZip($zip = null, $comparison = null)
    {
        if (is_array($zip)) {
            $useMinMax = false;
            if (isset($zip['min'])) {
                $this->addUsingAlias(PersonPeer::ZIP, $zip['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($zip['max'])) {
                $this->addUsingAlias(PersonPeer::ZIP, $zip['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::ZIP, $zip, $comparison);
    }

    /**
     * Filter the query on the student_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStudentId('fooValue');   // WHERE student_id = 'fooValue'
     * $query->filterByStudentId('%fooValue%'); // WHERE student_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $studentId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByStudentId($studentId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($studentId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $studentId)) {
                $studentId = str_replace('*', '%', $studentId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::STUDENT_ID, $studentId, $comparison);
    }

    /**
     * Filter the query on the user_type column
     *
     * Example usage:
     * <code>
     * $query->filterByUserType('fooValue');   // WHERE user_type = 'fooValue'
     * $query->filterByUserType('%fooValue%'); // WHERE user_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $userType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByUserType($userType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $userType)) {
                $userType = str_replace('*', '%', $userType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::USER_TYPE, $userType, $comparison);
    }

    /**
     * Filter the query by a related UserTypes object
     *
     * @param   UserTypes|PropelObjectCollection $userTypes The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserTypes($userTypes, $comparison = null)
    {
        if ($userTypes instanceof UserTypes) {
            return $this
                ->addUsingAlias(PersonPeer::USER_TYPE, $userTypes->getUserCategory(), $comparison);
        } elseif ($userTypes instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PersonPeer::USER_TYPE, $userTypes->toKeyValue('PrimaryKey', 'UserCategory'), $comparison);
        } else {
            throw new PropelException('filterByUserTypes() only accepts arguments of type UserTypes or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserTypes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinUserTypes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserTypes');

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
            $this->addJoinObject($join, 'UserTypes');
        }

        return $this;
    }

    /**
     * Use the UserTypes relation UserTypes object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserTypesQuery A secondary query class using the current class as primary query
     */
    public function useUserTypesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUserTypes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserTypes', 'UserTypesQuery');
    }

    /**
     * Filter the query by a related Rentals object
     *
     * @param   Rentals|PropelObjectCollection $rentals  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRentalsRelatedByStudent($rentals, $comparison = null)
    {
        if ($rentals instanceof Rentals) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $rentals->getStudent(), $comparison);
        } elseif ($rentals instanceof PropelObjectCollection) {
            return $this
                ->useRentalsRelatedByStudentQuery()
                ->filterByPrimaryKeys($rentals->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRentalsRelatedByStudent() only accepts arguments of type Rentals or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RentalsRelatedByStudent relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinRentalsRelatedByStudent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RentalsRelatedByStudent');

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
            $this->addJoinObject($join, 'RentalsRelatedByStudent');
        }

        return $this;
    }

    /**
     * Use the RentalsRelatedByStudent relation Rentals object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RentalsQuery A secondary query class using the current class as primary query
     */
    public function useRentalsRelatedByStudentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRentalsRelatedByStudent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RentalsRelatedByStudent', 'RentalsQuery');
    }

    /**
     * Filter the query by a related Rentals object
     *
     * @param   Rentals|PropelObjectCollection $rentals  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRentalsRelatedByFaculty($rentals, $comparison = null)
    {
        if ($rentals instanceof Rentals) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $rentals->getFaculty(), $comparison);
        } elseif ($rentals instanceof PropelObjectCollection) {
            return $this
                ->useRentalsRelatedByFacultyQuery()
                ->filterByPrimaryKeys($rentals->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRentalsRelatedByFaculty() only accepts arguments of type Rentals or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RentalsRelatedByFaculty relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinRentalsRelatedByFaculty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RentalsRelatedByFaculty');

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
            $this->addJoinObject($join, 'RentalsRelatedByFaculty');
        }

        return $this;
    }

    /**
     * Use the RentalsRelatedByFaculty relation Rentals object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   RentalsQuery A secondary query class using the current class as primary query
     */
    public function useRentalsRelatedByFacultyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRentalsRelatedByFaculty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RentalsRelatedByFaculty', 'RentalsQuery');
    }

    /**
     * Filter the query by a related Enrollment object
     *
     * @param   Enrollment|PropelObjectCollection $enrollment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEnrollment($enrollment, $comparison = null)
    {
        if ($enrollment instanceof Enrollment) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $enrollment->getStudent(), $comparison);
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
     * @return PersonQuery The current query, for fluid interface
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
     * @param   Person $person Object to remove from the list of results
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function prune($person = null)
    {
        if ($person) {
            $this->addUsingAlias(PersonPeer::ID, $person->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
