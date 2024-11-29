
$(document).ready(function() {
    const bookId = $('#bookId').val();

    
    function loadNotes() {
        $.ajax({
            url: 'loadNote.php',
            type: 'GET',
            dataType: 'json',
            data: { bookId: bookId },
            success: function(response) {
                $('#notesContainer').empty();
                if (response.notes.length > 0) {
                    response.notes.forEach(note => {
                        addNoteToDOM(note.id, note.content);
                    });
                } else {
                    $('#notesContainer').append('<p>No notes yet.</p>');
                }
            },
            error: function() {
                $('#notesContainer').html('<p>There was an error loading your notes.</p>');
            }
        });
    }

   
    function addNoteToDOM(noteId, content) {

        const noteDiv = $('<div>').attr('data-note-id', noteId);
        noteDiv.attr('class', 'quote-container');
        const pin = $('<i>').attr('class', 'pin');
        const noteContent = $('<blockquote>').attr('class', 'note white');
        noteContent.text(content)
        const buttons = $('<cite>').attr('class', 'buttons');
        const editButton = $('<button>').text('Edit').click(function() {
            editNoteContent(noteId, content);
        });
        const deleteButton = $('<button>').text('Delete').click(function() {
            deleteNoteContent(noteId);
        });
        buttons.append(editButton, deleteButton);
        noteDiv.append(pin, noteContent, buttons);
        $('#notesContainer').append(noteDiv);
    }

    
    $('#submitNoteBtn').click(function() {
        const noteContent = $('#noteContent').val();
        const noteId = $('#noteId').val();

        if (noteContent.trim() === "") {
            Swal.fire('Error', 'Note content cannot be empty', 'error');
            return;
        }

        if (noteId) {
           
            $.ajax({
                url: 'editNote.php',
                type: 'POST',
                data: {
                    id: noteId,
                    content: noteContent
                },
                success: function() {
                    Swal.fire('Success', 'Your note has been updated!', 'success');
                    $('#noteContent').val(''); 
                    $('#noteId').val(''); 
                    $('#submitNoteBtn').text('Submit Note'); 
                    loadNotes(); 
                },
                error: function() {
                    Swal.fire('Error', 'There was an error updating your note.', 'error');
                }
            });
        } else {
           
            $.ajax({
                url: 'addNote.php',
                type: 'POST',
                data: {
                    note: noteContent,
                    bookId: bookId
                },
                success: function() {
                    Swal.fire('Success', 'Your note has been saved!', 'success');
                    $('#noteContent').val(''); 
                    loadNotes(); 
                },
                error: function() {
                    Swal.fire('Error', 'There was an error submitting your note.', 'error');
                }
            });
        }
    });

   
    function editNoteContent(noteId, content) {
        $('#noteContent').val(content); 
        $('#noteId').val(noteId); 
        $('#submitNoteBtn').text('Update Note'); 
    }

    function deleteNoteContent(noteId) {
        $.ajax({
            url: 'deleteNote.php',
            type: 'POST',
            data: { id: noteId },
            success: function() {
                Swal.fire('Success', 'Your note has been deleted!', 'success');
                loadNotes(); 
            },
            error: function() {
                Swal.fire('Error', 'There was an error deleting your note.', 'error');
            }
        });
    }

    loadNotes(); 
});