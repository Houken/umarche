<x-tests.app>
    <x-slot name="header">
        ヘッダー1
    </x-slot>
    コンポーネントテスト1
    <x-tests.card title="タイトル1" content="本文1" :variable="$message" />
    <x-tests.card title="タイトルのみ" />
    <x-tests.card title="cssを変更したい" class="bg-red-50"></x-tests>
</x-tests.app>