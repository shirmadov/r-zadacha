
let app_url = window.location.origin
$(document).ready(function () {
    console.log('Came');

    console.log(app_url);

    $('.view__more__btn').click(function () {

        let row__count = Number($('.js__row__count').val());
        let all__count = Number($('.js__all__count').val());
        console.log($('.js__news__main'))
        if (row__count < all__count) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            console.log(row__count);

            let url = app_url + '/view_more';
            $.ajax({
                type: "POST",
                url: url,
                data: {row_count: row__count},
                dataType: 'json',
                error: function (e) {
                    //window.location = url;
                },
                beforeSend: function () {
                    $(".js__view__more__btn").text("Загрузка...");
                },
                success: function (response) {

                    $(".js__news__main:last").after(response.content).show().fadeIn("slow");
                    $(".js__view__more__btn").text("Показать еще");
                    $(".js__row__count").val(row__count + Number(response.row_count))
                    // $(".js__all__count")
                }
            });
        }
    })

    $( "#form" ).submit(function( event ) {

        event.preventDefault();
        // var data, xhr;
        //
        // data = new FormData(event.target);
        //
        // xhr = new XMLHttpRequest();
        // let url = app_url + '/comment';
        // console.log(url);
        // xhr.open( 'POST', url, true );
        // xhr.onreadystatechange = function ( response ) {
        //     console.log(response);
        // };
        // xhr.send( data );


        // var formData = new FormData(event.target)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let url = app_url + 'comment';
        $.ajax({
            type: "POST",
            url: url,
            data: {
                row:"sadas"
            },
            dataType: 'json',
            error: function (e) {
                //window.location = url;
            },
            beforeSend: function () {
                // $(".js__view__more__btn").text("Загрузка...");
            },
            success: function (response) {

                // $(".js__news__main:last").after(response.content).show().fadeIn("slow");
                // $(".js__view__more__btn").text("Показать еще");
                // $(".js__row__count").val(row__count + Number(response.row_count))
                // $(".js__all__count")
            }
        });
    });


})




// function contentEditable(){
//     const content = document.getElementById('message');
//     const place_text = content.getAttribute('data-placeholder');
//     console.log(place_text,content.innerHTML);
//     content.innerHTML = place_text
//     // content.innerHTML === '' && (content.innerHTML = place_text);
//     content.addEventListener('focus', function (e) {
//         const value = e.target.innerHTML;
//         value === place_text && (e.target.innerHTML = '');
//     });
//
//     content.addEventListener('blur', function (e) {
//         const value = e.target.innerHTML;
//         value === '' && (e.target.innerHTML = place_text);
//     });
// }


// document.addEventListener("DOMContentLoaded", ()=>{
//     function contentEditable(){
//         const content = document.getElementById('message');
//         const place_text = content.getAttribute('data-placeholder');
//         console.log(place_text,content.innerHTML);
//         content.innerHTML = place_text
//         // content.innerHTML === '' && (content.innerHTML = place_text);
//         content.addEventListener('focus', function (e) {
//             const value = e.target.innerHTML;
//             value === place_text && (e.target.innerHTML = '');
//         });
//
//         content.addEventListener('blur', function (e) {
//             const value = e.target.innerHTML;
//             value === '' && (e.target.innerHTML = place_text);
//         });
//     }
// })
