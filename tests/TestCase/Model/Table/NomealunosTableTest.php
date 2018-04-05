<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NomealunosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NomealunosTable Test Case
 */
class NomealunosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NomealunosTable
     */
    public $Nomealunos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.nomealunos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Nomealunos') ? [] : ['className' => NomealunosTable::class];
        $this->Nomealunos = TableRegistry::get('Nomealunos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Nomealunos);

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
