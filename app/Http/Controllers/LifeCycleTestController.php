<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    public function showServiceContainerTest()
    {
        // サービスコンテナappにサービスを登録
        app()->bind('lifeCycleTest', function(){
            return 'ライフサイクルテストをしています。';
        });

        $test = app()->make('lifeCycleTest');   // 上でバインドしたサービスを呼び出し

        // サービスコンテナ不使用のパターン
        // $message = new Message;             // Sampleクラスのコンストラクタで使用するMessageクラスのインスタンスを生成。
        // $sample = new Sample($message);     // Sampleクラスのインスタンスを生成。必要なMessageクラスのインスタンスを引数で与える。
        // $sample->run();                     // Sampleクラスのインスタンスのrunメソッドを実行

        // サービスコンテナ使用のパターン
        app()->bind('sample', Sample::class);   // コンテナsampleにSampleクラスを入れる
        $sample = app()->make('sample');        // コンテナを指定してサービスを$sampleに格納、すなわちサービスの呼び出し
        $sample->run();                         // Sampleクラスのコンストラクタで使用されるMessageクラスの生成は自動で行われる。

        dd($test, app());
    }

    public function showServiceProviderTest()
    {
        $encrypt = app()->make('encrypter');        // $encryptにサービスencrypterを格納
        $password = $encrypt->encrypt('password');  // encryptメソッドで文字列passwordを暗号化して$passwordに格納

        $sample = app()->make('serviceProviderTest');   // config/app.phpで登録済のプロバイダが登録したサービスを呼び出し

        dd($sample, $password, $encrypt->decrypt($password));    // $passwordとでCodeしたパスワードを表示
    }
}

class Sample
{
    public $message; // プロパティの定義
    public function __construct(Message $message) // 引数でクラスの型付けをすることで、自動的にインスタンス化される。DI
                                                    //　コンストラクタ インスタンスが生成されるときに実行されるメソッド 
    {
        $this->message = $message; // Messageクラスのインスタンス$messageがこのSampleクラスのプロパティ$messageに格納される
    }
    public function run(){
        $this->message->send(); // このインスタンスのプロパティ$messageにはMessageクラスのインスタンスが格納されているので、
                                // Messageクラスのメソッドsendを使用できる。
    }
}

class Message
{
    public function send() {
        echo('メッセージをごらん');
    }
}
