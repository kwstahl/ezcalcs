<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <form action="{{ route('/process-formula') }}" method="POST">
        @method('POST')
        @csrf
        <input name="testdata">test<br>
        <input type="submit" id="testButton">
    </form>

    <div id="test">
        Test DATA
    </div>
</body>
</html>
