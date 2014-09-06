<?php


/**
 * Base class that represents a query for the 'lift' table.
 *
 *
 *
 * @method LiftQuery orderByid($order = Criteria::ASC) Order by the id column
 * @method LiftQuery orderByname($order = Criteria::ASC) Order by the name column
 * @method LiftQuery orderByopen($order = Criteria::ASC) Order by the open column
 * @method LiftQuery orderByskicenter_id($order = Criteria::ASC) Order by the skicenter_id column
 *
 * @method LiftQuery groupByid() Group by the id column
 * @method LiftQuery groupByname() Group by the name column
 * @method LiftQuery groupByopen() Group by the open column
 * @method LiftQuery groupByskicenter_id() Group by the skicenter_id column
 *
 * @method LiftQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LiftQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LiftQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method LiftQuery leftJoinSkiCenter($relationAlias = null) Adds a LEFT JOIN clause to the query using the SkiCenter relation
 * @method LiftQuery rightJoinSkiCenter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SkiCenter relation
 * @method LiftQuery innerJoinSkiCenter($relationAlias = null) Adds a INNER JOIN clause to the query using the SkiCenter relation
 *
 * @method Lift findOne(PropelPDO $con = null) Return the first Lift matching the query
 * @method Lift findOneOrCreate(PropelPDO $con = null) Return the first Lift matching the query, or a new Lift object populated from the query conditions when no match is found
 *
 * @method Lift findOneByname(string $name) Return the first Lift filtered by the name column
 * @method Lift findOneByopen(int $open) Return the first Lift filtered by the open column
 * @method Lift findOneByskicenter_id(int $skicenter_id) Return the first Lift filtered by the skicenter_id column
 *
 * @method array findByid(int $id) Return Lift objects filtered by the id column
 * @method array findByname(string $name) Return Lift objects filtered by the name column
 * @method array findByopen(int $open) Return Lift objects filtered by the open column
 * @method array findByskicenter_id(int $skicenter_id) Return Lift objects filtered by the skicenter_id column
 *
 * @package    propel.generator.skigreece.om
 */
abstract class BaseLiftQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLiftQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'skigreecedata';
        }
        if (null === $modelName) {
            $modelName = 'Lift';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LiftQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LiftQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LiftQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LiftQuery) {
            return $criteria;
        }
        $query = new LiftQuery(null, null, $modelAlias);

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
     * @return   Lift|Lift[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LiftPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LiftPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Lift A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByid($key, $con = null)
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
     * @return                 Lift A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `open`, `skicenter_id` FROM `lift` WHERE `id` = :p0';
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
            $obj = new Lift();
            $obj->hydrate($row);
            LiftPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Lift|Lift[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Lift[]|mixed the list of results, formatted by the current formatter
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
     * @return LiftQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LiftPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LiftQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LiftPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterByid(1234); // WHERE id = 1234
     * $query->filterByid(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterByid(array('min' => 12)); // WHERE id >= 12
     * $query->filterByid(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LiftQuery The current query, for fluid interface
     */
    public function filterByid($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LiftPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LiftPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LiftPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByname('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByname('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LiftQuery The current query, for fluid interface
     */
    public function filterByname($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LiftPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the open column
     *
     * Example usage:
     * <code>
     * $query->filterByopen(1234); // WHERE open = 1234
     * $query->filterByopen(array(12, 34)); // WHERE open IN (12, 34)
     * $query->filterByopen(array('min' => 12)); // WHERE open >= 12
     * $query->filterByopen(array('max' => 12)); // WHERE open <= 12
     * </code>
     *
     * @param     mixed $open The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LiftQuery The current query, for fluid interface
     */
    public function filterByopen($open = null, $comparison = null)
    {
        if (is_array($open)) {
            $useMinMax = false;
            if (isset($open['min'])) {
                $this->addUsingAlias(LiftPeer::OPEN, $open['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($open['max'])) {
                $this->addUsingAlias(LiftPeer::OPEN, $open['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LiftPeer::OPEN, $open, $comparison);
    }

    /**
     * Filter the query on the skicenter_id column
     *
     * Example usage:
     * <code>
     * $query->filterByskicenter_id(1234); // WHERE skicenter_id = 1234
     * $query->filterByskicenter_id(array(12, 34)); // WHERE skicenter_id IN (12, 34)
     * $query->filterByskicenter_id(array('min' => 12)); // WHERE skicenter_id >= 12
     * $query->filterByskicenter_id(array('max' => 12)); // WHERE skicenter_id <= 12
     * </code>
     *
     * @see       filterBySkiCenter()
     *
     * @param     mixed $skicenter_id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LiftQuery The current query, for fluid interface
     */
    public function filterByskicenter_id($skicenter_id = null, $comparison = null)
    {
        if (is_array($skicenter_id)) {
            $useMinMax = false;
            if (isset($skicenter_id['min'])) {
                $this->addUsingAlias(LiftPeer::SKICENTER_ID, $skicenter_id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($skicenter_id['max'])) {
                $this->addUsingAlias(LiftPeer::SKICENTER_ID, $skicenter_id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LiftPeer::SKICENTER_ID, $skicenter_id, $comparison);
    }

    /**
     * Filter the query by a related SkiCenter object
     *
     * @param   SkiCenter|PropelObjectCollection $skiCenter The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LiftQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySkiCenter($skiCenter, $comparison = null)
    {
        if ($skiCenter instanceof SkiCenter) {
            return $this
                ->addUsingAlias(LiftPeer::SKICENTER_ID, $skiCenter->getid(), $comparison);
        } elseif ($skiCenter instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LiftPeer::SKICENTER_ID, $skiCenter->toKeyValue('PrimaryKey', 'id'), $comparison);
        } else {
            throw new PropelException('filterBySkiCenter() only accepts arguments of type SkiCenter or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SkiCenter relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LiftQuery The current query, for fluid interface
     */
    public function joinSkiCenter($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SkiCenter');

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
            $this->addJoinObject($join, 'SkiCenter');
        }

        return $this;
    }

    /**
     * Use the SkiCenter relation SkiCenter object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SkiCenterQuery A secondary query class using the current class as primary query
     */
    public function useSkiCenterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSkiCenter($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SkiCenter', 'SkiCenterQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Lift $lift Object to remove from the list of results
     *
     * @return LiftQuery The current query, for fluid interface
     */
    public function prune($lift = null)
    {
        if ($lift) {
            $this->addUsingAlias(LiftPeer::ID, $lift->getid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
