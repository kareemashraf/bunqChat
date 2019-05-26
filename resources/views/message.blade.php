@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row">
      <div class="col-md-8 col-md-offset-2">
         <div class="panel panel-default">
            <div class="panel-heading">Welcome!</div>
            <div class="panel-body">
               <ul class="chat">
                  <!-- Append the messages-->
               </ul>
            </div>
            <div class="panel-footer">
                 <div class="form-inline user-dropdown">
                    From: 
                  <div class="form-group mb-2">
                    <input type="hidden" id="userName">
                    <select class="form-control" id="fromUsers">
                        <option value="">Select User to send messag</option>
                      <!-- append users -->
                      @foreach($users as $user)
                          <option value='{{ $user->id }}'>{{ $user->name }}</option>
                      @endforeach
                    </select>
                  </div>
                    &nbsp;&nbsp;
                  To: 
                  <div class="form-group mx-sm-3 mb-2">
                    <select class="form-control" id="toUsers">
                        <option value="">Select User to chat with</option>
                      <!-- append users -->
                      @foreach($users as $user)
                          <option value='{{ $user->id }}'>{{ $user->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
               <div class="input-group">
                <input id="btn-input " type="text" name="message" placeholder="Type your message here..." class="message-text form-control input-sm" value=""> 
                <span class="input-group-btn">
                    <i class="far fa-paper-plane"></i>
                    <button id="btn-chat" class="btn btn-success btn-sm">Send</button>
                </span>
               </div>
            </div>
         </div>
      </div>
      <div class="notification"></div>
   </div>
</div>
<div id="chatRow" style="display: none;">
    <div class="chat_">
    <li class="left clearfix">
        <div class="chat-body clearfix">
            <div class="header">
                <strong class="primary-font username"> </strong>
                    <i><span class="messageDate"></span></i>
            </div>
            <p class="message">
                
            </p>
        </div>
    </li>
    </div>
</div>
@endsection