// Create the modal element
const modal = (classSelector) => {
    const content = document.querySelector('#modalContent');
    const modalBtn = document.querySelector(classSelector);
    const modalWrapper = document.createElement('div');
    modalWrapper.classList.add('modal-wrapper');


    // Function to show the modal
    function showModal() {
        document.body.style.overflow = 'hidden';
        document.body.appendChild(modalWrapper);
        document.body.append(content);
    }

    // Event listener to trigger the modal
    modalBtn.addEventListener('click', function(event) {
        content.classList.remove('tw-hidden');
        content.classList.add('tw-flex')
        showModal();
    });

    // Function to close the modal
    function closeModal() {
        document.body.style.overflow = 'visible';
        modalWrapper.remove();
        content.classList.remove('tw-flex');
        content.classList.add('tw-hidden');
    }

    // Event listener to close the modal
    content.addEventListener('click', function(event) {
        if (event.target.classList.contains('close-btn')) {
            closeModal();
        }
    });
}

export default modal;