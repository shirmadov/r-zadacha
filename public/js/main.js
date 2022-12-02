
let app_url = window.location.origin
$(document).ready(function () {
    console.log('Came');

    console.log(app_url);

    $('.view__more__btn').click(async function () {

        let row_count = Number($('.js__row__count').val());
        let all__count = Number($('.js__all__count').val());
        console.log($('.js__news__main'))
        if (row_count < all__count) {
            let url = app_url + '/view_more';
            // let response = await sendData({row_count: row_count}, url)
            //
            // console.log(response)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            await $.ajax({
                type: "POST",
                url: url,
                data: {row_count:row_count} ,
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
                    $(".js__row__count").val(row_count + Number(response.row_count))
                }
            });

            // $(".js__news__main:last").after(response.content).show().fadeIn("slow");
            // $(".js__view__more__btn").text("Показать еще");
            // $(".js__row__count").val(row_count + Number(response.row_count))
        }
    })


    $( "#form" ).submit(function( event ) {

        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let url = app_url + '/comment';
        $.ajax({
            type: "POST",
            url: url,
            data: $( this ).serialize(),
            dataType: 'json',
            error: function (e) {

                //window.location = url;
                console.log(e);
            },
            beforeSend: function () {

            },
            success: function (response) {
                    $('.news__comment__ul').prepend(response.content);
                    $('.news__comment__form').val('');
            }
        });


    });


    $('.js__search__bar').on('input', async function(e){

        let url = app_url + '/search';

        console.log($(this).val() ==' ')

        if( $(this).val() ){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: url,
                data: {search:$(this).val()??" "} ,
                dataType: 'json',
                error: function (e) {
                    //window.location = url;
                },
                beforeSend: function () {
                    $(".js__view__more__btn").text("Загрузка...");
                },
                success: function (response) {
                    console.log("Success")
                    $('.search__result').remove()
                    if(response.status == 1){
                        $('.header__inner').after(response.content);
                    }


                }
            })
        }else{
            $('.search__result').remove();
        }



    })

    $(document).click(function() {
        $('.search__result').remove();
    });

    async function sendData(data, url){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        await $.ajax({
            type: "POST",
            url: url,
            data:data ,
            dataType: 'json',
            error: function (e) {
                //window.location = url;
            },
            beforeSend: function () {
                $(".js__view__more__btn").text("Загрузка...");
            },
            success: function (response) {
                console.log(response)
                return response
            }
        });
    }






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
