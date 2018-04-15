
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Direct Messaging</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="wrapper">
    <div class="container">
        <div class="left">
            <div class="top">
                <input id="search-users" type="text" onkeyup="searchUsers();" />
                <a href="javascript:;" class="search"></a>
            </div>
            <ul class="people">
                <!-- <li class="person" data-chat="person101">
                    <img src="https://s13.postimg.org/ih41k9tqr/img1.jpg" alt="" />
                    <span class="name">Thomas Bangalter</span>
                    <span class="time">2:09 PM</span>
                    <span class="preview">I was wondering...</span>
                </li> -->
                @foreach($groups as $group)
                <li class="person" data-chat="person{{$group->id}}">
                    <img src="https://s13.postimg.org/ih41k9tqr/img1.jpg" alt="" />
                    <span class="name">{{$group->name}}</span>
                    <span class="time">2:09 PM</span>
                    <span class="preview">msg preview</span>
                </li>
                @endforeach
                <!-- <li class="person" data-chat="person102">
                    <img src="https://s3.postimg.org/yf86x7z1r/img2.jpg" alt="" />
                    <span class="name">Dog Woofson</span>
                    <span class="time">1:44 PM</span>
                    <span class="preview">I've forgotten how it felt before</span>
                </li>
                <li class="person" data-chat="person103">
                    <img src="https://s3.postimg.org/h9q4sm433/img3.jpg" alt="" />
                    <span class="name">Louis CK</span>
                    <span class="time">2:09 PM</span>
                    <span class="preview">But we’re probably gonna need a new carpet.</span>
                </li>
                <li class="person" data-chat="person104">
                    <img src="https://s3.postimg.org/quect8isv/img4.jpg" alt="" />
                    <span class="name">Bo Jackson</span>
                    <span class="time">2:09 PM</span>
                    <span class="preview">It’s not that bad...</span>
                </li>
                <li class="person" data-chat="person105">
                    <img src="https://s16.postimg.org/ete1l89z5/img5.jpg" alt="" />
                    <span class="name">Michael Jordan</span>
                    <span class="time">2:09 PM</span>
                    <span class="preview">Wasup for the third time like is 
you bling bitch</span>
                </li>
                <li class="person" data-chat="person106">
                    <img src="https://s30.postimg.org/kwi7e42rh/img6.jpg" alt="" />
                    <span class="name">Drake</span>
                    <span class="time">2:09 PM</span>
                    <span class="preview">howdoyoudoaspace</span>
                </li> -->
            </ul>
        </div>
        <div class="right">
            <div class="top"><span>To: <span class="name"> </span></span></div>
            <!-- <div class="chat" data-chat="person101">
                <div class="conversation-start">
                    <span>Today, 6:48 AM</span>
                </div>
                <div class="bubble you">
                    Hello,
                </div>
                <div class="bubble you">
                    it's me.
                </div>
                <div class="bubble you">
                    I was wondering...
                </div>
            </div> -->
            @foreach($conversations as $key => $con)
            <div class="chat" data-chat="person{{$key}}" group-id="{{$key}}">
                <div class="conversation-start">
                    <span>Today, 6:48 AM</span>
                </div>
                @foreach($con as $msg)
                    @if($msg->user->id == Auth::user()->id)    
                    <div class="bubble me">
                       {{$msg->user->name}} <br/> {{$msg->message}}
                    </div>
                    @else
                    <div class="bubble you">
                       {{$msg->user->name}} <br/> {{$msg->message}}
                    </div>
                    @endif
                @endforeach
            </div>
            @endforeach
            <!-- <div class="chat" data-chat="person102">
                <div class="conversation-start">
                    <span>Today, 5:38 PM</span>
                </div>
                <div class="bubble you">
                    Hello, can you hear me?
                </div>
                <div class="bubble you">
                    I'm in California dreaming
                </div>
                <div class="bubble me">
                    ... about who we used to be.
                </div>
                <div class="bubble me">
                    Are you serious?
                </div>
                <div class="bubble you">
                    When we were younger and free...
                </div>
                <div class="bubble you">
                    I've forgotten how it felt before
                </div>
            </div>
            <div class="chat" data-chat="person103">
                <div class="conversation-start">
                    <span>Today, 3:38 AM</span>
                </div>
                <div class="bubble you">
                    Hey human!
                </div>
                <div class="bubble you">
                    Umm... Someone took a shit in the hallway.
                </div>
                <div class="bubble me">
                    ... what.
                </div>
                <div class="bubble me">
                    Are you serious?
                </div>
                <div class="bubble you">
                    I mean...
                </div>
                <div class="bubble you">
                    It’s not that bad...
                </div>
                <div class="bubble you">
                    But we’re probably gonna need a new carpet.
                </div>
            </div>
            <div class="chat" data-chat="person104">
                <div class="conversation-start">
                    <span>Yesterday, 4:20 PM</span>
                </div>
                <div class="bubble me">
                    Hey human!
                </div>
                <div class="bubble me">
                    Umm... Someone took a shit in the hallway.
                </div>
                <div class="bubble you">
                    ... what.
                </div>
                <div class="bubble you">
                    Are you serious?
                </div>
                <div class="bubble me">
                    I mean...
                </div>
                <div class="bubble me">
                    It’s not that bad...
                </div>
            </div>
            <div class="chat" data-chat="person105">
                <div class="conversation-start">
                    <span>Today, 6:28 AM</span>
                </div>
                <div class="bubble you">
                    Wasup
                </div>
                <div class="bubble you">
                    Wasup
                </div>
                <div class="bubble you">
                    Wasup for the third time like is <br />you blind bitch
                </div>

            </div>
            <div class="chat" data-chat="person106">
                <div class="conversation-start">
                    <span>Monday, 1:27 PM</span>
                </div>
                <div class="bubble you">
                    So, how's your new phone?
                </div>
                <div class="bubble you">
                    You finally have a smartphone :D
                </div>
                <div class="bubble me">
                    Drake?
                </div>
                <div class="bubble me">
                    Why aren't you answering?
                </div>
                <div class="bubble you">
                    howdoyoudoaspace
                </div>
            </div> -->
            <div class="write">
                <a href="javascript:;" class="write-link attach"></a>
                <input id="message" type="text" onkeypress="return enterPressed(event);" placeholder="Type your message..." />
                <a href="javascript:;" class="write-link smiley"></a>
                <a href="javascript:sendMessage();" class="write-link send"></a>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>

