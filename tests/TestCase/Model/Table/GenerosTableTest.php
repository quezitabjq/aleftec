<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GenerosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GenerosTable Test Case
 */
class GenerosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GenerosTable
     */
    public $Generos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.generos',
        'app.livros',
        'app.autors',
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
        $config = TableRegistry::exists('Generos') ? [] : ['className' => GenerosTable::class];
        $this->Generos = TableRegistry::get('Generos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Generos);

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
