<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemsaidasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemsaidasTable Test Case
 */
class ItemsaidasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ItemsaidasTable
     */
    protected $Itemsaidas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Itemsaidas',
        'app.Saidas',
        'app.Produtos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Itemsaidas') ? [] : ['className' => ItemsaidasTable::class];
        $this->Itemsaidas = $this->getTableLocator()->get('Itemsaidas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Itemsaidas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
