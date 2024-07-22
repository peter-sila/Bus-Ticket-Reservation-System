// Function to toggle between display and edit forms
function toggleAddBus(editMode) {
    document.querySelector('.bus-list').classList.toggle('active', !editMode);
    document.querySelector('.busform').classList.toggle('active', editMode);

}

function toggleAddLoc(editLoc) {
    document.querySelector('.route-list').classList.toggle('active', !editLoc);
    document.querySelector('.locform').classList.toggle('active', editLoc);

}

function toggleAddNewSched(editsched) {
    document.querySelector('.sched-list').classList.toggle('active', !editsched);
    document.querySelector('.schedform').classList.toggle('active', editsched);

}

function toggleAddDriver(editDriver) {
    document.querySelector('.driver-list').classList.toggle('active', !editDriver);
    document.querySelector('.driverform').classList.toggle('active', editDriver);

}

function toggleAllocate(editDriverAllocation) {
    document.querySelector('.driver-alist').classList.toggle('active', !editDriverAllocation);
    document.querySelector('.driver-aform').classList.toggle('active', editDriverAllocation);

}
