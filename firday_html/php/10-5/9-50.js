function show(id) {
    document.getElementById(id).style.display = 'block';
}
function nonshow(id) {
    document.getElementById(id).style.display = 'none';
}
function message() {
    alert("Hi, \n 歡迎光臨 ")
}

function winopen() {
    var reply = confrim('Are you sure?')
    if (reply == true) {
        window.open("https://www.google.com.tw/?hl=zh_TW", "winopen", "width=300 height=200")
    }
    else {
        alert("下次再來")
    }
}
function start() {
    alert("Hi, \n 歡迎光臨 ")
    var name = prompt("請輸入姓名", "")
    alert("你好" + name)
}
function msg() {
    let win = document.querySelector('#info');
    win.showModal();
    let close = document.querySelector('#close');
    close.addEventListener('click', function () {
        win.close();
    });
}
function check() {
    if (document.getElementById("data").value == "") {
        alert("學號不得為空")
        document.getElementById("data").focus()
    }
}
function mySelect() {
    var sd = document.getElementById('sel');
    sd.style.display = 'inline';
}

function hover() {
    document.getElementById("demo").style.backgroundColor = "light";
    document.getElementById("demo").style.color = "blue";
}

function hout() {
    document.getElementById("demo").style.backgroundColor = "white";
    document.getElementById("demo").style.color = "black";
}