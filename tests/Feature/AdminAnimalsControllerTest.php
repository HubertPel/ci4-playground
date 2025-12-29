<?php

namespace Tests\Feature;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;

class AdminAnimalsControllerTest extends CIUnitTestCase
{
    use FeatureTestTrait;
    use DatabaseTestTrait;

    protected $refresh = true;
    protected $migrate = true;

    public function test_store_creates_animal()
    {
        $result = $this->withSession([
                'logged_in' => true,
                'user_id'   => 1,
            ])
            ->post('/admin/animals/store', [
                'name'    => 'Test HTTP',
                'species' => 'HTTP',
                'age'     => 3,
                csrf_token() => csrf_hash(),
            ]);

        $result->assertStatus(302);
        $result->assertRedirectTo('/admin/animals');
    }

    public function test_update_updates_animal()
    {
        $this->db->table('animals')->insert([
            'name'    => 'Old Name',
            'species' => 'Dog',
            'age'     => 5,
        ]);

        $animalId = $this->db->insertID();

        $result = $this->withSession([
                'logged_in' => true,
                'user_id'   => 1,
            ])
            ->post("/admin/animals/update/{$animalId}", [
                'name'    => 'New Name',
                'species' => 'Dog',
                'age'     => 6,
                csrf_token() => csrf_hash(),
            ]);

        $result->assertStatus(302);
        $result->assertRedirectTo('/admin/animals');

        $animal = $this->db->table('animals')->where('id', $animalId)->get()->getRow();

        $this->assertEquals('New Name', $animal->name);
        $this->assertEquals(6, $animal->age);
    }

    public function test_delete_removes_animal()
    {
        $this->db->table('animals')->insert([
            'name'    => 'To be deleted',
            'species' => 'Cat',
            'age'     => 2,
        ]);

        $animalId = $this->db->insertID();

        $result = $this->withSession([
                'logged_in' => true,
                'user_id'   => 1,
            ])
            ->get("/admin/animals/delete/{$animalId}");

        $result->assertStatus(302);
        $result->assertRedirectTo('/admin/animals');

        $animal = $this->db->table('animals')->where('id', $animalId)->get()->getRow();

        $animal = $this->db->table('animals')->where('id', $animalId)->get()->getRow();

        $this->assertNotNull($animal);
        $this->assertNotNull($animal->deleted_at);
    }
}
