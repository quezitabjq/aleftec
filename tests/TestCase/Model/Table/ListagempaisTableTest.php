<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ListagempaisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ListagempaisTable Test Case
 */
class ListagempaisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ListagempaisTable
     */
    public $Listagempais;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.listagempais'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Listagempais') ? [] : ['className' => ListagempaisTable::class];
        $this->Listagempais = TableRegistry::get('Listagempais', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Listagempais);

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
