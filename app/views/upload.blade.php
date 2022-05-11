<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="file" id="myFile" accept="image/*" multiple>

<button id="submitBtn">Submit</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('document').ready(function () {
            $('#submitBtn').click(function () {
                var formData = new FormData();
                formData.append("image", $("#myFile")[0].files[0]);
                
                $.ajax({
                    url: "https://api.imgur.com/3/image",
                    type: "POST",
                    datatype: "json",
                    async: false,
                    headers: {
                        "Authorization": "Client-ID aca6d2502f5bfd8"
                    },
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        var photo = response.data.link;
                        var photo_hash = response.data.deletehash;
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

            });


        });
    </script>
</body>

</html>