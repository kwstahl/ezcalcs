<button id = "sync-btn"> Sync Repository </button>
<strong>pls</strong>
<strong>again</strong>
<strong> suck </strong>
<script>
    document.getElementById('sync-btn').addEventListener('click', function() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/sync-repo');
        xhr.send();
    });
</script>
