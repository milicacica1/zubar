var url = document.URL;
$(document).ready(function () {
    $("a[href$=\"" + url + "\"][class$='list-group-item']").addClass('active2');
});
