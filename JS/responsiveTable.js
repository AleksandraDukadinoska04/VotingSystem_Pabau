document.addEventListener("DOMContentLoaded", function() {
    var headers = document.querySelectorAll("th");
    var rows = document.querySelectorAll("tbody tr");

    rows.forEach(function(row) {
        row.querySelectorAll("td").forEach(function(cell, index) {
            cell.setAttribute("data-label", headers[index].innerText);
        });
    });
});