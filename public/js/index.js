$('.chat[data-chat=person0]').addClass('active-chat'); // no group id with 0, just to init classes
$('.person[data-chat=person0]').addClass('active');

$(document).on('mousedown', '.left .person', function() {
// $('.left .person').mousedown(function(){
    if ($(this).hasClass('.active')) {
        return false;
    } else {
        var findChat = $(this).attr('data-chat');
        var personName = $(this).find('.name').text();
        $('.right .top .name').html(personName);
        $('.chat').removeClass('active-chat');
        $('.left .person').removeClass('active');
        $(this).addClass('active');
        $('.chat[data-chat = '+findChat+']').addClass('active-chat');

        // var group_id = $('div.chat.active-chat').attr('group-id');
        // getGroupMessages(group_id);
    }
});