<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    include 'add.php';
    defineNumberOfForms();
?>
<button type="button" id="add-button" style="display: block; right: 0; margin-left: auto">add more..</button>
<script>
    if (document.getElementById('add-button')) {
        document.getElementById('add-button').addEventListener("click", function () {
            let url = new URL(window.location.href);
            let search_params = url.searchParams;
            if (search_params.has('forms')) {
                search_params.set('forms', (parseInt(search_params.get('forms')) + 1).toString())
            }
            window.location.search = search_params
        })

    }

    let submitButton = document.getElementById('submit-button')
    if (submitButton) {
        submitButton.addEventListener('click', function () {
            let url = new URL(window.location.href);
            let search_params = url.searchParams;
            let input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'forms');
            input.setAttribute('value', search_params.get('forms'))
            let form = document.getElementById('form')
            form.appendChild(input)
            form.submit();
        })
    }
</script>
</body>
</html>