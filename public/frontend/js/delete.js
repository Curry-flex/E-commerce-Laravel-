$('document').ready(function(event){

    
    $('table #delete').on('click',function(){
        event.preventDefault();

        var href =$(this).attr('href')
        $('#confirmDelete').attr('href',href)
        $('#deleteModal').modal();
    })
})