$(document).ready(function () {
    $('.admin-menu-tab').click(function () {
        var table = $(this).data('table');
        $('.admin-menu-tab').removeClass('active');
        $(this).addClass('active');
        $('.admin-tables').addClass('hidden');
        $('#admin-table-'+table).removeClass('hidden');
    });
    $('.btn-ddl').click(function () {
        $(this).next().toggleClass('hidden');
    })
})