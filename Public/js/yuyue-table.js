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
    setDays();
    setYuyue();
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

function setDays() { //设置某月份日期显示
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
    setDays();
    setYuyue();
}

function setYuyue() { //设置格子预约情况
    var keshiID = $("#keshiID").text();
    var yuyueDay = $("#yuyueDay").text();
    var year = $("#yuyue-year").text();
    var month = $("#yuyue-month").text();

    $.ajax({
        url: '',//目标地址
        type: 'POST',
        async:false,
        dataType: 'json',
        data: "type="+"yuyue_table"+"&keshiID="+keshiID+"&year="+year+"&month="+month+"&yuyueDay="+yuyueDay,
        success:function(data) {
    //var data = new Array();
    //data[0] = 1;data[1] = 1;data[2] = 2;data[3] = 1;data[4] = 1;data[5] = 0;data[6] = 2;
    //data[7] = 2;data[8] = 0;data[9] = 1;data[10] = 2;data[11] = 1;data[12] = 1;data[13] = 0;
    //data[14] = 1;data[15] = 0;data[16] = 1;data[17] = 1;data[18] = 1;data[19] = 1;data[20] = 1;
    //data[21] = 0;data[22] = 1;data[23] = 1;data[24] = 2;data[25] = 1;data[26] = 0;data[27] = 1;
    //data[28] = 1;data[29] = 2;data[30] = 1;
            var monthDay = $("td.month-day");
            var length = monthDay.length;
            for(i = 0; i < length; i++) {
                if(data[i] == 0) {
                    bukeYuyue(monthDay.eq(i));
                }
                else if(data[i] == 1) {
                    keYuyue(monthDay.eq(i));
                }
                else {
                    yueman(monthDay.eq(i));
                }
            }
            bukeYuyue($(".days td").not(".month-day"));
        }
    });
}

function keYuyue(doc) { //设置可预约格子
    doc.children("strong").remove();
    var html = "<strong>预约</strong>";
    doc.append(html);
    doc.addClass("ke-yuyue");
    doc.removeClass("yueman buke-yuyue");
}

function yueman(doc) { //设置约满格子
    doc.children("strong").remove();
    var html = "<strong>约满</strong>";
    doc.append(html);
    doc.addClass("yueman");
    doc.removeClass("ke-yuyue buke-yuyue");
}

function bukeYuyue(doc) { //设置不可预约格子
    doc.children("strong").remove();
    doc.addClass("buke-yuyue");
    doc.removeClass("ke-yuyue yueman");
}



