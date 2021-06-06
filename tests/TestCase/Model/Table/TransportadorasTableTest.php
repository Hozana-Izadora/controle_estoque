<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransportadorasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransportadorasTable Test Case
 */
class TransportadorasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TransportadorasTable
     */
    protected $Transportadoras;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Transportadoras',
        'app.Enderecos',
        'app.Entradas',
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
        $config = $this->getTableLocator()->exists('Transportadoras') ? [] : ['className' => TransportadorasTable::class];
        $this->Transportadoras = $this->getTableLocator()->get('Transportadoras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Transportadoras);

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
