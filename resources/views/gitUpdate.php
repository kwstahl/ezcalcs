<button id = "sync-btn"> Sync Repository </button>
<strong> meh </strong>
<strong> stank </strong>
<script>
    document.getElementById('sync-btn').addEventListener('click', function() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/sync-repo');
        xhr.send();
    });
</script>
