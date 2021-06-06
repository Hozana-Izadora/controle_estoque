<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FornecedorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FornecedorsTable Test Case
 */
class FornecedorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FornecedorsTable
     */
    protected $Fornecedors;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Fornecedors',
        'app.Enderecos',
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
        $config = $this->getTableLocator()->exists('Fornecedors') ? [] : ['className' => FornecedorsTable::class];
        $this->Fornecedors = $this->getTableLocator()->get('Fornecedors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Fornecedors);

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
