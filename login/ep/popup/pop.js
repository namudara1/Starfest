document.getElementById('button-payment').addEventListener('click',function()
{
    document.querySelector('.center').style.display = 'flex';
     
});

    document.querySelector('.close').addEventListener('click',
    function() {
        document.querySelector('.center').style.display = 'none';   
    });