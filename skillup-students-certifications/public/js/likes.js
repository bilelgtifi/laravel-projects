
$(".like").on('click',function(){
    var like_s=$(this).attr('data_like');
    var certifcate_id=$(this).attr('data_certifcate_id');
    certifcate_id = certifcate_id.slice(0,-2);
    $.ajax({
        type: 'POST',
        url: url,
        data:{like_s :like_s, certifcate_id:certifcate_id, _token:token },
        success: function(data){
            if (data.is_like ==1) {
                $('*[data_certifcate_id="'+certifcate_id+'_l"]').removeClass('btn-secondary').addClass('btn-success');
                $('*[data_certifcate_id="'+certifcate_id+'_d"]').removeClass('btn-danger').addClass('btn-secondary');

                var cu_like = $('*[data_certifcate_id="'+certifcate_id+'_l"]').find('.like_count').text();
                var new_like = parseInt(cu_like) + 1;
                $('*[data_certifcate_id="'+certifcate_id+'_l"]').find('.like_count').text(new_like);
                if (data.change_like ==1) {
                    var cu_like = $('*[data_certifcate_id="'+certifcate_id+'_d"]').find('.dislike_count').text();
                    var new_like = parseInt(cu_like) - 1;
                    $('*[data_certifcate_id="'+certifcate_id+'_d"]').find('.dislike_count').text(new_like);
                }
            }
            if (data.is_like ==0) {
                $('*[data_certifcate_id="'+certifcate_id+'_l"]').removeClass('btn-success').addClass('btn-secondary');

                var cu_like = $('*[data_certifcate_id="'+certifcate_id+'_l"]').find('.like_count').text();
                var new_like = parseInt(cu_like) - 1;
                $('*[data_certifcate_id="'+certifcate_id+'_l"]').find('.like_count').text(new_like);
            }


        }
    });

});


$(".dislike").on('click',function(){
    var like_s=$(this).attr('data_like');
    var certifcate_id=$(this).attr('data_certifcate_id');
    certifcate_id = certifcate_id.slice(0,-2);
    $.ajax({
        type: 'POST',
        url: url_dis,
        data:{like_s :like_s, certifcate_id:certifcate_id, _token:token },
        success: function(data){
            if (data.is_dislike ==1) {
                $('*[data_certifcate_id="'+certifcate_id+'_d"]').removeClass('btn-secondary').addClass('btn-danger');
                $('*[data_certifcate_id="'+certifcate_id+'_l"]').removeClass('btn-success').addClass('btn-secondary');

                var cu_like = $('*[data_certifcate_id="'+certifcate_id+'_d"]').find('.dislike_count').text();
                var new_like = parseInt(cu_like) + 1;
                $('*[data_certifcate_id="'+certifcate_id+'_d"]').find('.dislike_count').text(new_like);
                if (data.change_dislike ==1) {
                    var cu_like = $('*[data_certifcate_id="'+certifcate_id+'_l"]').find('.like_count').text();
                var new_like = parseInt(cu_like) - 1;
                $('*[data_certifcate_id="'+certifcate_id+'_l"]').find('.like_count').text(new_like);
                }
            }
            if (data.is_dislike ==0) {
                $('*[data_certifcate_id="'+certifcate_id+'_d"]').removeClass('btn-danger').addClass('btn-secondary');

                var cu_like = $('*[data_certifcate_id="'+certifcate_id+'_d"]').find('.dislike_count').text();
                var new_like = parseInt(cu_like) - 1;
                $('*[data_certifcate_id="'+certifcate_id+'_d"]').find('.dislike_count').text(new_like);
            }
        }
    });

});
