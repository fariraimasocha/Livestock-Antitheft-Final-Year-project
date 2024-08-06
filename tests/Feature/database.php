<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class database extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_database_connection(): void
    {
        // Attempt to fetch something from the database to check the connection
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            $this->fail('Database connection failed: ' . $e->getMessage());
        }

        $this->assertTrue(true, 'Database connection is successful.');
    }
}
