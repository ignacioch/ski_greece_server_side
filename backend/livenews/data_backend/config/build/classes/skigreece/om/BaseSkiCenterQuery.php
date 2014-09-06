<?php


/**
 * Base class that represents a query for the 'skicenter' table.
 *
 *
 *
 * @method SkiCenterQuery orderByid($order = Criteria::ASC) Order by the id column
 * @method SkiCenterQuery orderByname($order = Criteria::ASC) Order by the name column
 * @method SkiCenterQuery orderByenglishName($order = Criteria::ASC) Order by the englishName column
 * @method SkiCenterQuery orderBysnow_down($order = Criteria::ASC) Order by the snow_down column
 * @method SkiCenterQuery orderBysnow_up($order = Criteria::ASC) Order by the snow_up column
 * @method SkiCenterQuery orderBytemp($order = Criteria::ASC) Order by the temp column
 * @method SkiCenterQuery orderBywebsite($order = Criteria::ASC) Order by the website column
 * @method SkiCenterQuery orderByweatherurl($order = Criteria::ASC) Order by the weatherurl column
 * @method SkiCenterQuery orderByopen($order = Criteria::ASC) Order by the open column
 *
 * @method SkiCenterQuery groupByid() Group by the id column
 * @method SkiCenterQuery groupByname() Group by the name column
 * @method SkiCenterQuery groupByenglishName() Group by the englishName column
 * @method SkiCenterQuery groupBysnow_down() Group by the snow_down column
 * @method SkiCenterQuery groupBysnow_up() Group by the snow_up column
 * @method SkiCenterQuery groupBytemp() Group by the temp column
 * @method SkiCenterQuery groupBywebsite() Group by the website column
 * @method SkiCenterQuery groupByweatherurl() Group by the weatherurl column
 * @method SkiCenterQuery groupByopen() Group by the open column
 *
 * @method SkiCenterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SkiCenterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SkiCenterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SkiCenterQuery leftJoinTrack($relationAlias = null) Adds a LEFT JOIN clause to the query using the Track relation
 * @method SkiCenterQuery rightJoinTrack($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Track relation
 * @method SkiCenterQuery innerJoinTrack($relationAlias = null) Adds a INNER JOIN clause to the query using the Track relation
 *
 * @method SkiCenterQuery leftJoinLift($relationAlias = null) Adds a LEFT JOIN clause to the query using the Lift relation
 * @method SkiCenterQuery rightJoinLift($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Lift relation
 * @method SkiCenterQuery innerJoinLift($relationAlias = null) Adds a INNER JOIN clause to the query using the Lift relation
 *
 * @method SkiCenterQuery leftJoinOffer($relationAlias = null) Adds a LEFT JOIN clause to the query using the Offer relation
 * @method SkiCenterQuery rightJoinOffer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Offer relation
 * @method SkiCenterQuery innerJoinOffer($relationAlias = null) Adds a INNER JOIN clause to the query using the Offer relation
 *
 * @method SkiCenterQuery leftJoinCamera($relationAlias = null) Adds a LEFT JOIN clause to the query using the Camera relation
 * @method SkiCenterQuery rightJoinCamera($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Camera relation
 * @method SkiCenterQuery innerJoinCamera($relationAlias = null) Adds a INNER JOIN clause to the query using the Camera relation
 *
 * @method SkiCenter findOne(PropelPDO $con = null) Return the first SkiCenter matching the query
 * @method SkiCenter findOneOrCreate(PropelPDO $con = null) Return the first SkiCenter matching the query, or a new SkiCenter object populated from the query conditions when no match is found
 *
 * @method SkiCenter findOneByname(string $name) Return the first SkiCenter filtered by the name column
 * @method SkiCenter findOneByenglishName(string $englishName) Return the first SkiCenter filtered by the englishName column
 * @method SkiCenter findOneBysnow_down(int $snow_down) Return the first SkiCenter filtered by the snow_down column
 * @method SkiCenter findOneBysnow_up(int $snow_up) Return the first SkiCenter filtered by the snow_up column
 * @method SkiCenter findOneBytemp(double $temp) Return the first SkiCenter filtered by the temp column
 * @method SkiCenter findOneBywebsite(string $website) Return the first SkiCenter filtered by the website column
 * @method SkiCenter findOneByweatherurl(string $weatherurl) Return the first SkiCenter filtered by the weatherurl column
 * @method SkiCenter findOneByopen(int $open) Return the first SkiCenter filtered by the open column
 *
 * @method array findByid(int $id) Return SkiCenter objects filtered by the id column
 * @method array findByname(string $name) Return SkiCenter objects filtered by the name column
 * @method array findByenglishName(string $englishName) Return SkiCenter objects filtered by the englishName column
 * @method array findBysnow_down(int $snow_down) Return SkiCenter objects filtered by the snow_down column
 * @method array findBysnow_up(int $snow_up) Return SkiCenter objects filtered by the snow_up column
 * @method array findBytemp(double $temp) Return SkiCenter objects filtered by the temp column
 * @method array findBywebsite(string $website) Return SkiCenter objects filtered by the website column
 * @method array findByweatherurl(string $weatherurl) Return SkiCenter objects filtered by the weatherurl column
 * @method array findByopen(int $open) Return SkiCenter objects filtered by the open column
 *
 * @package    propel.generator.skigreece.om
 */
