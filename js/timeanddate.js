// Source http://www.webestools.com/scripts_tutorials-code-source-7-display-date-and-time-in-javascript-real-time-clock-javascript-date-time.html
function date_time(id)
{
    date = new Date;
    year = date.getFullYear();
    month = date.getMonth();
    months = new Array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');
    d = date.getDate();
    day = date.getDay();
    days = new Array('zon', 'maa', 'din', 'woe', 'don', 'vri', 'zat');
    h = date.getHours();
    if(h<10)
    {
        h = "0"+h;
    }
    m = date.getMinutes();
    if(m<10)
    {
        m = "0"+m;
    }
    if (h >= 22 && h <= 6){

        $("body").css("background-color", "black");
    }
    result = '<h1 class="display-3" style="font-weight: bold;">' + h + ':' + m + '</h1><h3>' + days[day] + ' ' + d + ' ' + months[month] + ' ' + year + '</h3>';
    document.getElementById(id).innerHTML = result;
    setTimeout('date_time("'+id+'");','10000');
    return true;
}