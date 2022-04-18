$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    $('#show').on('click',function (){
        $('#addL').toggleClass('hidden');
    });
});