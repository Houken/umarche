<x-tests.app>
    <x-slot name="header">
        ヘッダー2
    </x-slot>
    コンポーネントテスト2
    <x-test-class-base classBaseMessage="クラスベースのメッセージなんですよ。" />
    <br>
    <x-test-class-base classBaseMessage="クラスベースのメッセージです" defaultMessage="初期値とは違うんです" />
</x-tests.app>