
$(document).ready(function(){
   
    var frm = $('#send-to-edit');

    frm.submit(function (e) {

    e.preventDefault();
    

    $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        success: function (data) {
            
            console.log('Submission was successful.');
            var show = $("#update-alert");
            show.html("<p class='alert alert-success'>"+data+"</p>") ;
           
            setTimeout(function(){
                show.html("");
                frm[0].reset();
                // frm.trigger("reset");
            },2000)

           
        },
        error: function (data) {
            console.log('An error occurred.');
            show.html("<p class='alert alert-danger'>"+data+"</p>") ;
            console.log(data);
        },
    });
});
});

