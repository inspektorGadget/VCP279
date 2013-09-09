<?php



/**
 * This class defines the structure of the 'equipment' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.VCP279.map
 */
class EquipmentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'VCP279.map.EquipmentTableMap';

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
        $this->setName('equipment');
        $this->setPhpName('Equipment');
        $this->setClassname('Equipment');
        $this->setPackage('VCP279');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('serial', 'Serial', 'VARCHAR', true, 255, null);
        $this->addColumn('purchase_date', 'PurchaseDate', 'DATE', false, null, null);
        $this->addForeignKey('item_status', 'ItemStatus', 'VARCHAR', 'equipment_status', 'status', true, 255, null);
        $this->addColumn('comments', 'Comments', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('equipmentStatus', 'equipmentStatus', RelationMap::MANY_TO_ONE, array('item_status' => 'status', ), null, null);
        $this->addRelation('Rentals', 'Rentals', RelationMap::ONE_TO_MANY, array('id' => 'item', ), null, null, 'Rentalss');
    } // buildRelations()

} // EquipmentTableMap