<script type="text/javascript">
    // $( document ).ready(function() {
        listenForNewGroups();

        @foreach($groups as $group)
        listenForNewMessage({{$group->id}});
        @endforeach
    // });

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

	function searchUsers() {
		var search = $('#search-users').val();
        search = search.replace(/^\s+/, '').replace(/\s+$/, ''); //avoid whitespace
        if(search === '' || search == null) { 
            $('ul.people > li.temporary').remove(); //remove old suggestions

        } else {
            $.get('/search', {search: search}, function(data){
             // console.log(data.data);
            $('ul.people > li.temporary').remove();

             data.data.forEach(function(user) {
                $('ul.people').prepend(' \
                <li class="person temporary" onclick="addToList('+user.id+');" data-chat="person' + user.id + '"> \
                    <img src="https://s13.postimg.org/ih41k9tqr/img1.jpg" alt="" /> \
                    <span class="name">'+ user.name + '</span> \
                    <span class="time">2:09 PM</span> \
                    <span class="preview"> </span> \
                </li>');
                });
            
            });
        }
	    
	}
    function addToList(user_id) {
        $('li[data-chat="person' + user_id +'"]').removeClass('temporary');
        $('div.right > div.top').after('\
                <div class="chat" data-chat="person' + user_id + '"> \
                <div class="conversation-start">\
                    <span>Yesterday, 4:20 PM</span>\
                </div>');
        $('li[data-chat="person' + user_id +'"]').removeAttr('onclick');
        $('li[data-chat="person' + user_id +'"]').prop('onclick',null).off('click');
    }

    // $('ul.people > li.person.temporary').on('click', function() {
    //         $(this).removeClass('temporary');
    //         var person_id = $(this).attr('data-chat');
    //         $('div.right.top').after('\
    //             <div class="chat" data-chat="' + person_id + '"> \
    //             <div class="conversation-start">\
    //                 <span>Yesterday, 4:20 PM</span>\
    //             </div>');
    // });
    function enterPressed(e) {
        if (e.keyCode == 13) {
            sendMessage();
            return false;
        }
    }
    function sendMessage() {
        //get group id from active chat so find active chat
        var group_id = $('div.chat.active-chat').attr('group-id');
        var message = $('input#message').val();
        
        message = message.replace(/^\s+/, '').replace(/\s+$/, ''); //avoid whitespace
        if(message === '' || message == null) {
            $('input#message').val('');
        } else {
            $.post('/conversations', {message: message, group_id: group_id})
                    .then((response) => {
                        $('input#message').val('');
                        //this.conversations.push(response.data);
                        $('div.chat.active-chat').append('\
                            <div class="bubble me">\
                            ' + response["user"]["name"] +"<br/>"+ response["message"] + '\
                            </div>');
            });
        }
    }

    function getGroupMessages(group_id) {
        $.get('/group-messages', {group_id: group_id})
            .then((response) => {
                console.log(response);
            });
    }

    function listenForNewGroups() {
        Echo.private('users.' + {{Auth::user()->id}})
            .listen('GroupCreated', (e) => {
                // this.groups.push(e.group);
                // console.log(e);
                //for new group, add it to left list and plus div to righ list for chatting
                $('ul.people').prepend(' \
                <li class="person" data-chat="person' + e["group"]["id"] + '"> \
                    <img src="https://s13.postimg.org/ih41k9tqr/img1.jpg" alt="" /> \
                    <span class="name">'+ e["group"]["name"] + '</span> \
                    <span class="time">2:09 PM</span> \
                    <span class="preview"> msg preview </span> \
                </li>');
                $('div.right > div.top').after('\
                <div class="chat" data-chat="person'+e["group"]["id"]+'" group-id="'+e["group"]["id"]+'">\
                        <div class="conversation-start">\
                            <span>Today, 6:48 AM</span>\
                        </div>\
                </div>');
                listenForNewMessage(e["group"]["id"]);
            });
    }

    function listenForNewMessage(group_id) {
            Echo.private('groups.' + group_id)
                .listen('NewMessage', (e) => {
                    console.log(e);
                    var user_id = e["user"]["id"];
                    if(user_id == {{Auth::user()->id}}) { //message from current user
                        $('div.chat[group-id=\"'+group_id+'\"]').append('\
                            <div class="bubble me">\
                            ' + e["user"]["name"] +'<br/>'+ e["message"] + '\
                            </div>');
                    } else {
                        $('div.chat[group-id=\"'+group_id+'\"]').append('\
                            <div class="bubble you">\
                            ' + e["user"]["name"] +'<br/>'+ e["message"] + '\
                            </div>');
                    }
                    // this.conversations.push(e);
            });
    }
</script>


</body>

</html>
