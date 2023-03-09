<?php

namespace Tests\Todo\Feature\Http\Controllers;

use App\Models\Poll;
use App\Models\User;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PollController
 */
class PollControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index_returns_an_ok_response(): void
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('polls'));

        $response->assertOk();
        $response->assertViewIs('poll.latest');
        $response->assertViewHas('polls');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function result_returns_an_ok_response(): void
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $poll = Poll::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('poll_results', ['id' => $poll->id]));

        $response->assertOk();
        $response->assertViewIs('poll.result');

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function show_returns_an_ok_response(): void
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $poll = Poll::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('poll', ['id' => $poll->id]));

        $response->assertRedirect(withInfo('You have already voted on this poll. Here are the results.'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function vote_returns_an_ok_response(): void
    {
        $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('polls/vote', [
            // TODO: send request data
        ]);

        $response->assertRedirect(withErrors('You have already voted on this poll. Your vote has not been counted.'));

        // TODO: perform additional assertions
    }

    /**
     * @test
     */
    public function vote_validates_with_a_form_request(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PollController::class,
            'vote',
            \App\Http\Requests\VoteOnPoll::class
        );
    }

    // test cases...
}
