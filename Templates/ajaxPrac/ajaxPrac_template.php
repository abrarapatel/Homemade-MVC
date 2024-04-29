<!doctype html>
<html>

<head>
    <title>AjaxPrac</title>
</head>

<body>
    <h1>AjaxPrac</h1>
    <p>This is the AjaxPrac page content.</p>

    <button onclick="udpateData()">Click me to update</button>

    <script src='../Assets/js/ajax-handler.js'></script>

    <script>
        function udpateData() {
            snapMVCAjax("./updateData/27", "POST", {
                title: 'Title Changed',
                description: 'Plan Description'
            });
        }

        snapMVCAjax("./methodToCall/123/456", "POST")
            .then(data => {
                console.log(data);
            });

        snapMVCAjax("./method2ToCall/ABC", "POST", {
                extraParam1: ['A', 'B'],
                extraParam2: 123
            })
            .then(data => {
                console.log(data);
            });

        snapMVCAjax("./methodToCall/123/456", "GET")
            .then(data => {
                console.log(data);
            });
    </script>
</body>

</html>