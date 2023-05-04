$(document).on('click', '.action-edit-ratings', function(event) {
    event.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/user_edit_ratings/' + id + '/ajaxedit',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#e_ratings_id').val(response.rating.id);
            $('#e_rater_rating').val(response.rating.rating);
            $('#e_rater_review').val(response.rating.rating_msg);
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseText);
        }
    });
});
