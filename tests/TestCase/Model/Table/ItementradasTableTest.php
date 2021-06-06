<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItementradasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItementradasTable Test Case
 */
class ItementradasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ItementradasTable
     */
    protected $Itementradas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Itementradas',
        'app.Produtos',
        'app.Entradas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Itementradas') ? [] : ['className' => ItementradasTable::class];
        $this->Itementradas = $this->getTableLocator()->get('Itementradas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Itementradas);

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
