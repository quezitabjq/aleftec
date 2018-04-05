<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AutorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AutorsTable Test Case
 */
class AutorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AutorsTable
     */
    public $Autors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.autors',
        'app.livros',
        'app.generos',
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
        $config = TableRegistry::exists('Autors') ? [] : ['className' => AutorsTable::class];
        $this->Autors = TableRegistry::get('Autors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Autors);

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
}
