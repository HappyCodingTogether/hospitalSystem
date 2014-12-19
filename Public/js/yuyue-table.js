/**
 * Created by tsukaima on 2014/12/19.
 */
$(document).ready(function () {
    loadPage();
    $(".prev-month").click(prevMonth);
    $(".next-month").click(nextMonth);
})

function loadPage() { //加载页面
    setMonth();
    setdays();
}

function setMonth() { //设置当前月份显示
    var nowDate = new Date();
    var year = nowDate.getFullYear();
    var month = nowDate.getMonth()+1;
    $("#yuyue-year").text(year);
    $("#yuyue-month").text(month);
}

function getMaxday(year,month) { //获取月份最大天数
    switch(month) {
        case 0:
        case 2:
        case 4:
        case 6:
        case 7:
        case 9:
        case 11:
            return 31;
        case 3:
        case 5:
        case 8:
        case 10:
            return 30;
        case 1:
            if(isLeapYear(year))
                return 29;
            else
                return 28;
    }
}

function isLeapYear(year) { //判断是否闰年
    return (0==year%4&&((year%100!=0)||(year%400==0)));
}

function setdays() { //设置某月份日期显示
    var year = $("#yuyue-year").text();
    var month = $("#yuyue-month").text()-1;
    var days = getMaxday(year,month);
    var day1At = new Date(year,month,1).getDay();
    var tdDay = $(".days td");
    var length = tdDay.length;
    for(i = 0; i < length; i++) {
        if(i >= day1At && i< day1At+days) {
            tdDay.eq(i).children("span").text(i+1-day1At);
            tdDay.eq(i).addClass("month-day");
        }
        else {
            tdDay.eq(i).children("span").text("");
            tdDay.eq(i).removeClass("month-day");
        }

    }
    if(day1At+days > length-7) {
        $("#month-add").removeClass("hide");
        $("#day-add").removeClass("hide");
    }
    else {
        $("#month-add").addClass("hide");
        $("#day-add").addClass("hide");
    }
}

function prevMonth() { //上一月
    changeMonth(1);
}

function nextMonth() { //下一月
    changeMonth(2);
}

function changeMonth(a) { //更改月份设置当月日期
    var year = $("#yuyue-year").text();
    var month = $("#yuyue-month").text();
    if(a == 1) {
        if(month > 1)
            month--;
        else {
            month = 12;
            year--;
        }
    }
    else {
        if(month < 12)
            month++;
        else {
            month = 1;
            year++;
        }
    }
    $("#yuyue-year").text(year);
    $("#yuyue-month").text(month);
    setdays();
    alert($(".month-day span").length);
}

