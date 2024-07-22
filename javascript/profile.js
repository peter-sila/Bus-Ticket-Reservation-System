
    // Function to toggle between display and edit forms
    function toggleEdit(editMode) {
        document.querySelector('.profile-info').classList.toggle('active', !editMode);
        document.querySelector('.edit-form').classList.toggle('active', editMode);

    }

    