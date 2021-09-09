@php
    $chats = \App\Chat::where(['user_id'=>Auth::user()->id])->orderBy('id','asc')->get();
@endphp
<div class="chat_box touchscroll chat_box_colors_a">
    @if ($chats)
        @foreach ($chats as $chat)
            <div class="chat_message_wrapper <?php if($chat->status == 'user'){ echo 'chat_message_right';  } ?>">
                <div class="chat_user_avatar">
                <a href="" target="_blank">
                    <img alt="Moin Abbas" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="md-user-image">
                </a>
                </div>
                <ul class="chat_message">
                    <li>
                        <p> {{ $chat->message }} </p>
                        <span class="chat_message_time">{{ $chat->created_at->format('M') .' '. \Carbon\Carbon::parse($chat->created_at)->day .', '. $chat->created_at->format('H:i:s')}}</span>
                    </li>
                </ul>
            </div>
        @endforeach
    @endif
</div>