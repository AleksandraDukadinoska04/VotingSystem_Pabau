function filterEmployees() {
    const searchQuery = $('#searchBar').val().toLowerCase(); 
    $('.card').each(function() {
        const name = $(this).find('.card-title').text().toLowerCase(); 
        const profession = $(this).find('.text-muted').text().toLowerCase(); 

        if (name.includes(searchQuery) || profession.includes(searchQuery)) {
            $(this).show(); 
        } else {
            $(this).hide();
        }
    });
}

$('#searchBar').on('keyup', filterEmployees);