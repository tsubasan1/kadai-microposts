@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            {{-- タブ --}}
            @include('users.navtabs')
            {{-- お気に入り一覧 --}}
            @if (count($microposts) > 0)
                <ul class="list-unstyled">
                    @foreach ($microposts as $micropost)
                        <li class="media">
                            {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                            <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 40]) }}" alt="">
                            <div class="media-body">
                                <div>
                                    {{ $micropost->content }}
                                </div>
                                {{-- お気に入りボタン --}}
                        
                                @include('user_favorites.favorite_button')

                            </div>
                        </li>
                    @endforeach
                </ul>
                {{-- ページネーションのリンク --}}
                {{ $microposts->links() }}
            @endif
        </div>
    </div>
@endsection