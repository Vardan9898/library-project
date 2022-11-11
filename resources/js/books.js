$(document).ready(function () {
    $('#empTable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        ordering: false,
        language: {
            'infoFiltered': ''
        },
        ajax: '/api/books',
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'author_name' },
            { data: 'publisher_name' },
        ]
    });
})