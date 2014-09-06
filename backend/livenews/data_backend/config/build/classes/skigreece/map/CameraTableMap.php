<?php



/**
 * This class defines the structure of the 'camera' table.
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
class CameraTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'skigreece.map.CameraTableMap';

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
        $this->setName('camera');
        $this->setPhpName('Camera');
        $this->setClassname('Camera');
        $this->setPackage('skigreece');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'id', 'INTEGER', true, null, null);
        $this->addColumn('url', 'url', 'VARCHAR', false, 255, null);
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

} // CameraTableMap
