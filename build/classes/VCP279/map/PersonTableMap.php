<?php



/**
 * This class defines the structure of the 'person' table.
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
class PersonTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'VCP279.map.PersonTableMap';

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
        $this->setName('person');
        $this->setPhpName('Person');
        $this->setClassname('Person');
        $this->setPackage('VCP279');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', true, 255, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', true, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('address_line_one', 'AddressLineOne', 'VARCHAR', false, 255, null);
        $this->addColumn('address_line_two', 'AddressLineTwo', 'VARCHAR', false, 255, null);
        $this->addColumn('state', 'State', 'VARCHAR', false, 2, null);
        $this->addColumn('zip', 'Zip', 'INTEGER', false, 5, null);
        $this->addColumn('student_id', 'StudentId', 'VARCHAR', true, 25, null);
        $this->addForeignKey('user_type', 'UserType', 'CHAR', 'user_types', 'user_category', true, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('UserTypes', 'UserTypes', RelationMap::MANY_TO_ONE, array('user_type' => 'user_category', ), null, null);
        $this->addRelation('RentalsRelatedByStudent', 'Rentals', RelationMap::ONE_TO_MANY, array('id' => 'student', ), null, null, 'RentalssRelatedByStudent');
        $this->addRelation('RentalsRelatedByFaculty', 'Rentals', RelationMap::ONE_TO_MANY, array('id' => 'faculty', ), null, null, 'RentalssRelatedByFaculty');
        $this->addRelation('Enrollment', 'Enrollment', RelationMap::ONE_TO_MANY, array('id' => 'student', ), null, null, 'Enrollments');
    } // buildRelations()

} // PersonTableMap
