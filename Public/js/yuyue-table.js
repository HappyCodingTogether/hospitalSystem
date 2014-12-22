/**
 * Created by tsukaima on 2014/12/19.
 */
$(document).ready(function () {
    $("#header_menu li").eq(2).addClass("active");
    loadPage();
    $(".prev-month").click(prevMonth);
    $(".next-month").click(nextMonth);
    $(".days td").click(yuyue);
})
//加载页面
function loadPage() {
    setMonth();
    setDays();
    setYuyue();
}
//设置当前月份显示
function setMonth() {
    var nowDate = new Date();
    var year = nowDate.getFullYear();
    var month = nowDate.getMonth()+1;
    $("#yuyue-year").text(year);
    $("#yuyue-month").text(month);
}
//获取月份最大天数
function getMaxday(year,month) {
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
//判断是否闰年
function isLeapYear(year) {
    return (0==year%4&&((year%100!=0)||(year%400==0)));
}
//设置某月份日期显示
function setDays() {
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
//上一月
function prevMonth() {
    $(this).addClass("hide");
    $(".next-month").removeClass("hide");
    changeMonth(1);
}
//下一月
function nextMonth() {
    $(this).addClass("hide");
    $(".prev-month").removeClass("hide");
    changeMonth(2);
}
//更改月份设置当月日期
function changeMonth(a) {
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
//设置格子预约情况
function setYuyue() {
    var keshiID = $("#keshiID").text();
    var yuyueDay = $("#yuyueDay").text();
    var year = $("#yuyue-year").text();
    var month = $("#yuyue-month").text();

    //$.ajax({
        //url: '',//目标地址
        //type: 'POST',
        //async:false,
        //dataType: 'json',
        //data: "type="+"yuyue_table"+"&keshiID="+keshiID+"&year="+year+"&month="+month+"&yuyueDay="+yuyueDay,
        //success:function(data) {
    var data = new Array();
    data[0] = 1;data[1] = 1;data[2] = 2;data[3] = 1;data[4] = 1;data[5] = 0;data[6] = 2;
    data[7] = 2;data[8] = 0;data[9] = 1;data[10] = 2;data[11] = 1;data[12] = 1;data[13] = 0;
    data[14] = 1;data[15] = 0;data[16] = 1;data[17] = 1;data[18] = 1;data[19] = 1;data[20] = 1;
    data[21] = 0;data[22] = 1;data[23] = 1;data[24] = 2;data[25] = 1;data[26] = 0;data[27] = 1;
    data[28] = 1;data[29] = 2;data[30] = 1;
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
    //    }
    //});
}
//设置可预约格子
function keYuyue(doc) {
    doc.children("strong").remove();
    var html = "<strong>预约</strong>";
    doc.append(html);
    doc.addClass("ke-yuyue");
    doc.removeClass("yueman buke-yuyue");
    doc.attr("data-toggle","modal");
    doc.attr("data-target","#yuyue-modal");
}
//设置约满格子
function yueman(doc) {
    doc.children("strong").remove();
    var html = "<strong>约满</strong>";
    doc.append(html);
    doc.addClass("yueman");
    doc.removeClass("ke-yuyue buke-yuyue");
    doc.removeAttr("data-target");
    doc.removeAttr("data-toggle");
}
//设置不可预约格子
function bukeYuyue(doc) {
    doc.children("strong").remove();
    doc.addClass("buke-yuyue");
    doc.removeClass("ke-yuyue yueman");
    doc.removeAttr("data-target");
    doc.removeAttr("data-toggle");
}
//设置每天的预约医生表
function yuyue() {
    if($(this).hasClass("ke-yuyue")) {
        var modal = $("#yuyue-modal .yuyue-do tbody");
        var year = $("#yuyue-year").text();
        var month = $("#yuyue-month").text();
        var day = $(this).children("span").eq(0).text();
        var keshiID = $("#keshiID").text();
        var week = new Date(year,month,day).getDay();
        $.ajax({
            url: '',//目标地址
            type: 'POST',
            async:false,
            dataType: 'json',
            data: "type="+"yuyue_message"+"&keshiID="+keshiID+"&year="+year+"&month="+month+"&day="+day,
            success:function(data) {
                modal.html("");
                var length = data.length;
                for(i = 0; i < length; i++) {
                    var html = '<tr>'+
                        '<td>'+year+'-'+month+'-'+day+'</td>'+
                        '<td>'+week+'</td>'+
                        '<td>'+data[i].keshiName+'</td>'+
                        '<td>'+data[i].doctorName+'</td>'+
                        '<td>'+data[i].expense+'</td>'+
                        '<td>'+data[i].keguaHao+'</td>'+
                        '<td>'+data[i].shengyuHao+'</td>';
                    if(data[i].shengyuHao > 0) {
                        html += '<td><a href="javascript:void(0)">预约</a></td>';
                    }
                    else {
                        html += '<td>约满</td>';
                    }
                    html += '</tr>';
                    modal.html(modal.html()+html);
                }
            }
        });
    }
}
//触发预约事件
function yuyue_a() {

}



