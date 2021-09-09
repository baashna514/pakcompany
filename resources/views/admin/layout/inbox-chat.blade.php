@php
    $users_id = \App\Chat::orderBy('created_at', 'desc')->where('status', 'user')->distinct('user_id')->pluck('user_id');
@endphp
@foreach ($users_id as $user_id) 
@php
    $user = \App\User::find($user_id);
    $count = \App\Chat::where(['user_id' => $user_id, 'owner_id' => Auth::user()->id, 'seen' => 'no', 'status' => 'user'])->get();
@endphp
    <div class="chat_list" data-id="{{ $user_id }}">
    <div class="chat_people">
        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
        <div class="chat_ib">
        <h5>{{ $user->name }} <span class="chat_date">({{ count($count) }})</span></h5>
        </div>
    </div>
    </div>
@endforeach