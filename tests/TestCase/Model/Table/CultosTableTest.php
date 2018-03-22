<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CultosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CultosTable Test Case
 */
class CultosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CultosTable
     */
    public $Cultos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cultos',
        'app.cultosalas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cultos') ? [] : ['className' => CultosTable::class];
        $this->Cultos = TableRegistry::get('Cultos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cultos);

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
