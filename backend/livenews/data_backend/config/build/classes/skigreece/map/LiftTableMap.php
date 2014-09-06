<?php



/**
 * This class defines the structure of the 'lift' table.
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
class LiftTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'skigreece.map.LiftTableMap';

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
        $this->setName('lift');
        $this->setPhpName('Lift');
        $this->setClassname('Lift');
        $this->setPackage('skigreece');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'name', 'VARCHAR', false, 255, null);
        $this->addColumn('open', 'open', 'INTEGER', false, 1, null);
        $this->addForeignKey('skicenter_id', 'skicenter_id', 'INTEGER', 'skicenter', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SkiCenter', 'SkiCenter', RelationMap::MANY_TO_ONE, array('skicenter_id' => 'id', ), null, null);
    } // buildRelations()

} // LiftTableMap
