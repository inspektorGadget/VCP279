<?php



/**
 * This class defines the structure of the 'rentals' table.
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
class RentalsTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'VCP279.map.RentalsTableMap';

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
        $this->setName('rentals');
        $this->setPhpName('Rentals');
        $this->setClassname('Rentals');
        $this->setPackage('VCP279');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('student', 'Student', 'INTEGER', 'person', 'id', true, null, null);
        $this->addForeignKey('faculty', 'Faculty', 'INTEGER', 'person', 'id', true, null, null);
        $this->addForeignKey('item', 'Item', 'INTEGER', 'equipment', 'id', true, null, null);
        $this->addColumn('out_date', 'OutDate', 'DATE', true, null, null);
        $this->addColumn('due_date', 'DueDate', 'DATE', true, null, null);
        $this->addForeignKey('status', 'Status', 'VARCHAR', 'rental_status', 'status', true, 255, null);
        $this->addColumn('comments', 'Comments', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PersonRelatedByStudent', 'Person', RelationMap::MANY_TO_ONE, array('student' => 'id', ), null, null);
        $this->addRelation('PersonRelatedByFaculty', 'Person', RelationMap::MANY_TO_ONE, array('faculty' => 'id', ), null, null);
        $this->addRelation('Equipment', 'Equipment', RelationMap::MANY_TO_ONE, array('item' => 'id', ), null, null);
        $this->addRelation('rentalStatus', 'rentalStatus', RelationMap::MANY_TO_ONE, array('status' => 'status', ), null, null);
    } // buildRelations()

} // RentalsTableMap
