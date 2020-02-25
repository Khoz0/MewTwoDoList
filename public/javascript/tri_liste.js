function sort_by_name(val) {

    var liste = [];
    
    $.each($('#liste'),
        function () {
            $(this).children().each(
                function () {
                    if ($(this).attr("id").split("\\")[0] != null) {
                        liste.push($(this));
                    }
                }
            );
        }
    );



            liste.sort(function (a, b) {
                switch (val) {
                    case "alphabInverse":
                        return sort_alphabInverse(a, b);
                        break;
                    case "debRecent":
                        return sort_debRecent(a, b);
                        break;
                    case "finRecent":
                        return sort_finRecent(a, b);
                        break;
                    case "debAncien":
                        return sort_debAncien(a, b);
                        break;
                    case "finAncien":
                        return sort_finAncien(a, b);
                        break;
                    default:
                        return sort_alphab(a, b);
                        break;
                }
            });


    var order = 0;
    liste.forEach(element => {
        element.css("order", order++);
    });

}


function sort_alphab(a, b) {
    if (a.attr("id").split("\\")[0] < b.attr("id").split("\\")[0])
        return -1;
    return 1;
}

function sort_alphabInverse(a, b) {
    if (a.attr("id").split("\\")[0] > b.attr("id").split("\\")[0])
        return -1;
    return 1;
}

function sort_debRecent(a, b) {
    if (new Date(a.attr("id").split("\\")[1]).getTime() > new Date(b.attr("id").split("\\")[1]).getTime())
        return -1;
    return 1;
}

function sort_debAncien(a, b) {
    if (new Date(a.attr("id").split("\\")[1]).getTime() < new Date(b.attr("id").split("\\")[1]).getTime())
        return -1;
    return 1;
}

function sort_finRecent(a, b) {


    if (a.attr("id").split("\\")[2] == "" && b.attr("id").split("\\")[2] != "")
        return 10;
    if (b.attr("id").split("\\")[2] == "")
        return -10;

    if (new Date(a.attr("id").split("\\")[2]).getTime() > new Date(b.attr("id").split("\\")[2]).getTime())
        return -1;
    return 1;
}

function sort_finAncien(a, b) {

    if (a.attr("id").split("\\")[2] == "" && b.attr("id").split("\\")[2] != "")
        return -10;
    if (b.attr("id").split("\\")[2] == "")
        return 10;

    if (new Date(a.attr("id").split("\\")[2]).getTime() < new Date(b.attr("id").split("\\")[2]).getTime())
        return -1;
    return 1;
}