abstract class BaseSkiCenterQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSkiCenterQuery object.
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
            $modelName = 'SkiCenter';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SkiCenterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SkiCenterQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SkiCenterQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SkiCenterQuery) {
            return $criteria;
        }
        $query = new SkiCenterQuery(null, null, $modelAlias);

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
     * @return   SkiCenter|SkiCenter[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SkiCenterPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SkiCenterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SkiCenter A model object, or null if the key is not found
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
     * @return                 SkiCenter A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `englishName`, `snow_down`, `snow_up`, `temp`, `website`, `weatherurl`, `open` FROM `skicenter` WHERE `id` = :p0';
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
            $obj = new SkiCenter();
            $obj->hydrate($row);
            SkiCenterPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SkiCenter|SkiCenter[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SkiCenter[]|mixed the list of results, formatted by the current formatter
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
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SkiCenterPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SkiCenterPeer::ID, $keys, Criteria::IN);
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
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function filterByid($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SkiCenterPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SkiCenterPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SkiCenterPeer::ID, $id, $comparison);
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
     * @return SkiCenterQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SkiCenterPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the englishName column
     *
     * Example usage:
     * <code>
     * $query->filterByenglishName('fooValue');   // WHERE englishName = 'fooValue'
     * $query->filterByenglishName('%fooValue%'); // WHERE englishName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $englishName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function filterByenglishName($englishName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($englishName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $englishName)) {
                $englishName = str_replace('*', '%', $englishName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SkiCenterPeer::ENGLISHNAME, $englishName, $comparison);
    }

    /**
     * Filter the query on the snow_down column
     *
     * Example usage:
     * <code>
     * $query->filterBysnow_down(1234); // WHERE snow_down = 1234
     * $query->filterBysnow_down(array(12, 34)); // WHERE snow_down IN (12, 34)
     * $query->filterBysnow_down(array('min' => 12)); // WHERE snow_down >= 12
     * $query->filterBysnow_down(array('max' => 12)); // WHERE snow_down <= 12
     * </code>
     *
     * @param     mixed $snow_down The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function filterBysnow_down($snow_down = null, $comparison = null)
    {
        if (is_array($snow_down)) {
            $useMinMax = false;
            if (isset($snow_down['min'])) {
                $this->addUsingAlias(SkiCenterPeer::SNOW_DOWN, $snow_down['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snow_down['max'])) {
                $this->addUsingAlias(SkiCenterPeer::SNOW_DOWN, $snow_down['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SkiCenterPeer::SNOW_DOWN, $snow_down, $comparison);
    }

    /**
     * Filter the query on the snow_up column
     *
     * Example usage:
     * <code>
     * $query->filterBysnow_up(1234); // WHERE snow_up = 1234
     * $query->filterBysnow_up(array(12, 34)); // WHERE snow_up IN (12, 34)
     * $query->filterBysnow_up(array('min' => 12)); // WHERE snow_up >= 12
     * $query->filterBysnow_up(array('max' => 12)); // WHERE snow_up <= 12
     * </code>
     *
     * @param     mixed $snow_up The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function filterBysnow_up($snow_up = null, $comparison = null)
    {
        if (is_array($snow_up)) {
            $useMinMax = false;
            if (isset($snow_up['min'])) {
                $this->addUsingAlias(SkiCenterPeer::SNOW_UP, $snow_up['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($snow_up['max'])) {
                $this->addUsingAlias(SkiCenterPeer::SNOW_UP, $snow_up['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SkiCenterPeer::SNOW_UP, $snow_up, $comparison);
    }

    /**
     * Filter the query on the temp column
     *
     * Example usage:
     * <code>
     * $query->filterBytemp(1234); // WHERE temp = 1234
     * $query->filterBytemp(array(12, 34)); // WHERE temp IN (12, 34)
     * $query->filterBytemp(array('min' => 12)); // WHERE temp >= 12
     * $query->filterBytemp(array('max' => 12)); // WHERE temp <= 12
     * </code>
     *
     * @param     mixed $temp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function filterBytemp($temp = null, $comparison = null)
    {
        if (is_array($temp)) {
            $useMinMax = false;
            if (isset($temp['min'])) {
                $this->addUsingAlias(SkiCenterPeer::TEMP, $temp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($temp['max'])) {
                $this->addUsingAlias(SkiCenterPeer::TEMP, $temp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SkiCenterPeer::TEMP, $temp, $comparison);
    }

    /**
     * Filter the query on the website column
     *
     * Example usage:
     * <code>
     * $query->filterBywebsite('fooValue');   // WHERE website = 'fooValue'
     * $query->filterBywebsite('%fooValue%'); // WHERE website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $website The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function filterBywebsite($website = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($website)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $website)) {
                $website = str_replace('*', '%', $website);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SkiCenterPeer::WEBSITE, $website, $comparison);
    }

    /**
     * Filter the query on the weatherurl column
     *
     * Example usage:
     * <code>
     * $query->filterByweatherurl('fooValue');   // WHERE weatherurl = 'fooValue'
     * $query->filterByweatherurl('%fooValue%'); // WHERE weatherurl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $weatherurl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function filterByweatherurl($weatherurl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($weatherurl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $weatherurl)) {
                $weatherurl = str_replace('*', '%', $weatherurl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SkiCenterPeer::WEATHERURL, $weatherurl, $comparison);
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
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function filterByopen($open = null, $comparison = null)
    {
        if (is_array($open)) {
            $useMinMax = false;
            if (isset($open['min'])) {
                $this->addUsingAlias(SkiCenterPeer::OPEN, $open['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($open['max'])) {
                $this->addUsingAlias(SkiCenterPeer::OPEN, $open['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SkiCenterPeer::OPEN, $open, $comparison);
    }

    /**
     * Filter the query by a related Track object
     *
     * @param   Track|PropelObjectCollection $track  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SkiCenterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrack($track, $comparison = null)
    {
        if ($track instanceof Track) {
            return $this
                ->addUsingAlias(SkiCenterPeer::ID, $track->getskicenter_id(), $comparison);
        } elseif ($track instanceof PropelObjectCollection) {
            return $this
                ->useTrackQuery()
                ->filterByPrimaryKeys($track->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrack() only accepts arguments of type Track or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Track relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function joinTrack($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Track');

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
            $this->addJoinObject($join, 'Track');
        }

        return $this;
    }

    /**
     * Use the Track relation Track object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   TrackQuery A secondary query class using the current class as primary query
     */
    public function useTrackQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrack($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Track', 'TrackQuery');
    }

    /**
     * Filter the query by a related Lift object
     *
     * @param   Lift|PropelObjectCollection $lift  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SkiCenterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLift($lift, $comparison = null)
    {
        if ($lift instanceof Lift) {
            return $this
                ->addUsingAlias(SkiCenterPeer::ID, $lift->getskicenter_id(), $comparison);
        } elseif ($lift instanceof PropelObjectCollection) {
            return $this
                ->useLiftQuery()
                ->filterByPrimaryKeys($lift->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLift() only accepts arguments of type Lift or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Lift relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function joinLift($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Lift');

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
            $this->addJoinObject($join, 'Lift');
        }

        return $this;
    }

    /**
     * Use the Lift relation Lift object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   LiftQuery A secondary query class using the current class as primary query
     */
    public function useLiftQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLift($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Lift', 'LiftQuery');
    }

    /**
     * Filter the query by a related Offer object
     *
     * @param   Offer|PropelObjectCollection $offer  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SkiCenterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOffer($offer, $comparison = null)
    {
        if ($offer instanceof Offer) {
            return $this
                ->addUsingAlias(SkiCenterPeer::ID, $offer->getskicenter_id(), $comparison);
        } elseif ($offer instanceof PropelObjectCollection) {
            return $this
                ->useOfferQuery()
                ->filterByPrimaryKeys($offer->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOffer() only accepts arguments of type Offer or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Offer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function joinOffer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Offer');

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
            $this->addJoinObject($join, 'Offer');
        }

        return $this;
    }

    /**
     * Use the Offer relation Offer object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   OfferQuery A secondary query class using the current class as primary query
     */
    public function useOfferQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOffer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Offer', 'OfferQuery');
    }

    /**
     * Filter the query by a related Camera object
     *
     * @param   Camera|PropelObjectCollection $camera  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SkiCenterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCamera($camera, $comparison = null)
    {
        if ($camera instanceof Camera) {
            return $this
                ->addUsingAlias(SkiCenterPeer::ID, $camera->getskicenter_id(), $comparison);
        } elseif ($camera instanceof PropelObjectCollection) {
            return $this
                ->useCameraQuery()
                ->filterByPrimaryKeys($camera->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCamera() only accepts arguments of type Camera or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Camera relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function joinCamera($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Camera');

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
            $this->addJoinObject($join, 'Camera');
        }

        return $this;
    }

    /**
     * Use the Camera relation Camera object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   CameraQuery A secondary query class using the current class as primary query
     */
    public function useCameraQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCamera($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Camera', 'CameraQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SkiCenter $skiCenter Object to remove from the list of results
     *
     * @return SkiCenterQuery The current query, for fluid interface
     */
    public function prune($skiCenter = null)
    {
        if ($skiCenter) {
            $this->addUsingAlias(SkiCenterPeer::ID, $skiCenter->getid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
