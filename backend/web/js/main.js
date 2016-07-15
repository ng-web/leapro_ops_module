$(function(){

        $(document).on('click', '.fc-day',function(){
        
        alert('hello');
        });
        
        $(document).on('click', '.fc-event-container',function(){
        
            //$.get('index.php?r=event/url');
        //var id = $(this).val();
        //alert(id);
        window.location.href = 'index.php?r=event/view';
        });
 
});