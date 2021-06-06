<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LojasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LojasTable Test Case
 */
class LojasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LojasTable
     */
    protected $Lojas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Lojas',
        'app.Enderecos',
        'app.Saidas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Lojas') ? [] : ['className' => LojasTable::class];
        $this->Lojas = $this->getTableLocator()->get('Lojas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Lojas);

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
