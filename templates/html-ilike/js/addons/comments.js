export default function comment(){
    $('.btn__comment').click(function(){
        $('.modal-comment').toggleClass('active');
        $('.btn__clos').on('click', function(){
            $('.modal-comment').removeClass('active');
        })
    });
    $(".modal-comment").on("click", function (e) {
        if (
            !$(".container__comment").is(e.target) &&
            $(".container__comment").has(e.target).length == 0
        ) {
            $('.modal-comment').removeClass('active');
        }
    });
    $('.btn__reply').on('click', function(){
        let __ = $(this).parents('.cm__content').children('.cm__reply');
        $('.cm__reply').not(__).slideUp();
        __.slideToggle();
        autosize($('textarea'));
    });
    $('.btn__ph').on('click', function(){
        let cm__ = $(this).parents('.cm__content').children('.cm__mess');
        $('.cm__reply').not(cm__).slideUp();
        cm__.slideToggle('.cm__mess');
        autosize($('textarea'));
    })
}
