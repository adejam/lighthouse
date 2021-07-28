<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GetUsersByGraphqlTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    public function test_get_paginated_users()
    {
        $user = User::factory()->count(15)->create();
        $response = $this->graphQL(
            '
        {
            users(first: 5) {
               data {
                 email
                 name
               }
               paginatorInfo {
                 currentPage
                 lastPage
               } 
            }
        }
        '
        )->assertStatus(200)
            ->assertJson(
                function (AssertableJson $json) {
                    $json->has('data.users.data', 5)
                        ->has('data.users.paginatorInfo', 2)
                        ->where('data.users.paginatorInfo.lastPage', 3)
                        ->etc();
                }
            );
    }

    public function test_it_shows_list_of_users(): void
    {
        $user = User::factory()->count(5)->create();

        $resp = $this->graphQL(
            '
        {
            allusers {
                 email
                 name
            }
        }
        '
        )->assertJson(
            function (AssertableJson $json) {
                $json->has('data.allusers', 5)
                    ->etc();
            }
        );
    }

    public function test_it_shows_a_single_users(): void
    {
        $users = User::factory()->count(5)->create();

        $this->graphQL(
            '
        {
            user (id: 1) {
                 id
            }
        }
        '
        )->assertJson(
            [
                'data' => [
                    'user' => [
                        'id' => '1',
                    ]
                ]
            ]
        );
    }

    public function test_it_returns_null_if_user_does_not_exist(): void
    {
        $users = User::factory()->count(5)->create();

        $this->graphQL(
            '
        {
            user (id: 6) {
                 id
            }
        }
        '
        )->assertJson(
            [
                'data' => [
                    'user' => null
                ]
            ]
        );
    }
}
