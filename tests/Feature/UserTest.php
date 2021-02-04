<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user =[
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('12345678')
        ];
    }

    public function test_登録()
    {
        User::create($this->user);
        $this->assertDatabaseHas('users', $this->user);
    }

    public function ログイン()
{
    // ユーザーを１つ作成
    $user = factory(User::class)->create([
        'password'  => bcrypt('12345678')
    ]);
 
    // まだ、認証されていない
    $this->assertFalse(Auth::check());
 
    // ログインを実行
    $response = $this->post('login', [
        'email'    => $user->email,
        'password' => '12345678'
    ]);
 
    // 認証されている
    $this->assertTrue(Auth::check());
 
    // ログイン後にPatient/indexにリダイレクトされるのを確認
    $response->assertRedirect('patient/index');
}

private function dummyLogin()
    {
        $user = factory(User::class, 'default')->create();
        return $this->actingAs($user)
                    ->withSession(['user_id' => $user->id])
                    ->get('/'); // homeにリダイレクト
    }
    public function testLogout()
    {
        // ダミーログイン
        $response = $this->dummyLogin();
        // 認証を確認
        $this->assertAuthenticated();
        $response = $this->post('/logout');
        // ホーム画面にリダイレクト
        $response->assertStatus(302)
                 ->assertRedirect('/'); // リダイレクト先を確認
        // 認証されていないことを確認
        $this->assertGuest();
    }



    




}
