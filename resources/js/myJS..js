$(document).ready(function(){
    $.get('http://localhost:8000/api/expenses_app/isValid/?api_token='+sessionStorage.getItem('token'),function(data, status){
        if (status && data['isValid']!==true){
            window.location.href='http://localhost:8000/expenses-app/user';
        }
    });
    $("#inAdd").click(function () {
        console.log('add')
        window.location.href='http://localhost:8000/expenses-app/in/add';
    })
    $("#viewList").click(function () {
        console.log('list')
        window.location.href='http://localhost:8000/expenses-app/in/list';

    })
});
