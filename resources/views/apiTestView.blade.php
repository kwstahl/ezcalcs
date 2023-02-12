<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <form action="{{ route('sympiApi.store') }}" method="POST">
        <input name="testdata">test<br>
        <input type="submit" id="testButton">
    </form>

    <div id="test">
        Test DATA
    </div>

    <script>
        $(document).ready(function() {
            $("#testButton").click(function() {
                const formData = new FormData(document.querySelector('form'));
                formData.append('name', formData.get('testdata'));
                $.ajax({
                    url: '/api/sympiApi',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // Display the result returned by the PHP script.
                        $("#test").text(data.output);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(errorThrown);
                    }
                });
            });
        });
    </script>
</body>

</html>
