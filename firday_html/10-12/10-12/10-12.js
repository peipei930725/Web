var pics, now = 0, num = 4;

function showtime() {
    pics = document.getElementsByClassName("pic");
    show(now);

    var NowDate = new Date();
    var h = NowDate.getHours();
    var m = NowDate.getMinutes();
    var s = NowDate.getSeconds();
    document.getElementById('time1').value = '現在時間: ' + h + '時' + m + '分' + s + '秒';
    setTimeout('showtime()', 1000);
    setTimeout('showimg()', 1000);
}
function show(i) {
    now = i;
    for (var k = 0; k < pics.length; k++) {
        pics[k].style.display = "none";
    }
    pics[i].style.display = "block";

    dots = document.getElementsByClassName("dot")
    dots[now].style.backgroundColor = "red";
    for (var k = 0; k < dots.length; k++) {
        if (k != now) {
            dots[k].style.backgroundColor = "white";
        }
    }
}
function next() {
    now += 1;
    if (now > 3) now = 0;

    show(now);
}
function prev() {
    now -= 1;
    if (now < 0) now = 0;
    show(now);
}

function showimg() {
    next();
    show(now);
}