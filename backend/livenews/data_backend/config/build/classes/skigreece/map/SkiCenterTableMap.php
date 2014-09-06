<?php



/**
 * This class defines the structure of the 'skicenter' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.skigreece.map
 */
class SkiCenterTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'skigreece.map.SkiCenterTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('skicenter');
        $this->setPhpName('SkiCenter');
        $this->setClassname('SkiCenter');
        $this->setPackage('skigreece');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'name', 'VARCHAR', true, 255, null);
        $this->addColumn('englishName', 'englishName', 'VARCHAR', true, 255, null);
        $this->addColumn('snow_down', 'snow_down', 'INTEGER', false, null, null);
        $this->addColumn('snow_up', 'snow_up', 'INTEGER', false, null, null);
        $this->addColumn('temp', 'temp', 'DOUBLE', false, null, null);
        $this->addColumn('website', 'website', 'VARCHAR', false, 255, null);
        $this->addColumn('weatherurl', 'weatherurl', 'VARCHAR', false, 255, null);
        $this->addColumn('open', 'open', 'INTEGER', false, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Track', 'Track', RelationMap::ONE_TO_MANY, array('id' => 'skicenter_id', ), null, null, 'Tracks');
        $this->addRelation('Lift', 'Lift', RelationMap::ONE_TO_MANY, array('id' => 'skicenter_id', ), null, null, 'Lifts');
        $this->addRelation('Offer', 'Offer', RelationMap::ONE_TO_MANY, array('id' => 'skicenter_id', ), null, null, 'Offers');
        $this->addRelation('Camera', 'Camera', RelationMap::ONE_TO_MANY, array('id' => 'skicenter_id', ), null, null, 'Cameras');
    } // buildRelations()

} // SkiCenterTableMap
