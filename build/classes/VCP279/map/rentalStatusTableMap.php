<?php



/**
 * This class defines the structure of the 'rental_status' table.
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
class rentalStatusTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'VCP279.map.rentalStatusTableMap';

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
        $this->setName('rental_status');
        $this->setPhpName('rentalStatus');
        $this->setClassname('rentalStatus');
        $this->setPackage('VCP279');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('status', 'Status', 'ENUM', false, null, null);
        $this->getColumn('status', false)->setValueSet(array (
  0 => 'Current',
  1 => 'Late',
));
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Rentals', 'Rentals', RelationMap::ONE_TO_MANY, array('status' => 'status', ), null, null, 'Rentalss');
    } // buildRelations()

} // rentalStatusTableMap
