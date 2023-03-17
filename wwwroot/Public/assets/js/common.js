AOS.init({
    offset: 50,
    duration: 1500,
    easing: 'ease',
    delay: 100,
    once: 'true',
})

$(function() {
    // 导航展开收回
    $('.navbtn').click(function() {
        $('body').toggleClass('open')
    })

    // 打开搜索
    $(".search-btn").click(function() {
        $('.head-search').removeClass('search-hide')
        $('.head-right').addClass('head-hide')
    })
    // 关闭搜索
    $(".head-search .btn-close").click(function() {
        $('.head-search').addClass('search-hide')
        $('.head-right').removeClass('head-hide')
    })
    // 底部搜索打开关闭
    $('.foot-search-wrap .sbtn').click(function() {
        $('.foot-search-wrap').addClass('show')
    })
    $('.foot-search .btn-close').click(function() {
        $('.foot-search-wrap').removeClass('show')
    })

    winChange()
    winChange2()
    $(window).resize(function() {
        winChange()
        winChange2()
    })

    $('.language').mouseenter(function() {
        $(this).find('img').attr('src', '/Public/assets/images/lag2.png')
    }).mouseleave(function() {
        $(this).find('img').attr('src', '/Public/assets/images/lag.png')
    })


})

function winChange() {
    var ww = $(window).width()
    if (ww > 1280) {
        $('.nav li').mouseenter(function() {
            $(this).addClass('down')
        }).mouseleave(function() {
            $(this).removeClass('down')
        })
    } else {
        $('.nav li .item').click(function(e) {
            if ($(this).next('.subnav').length > 0) {
                e.preventDefault();
                $(this).parent('li').toggleClass('down')
                $(this).parent('li').siblings().removeClass('down')
            }
        })
    }
}

function winChange2() {
    var ww = $(window).width()
    if (ww <= 1024) {
        $('.foot-top .item .tt').click(function() {
            $(this).next().slideToggle()
            $(this).parent().siblings('.item').find('.sublist').slideUp()
        })
    }
}

function searchs(){
    var msg=$("#ipt").val();
    var msgs=$("#ipts").val();
    var word=''
    if(msg.length>0){
        word=msg;
    }
    if(msgs.length>0){
        word=msgs;
    }
    location.href="/search?q="+word;
}