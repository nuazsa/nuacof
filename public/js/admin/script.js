document.querySelector('.toggle').addEventListener('click', function() {
    document.querySelector('#sidebar').classList.toggle('collapsed');
    document.querySelector('#navbar').classList.toggle('collapsed');
});