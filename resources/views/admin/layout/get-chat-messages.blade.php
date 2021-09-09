@foreach ($chats as $chat)
  <div class="<?php if($chat->status == 'vendor'){ echo 'outgoing_msg';  }else{ echo 'incoming_msg'; } ?>">
        <div class="<?php if($chat->status == 'vendor'){ echo 'sent_msg';  }else{ echo 'received_withd_msg'; } ?>">
          <p>{{ $chat->message }}</p>
          <span class="time_date"> {{ $chat->created_at->format('M') .' '. \Carbon\Carbon::parse($chat->created_at)->day .', '. $chat->created_at->format('H:i:s')}}  </span></div>
      </div>
  </div>
@endforeach
<input type="hidden" id="user_id" name="user_id" value="{{ $chat->user_id }}">
<input type="hidden" id="product_id" name="product_id" value="{{ $chat->product_id }}">