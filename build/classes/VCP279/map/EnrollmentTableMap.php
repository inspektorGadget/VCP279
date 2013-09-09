<?php



/**
 * This class defines the structure of the 'enrollment' table.
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
class EnrollmentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'VCP279.map.EnrollmentTableMap';

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
        $this->setName('enrollment');
        $this->setPhpName('Enrollment');
        $this->setClassname('Enrollment');
        $this->setPackage('VCP279');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('student', 'Student', 'INTEGER', 'person', 'id', true, null, null);
        $this->addForeignKey('class_id', 'ClassId', 'INTEGER', 'classes', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Person', 'Person', RelationMap::MANY_TO_ONE, array('student' => 'id', ), null, null);
        $this->addRelation('Classes', 'Classes', RelationMap::MANY_TO_ONE, array('class_id' => 'id', ), null, null);
    } // buildRelations()

} // EnrollmentTableMap
