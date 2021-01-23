<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\Donation;



class BloodBankApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_user_can_login()
    {   
        $this->withoutExceptionHandling();
        $formData = ['email' => 'ahad@gmail.com', 'password' => '12345'];
        $response = $this->postJson('/api/login', $formData);

        $response->assertStatus(200);
    }

    public function test_user_can_registration()
    {
        $this->withoutExceptionHandling();
        $formData = [
            'name'             => 'karim',
            'email'            => 'karim@gmail.com',
            'password'         => '12345',
            "mobile"           => '01845392101',
            "alternate_mobile" => '01981732712',
            "blood_group"      => 'AB-',
            "religion"         => 'Islam',
            "weight"           => '60kg',
            "birth_date"       => '2000-02-01',
            "district"         => 'Dhaka',
            "police_station"   => 'Demara',
            "post_office"      => 'Demra',
            "union"            => 'Demara',
        ];
        $response = $this->postJson('/api/registration', $formData);

        $response->assertStatus(200);

    }

    public function test_request_blood_validation_check()
    {
        $this->withoutExceptionHandling();
        $formData = [
            'location'         => 'Demara',
            'relation'         => 'brother',
            'alternate_mobile' => '01981732712',
            'request_datetime' => '2020-01-22 01:04:10',
        ];
        
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')
            ->postJson('/api/blood-request', $formData);

        $response->assertStatus(400);
    }


    public function test_user_can_request_blood()
    {
        $this->withoutExceptionHandling();
        $formData = [
            'location'         => 'Demara',
            'relation'         => 'brother',
            'blood_group'      => 'AB-',
            'alternate_mobile' => '01981732712',
            'request_datetime' => '2020-01-22 01:04:10',
        ];

        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')
            ->postJson('/api/blood-request', $formData);

        $response->assertStatus(200);
    }

    public function test_admin_can_add_donor()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $userDetials = UserDetails::create([
           "user_id"          => $user->id,
            "mobile"           => '01845392101',
            "alternate_mobile" => '01981732712',
            "blood_group"      => 'AB-',
            "religion"         => 'Islam',
            "weight"           => '60kg',
            "birth_date"       => '2000-02-01',
            "district"         => 'Dhaka',
            "police_station"   => 'Demara',
            "post_office"      => 'Demra',
            "union"            => 'Demara',
        ]);
        $formData = [
            'accept_user_id'  => $user->id,
            'request_user_id' => $user->id,
            'request_id'      => '1',
            'donation_date'   => '2020-01-22 01:04:10',
        ];

      
        $response = $this->actingAs($user, 'api')
            ->postJson('/api/add-donor', $formData);

        $response->assertStatus(200);
    }

    public function test_user_can_give_feedback()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $donation = Donation::create([
            'donor_id'      => '1',
            'receiver_id'   => '1',
            'request_id'    => '1',
            'donation_date' => '2020-01-22 01:04:10',
        ]);
        $formData = [

            'donation_id' => '1',
            'feedback'    => 'Good',
        ];
        $response = $this->actingAs($user, 'api')
            ->postJson('/api/feedback', $formData);

        $response->assertStatus(200);
    }

    public function test_user_can_see_feedbacks()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')
            ->get('/api/feedbacks');

        $response->assertStatus(200);

    }


    public function test_user_can_see_donation_history()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')
            ->get('/api/donation-history');

        $response->assertStatus(200); 
    }

    public function test_user_can_see_own_feedback()
    {

        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')
            ->get('/api/feedback/1');

        $response->assertStatus(200);
    }

}
