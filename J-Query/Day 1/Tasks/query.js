$(".logo1").on("click",function(){
    $(".logo1 p").toggle(1000)
})
$(".logo2").on("click",function(){
    $(".logo2 p").toggle(1000)
})
$(".logo3").on("click",function(){
    $(".logo3 p").toggle(1000)
})


// ==================================================================================

const stopBtn = $(".task1 button");
    stopBtn.css({ margin: "1rem 0", padding: ".75rem 3rem" });
    $(".task1 h2").css({ color: "brown" });

    function changeImg() {
        const activeImg = $(".task1 img.active");
        //   check if last element
        if (activeImg.index() == activeImg.siblings().length) {
        $(".task1 img").first().addClass("active");
        } else {
        activeImg.next().addClass("active");
        }
        activeImg.removeClass("active");
    }

    let slider = setInterval(changeImg, 100);

    stopBtn.on("click", () => {
        if (stopBtn.text() === "Stop") {
        clearInterval(slider);
        stopBtn.text("Play!");
        } else {
        slider = setInterval(changeImg, 100);
        stopBtn.text("Stop");
        }
    });

