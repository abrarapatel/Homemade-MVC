<!doctype html>
<html>

<head>
    <title>Index</title>
    <link rel="stylesheet" href="../Templates/index/style.css">

</head>

<body>
    <h1>Index</h1>
    <p>This is the Index page content.</p>
</body>

<script src="../Assets/js/ajax-handler.js"></script>

<script>
    snapMVCAjax("callMethod/111", "POST")
    .then(data => {
        console.log(data);
    });

    snapMVCAjax("callMethod/456", "POST", {extradata1: "Extra Data 1", extradata2: "Extra Data 2"})
    .then(data => {
        console.log(data);
    });

    snapMVCAjax("callMethod/Get Ajax", "GET")
    .then(data => {
        console.log(data);
    });

</script>


</html>