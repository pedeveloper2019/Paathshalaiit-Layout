$(function () {
    $("#top-toggle").click(function (e) { 
        // e.preventDefault();
        $(".navCollapse").slideUp()
        $(".slideDiv").slideToggle();
    });
    $("#navCollapsebtn").click(function (e) { 
        // e.preventDefault();
        $(".slideDiv").slideUp();
        $(".navCollapse").slideToggle();
    });
    
    header = $("#slider").height()
    
    $(window).scroll(function () { 
        if ($(window).scrollTop() >= header) {
            $('.navbar').addClass('bg-light');
            $(".navbar").css("margin-top","0vh")
            $(".navbar-brand img").attr("src","assets/images/logo/ps.png");
        }
        else {
            $('.navbar').removeClass('bg-light');
            $(".navbar").css("margin-top","3vh")
            $(".navbar-brand img").attr("src","assets/images/logo/whitelLogo-Paathshala.png");
        }
    });
    // alert($(window).width())
    if(!($(window).width() < 990))
    {
        $(".card").click(function (e) {
        data_for = $(this).attr("data-for");
        data = $(this).find(".card-infobox").html();
        if(data_for == 1)
        {
            position = $(this).attr("pos-to");
            $(".arrow2").css({"display":"none"})
            $(".infobox2").css({"display":"none"})
            $(".arrow1").css({"display":"block"})
            $(".infobox1").css({"display":"block"}).text(data)
            // alert(data)
            $(".arrow1").css({
                left: position,
            })
            $(this).parent().mouseleave(function(){
                $(".arrow2").css({"display":"none"})
                $(".infobox2").css({"display":"none"})
                $(".arrow1").css({"display":"none"})
                $(".infobox1").css({"display":"none"})
            }) 
        }
        else
        {
            $(".arrow1").css({"display":"none"})
            $(".infobox1").css({"display":"none"})
            $(".arrow2").css({"display":"block"})
            $(".infobox2").css({"display":"block"}).text(data)
            position = $(this).attr("pos-to");
            card_no = 
            // alert(position)
            $(".arrow2").css({
                left: position,
            })
        }
        });
    }
    else
    {
        $(".card").click(function (e) 
        { 
            // alert()
            data = $(this).find(".card-infobox").html();
            // alert(data);
            infobox = $(this).next(".responsive-infobox")
            $(infobox).text(data)
            $(infobox).slideToggle()
        });
    }
});