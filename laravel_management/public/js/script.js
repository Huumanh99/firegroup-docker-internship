$(document).ready(function () {
     //validate createUser
    $("#createForm").validate({
        rules: {
            name: {
                required: true,
                maxlength: 20
            },
            address: {
                required: true,
                maxlength: 20
            },
            phone: {
                required: true,
                maxlength: 20
            },

        },
        messages: {

            name: {
                required: "Name is required",
            },
            address: {
                required: "address is required",
            },
            phone: {
                required: "phone is required",
            },
        }
    });

    //Listuser
    $("input#searchName").on('blur keyup', function () {
        console.log($(this).val());
        $.ajax({
            type: 'GET',
            url: '/users/search', // route ??
            data: {
                name: $(this).val()
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                var htmlItems = '';
                $.each(response, function (index, item) {
                    htmlItems += "<div><a href='/users?name=" + item['name'] + "'>" + item['name'] + "</a></div>";
                });
                $('.autocomplete-items').html(htmlItems)
            }
        });
    });
    //Autocomplete Products
    $("input#searchTitle").on('blur keyup', function () {
        console.log($(this).val());
        $.ajax({
            type: 'GET',
            url: '/products/search', // route ??
            data: {
                title: $(this).val()
            },
            dataType: "json",
            success: function (response) {
                console.log(response);

                var htmlItems = '';
                $.each(response, function (index, item) {
                    htmlItems += "<div><a href='/products?title=" + item['title'] + "'>" + item['title'] + "</a></div>";
                });
                $('.autocomplete-items').html(htmlItems)
            }
        });
    });
});
