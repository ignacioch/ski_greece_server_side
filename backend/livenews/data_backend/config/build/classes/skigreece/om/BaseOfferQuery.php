<?php


/**
 * Base class that represents a query for the 'offer' table.
 *
 *
 *
 * @method OfferQuery orderByid($order = Criteria::ASC) Order by the id column
 * @method OfferQuery orderByurlimage($order = Criteria::ASC) Order by the urlimage column
 * @method OfferQuery orderBycomments($order = Criteria::ASC) Order by the comments column
 * @method OfferQuery orderByskicenter_id($order = Criteria::ASC) Order by the skicenter_id column
 *
 * @method OfferQuery groupByid() Group by the id column
 * @method OfferQuery groupByurlimage() Group by the urlimage column
 * @method OfferQuery groupBycomments() Group by the comments column
 * @method OfferQuery groupByskicenter_id() Group by the skicenter_id column
 *
 * @method OfferQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OfferQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OfferQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OfferQuery leftJoinSkiCenter($relationAlias = null) Adds a LEFT JOIN clause to the query using the SkiCenter relation
 * @method OfferQuery rightJoinSkiCenter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SkiCenter relation
 * @method OfferQuery innerJoinSkiCenter($relationAlias = null) Adds a INNER JOIN clause to the query using the SkiCenter relation
 *
 * @method Offer findOne(PropelPDO $con = null) Return the first Offer matching the query
 * @method Offer findOneOrCreate(PropelPDO $con = null) Return the first Offer matching the query, or a new Offer object populated from the query conditions when no match is found
 *
 * @method Offer findOneByurlimage(string $urlimage) Return the first Offer filtered by the urlimage column
 * @method Offer findOneBycomments(string $comments) Return the first Offer filtered by the comments column
 * @method Offer findOneByskicenter_id(int $skicenter_id) Return the first Offer filtered by the skicenter_id column
 *
 * @method array findByid(int $id) Return Offer objects filtered by the id column
 * @method array findByurlimage(string $urlimage) Return Offer objects filtered by the urlimage column
 * @method array findBycomments(string $comments) Return Offer objects filtered by the comments column
 * @method array findByskicenter_id(int $skicenter_id) Return Offer objects filtered by the skicenter_id column
 *
 * @package    propel.generator.skigreece.om
 */
abstract class BaseOfferQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOfferQuery object.
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
            $modelName = 'Offer';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OfferQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OfferQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OfferQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OfferQuery) {
            return $criteria;
        }
        $query = new OfferQuery(null, null, $modelAlias);

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
     * @return   Offer|Offer[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OfferPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OfferPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Offer A model object, or null if the key is not found
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
     * @return                 Offer A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `urlimage`, `comments`, `skicenter_id` FROM `offer` WHERE `id` = :p0';
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
            $obj = new Offer();
            $obj->hydrate($row);
            OfferPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Offer|Offer[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Offer[]|mixed the list of results, formatted by the current formatter
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
     * @return OfferQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OfferPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OfferQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OfferPeer::ID, $keys, Criteria::IN);
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
     * @return OfferQuery The current query, for fluid interface
     */
    public function filterByid($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OfferPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OfferPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OfferPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the urlimage column
     *
     * Example usage:
     * <code>
     * $query->filterByurlimage('fooValue');   // WHERE urlimage = 'fooValue'
     * $query->filterByurlimage('%fooValue%'); // WHERE urlimage LIKE '%fooValue%'
     * </code>
     *
     * @param     string $urlimage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OfferQuery The current query, for fluid interface
     */
    public function filterByurlimage($urlimage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($urlimage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $urlimage)) {
                $urlimage = str_replace('*', '%', $urlimage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OfferPeer::URLIMAGE, $urlimage, $comparison);
    }

    /**
     * Filter the query on the comments column
     *
     * Example usage:
     * <code>
     * $query->filterBycomments('fooValue');   // WHERE comments = 'fooValue'
     * $query->filterBycomments('%fooValue%'); // WHERE comments LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comments The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OfferQuery The current query, for fluid interface
     */
    public function filterBycomments($comments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comments)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comments)) {
                $comments = str_replace('*', '%', $comments);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OfferPeer::COMMENTS, $comments, $comparison);
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
     * @return OfferQuery The current query, for fluid interface
     */
    public function filterByskicenter_id($skicenter_id = null, $comparison = null)
    {
        if (is_array($skicenter_id)) {
            $useMinMax = false;
            if (isset($skicenter_id['min'])) {
                $this->addUsingAlias(OfferPeer::SKICENTER_ID, $skicenter_id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($skicenter_id['max'])) {
                $this->addUsingAlias(OfferPeer::SKICENTER_ID, $skicenter_id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OfferPeer::SKICENTER_ID, $skicenter_id, $comparison);
    }

    /**
     * Filter the query by a related SkiCenter object
     *
     * @param   SkiCenter|PropelObjectCollection $skiCenter The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OfferQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySkiCenter($skiCenter, $comparison = null)
    {
        if ($skiCenter instanceof SkiCenter) {
            return $this
                ->addUsingAlias(OfferPeer::SKICENTER_ID, $skiCenter->getid(), $comparison);
        } elseif ($skiCenter instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OfferPeer::SKICENTER_ID, $skiCenter->toKeyValue('PrimaryKey', 'id'), $comparison);
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
     * @return OfferQuery The current query, for fluid interface
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
     * @param   Offer $offer Object to remove from the list of results
     *
     * @return OfferQuery The current query, for fluid interface
     */
    public function prune($offer = null)
    {
        if ($offer) {
            $this->addUsingAlias(OfferPeer::ID, $offer->getid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
