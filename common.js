
$(document).ready(function(){
    
    // Review
	var rating_data = 0;

    $('#add_review').click(function(){
        $('#review_modal').modal('show');
    });
    $('#add_question').click(function(){
        $('#question_modal').modal('show');
    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');
        reset_background();
        for(var count = 1; count <= rating; count++)
        {
            $('#submit_star_'+count).addClass('rv-color');
        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {
            $('#submit_star_'+count).addClass('star-light');
            $('#submit_star_'+count).removeClass('rv-color');
        }
    }

    $(document).on('mouseleave', '.submit_star', function(){
        reset_background();
        for(var count = 1; count <= rating_data; count++)
        {
            $('#submit_star_'+count).removeClass('star-light');
            $('#submit_star_'+count).addClass('rv-color');
        }

    });

    $(document).on('click', '.submit_star', function(){
        rating_data = $(this).data('rating');
    });

    $('#save_review').click(function(){
        var user_name = $('#user_name').val();
        var user_review = $('#user_review').val();
        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');
                    $('#question_modal').modal('hide');
                    load_rating_data();
                    // alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"submit_rating.php",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('rv-color');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);
                $('#total_four_star_review').text(data.four_star_review);
                $('#total_three_star_review').text(data.three_star_review);
                $('#total_two_star_review').text(data.two_star_review);
                $('#total_one_star_review').text(data.one_star_review);
                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');
                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');
                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');
                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');
                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';
                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';
                        html += '<div class="col-sm-12">';
                        html += '<div class="card">';
                        html += '<div class="card-header d-flex align-items-center"><div class="rounded-circle user-bg-color text-white pt-2 pb-2 mr-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div><b>'+data.review_data[count].user_name+'</b></div>';
                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';
                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'rv-color';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';
                        html += data.review_data[count].user_review;
                        html += '</div>';
                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

    // Question
    $('#comment_form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
        url:"add_comment.php",
        method:"POST",
        data:form_data,
        dataType:"JSON",
        success:function(data)
        {
            if(data.error != '')
            {
            $('#comment_form')[0].reset();
            // $('#comment_message').html(data.error);
            $('#comment_id').val('0');
            load_comment();
            }
        }
        })
        });

        load_comment();

        function load_comment()
        {
        $.ajax({
        url:"fetch_comment.php",
        method:"POST",
        success:function(data)
        {
            $('#display_comment').html(data);
        }
        })
        }

        $(document).on('click', '.reply', function(){
        var comment_id = $(this).attr("id");
        $('#comment_id').val(comment_id);
        $('#comment_name').focus();
    });

});