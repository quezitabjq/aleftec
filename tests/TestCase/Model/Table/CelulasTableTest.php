<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CelulasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CelulasTable Test Case
 */
class CelulasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CelulasTable
     */
    public $Celulas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.celulas',
        'app.users',
        'app.roles',
        'app.permissions',
        'app.permissions_roles',
        'app.schedules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Celulas') ? [] : ['className' => CelulasTable::class];
        $this->Celulas = TableRegistry::get('Celulas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Celulas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
